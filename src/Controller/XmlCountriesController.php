<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * XmlCountries Controller
 *
 * @property \App\Model\Table\XmlCountriesTable $XmlCountries
 * @method \App\Model\Entity\XmlCountry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmlCountriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmlSheets'],
        ];
        $xmlCountries = $this->paginate($this->XmlCountries);

        $this->set(compact('xmlCountries'));
    }

    /**
     * View method
     *
     * @param string|null $id Xml Country id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmlCountry = $this->XmlCountries->get($id, [
            'contain' => ['XmlSheets', 'XmlSubmissions', 'XmlVisatypes'],
        ]);

        $this->set(compact('xmlCountry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmlCountry = $this->XmlCountries->newEmptyEntity();
        if ($this->request->is('post')) {
            $xmlCountry = $this->XmlCountries->patchEntity($xmlCountry, $this->request->getData());
            if ($this->XmlCountries->save($xmlCountry)) {
                $this->Flash->success(__('The xml country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml country could not be saved. Please, try again.'));
        }
        $xmlSheets = $this->XmlCountries->XmlSheets->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlCountry', 'xmlSheets'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xml Country id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmlCountry = $this->XmlCountries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmlCountry = $this->XmlCountries->patchEntity($xmlCountry, $this->request->getData());
            if ($this->XmlCountries->save($xmlCountry)) {
                $this->Flash->success(__('The xml country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml country could not be saved. Please, try again.'));
        }
        $xmlSheets = $this->XmlCountries->XmlSheets->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlCountry', 'xmlSheets'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xml Country id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmlCountry = $this->XmlCountries->get($id);
        if ($this->XmlCountries->delete($xmlCountry)) {
            $this->Flash->success(__('The xml country has been deleted.'));
        } else {
            $this->Flash->error(__('The xml country could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
