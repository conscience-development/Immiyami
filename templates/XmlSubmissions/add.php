<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmlSubmission $xmlSubmission
 * @var \Cake\Collection\CollectionInterface|string[] $xmlSheets
 * @var \Cake\Collection\CollectionInterface|string[] $xmlCountries
 * @var \Cake\Collection\CollectionInterface|string[] $xmlVisatypes
 * @var \Cake\Collection\CollectionInterface|string[] $xmlQualifications
 * @var \Cake\Collection\CollectionInterface|string[] $users
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
                                <h4 class="card-title"><?= __('Add Xml Submission') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($xmlSubmission) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
																					echo $this->Form->control('xml_sheet_id', ['options' => $xmlSheets,'class'=>'multi-select wide form-control']);
													echo $this->Form->control('xml_country_id', ['options' => $xmlCountries,'class'=>'multi-select wide form-control']);
													echo $this->Form->control('xml_vsatype_id', ['options' => $xmlVisatypes,'class'=>'multi-select wide form-control']);
													echo $this->Form->control('xml_qualification_id', ['options' => $xmlQualifications,'class'=>'multi-select wide form-control']);
													echo $this->Form->control('user_id', ['options' => $users,'class'=>'multi-select wide form-control']);
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
