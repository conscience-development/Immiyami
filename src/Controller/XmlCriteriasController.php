<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * XmlCriterias Controller
 *
 * @property \App\Model\Table\XmlCriteriasTable $XmlCriterias
 * @method \App\Model\Entity\XmlCriteria[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmlCriteriasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmlQualifications'],
        ];
        $xmlCriterias = $this->paginate($this->XmlCriterias);

        $this->set(compact('xmlCriterias'));
    }

    /**
     * View method
     *
     * @param string|null $id Xml Criteria id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmlCriteria = $this->XmlCriterias->get($id, [
            'contain' => ['XmlQualifications'],
        ]);

        $this->set(compact('xmlCriteria'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmlCriteria = $this->XmlCriterias->newEmptyEntity();
        if ($this->request->is('post')) {
            $xmlCriteria = $this->XmlCriterias->patchEntity($xmlCriteria, $this->request->getData());
            if ($this->XmlCriterias->save($xmlCriteria)) {
                $this->Flash->success(__('The xml criteria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml criteria could not be saved. Please, try again.'));
        }
        $xmlQualifications = $this->XmlCriterias->XmlQualifications->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlCriteria', 'xmlQualifications'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xml Criteria id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmlCriteria = $this->XmlCriterias->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmlCriteria = $this->XmlCriterias->patchEntity($xmlCriteria, $this->request->getData());
            if ($this->XmlCriterias->save($xmlCriteria)) {
                $this->Flash->success(__('The xml criteria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml criteria could not be saved. Please, try again.'));
        }
        $xmlQualifications = $this->XmlCriterias->XmlQualifications->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlCriteria', 'xmlQualifications'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xml Criteria id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmlCriteria = $this->XmlCriterias->get($id);
        if ($this->XmlCriterias->delete($xmlCriteria)) {
            $this->Flash->success(__('The xml criteria has been deleted.'));
        } else {
            $this->Flash->error(__('The xml criteria could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
