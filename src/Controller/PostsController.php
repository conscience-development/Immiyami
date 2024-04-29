<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Session\DatabaseSession;
//load excel
use Cake\ORM\TableRegistry;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Http\CallbackStream;
use Cake\I18n\FrozenDate;
use Cake\ORM\Table;

use App\Model\Table\CategoriesTable;
use App\Model\Table\CountriesTable;


use Cake\Mailer\Mailer;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @property \App\Model\Entity\Category $category
 * @property \app\Model\Entity\PostImage $postImage
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Search.Search', [
            // This is default config. You can modify "actions" as needed to make
            // the Search component work only for specified methods.
            'actions' => ['index'],
        ]);



        $this->paginate = [
            'order' => ['id' => 'DESC']
        ];
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $conditions = [];

        if (!empty($this->request->getQuery())) {
            if (!empty($this->request->getQuery('daterange'))) {
                $daterange = explode('-', $this->request->getQuery('daterange'));
                $dateStart = date_create($daterange[0]);
                $dateEnd = date_create($daterange[1]);
                $conditions['Posts.created >='] = date_format($dateStart, "Y-m-d");
                $conditions['Posts.created <='] = date_format($dateEnd, "Y-m-d");
                $this->set('setDaterange', $this->request->getQuery('daterange'));
            }
        }


        if ($this->request->getQuery('q')) {
            $getstatus = explode('-', $this->request->getQuery('q'));
            if ($getstatus[0] == 'status') {
                $conditions['Posts.status'] = $getstatus[1];
                $query = $this->Posts
                    // Use the plugins 'search' custom finder and pass in the
                    // processed query params
                    ->find('all')
                    // You can add extra things to the query if you need to
                    ->contain(['Users'])
                    //->order(['Posts.id'=>'DESC'])
                    ->where($conditions);
            } else {
                $query = $this->Posts
                    // Use the plugins 'search' custom finder and pass in the
                    // processed query params
                    ->find('search', ['search' => $this->request->getQueryParams()])
                    //->order(['Posts.id'=>'DESC'])
                    // You can add extra things to the query if you need to
                    ->contain(['Users'])
                    ->where($conditions);
            }
        } else {
            $query = $this->Posts
                // Use the plugins 'search' custom finder and pass in the
                // processed query params
                ->find('search', ['search' => $this->request->getQueryParams()])
                //->order(['Posts.id'=>'DESC'])
                // You can add extra things to the query if you need to
                ->contain(['Users'])
                ->where($conditions);
        }




        $this->set('posts', $this->paginate($query));

        //~ $this->paginate = [
        //~ 'contain' => ['Users'],
        //~ ];
        //~ $posts = $this->paginate($this->Posts);

        //~ $this->set(compact('posts'));
    }
    /**
     * Report method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function report()
    {
        $conditions = [];



        if (!empty($this->request->getQuery())) {

            if (!empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))) {
                $dateStart = date_create($this->request->getQuery('start_date'));
                $dateEnd = date_create($this->request->getQuery('end_date'));
                $conditions['Posts.created >='] = date_format($dateStart, "Y-m-d");
                $conditions['Posts.created <='] = date_format($dateEnd, "Y-m-d");
            } else if (!empty($this->request->getQuery('start_date')) && empty($this->request->getQuery('end_date'))) {

                $date = date_create($this->request->getQuery('start_date'));
                $conditions['Posts.created >='] = date_format($date, "Y-m-d");
            } else if (empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))) {
                $date = date_create($this->request->getQuery('end_date'));
                $conditions['Posts.created <='] = date_format($date, "Y-m-d");
            } else {
                //~ die('dddd');
            }
            if ($this->request->getQuery('status') != '') {
                $conditions['Posts.status'] = $this->request->getQuery('status');
            }


        }


        $this->paginate = [
            'contain' => ['Users'],
            'conditions' => $conditions,
            'order' => ['id' => 'DESC']
        ];

        $posts = $this->paginate($this->Posts);


        if ($this->request->is('post')) {
            if ($this->request->getData('export') == '1') {


                $posts = $this->Posts->find('all', [
                    'contain' => ['Users'],
                    'conditions' => $conditions
                ]);


                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();

                $arrayData = [

                    ['Title', 'Status', 'Clicks', 'Supplier', 'Created']
                ];

                foreach ($posts as $k => $post) {
                    $k++;
                    //~ var_dump($user);
                    //~ die();
                    $created = new FrozenDate($post->created);


                    $arrayData[$k][] = $post->title;
                    if ($post->status == '0') {
                        # code...
                        $arrayData[$k][] = 'Inactive';
                    } else {
                        # code...
                        $arrayData[$k][] = 'Active';
                    }
                    $arrayData[$k][] = $post->clicks;
                    $arrayData[$k][] = @$post->user->first_name . ' ' . @$post->user->last_name;
                    $arrayData[$k][] = $created->format('Y-m-d');
                }

                $sheet->fromArray(
                    $arrayData,  // The data to set
                    NULL,        // Array values with this value will not be set
                    'A1'         // Top left coordinate of the worksheet range where
                    //    we want to set these values (default is A1)
                );


                $writer = new Xlsx($spreadsheet);
                $stream = new CallbackStream(function () use ($writer) {
                    $writer->save('php://output');
                });

                $filename = 'advertisements_report_' . date('ymd_His');
                $response = $this->response;

                return $response->withType('xlsx')
                    ->withHeader('Content-Disposition', "attachment;filename=\"{$filename}.xlsx\"")
                    ->withBody($stream);
            }
        }



        $this->set('posts', $posts);

    }

    /**
     * ad list method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function listPosts()
    {

        $this->loadModel('Categories');
        $this->loadModel('PostsCategories');
        $this->loadModel('PostsCountries');

        $page = 'Posts list';
        $conditions['Posts.status'] = '1';
        $conditions['Posts.c_status'] = '1';
        $post_ids = [];
        $country_ids = [];
        $category_ids = [];
        if ($this->request->getQuery('country_id')) {

            foreach ($this->request->getQuery('country_id') as $key => $value) {
                # code...
                $country_ids[] = (int) $value;
            }

            // $conditions['Countries.id IN'] = $country_ids;
            $conditions2['PostsCountries.country_id IN'] = $country_ids;
            $postsCountries = $this->PostsCountries
                // Use the plugins 'search' custom finder and pass in the
                // processed query params
                ->find('all')
                ->where($conditions2);

            foreach ($postsCountries as $key => $value) {
                # code...
                $post_ids[] = (int) $value->post_id;
            }
            if (!empty($post_ids)) {
                $conditions['Posts.id IN'] = $post_ids;
            } else {
                $conditions['Posts.id IN'] = [0];
            }
        }
        if ($this->request->getQuery('category_id')) {

            foreach ($this->request->getQuery('category_id') as $key => $value) {
                # code...
                $category_ids[] = (int) $value;
            }
            $conditions1['PostsCategories.category_id IN'] = $category_ids;
            $postsCategories = $this->PostsCategories
                // Use the plugins 'search' custom finder and pass in the
                // processed query params
                ->find('all')
                ->where($conditions1);

            foreach ($postsCategories as $key => $value) {
                # code...
                $post_ids[] = (int) $value->post_id;
            }

            if (!empty($post_ids)) {
                $conditions['Posts.id IN'] = $post_ids;
            } else {
                $conditions['Posts.id IN'] = [0];
            }
        }

        $query = $this->Posts
            // Use the plugins 'search' custom finder and pass in the
            // processed query params
            ->find('search', ['search' => $this->request->getQueryParams()])
            // You can add extra things to the query if you need to
            ->contain(['Users' => ['Categories', 'Countries'], 'PostsCountries' => ['Countries'], 'PostsCategories' => ['Categories']])
            ->where($conditions);

        // var_dump($query);
        // die();
        $this->viewBuilder()->setLayout('public');

        $this->loadModel('Countries');
        $categories = $this->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Countries->find('list', ['limit' => 200])->all();

        $this->set('posts', $this->paginate($query));
        $this->set('countries', $countries);
        $this->set('categories', $categories);
        $this->set('categoriesS', $category_ids);
        $this->set('countriesS', $country_ids);
        $this->set('page', $page);

        //~ $this->paginate = [
        //~ 'contain' => ['Users'],
        //~ ];
        //~ $posts = $this->paginate($this->Posts);

        //~ $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'PostImages'],
        ]);

        $categories = $this->

        $this->set(compact('post'));
    }
    /**
     * postView method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function postView()
    {
        $ids = explode('-', $this->request->getQuery('post_id'));
        //~ var_dump($ids);
        //~ die();
        $conditions = [];
        $session = $this->getRequest()->getSession();


        $post = @$this->Posts->get($ids[count($ids) - 1], [
            'contain' => ['Users' => ['Posts'], 'PostImages', 'PostsCategories' => ['Categories'], 'PostsCountries' => ['Countries']],
            'conditions' => $conditions
        ]);
        if ($this->request->getQuery('view_type') == 'profile') {
        } elseif ($this->request->getQuery('view_type') == 'adminProfile') {
            $pIdsArrViewd = $session->read('Config.ArrPostIdViewd');
            if (empty($pIdsArrViewd)) {
                $pIdsArrViewd = array();
                $session->write('Config.ArrPostIdViewd', $pIdsArrViewd);
            }
            if (!in_array($post->id, $pIdsArrViewd)) {
                array_push($pIdsArrViewd, $post->id);
                $session->write('Config.ArrPostIdViewd', $pIdsArrViewd);
            }

        } else {
            $pIdsArr = [];


            $arrPostId = $session->read('Config.ArrPostId');
            if ($arrPostId) {
                array_push($arrPostId, $post->id);
                $session->write('Config.ArrPostId', $arrPostId);
            } else {
                $arr = array();
                $session->write('Config.ArrPostId', $arr);
            }

            // $arr=array();
            // $session->write('Config.ArrPostId',$arr);
            $pIdsArr = $session->read('Config.ArrPostId');

            if (!in_array($post->id, $pIdsArr)) {

                $post->clicks = (int) $post->clicks + 1;
                if ($this->Posts->save($post)) {
                    array_push($pIdsArr, $post->id);
                    $session->write('Config.ArrPostId', $pIdsArr);
                }
            }
        }
        $page = $post->title;
        $this->viewBuilder()->setLayout('public');
        $this->set(compact('post', 'page'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // this is to fetch all the categories
        $categoriesTable = new CategoriesTable();
        $categories = $categoriesTable->find('list')->toArray();

        //this is to fetch all the countires
        $countriesTable = new CountriesTable();
        $countries = $countriesTable->find('list', ['conditions' => ['status' => '1']])->toArray();

        

        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            $post->status = '0';
            $post->c_status ='0';
            if ($this->Posts->save($post)) {
                // $users12 = $this->Posts->Users->find('list', ['limit' => 200, 'conditions' => ['role' => 'supplier', 'status' => '1','id'=>$post->user_id]])->all();
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200, 'conditions' => ['role' => 'supplier', 'status' => '1']])->all();
        $this->set(compact('post', 'users', 'categories', 'countries'));
        
    }

    // Change ststus one by one
    public function changestatus($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        $post->status = '1';
        $post->c_status = '1';
        $post->approved_date = date('Y-m-d H:i:s');

        $this->loadModel('Users');
        $user = $this->Users->get($post->user_id);

        if ($this->Posts->save($post)) {
            $mailer = new Mailer();
            $mailer->setEmailFormat('text')
                ->setTo($user->email)
                ->setCc('support@immiyami.com')
                ->setSubject('ImmiYami : Advertisement has been approved');
            $mailer->deliver('The advertisement has been approved');

            $this->Flash->success(__('The banner has been updated.'));
        } else {
            $this->Flash->error(__('The banner could not be updated. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }



    /**
     * Add Post Suplier method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addPost()
    {
        // var_dump($this->request->getData());
        // die();
        $post = $this->Posts->newEmptyEntity();

        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            $post->user_id = $this->Auth->User('id');
            $this->loadModel('Users');
            $user = $this->Users->get($this->Auth->User('id'));
            if ($user->sup_p == '1') {
                $post->status = '1';
            }
            if ($this->Posts->save($post)) {
                $this->loadModel('PostImages');
                $this->loadModel('PostsCategories');
                $this->loadModel('PostsCountries');
                foreach ($this->request->getData('Categories')['_ids'] as $cat) {
                    $postCategory = $this->PostsCategories->newEmptyEntity();
                    $postCategory->post_id = $post->id;
                    $postCategory->category_id = $cat;
                    if ($this->PostsCategories->save($postCategory)) {

                    }
                }
                foreach ($this->request->getData('Countries')['_ids'] as $cunt) {
                    $postsCountries = $this->PostsCountries->newEmptyEntity();
                    $postsCountries->post_id = $post->id;
                    $postsCountries->country_id = $cunt;
                    if ($this->PostsCountries->save($postsCountries)) {

                    }
                }
                foreach ($this->request->getData('postImages') as $img) {
                    $postimg = $this->PostImages->newEmptyEntity();
                    $postimg->post_id = $post->id;
                    $postimg->photo = $img;
                    if ($this->PostImages->save($postimg)) {

                    }
                }

                $mailer = new Mailer();
                $mailer->setEmailFormat('text')
                    ->setTo($user->email)
                    ->setCc('support@immiyami.com')
                    ->setSubject('ImmiYami : Advertisement is on pending status');
                $mailer->deliver('The advertisement is on pending status');

                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect('/post-view?post_id=' . preg_replace('/[^\da-z]/i', '-', $post->title) . '-' . $post->id . '&view_type=profile');
                // return $this->redirect('/supplierProfile');
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post', 'users', 'categories', 'countries'));
        return $this->redirect('/supplierProfile');
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['PostImages', 'PostsCategories' => ['Categories'], 'PostsCountries' => ['Countries']],
        ]);
        // this is to fetch all the categories
        // $categoriesTable = new CategoriesTable();
        // $categories = $categoriesTable->find('list')->toArray();

        // //this is to fetch all the countires
        // $countriesTable = new CountriesTable();
        // $countries = $countriesTable->find('list', ['conditions' => ['status' => '1']])->toArray();

        // // Get selected category IDs
        // $selectedCategoryIds = [];
        // foreach ($post->posts_categories as $category) {
        //     $selectedCategoryIds[] = $category->category_id;
        // }

        // // Get selected country IDs
        // $selectedCountryIds = [];
        // foreach ($post->posts_countries as $country) {
        //     $selectedCountryIds[] = $country->country_id;
        // }
        $this->loadModel('PostImages');
        $this->loadModel('PostsCategories');
        $this->loadModel('PostsCountries');

        $exP = $this->PostsCategories->find('all')->where(['post_id' => $id]);
        $exPC = $this->PostsCountries->find('all')->where(['post_id' => $id]);
        foreach ($exP as $catp) {
            $postsCategories = $this->PostsCategories->get($catp->id);
            if ($this->PostsCategories->delete($postsCategories)) {
            }
        }
        foreach ($exPC as $catp) {
            $postsCountries = $this->PostsCountries->get($catp->id);
            if ($this->PostsCountries->delete($postsCountries)) {
            }
        }

        foreach ($this->request->getData('Categories')['_ids'] as $cat) {
            $postCategory = $this->PostsCategories->newEmptyEntity();
            $postCategory->post_id = $post->id;
            $postCategory->category_id = $cat;
            if ($this->PostsCategories->save($postCategory)) {

            }
        }
        foreach ($this->request->getData('Countries')['_ids'] as $cunt) {
            $postsCountries = $this->PostsCountries->newEmptyEntity();
            $postsCountries->post_id = $post->id;
            $postsCountries->country_id = $cunt;
            if ($this->PostsCountries->save($postsCountries)) {

            }
        }


        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            $post->post_images = []; // Clear existing images to avoid duplication
            foreach ($this->request->getData('postImages') as $image) {
                $postImage = $this->Posts->PostImages->newEntity();
                $postImage->photo = $image['name'];
                $postImage->photo_dir = $image['tmp_name']; // You may need to modify this based on your file storage configuration
                $post->post_images[] = $postImage;
            }
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        // $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $users = $this->Posts->Users->find('list', ['limit' => 200, 'conditions' => ['role' => 'supplier', 'status' => '1']])->all();
        $this->set(compact('post', 'users'));
        // $this->set(compact('post', 'users', 'categories', 'countries', 'selectedCategoryIds', 'selectedCountryIds'));
    }
    /**
     * inactivepost method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function inactivepost($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $post->c_status = '0';
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been inactivated.'));
            }
            // $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        return $this->redirect('/supplierProfile');
    }
    /**
     * Edit post supplier method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editPost($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            $post->status = '0';
            if ($this->Posts->save($post)) {
                $this->loadModel('PostImages');
                $this->loadModel('PostsCategories');
                $this->loadModel('PostsCountries');

                $exP = $this->PostsCategories->find('all')->where(['post_id' => $post->id]);
                $exPC = $this->PostsCountries->find('all')->where(['post_id' => $post->id]);
                foreach ($exP as $catp) {
                    $postsCategories = $this->PostsCategories->get($catp->id);
                    if ($this->PostsCategories->delete($postsCategories)) {
                    }
                }
                foreach ($exPC as $catp) {
                    $postsCountries = $this->PostsCountries->get($catp->id);
                    if ($this->PostsCountries->delete($postsCountries)) {
                    }
                }

                foreach ($this->request->getData('Categories')['_ids'] as $cat) {
                    $postCategory = $this->PostsCategories->newEmptyEntity();
                    $postCategory->post_id = $post->id;
                    $postCategory->category_id = $cat;
                    if ($this->PostsCategories->save($postCategory)) {

                    }
                }
                foreach ($this->request->getData('Countries')['_ids'] as $cunt) {
                    $postsCountries = $this->PostsCountries->newEmptyEntity();
                    $postsCountries->post_id = $post->id;
                    $postsCountries->country_id = $cunt;
                    if ($this->PostsCountries->save($postsCountries)) {

                    }
                }
                if (!empty($this->request->getData('postImages')) && !empty($this->request->getData('postImages')[0]->getClientFilename())) {
                    //~ var_dump();
                    //~ die('s');
                    foreach ($this->request->getData('postImages') as $img) {

                        $postimg = $this->PostImages->newEmptyEntity();
                        $postimg->post_id = $post->id;
                        $postimg->photo = $img;
                        if ($this->PostImages->save($postimg)) {

                        }
                    }
                }
                $this->loadModel('Users');
                $userEm = $this->Users->get($post->user_id);
                $mailer = new Mailer();
                $mailer->setEmailFormat('text')
                    ->setTo($userEm->email)
                    ->setCc('support@immiyami.com')
                    ->setSubject('ImmiYami : Advertisement on pending stage');
                $mailer->deliver('The advertisement on pending stage');


                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect('/post-view?post_id=' . preg_replace('/[^\da-z]/i', '-', $post->title) . '-' . $post->id . '&view_type=profile');

                // return $this->redirect('/supplierProfile');
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users11 = $this->Posts->Users->find('list', ['limit' => 200, 'conditions' => ['role' => 'supplier', 'status' => '1']])->all();
        $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('post', 'users','users11'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);

        // Delete related records from posts_categories and posts_countries tables
        $this->Posts->PostsCategories->deleteAll(['post_id' => $id]);
        $this->Posts->PostsCountries->deleteAll(['post_id' => $id]);

        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    //Multi Action
    public function multiAction()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            //~ print_r($this->request->getData());
            $statusGet = $this->request->getData('status');
            foreach ($this->request->getData('info') as $id) {
                $get_data = $this->Posts->get($id);
                if ($statusGet == '2') {
                    if ($this->Posts->delete($get_data)) {
                        echo '1';
                    } else {
                        echo '0';
                    }
                } else {
                    $get_data->status = $statusGet;
                    $get_data->approved_date = date('Y-m-d H:i:s');

                    $this->loadModel('Users');
                    $user = $this->Users->get($get_data->user_id);

                    if ($this->Posts->save($get_data)) {
                        $mailer = new Mailer();
                        $mailer->setEmailFormat('text')
                            ->setTo($user->email)
                            ->setCc('support@immiyami.com')
                            ->setSubject('ImmiYami : Advertisement approved');
                        $mailer->deliver('The advertisement approved');
                        echo '1';
                    } else {
                        echo '0';
                    }

                }
            }

        } else {
            echo 'not Post';
        }
        die();
    }

    // public function getPostCategories() {
    //     // $postCategoryQuery = $this->Categories1->get(); // Assuming `postsCategories` is your model
    //     // $results = $postCategoryQuery->all();

    //     // $this->set('postCategories12', $results);

    //     $query = $Categories14->find('all');

    // }
}