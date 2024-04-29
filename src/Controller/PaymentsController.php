<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Routing\Router;

use Cake\Mailer\Mailer;

//load excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Http\CallbackStream;
use Cake\I18n\FrozenDate;
use Cake\Http\Session\DatabaseSession;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
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
            'order' => ['id' => 'DESC']
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
				$conditions['Payments.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Payments.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}


        $conditions['Payments.type'] = 'member';
		if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Payments.status'] = $getstatus[1];
				$query = $this->Payments
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				->contain(['Users'])
                        //->order(['Payments.id'=>'DESC'])
				->where($conditions);
			}else{

				$query = $this->Payments
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				->contain(['Users'])
                        //->order(['Payments.id'=>'DESC'])
				->where($conditions);
			}
		}else{

			$query = $this->Payments
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			->contain(['Users'])
                        //->order(['Payments.id'=>'DESC'])
            ->where($conditions);
		}


		$this->set('payments', $this->paginate($query));

        //~ $this->paginate = [
            //~ 'contain' => ['Users'],
        //~ ];
        //~ $payments = $this->paginate($this->Payments);

        //~ $this->set(compact('payments'));
    }
    /**
     * report method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function report()
    {
		$conditions = [];



        if(!empty($this->request->getQuery())){

			if(!empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$dateStart=date_create($this->request->getQuery('start_date'));
				$dateEnd=date_create($this->request->getQuery('end_date'));
				$conditions['Payments.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Payments.created <='] = date_format($dateEnd,"Y-m-d");
			}else if(!empty($this->request->getQuery('start_date')) && empty($this->request->getQuery('end_date'))){

				$date=date_create($this->request->getQuery('start_date'));
				$conditions['Payments.created >='] = date_format($date,"Y-m-d");
			}else if(empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$date=date_create($this->request->getQuery('end_date'));
				$conditions['Payments.created <='] = date_format($date,"Y-m-d");
			}else{
				//~ die('dddd');
			}
			if($this->request->getQuery('status') != ''){
				$conditions['Payments.status'] = $this->request->getQuery('status');
			}
			if($this->request->getQuery('package') != ''){
				$conditions['Payments.package'] = $this->request->getQuery('package');
			}


		}
		if(!empty($this->request->getQuery('user_id'))){
				$conditions['Payments.type'] = $this->request->getQuery('user_id');
		}else{
			// $conditions['Payments.type'] = 'member';
		}

        $this->paginate = [
            'contain' => ['Users'],
            'conditions'=>$conditions,
            'order'=>['id'=>'DESC']
        ];

        $payments = $this->paginate($this->Payments);


        if ($this->request->is('post')) {
			if($this->request->getData('export') == '1'){


				 $payments = $this->Payments->find('all',[
							'contain' => ['Users'],
							'conditions'=>$conditions
				 ]);


				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();

				$arrayData = [

						['Title', 'Price', 'Payment Date','Type','Package','Payment Status','Payment Currency','User','Created']
					];

				foreach($payments as $k=>$payment){
					$k++;
					//~ var_dump($user);
					//~ die();
					$created = new FrozenDate($payment->created);
					$payment_date = new FrozenDate($payment->payment_date);


					$arrayData[$k][]= $payment->title;
					$arrayData[$k][]= $payment->price;
					$arrayData[$k][]= $payment_date->format('Y-m-d');
					$arrayData[$k][]= $payment->type;
                    if ($payment->type == 'member') {
                        # code...
					    $arrayData[$k][]= $payment->package;
                    } else {
                        # code...
                        $arrayData[$k][]= 'Default Sponsor Payment';
                    }
					$arrayData[$k][]= @$payment->payment_status;
					$arrayData[$k][]= @$payment->payment_currency;
                    $arrayData[$k][]= @$payment->user->first_name.' '.@$payment->user->last_name;
					$arrayData[$k][]= $created->format('Y-m-d');
				}

				$sheet->fromArray(
					$arrayData,  // The data to set
					NULL,        // Array values with this value will not be set
					'A1'         // Top left coordinate of the worksheet range where
								 //    we want to set these values (default is A1)
				);


				$writer = new Xlsx($spreadsheet);
				$stream = new CallbackStream(function () use ($writer) {
					$writer->save('php://output');
				});

				$filename = 'payment_report_'.date('ymd_His');
				$response = $this->response;

				return $response->withType('xlsx')
					->withHeader('Content-Disposition', "attachment;filename=\"{$filename}.xlsx\"")
					->withBody($stream);
			}
		}





        $usersSets = [
			'sponsor' => 'Sponsors',
			'member' => 'Members',
        ];
        $this->set(compact('usersSets'));

		// $this->set('payments', $this->paginate($query));

        //~ $this->paginate = [
            //~ 'contain' => ['Users'],
        //~ ];
        //~ $payments = $this->paginate($this->Payments);

        $this->set(compact('payments'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function indexSponsor()
    {
		$conditions = [];

        $conditions['Payments.type'] = 'sponsor';
		if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Payments.status'] = $getstatus[1];
				$query = $this->Payments
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				->contain(['Users'])
				->where($conditions);
			}else{

				$query = $this->Payments
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				->contain(['Users'])
				->where($conditions);
			}
		}else{

			$query = $this->Payments
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			->contain(['Users'])
            ->where($conditions);
		}

        $this->paginate = [
            'order' => ['id' => 'DESC']
        ];


		$this->set('payments', $this->paginate($query));

        //~ $this->paginate = [
            //~ 'contain' => ['Users'],
        //~ ];
        //~ $payments = $this->paginate($this->Payments);

        //~ $this->set(compact('payments'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('payment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payment = $this->Payments->newEmptyEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $users = $this->Payments->Users->find('list', [
            'conditions'=>['Users.role'=>'member'],
            'limit' => 200])->all();
        $this->set(compact('payment', 'users'));
    }
    /**
     * Add Sponsor method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function padd()
    {
        $payment = $this->Payments->newEmptyEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'indexSponsor']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $users = $this->Payments->Users->find('list', [
			'conditions' => [
				'role' => 'sponsor',
				'status' => '1' // Add condition to fetch only active users
			],
			'limit' => 200,
			'keyField' => 'id', // Specify the field to use as keys
			'valueField' => function ($user) {
				return $user->first_name . ' ' . $user->last_name; // Concatenate first name and last name
			}
		])->all();
        $this->set(compact('payment', 'users'));
    }

    /**
     * pay method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function pay($id=null,$type = null)
    {

        $conditions = [];
        // For test payments we want to enable the sandbox mode. If you want to put live
        // payments through then this setting needs changing to `false`.
        $enableSandbox = false;


        $paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

        if($type == 'sponsor_payment'){

			$encryption = $this->request->getQuery('key');
			// Non-NULL Initialization Vector for decryption
			$decryption_iv = '1234567891011121';
			$ciphering = "AES-128-CTR";
			$options = 0;
			// Store the decryption key
			$decryption_key = "ImmiYamiPaymentKey";

			// Use openssl_decrypt() function to decrypt the data
			$decryption=openssl_decrypt ($encryption, $ciphering,
					$decryption_key, $options, $decryption_iv);

			// The decrypted string
			$idSet = explode('-',$decryption);
			// var_dump($idSet);
            // die();
            //PaymentId
            $conditions['Payments.id'] = $idSet[1];
        }

        $conditions['Payments.user_id'] = $id;

        $payment = $this->Payments->find('all', [
            'contain' => ['Users'],
            'conditions' => $conditions,
            'order'=>['Payments.id'=>'DESC']
        ])->first();

        $this->loadModel('Coupons');
        $this->loadModel('Users');
        if($this->request->getData('coupon')){
            $coupon = $this->Coupons->find('all', [
                'contain' => ['Users'],
                'conditions' => [
                    'code'=>$this->request->getData('coupon'),
                    'start_date <=' => date('Y-m-d'),
                    'end_date >=' => date('Y-m-d'),
                    ]
            ])->first();
        }else{
            $coupon = NULL;
        }


        $cmd = '_xclick';
        $no_note = '1';
        $lc = 'USD';
        $bn = 'PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest';
        $first_name = $payment->user->first_name;
        $last_name = $payment->user->last_name;
        $userId = $payment->user->id;
        $payer_email = $payment->user->email;
        // $payer_email = 'sb-fgfyu22103208@business.example.com';

        if($type == 'register'){
            $item_number = 'PAYIDMEM'.date('Ymd').$payment->id;
            $itemName = $payment->title;
            $itemAmount = $payment->price;
        }elseif($type == 'upgrade'){
            $package = $this->request->getData('package');

            if($package == 'gold'){
                $itemName = 'Upgraded free to gold';
                $itemAmount = 1;
            }else{
                if($payment->package == 'gold' && $payment->status == '1'){
                    $itemName = 'Upgraded gold to platinum';
                }else{
                    $itemName = 'Upgraded free to platinum';
                }
                $itemAmount = 1;
            }
        }else{
            $item_number = 'PAYID'.date('Ymd').$payment->id;
            $itemName = $payment->title;
            $itemAmount = $payment->price;
        }
        if($this->request->getData('coupon')){
            if(count(@$coupon->users) < @$coupon->limitation){
                $itemAmount = $itemAmount - $coupon->price;
                $user = $this->Users->get($id);
                $user->coupon_id = $coupon->id;
                if ($this->Users->save($user)) {}
            }
        }




        if($type == 'upgrade'){

            $paymentIDLast = $this->Payments->find('all', [
                'order'=>['Payments.id'=>'DESC']
            ])->first();

            $paymentID = $paymentIDLast->id + 1;
            $item_number = 'PAYIDUP'.date('Ymd').$paymentID;
            $payment = $this->Payments->newEmptyEntity();
            $payment->payment_date = date("Y-m-d H:i:s");
            $payment->txn_id = $item_number;
            $payment->price = $itemAmount;
            $payment->title = $itemName;
            $payment->package = $package;
            $payment->payment_currency = $lc;
            $payment->user_id = $id;
            if ($this->Payments->save($payment)) {
                $paymentID = $payment->id;
            }
        }else{
            $payment->payment_date = date("Y-m-d H:i:s");
            $payment->txn_id = $item_number;
            $payment->price = $itemAmount;
            $payment->title = $itemName;
            $payment->payment_currency = $lc;
            if ($this->Payments->save($payment)) {
                $paymentID = $payment->id;
            }
        }
        // die();
        // Store a string into the variable which
        $user_string = $paymentID.'-'.preg_replace('/[^\da-z ]/i', '', $itemName).'-'.preg_replace('/[^\da-z ]/i', '', $item_number).'-'.preg_replace('/[^\da-z ]/i', '', $first_name);

        // Store the cipher method
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';

        // Store the encryption key
        $encryption_key = "ImmiYamiPaymentKey";

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($user_string, $ciphering,
                    $encryption_key, $options, $encryption_iv);

        $paypalConfig = [
            'email' => 'sales@duchyglobal.com',
            'return_url' => Router::url('/paymentOk?key='.$encryption,true),
            'cancel_url' => Router::url('/paymentFailed?key='.$encryption,true),
            'notify_url' => Router::url('/paymentNotify?key='.$encryption,true)
        ];



            $data['cmd'] = $cmd;
            $data['no_note'] = $no_note;
            $data['lc'] = $lc;
            $data['bn'] = $bn;
            $data['first_name'] = $first_name;
            $data['last_name'] = $last_name;
            $data['payer_email'] = $payer_email;
            $data['item_number'] = $item_number;

            // Set the PayPal account.
            $data['business'] = $paypalConfig['email'];

            // Set the PayPal return addresses.
            $data['return'] = stripslashes($paypalConfig['return_url']);
            $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
            $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

            // Set the details about the product being purchased, including the amount
            // and currency so that these aren't overridden by the form data.
            $data['item_name'] = $itemName;
            $data['amount'] = $itemAmount;
            $data['currency_code'] = $lc;

            // Add any custom fields for the query string.
            //$data['custom'] = USERID;

            // Build the query string from the data.
            $queryString = http_build_query($data);

            // Redirect to paypal IPN
            header('location:' . $paypalUrl . '?' . $queryString);
            exit();

        die();
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $users = $this->Payments->Users->find('list', [
            'conditions'=>['Users.role'=>'member'],
            'limit' => 200])->all();
        $this->set(compact('payment', 'users'));
    }
    /**
     * Edit Sponsor method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function pedit($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'indexSponsor']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $users = $this->Payments->Users->find('list', [
            'conditions'=>['Users.role'=>'sponsor'],
            'limit' => 200])->all();
        $this->set(compact('payment', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if($payment->type == 'sponsor'){
            if ($this->Payments->delete($payment)) {
                $this->Flash->success(__('The payment has been deleted.'));
            } else {
                $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index_sponsor']);
        }else{
            if ($this->Payments->delete($payment)) {
                $this->Flash->success(__('The payment has been deleted.'));
            } else {
                $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }
        
        // return $this->redirect($this->referer());
        
    }
    //Multi Action
    public function multiAction()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
			//~ print_r($this->request->getData());
			$statusGet = $this->request->getData('status');
			foreach($this->request->getData('info') as $id){
				$get_data = $this->Payments->get($id);
				if ($statusGet == '2') {
					if ($this->Payments->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->Payments->save($get_data)) {
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


    public function paymentOk($encriptKey = null){

        $encryption = $this->request->getQuery('key');
        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';
        $ciphering = "AES-128-CTR";
        $options = 0;
        // Store the decryption key
        $decryption_key = "ImmiYamiPaymentKey";

        // Use openssl_decrypt() function to decrypt the data
        $decryption=openssl_decrypt ($encryption, $ciphering,
                $decryption_key, $options, $decryption_iv);

        // The decrypted string
        $id = explode('-',$decryption);
        $payment = $this->Payments->get($id[0], [
            'contain' => ['Users'],
        ]);
        $payment->txn_id = $id[2];
        $payment->status = '1';
        $payment->payment_status = 'approved';
        // $payment->payment_status = 'approved';

        if ($this->Payments->save($payment)) {

            $mailer = new Mailer();
                        $mailer->setEmailFormat('html')
                                    ->setTo($payment->user->email)
                                    ->setSubject('ImmiYami : Payment Success')
                                    ->setViewVars([
                                        'name'=>$payment->user->first_name.' '.$payment->user->last_name ,
                                        'title' => $payment->title,
                                        'price' => $payment->price,
                                        'payment_date' => $payment->payment_date,
                                        'payment_status' => $payment->payment_status,
                                        'txn_id' => $payment->txn_id
                                        ])
                                    ->viewBuilder()
                                        ->setTemplate('payment');

                        $mailer->deliver();

        }

        $this->viewBuilder()->setLayout('public');

		$this->set('userRole', $payment->user->role);
		$this->set('payment', $payment);
		$this->set('page', 'paymentOk');
	}
    public function paymentFailed($encriptKey = null){

        $encryption = $this->request->getQuery('key');
        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';
        $ciphering = "AES-128-CTR";
        $options = 0;
        // Store the decryption key
        $decryption_key = "ImmiYamiPaymentKey";

        // Use openssl_decrypt() function to decrypt the data
        $decryption=openssl_decrypt ($encryption, $ciphering,
                $decryption_key, $options, $decryption_iv);

        // The decrypted string
        $id = explode('-',$decryption);

        $payment = $this->Payments->get($id[0], [
            'contain' => ['Users'],
        ]);
        $payment->txn_id = $id[2];
        $payment->status = '0';
        $payment->payment_status = 'failed';
        // $payment->payment_status = 'approved';

        if ($this->Payments->save($payment)) {

        }

        $this->viewBuilder()->setLayout('public');

		$this->set('payment', $payment);

		$this->set('page', 'paymentFailed');
	}
    public function paymentNotify($encriptKey = null){

        $encryption = $this->request->getQuery('key');
        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';
        $ciphering = "AES-128-CTR";
        $options = 0;
        // Store the decryption key
        $decryption_key = "ImmiYamiPaymentKey";

        // Use openssl_decrypt() function to decrypt the data
        $decryption=openssl_decrypt ($encryption, $ciphering,
                $decryption_key, $options, $decryption_iv);

        // The decrypted string
        $id = explode('-',$decryption);

        $payment = $this->Payments->get($id[0], [
            'contain' => ['Users'],
        ]);
        $payment->txn_id = $id[2];
        $payment->status = '0';
        $payment->payment_status = 'pendding';
        // $payment->payment_status = 'approved';

        if ($this->Payments->save($payment)) {

        }

        $this->viewBuilder()->setLayout('public');

		$this->set('payment', $payment);

		$this->set('page', 'paymentNotify');
	}
}