<?php
declare(strict_types=1);

namespace App\Controller;

//load excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Http\CallbackStream;
use Cake\I18n\FrozenDate;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

	public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('Search.Search', [
			// This is default config. You can modify "actions" as needed to make
			// the Search component work only for specified methods.
			'actions' => ['index'],
		]);

		// Set default pagination settings to descending order
        // $this->paginate = [
        //     'order' => 'Articles.created  DESC'
        // ];
		$this->paginate = [
            'order'=>['id'=>'DESC']
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

		if(!empty($this->request->getQuery())){
			if(!empty($this->request->getQuery('daterange'))){
				$daterange = explode('-',$this->request->getQuery('daterange'));				
				$dateStart=date_create($daterange[0]);
				$dateEnd=date_create($daterange[1]);
				$conditions['Articles.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Articles.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}

		$conditions['Articles.title IS NOT'] = NULL;

		if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Articles.status'] = $getstatus[1];
				$query = $this->Articles
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				->contain(['Users'])
				->where($conditions);
			}else{
				$query = $this->Articles
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				->contain(['Users'])
				->where($conditions);
			}
		}else{
			$query = $this->Articles
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			->contain(['Users'])
				->where($conditions);
		}
		$this->set('articles', $this->paginate($query));

        //~ $this->paginate = [
            //~ 'contain' => ['Users'],
        //~ ];
        //~ $articles = $this->paginate($this->Articles);

        //~ $this->set(compact('articles'));
    }

    /**
     * Report method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function report()
    {

		$conditions = [];

		if(!empty($this->request->getQuery())){

			if(!empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$dateStart=date_create($this->request->getQuery('start_date'));
				$dateEnd=date_create($this->request->getQuery('end_date'));
				$conditions['Articles.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Articles.created <='] = date_format($dateEnd,"Y-m-d");
			}else if(!empty($this->request->getQuery('start_date')) && empty($this->request->getQuery('end_date'))){

				$date=date_create($this->request->getQuery('start_date'));
				$conditions['Articles.created >='] = date_format($date,"Y-m-d");
			}else if(empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$date=date_create($this->request->getQuery('end_date'));
				$conditions['Articles.created <='] = date_format($date,"Y-m-d");
			}else{
				//~ die('dddd');
			}
			if($this->request->getQuery('status') != ''){
				$conditions['Articles.status'] = $this->request->getQuery('status');
			}
			if(!empty($this->request->getQuery('user_id'))){
				$conditions['Articles.user_id'] = $this->request->getQuery('user_id');
			}


		}


        $this->paginate = [
            'contain' => ['Users'],
            'conditions'=>$conditions,
            'order'=>['created'=>'DESC']
        ];
        $articles = $this->paginate($this->Articles);

        if ($this->request->is('post')) {
			if($this->request->getData('export') == '1'){


				 $articles = $this->Articles->find('all',[
							'contain' => ['Users'],
							'conditions'=>$conditions
				 ]);


				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();

				$arrayData = [

						['Title', 'User Name','Status','Created Date']
					];

				foreach($articles as $k=>$article){
					$k++;

					$created = new FrozenDate($article->created);

					$arrayData[$k][]= $article->title;
					$arrayData[$k][]= @$article->user->first_name.' '.@$article->user->last_name;
                    if($article->status == '1'){
					    $arrayData[$k][]= 'Active';
                    }else{
					    $arrayData[$k][]= 'Inactive';
                    }
					$arrayData[$k][]= $created->format('Y-m-d');
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

				$filename = 'articles_report_'.date('ymd_His');
				$response = $this->response;

				return $response->withType('xlsx')
					->withHeader('Content-Disposition', "attachment;filename=\"{$filename}.xlsx\"")
					->withBody($stream);
			}
		}

        $users = $this->Articles->Users->find('list', [
							'conditions'=>[
										'Users.role NOT IN'=>[
											'sponsor','student','supplier'
											]

									],
							'limit' => 200])->all();
        $this->set(compact('users'));

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('article'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $article = $this->Articles->newEmptyEntity();
    if ($this->request->is('post')) {
        // var_dump($this->request->getData()['short_description']);die;
        $article = $this->Articles->patchEntity($article, $this->request->getData());
        $article->user_id = $this->Auth->User('id');
        
        if($this->request->getData()['short_description']==null){
            $article->short_description = "";
        }

        if ($this->Articles->save($article)) {
            $this->Flash->success(__('The article has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The article could not be saved. Please, try again.'));
    }
    $users = $this->Articles->Users->find('list', ['limit' => 200])->all();
    $this->set(compact('article', 'users'));
}


    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $users = $this->Articles->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('article', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    //Multi Action
    public function multiAction()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
			//~ print_r($this->request->getData());
			$statusGet = $this->request->getData('status');
			foreach($this->request->getData('info') as $id){
				$get_data = $this->Articles->get($id);
				if ($statusGet == '2') {
					if ($this->Articles->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->Articles->save($get_data)) {
							echo '1';
						} else {
							echo '0';
						}
				}
			}

		}else{
			echo 'not Post';
		}
        die();
    }
}