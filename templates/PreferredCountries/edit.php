<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PreferredCountry $preferredCountry
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
                                <h4 class="card-title"><?= __('Edit Preferred Country') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($preferredCountry) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('name',['pattern'=>"[A-Za-z ]+",'class'=>'form-control','id'=>'name','required'=>true,'label'=>'Name *']);
                                                    // echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','required'=>true,'label'=>'Status *']);
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

        <!-- <script>
            const submitBtn =document.getElementById('submitBtn');
            const name =document.getElementById('name');

            submitBtn.addEventListener('click',function(event){
                if(name.value==''){
                    alert("please fill the requried fields");
                }
            })
        </script> -->