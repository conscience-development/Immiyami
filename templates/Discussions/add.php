<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Discussion $discussion
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
                                <h4 class="card-title"><?= __('Add Discussion') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($discussion) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('supplier_id',['required'=>true,'options' => $users1, 'class'=>'multi-select wide form-control','id'=>'supplierID','label'=>'Supplier *']);
													echo $this->Form->control('member_id', ['required'=>true,'options' => $users2, 'empty' => true,'class'=>'multi-select wide form-control','id'=>'memberID','label'=>'Member *']);
													echo $this->Form->control('date',['required'=>true,'class'=>'form-control','min'=>date('Y-m-d'),'id'=>'date','label'=>'Date *']);
													echo $this->Form->control('description',['class'=>'form-control','id'=>'description','label'=>'Description']);
												?>
											</fieldset>

                                            </div>
                                            <div class="mb-3 mt-3 row">
												<div class="col-lg-12 align-right">
													<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary','id'=>'submitBtn']) ?>
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

