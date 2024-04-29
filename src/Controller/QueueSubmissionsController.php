<?php
declare(strict_types=1);

namespace App\Controller;
//load excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Http\CallbackStream;
use Cake\I18n\FrozenDate;

/**
 * QueueSubmissions Controller
 *
 * @property \App\Model\Table\QueueSubmissionsTable $QueueSubmissions
 * @method \App\Model\Entity\QueueSubmission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QueueSubmissionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $queueSubmissions = $this->paginate($this->QueueSubmissions);

        $this->set(compact('queueSubmissions'));
    }


    /**
     * Report method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function report()
    {
        $this->paginate = [
            'order'=>['id'=>'DESC']
        ];

		$conditions = [];

		if(!empty($this->request->getQuery())){

			if(!empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$dateStart=date_create($this->request->getQuery('start_date'));
				$dateEnd=date_create($this->request->getQuery('end_date'));
				$conditions['QueueSubmissions.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['QueueSubmissions.created <='] = date_format($dateEnd,"Y-m-d");
			}else if(!empty($this->request->getQuery('start_date')) && empty($this->request->getQuery('end_date'))){

				$date=date_create($this->request->getQuery('start_date'));
				$conditions['QueueSubmissions.created >='] = date_format($date,"Y-m-d");
			}else if(empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$date=date_create($this->request->getQuery('end_date'));
				$conditions['QueueSubmissions.created <='] = date_format($date,"Y-m-d");
			}else{
				//~ die('dddd');
			}
			// if($this->request->getQuery('status') != ''){
			// 	$conditions['Videos.status'] = $this->request->getQuery('status');
			// }

			// if(!empty($this->request->getQuery('type'))){
			// 	$conditions['QueueSubmissions.type'] = $this->request->getQuery('type');
			// }


		}


        $this->paginate = [
            'contain' => ['Users'],
            'conditions'=>$conditions,
            'order'=>['id'=>'DESC']
        ];
        $queueSubmissions = $this->paginate($this->QueueSubmissions);
        //~ var_dump($videos);
        //~ die();
        if ($this->request->is('post')) {
			if($this->request->getData('export') == '1'){


				 $queueSubmissions = $this->QueueSubmissions->find('all',[
                            'contain' => ['Users'],
							'conditions'=>$conditions
				 ]);


				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();

				$arrayData = [

						['Message', 'Member','Supplier','Created Date']
					];
                $this->loadModel('Users');

				foreach($queueSubmissions as $k=>$article){
					$k++;

					$created = new FrozenDate($article->created);

                    $member = $this->Users->get($article->member_id);

					$arrayData[$k][]= $article->message;
					$arrayData[$k][]= $member->first_name.' '.$member->last_name;
					$arrayData[$k][]= $article->user->first_name.' '.$article->user->last_name;
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

				$filename = 'queue_submissions_report_'.date('ymd_His');
				$response = $this->response;

				return $response->withType('xlsx')
					->withHeader('Content-Disposition', "attachment;filename=\"{$filename}.xlsx\"")
					->withBody($stream);
			}
		}


        $this->set(compact('queueSubmissions'));
    }


    /**
     * View method
     *
     * @param string|null $id Queue Submission id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $queueSubmission = $this->QueueSubmissions->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('queueSubmission'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $queueSubmission = $this->QueueSubmissions->newEmptyEntity();
        if ($this->request->is('post')) {
            $queueSubmission = $this->QueueSubmissions->patchEntity($queueSubmission, $this->request->getData());
            if ($this->QueueSubmissions->save($queueSubmission)) {
                $this->Flash->success(__('The queue submission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The queue submission could not be saved. Please, try again.'));
        }
        $usersmem = $this->QueueSubmissions->Users->find('list', ['limit' => 200])->where(['role'=>'member'])->all();
        $users = $this->QueueSubmissions->Users->find('list', ['limit' => 200])->where(['role'=>'supplier'])->all();
        $this->set(compact('queueSubmission', 'users','usersmem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Queue Submission id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $queueSubmission = $this->QueueSubmissions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $queueSubmission = $this->QueueSubmissions->patchEntity($queueSubmission, $this->request->getData());
            if ($this->QueueSubmissions->save($queueSubmission)) {
                $this->Flash->success(__('The queue submission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The queue submission could not be saved. Please, try again.'));
        }
        $usersmem = $this->QueueSubmissions->Users->find('list', ['limit' => 200])->where(['role'=>'member'])->all();
        $users = $this->QueueSubmissions->Users->find('list', ['limit' => 200])->where(['role'=>'supplier'])->all();
        $this->set(compact('queueSubmission', 'users','usersmem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Queue Submission id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $queueSubmission = $this->QueueSubmissions->get($id);
        if ($this->QueueSubmissions->delete($queueSubmission)) {
            $this->Flash->success(__('The queue submission has been deleted.'));
        } else {
            $this->Flash->error(__('The queue submission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
