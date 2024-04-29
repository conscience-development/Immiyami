<?php
declare(strict_types=1);

namespace App\Controller;

//load excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Http\CallbackStream;
use Cake\I18n\FrozenDate;

/**
 * Banners Controller
 *
 * @property \App\Model\Table\BannersTable $Banners
 * @method \App\Model\Entity\Banner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BannersController extends AppController
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
				$conditions['Banners.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Banners.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}


		if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Banners.status'] = $getstatus[1];
				$query = $this->Banners
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				->contain(['BannerTypes','Users'])
                        //->order(['Banners.id'=>'DESC'])
				->where($conditions);
			}else{
				$query = $this->Banners
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
                        //->order(['Banners.id'=>'DESC'])
				// You can add extra things to the query if you need to
				->contain(['BannerTypes','Users'])
				->where($conditions);
			}
		}else{
			$query = $this->Banners
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
                        //->order(['Banners.id'=>'DESC'])
			// You can add extra things to the query if you need to
			->contain(['BannerTypes','Users'])
				->where($conditions);
		}



		$this->set('banners', $this->paginate($query));

        //~ $this->paginate = [
            //~ 'contain' => ['BannerTypes', 'Users'],
        //~ ];
        //~ $banners = $this->paginate($this->Banners);

        //~ $this->set(compact('banners'));
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
				$conditions['Banners.start_date >='] = date_format($dateStart,"Y-m-d");
				$conditions['Banners.end_date <='] = date_format($dateEnd,"Y-m-d");
			}else if(!empty($this->request->getQuery('start_date')) && empty($this->request->getQuery('end_date'))){
				$date=date_create($this->request->getQuery('start_date'));
				$conditions['Banners.start_date >='] = date_format($date,"Y-m-d");
			}else if(empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$date=date_create($this->request->getQuery('end_date'));
				$conditions['Banners.end_date <='] = date_format($date,"Y-m-d");
			}else{

			}

			if($this->request->getQuery('status') != ''){
				$conditions['Banners.status'] = $this->request->getQuery('status');
			}
			if(!empty($this->request->getQuery('user_id'))){
				$conditions['Banners.user_id'] = $this->request->getQuery('user_id');
			}
			if(!empty($this->request->getQuery('banner_type_id'))){
				$conditions['Banners.banner_type_id'] = $this->request->getQuery('banner_type_id');
			}
			if(!empty($this->request->getQuery('position'))){
				$conditions['Banners.position'] = $this->request->getQuery('position');
			}
		}

        $this->paginate = [
            'contain' => ['BannerTypes', 'Users'],
            'conditions'=>$conditions
        ];
        $banners = $this->paginate($this->Banners);

        $bannersForTotal = $this->Banners->find('all',[
			'conditions'=>$conditions
        ]);

        $bannerTotalPrice = 0;
        foreach($bannersForTotal as $bt){
			$bannerTotalPrice += $bt->price;
		}

        if ($this->request->is('post')) {
			if($this->request->getData('export') == '1'){


				 $banners = $this->Banners->find('all',[
							'contain' => ['BannerTypes', 'Users'],
							'conditions'=>$conditions
				 ]);


				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();

				$arrayData = [

						['Title', 'Sponsor Name', 'Position', 'Banner Type','Price','Status','Banner Type','Start Date','End Date','Created Date']
					];

				foreach($banners as $k=>$banner){
					$k++;

					$start_date = new FrozenDate($banner->start_date);
					$end_date = new FrozenDate($banner->end_date);
					$created = new FrozenDate($banner->created);

					$arrayData[$k][]= $banner->title;
					$arrayData[$k][]= @$banner->user->first_name.' '.@$banner->user->last_name;
					$arrayData[$k][]= $banner->position;
					$arrayData[$k][]= $banner->banner_type->name;
					$arrayData[$k][]= $banner->price;
                    if($banner->status == '1'){
					    $arrayData[$k][]= 'Active';
                    }else{
					    $arrayData[$k][]= 'Inactive';
                    }
                    $arrayData[$k][]= $banner->banner_type->name;
					$arrayData[$k][]= $start_date->format('Y-m-d');
					$arrayData[$k][]= $end_date->format('Y-m-d');
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

				$filename = 'banenrs_report_'.date('ymd_His');
				$response = $this->response;

				return $response->withType('xlsx')
					->withHeader('Content-Disposition', "attachment;filename=\"{$filename}.xlsx\"")
					->withBody($stream);
			}
		}

        $bannerTypes = $this->Banners->BannerTypes->find('list', ['limit' => 200])->all();
        $users = $this->Banners->Users->find('list', ['conditions'=>['role'=>'sponsor'],'limit' => 200])->all();
        $this->set(compact('bannerTypes', 'users'));

        $this->set(compact('banners','bannerTotalPrice'));
    }

    /**
     * Export method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function export()
    {

		$conditions = [];

		if(!empty($this->request->getQuery())){

			if(!empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$dateStart=date_create($this->request->getQuery('start_date'));
				$dateEnd=date_create($this->request->getQuery('end_date'));
				$conditions['Banners.start_date >='] = date_format($dateStart,"Y-m-d");
				$conditions['Banners.end_date <='] = date_format($dateEnd,"Y-m-d");
			}else if(!empty($this->request->getQuery('start_date')) && empty($this->request->getQuery('end_date'))){

				$date=date_create($this->request->getQuery('start_date'));
				$conditions['Banners.start_date >='] = date_format($date,"Y-m-d");
			}else if(empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$date=date_create($this->request->getQuery('end_date'));
				$conditions['Banners.end_date >='] = date_format($date,"Y-m-d");
			}else{
				//~ die('dddd');
			}
			if($this->request->getQuery('status') != ''){
				$conditions['Banners.status'] = $this->request->getQuery('status');
			}
			if(!empty($this->request->getQuery('user_id'))){
				$conditions['Banners.user_id'] = $this->request->getQuery('user_id');
			}
			if(!empty($this->request->getQuery('banner_type_id'))){
				$conditions['Banners.banner_type_id'] = $this->request->getQuery('banner_type_id');
			}
			if(!empty($this->request->getQuery('position'))){
				$conditions['Banners.position'] = $this->request->getQuery('position');
			}

		}




		// die('5');
        $this->paginate = [
            'contain' => ['BannerTypes', 'Users'],
            'conditions'=>$conditions
        ];
        $banners = $this->paginate($this->Banners);

        $bannerTypes = $this->Banners->BannerTypes->find('list', ['limit' => 200])->all();
        $users = $this->Banners->Users->find('list', ['conditions'=>['role'=>'sponsor'],'limit' => 200])->all();
        $this->set(compact('bannerTypes', 'users'));

        $this->set(compact('banners'));
    }

    /**
     * View method
     *
     * @param string|null $id Banner id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $banner = $this->Banners->get($id, [
            'contain' => ['BannerTypes', 'Users'],
        ]);

        $this->set(compact('banner'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $banner = $this->Banners->newEmptyEntity();
        if ($this->request->is('post')) {
            $banner = $this->Banners->patchEntity($banner, $this->request->getData());
            if ($this->Banners->save($banner)) {
                $this->Flash->success(__('The banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banner could not be saved. Please, try again.'));
        }
        $bannerTypes = $this->Banners->BannerTypes->find('list', ['limit' => 200])->all();
        $users = $this->Banners->Users->find('list', [
			'conditions' => [
				'role' => 'sponsor',
				'status' => '1' // Add condition to fetch only active users
			],
			'limit' => 200,
			'keyField' => 'id', // Specify the field to use as keys
			'valueField' => function ($user) {
				return $user->first_name . ' ' . $user->last_name; // Concatenate first name and last name
			}
		])->all();
        $this->set(compact('banner', 'bannerTypes', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Banner id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $banner = $this->Banners->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $banner = $this->Banners->patchEntity($banner, $this->request->getData());
            if ($this->Banners->save($banner)) {
                $this->Flash->success(__('The banner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banner could not be saved. Please, try again.'));
        }
        $bannerTypes = $this->Banners->BannerTypes->find('list', ['limit' => 200])->all();
        $users = $this->Banners->Users->find('list', [
			'conditions' => [
				'role' => 'sponsor',
				'status' => '1' // Add condition to fetch only active users
			],
			'limit' => 200,
			'keyField' => 'id', // Specify the field to use as keys
			'valueField' => function ($user) {
				return $user->first_name . ' ' . $user->last_name; // Concatenate first name and last name
			}
		])->all();
        $this->set(compact('banner', 'bannerTypes', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Banner id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $banner = $this->Banners->get($id);
        if ($this->Banners->delete($banner)) {
            $this->Flash->success(__('The banner has been deleted.'));
        } else {
            $this->Flash->error(__('The banner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    // Change ststus one by one
    public function changestatus($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $banner = $this->Banners->get($id);
        $banner->status = '1';
		if ($this->Banners->save($banner)) {
			$this->Flash->success(__('The banner has been updated.'));
		} else {
			$this->Flash->error(__('The banner could not be updated. Please, try again.'));
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
				$get_data = $this->Banners->get($id);
				if ($statusGet == '2') {
					if ($this->Banners->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->Banners->save($get_data)) {
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