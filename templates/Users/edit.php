<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 * @var string[]|\Cake\Collection\CollectionInterface $countries
 * @var string[]|\Cake\Collection\CollectionInterface $preferredCountries
 * @var string[]|\Cake\Collection\CollectionInterface $coupons
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
                                <h4 class="card-title"><?= __('Edit User') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($user,['type'=>'file']) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('first_name',['class'=>'form-control','id'=>'firstName','required' => true,'label'=>'First Name*']);
													echo $this->Form->control('last_name',['class'=>'form-control','id'=>'lastName','required'=>true,'label'=>'Last Name *']);
													echo $this->Form->control('email',['class'=>'form-control','readonly'=>true,'label'=>'Email *','style'=>'background:#ececec']);
													// echo $this->Form->control('password',['class'=>'form-control']);
													// echo $this->Form->control('c_password',['label'=>'Confirm Password','type'=>'password','required'=>true,'class'=>'form-control']);
													// echo $this->Form->control('bio',['class'=>'form-control']);
													echo $this->Form->control('contact',['required'=>true,'type'=>'tel','label'=>'Contact (+123456789) *','pattern'=>"[+][0-9]+",'class'=>'form-control','id'=>'contact']);
													echo $this->Form->control('photo',['type'=>'file','class'=>'form-control','id'=>'photo','label' =>'profile Pic']);
													?>
													<div class="col-xl-12">
                                                        <fieldset>
                                                            <div class="img-preview">
                                                                <img id="preview-image" src="/files/users/photo/<?=$user->photo_dir;?>/<?=$user->photo;?>" alt="Preview Image" width="200px" length="112px">
                                                            </div>
                                                        </fieldset>
                                                    </div>
													<?
													if($user->role == 'admin'){
														echo $this->Form->control('role',['options' =>['admin'=>'Admin'],'class'=>'form-control','required' => true,'label'=>'Role *']);
													}
													if($user->role == 'user'){
														echo $this->Form->control('role',['options' =>['user'=>'User'],'class'=>'form-control','required' => true,'label'=>'Role *']);
													}
													
													
													//echo $this->Form->control('photo_dir',['class'=>'form-control']);
													// echo $this->Form->control('last_login', ['empty' => true,'class'=>'form-control datepicker-default']);
													// echo $this->Form->control('password_reset_token',['class'=>'form-control']);
													// echo $this->Form->control('company_name',['class'=>'form-control']);
													
													// echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true,'class'=>'multi-select wide form-control']);
													// echo $this->Form->control('country_id', ['options' => $countries, 'empty' => true,'class'=>'multi-select wide form-control']);
													// echo $this->Form->control('preferred_country_id', ['options' => $preferredCountries, 'empty' => true,'class'=>'multi-select wide form-control']);
													// echo $this->Form->control('coupon_id', ['options' => $coupons, 'empty' => true,'class'=>'multi-select wide form-control']);
												?>
											</fieldset>
											<?if($user->role == 'admin') :?>
												<div style="margin-left:10px">
														<hr>
														<label>Access For User</label>
														<select name="accessSet[]" multiple class="form-control" id="form-select">
														    
															<? foreach ($controllerFuncs as $k => $cFuncs) { ?>
															    <?
															        $selected = false;
															        foreach ($access->access as $i => $acc) { 
															            if($k==$acc->controller_func_id){
															                $selected = true;
															            }
															        }
															    
															    ?>
																<option value="<?= $k; ?>" <?= $selected?"selected":""; ?>>
																	<?= $cFuncs; ?>
																</option>
															<? } ?>
														</select>
														<hr>
														<a href='#' id='select-all' class="btn btn-primary">Select all</a>
														<a href='#' id='deselect-all' class="btn btn-primary">Deselect all</a>
												</div>
											<?endif;?>
											<?echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','label'=>'Status *','required'=>true]); ?>
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
	const submitBtn =  document.getElementById('submitBtn');
	const firstName =document.getElementById('firstName');
	const lastName =document.getElementById('lastName');
	const photo = document.getElementById('photo');
	const contact = document.getElementById('contact');

	const previewImage = document.getElementById('preview-image');
	const photoInput = document.querySelector('input[type="file"]');

	// submitBtn.addEventListener('click',function(event){
	// 	if(firstName.value == '' || lastName.value == '' || photo.value == ''){
	// 		alert("please fill all the required fields");
	// 		return null;
	// 	}
	// })

	photoInput.addEventListener('change',function(event){
		const file = event.target.files[0]

		if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
	})

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
