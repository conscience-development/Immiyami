<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * XmlQualifPoints Controller
 *
 * @property \App\Model\Table\XmlQualifPointsTable $XmlQualifPoints
 * @method \App\Model\Entity\XmlQualifPoint[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmlQualifPointsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $xmlQualifPoints = $this->paginate($this->XmlQualifPoints);

        $this->set(compact('xmlQualifPoints'));
    }

    /**
     * View method
     *
     * @param string|null $id Xml Qualif Point id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmlQualifPoint = $this->XmlQualifPoints->get($id, [
            'contain' => ['XmlQualifications'],
        ]);

        $this->set(compact('xmlQualifPoint'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmlQualifPoint = $this->XmlQualifPoints->newEmptyEntity();
        if ($this->request->is('post')) {
            $xmlQualifPoint = $this->XmlQualifPoints->patchEntity($xmlQualifPoint, $this->request->getData());
            if ($this->XmlQualifPoints->save($xmlQualifPoint)) {
                $this->Flash->success(__('The xml qualif point has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml qualif point could not be saved. Please, try again.'));
        }
        $this->set(compact('xmlQualifPoint'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xml Qualif Point id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmlQualifPoint = $this->XmlQualifPoints->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmlQualifPoint = $this->XmlQualifPoints->patchEntity($xmlQualifPoint, $this->request->getData());
            if ($this->XmlQualifPoints->save($xmlQualifPoint)) {
                $this->Flash->success(__('The xml qualif point has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml qualif point could not be saved. Please, try again.'));
        }
        $this->set(compact('xmlQualifPoint'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xml Qualif Point id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmlQualifPoint = $this->XmlQualifPoints->get($id);
        if ($this->XmlQualifPoints->delete($xmlQualifPoint)) {
            $this->Flash->success(__('The xml qualif point has been deleted.'));
        } else {
            $this->Flash->error(__('The xml qualif point could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
