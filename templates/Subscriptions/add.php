<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subscription $subscription
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
                                <h4 class="card-title"><?= __('Add Subscription') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($subscription) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('email',['class'=>'form-control','id'=>'emai','type'=>'email','required'=>true,'label'=>'Email *']);
													echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','required'=>true,'label'=>'Status *']);
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

        <script>
            // const submitBtn =document.getElementById('submitBtn');
            // const email = document.getElementById('email');

            // submitBtn.addEventListener('click',function(event){
            //     if(email.value==''){
            //         alert("please fill the required fields");
            //     }
            // })

        </script>
