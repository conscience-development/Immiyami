<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coupon $coupon
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
                                <h4 class="card-title"><?= __('Add Coupon') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($coupon) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?
													//Auto Get month/year
													$genCoge = date('y').date('m');
													echo $this->Form->control('name',['class'=>'form-control','id'=>'name','label'=>'Name *','required'=>true]);
													echo $this->Form->control('code',['class'=>'form-control','value'=>$genCoge,'id'=>'code','label'=>'Code *','required'=>true]);
													echo $this->Form->control('price',['label'=>'Offer Value *','class'=>'form-control','id'=>'price','required'=>true]);
													echo $this->Form->control('limitation',['type'=>'number','class'=>'form-control','id'=>'limitation','label'=>'Limitation *','required'=>true]);
													echo $this->Form->control('start_date', ['empty' => true,'class'=>'form-control datepicker-default','id'=>'start_date','min'=>date('Y-m-d'),'label'=>'Start Date *','required'=>true]);
													echo $this->Form->control('end_date', ['empty' => true,'class'=>'form-control datepicker-default','id'=>'end_date','min'=>date('Y-m-d'),'label'=>'End Date *','required'=>true]);
													echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','id'=>'status','label'=>'Status *','required'=>true]);
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>

<script>
const submitBtn = document.getElementById('submitBtn');
const start_date = document.getElementById('start_date');
const end_date = document.getElementById('end_date');
const code = document.getElementById('code');

start_date.addEventListener('change', validateDates);
end_date.addEventListener('change', validateDates);

function validateDates() {
    var startDate = start_date.value;
    var endDate = end_date.value;

    if (startDate && endDate) {
        if (new Date(startDate) > new Date(endDate)) {
            alert('End Date must be after Start Date');
            end_date.value = startDate; // Reset end date value
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
        const price = document.getElementById('price');
        
        const limitation = document.getElementById('limitation');

        price.addEventListener('change', function(event) {
            const valueOfPrice = parseFloat(price.value); // Parse the value as float
            if (valueOfPrice < 0) {
                alert("Price cannot be negative.");
                price.value = ''; // Reset the value to 0 if it's negative
            }
        });

        limitation.addEventListener('change',function(event){
            const valuelimitation =parseFloat(limitation.value);
            if(valuelimitation<0){
                alert("Limitation can not be negative");
                limitation.value = 1;
            }
        })
    });

    


</script>
