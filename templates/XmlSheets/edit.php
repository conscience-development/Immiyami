<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmlSheet $xmlSheet
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
                                <h4 class="card-title"><?= __('Edit Xml Sheet') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($xmlSheet,['type'=>'file']) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
																					echo $this->Form->control('name',['class'=>'form-control']);
													echo $this->Form->control('version',['class'=>'form-control']);
													echo $this->Form->control('file',['required'=>true,'type'=>'file','class'=>'form-control']);
													//~ echo $this->Form->control('file_dir',['class'=>'form-control']);
													echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control']);
													echo $this->Form->control('user_id', ['options' => $users, 'empty' => true,'class'=>'multi-select wide form-control']);
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
