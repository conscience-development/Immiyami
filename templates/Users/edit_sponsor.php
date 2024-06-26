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
				<h4 class="card-title">
					<?= __('Edit Sponsor') ?>
				</h4>
			</div>
			<div class="card-body">
				<div class="form-validation">
					<?= $this->Form->create($user, ['type' => 'file']) ?>
					<div class="row">
						<div class="col-xl-12">
							<fieldset>
								<?php
								echo $this->Form->control('first_name', ['class' => 'form-control', 'id' => 'firstName','required'=>true,'label'=>'First Name *']);
								echo $this->Form->control('last_name', ['class' => 'form-control', 'id' => 'lastName','required'=>true,'label'=>'Last Name *']);
								echo $this->Form->control('email', ['class' => 'form-control', 'readonly' => true, 'email' => 'email','required'=>true,'style'=>'background:#ececec']);
								//~ echo $this->Form->control('password',['class'=>'form-control']);
								// echo $this->Form->control('bio',['class'=>'form-control']);
								echo $this->Form->control('contact', ['type' => 'tel', 'class' => 'form-control', 'id' => 'contact','required'=>true,'label'=>'Contact *']);
								echo $this->Form->control('photo', ['accept' => "image/*",'label' => 'Profile Picture * (300*300) - ( chosen-file: ' . $user->photo . ' )', 'type' => 'file', 'class' => 'form-control', 'id' => 'photo']);
								?>
								<div class="col-xl-12">
									<fieldset>
										<div class="img-preview" style="margin-left:10px">
											<img id="preview-image" src="/files/users/photo/<?= $user->photo_dir; ?>/<?= $user->photo; ?>" alt="Preview Image" width="200px"
												length="112px">
										</div>
									</fieldset>
								</div>
								<?
								//echo $this->Form->control('photo_dir',['class'=>'form-control']);
								//~ echo $this->Form->control('last_login', ['empty' => true,'class'=>'form-control datepicker-default']);
								//~ echo $this->Form->control('password_reset_token',['class'=>'form-control']);
								echo $this->Form->control('company_name', ['class' => 'form-control']);
								echo $this->Form->control('status', ['options' => ['0' => 'Inactive', '1' => 'active'], 'class' => 'form-control','label'=>'Status *','required'=>true]);
								echo $this->Form->control('role', ['type' => 'hidden', 'value' => 'sponsor', 'class' => 'form-control']);
								//~ echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true,'class'=>'multi-select wide form-control']);
								//~ echo $this->Form->control('country_id', ['options' => $countries, 'empty' => true,'class'=>'multi-select wide form-control']);
								//~ echo $this->Form->control('preferred_country_id', ['options' => $preferredCountries, 'empty' => true,'class'=>'multi-select wide form-control']);
								//~ echo $this->Form->control('coupon_id', ['options' => $coupons, 'empty' => true,'class'=>'multi-select wide form-control']);
								?>
							</fieldset>

						</div>
						<div class="mb-3 mt-3 row">
							<div class="col-lg-12 align-right">
								<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary','id'=>'submitBtn']) ?>
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
	const photo = document.getElementById('photo');
	const companyName =document.getElementById('companyName');

	submitBtn.addEventListener('click', function (event) {
		// if (firstName.value == '' || lastName.value == '' || contact.value == '' || photo.value == '' || companyName.value=='') {
		// 	alert("please fill the required fields");
		// 	event.preventDefault();
		// }
	})

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