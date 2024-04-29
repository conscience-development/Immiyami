<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flag $flag
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
                                <h4 class="card-title"><?= __('Edit Flag') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                <?= $this->Form->create($flag,['type'=>'file']) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
																					echo $this->Form->control('name',['class'=>'form-control']);
													echo $this->Form->control('photo',['accept'=>"image/png, image/jpeg",'required'=>true,'label'=>'Photo (96*72)','type'=>'file','class'=>'form-control']);
													// echo $this->Form->control('photo_dir',['class'=>'form-control']);
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
