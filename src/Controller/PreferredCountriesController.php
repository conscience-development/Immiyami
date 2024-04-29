<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PreferredCountries Controller
 *
 * @property \App\Model\Table\PreferredCountriesTable $PreferredCountries
 * @method \App\Model\Entity\PreferredCountry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PreferredCountriesController extends AppController
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

    try {
        // Check if query parameters are present
        if (!empty($this->request->getQuery())) {
            // Example: Filtering by name
            if (!empty($this->request->getQuery('q'))) {
                $searchTerm = $this->request->getQuery('q');
                // Adjust the condition to match any relevant field in the PreferredCountries table
                $conditions['OR'] = [
                    'PreferredCountries.name LIKE' => '%' . $searchTerm . '%',
                    // Add additional fields if needed
                ];
            }

            // Add more conditions for additional filters as needed
            // Example: Filtering by status
            if (!empty($this->request->getQuery('status'))) {
                $status = $this->request->getQuery('status');
                $conditions['PreferredCountries.status'] = $status;
            }

            // Example: Filtering by date range
            if (!empty($this->request->getQuery('daterange'))) {
                $daterange = explode('-', $this->request->getQuery('daterange'));
                $dateStart = date_create($daterange[0]);
                $dateEnd = date_create($daterange[1]);
                $conditions['PreferredCountries.created >='] = date_format($dateStart, "Y-m-d");
                $conditions['PreferredCountries.created <='] = date_format($dateEnd, "Y-m-d");
                $this->set('setDaterange', $this->request->getQuery('daterange'));
            }
        }

        // Build the query with conditions
        $query = $this->PreferredCountries
            ->find('all')
            ->where($conditions);

        // Paginate the query results
        $this->set('preferredCountries', $this->paginate($query));
    } catch (\Exception $e) {
        // Flash an error message
        $this->Flash->error('An error occurred while processing your request. Please try again later.');
    }
}

    /**
     * View method
     *
     * @param string|null $id Preferred Country id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $preferredCountry = $this->PreferredCountries->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('preferredCountry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $preferredCountry = $this->PreferredCountries->newEmptyEntity();
        if ($this->request->is('post')) {
            $preferredCountry = $this->PreferredCountries->patchEntity($preferredCountry, $this->request->getData());
            if ($this->PreferredCountries->save($preferredCountry)) {
                $this->Flash->success(__('The preferred country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The country name already exists'));
        }
        $this->set(compact('preferredCountry'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Preferred Country id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $preferredCountry = $this->PreferredCountries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $preferredCountry = $this->PreferredCountries->patchEntity($preferredCountry, $this->request->getData());
            if ($this->PreferredCountries->save($preferredCountry)) {
                $this->Flash->success(__('The preferred country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The country name already exists'));
        }
        $this->set(compact('preferredCountry'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Preferred Country id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $preferredCountry = $this->PreferredCountries->get($id);
        if ($this->PreferredCountries->delete($preferredCountry)) {
            $this->Flash->success(__('The preferred country has been deleted.'));
        } else {
            $this->Flash->error(__('The preferred country could not be deleted. Please, try again.'));
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
				$get_data = $this->PreferredCountries->get($id);
				if ($statusGet == '2') {
					if ($this->PreferredCountries->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->PreferredCountries->save($get_data)) {
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
