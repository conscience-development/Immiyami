<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Helps Controller
 *
 * @property \App\Model\Table\HelpsTable $Helps
 * @method \App\Model\Entity\Help[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HelpsController extends AppController
{
    public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('Search.Search', [
			// This is default config. You can modify "actions" as needed to make
			// the Search component work only for specified methods.
			'actions' => ['index'],
		]);
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
				$conditions['Helps.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Helps.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}

		$conditions['Helps.title IS NOT'] = NULL;

		if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Helps.status'] = $getstatus[1];
				$query = $this->Helps
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				// ->contain(['Users'])
				->where($conditions);
			}else{
				$query = $this->Helps
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				// ->contain(['Users'])
				->where($conditions);
			}
		}else{
			$query = $this->Helps
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			// ->contain()
				->where($conditions);
		}


		$this->set('helps', $this->paginate($query));

        // $helps = $this->paginate($this->Helps);

        // $this->set(compact('helps'));
    }

    /**
     * View method
     *
     * @param string|null $id Help id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $help = $this->Helps->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('help'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $help = $this->Helps->newEmptyEntity();
        if ($this->request->is('post')) {
            $help = $this->Helps->patchEntity($help, $this->request->getData());
            if ($this->Helps->save($help)) {
                $this->Flash->success(__('The help has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The help could not be saved. Please, try again.'));
        }
        $this->set(compact('help'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Help id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $help = $this->Helps->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $help = $this->Helps->patchEntity($help, $this->request->getData());
            if ($this->Helps->save($help)) {
                $this->Flash->success(__('The help has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The help could not be saved. Please, try again.'));
        }
        $this->set(compact('help'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Help id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $help = $this->Helps->get($id);
        if ($this->Helps->delete($help)) {
            $this->Flash->success(__('The help has been deleted.'));
        } else {
            $this->Flash->error(__('The help could not be deleted. Please, try again.'));
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
				$get_data = $this->Helps->get($id);
				if ($statusGet == '2') {
					if ($this->Helps->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->Helps->save($get_data)) {
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