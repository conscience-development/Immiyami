<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Countries Controller
 *
 * @property \App\Model\Table\CountriesTable $Countries
 * @method \App\Model\Entity\Country[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CountriesController extends AppController
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

    // Check if query parameters are present
    if (!empty($this->request->getQuery())) {

        if (!empty($this->request->getQuery('daterange'))) {
            $daterange = explode('-', $this->request->getQuery('daterange'));
            $dateStart = date_create($daterange[0]);
            $dateEnd = date_create($daterange[1]);
            $conditions['Countries.created >='] = date_format($dateStart, "Y-m-d");
            $conditions['Countries  .created <='] = date_format($dateEnd, "Y-m-d");
            $this->set('setDaterange', $this->request->getQuery('daterange'));
        }


        
        // // Example: Filtering by name
        // if (!empty($this->request->getQuery('q'))) {
        //     $searchTerm = $this->request->getQuery('q');
        //     // Adjust the condition to match any relevant field in the PreferredCountries table
        //     $conditions['OR'] = [
        //         'Countries.name LIKE' => '%' . $searchTerm . '%',
        //         // Add additional fields if needed
        //     ];
        // }

        // // Add more conditions for additional filters as needed
        // // Example: Filtering by status
        // if (!empty($this->request->getQuery('q'))) {
        //     $filter = explode('-', $this->request->getQuery('q'));
        //     if ($filter[0] === 'status' && isset($filter[1])) {
        //         $conditions['Countries.status'] = $filter[1];
        //     }
        // }

        // // Add more conditions for additional filters as needed
        // // Example: Filtering by date range
       
    }
    if($this->request->getQuery('q')){
        $getStatus = explode('-',$this->request->getQuery(('q')));
        if($getStatus[0] == 'status'){
            $conditions['countries.status'] = $getStatus[1];
            $query = $this->Countries
                ->find('all')         
                ->where($conditions);
        }else{
            $query = $this->Countries
                ->find('search',['search'=>$this->request->getQueryParams()])
                ->where($conditions);
        }
    }else{
        $query = $this->Countries
            ->find('search', ['search' => $this->request->getQueryParams()])
            ->where($conditions);
    }

    

    // Paginate the query results
    $this->set('countries', $this->paginate($query));
}


    /**
     * View method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $country = $this->Countries->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('country'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $country = $this->Countries->newEmptyEntity();
        if ($this->request->is('post')) {
            $country = $this->Countries->patchEntity($country, $this->request->getData());
            if ($this->Countries->save($country)) {
                $this->Flash->success(__('The country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The country could not be saved. Please, try again.'));
        }
        $this->set(compact('country'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $country = $this->Countries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $country = $this->Countries->patchEntity($country, $this->request->getData());
            if ($this->Countries->save($country)) {
                $this->Flash->success(__('The country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The country name already exists'));
        }
        $this->set(compact('country'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $country = $this->Countries->get($id);
        if ($this->Countries->delete($country)) {
            $this->Flash->success(__('The country has been deleted.'));
        } else {
            $this->Flash->error(__('The country could not be deleted. Please, try again.'));
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
				$get_data = $this->Countries->get($id);
				if ($statusGet == '2') {
					if ($this->Countries->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->Countries->save($get_data)) {
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
