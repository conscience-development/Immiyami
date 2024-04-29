<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ActivityLogs Controller
 *
 * @property \App\Model\Table\ActivityLogsTable $ActivityLogs
 * @method \App\Model\Entity\ActivityLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActivityLogsController extends AppController
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
        // $query = $this->ActivityLogs
        // Use the plugins 'search' custom finder and pass in the
        // processed query params
        // ->find('search', ['search' => $this->request->getQueryParams()])
        // // You can add extra things to the query if you need to
        // ->contain([]);

		// $this->set('activityLogs', $this->paginate($query));

        // $query = $this->ActivityLogs
		// 	// Use the plugins 'search' custom finder and pass in the
		// 	// processed query params
		// 	->find('search', ['search' => $this->request->getQueryParams(),
        //         'conditions' => ['scope_model !=' => '\App'],
        //         'order'=>['id'=>'DESC']
        //     ]);
            // $query = $this->ActivityLogs
			// // Use the plugins 'search' custom finder and pass in the
			// // processed query params
			// ->find('search', ['search' => $this->request->getQueryParams()])
			// // You can add extra things to the query if you need to
			// ->where(['scope_model !=' => '\App'])//->order(['id'=>'DESC']);
            // $this->set('activityLogs', $this->paginate($query));

        $this->paginate = [
            'contain' => [],
            'conditions' => ['scope_model !=' => '\App'],
            'order'=>['id'=>'DESC']
        ];
        $activityLogs = $this->paginate($this->ActivityLogs);

        $this->set(compact('activityLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Activity Log id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activityLog = $this->ActivityLogs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('activityLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activityLog = $this->ActivityLogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $activityLog = $this->ActivityLogs->patchEntity($activityLog, $this->request->getData());
            if ($this->ActivityLogs->save($activityLog)) {
                $this->Flash->success(__('The activity log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activity log could not be saved. Please, try again.'));
        }
        $scopes = $this->ActivityLogs->Scopes->find('list', ['limit' => 200])->all();
        $issuers = $this->ActivityLogs->Issuers->find('list', ['limit' => 200])->all();
        $objects = $this->ActivityLogs->Objects->find('list', ['limit' => 200])->all();
        $this->set(compact('activityLog', 'scopes', 'issuers', 'objects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity Log id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activityLog = $this->ActivityLogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activityLog = $this->ActivityLogs->patchEntity($activityLog, $this->request->getData());
            if ($this->ActivityLogs->save($activityLog)) {
                $this->Flash->success(__('The activity log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activity log could not be saved. Please, try again.'));
        }
        $scopes = $this->ActivityLogs->Scopes->find('list', ['limit' => 200])->all();
        $issuers = $this->ActivityLogs->Issuers->find('list', ['limit' => 200])->all();
        $objects = $this->ActivityLogs->Objects->find('list', ['limit' => 200])->all();
        $this->set(compact('activityLog', 'scopes', 'issuers', 'objects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity Log id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activityLog = $this->ActivityLogs->get($id);
        if ($this->ActivityLogs->delete($activityLog)) {
            $this->Flash->success(__('The activity log has been deleted.'));
        } else {
            $this->Flash->error(__('The activity log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
