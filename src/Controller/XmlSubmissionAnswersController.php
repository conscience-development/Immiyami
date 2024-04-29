<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * XmlSubmissionAnswers Controller
 *
 * @property \App\Model\Table\XmlSubmissionAnswersTable $XmlSubmissionAnswers
 * @method \App\Model\Entity\XmlSubmissionAnswer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmlSubmissionAnswersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmlCriterias', 'XmlCriteriaAnswers'],
        ];
        $xmlSubmissionAnswers = $this->paginate($this->XmlSubmissionAnswers);

        $this->set(compact('xmlSubmissionAnswers'));
    }

    /**
     * View method
     *
     * @param string|null $id Xml Submission Answer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmlSubmissionAnswer = $this->XmlSubmissionAnswers->get($id, [
            'contain' => ['XmlCriterias', 'XmlCriteriaAnswers'],
        ]);

        $this->set(compact('xmlSubmissionAnswer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmlSubmissionAnswer = $this->XmlSubmissionAnswers->newEmptyEntity();
        if ($this->request->is('post')) {
            $xmlSubmissionAnswer = $this->XmlSubmissionAnswers->patchEntity($xmlSubmissionAnswer, $this->request->getData());
            if ($this->XmlSubmissionAnswers->save($xmlSubmissionAnswer)) {
                $this->Flash->success(__('The xml submission answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml submission answer could not be saved. Please, try again.'));
        }
        $xmlCriterias = $this->XmlSubmissionAnswers->XmlCriterias->find('list', ['limit' => 200])->all();
        $xmlCriteriaAnswers = $this->XmlSubmissionAnswers->XmlCriteriaAnswers->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlSubmissionAnswer', 'xmlCriterias', 'xmlCriteriaAnswers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Xml Submission Answer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmlSubmissionAnswer = $this->XmlSubmissionAnswers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmlSubmissionAnswer = $this->XmlSubmissionAnswers->patchEntity($xmlSubmissionAnswer, $this->request->getData());
            if ($this->XmlSubmissionAnswers->save($xmlSubmissionAnswer)) {
                $this->Flash->success(__('The xml submission answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml submission answer could not be saved. Please, try again.'));
        }
        $xmlCriterias = $this->XmlSubmissionAnswers->XmlCriterias->find('list', ['limit' => 200])->all();
        $xmlCriteriaAnswers = $this->XmlSubmissionAnswers->XmlCriteriaAnswers->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlSubmissionAnswer', 'xmlCriterias', 'xmlCriteriaAnswers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xml Submission Answer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmlSubmissionAnswer = $this->XmlSubmissionAnswers->get($id);
        if ($this->XmlSubmissionAnswers->delete($xmlSubmissionAnswer)) {
            $this->Flash->success(__('The xml submission answer has been deleted.'));
        } else {
            $this->Flash->error(__('The xml submission answer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
