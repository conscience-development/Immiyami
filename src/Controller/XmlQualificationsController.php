<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * XmlQualifications Controller
 *
 * @property \App\Model\Table\XmlQualificationsTable $XmlQualifications
 * @method \App\Model\Entity\XmlQualification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmlQualificationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmlVisatypes', 'XmlQualifPoints'],
        ];
        $xmlQualifications = $this->paginate($this->XmlQualifications);

        $this->set(compact('xmlQualifications'));
    }

    /**
     * View method
     *
     * @param string|null $id Xml Qualification id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmlQualification = $this->XmlQualifications->get($id, [
            'contain' => ['XmlVisatypes', 'XmlQualifPoints', 'XmlCriterias', 'XmlSubmissions'],
        ]);

        $this->set(compact('xmlQualification'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmlQualification = $this->XmlQualifications->newEmptyEntity();
        if ($this->request->is('post')) {
            $xmlQualification = $this->XmlQualifications->patchEntity($xmlQualification, $this->request->getData());
            if ($this->XmlQualifications->save($xmlQualification)) {
                $this->Flash->success(__('The xml qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml qualification could not be saved. Please, try again.'));
        }
        $xmlVisatypes = $this->XmlQualifications->XmlVisatypes->find('list', ['limit' => 200])->all();
        $xmlQualifPoints = $this->XmlQualifications->XmlQualifPoints->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlQualification', 'xmlVisatypes', 'xmlQualifPoints'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xml Qualification id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmlQualification = $this->XmlQualifications->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmlQualification = $this->XmlQualifications->patchEntity($xmlQualification, $this->request->getData());
            if ($this->XmlQualifications->save($xmlQualification)) {
                $this->Flash->success(__('The xml qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml qualification could not be saved. Please, try again.'));
        }
        $xmlVisatypes = $this->XmlQualifications->XmlVisatypes->find('list', ['limit' => 200])->all();
        $xmlQualifPoints = $this->XmlQualifications->XmlQualifPoints->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlQualification', 'xmlVisatypes', 'xmlQualifPoints'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xml Qualification id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmlQualification = $this->XmlQualifications->get($id);
        if ($this->XmlQualifications->delete($xmlQualification)) {
            $this->Flash->success(__('The xml qualification has been deleted.'));
        } else {
            $this->Flash->error(__('The xml qualification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
