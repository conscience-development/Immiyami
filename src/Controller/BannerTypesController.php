<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BannerTypes Controller
 *
 * @property \App\Model\Table\BannerTypesTable $BannerTypes
 * @method \App\Model\Entity\BannerType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BannerTypesController extends AppController
{
    public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('Search.Search', [
			// This is default config. You can modify "actions" as needed to make
			// the Search component work only for specified methods.
			'actions' => ['index'],
		]);

        $this->paginate = [
            'order'=>['id'=>'DESC']
        ];
        
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$query = $this->BannerTypes
        // Use the plugins 'search' custom finder and pass in the
        // processed query params
        ->find('search', ['search' => $this->request->getQueryParams()])
        // You can add extra things to the query if you need to
        //~ ->contain(['ControllerFunc','Users'])
        ->where(['name IS NOT' => null]);

		$this->set('bannerTypes', $this->paginate($query));
		
        //~ $bannerTypes = $this->paginate($this->BannerTypes);

        //~ $this->set(compact('bannerTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Banner Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bannerType = $this->BannerTypes->get($id, [
            'contain' => ['Banners'],
        ]);

        $this->set(compact('bannerType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $bannerType = $this->BannerTypes->newEmptyEntity();
    if ($this->request->is('post')) {
        $bannerType = $this->BannerTypes->patchEntity($bannerType, $this->request->getData());
        
        // Check if the banner type already exists
        $existingBannerType = $this->BannerTypes->find('all')
            ->where(['name' => $bannerType->name])
            ->first();

        if ($existingBannerType) {
            $this->Flash->error(__('The banner type "{0}" already exists. Please, choose a different name.', $bannerType->name));
        } else {
            if ($this->BannerTypes->save($bannerType)) {
                $this->Flash->success(__('The banner type has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banner type could not be saved. Please, try again.'));
        }
    }
    $this->set(compact('bannerType'));
}


    /**
     * Edit method
     *
     * @param string|null $id Banner Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
{
    $bannerType = $this->BannerTypes->get($id, [
        'contain' => [],
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
        $newBannerTypeData = $this->request->getData();
        $existingBannerType = $this->BannerTypes->find('all')
            ->where(['name' => $newBannerTypeData['name']])
            ->where(['id !=' => $id]) // Exclude the current banner type being edited
            ->first();

        if ($existingBannerType) {
            $this->Flash->error(__('The banner type "{0}" already exists. Please, choose a different name.', $newBannerTypeData['name']));
        } else {
            $bannerType = $this->BannerTypes->patchEntity($bannerType, $newBannerTypeData);
            if ($this->BannerTypes->save($bannerType)) {
                $this->Flash->success(__('The banner type has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banner type could not be saved. Please, try again.'));
        }
    }
    $this->set(compact('bannerType'));
}


    /**
     * Delete method
     *
     * @param string|null $id Banner Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bannerType = $this->BannerTypes->get($id);
        if ($this->BannerTypes->delete($bannerType)) {
            $this->Flash->success(__('The banner type has been deleted.'));
        } else {
            $this->Flash->error(__('The banner type could not be deleted. Please, try again.'));
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
				$get_data = $this->BannerTypes->get($id);
				if ($statusGet == '2') {
					if ($this->BannerTypes->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->BannerTypes->save($get_data)) {
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
