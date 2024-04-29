<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UserLogs Controller
 *
 * @property \App\Model\Table\UserLogsTable $UserLogs
 * @method \App\Model\Entity\UserLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserLogsController extends AppController
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
        $userLogs = $this->paginate($this->UserLogs);

        $this->set(compact('userLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id User Log id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userLog = $this->UserLogs->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('userLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userLog = $this->UserLogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $userLog = $this->UserLogs->patchEntity($userLog, $this->request->getData());
            if ($this->UserLogs->save($userLog)) {
                $this->Flash->success(__('The user log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user log could not be saved. Please, try again.'));
        }
        $users = $this->UserLogs->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userLog', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Log id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userLog = $this->UserLogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userLog = $this->UserLogs->patchEntity($userLog, $this->request->getData());
            if ($this->UserLogs->save($userLog)) {
                $this->Flash->success(__('The user log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user log could not be saved. Please, try again.'));
        }
        $users = $this->UserLogs->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userLog', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Log id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userLog = $this->UserLogs->get($id);
        if ($this->UserLogs->delete($userLog)) {
            $this->Flash->success(__('The user log has been deleted.'));
        } else {
            $this->Flash->error(__('The user log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
