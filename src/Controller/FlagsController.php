<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Flags Controller
 *
 * @property \App\Model\Table\FlagsTable $Flags
 * @method \App\Model\Entity\Flag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FlagsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $flags = $this->paginate($this->Flags);

        $this->set(compact('flags'));
    }

    /**
     * View method
     *
     * @param string|null $id Flag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flag = $this->Flags->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('flag'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flag = $this->Flags->newEmptyEntity();
        if ($this->request->is('post')) {
            $flag = $this->Flags->patchEntity($flag, $this->request->getData());
            if ($this->Flags->save($flag)) {
                $this->Flash->success(__('The flag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flag could not be saved. Please, try again.'));
        }
        $this->set(compact('flag'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Flag id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flag = $this->Flags->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flag = $this->Flags->patchEntity($flag, $this->request->getData());
            if ($this->Flags->save($flag)) {
                $this->Flash->success(__('The flag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flag could not be saved. Please, try again.'));
        }
        $this->set(compact('flag'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Flag id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $flag = $this->Flags->get($id);
        if ($this->Flags->delete($flag)) {
            $this->Flash->success(__('The flag has been deleted.'));
        } else {
            $this->Flash->error(__('The flag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
