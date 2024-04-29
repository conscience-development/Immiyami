<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QueueSubmission $queueSubmission
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
                                <h4 class="card-title"><?= __('Add Queue Submission') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($queueSubmission) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
																					echo $this->Form->control('message',['required'=>true,'class'=>'form-control']);
													echo $this->Form->control('member_id',['required'=>true,'options' => $usersmem, 'empty' => true,'class'=>'form-control']);
													echo $this->Form->control('supplier_id', ['required'=>true,'options' => $users, 'empty' => true,'class'=>'multi-select wide form-control']);
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
