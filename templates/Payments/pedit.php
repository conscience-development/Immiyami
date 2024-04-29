<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
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
                                <h4 class="card-title"><?= __('Edit Sponsor Payment') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($payment) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
											<fieldset>
                                                <?php
                                                    echo $this->Form->control('title',['required'=>true,'class'=>'form-control','label'=>'Title *']);
                                                    echo $this->Form->control('price',['required'=>true,'class'=>'form-control','label'=>'Price *']);
                                                    echo $this->Form->control('payment_date', ['required'=>true,'empty' => true,'class'=>'form-control datepicker-default','label'=>'Payment Date *']);
                                                    echo $this->Form->control('type',['type'=>'hidden','value'=>'sponsor','class'=>'form-control']);
                                                    // echo $this->Form->control('package',['class'=>'form-control']);
                                                    // echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'active'] ,'class'=>'form-control']);
                                                    echo $this->Form->control('user_id', ['label'=>'Sponsor *','required'=>true,'options' => $users, 'empty' => true,'class'=>'multi-select wide form-control']);
                                                    echo $this->Form->control('status',['options' =>['0'=>'Not Paid','1'=>'Paid'] ,'class'=>'form-control','label'=>'Status *','id'=>'status']);

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
