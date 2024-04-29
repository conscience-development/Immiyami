<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\Log\Log;


//load excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Http\CallbackStream;
use Cake\I18n\FrozenDate;
use Cake\Console\Console;
use Cake\Http\Session\DatabaseSession;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(): void
	{
		parent::initialize();
		$this->loadComponent('UserLogs');
		$this->loadComponent('Search.Search', [
			// This is default config. You can modify "actions" as needed to make
			// the Search component work only for specified methods.
			'actions' => ['index','sponsor','member','supplier'],
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
				$conditions['Users.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Users.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}
        $conditions['Users.role in'] = ['admin','user'];

		if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Users.status'] = $getstatus[1];
				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
                        //->order(['Users.id'=>'DESC'])
				->where($conditions);
			}else{

				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
                        //->order(['Users.id'=>'DESC'])
				->where($conditions);
			}
		}else{

			$query = $this->Users
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
                        //->order(['Users.id'=>'DESC'])
            ->where($conditions);
		}


		$this->set('users', $this->paginate($query));

        //~ $this->paginate = [
            //~ 'contain' => ['Categories', 'Countries', 'PreferredCountries', 'Coupons'],
        //~ ];
        //~ $users = $this->paginate($this->Users);

        //~ $this->set(compact('users'));
    }
    public function sponsor()
    {
        $conditions = [];

        if(!empty($this->request->getQuery())){
			if(!empty($this->request->getQuery('daterange'))){
				$daterange = explode('-',$this->request->getQuery('daterange'));				
				$dateStart=date_create($daterange[0]);
				$dateEnd=date_create($daterange[1]);
				$conditions['Users.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Users.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}
        $conditions['Users.role'] = 'sponsor';
        
        if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Users.status'] = $getstatus[1];
				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
            ->where($conditions);
			}else{

				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
            ->where($conditions);
			}
		}else{

			$query = $this->Users
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
            ->where($conditions);
		}

		$this->set('users', $this->paginate($query));
    }
    public function member()
    {
        $conditions = [];
        if(!empty($this->request->getQuery())){
			if(!empty($this->request->getQuery('daterange'))){
				$daterange = explode('-',$this->request->getQuery('daterange'));				
				$dateStart=date_create($daterange[0]);
				$dateEnd=date_create($daterange[1]);
				$conditions['Users.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Users.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}
        $conditions['Users.role'] = 'member';
        if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Users.status'] = $getstatus[1];
				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
            ->where($conditions);
			}else{

				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
            ->where($conditions);
			}
		}else{

			$query = $this->Users
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
            ->where($conditions);
		}


		$this->set('users', $this->paginate($query));

    }
    // Change ststus one by one  member
    public function changestatusmember($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user->status = '1';
		if ($this->Users->save($user)) {
			$this->Flash->success(__('The member has been updated.'));
		} else {
			$this->Flash->error(__('The member could not be updated. Please, try again.'));
		}

        return $this->redirect(['action' => 'member']);
    }
    // Change ststus one by one
    public function changestatussupplier($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user->status = '1';
		if ($this->Users->save($user)) {
			$this->Flash->success(__('The supplier has been updated.'));
		} else {
			$this->Flash->error(__('The supplier could not be updated. Please, try again.'));
		}

        return $this->redirect(['action' => 'supplier']);
    }
    // Change ststus one by one
    public function changestatussupplierq($id = null,$st = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user->q_active = $st;
		if ($this->Users->save($user)) {
			$this->Flash->success(__('The supplier has been updated.'));
		} else {
			$this->Flash->error(__('The supplier could not be updated. Please, try again.'));
		}

        return $this->redirect(['action' => 'supplierq']);
    }
    // Change ststus one by one
    public function changestatussupplierp($id = null,$st = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user->sup_p = $st;
		if ($this->Users->save($user)) {
			$this->Flash->success(__('The supplier has been updated.'));
		} else {
			$this->Flash->error(__('The supplier could not be updated. Please, try again.'));
		}

        return $this->redirect(['action' => 'supplierp']);
    }
    public function supplier()
    {

        $conditions = [];
        if(!empty($this->request->getQuery())){
			if(!empty($this->request->getQuery('daterange'))){
				$daterange = explode('-',$this->request->getQuery('daterange'));				
				$dateStart=date_create($daterange[0]);
				$dateEnd=date_create($daterange[1]);
				$conditions['Users.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Users.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}

        $conditions['Users.role'] = 'supplier';

        if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));

			if($getstatus[0] == 'status'){

				$conditions['Users.status'] = $getstatus[1];
				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
                ->where($conditions);
			}else{

				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
                ->where($conditions);
			}
		}else{

			$query = $this->Users
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
            ->where($conditions);
		}



		$this->set('users', $this->paginate($query));

    }

    public function supplierq()
    {
        $conditions = [];
        if(!empty($this->request->getQuery())){
			if(!empty($this->request->getQuery('daterange'))){
				$daterange = explode('-',$this->request->getQuery('daterange'));				
				$dateStart=date_create($daterange[0]);
				$dateEnd=date_create($daterange[1]);
				$conditions['Users.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Users.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}

        $conditions['Users.status'] = '1';
        $conditions['Users.q'] = '1';
        $conditions['Users.role'] = 'supplier';

        if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Users.status'] = $getstatus[1];
				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
                ->where($conditions);
			}else{

				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
                ->where($conditions);
			}
		}else{

			$query = $this->Users
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
            ->where($conditions);
		}



		$this->set('users', $this->paginate($query));

    }

    public function supplierp()
    {
        $conditions = [];
        if(!empty($this->request->getQuery())){
			if(!empty($this->request->getQuery('daterange'))){
				$daterange = explode('-',$this->request->getQuery('daterange'));				
				$dateStart=date_create($daterange[0]);
				$dateEnd=date_create($daterange[1]);
				$conditions['Users.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Users.created <='] = date_format($dateEnd,"Y-m-d");
				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}
        
        
        $conditions['Users.status'] = '1';
        $conditions['Users.role'] = 'supplier';
        if($this->request->getQuery('q')){
			$getstatus = explode('-',$this->request->getQuery('q'));
			if($getstatus[0] == 'status'){
				$conditions['Users.status'] = $getstatus[1];
				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('all')
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
                ->where($conditions);
			}else{

				$query = $this->Users
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
                ->where($conditions);
			}
		}else{

			$query = $this->Users
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			->contain(['Categories', 'Countries', 'PreferredCountries', 'Coupons'])
            ->where($conditions);
		}

		$this->set('users', $this->paginate($query));

    }

    /**
     * Report method
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
				$conditions['Users.created >='] = date_format($dateStart,"Y-m-d");
				$conditions['Users.created <='] = date_format($dateEnd,"Y-m-d");
			}else if(!empty($this->request->getQuery('start_date')) && empty($this->request->getQuery('end_date'))){

				$date=date_create($this->request->getQuery('start_date'));
				$conditions['Users.created >='] = date_format($date,"Y-m-d");
			}else if(empty($this->request->getQuery('start_date')) && !empty($this->request->getQuery('end_date'))){
				$date=date_create($this->request->getQuery('end_date'));
				$conditions['Users.created <='] = date_format($date,"Y-m-d");
			}else{
				//~ die('dddd');
			}
			if($this->request->getQuery('status') != ''){
				$conditions['Users.status'] = $this->request->getQuery('status');
			}


		}
		if(!empty($this->request->getQuery('user_id'))){
				$conditions['Users.role'] = $this->request->getQuery('user_id');
		}else{
			$conditions['Users.role in'] = ['member','sponsor','supplier'];
		}


        $this->paginate = [
            'contain' => ['Categories', 'Countries', 'PreferredCountries', 'Coupons', 'Articles', 'Banners', 'Galleries', 'Payments', 'Posts'],
            'conditions'=>$conditions
        ];
        $users = $this->paginate($this->Users);

        if ($this->request->is('post')) {
			if($this->request->getData('export') == '1'){


				 $users = $this->Users->find('all',[
							'contain' => ['Categories', 'Countries', 'PreferredCountries', 'Coupons', 'Articles', 'Banners', 'Galleries', 'Payments', 'Posts'],
							'conditions'=>$conditions
				 ]);


				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();

				$arrayData = [

						['Name', 'Email', 'Contact','Company Name','Role','Category','Country','Preferred Country','Coupon','Created Date']
					];

				foreach($users as $k=>$user){
					$k++;
					//~ var_dump($user);
					//~ die();
					$created = new FrozenDate($user->created);

					$arrayData[$k][]= @$user->first_name.' '.@$user->last_name;
					$arrayData[$k][]= $user->email;
					$arrayData[$k][]= $user->contact;
					$arrayData[$k][]= $user->company_name;
					$arrayData[$k][]= $user->role;
					$arrayData[$k][]= @$user->category->name;
					$arrayData[$k][]= @$user->country->name;
					$arrayData[$k][]= @$user->preferred_country->name;
					$arrayData[$k][]= @$user->coupon->code;
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

				$filename = 'users_report_'.date('ymd_His');
				$response = $this->response;

				return $response->withType('xlsx')
					->withHeader('Content-Disposition', "attachment;filename=\"{$filename}.xlsx\"")
					->withBody($stream);
			}
		}
        $usersSets = [
			'sponsor' => 'Sponsors',
			'supplier' => 'Supplier',
			'member' => 'Members',
        ];
        $this->set(compact('usersSets','users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function emailVerify()
    {
		if($this->request->getQuery('key')){
			$encryption = $this->request->getQuery('key');
			// Non-NULL Initialization Vector for decryption
			$decryption_iv = '1234567891011121';
			$ciphering = "AES-128-CTR";
			$options = 0;
			// Store the decryption key
			$decryption_key = "ImmiYamiVerificationKey".date('Y-m-d H:i:s');

			// Use openssl_decrypt() function to decrypt the data
			$decryption=openssl_decrypt ($encryption, $ciphering,
					$decryption_key, $options, $decryption_iv);

			// The decrypted string
			$user_id = explode('-',$decryption);
			//~ echo "Decrypted String: " . $decryption;

			$user = $this->Users->get($user_id[0]);
			if(date('Y-m-d H:i:s', strtotime($user->created. ' + 1 days')) > date("Y-m-d H:i:s")){
				$user->status = 1;
				if ($this->Users->save($user)) {
					$this->Flash->success(__('The verification has been compleated. Please Login'));
				}else{
					$this->Flash->error(__('The verification could not be compleated. Please, try again.'));
				}
			}else{

					$user->created = date("Y-m-d H:i:s");
					if ($this->Users->save($user)) {

					}
					// Store a string into the variable which
					$user_string = $user->id.'-'.preg_replace('/[^\da-z ]/i', '', $user->first_name).preg_replace('/[^\da-z ]/i', '', $user->contact).preg_replace('/[^\da-z ]/i', '', $user->last_name);

					// Store the cipher method
					$ciphering = "AES-128-CTR";

					// Use OpenSSl Encryption method
					$iv_length = openssl_cipher_iv_length($ciphering);
					$options = 0;

					// Non-NULL Initialization Vector for encryption
					$encryption_iv = '1234567891011121';

					// Store the encryption key
					$encryption_key = "ImmiYamiVerificationKey".date('Y-m-d H:i:s');;

					// Use openssl_encrypt() function to encrypt the data
					$encryption = openssl_encrypt($user_string, $ciphering,
								$encryption_key, $options, $encryption_iv);


					$hash = "https://".$_SERVER['SERVER_NAME']."/users/emailVerify?key=".$encryption;

					$mailer = new Mailer();
					$mailer->setEmailFormat('html')
								->setTo($user->email)
								->setSubject('ImmiYami : Member Registration Verification')
								->setViewVars(['name'=>$user->first_name.' '.$user->last_name , 'email' => $user->email , 'hash' => $hash])
								->viewBuilder()
									->setTemplate('memberverify');

					$mailer->deliver();

				$this->Flash->error(__('The verification has been expired. We sent a new verification link. Please, try again.'));
			}

			return $this->redirect(['action' => 'login']);
		}else{
			$this->Flash->error(__('Something went wrong. Please, try again.'));
			return $this->redirect(['action' => 'login']);
		}

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Categories', 'Countries', 'PreferredCountries', 'Coupons', 'Articles', 'Banners', 'Galleries', 'Payments', 'Posts'],
        ]);

        $this->set(compact('user'));
    }
    /**
     * Dashboard method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function dashboard()
    {

		$this->loadModel('Posts');
		$this->loadModel('Banners');

		$id = $this->Auth->User('id');
        $user = $this->Users->get($id, [
            'contain' => ['Categories', 'Countries', 'PreferredCountries', 'Coupons', 'Articles', 'Banners', 'Galleries', 'Payments', 'Posts'],
        ]);

        $tDMembers = $this->Users->find('all',[
            'conditions'=>['role'=>'member','status'=>'1']
        ])->count();
        $tDSuppliers = $this->Users->find('all',[
            'conditions'=>['role'=>'supplier','status'=>'1']
        ])->count();
        $tDPosts = $this->Posts->find('all',[
            'conditions'=>['status'=>'1']
        ])->count();
        $postsRes = $this->Posts->find('all',[
            'contain'=>['Users'],
            'conditions'=>['Posts.status'=>'1'],
            'order'=>['Posts.id'=>'DESC'],
            'limit'=>6
        ]);
        $tDBanners = $this->Banners->find('all',[
            'conditions'=>['status'=>'1']
        ])->count();




		$this->set('postsRes', @$postsRes);
		$this->set('tDBanners', @$tDBanners);
		$this->set('tDMembers', @$tDMembers);
		$this->set('tDSuppliers', @$tDSuppliers);
		$this->set('tDPosts', @$tDPosts);

        $this->set(compact('user'));
    }
    /**
     * View method member details to suplier
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function memberDetailsToQ(){

        $this->loadModel('QueueSubmissions');

        $queueSubmission = $this->QueueSubmissions->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->get($this->Auth->User('id'), [
                'contain' => ['Categories', 'Countries', 'PreferredCountries', 'Coupons', 'Articles', 'Banners', 'Galleries', 'Payments', 'Posts','XmlSubmissions'=>['XmlSheets','XmlSubmissionAnswers'=>['XmlCriteriaAnswers'], 'XmlCountries', 'XmlVisatypes', 'XmlQualifications'=>['XmlQualifPoints'], 'Users']]
            ]);
            $user->qm = '1';
            $this->Users->save($user);

            $suppliersList = $this->Users->find('all')
                            ->where(['role'=>'supplier','q_active'=>'1'])
                            //->order(['id'=>'ASC'])
                            ->all();
            $suppliersArr = [];
            foreach ($suppliersList as $key => $value) {
                $suppliersArr[]=$value->id;
            }

            $suppliersMassagedList = $this->QueueSubmissions->find('all')
                            //->order(['id'=>'ASC'])
                            ->toArray();

            $suppliersMassagedListArr = [];
            foreach ($suppliersMassagedList as $key => $value) {
                $suppliersMassagedListArr[]=$value->supplier_id;
            }

            $resultOfDif=array_diff($suppliersArr,$suppliersMassagedListArr);

            $supplireId= null;

            if(count($resultOfDif) > 0){
                $k=0;
                foreach ($resultOfDif as $key => $value) {
                    if($k == 0){
                        $supplireId = $value;
                    }
                    $k++;
                }
            }else{

                rsort($suppliersMassagedListArr);
                $suplierCountArr = array_count_values($suppliersMassagedListArr);
                $countVal = 0;
                $firstSipplir = NULL;
                $x = 0;
                foreach ($suplierCountArr as $key => $value) {
                    if($x == 0){
                        $firstSipplir = $key;
                        $x++;
                    }
                    if($countVal > $value){
                        $supplireId = $key;
                    }else{
                        $supplireId = $firstSipplir;
                    }
                    $countVal = $value;

                }
            }

            $queueSubmission->message = $this->request->getData('message');
            $queueSubmission->supplier_id = $supplireId;
            $queueSubmission->member_id = $user->id;
            if ($this->QueueSubmissions->save($queueSubmission)) {

            }

            $supplier = $this->Users->get($supplireId);

            $mname = $user->first_name.' '.$user->last_name;
            $memail = $user->email;
            $mphone = $user->phone;

            $sname = $supplier->first_name.' '.$supplier->last_name;
            $semail = $supplier->email;
            $sphone = $supplier->phone;

            // $email = new Mailer();

            $mailer = new Mailer();
            $mailer->setEmailFormat('html')
                        ->setTo($supplier->email)
                        ->setSubject('ImmiYami : You have connected with member')
                        ->setViewVars([
                            'name'=>$mname ,
                            'email' => $memail ,
                            'phone' => $mphone
                            ])
                        ->viewBuilder()
                            ->setTemplate('psup');

            // $mailer->deliver();

            // $email->setTo($supplier->email);
            // $email->setViewVars(['name'=>$mname , 'email' => $memail , 'phone' => $mphone]);
            // $email->setEmailFormat('html');
            // $email->viewBuilder()->setTemplate('psup');
            // $email->setSubject('ImmiYami : You have connected with member');

            if($mailer->deliver()){


                $mailer1 = new Mailer();
                $mailer1->setEmailFormat('html')
                            ->setTo($user->email)
                            ->setSubject('ImmiYami : You have connected with supplier')
                            ->setViewVars([
                                'name'=>$sname ,
                                'email' => $semail ,
                                'phone' => $sphone
                                ])
                            ->viewBuilder()
                                ->setTemplate('pmem');

                    //  $mailer1->deliver();


                    // $emailC = new Mailer();
                    // $emailC->setTo($user->email);
                    // $email->setViewVars(['name'=>$sname , 'email' => $semail , 'phone' => $sphone]);
                    // $emailC->setEmailFormat('html');
                    // $emailC->viewBuilder()->setTemplate('pmem');
                    // $email->setSubject('ImmiYami : You have connected with supplier');

                    if($mailer1->deliver()){
                        $this->Flash->success(__('The Mail has been successfully sent!.'));
                    }

            }else{
                $this->Flash->error(__('The Mail could not be send. Please, try again.'));
            }
        }
        return $this->redirect('/memberProfile');
        die();
    }     
    /**
     * View method memberProfil
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function memberProfile()
    {
        $user = $this->Users->get($this->Auth->User('id'), [
            'contain' => ['Categories','UserLogs', 'Countries', 'PreferredCountries', 'Coupons', 'Articles', 'Banners', 'Galleries', 'Payments', 'Posts','XmlSubmissions'=>['XmlSheets','XmlSubmissionAnswers'=>['XmlCriteriaAnswers'], 'XmlCountries', 'XmlVisatypes', 'XmlQualifications'=>['XmlQualifPoints'], 'Users']],
            //~ 'conditions' => ['role'=>'member']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // var_dump($user);
            // die();
            $loginStstus = false;
            if(!empty($this->request->getData('password'))){
                $loginStstus = true;
            }
            if ($this->Users->save($user)) {
                if(false){
                    $this->Flash->success(__('Your details has been updated. Please login with new password'));
                    $this->Auth->logout();
                    return $this->redirect(['action' => 'login']);
                }else{
                    $this->Flash->success(__('Your details has been updated.'));
                    return $this->redirect(['action' => 'memberProfile']);
                }

            }
            $this->Flash->error(__('Your details could not be updated. Please, try again.'));
        }

        if($user->payments[count($user->payments) - 1]->package == 'platinum' && $user->payments[count($user->payments) - 1]->status == '1'){
            if($user->qm == '0'){
                $this->set('memberToQ','1');
            }
        }


        $page = 'Profile - '.$user->first_name." ".$user->last_name;
        $this->loadModel('Posts');
        $posts = $this->Posts->find('all', ['contain'=>['PostImages'],'order'=>['id'=>'desc'],'limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
		$this->viewBuilder()->setLayout('public');
        $this->set(compact('user','posts','page','countries','preferredCountries'));
    }
    /**
     * View method supplierProfile
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function supplierProfile()
    {
        $user = $this->Users->get($this->Auth->User('id'), [
            'contain' => ['Categories','UserLogs', 'Countries', 'PreferredCountries', 'Coupons', 'Articles', 'Banners', 'Galleries', 'Payments', 'Posts'],
            //~ 'conditions' => ['role'=>'member']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // ~ var_dump($user);
            // ~ die();
            $loginStstus = false;
            if(!empty($this->request->getData('password'))){
                $loginStstus = true;
            }
            if ($this->Users->save($user)) {
                $this->loadModel('Workingcountries');

                    $this->Workingcountries->deleteAll(['user_id' => $user->id]);
                    
                    foreach ($this->request->getData('Countries')['_ids'] as $key => $value) {
                        # code...
                        $workingcountry = $this->Workingcountries->newEmptyEntity();
                        $workingcountry->user_id = $user->id;
                        $workingcountry->country_id = $value;
                        if ($this->Workingcountries->save($workingcountry)) {}
                    }
                if(false){
                    $this->Flash->success(__('Your details has been updated. Please login with new password'));
                    $this->Auth->logout();
                    return $this->redirect(['action' => 'login']);
                }else{
                    $this->Flash->success(__('Your details has been updated.'));
                    return $this->redirect(['action' => 'supplierProfile']);
                }

            }
            $this->Flash->error(__('Your details could not be updated. Please, try again.'));
        }
        $this->loadModel('Workingcountries');

        $workingcountries = $this->Workingcountries->find('all', [
				'conditions' => ['user_id'=>$user->id],
			]);

        $condOfCountryiesIds = [];
        $condOfCountryies = [];
        
        if(!empty($workingcountries)){
            foreach ($workingcountries as $key => $value) {
                # code...
                $condOfCountryiesIds[]=$value->country_id;
            }
        }
        if(!empty($condOfCountryiesIds)){
            $condOfCountryies['Countries.id IN'] = $condOfCountryiesIds;
        }

        $this->loadModel('Posts');
        $post = $this->Posts->newEmptyEntity();
        $page = 'Profile - '.$user->first_name." ".$user->last_name;
        if($this->request->getQuery('post-id')){
			$editPostId = $this->request->getQuery('post-id');
			$postEdit = $this->Posts->get($editPostId, [
				'contain' => ['PostImages','PostsCategories'=>['Categories'],'PostsCountries'=>['Countries']],
			]);
            // var_dump($postEdit->categories);
            $categoriesS = [];
            $countriesS = [];
            foreach ($postEdit->posts_categories as $key => $value) {
                # code...
                $categoriesS[] = $value->category_id;
            }
            foreach ($postEdit->posts_countries as $key => $value) {
                # code...
                $countriesS[] = $value->country_id;
            }
            // var_dump($categoriesS);
            // die();
            $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
            $countries = $this->Users->Countries->find('list', [
                'conditions' => $condOfCountryies,
                'limit' => 200
                ])->all();
		}else{
             $this->loadModel('Workingcountries');

        $workingcountries = $this->Workingcountries->find('all', [
				'conditions' => ['user_id'=>$user->id],
			]);

        

        $countriesSS = [];
        
        if(!empty($workingcountries)){
            foreach ($workingcountries as $key => $value) {
                # code...
                $countriesSS[]=$value->country_id;
                // echo  var_dump($countriesSS);
            }
        }else{

        }

			$postEdit = NULL;
			$categoriesS = NULL;
			$countriesS = NULL;
            $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
            $countries = $this->Users->Countries->find('list', [
                'conditions' => $condOfCountryies,
                'limit' => 200
                ])->all();
		}

        
        // var_dump($);

        $this->paginate = [
            'contain' => ['Users'],
            'conditions' =>['user_id'=>$user->id]
        ];
        $myPosts = $this->paginate($this->Posts);
        $this->set(compact('myPosts'));


        // $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $users11 = $this->Posts->Users->find('list', ['limit' => 200, 'conditions' => ['role' => 'supplier', 'status' => '1']])->all();
        $countries123 = $this->Users->Countries->find('list', ['limit' => 200, 'conditions' => ['status' => true]])->all();
		$this->viewBuilder()->setLayout('public');
        $this->set(compact('user','post','page','postEdit','countries','countriesS','countriesSS','categories','categoriesS','preferredCountries','users11','countries123','condOfCountryies'));
    }

    /**
     * View method supplierProfileView
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function supplierProfileView($id)
    {
		$userIdGet = explode('-',$id);
		$id = $userIdGet[count($userIdGet) - 1];
        $user = $this->Users->get($id, [
            'contain' => ['Categories', 'Countries', 'PreferredCountries', 'Coupons', 'Articles', 'Banners', 'Galleries', 'Payments', 'Posts'],
            //~ 'conditions' => ['role'=>'member']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            //~ var_dump($user);
            //~ die();
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your details has been updated.'));

                return $this->redirect(['action' => 'memberProfile']);
            }
            $this->Flash->error(__('Your details could not be updated. Please, try again.'));
        }
        $this->loadModel('Posts');
        $post = $this->Posts->newEmptyEntity();
        $page = 'Profile - '.$user->first_name." ".$user->last_name;
        if($this->request->getQuery('post-id')){
			$editPostId = $this->request->getQuery('post-id');
			$postEdit = $this->Posts->get($editPostId, [
				'contain' => [],
			]);
		}else{
			$postEdit = NULL;
		}

        $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
		$this->viewBuilder()->setLayout('public');
        $this->set(compact('user','post','page','postEdit','countries','preferredCountries'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $user = $this->Users->newEmptyEntity();

    if ($this->request->is('post')) {
        // Check if accessSet is empty
        $accessSet = $this->request->getData('accessSet');
        if (empty($accessSet)  && $this->request->getData('role') == 'admin') {
            $this->Flash->error(__('Access for users is required. Please select at least one access option.'));
            //return;
        }else{
            if($this->request->getData('role') == 'user'){
                $accessSet = [26,33,62,76,90,97,118,125,162];
            }
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->loadModel('Access');
                foreach ($accessSet as $acc) {
                    $access = $this->Access->newEmptyEntity();
                    $access->user_id = $user->id;
                    $access->controller_func_id = $acc;
                    $this->Access->save($access);
                }
    
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
    }

    $this->loadModel('ControllerFunc');
    $controllerFuncsArr = $this->ControllerFunc->find('all', ['contain' => []])->toArray();
    $controllerFuncs = [];
    foreach ($controllerFuncsArr as $pA) {
        $controllerFuncs[$pA['id']] = $pA['controller'] . " -> " . $pA['func'];
    }

    $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
    $countries = $this->Users->Countries->find('list', ['limit' => 200 ,'conditions' => ['status' => true]])->all();
    $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
    $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();
    $this->set(compact('user', 'categories', 'countries', 'preferredCountries', 'coupons', 'controllerFuncs'));
}

    /**
     * Add method register
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            // var_dump($this->request->getData()); 
            // die();
			if($this->request->getData('password') == $this->request->getData('c_password')){
				$user = $this->Users->patchEntity($user, $this->request->getData());
				if ($this->Users->save($user)) {
                    $this->loadModel('Workingcountries');
                    
                    foreach ($this->request->getData('Countries')['_ids'] as $key => $value) {
                        # code...
                        $workingcountry = $this->Workingcountries->newEmptyEntity();
                        $workingcountry->user_id = $user->id;
                        $workingcountry->country_id = $value;
                        if ($this->Workingcountries->save($workingcountry)) {}
                    }

					$this->loadModel('Payments');
					$payment = $this->Payments->newEmptyEntity();

					$payment->title = 'Registration payment of '.$user->first_name.' '.$user->last_name;
					if($this->request->getData('package') == 'gold'){
						$payment->price = 8.99;
					}elseif($this->request->getData('package') == 'platinum'){
						$payment->price = 18.99;
					}else{
						$payment->price = 0;
					}
                    $payment->package = 'free';

					$payment->user_id = $user->id;

					if ($this->Payments->save($payment)) {

                        // Store a string into the variable which
                        $user_string = $user->id.'-'.preg_replace('/[^\da-z ]/i', '', $user->first_name).preg_replace('/[^\da-z ]/i', '', $user->contact).preg_replace('/[^\da-z ]/i', '', $user->last_name);

                        // Store the cipher method
                        $ciphering = "AES-128-CTR";

                        // Use OpenSSl Encryption method
                        $iv_length = openssl_cipher_iv_length($ciphering);
                        $options = 0;

                        // Non-NULL Initialization Vector for encryption
                        $encryption_iv = '1234567891011121';

                        // Store the encryption key
                        $encryption_key = "ImmiYamiVerificationKey";

                        // Use openssl_encrypt() function to encrypt the data
                        $encryption = openssl_encrypt($user_string, $ciphering,
                                    $encryption_key, $options, $encryption_iv);


                        $hash = "https://".$_SERVER['SERVER_NAME']."/users/emailVerify?key=".$encryption;

                        $mailer = new Mailer();
                        $mailer->setEmailFormat('html')
                                    ->setTo($user->email)
                                    ->setSubject('ImmiYami : Registration Verification')
                                    ->setViewVars(['name'=>$user->first_name.' '.$user->last_name , 'email' => $user->email , 'hash' => $hash])
                                    ->viewBuilder()
                                        ->setTemplate('memberverify');

                        $mailer->deliver();

                        if($this->request->getData('package') == 'gold'){
                            return $this->redirect(['controller'=>'Payments','action' => 'pay',$payment->id,'register']);
                        }elseif($this->request->getData('package') == 'platinum'){
                            return $this->redirect(['controller'=>'Payments','action' => 'pay',$payment->id,'register']);
                        }else{
                            $this->Flash->success(__('Your account has been successfully created. please verify your email and login. Link will expire in 24 hours!.'));
                            return $this->redirect(['action' => 'login']);
                        }
                    }


				}else{
                    $this->Flash->error(__('This email address already registered. Please login, or use different email address and try again.'));
                    if($this->request->getData('package') == 'gold'){
                        return $this->redirect('/Users/login?type=register&package=gold');
                    }elseif($this->request->getData('package') == 'platinum'){
                        return $this->redirect('/Users/login?type=register&package=platinum');
                    }else{
                       return $this->redirect('/Users/login?type=register&package=free');
                    }
                }

			}else{
				$this->Flash->error(__('Password mismatch. Please, try again.'));
			}

            return $this->redirect(['action' => 'login']);
        }
        $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'categories', 'countries', 'preferredCountries', 'coupons'));
    }



    /**
     * Add method Sponsor
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addSponsor()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The sponsor has been saved.'));

                return $this->redirect(['action' => 'sponsor']);
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }
        $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'categories', 'countries', 'preferredCountries', 'coupons'));
    }
    /**
     * Add method Member
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addMember()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'member']);
            }
            $this->Flash->error(__('The member could not be saved. Please, try again.'));
        }
        $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200 ,'conditions' => ['status' => true]])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'categories', 'countries', 'preferredCountries', 'coupons'));
    }
    /**
     * Add method Supplier
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addSupplier()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'supplier']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200, 'conditions' => ['status' => true]])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'categories', 'countries', 'preferredCountries', 'coupons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $this->loadModel('Access');
            // $this->Flash->success(__('The user has been saved.'));
            if($this->request->getData('accessSet')){
                $this->Access->deleteAll(
                [
                    'user_id' => $id
                ]
                );
                
                foreach($this->request->getData('accessSet') as $acc){
        			$acces = $this->Access->newEmptyEntity();
        			$acces->user_id = $user->id;
        			$acces->controller_func_id = $acc;
        			if ($this->Access->save($acces)) {}
        		}
            }
            
    		
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->loadModel('ControllerFunc');
        $controllerFuncsArr = $this->ControllerFunc->find('all', ['contain' => []])->toArray();
        $controllerFuncs = [];
        foreach($controllerFuncsArr as $pA){
            $controllerFuncs [$pA['id']] = $pA['controller']." -> ".$pA['func'];
         }
        $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();
        
        $access = $this->Users->get($id, ['contain' => ['Access']]);
        
        $this->set(compact('user', 'categories', 'countries', 'preferredCountries', 'coupons','controllerFuncs','access'));
    }

    /**
     * Edit method Sponsor
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editSponsor($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The sponsor has been saved.'));

                return $this->redirect(['action' => 'sponsor']);
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }
        $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'categories', 'countries', 'preferredCountries', 'coupons'));
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editMember($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'member']);
            }
            $this->Flash->error(__('The member could not be saved. Please, try again.'));
        }
        $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'categories', 'countries', 'preferredCountries', 'coupons'));
    }
    /**
     * Edit method supplier
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editSupplier($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'supplier']);
            }
            $this->Flash->error(__('The member could not be saved. Please, try again.'));
        }
        $categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'categories', 'countries', 'preferredCountries', 'coupons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id, ['contain' => ['Posts', 'Banners']]);
    
        // Check if the user has any associated posts or banners
        if (!empty($user->posts) || !empty($user->banners)) {
            $this->Flash->error(__('The user cannot be deleted because they have associated posts or banners.'));
            switch ($user->role) {
                case 'member':
                    return $this->redirect(['action' => 'member']);
                case 'supplier':
                    return $this->redirect(['action' => 'supplier']);
                case 'sponsor':
                    return $this->redirect(['action' => 'sponsor']);
                default:
                    return $this->redirect(['action' => 'index']);
            }
        }
        
        $this->loadModel('Workingcountries');
        $this->Workingcountries->deleteAll(['user_id' => $user->id]);
        
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
            
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
    
        // Redirect based on user role
        switch ($user->role) {
            case 'member':
                return $this->redirect(['action' => 'member']);
            case 'supplier':
                return $this->redirect(['action' => 'supplier']);
            case 'sponsor':
                return $this->redirect(['action' => 'sponsor']);
            default:
                return $this->redirect(['action' => 'index']);
        }
    }

    public function login()
	{

		$typeOfTab = @$this->request->getQuery('type');
		$memberPackage = @$this->request->getQuery('package');

		$user = $this->Users->newEmptyEntity();

		if ($this->request->is('post')) {

			$user = $this->Auth->identify();
			if ($user) {

				$this->Auth->setUser($user);

				$this->UserLogs->userLoginActivity($this->Auth->User('id'));
				//~ return $this->redirect($this->Auth->redirectUrl());

				 $userLogged = $this->Users->get($this->Auth->User('id'),[
                    'contain'=>[
                        'Payments'
                    ]
                 ]);
                 $userPakage = '';
                //  $userPakage = @$userLogged->payments[count($userLogged->payments) - 1]->package;
                rsort($userLogged->payments);
                $ec =true;
                foreach ($userLogged->payments as $key => $p) {
                     if($p->status == '1'){
                         if($ec){
                            $userPakage  = $p->package;
                             $ec = false;
                         }
                     }else{
                        if($ec){
                            $userPakage  = 'free';
                            $ec = false;
                        }
                    }
                     # code...
                 }

                 $session = $this->getRequest()->getSession();

                 $session->write('Config.loggedin', true);



				if($userLogged->role == 'member'){

                    if($userPakage){
                        $session->write('Config.memberPackage', $userPakage);
                     }

                    $red = @$session->read('Quiz.red');
                    if($red == '1'){
                        $session->write('Quiz.red','0');
                        $session->write('Quiz.res','1');
                        return $this->redirect('/feesibilityred');
                    }
					return $this->redirect('/memberProfile');
				}elseif($userLogged->role == 'supplier'){
					return $this->redirect('/supplierProfile');
				}else{
					return $this->redirect('/Users/dashboard');
				}

			}else{
				$user = $this->Users->find('all', [
					'conditions' => ['email'=>$this->request->getData('email')]
				])->first();
				if($user->status == '0'){
					$this->Flash->error('Your account not activated yet. Please chack your email and activate your account.');
				}else{
					$this->Flash->error('Your username or password is incorrect.');
				}
			}

		}
		$this->viewBuilder()->setLayout('login');

		$categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();

        


        $this->set(compact('user','typeOfTab','memberPackage','categories', 'countries', 'preferredCountries', 'coupons'));
	}
    public function passwordReset()
	{

		$hash = $this->request->getQuery('key');
		$user = $this->Users->newEmptyEntity();
        $decryption_iv2 = '1234567891011121';
        $ciphering2 = "AES-128-CTR";
        $options2 = 0;

        // Store the decryption key
        $decryption_key2 = "ImmiYamiPasswordResetKey";

        // Use openssl_decrypt() function to decrypt the data
        $decryption2 = openssl_decrypt($hash, $ciphering2,
                $decryption_key2, $options2, $decryption_iv2);

        // The decrypted string
        $user_id2 = explode('-',$decryption2);

        $user2 = $this->Users->get($user_id2[0]);
        // $user_id = intval($user_id2[0]);
        // $user2 = $this->Users->get($user_id);

        // var_dump($user_id2);
        // die();
        if($user_id2[1] == date('Ymd')){
            
        }else{
            $this->Flash->error(__('Password reset link not valid. Please, try again.'));
            return $this->redirect(['action' => 'login']);
        }
		
		if ($this->request->is('post')) {
			if($this->request->getQuery('key')){
                if($this->request->getData('password') == $this->request->getData('c_password')){

                    $encryption = $this->request->getQuery('key');
                    // Non-NULL Initialization Vector for decryption
                    $decryption_iv = '1234567891011121';
                    $ciphering = "AES-128-CTR";
                    $options = 0;

                    // Store the decryption key
                    $decryption_key = "ImmiYamiPasswordResetKey".date('Ymd');

                    // Use openssl_decrypt() function to decrypt the data
                    $decryption=openssl_decrypt ($encryption, $ciphering,
                            $decryption_key, $options, $decryption_iv);

                    // The decrypted string
                    $user_id = explode('-',$decryption);

                    $user = $this->Users->get($user_id[0]);
                    if ($user->status == '0') {
                        $this->Flash->error('Your account not activated yet. Please chack your email and activate your account.');
                        return $this->redirect(['action' => 'login']);
                    }
                    $user->password = $this->request->getData('password');
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Password has been changed. Please Login'));
                    }else{
                        $this->Flash->error(__('Password could not be changed. Please, try again.'));
                    }
                }else{
                    $this->Flash->error(__('Password mismatch. Please, try again.'));
                }


				return $this->redirect(['action' => 'login']);
			}else{
				$this->Flash->error(__('Something went wrong. Please, try again.'));
				return $this->redirect(['action' => 'login']);
			}
			$this->Flash->error('Your username or password is incorrect.');
		}
		
		$this->viewBuilder()->setLayout('login');

		$categories = $this->Users->Categories->find('list', ['limit' => 200])->all();
        $countries = $this->Users->Countries->find('list', ['limit' => 200])->all();
        $preferredCountries = $this->Users->PreferredCountries->find('list', ['limit' => 200])->all();
        $coupons = $this->Users->Coupons->find('list', ['limit' => 200])->all();
        $this->set(compact('user','hash','categories', 'countries', 'preferredCountries', 'coupons'));
	}

	public function logout()
	{
		$this->Flash->success('You are now logged out.');
        $session = $this->getRequest()->getSession();
        $session->write('Config.loggedin', false);
		$this->UserLogs->userLogoutActivity($this->Auth->User('id'));
		return $this->redirect($this->Auth->logout());
	}
	public function forget()
	{

		if ($this->request->is('post')) {
			$user = $this->Users->find('all', [
				'conditions' => ['email'=>$this->request->getData('email')]
			])->first();
            if(empty($user)){
                $this->Flash->error('Please enter a valid email address.');
                return $this->redirect(['action' => 'login']);
            }else{

            if ($user->status == '0') {
                $this->Flash->error('Your account not activated yet. Please chack your email and activate your account.');
                return $this->redirect(['action' => 'login']);
            }
			// Store a string into the variable which
			$user_string = $user->id.'-'.date('Ymd').'-'.preg_replace('/[^\da-z ]/i', '', $user->first_name);
            //var_dump($user_string);
            //die();
			// Store the cipher method
			$ciphering = "AES-128-CTR";

			// Use OpenSSl Encryption method
			$iv_length = openssl_cipher_iv_length($ciphering);
			$options = 0;

			// Non-NULL Initialization Vector for encryption
			$encryption_iv = '1234567891011121';

            // Generate a random string for uniqueness
            $random_string = bin2hex(random_bytes(16)); // Generate a 16-byte (128-bit) random string

			// Store the encryption key
			$encryption_key = "ImmiYamiPasswordResetKey";

			// Use openssl_encrypt() function to encrypt the data
			$encryption = openssl_encrypt($user_string, $ciphering,
						$encryption_key, $options, $encryption_iv);


			$hash = "https://".$_SERVER['SERVER_NAME']."/users/passwordReset?key=".$encryption;
            $randomNumber = rand(10000, 99999);

            // Concatenate the random number to the URL
            $hash .= $randomNumber;

            // echo($hash);
			$mailer = new Mailer();
			$mailer->setEmailFormat('html')
						->setTo($user->email)
						->setSubject('ImmiYami : Password Reset')
						->setViewVars(['name'=>$user->first_name.' '.$user->last_name , 'email' => $user->email , 'hash' => $hash])
						->viewBuilder()
							->setTemplate('reset');

			$mailer->deliver();
			$this->Flash->success(__('Your account password reset link has been sent to your email successfuly. Please reset password and login.'));
            }
        }else{
			$this->Flash->error('Your request can not be proceed.');
		}
		return $this->redirect(['action' => 'login']);
	}


    //Multi Action
    public function multiAction()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
			//~ print_r($this->request->getData());
			$statusGet = $this->request->getData('status');
			foreach($this->request->getData('info') as $id){
				$get_data = $this->Users->get($id);
				if ($statusGet == '2') {
					if ($this->Users->delete($get_data)) {
						echo '1';
					} else {
						echo '0';
					}
				}else{
						$get_data->status = $statusGet;
						if ($this->Users->save($get_data)) {
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