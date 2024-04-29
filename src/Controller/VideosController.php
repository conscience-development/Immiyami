<?php
declare(strict_types=1);

namespace App\Controller;

//load excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Http\CallbackStream;
use Cake\I18n\FrozenDate;

/**
 * Videos Controller
 *
 * @property \App\Model\Table\VideosTable $Videos
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VideosController extends AppController
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
				$conditions['Videos.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Videos.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}
        
		if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Videos.status'] = $getstatus[1];
				$query = $this->Videos
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
                        //->order(['Videos.id'=>'DESC'])
				->where($conditions);
			}else{

				$query = $this->Videos
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
                        //->order(['Videos.id'=>'DESC'])
				->where($conditions);
			}
		}else{

			$query = $this->Videos
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
                        //->order(['Videos.id'=>'DESC'])
				->where($conditions);
		}


		$this->set('videos', $this->paginate($query));

        //~ $videos = $this->paginate($this->Videos);

        //~ $this->set(compact('videos'));
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
				$conditions['Videos.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Videos.created <='] = date_format($dateEnd,"Y-m-d");
			}else if(!empty($this->request->getQuery('start_date')) && empty($this->request->getQuery('end_date'))){

				$date=date_create($this->request->getQuery('start_date'));
				$conditions['Videos.created >='] = date_format($date,"Y-m-d");
			}else if(empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$date=date_create($this->request->getQuery('end_date'));
				$conditions['Videos.created <='] = date_format($date,"Y-m-d");
			}else{
				//~ die('dddd');
			}
			if($this->request->getQuery('status') != ''){
				$conditions['Videos.status'] = $this->request->getQuery('status');
			}

			if(!empty($this->request->getQuery('type'))){
				$conditions['Videos.type'] = $this->request->getQuery('type');
			}


		}


        $this->paginate = [
            'contain' => [],
            'conditions'=>$conditions,
			'order'=>['id'=>'DESC']
        ];
        $videos = $this->paginate($this->Videos);
        //~ var_dump($videos);
        //~ die();
        if ($this->request->is('post')) {
			if($this->request->getData('export') == '1'){


				 $videos = $this->Videos->find('all',[
							'contain' => [],
							'conditions'=>$conditions
				 ]);


				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();

				$arrayData = [

						['Title', 'Featured','Premium','Status','type','Created Date']
					];

				foreach($videos as $k=>$article){
					$k++;

					$created = new FrozenDate($article->created);
					if($article->featured == '1'){
						$featured = 'Yes';
					}else{
						$featured = 'No';
					}
					if($article->premium == '1'){
						$premium = 'Yes';
					}else{
						$premium = 'No';
					}
					$arrayData[$k][]= $article->title;
					$arrayData[$k][]= $featured;
					$arrayData[$k][]= $premium;

                    if($article->status == '1'){
					    $arrayData[$k][]= 'Active';
                    }else{
					    $arrayData[$k][]= 'Inactive';
                    }
					$arrayData[$k][]= $article->type;
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

				$filename = 'videos_report_'.date('ymd_His');
				$response = $this->response;

				return $response->withType('xlsx')
					->withHeader('Content-Disposition', "attachment;filename=\"{$filename}.xlsx\"")
					->withBody($stream);
			}
		}


        $this->set(compact('videos'));
    }


    /**
     * View method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $video = $this->Videos->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('video'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $video = $this->Videos->newEmptyEntity();
        if ($this->request->is('post')) {
            $video = $this->Videos->patchEntity($video, $this->request->getData());
            if ($this->Videos->save($video)) {
                $this->Flash->success(__('The video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The video could not be saved. Please, try again.'));
        }
        $this->set(compact('video'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $video = $this->Videos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $video = $this->Videos->patchEntity($video, $this->request->getData());
            if ($this->Videos->save($video)) {
                $this->Flash->success(__('The video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The video could not be saved. Please, try again.'));
        }
        $this->set(compact('video'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $video = $this->Videos->get($id);
        if ($this->Videos->delete($video)) {
            $this->Flash->success(__('The video has been deleted.'));
        } else {
            $this->Flash->error(__('The video could not be deleted. Please, try again.'));
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
				$get_data = $this->Videos->get($id);
				if ($statusGet == '2') {
					if ($this->Videos->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->Videos->save($get_data)) {
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