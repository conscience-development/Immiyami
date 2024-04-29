<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Coupons Controller
 *
 * @property \App\Model\Table\CouponsTable $Coupons
 * @method \App\Model\Entity\Coupon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CouponsController extends AppController
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

		$conditions = [];

        if(!empty($this->request->getQuery())){
			if(!empty($this->request->getQuery('daterange'))){
				$daterange = explode('-',$this->request->getQuery('daterange'));				
				$dateStart=date_create($daterange[0]);
				$dateEnd=date_create($daterange[1]);
				$conditions['Coupons.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Coupons.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}

		if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Coupons.status'] = $getstatus[1];
				$query = $this->Coupons
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
                        //->order(['Coupons.id'=>'DESC'])
				->where($conditions);
			}else{
				$query = $this->Coupons
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
                        //->order(['Coupons.id'=>'DESC'])
				->where($conditions);
			}
		}else{
			$query = $this->Coupons
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
                        //->order(['Coupons.id'=>'DESC'])
				->where($conditions);
		}




		$this->set('coupons', $this->paginate($query));

        //~ $coupons = $this->paginate($this->Coupons);

        //~ $this->set(compact('coupons'));
    }

    /**
     * View method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('coupon'));
    }

    /**
     * addCoupon method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function addCoupon()
    {
        $coupon = $this->Coupons->find('all', [
            'contain' => ['Users'],
            'conditions' => [
                // 'code'=>'230101',
                'code'=>$this->request->getData('code'),
                'start_date <=' => date('Y-m-d'),
                'end_date >=' => date('Y-m-d'),
                ]
        ])->first();

        // $this->loadModel('Users');
        if(count(@$coupon->users) < $coupon->limitation){
            $arr = [
                'msg' => 'Coupon Activated.',
                'price' => $coupon->price,
                'status' => '1',
            ];
            echo json_encode($arr);
        }else{
            $arr = [
                'msg' => 'Coupon invalid.',
                'price' => 0,
                'status' => '0',
            ];
            echo json_encode($arr);
        }
        // var_dump($coupon->limitation);
        // var_dump(count(@$coupon->users));
        die();
        // $this->set(compact('coupon'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coupon = $this->Coupons->newEmptyEntity();
        if ($this->request->is('post')) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
        }
        $this->set(compact('coupon'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
        }
        $this->set(compact('coupon'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coupon = $this->Coupons->get($id);
        if ($this->Coupons->delete($coupon)) {
            $this->Flash->success(__('The coupon has been deleted.'));
        } else {
            $this->Flash->error(__('The coupon could not be deleted. Please, try again.'));
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
				$get_data = $this->Coupons->get($id);
				if ($statusGet == '2') {
					if ($this->Coupons->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->Coupons->save($get_data)) {
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