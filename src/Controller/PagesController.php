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

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Http\Session\DatabaseSession;

use Cake\Routing\Router;

use Cake\Mailer\Mailer;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->viewBuilder()->setLayout('public');

        if($page == 'contact'){
            if ($this->request->is('post')) {



                $data = array(
                    'secret' => "0xeC637A6b3256FFfd716937FDd7C849801E678e8e",
                    'response' => $_POST['h-captcha-response']
                );


                $verify = curl_init();
                curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
                curl_setopt($verify, CURLOPT_POST, true);
                curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($verify);
                //$responses = curl_error($verify);
                //var_dump($response);
                //var_dump($responses);
                //die();
                $responseData = json_decode($response);
                if($responseData->success) {
                    // your success code goes here


                $mailer = new Mailer();
                $mailer->setEmailFormat('html')
                            ->setTo('support@immiyami.com')
                            ->setSubject('ImmiYami : Contact - Leads')
                            ->setViewVars([
                                'name'=>$this->request->getData('name'),
                                'email'=>$this->request->getData('email'),
                                'subject'=>$this->request->getData('subject'),
                                'message'=>$this->request->getData('message')
                                ])
                            ->viewBuilder()
                                ->setTemplate('contact');

                $mailer->deliver();
                $this->Flash->success(__('Thank you for reaching out!'));
                }
                else {
                // return error to user; they did not pass
                $this->Flash->error(__('Please complete the reCAPTCHA verification.'));
                }

                return $this->redirect('/');



            }

		}

        if($page == 'feesibility'){
            return $this->redirect('/Users/login');
		}

        //Page Home & Campaign Redirection
        if($page == 'home' && !empty($this->request->getQuery('encryption'))){
            $encryption = $this->request->getQuery('encryption');
			// Non-NULL Initialization Vector for decryption
			$decryption_iv = '1234567891011121';
			$ciphering = "AES-128-CTR";
			$options = 0;
			// Store the decryption key
			$decryption_key = "ImmiYamiCampaignKey";

			// Use openssl_decrypt() function to decrypt the data
			$decryption=openssl_decrypt ($encryption, $ciphering,
					$decryption_key, $options, $decryption_iv);

			// The decrypted string
			$id = explode('-',$decryption);
            $this->loadModel('Campaigns');
            $campaign = $this->Campaigns->get($id[0], [
                'contain' => [],
            ]);
            $campaign->clicks = $campaign->clicks + 1;
            if ($this->Campaigns->save($campaign)) {}
			// var_dump($idSet[0]);
            // die();
            //PaymentId
            return $this->redirect($campaign->url);
        }
        //Page Home
        if($page == 'home'){
        //load Models
			$this->loadModel('Banners');
			$this->loadModel('Videos');
			$this->loadModel('Articles');

			$home_banners = $this->Banners->find('all',[
								'conditions'=>[ 'and' => [
										'status' =>'1',
										//~ array('Banners.start_date <= ' => date("Y-m-d H:i:s"),
											  //~ 'Banners.end_date >= ' => date("Y-m-d H:i:s")
											 //~ )
										'start_date <=' => date("Y-m-d H:i:s"),
										'end_date >=' => date("Y-m-d H:i:s")
									]
								]
							])->toArray();
			$home_videos = $this->Videos->find('all',[
								'conditions'=>[
										'featured' =>'1',
										'status' =>'1'
								]
							]);
			$home_articles = $this->Articles->find('all',[
								'conditions'=>[
										'status' =>'1'
								],
								'order'=>['id'=>'DESC'],
								'limit'=> 8
							]);
			$this->set(compact('home_banners', 'home_videos', 'home_articles'));

		}

       
        //Page Videos
        if($page == 'videos'){
        //load Models
			$this->loadModel('Videos');
			$conditions = [];
			$conditions['Videos.status'] = '1';
			if($this->request->getQuery('search') != ''){
				$conditions['Videos.title LIKE'] = '%'.$this->request->getQuery('search').'%';
				$search = $this->request->getQuery('search');
				$this->set(compact('search'));
			}
			$this->paginate = [
				'conditions' => $conditions
			];
			$videos = $this->paginate($this->Videos);
			$this->set(compact('videos'));

		}
        //Page Articals
        if($page == 'articles'){
        //load Models
			$this->loadModel('Articles');
			$this->paginate = [
                'limit' => 10,
				'conditions' => ['status'=>'1'],
                'order'=>['id'=>'DESC']
			];
			$articles = $this->paginate($this->Articles);

			$popular_articles = $this->Articles->find('all',[
								'conditions'=>[
										'status' =>'1'
								],
								'order'=>['id'=>'DESC'],
								'limit'=> 4
							]);

			$this->set(compact('articles','popular_articles'));

		}

		//Page Articals view
        if($page == 'article-view'){
        //load Models
			$this->loadModel('Articles');
			$articleIdUrl = explode('-',$this->request->getQuery('page_id'));
			$articalId = $articleIdUrl[count($articleIdUrl) - 1];


			$article = $this->Articles->get($articalId,[
						'conditions'=>[
								'status' =>'1'
						]
					]);

			$popular_articles = $this->Articles->find('all',[
								'conditions'=>[
										'status' =>'1'
								],
								'order'=>['id'=>'DESC'],
								'limit'=> 4
							]);

			$this->set(compact('article','popular_articles'));

		}
		//Page  Upgrade
        if($page == 'upgrade'){

            $package = $this->request->getQuery('package');

            $encryption = $this->request->getQuery('encryption');
                // Non-NULL Initialization Vector for decryption
            if(!empty($encryption)){
                $decryption_iv = '1234567891011121';
                $ciphering = "AES-128-CTR";
                $options = 0;
                // Store the decryption key
                $decryption_key = "ImmiYamiOffer50Key";

                // Use openssl_decrypt() function to decrypt the data
                $decryption=openssl_decrypt ($encryption, $ciphering,
                        $decryption_key, $options, $decryption_iv);

                // The decrypted string
                $id = explode('-',$decryption);

                if($id[0] == $this->Auth->User('id')){
                    $this->set('CodeOffer', 'IM50CA');
                    $this->set('Offer50UserActive', true);
                }else{
                    
                    $this->set('Offer50UserActive', false);
                }
            }else{
                $this->set('Offer50UserActive', false);
            }

			$this->set(compact('package'));

		}

		//Page faq
        if($page == 'faq'){
        //load Models
			$this->loadModel('Helps');

			$helps = $this->Helps->find('all',[
								'conditions'=>[
										'status' =>'1'
								],
								'sort'=>['id'=>'DESC']
							]);

			$this->set(compact('helps'));

		}
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
    public function activeMembership(){
        $this->viewBuilder()->setLayout('public');

        if($this->Auth->User('id')){
            $this->loadModel('Users');
            $user = $this->Users->get($this->Auth->User('id'));
            $createdDate = $user->created;
            $stop_date = date('Y-m-d H:i:s', strtotime($createdDate . ' +1 day'));
            if($stop_date > date('Y-m-d H:i:s') && $user->q == '0' && $user->role == 'member'){
                $user->q = '1';
                $this->Users->save($user);
                // echo 'date after adding 1 day: ' . $stop_date;
            }else{
                // echo 'date after ';
            }
            
            // die();

        }else{
            return $this->redirect('/Users/login');
        }
        $this->set('page', 'active_membership');

    }
    public function feesibilityred($submid = NULL){

        $this->viewBuilder()->setLayout('public');

		$countryName = @$this->request->getQuery('countryName');
		$visatypeName = @$this->request->getQuery('visatypeName');

        $session = $this->getRequest()->getSession();
            if(@$session->read('Quiz.res') == '1'){
                $session->write('Quiz.res','0');
                $this->loadModel('XmlSubmissions');
                $xmlSubmission = $this->XmlSubmissions->newEmptyEntity();

                $saveXmlCountry = $session->read('Quiz.saveXmlCountry');
                $saveXmlVisatype = $session->read('Quiz.saveXmlVisatype');
                $saveXmlQualification = $session->read('Quiz.saveXmlQualification');
                $xmlSheetId = $session->read('Quiz.xmlSheetId');



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

                    // echo 'Done';
                    // die();
                    return $this->redirect(['action' => 'feesibilityred',$xmlSubmission->id]);
                }

            }
            $this->loadModel('XmlSubmissions');
            $xmlSubmission = $this->XmlSubmissions->get($submid, [
                'contain' => ['XmlSheets','XmlSubmissionAnswers'=>['XmlCriteriaAnswers'], 'XmlCountries', 'XmlVisatypes', 'XmlQualifications'=>['XmlQualifPoints'], 'Users'],
            ]);
            $this->set(compact('xmlSubmission'));
            $memberPackage = $session->read('Config.memberPackage');

            // var_dump($memberPackage);
            // die();;
            
            $countryNameG = @$session->read('Quiz.saveXmlCountryName');
            $visatypeNameG = @$session->read('Quiz.saveXmlVisatypeName');

            
            $this->loadModel('Posts');
            $this->loadModel('Countries');

            $countries = $this->Countries->find('all')
            ->contain(['PostsCountries'])
            ->where(['Countries.name LIKE'=>'%'.trim(@$countryNameG)."%"])
            ->toArray();


            $postsIds = [];

            foreach ($countries as $key => $country) {
                foreach ($country->posts_countries as $key => $post) {
                    # code...
                    $postsIds[] = $post->post_id;
                }
            }

            // var_dump($countryNameG);
            // var_dump($countries);
            // var_dump($postsIds);
            // die();
            
            // if(!empty($usersIds))
            
            if(!empty($postsIds)){            
                $conditionsPost['Posts.id IN'] = $postsIds;
            }else{            
                $conditionsPost['Posts.id IN'] = [0];
            }

            $conditionsPost['Posts.status'] = '1';
            $conditionsPost['Posts.c_status'] = '1';

            $posts = $this->Posts
                // Use the plugins 'search' custom finder and pass in the
                // processed query params
                ->find('search', ['search' => $this->request->getQueryParams()])
                // You can add extra things to the query if you need to
                ->contain(['Users'=>['Categories','Countries'],'PostsCategories'=>['Categories']])
                ->limit(3)
                ->where($conditionsPost);


            $this->set('memberPackage', @$memberPackage);
            // $this->set('xmlsub', $xmlSubmission);
            $this->set('visatypeNameG', $visatypeNameG);
            $this->set('countryNameG', $countryNameG);
            $this->set('posts', $posts);

            $this->set('page', 'feesibility_results');
    }
    public function feesibility(){
        $this->loadModel('Users');
        $this->loadModel('Posts');

        $session = $this->getRequest()->getSession();

         $userLoggedin = $session->read('Config.loggedin');
		if($userLoggedin){
			$userLogged = $this->Users->get($this->Auth->User('id'),[
                'contain'=>['Payments']
            ]);
            if($userLogged->role == 'supplier'){
                return $this->redirect('/Users/login');
            }
		}else{
			// $this->set('Auth', false);
		}




		$countryName = @$this->request->getQuery('countryName');
		$visatypeName = @$this->request->getQuery('visatypeName');
		$qualificationName = @$this->request->getQuery('qualificationName');


        $session = $this->getRequest()->getSession();


		$this->viewBuilder()->setLayout('public');
		$this->loadModel('XmlSheets');
		$this->loadModel('XmlCountries');
		$this->loadModel('XmlVisatypes');
		$this->loadModel('XmlQualifications');
		$this->loadModel('XmlCriterias');

        $xmlSheets = $this->XmlSheets->find('all')
                        ->where(['status'=>'1'])
                        //->order(['id'=>'DESC'])
                        ->first();

		$xmlCountries = $this->XmlCountries->find('all', ['limit' => 200])
                        ->where(['xml_sheet_id'=>$xmlSheets->id])->all();
                        // var_dump($xmlCountries);
                        // die();
		if(!empty($countryName)){
			$countryId = explode('-',$countryName);
            $session->write('Quiz.saveXmlCountry',$countryId[1]);
            $session->write('Quiz.saveXmlCountryName',$countryId[0]);

            $xmlSheet = $this->XmlCountries->get($countryId[1]);
            $xmlSheetId = $xmlSheet->xml_sheet_id;
            $session->write('Quiz.xmlSheetId',$xmlSheetId);

			$xmlVisatypes = $this->XmlVisatypes->find('list', ['limit' => 200])->where(['xml_country_id'=>$countryId[1]])->all();
			$this->set('xmlVisatypes', $xmlVisatypes);
		}
		if(!empty($visatypeName)){
			$visatypeId = explode('-',$visatypeName);
            $session->write('Quiz.saveXmlVisatype',$visatypeId[1]);
            $session->write('Quiz.saveXmlVisatypeName',$visatypeId[0]);
			$xmlQualifications = $this->XmlQualifications->find('list', ['limit' => 200])->where(['xml_visatype_id'=>$visatypeId[1]])->all();

            $this->set('xmlQualifications', $xmlQualifications);
            foreach ($xmlQualifications->toArray() as $key => $value) {
                # code...
                // var_dump($value);
                if($value == ' None'){

                    return $this->redirect('/feesibility?qualificationName='.$value.'-'.$key);
                }
                $this->set('xmlQualificationsNone', $value);
            }
		}
        if(!empty($qualificationName)){
			$qualificationId = explode('-',$qualificationName);
            $session->write('Quiz.saveXmlQualification',$qualificationId[1]);
        }

        $memberPackage = $session->read('Config.memberPackage');


        // var_dump($memberPackage);
        // die();

        $countryNameG = @$session->read('Quiz.saveXmlCountryName');
        $visatypeNameG = @$session->read('Quiz.saveXmlVisatypeName');

        
		$this->loadModel('Countries');

        if(empty($countryNameG)){
            $countryNameG = 'NULLED';
        }

        $countries = $this->Countries->find('all')
        ->contain(['PostsCountries'])
        ->where(['Countries.name LIKE'=>'%'.trim(@$countryNameG)."%"])
        ->toArray();


        $postsIds = [];

        foreach ($countries as $key => $country) {
            foreach ($country->posts_countries as $key => $post) {
                # code...
                $postsIds[] = $post->post_id;
            }
        }

        // var_dump($countryNameG);
        // var_dump($countries);
        // var_dump($postsIds);
        // die();
        
        // if(!empty($usersIds))
        
        if(!empty($postsIds)){            
            $conditionsPost['Posts.id IN'] = $postsIds;
        }else{            
            $conditionsPost['Posts.id IN'] = [0];
        }
        $conditionsPost['Posts.status'] = '1';
        $conditionsPost['Posts.c_status'] = '1';

        $posts = $this->Posts
			// Use the plugins 'search' custom finder and pass in the
			// processed query params
			->find('search', ['search' => $this->request->getQueryParams()])
			// You can add extra things to the query if you need to
			->contain(['Users'=>['Categories','Countries'],'PostsCategories'=>['Categories']])
            ->limit(3)
            ->where($conditionsPost);


		$this->set('visatypeNameG', $visatypeNameG);
		$this->set('countryNameG', $countryNameG);

		$this->set('memberPackage', @$memberPackage);
		$this->set('qualificationName', $qualificationName);
		$this->set('visatypeName', $visatypeName);
		$this->set('countryName', $countryName);
		$this->set('xmlCountries', $xmlCountries);
		$this->set('page', 'feesibility');
		$this->set('posts', $posts);
	}
    public function recommendation(){

        $this->viewBuilder()->setLayout('public');

        $this->loadModel('XmlSubmissions');
        $this->loadModel('XmlSubmissionAnswers');

        $xmlSubmission = $this->XmlSubmissions->find('all', [
            'conditions'=>['XmlSubmissions.user_id'=>$this->Auth->User('id')],
            'order'=>['XmlSubmissions.id'=>'DESC']
        ])->first();

        $xmlSubmissionAnswer = $this->XmlSubmissionAnswers->find('all', [
            'conditions'=>['XmlSubmissionAnswers.xml_submission_id'=>$xmlSubmission->id],
            'contain' => ['XmlCriterias'=>['XmlCriteriaAnswers'], 'XmlCriteriaAnswers'],
        ]);


        $this->set('xmlSubmissionAnswer', $xmlSubmissionAnswer);
		$this->set('page', 'recommendation');
	}
}