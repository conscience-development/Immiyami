<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Discussions Controller
 *
 * @property \App\Model\Table\DiscussionsTable $Discussions
 * @method \App\Model\Entity\Discussion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiscussionsController extends AppController
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
		$query = $this->Discussions
			// Use the plugins 'search' custom finder and pass in the
			// processed query params

			->find('search', ['search' => $this->request->getQueryParams()])->contain(['Users']);

		$this->set('discussions', $this->paginate($query));

        // $this->paginate = [
        //     'contain' => ['Users'],
        // ];
        // $discussions = $this->paginate($this->Discussions);

        // $this->set(compact('discussions'));
    }

    /**
     * View method
     *
     * @param string|null $id Discussion id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $discussion = $this->Discussions->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('discussion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $discussion = $this->Discussions->newEmptyEntity();
        if ($this->request->is('post')) {
            $discussion = $this->Discussions->patchEntity($discussion, $this->request->getData());
            if ($this->Discussions->save($discussion)) {
                $this->Flash->success(__('The discussion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The discussion could not be saved. Please, try again.'));
        }
        $users1 = $this->Discussions->Users->find('list', [
			'conditions' => [
				'role' => 'supplier',
				'status' => '1' // Add condition to fetch only active users
			],
			'limit' => 200,
			'keyField' => 'id', // Specify the field to use as keys
			'valueField' => function ($user) {
				return $user->first_name . ' ' . $user->last_name; // Concatenate first name and last name
			}
		])->all();
        $users2 = $this->Discussions->Users->find('list', [
			'conditions' => [
				'role' => 'member',
				'status' => '1' // Add condition to fetch only active users
			],
			'limit' => 200,
			'keyField' => 'id', // Specify the field to use as keys
			'valueField' => function ($user) {
				return $user->first_name . ' ' . $user->last_name; // Concatenate first name and last name
			}
		])->all();
        $this->set(compact('discussion', 'users1','users2'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Discussion id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $discussion = $this->Discussions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $discussion = $this->Discussions->patchEntity($discussion, $this->request->getData());
            if ($this->Discussions->save($discussion)) {
                $this->Flash->success(__('The discussion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The discussion could not be saved. Please, try again.'));
        }
        $users = $this->Discussions->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('discussion', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Discussion id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $discussion = $this->Discussions->get($id);
        if ($this->Discussions->delete($discussion)) {
            $this->Flash->success(__('The discussion has been deleted.'));
        } else {
            $this->Flash->error(__('The discussion could not be deleted. Please, try again.'));
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
				$get_data = $this->Discussions->get($id);
				if ($statusGet == '2') {
					if ($this->Discussions->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->Discussions->save($get_data)) {
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
