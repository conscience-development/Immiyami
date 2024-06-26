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

<style>

.bold-text {
    font-weight: bold;
}

</style>
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= __('Edit Member') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($user,['type'=>'file']) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('first_name',['required'=>true,'class'=>'form-control', 'id' => 'firstName','label'=>'First Name *']);
													echo $this->Form->control('last_name',['class'=>'form-control','id' => 'lastName','required'=>true,'label'=>'Last Name *']);
													echo $this->Form->control('email',['required'=>true,'class'=>'form-control bold-text','readonly'=>true,'id' => 'email','style'=>'background:#ececec','label'=>'Email *']);
													// echo $this->Form->control('password',['required'=>true,'class'=>'form-control']);
                                                    // echo $this->Form->control('c_password',['label'=>'Confirm Password','type'=>'password','required'=>true,'class'=>'form-control']);

													// echo $this->Form->control('bio',['class'=>'form-control']);
													echo $this->Form->control('contact',['required'=>true,'type'=>'tel','label'=>'Contact (+123456789)','pattern'=>"[+][0-9]+",'class'=>'form-control','id'=>'contact','label'=>'Contact *']);
													echo $this->Form->control('photo',['accept'=>"image/*",'label'=>'Profile Picture (300*300) - ( chosen-file: '.$user->photo.' )','type'=>'file','class'=>'form-control','id'=>'photo']);
                                                    ?>
                                                    <div class="col-xl-12">
                                                        <fieldset>
                                                            <div class="img-preview"style="margin-left:10px">
                                                            <img id="preview-image" src="/files/users/photo/<?=$user->photo_dir;?>/<?=$user->photo;?>" alt="Preview Image" width="200px" length="112px">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <?
													//echo $this->Form->control('photo_dir',['class'=>'form-control']);
													//~ echo $this->Form->control('last_login', ['empty' => true,'class'=>'form-control datepicker-default']);
													//~ echo $this->Form->control('password_reset_token',['class'=>'form-control']);
													//~ echo $this->Form->control('company_name',['class'=>'form-control']);
                                                    echo $this->Form->control('category_id', ['required'=>true,'options' => $categories, 'empty' => true,'class'=>'multi-select wide form-control','label'=>'Category *']);
													// echo $this->Form->control('country_id', ['required'=>true,'options' => $countries, 'empty' => true,'class'=>'multi-select wide form-control','label'=>'Country *']);
                                                    echo $this->Form->control('Countries._ids', ['required' => true, 'options' => $countries,'values' => $countriesSS, 'class' => 'multi-select wide form-control','label'=>'Country *','id'=>'countryId','multiple'=>true]);
                                                    // echo $this->Form->control('Countries._ids', ['required'=>true,'id'=>'countries','options' => $countries,'value'=>'','multiple'=>true, 'empty' => true,'class'=>'multiselect wide form-control']);
                                                    
													echo $this->Form->control('status',['required'=>true,'options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control']);
													echo $this->Form->control('role',['type'=>'hidden','value'=>'supplier','class'=>'form-control']);
													debug($countriesSS)
													//~ echo $this->Form->control('preferred_country_id', ['options' => $preferredCountries, 'empty' => true,'class'=>'multi-select wide form-control']);
													// echo $this->Form->control('coupon_id', ['options' => $coupons, 'empty' => true,'class'=>'multi-select wide form-control']);
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
	const submitBtn = document.getElementById('submitBtn');
	const firstName = document.getElementById('firstName');
	const lastName = document.getElementById('lastName');
	const contact = document.getElementById('contact');
	const photo = document.getElementById('photo')
	const password = document.getElementById('password')
	const c_password = document.getElementById('c_password')

	// submitBtn.addEventListener('click', function (event) {
	// 	if (firstName.value == '' || lastName.value == '' || contact.value == ''  ) {
	// 		alert("please fill the required fields");
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