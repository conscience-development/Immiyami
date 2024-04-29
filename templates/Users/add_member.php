<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $countries
 * @var \Cake\Collection\CollectionInterface|string[] $preferredCountries
 * @var \Cake\Collection\CollectionInterface|string[] $coupons
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
                                <h4 class="card-title"><?= __('Add Member') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($user,['type'=>'file']) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('first_name',['required'=>true,'class'=>'form-control','id'=>'firstName','label'=>'First Name *']);
													echo $this->Form->control('last_name',['required'=>true,'class'=>'form-control','id'=>'lastName','label'=>'Last Name *']);
													echo $this->Form->control('email',['required'=>true,'class'=>'form-control','id'=>'email','type'=>'email','label'=>'Email *']);
                                                    echo $this->Form->control('photo',['type'=>'file','class'=>'form-control','id'=>'photo','accept' => "image/*",'label' =>'profile Pic']);
                                                    ?>
													<div class="col-xl-12">
                                                        <fieldset>
                                                            <div class="img-preview"style="margin-left:10px">
                                                                <img id="preview-image" src="" alt="Preview Image" width="200px" length="112px">
                                                            </div>
                                                        </fieldset>
                                					</div>
													<?
                                                    echo $this->Form->control('contact',['required'=>true,'type'=>'tel','label'=>'Contact (+123456789) *','pattern'=>"[+][0-9]+",'class'=>'form-control','id'=>'contact']);
                                                    echo $this->Form->control('country_id', ['required'=>true,'options' => $countries, 'empty' => true,'class'=>'multi-select wide form-control','label'=>'Country *']);
													echo $this->Form->control('preferred_country_id', ['required'=>true,'options' => $preferredCountries, 'empty' => true,'class'=>'multi-select wide form-control','label'=>'Preferred Country *']);
													echo $this->Form->control('password',['required'=>true,'label'=>'Password (Password must be 6 characters) *', 'pattern'=>".{6,}", 'class'=>'form-control','id'=>'password']);
													echo $this->Form->control('c_password',['required'=>true, 'pattern'=>".{6,}",'label'=>'Confirm Password *','type'=>'password','required'=>true,'class'=>'form-control','id'=>"C_password"]);
													//~ echo $this->Form->control('bio',['class'=>'form-control']);
													
													
													//echo $this->Form->control('photo_dir',['class'=>'form-control']);
													//~ echo $this->Form->control('last_login', ['empty' => true,'class'=>'form-control datepicker-default']);
													//~ echo $this->Form->control('password_reset_token',['class'=>'form-control']);
													//~ echo $this->Form->control('company_name',['class'=>'form-control']);
													echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','label'=>'Status *']);
													echo $this->Form->control('role',['required'=>true,'type'=>'hidden','value'=>'member','class'=>'form-control']);
													//~ echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true,'class'=>'multi-select wide form-control']);
													
													// echo $this->Form->control('coupon_id', ['options' => $coupons, 'empty' => true,'class'=>'multi-select wide form-control']);
												?>
											</fieldset>

                                            </div>
                                            <div class="mb-3 mt-3 row">
												<div class="col-lg-12 align-right">
													<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary','id'=> 'submitBtn']) ?>
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
	const firstName =document.getElementById('firstName');
	const lastName =document.getElementById('lastNamr');
	const email =document.getElementById('email');
	const passowrd=document.getElementById('password');
	const c_password =document.getElementById('c_pasword');

	// submitBtn.addEventListener('click',function(event){
	// 	if(firstName.value == '' || lastName.value == '' || email.value=='' || passowrd.value=='' || c_password.value== ''){
	// 		alert("Please Fill the required Fields");
	// 	}
	// })

	const previewImage = document.getElementById('preview-image');
	const photoInput = document.querySelector('input[type="file"]');

	photoInput.addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });

	contact.addEventListener('input', function(event) {
    let inputvalue = contact.value;

    // Remove all non-numeric characters except '+'
    inputvalue = inputvalue.replace(/[^\d+]/g, '');

    // Ensure '+' is at the beginning and restrict to numbers after that
    if (inputvalue.charAt(0) !== '+') {
        inputvalue = '+' + inputvalue.replace(/\D/g, '');
    } else {
        inputvalue = inputvalue.charAt(0) + inputvalue.slice(1).replace(/\D/g, '');
    }

    // Update the input value
    contact.value = inputvalue;
	})
</script>