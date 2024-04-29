<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Workingcountries Controller
 *
 * @property \App\Model\Table\WorkingcountriesTable $Workingcountries
 * @method \App\Model\Entity\Workingcountry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkingcountriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countries', 'Users'],
        ];
        $workingcountries = $this->paginate($this->Workingcountries);

        $this->set(compact('workingcountries'));
    }

    /**
     * View method
     *
     * @param string|null $id Workingcountry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workingcountry = $this->Workingcountries->get($id, [
            'contain' => ['Countries', 'Users'],
        ]);

        $this->set(compact('workingcountry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workingcountry = $this->Workingcountries->newEmptyEntity();
        if ($this->request->is('post')) {
            $workingcountry = $this->Workingcountries->patchEntity($workingcountry, $this->request->getData());
            if ($this->Workingcountries->save($workingcountry)) {
                $this->Flash->success(__('The workingcountry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The workingcountry could not be saved. Please, try again.'));
        }
        $countries = $this->Workingcountries->Countries->find('list', ['limit' => 200])->all();
        $users = $this->Workingcountries->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('workingcountry', 'countries', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Workingcountry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workingcountry = $this->Workingcountries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workingcountry = $this->Workingcountries->patchEntity($workingcountry, $this->request->getData());
            if ($this->Workingcountries->save($workingcountry)) {
                $this->Flash->success(__('The workingcountry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The workingcountry could not be saved. Please, try again.'));
        }
        $countries = $this->Workingcountries->Countries->find('list', ['limit' => 200])->all();
        $users = $this->Workingcountries->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('workingcountry', 'countries', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Workingcountry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workingcountry = $this->Workingcountries->get($id);
        if ($this->Workingcountries->delete($workingcountry)) {
            $this->Flash->success(__('The workingcountry has been deleted.'));
        } else {
            $this->Flash->error(__('The workingcountry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
