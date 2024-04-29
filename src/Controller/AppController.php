<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Mailer\Mailer;

use Cake\Http\Session\DatabaseSession;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');


		$this->loadComponent('Auth', [
			'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'finder' => 'auth'
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        $this->loadComponent('Elastic/ActivityLogger.AutoIssuer', [
            'userModel' => 'Users',
        ]);

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
    public function beforeFilter(EventInterface $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow([
				 'display',
				 'emailVerify',
				 'passwordReset',
				 'subscription',
				 'forget',
				 'register',
				 'feesibility',
				 'quizjson',
				 'addDataAjex',
				 'pay',
				 'listPosts',
				 'postView',
				 'addCoupon',
				 'paymentOk',
				 'paymentFailed',
				 'paymentNotify',
				 'login'
				]);
                set_error_handler([$this, 'handlePhpError']);
	}



public function handlePhpError($severity, $message, $file, $line)
{
    // Specify the error severities you want to handle
    $handledSeverities = [1, 4, 16, 64,1024];

    // Check if the error severity is in the handled severities
    if (in_array($severity, $handledSeverities)) {
    // Send error notification email
    $errorEmail = new Mailer();
    $errorEmail
        ->setTo('s.eyes.lk@gmail.com')
        ->setFrom('no-reply@immiyami.com')
        ->setSubject('Immiyami Error Notification')
        ->setEmailFormat('text')
        ->deliver("Severity: $severity\nMessage: $message\nFile: $file\nLine: $line");
    }
    // Log the error if needed
    $this->log("PHP Error - Severity: $severity, Message: $message, File: $file, Line: $line", 'error');

}


	public function beforeRender(EventInterface $event)
	{
		parent::beforeRender($event);

		//in here assign setting table data to array with key value = value
		$settings = [];
		$this->loadModel('Settings');
		$this->loadModel('Users');

		$this->loadModel('Payments');

		$this->loadModel('Posts');
		$settingsArr = $this->Settings->find('all',array('fields'=>array('name','key_value','value')));
		foreach ($settingsArr as $k=>$tr){
			$settings[$tr['key_value']] = $tr['value'];
		}

		$this->set('settings_set', $settings);
        $session = $this->getRequest()->getSession();

         $userLoggedin = $session->read('Config.loggedin');
		if($userLoggedin){
			$userLogged = $this->Users->get($this->Auth->User('id'),[
                'contain'=>['Payments'] 
            ]);

            $user = $this->Users->get($this->Auth->User('id'));
            $createdDate = $user->created;
            $stop_date = date('Y-m-d H:i:s', strtotime($createdDate . ' +1 day'));
			
            if($user->q == '0' && $user->role == 'member'){
				$this->set('Offer50Show', true);
			}else{
				$this->set('Offer50Show', false);
			}
            if($stop_date > date('Y-m-d H:i:s') && $user->q == '1' && $user->role == 'member'){
				
                $this->set('stopDateOffer', $stop_date);
                $this->set('Offer50', true);
            }else{
				$this->set('Offer50', false);
			// 	var_dump($stop_date);
			// var_dump(date('Y-m-d H:i:s'));
			// die();
			}


			$this->set('Auth', $userLogged);
		}else{
			$this->set('Auth', false);
		}
        $tUsers = $this->Users->find('all',[
            'conditions'=>['status'=>'1']
        ])->count();
        $tPosts = $this->Posts->find('all',[
            'conditions'=>['status'=>'1']
        ])->count();

        // $tPamts = $this->Payments->find('all',[
        //     'conditions'=>['status'=>'0','package IN'=>['gold','platinum'],'payment_status IN'=>['failed','pending']]
        // ]);

        // foreach($tPamts as $pmt){
        //     $dtPamts = $this->Payments->get($pmt->id);
        //     if ($this->Payments->delete($dtPamts)) {}
        // }
		$this->loadModel('Subscriptions');

		$subscription = $this->Subscriptions->newEmptyEntity();

		$this->set('subscriptionFooter', @$subscription);
		$this->set('tUsers', @$tUsers);
		$this->set('tPosts', @$tPosts);
		$this->set('controller', @$this->request->getParam('controller'));
		$this->set('controller_action', @$this->request->getParam('action'));
	}

	public function isAuthorized($user)
	{


			$this->loadModel('Users');

			$user = $this->Users->get($user['id'], [
				'contain' => ['Payments','Access'=>['ControllerFunc']]
			]);

			$accessTo = [];

			foreach($user->access as $uA){
				$accessTo[]= ['controller'=>$uA->controller_func->controller,'function'=>$uA->controller_func->func];

			}


			switch($user['role']){
				case 'superuser':
					return true;
					break;
				case 'member':

					switch($this->request->getParam('controller')){
						case 'Pages' :
							switch($this->request->getParam('action')){
								case 'feesibility' :
									return true;
									break;
								case 'activeMembership' :
									return true;
									break;
								case 'feesibilityred' :
									return true;
									break;
								case 'recommendation' :
                                        if($user->payments[count($user->payments) - 1]->package == 'paid' || $user->payments[count($user->payments) - 1]->package == 'platinum' && $user->payments[count($user->payments) - 1]->status == '1'){
                                            return true;
                                            break;
                                        }else{
                                            return false;
                                            break;
                                        }
								case 'display' :
									return true;
									break;
								default:
									return false;
									break;
							}
						case 'XmlSheets' :
							switch($this->request->getParam('action')){
								case 'quizjson' :
									return true;
									break;
								default:
									return false;
									break;
							}
						case 'XmlSubmissions' :
							switch($this->request->getParam('action')){
								case 'addDataAjex' :
									return true;
									break;
								default:
									return false;
									break;
							}
						case 'Users' :
							switch($this->request->getParam('action')){
								case 'logout' :
									return true;
									break;
								case 'memberProfile' :
									return true;
									break;
								case 'memberDetailsToQ' :
									return true;
									break;
								case 'supplierProfileView' :
									return true;
									break;
								default:
									return false;
									break;
							}
						case 'Posts' :
							switch($this->request->getParam('action')){
								case 'postView' :
									return true;
									break;
								case 'listPosts' :
									return true;
									break;
								default:
									return false;
									break;
							}
						default:
							return false;
							break;
					}
				case 'supplier':
					switch($this->request->getParam('controller')){
                        case 'Pages' :
							switch($this->request->getParam('action')){
								case 'display' :
									return true;
									break;
								default:
									return false;
									break;
							}
						case 'Users' :
							switch($this->request->getParam('action')){
								case 'logout' :
									return true;
									break;
								case 'supplierProfile' :
									return true;
									break;
								case 'supplierProfileView' :
									return true;
									break;
								case 'postView' :
									return true;
									break;
								default:
									return false;
									break;
							}
						case 'Posts' :
							switch($this->request->getParam('action')){
								case 'addPost' :
									return true;
									break;
								case 'postView' :
									return true;
									break;
								case 'listPosts' :
									return true;
									break;
								case 'editPost' :
									return true;
									break;
								case 'inactivepost' :
									return true;
									break;
								default:
									return false;
									break;
							}
						case 'PostImages' :
							switch($this->request->getParam('action')){
								case 'deletePImg' :
									return true;
									break;
								default:
									return false;
									break;
							}
						default:
							return false;
							break;
					}
				case 'admin':

					//~ var_dump($accessTo);
					if($this->searchInArray($this->searchInArray($accessTo,'controller',$this->request->getParam('controller')),'function',$this->request->getParam('action')) || $this->searchInArray($this->searchInArray($accessTo,'controller',$this->request->getParam('controller')),'function','*') ){
						return true;
						break;
					}elseif($this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'display'){
						return true;
						break;
					}elseif($this->request->getParam('controller') == 'Users' && $this->request->getParam('action') == 'logout'){
						return true;
						break;
					}else{
						return false;
						break;
					}
					//~ return true;
						//~ break;

				case 'user':
					if($this->searchInArray($this->searchInArray($accessTo,'controller',$this->request->getParam('controller')),'function',$this->request->getParam('action')) || $this->searchInArray($this->searchInArray($accessTo,'controller',$this->request->getParam('controller')),'function','*') ){

						return true;
						break;
					}elseif($this->request->getParam('controller') == 'Pages' && $this->request->getParam('action') == 'display'){
						return true;
						break;
					}elseif($this->request->getParam('controller') == 'Users' && $this->request->getParam('action') == 'logout'){
						return true;
						break;
					}else{
						return false;
						break;
					}
				default:
					return false;
					break;
			}
	}

	public function searchInArray($array, $key, $value)
	{
		$results = array();

		if (is_array($array)) {
			if (isset($array[$key]) && $array[$key] == $value) {
				$results[] = $array;
			}

			foreach ($array as $subarray) {
				$results = array_merge($results, $this->searchInArray($subarray, $key, $value));
			}
		}

		return $results;
	}
}