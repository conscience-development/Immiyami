<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
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
                                <h4 class="card-title"><?= __('Add Category') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($category) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
																					echo $this->Form->control('name',['class'=>'form-control']);
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
