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
				<h4 class="card-title">
					<?= __('Add User') ?>
				</h4>
			</div>
			<div class="card-body">
				<div class="form-validation">
					<?= $this->Form->create($user, ['type' => 'file']) ?>
					<div class="row">
						<div class="col-xl-12">
							<fieldset>
								<?php
								echo $this->Form->control('first_name', ['class' => 'form-control', 'id' => 'firstName','required' => true,'label'=>'First Name*']);
								echo $this->Form->control('last_name', ['class' => 'form-control','required' => true, 'id' => 'lastName','label'=>'Last Name *']);
								echo $this->Form->control('email', ['class' => 'form-control', 'id' => 'email', 'type' => 'email','required' => true,'label'=>'Email *']);
								echo $this->Form->control('contact', ['required' => true, 'type' => 'tel', 'label' => 'Contact (+123456789) *','pattern'=>"[+][0-9]+", 'class' => 'form-control', 'id' => 'contact']);
								echo $this->Form->control('photo', ['type' => 'file', 'class' => 'form-control', 'accept' => 'image/*', 'id' => 'photo','label'=>'profile picture']);
								?>
								<div class="col-xl-12" style="margin-left:10px">
									<fieldset>
										<div class="img-preview">
											<img id="preview-image" src="" alt="Preview Image" width="200px"
												length="112px">
										</div>

									</fieldset>
								</div>
								<?
								echo $this->Form->control('role', ['options' => ['admin' => 'Admin', 'user' => 'User'], 'class' => 'form-control','id'=>'role','required' => true,'label'=>'Role *']);
								?>
									<div style="margin-left:10px" id="divSelect">
										<hr>
										<label>Access For User *</label>
										<select name="accessSet[]" multiple class="form-control" id="form-select">
											<? foreach ($controllerFuncs as $k => $cFuncs) { ?>
												<option value="<?= $k; ?>">
													<?= $cFuncs; ?>
												</option>
											<? } ?>
										</select>
										<hr>
										<a href='#' id='select-all' class="btn btn-primary">Select all</a>
										<a href='#' id='deselect-all' class="btn btn-primary">Deselect all</a>
									</div>
									
								<?
								echo $this->Form->control('password', ['class' => 'form-control', 'id' => 'passowrd','required' => true,'label'=>'Passsword *']);
								echo $this->Form->control('c_password', ['label' => 'Confirm Password *', 'type' => 'password', 'required' => true, 'class' => 'form-control', 'id' => 'c_passowrd']);
								// echo $this->Form->control('bio',['class'=>'form-control']);
								
								//echo $this->Form->control('photo_dir',['class'=>'form-control']);
								// echo $this->Form->control('last_login', ['empty' => true,'class'=>'form-control datepicker-default']);
								// echo $this->Form->control('password_reset_token',['class'=>'form-control']);
								// echo $this->Form->control('company_name',['class'=>'form-control']);
								echo $this->Form->control('status', ['options' => ['0' => 'Inactive', '1' => 'active'], 'class' => 'form-control','required' => true,'label'=>'Status*']);
								// echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true,'class'=>'multi-select wide form-control']);
								// echo $this->Form->control('country_id', ['options' => $countries, 'empty' => true,'class'=>'multi-select wide form-control']);
								// echo $this->Form->control('preferred_country_id', ['options' => $preferredCountries, 'empty' => true,'class'=>'multi-select wide form-control']);
								// echo $this->Form->control('coupon_id', ['options' => $coupons, 'empty' => true,'class'=>'multi-select wide form-control']);
								?>

							</fieldset>

						</div>
						<div class="mb-3 mt-3 row" >
							<div class="col-lg-12 align-right">
								<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'id' => 'submitBtn']) ?>
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
	const password = document.getElementById('password');
	const c_password = document.getElementById('c_password');
	const contact = document.getElementById('contact');

	const previewImage = document.getElementById('preview-image');
	const photoInput = document.querySelector('input[type="file"]');

	// submitBtn.addEventListener('click', function (event) {
	// 	if (firstName.value == '' || lastName.value == '' || password.value == '' || c_password.value == '' || contact.value == '') {
	// 		alert("please fill the Required fields");
	// 		return false;
	// 	}

	// })

	photoInput.addEventListener('change', function (event) {
		const file = event.target.files[0];

		if (file) {
			const reader = new FileReader();

			reader.onload = function (e) {
				previewImage.src = e.target.result;
			};

			reader.readAsDataURL(file);
		}
	});

	// contact.addEventListener('input',function(event){
	// 	let inputvalue = contact.value;

	// 	inputvalue =inputvalue.replace(/\D/g, '');

	// 	contact.value = inputvalue;
	// })

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

	const role =document.getElementById('role');
	const divSelect =document.getElementById('divSelect');

	role.addEventListener('change',function(){
		if(role.value=='admin'){
			divSelect.style.display = 'block'
		}
		else{
			divSelect.style.display ='none';
		}
	})

	

</script>