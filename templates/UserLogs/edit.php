<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserLog $userLog
 * @var string[]|\Cake\Collection\CollectionInterface $users
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
                                <h4 class="card-title"><?= __('Edit User Log') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($userLog) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
																					echo $this->Form->control('user_id', ['options' => $users, 'empty' => true,'class'=>'multi-select wide form-control']);
													echo $this->Form->control('action',['class'=>'form-control']);
													echo $this->Form->control('useragent',['class'=>'form-control']);
													echo $this->Form->control('os',['class'=>'form-control']);
													echo $this->Form->control('ip',['class'=>'form-control']);
													echo $this->Form->control('host',['class'=>'form-control']);
													echo $this->Form->control('referrer',['class'=>'form-control']);
													echo $this->Form->control('status',['class'=>'form-control']);
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
