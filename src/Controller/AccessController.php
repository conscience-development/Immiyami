<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Access Controller
 *
 * @property \App\Model\Table\AccessTable $Access
 * @method \App\Model\Entity\Acces[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccessController extends AppController
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
		$query = $this->Access
        // Use the plugins 'search' custom finder and pass in the
        // processed query params
        ->find('search', ['search' => $this->request->getQueryParams()])
        // You can add extra things to the query if you need to
        ->contain(['ControllerFunc','Users']);

		$this->set('access', $this->paginate($query));
		
        //~ $this->paginate = [
            //~ 'contain' => ['Users', 'ControllerFunc'],
        //~ ];
        //~ $access = $this->paginate($this->Access);

        //~ $this->set(compact('access'));
    }

    /**
     * View method
     *
     * @param string|null $id Acces id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $acces = $this->Access->get($id, [
            'contain' => ['Users', 'ControllerFunc'],
        ]);

        $this->set(compact('acces'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $acces = $this->Access->newEmptyEntity();
        if ($this->request->is('post')) {
            $acces = $this->Access->patchEntity($acces, $this->request->getData());
            if ($this->Access->save($acces)) {
                $this->Flash->success(__('The acces has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The acces could not be saved. Please, try again.'));
        }
        $users = $this->Access->Users->find('list', ['limit' => 200])->all();
        $controllerFunc = $this->Access->ControllerFunc->find('list', ['limit' => 200])->all();
        $this->set(compact('acces', 'users', 'controllerFunc'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Acces id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $acces = $this->Access->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $acces = $this->Access->patchEntity($acces, $this->request->getData());
            if ($this->Access->save($acces)) {
                $this->Flash->success(__('The acces has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The acces could not be saved. Please, try again.'));
        }
        $users = $this->Access->Users->find('list', ['limit' => 200])->all();
        $controllerFunc = $this->Access->ControllerFunc->find('list', ['limit' => 200])->all();
        $this->set(compact('acces', 'users', 'controllerFunc'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Acces id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $acces = $this->Access->get($id);
        if ($this->Access->delete($acces)) {
            $this->Flash->success(__('The acces has been deleted.'));
        } else {
            $this->Flash->error(__('The acces could not be deleted. Please, try again.'));
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
				$get_data = $this->Access->get($id);
				if ($statusGet == '2') {
					if ($this->Access->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->Access->save($get_data)) {
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
