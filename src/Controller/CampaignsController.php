<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Campaigns Controller
 *
 * @property \App\Model\Table\CampaignsTable $Campaigns
 * @method \App\Model\Entity\Campaign[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CampaignsController extends AppController

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
        // $conditions = [];
        // if(!empty($this->request->getQuery())){
		// 	if(!empty($this->request->getQuery('daterange'))){
		// 		$daterange = explode('-',$this->request->getQuery('daterange'));				
		// 		$dateStart=date_create($daterange[0]);
		// 		$dateEnd=date_create($daterange[1]);
		// 		$conditions['Campaigns.created >='] = date_format($dateStart,"Y-m-d");
		// 		$conditions['Campaigns.created <='] = date_format($dateEnd,"Y-m-d");
		// 		$this->set('setDaterange', $this->request->getQuery('daterange'));
		// 	}
		// }
        // $query = $this->Campaigns
		// 	// Use the plugins 'search' custom finder and pass in the
		// 	// processed query params
		// 	->find('search', ['search' => $this->request->getQueryParams()])
        //                 //->order(['Campaigns.id'=>'DESC']);
		// 	// You can add extra things to the query if you need to
		// 		// ->where($conditions);

        // $campaigns = $this->paginate(query);

        // $this->set(compact('campaigns'));

        // //  $campaigns = $this->paginate($this->Campaigns);

        // //  $this->set(compact('campaigns'));


        $conditions = [];

		if(!empty($this->request->getQuery())){
			if(!empty($this->request->getQuery('daterange'))){
				$daterange = explode('-',$this->request->getQuery('daterange'));				
				$dateStart=date_create($daterange[0]);
				$dateEnd=date_create($daterange[1]);
				$conditions['Campaigns.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Campaigns.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}


		if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Campaigns.status'] = $getstatus[1];
				$query = $this->Campaigns
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
                        //->order(['Campaigns.id'=>'DESC'])
				->where($conditions);
			}else{
				$query = $this->Campaigns
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
                        //->order(['Campaigns.id'=>'DESC'])
				// You can add extra things to the query if you need to
				->where($conditions);
			}
		}else{
			$query = $this->Campaigns
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
                        //->order(['Campaigns.id'=>'DESC'])
			// You can add extra things to the query if you need to
				->where($conditions);
		}



		$this->set('campaigns', $this->paginate($query));

        
    }

    /**
     * View method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('campaign'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $campaign = $this->Campaigns->newEmptyEntity();
        if ($this->request->is('post')) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->getData());
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
        }
        $this->set(compact('campaign'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $campaign = $this->Campaigns->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campaign = $this->Campaigns->patchEntity($campaign, $this->request->getData());
            if ($this->Campaigns->save($campaign)) {
                $this->Flash->success(__('The campaign has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campaign could not be saved. Please, try again.'));
        }
        $this->set(compact('campaign'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Campaign id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $campaign = $this->Campaigns->get($id);
        if ($this->Campaigns->delete($campaign)) {
            $this->Flash->success(__('The campaign has been deleted.'));
        } else {
            $this->Flash->error(__('The campaign could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}