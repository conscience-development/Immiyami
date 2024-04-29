<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Session\DatabaseSession;

/**
 * XmlSubmissions Controller
 *
 * @property \App\Model\Table\XmlSubmissionsTable $XmlSubmissions
 * @method \App\Model\Entity\XmlSubmission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmlSubmissionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['XmlSheets', 'XmlCountries', 'XmlVisatypes', 'XmlQualifications', 'Users'],
        ];
        $xmlSubmissions = $this->paginate($this->XmlSubmissions);

        $this->set(compact('xmlSubmissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Xml Submission id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $xmlSubmission = $this->XmlSubmissions->get($id, [
            'contain' => ['XmlSheets', 'XmlCountries', 'XmlVisatypes', 'XmlQualifications', 'Users'],
        ]);

        $this->set(compact('xmlSubmission'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $xmlSubmission = $this->XmlSubmissions->newEmptyEntity();
        if ($this->request->is('post')) {
            $xmlSubmission = $this->XmlSubmissions->patchEntity($xmlSubmission, $this->request->getData());
            if ($this->XmlSubmissions->save($xmlSubmission)) {
                $this->Flash->success(__('The xml submission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml submission could not be saved. Please, try again.'));
        }
        $xmlSheets = $this->XmlSubmissions->XmlSheets->find('list', ['limit' => 200])->all();
        $xmlCountries = $this->XmlSubmissions->XmlCountries->find('list', ['limit' => 200])->all();
        $xmlVisatypes = $this->XmlSubmissions->XmlVisatypes->find('list', ['limit' => 200])->all();
        $xmlQualifications = $this->XmlSubmissions->XmlQualifications->find('list', ['limit' => 200])->all();
        $users = $this->XmlSubmissions->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlSubmission', 'xmlSheets', 'xmlCountries', 'xmlVisatypes', 'xmlQualifications', 'users'));
    }
    //save Ajax Data
    public function addDataAjex()
    {
        $xmlSubmission = $this->XmlSubmissions->newEmptyEntity();
        $session = $this->getRequest()->getSession();
        if ($this->request->is('post')) {
            // var_dump($this->request->getData('dataset'));
            // die();
            // $xmlSubmission = $this->XmlSubmissions->patchEntity($xmlSubmission, $this->request->getData());
            $saveDataset = $session->write('Quiz.dataset',$this->request->getData('dataset'));
            $saveXmlCountry = $session->read('Quiz.saveXmlCountry');
            $saveXmlVisatype = $session->read('Quiz.saveXmlVisatype');
            $saveXmlQualification = $session->read('Quiz.saveXmlQualification');
            $xmlSheetId = $session->read('Quiz.xmlSheetId');

            if(empty($this->Auth->User('id'))){
                $session->write('Quiz.red','1');
                //$this->Flash->error(__('Please login first for get your results.'));
                echo 'rediret';
                die();
            }

            $xmlSubmission->xml_sheet_id =$xmlSheetId;
            $xmlSubmission->xml_country_id =$saveXmlCountry;
            $xmlSubmission->xml_vsatype_id =$saveXmlVisatype;
            $xmlSubmission->xml_qualification_id =$saveXmlQualification;
            $xmlSubmission->user_id =$this->Auth->User('id');

            if ($this->XmlSubmissions->save($xmlSubmission)) {
                // $this->Flash->success(__('The xml submission has been saved.'));
                $saveDataset = $session->read('Quiz.dataset');
                $this->loadModel('XmlSubmissionAnswers');
                foreach($saveDataset as $d){
                    $xmlSubmissionAnswer = $this->XmlSubmissionAnswers->newEmptyEntity();
                    $xmlSubmissionAnswer->criteria_id = $d['q'];
                    $xmlSubmissionAnswer->criteria_answer_id = $d['a'];
                    $xmlSubmissionAnswer->xml_submission_id = $xmlSubmission->id;
                    if ($this->XmlSubmissionAnswers->save($xmlSubmissionAnswer)) {

                    }
                }

                echo 'Done';
                die();
                // return $this->redirect(['action' => 'index']);
            }
            // $this->Flash->error(__('The xml submission could not be saved. Please, try again.'));
            echo 'Err';
        }

    die();
    }

    /**
     * Edit method
     *
     * @param string|null $id Xml Submission id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $xmlSubmission = $this->XmlSubmissions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $xmlSubmission = $this->XmlSubmissions->patchEntity($xmlSubmission, $this->request->getData());
            if ($this->XmlSubmissions->save($xmlSubmission)) {
                $this->Flash->success(__('The xml submission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The xml submission could not be saved. Please, try again.'));
        }
        $xmlSheets = $this->XmlSubmissions->XmlSheets->find('list', ['limit' => 200])->all();
        $xmlCountries = $this->XmlSubmissions->XmlCountries->find('list', ['limit' => 200])->all();
        $xmlVisatypes = $this->XmlSubmissions->XmlVisatypes->find('list', ['limit' => 200])->all();
        $xmlQualifications = $this->XmlSubmissions->XmlQualifications->find('list', ['limit' => 200])->all();
        $users = $this->XmlSubmissions->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('xmlSubmission', 'xmlSheets', 'xmlCountries', 'xmlVisatypes', 'xmlQualifications', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Xml Submission id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $xmlSubmission = $this->XmlSubmissions->get($id);
        if ($this->XmlSubmissions->delete($xmlSubmission)) {
            $this->Flash->success(__('The xml submission has been deleted.'));
        } else {
            $this->Flash->error(__('The xml submission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
