<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * XmlSheets Controller
 *
 * @property \App\Model\Table\XmlSheetsTable $XmlSheets
 * @method \App\Model\Entity\XmlSheet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class XmlSheetsController extends AppController
{

	public function initialize(): void
	{
		parent::initialize();

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
		if (!empty($this->request->getQuery())) {
			if (!empty($this->request->getQuery('daterange'))) {
				$daterange = explode('-', $this->request->getQuery('daterange'));
				$dateStart = date_create($daterange[0]);
				$dateEnd = date_create($daterange[1]);
				$conditions['XmlSheets.created >='] = date_format($dateStart, "Y-m-d");
				$conditions['XmlSheets.created <='] = date_format($dateEnd, "Y-m-d");

				$this->set('setDaterange', $this->request->getQuery('daterange'));
			}
		}

		$conditions['XmlSheets.name IS NOT'] = NULL;

		if ($this->request->getQuery('q')) {
			$getstatus = explode('-', $this->request->getQuery('q'));
			if ($getstatus[0] == 'status') {
				$conditions['XmlSheets.status'] = $getstatus[1];
				$query = $this->XmlSheets
					// Use the plugins 'search' custom finder and pass in the
					// processed query params
					->find('all')
					// You can add extra things to the query if you need to
					->contain(['Users'])
					//->order(['XmlSheets.id'=>'DESC'])
					->where($conditions);
			} else {
				$query = $this->XmlSheets
					// Use the plugins 'search' custom finder and pass in the
					// processed query params
					->find('search', ['search' => $this->request->getQueryParams()])
					// You can add extra things to the query if you need to
					->contain(['Users'])
					//->order(['XmlSheets.id'=>'DESC'])
					->where($conditions);
			}
		} else {
			$query = $this->XmlSheets
				// Use the plugins 'search' custom finder and pass in the
				// processed query params
				->find('search', ['search' => $this->request->getQueryParams()])
				// You can add extra things to the query if you need to
				->contain(['Users'])
				//->order(['XmlSheets.id'=>'DESC'])
				->where($conditions);
		}


		$this->set('xmlSheets', $this->paginate($query));

		//~ $this->paginate = [
		//~ 'contain' => ['Users'],
		//~ ];
		//~ $xmlSheets = $this->paginate($this->XmlSheets);

		//~ $this->set(compact('xmlSheets'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Xml Sheet id.
	 * @return \Cake\Http\Response|null|void Renders view
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$xmlSheet = $this->XmlSheets->get($id, [
			'contain' => ['Users', 'XmlCountries', 'XmlSubmissions'],
		]);

		$this->set(compact('xmlSheet'));
	}


	/**
	 * quiz Json method
	 *
	 * @param string|null $id Xml Sheet id.
	 * @return \Cake\Http\Response|null|void Renders view
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function quizjson($qualificationId = null)
	{
		//~ $xmlSheet = $this->XmlSheets->find('all', [
		//~ 'contain' => ['Users', 'XmlCountries'=>['XmlVisatypes'=>['XmlQualifications'=>['XmlQualifPoints', 'XmlCriterias'=>['XmlCriteriaAnswers']]]], 'XmlSubmissions'],
		//~ 'order'=>['XmlSheets.id'=>'DESC']
		//~ ])->first()->toArray();
		$id = explode('-', $qualificationId);
		$this->loadModel('XmlQualifications');
		$xmlQualifications = $this->XmlQualifications->get($id[1], [
			'contain' => ['XmlQualifPoints', 'XmlCriterias' => ['XmlCriteriaAnswers']],
		]);
		// var_dump($xmlQualifications);
		// ~ $this->set(compact('xmlSheet'));
		// var_dump($xmlQualifications->xml_qualif_points);

		$qualifpoints = [];
		foreach ($xmlQualifications->xml_qualif_points as $k => $xmlqualifpoints) {
			// $qualifpoints[$k]['color'] = $xmlqualifpoints->color;
			$qualifpoints[$k][$xmlqualifpoints->color] = (int) $xmlqualifpoints->points;
		}
		sort($qualifpoints);
		$questions = [];
		foreach ($xmlQualifications->xml_criterias as $k => $qualification) {
			$questions[$k]['question'] = $qualification->question;
			$questions[$k]['help_link'] = $qualification->help_link;
			$questions[$k]['id'] = $qualification->id;
			$questions[$k]['point'] = $qualifpoints;
			$questions[$k]['description'] = NULL;
			foreach ($qualification->xml_criteria_answers as $i => $answers) {
				$questions[$k]['answers'][$i]['answer'] = $answers->name;
				$questions[$k]['answers'][$i]['alert'] = $answers->answer;
				$questions[$k]['answers'][$i]['id'] = $answers->id;
				$questions[$k]['answers'][$i]['point'] = $answers->point;
				$questions[$k]['answers'][$i]['true'] = 1;
				//  var_dump($qualification);
			}

			//  var_dump($qualification);
		}
		// echo json_encode($questions);
		// die();
		// var_dump($newArr);
		// die();
		// quiz.json
		// $quiz = [
		//         [
		// "intro"=> [
		// 	"title"=> "ImmiYami Feesibility Quiz",
		// 	"description"=> "Test your feesibility for your journey"
		// ],


		// $questions
		// [
		// 	"question"=> "Budapest is the capital of which state?",
		// 	"description"=> null,
		// 	"answers"=> [[
		// 		"answer"=> "Hungary",
		// 		"alert"=> "<strong>Correct!</strong>",
		// 		"true"=> 1
		// 	],
		// 	[
		// 		"answer"=> "Slovenia",
		// 		"alert"=> "<strong>Wrong!</strong> Budapest is the capital of Hungary.",
		// 		"true"=> 0
		// 	],
		// 	[
		// 		"answer"=> "Slovakia",
		// 		"alert"=> "<strong>Wrong!</strong> Budapest is the capital of Hungary.",
		// 		"true"=> 0
		// 	]]
		// ]


		// ]];

		$quiz = [
			[
				"intro" => [
					"title" => "Test your feasibility for your journey ",
					"description" => "Why wait? Proceed to provide your exact details and understand the probability of your migration. Don’t worry about less qualifications! We will tell you what to do in the final steps of the quiz. <div class='text-center'><img src='/front/images/quiz/steps.png' alt='' class='step-img-quiz'></div>"
				],
				"questions" => $questions


			]
		];

		echo json_encode($quiz);
		die();
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$xmlSheet = $this->XmlSheets->newEmptyEntity();
		if ($this->request->is('post')) {
			if ($this->request->getData('status') == '1') {
				$actSheets = $this->XmlSheets->find('all', [
					'conditions' => ['status' => '1']
				]);
				foreach ($actSheets as $key => $sheet) {
					# code...
					$cactSheet = $this->XmlSheets->get($sheet->id);
					$cactSheet->status = '0';
					if ($this->XmlSheets->save($cactSheet)) {
					}
				}
			}


			$xmlSheet = $this->XmlSheets->patchEntity($xmlSheet, $this->request->getData());
			$xmlSheet->user_id = $this->Auth->User('id');
			$xml = simplexml_load_file($_FILES['file']['tmp_name']) or die("Error: Cannot create object");
			//~ var_dump($xml->Australia->VisaTypes->SkilledIndependentVisa->Educational->SubClass_189->Criterias);

			if ($this->XmlSheets->save($xmlSheet)) {
				$this->loadModel('XmlCountries');
				$this->loadModel('XmlVisatypes');
				$this->loadModel('XmlQualifications');
				$this->loadModel('XmlQualifPoints');
				$this->loadModel('XmlCriterias');
				$this->loadModel('XmlCriteriaAnswers');
				foreach ($xml as $k => $xm) {
					// var_dump();
					// die();
					$XmlCountry = $this->XmlCountries->newEmptyEntity();
					$XmlCountry->name = preg_replace('/(?<!\ )[A-Z]/', ' $0', $k);
					$XmlCountry->imglink = $xm['flag_link'];
					$XmlCountry->xml_sheet_id = $xmlSheet->id;
					if ($this->XmlCountries->save($XmlCountry)) {
						foreach ($xm->VisaTypes as $visa) {
							foreach ($visa as $v => $visaTypes) {
								$XmlVisatype = $this->XmlVisatypes->newEmptyEntity();
								$XmlVisatype->name = preg_replace('/(?<!\ )[A-Z]/', ' $0', $v);
								$XmlVisatype->xml_country_id = $XmlCountry->id;
								if ($this->XmlVisatypes->save($XmlVisatype)) {
									foreach ($visaTypes->Category as $edu) {
										foreach ($edu as $e => $education) {
											$XmlQualification = $this->XmlQualifications->newEmptyEntity();
											$XmlQualification->name = preg_replace('/(?<!\ )[A-Z]/', ' $0', $e);
											$XmlQualification->xml_visatype_id = $XmlVisatype->id;
											if ($this->XmlQualifications->save($XmlQualification)) {
												foreach ($education->Points as $points) {
													foreach ($points as $p => $point) {
														$XmlQualifPoint = $this->XmlQualifPoints->newEmptyEntity();
														$XmlQualifPoint->color = $p;
														$XmlQualifPoint->points = $point;
														$XmlQualifPoint->xml_qualification_id = $XmlQualification->id;
														if ($this->XmlQualifPoints->save($XmlQualifPoint)) {

														}
													}
												}
												foreach ($education->Criterias as $criterias) {
													foreach ($criterias as $c => $criteria) {
														$XmlCriteria = $this->XmlCriterias->newEmptyEntity();
														$XmlCriteria->tagname = $c;
														$XmlCriteria->name = $c;
														if ($criteria->attributes()->UseForSuggestions == 'true') {
															$XmlCriteria->useForSuggestions = '1';
														}

														$XmlCriteria->maxpoint = $criteria->attributes()->MaxPoints;
														$XmlCriteria->question = $criteria->attributes()->Question;
														$XmlCriteria->help_link = $criteria->attributes()->help_link;
														$XmlCriteria->xml_qualification_id = $XmlQualification->id;
														if ($this->XmlCriterias->save($XmlCriteria)) {
															foreach ($criteria as $cr => $crit) {
																$XmlCriteriaAnswer = $this->XmlCriteriaAnswers->newEmptyEntity();
																$XmlCriteriaAnswer->tagname = $cr;
																$XmlCriteriaAnswer->name = $crit->attributes()->text;
																$XmlCriteriaAnswer->answer = $crit->attributes()->suggestion_text;
																$XmlCriteriaAnswer->point = (string) $crit;
																$XmlCriteriaAnswer->criteria_id = $XmlCriteria->id;
																if ($this->XmlCriteriaAnswers->save($XmlCriteriaAnswer)) {
																	//~ var_dump($cr);
																	//~ var_dump((string)$crit);

																}
															}


														}
													}
													//~ die();
												}


											}
										}
									}

								}

							}
						}
					}

				}

			}
			$this->Flash->success(__('The xml sheet has been saved.'));
			return $this->redirect(['action' => 'index']);




			$this->Flash->error(__('The xml sheet could not be saved. Please, try again.'));
		}

		$users = $this->XmlSheets->Users->find('list', [
			'conditions' => [
				'Users.role NOT IN' => [
					'sponsor',
					'student',
					'supplier'
				]

			],
			'limit' => 200
		])->all();
		$this->set(compact('xmlSheet', 'users'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Xml Sheet id.
	 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$xmlSheet = $this->XmlSheets->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$xmlSheet = $this->XmlSheets->patchEntity($xmlSheet, $this->request->getData());
			if ($this->XmlSheets->save($xmlSheet)) {
				$this->Flash->success(__('The xml sheet has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The xml sheet could not be saved. Please, try again.'));
		}

		$users = $this->XmlSheets->Users->find('list', [
			'conditions' => [
				'Users.role NOT IN' => [
					'sponsor',
					'student',
					'supplier'
				]

			],
			'limit' => 200
		])->all();
		$this->set(compact('xmlSheet', 'users'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Xml Sheet id.
	 * @return \Cake\Http\Response|null|void Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		try {
			$xmlSheet = $this->XmlSheets->get($id);
			if ($this->XmlSheets->delete($xmlSheet)) {
				$this->Flash->success(__('The xml sheet has been deleted.'));
			} else {
				$this->Flash->error(__('The xml sheet could not be deleted. Please, try again.'));
			}
		} catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
			$this->Flash->error(__('The xml sheet could not be found.'));
		} catch (\Cake\Datasource\Exception\PersistenceFailedException $e) {
			$this->Flash->error(__('The xml sheet could not be deleted. It may be in use.'));
		} catch (\Exception $e) {
			$this->Flash->error(__('The xml sheet could not be deleted. It may be in use.'));
		}

		return $this->redirect(['action' => 'index']);
	}

}