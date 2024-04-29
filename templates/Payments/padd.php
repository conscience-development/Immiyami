<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>


<!--**********************************
            Content body start
        ***********************************-->
<!-- row -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= __('Add Sponsor Payment') ?></h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <?= $this->Form->create($payment) ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <fieldset>
                                <?php
                                    echo $this->Form->control('title',['required'=>true,'class'=>'form-control','label'=>'Title *']);
                                    echo $this->Form->control('price',['required'=>true,'class'=>'form-control','label'=>'Price *','id'=>'price']);
                                    echo $this->Form->control('payment_date', ['required'=>true,'empty' => true,'class'=>'form-control datepicker-default','min'=>date('Y-m-d'),'label'=>'Payment Date *']);
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
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        const price = document.getElementById('price');

        price.addEventListener('change', function(event) {
            const valueOfPrice = parseFloat(price.value); // Parse the value as float
            if (valueOfPrice < 0) {
                alert("Price cannot be negative. Setting it to 0.");
                price.value = 0; // Reset the value to 0 if it's negative
            }
            


        });
    });
</script>

