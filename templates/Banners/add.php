<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Banner $banner
 * @var \Cake\Collection\CollectionInterface|string[] $bannerTypes
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= __('Add Banner') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($banner,['type'=>'file']) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('title',['required'=>true,'class'=>'form-control','id'=>'title','label'=>'Title *']);
													echo $this->Form->control('user_id', ['required'=>true,'label'=>'Sponsor *','options' => $users, 'empty' => true,'class'=>'multi-select wide form-control']);
													echo $this->Form->control('photo',['required'=>true,'label'=>'Photo (Top banner :1100*150 / Side banner :400*940) *','type'=>'file','class'=>'form-control','id'=>'photo','accept' => 'image/*']); ?>
                                                    <div class="col-xl-12">
                                                        <fieldset>
                                                            <div class="img-preview">
                                                                <img id="preview-image" src="" alt="Preview Image" width="200px" length="112px">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <?
													//echo $this->Form->control('photo_dir',['class'=>'form-control']);
													echo $this->Form->control('start_date', ['required'=>true,'empty' => true,'class'=>'form-control datepicker-default','id'=>'start_date','min'=>date('Y-m-d'),'label'=>'Start Date *']);
													echo $this->Form->control('end_date', ['required'=>true,'empty' => true,'class'=>'form-control datepicker-default','id'=>'end_date','min'=>date('Y-m-d'),'label'=>'End Date*']);
													echo $this->Form->control('url',['required'=>true,'type' => 'url','class'=>'form-control','id'=>'url','label'=>'URL *']);
                                                    echo $this->Form->control('position',['required'=>true,'options' =>['top'=>'Top','left_top'=>'Left Top','left_bottom'=>'Left Bottom','right_top'=>'Right Top','right_bottom'=>'Right Bottom'] ,'class'=>'form-control','id'=> 'position','label'=>'Position *']);
                                                    echo $this->Form->control('banner_type_id', ['required'=>true,'options' => $bannerTypes, 'empty' => true,'class'=>'multi-select wide form-control','id'=>'bannerType','label'=>'Banner Type *']);
                                                    echo $this->Form->control('price',['class'=>'form-control','id'=>'price']);
													echo $this->Form->control('note',['class'=>'form-control']);
													echo $this->Form->control('status',['required'=>true,'options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','id'=> 'status','label'=>'Status *']);
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
    const start_date = document.getElementById('start_date');
    const end_date = document.getElementById('end_date');
    const photoInput = document.querySelector('input[type="file"]');
    const previewImage = document.getElementById('preview-image');

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

    start_date.addEventListener('change', validateDates);
    end_date.addEventListener('change', validateDates);

    function validateDates() {
    var startDate = start_date.value;
    var endDate = end_date.value;

    if (startDate && endDate) {
        if (new Date(startDate) > new Date(endDate)) {
            alert('End Date must be after Start Date');
            endDateInput.value = ''; // Reset end date value
        }
    }
}
</script>
