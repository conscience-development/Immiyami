<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmlSubmissionAnswer $xmlSubmissionAnswer
 * @var string[]|\Cake\Collection\CollectionInterface $xmlCriterias
 * @var string[]|\Cake\Collection\CollectionInterface $xmlCriteriaAnswers
 */
?>
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= __('Edit Xml Submission Answer') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($xmlSubmissionAnswer) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
																					echo $this->Form->control('criteria_id', ['options' => $xmlCriterias,'class'=>'multi-select wide form-control']);
													echo $this->Form->control('criteria_answer_id', ['options' => $xmlCriteriaAnswers,'class'=>'multi-select wide form-control']);
												?>
											</fieldset>
												
                                            </div>
                                            <div class="mb-3 mt-3 row">
												<div class="col-lg-12 align-right">
													<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
												</div>
											</div>
                                        </div>
									<?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!--**********************************
            Content body end
        ***********************************-->
