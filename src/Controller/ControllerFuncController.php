<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ControllerFunc Controller
 *
 * @property \App\Model\Table\ControllerFuncTable $ControllerFunc
 * @method \App\Model\Entity\ControllerFunc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ControllerFuncController extends AppController
{
    public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('Search.Search', [
			// This is default config. You can modify "actions" as needed to make
			// the Search component work only for specified methods.
			'actions' => ['index'],
		]);
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$query = $this->ControllerFunc
        // Use the plugins 'search' custom finder and pass in the
        // processed query params
        ->find('search', ['search' => $this->request->getQueryParams()]);

		$this->set('controllerFunc', $this->paginate($query));
        //~ $controllerFunc = $this->paginate($this->ControllerFunc);

        //~ $this->set(compact('controllerFunc'));
    }

    /**
     * View method
     *
     * @param string|null $id Controller Func id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $controllerFunc = $this->ControllerFunc->get($id, [
            'contain' => ['Access'],
        ]);

        $this->set(compact('controllerFunc'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $controllerFunc = $this->ControllerFunc->newEmptyEntity();
        if ($this->request->is('post')) {
            $controllerFunc = $this->ControllerFunc->patchEntity($controllerFunc, $this->request->getData());
            if ($this->ControllerFunc->save($controllerFunc)) {
                $this->Flash->success(__('The controller func has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The controller func could not be saved. Please, try again.'));
        }
        $this->set(compact('controllerFunc'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Controller Func id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $controllerFunc = $this->ControllerFunc->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $controllerFunc = $this->ControllerFunc->patchEntity($controllerFunc, $this->request->getData());
            if ($this->ControllerFunc->save($controllerFunc)) {
                $this->Flash->success(__('The controller func has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The controller func could not be saved. Please, try again.'));
        }
        $this->set(compact('controllerFunc'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Controller Func id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $controllerFunc = $this->ControllerFunc->get($id);
        if ($this->ControllerFunc->delete($controllerFunc)) {
            $this->Flash->success(__('The controller func has been deleted.'));
        } else {
            $this->Flash->error(__('The controller func could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    //Multi Action
    public function multiAction()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
			//~ print_r($this->request->getData());
			$statusGet = $this->request->getData('status');
			foreach($this->request->getData('info') as $id){
				$get_data = $this->ControllerFunc->get($id);
				if ($statusGet == '2') {
					if ($this->ControllerFunc->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->ControllerFunc->save($get_data)) {
							echo '1';
						} else {
							echo '0';
						}
				}
			}
			
		}else{
			echo 'not Post';
		}
        die();
    }
}
