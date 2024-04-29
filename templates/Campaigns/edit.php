<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campaign $campaign
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
                                <h4 class="card-title"><?= __('Edit Campaign') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($campaign) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('title',['class'=>'form-control','id'=>'title','required'=>true,'label'=>'Title *']);
													// echo $this->Form->control('start_date', ['empty' => true,'class'=>'form-control datepicker-default']);
													// echo $this->Form->control('end_date', ['empty' => true,'class'=>'form-control datepicker-default']);
													echo $this->Form->control('url',['type'=>'url','class'=>'form-control','id'=>'url','required'=>true,'label'=>'URL *']);
													echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','required'=>true,'label'=>'Status *']);
													// echo $this->Form->control('clicks',['class'=>'form-control']);
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
            const submitBtn =document.getElementById('submitBtn');
            const title =document.getElementById('title');
            const url =document.getElementById('url');
            
            // submitBtn.addEventListener('click',function(){
            //     if(title.value =='' || url.value==''){
            //         alert("Required to fill all the fields");
            //     }
            // })
        </script>
