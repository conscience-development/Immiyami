<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Routing\Router;

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
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$conditions = [];
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


		$this->set('payments', $this->paginate($query));

        //~ $this->paginate = [
            //~ 'contain' => ['Users'],
        //~ ];
        //~ $payments = $this->paginate($this->Payments);

        //~ $this->set(compact('payments'));
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
        $users = $this->Payments->Users->find('list', ['limit' => 200,'status'=>'1'])->all();
        $this->set(compact('payment', 'users'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function pay($id=null,$type = null)
    {

        // For test payments we want to enable the sandbox mode. If you want to put live
        // payments through then this setting needs changing to `false`.
        // $enableSandbox = true;
        $paypalConfig = [
            'email' => 'opps@duchyglobal.com',
            'return_url' => Router::url('/paymentOk',true),
            'cancel_url' => Router::url('/paymentFailed',true),
            'notify_url' => Router::url('/paymentNotify',true)
        ];

        // $paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';


        $payment = $this->Payments->get($id, [
            'contain' => ['Users'],
        ]);

        $cmd = '_xclick';
        $no_note = '1';
        $lc = 'USD';
        $bn = 'PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest';
        $first_name = $payment->user->first_name;
        $last_name = $payment->user->last_name;
        $payer_email = $payment->user->email;

        if($type == 'register'){
            $item_number = 'PAYID_'.$payment->id;
            $itemName = $payment->title;
            $itemAmount = $payment->price;
        }elseif($type == 'upgrade'){
            $package = $this->request->getQuery('package');
            $item_number = 'PAYIDUP_'.$payment->id;
            $itemName = 'Upgrade '.$payment->package.' to '.$package;
            if($package == 'gold'){
                $itemAmount = 8.99;
            }else{
                $itemAmount = 18.99;
            }

        }else{
            $item_number = 'PAYID_'.$payment->id;
            $itemName = $payment->title;
            $itemAmount = $payment->price;

        }

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
            // $data['custom'] = USERID;

            // Build the query string from the data.
            // $queryString = http_build_query($data);

            // Redirect to paypal IPN
            // header('location:' . $paypalUrl . '?' . $queryString);
            // exit();


            $client = "ARBMnCKqtJfLj8IytFu77fgxXYnLWC4kcxXicb0_xLwUSIAtMuS28Wpn-bdlAlIvBMw0KKZQv5vmHkuK";
            $secret = "EFRQm430rAM3OrqZZ_kKtkNim0WctNR5sXsc9TIDVF2xhybVr50XyukTC3uQP8L0e_k1vxoOFyaeOkbP";

            //Define Payment Related Test Detail
            // $email= "Yourpaypalemailid@gmail.com";
            // $fname= "Thecodehelpers";
            // $lname= "programming blog";
            // $address= "Street no 3 usa";
            // $city= "Wahington";
            // $country= "US";

            // $zip="99501";
            // $state="Alaska";
            // $phone="011554454";

            // $ccnum= "4012888888881881";
            // $credit_card_type= "visa";
            // $ccmo= "02";
            // $ccyr= "2022";
            // $cvv2_number= "123";
            // $first_name= $fname;
            // $last_name= $lname;
            // $cost= "2";

            $ch = curl_init();
            $PAYPAL_API_URL = 'https://api.sandbox.paypal.com/';
            // $PAYPAL_API_URL = 'https://api.paypal.com/';

            // curl_setopt($ch, CURLOPT_URL, $PAYPAL_API_URL."v1/oauth2/token");
            curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v1/oauth2/token');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERPWD, $client.":".$secret);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
            $result = curl_exec($ch);
            print_r($result);
            if(empty($result))die("Error: No response.");
            else
            {
            $json = json_decode($result);
            // print_r($json);
            $accessToken=$json->access_token;
            }
            $ch = curl_init();
            // $data = '{
            // "funding_instruments": [{
            // "credit_card": {
            // "number": "'. $ccnum.'",
            // "type": "'.$credit_card_type.'",
            // "expire_month": "'.$ccmo.'",
            // "expire_year": "'.$ccyr.'",
            // "cvv2": "'.$cvv2_number.'",
            // "first_name": "'.$first_name.'",
            // "last_name": "'.$last_name.'",
            // "billing_address": {
            // "line1": "'.$address.'",
            // "city": "'.$city.'",
            // "country_code": "'.$country.'",
            // "postal_code": "'.$zip.'",
            // "state": "'.$state.'",
            // "phone": "'.$phone.'"
            //             }
            //         }
            //     }]
            // },
            // "transactions": [{
            // "amount": {
            // "total": "'.$cost.'",
            // "currency": "GBP"
            // },
            // "description": "This is member subscription payment at Thecodehelpers.",
            // "item_list": {
            // "shipping_address": {
            // "recipient_name": "'.$fname.' '.$lname.'",
            // "line1": "'.$address.'",
            // "city": "'.$city.'",
            // "country_code": "'.$country.'",
            // "postal_code": "'.$zip.'",
            // "state": "'.$state.'",
            // "phone": "'.$phone.'"
            //             }
            //         }
            //     }]
            // }';
            curl_setopt($ch, CURLOPT_URL, $PAYPAL_API_URL."v1/payments/payment");
            /*curl_setopt($ch, CURLOPT_URL, “https://api.paypal.com/v1/payments/payment”);*/
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Bearer ".$json->access_token));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            $json = json_decode($result);

            $state=$json->state;
            echo "<pre>";
           print_r($json);

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
        $users = $this->Payments->Users->find('list', ['limit' => 200])->all();
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
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
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


    public function paymentOk(){

        $this->viewBuilder()->setLayout('public');

		$this->set('page', 'paymentOk');
	}
    public function paymentFailed(){

        $this->viewBuilder()->setLayout('public');

		$this->set('page', 'paymentFailed');
	}
    public function paymentNotify(){

        $this->viewBuilder()->setLayout('public');

		$this->set('page', 'paymentNotify');
	}
}
