<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * XmlCriteriaAnswers Controller
 *
 * @property \App\Model\Table\XmlCriteriaAnswersTable $XmlCriteriaAnswers
 * @method \App\Model\Entity\XmlCriteriaAnswer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmlCriteriaAnswersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmlCriterias'],
        ];
        $xmlCriteriaAnswers = $this->paginate($this->XmlCriteriaAnswers);

        $this->set(compact('xmlCriteriaAnswers'));
    }

    /**
     * View method
     *
     * @param string|null $id Xml Criteria Answer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmlCriteriaAnswer = $this->XmlCriteriaAnswers->get($id, [
            'contain' => ['XmlCriterias'],
        ]);

        $this->set(compact('xmlCriteriaAnswer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmlCriteriaAnswer = $this->XmlCriteriaAnswers->newEmptyEntity();
        if ($this->request->is('post')) {
            $xmlCriteriaAnswer = $this->XmlCriteriaAnswers->patchEntity($xmlCriteriaAnswer, $this->request->getData());
            if ($this->XmlCriteriaAnswers->save($xmlCriteriaAnswer)) {
                $this->Flash->success(__('The xml criteria answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml criteria answer could not be saved. Please, try again.'));
        }
        $xmlCriterias = $this->XmlCriteriaAnswers->XmlCriterias->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlCriteriaAnswer', 'xmlCriterias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xml Criteria Answer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmlCriteriaAnswer = $this->XmlCriteriaAnswers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmlCriteriaAnswer = $this->XmlCriteriaAnswers->patchEntity($xmlCriteriaAnswer, $this->request->getData());
            if ($this->XmlCriteriaAnswers->save($xmlCriteriaAnswer)) {
                $this->Flash->success(__('The xml criteria answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml criteria answer could not be saved. Please, try again.'));
        }
        $xmlCriterias = $this->XmlCriteriaAnswers->XmlCriterias->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlCriteriaAnswer', 'xmlCriterias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xml Criteria Answer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmlCriteriaAnswer = $this->XmlCriteriaAnswers->get($id);
        if ($this->XmlCriteriaAnswers->delete($xmlCriteriaAnswer)) {
            $this->Flash->success(__('The xml criteria answer has been deleted.'));
        } else {
            $this->Flash->error(__('The xml criteria answer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
