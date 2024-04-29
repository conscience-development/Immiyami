<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActivityLog $activityLog
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
                                <h4 class="card-title"><?= __('Edit Activity Log') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($activityLog) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
																					echo $this->Form->control('created_at',['class'=>'form-control']);
													echo $this->Form->control('scope_model',['class'=>'form-control']);
													echo $this->Form->control('scope_id',['class'=>'form-control']);
													echo $this->Form->control('issuer_model',['class'=>'form-control']);
													echo $this->Form->control('issuer_id',['class'=>'form-control']);
													echo $this->Form->control('object_model',['class'=>'form-control']);
													echo $this->Form->control('object_id',['class'=>'form-control']);
													echo $this->Form->control('level',['class'=>'form-control']);
													echo $this->Form->control('action',['class'=>'form-control']);
													echo $this->Form->control('message',['class'=>'form-control']);
													echo $this->Form->control('data',['class'=>'form-control']);
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
