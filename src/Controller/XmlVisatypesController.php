<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * XmlVisatypes Controller
 *
 * @property \App\Model\Table\XmlVisatypesTable $XmlVisatypes
 * @method \App\Model\Entity\XmlVisatype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmlVisatypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmlCountries'],
        ];
        $xmlVisatypes = $this->paginate($this->XmlVisatypes);

        $this->set(compact('xmlVisatypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Xml Visatype id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmlVisatype = $this->XmlVisatypes->get($id, [
            'contain' => ['XmlCountries', 'XmlQualifications'],
        ]);

        $this->set(compact('xmlVisatype'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmlVisatype = $this->XmlVisatypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $xmlVisatype = $this->XmlVisatypes->patchEntity($xmlVisatype, $this->request->getData());
            if ($this->XmlVisatypes->save($xmlVisatype)) {
                $this->Flash->success(__('The xml visatype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml visatype could not be saved. Please, try again.'));
        }
        $xmlCountries = $this->XmlVisatypes->XmlCountries->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlVisatype', 'xmlCountries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xml Visatype id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmlVisatype = $this->XmlVisatypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmlVisatype = $this->XmlVisatypes->patchEntity($xmlVisatype, $this->request->getData());
            if ($this->XmlVisatypes->save($xmlVisatype)) {
                $this->Flash->success(__('The xml visatype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml visatype could not be saved. Please, try again.'));
        }
        $xmlCountries = $this->XmlVisatypes->XmlCountries->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlVisatype', 'xmlCountries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xml Visatype id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmlVisatype = $this->XmlVisatypes->get($id);
        if ($this->XmlVisatypes->delete($xmlVisatype)) {
            $this->Flash->success(__('The xml visatype has been deleted.'));
        } else {
            $this->Flash->error(__('The xml visatype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
