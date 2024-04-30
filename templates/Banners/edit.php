<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Banner $banner
 * @var string[]|\Cake\Collection\CollectionInterface $bannerTypes
 * @var string[]|\Cake\Collection\CollectionInterface $users
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
                                <h4 class="card-title"><?= __('Edit Banner') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($banner,['type'=>'file']) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('title',['required'=>true,'class'=>'form-control','label'=>'Title *']);
													echo $this->Form->control('user_id', ['required'=>true,'label'=>'Sponsor','options' => $users, 'empty' => true,'class'=>'multi-select wide form-control','label'=>'Sponser *']);
													echo $this->Form->control('photo',['label'=>'Photo (Top:1100*150 / Side:400*940) *','type'=>'file','class'=>'form-control',   'accept' => 'image/*']);
                                                    ?>
                                                    <?php if ($banner->photo): ?>
                                                        <div class="existing-image">
                                                        <img id='preview-image' src="/files/banners/photo/<?= $banner->photo_dir; ?>/square_<?= $banner->photo; ?>" alt="<?= h($banner->title) ?>" style="width: 250px; height: auto;" />
                                                        </div>
                                                    <?php else : ?>
                                                        <div>
                                                        <img src="/files/banners/photo/default.jpeg" alt="<?= h($banner->title) ?>" style="width: 250px; height: auto;" />
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php
													//echo $this->Form->control('photo_dir',['class'=>'form-control']);
													echo $this->Form->control('start_date', ['empty' => true,'class'=>'form-control datepicker-default','id'=>'startDate','label'=>'Start Date *']);
                                                    echo $this->Form->control('end_date', ['empty' => true,'class'=>'form-control datepicker-default','id'=> 'endDate','label'=>'End Date *']);
													echo $this->Form->control('url',['required'=>true,'type' => 'url','class'=>'form-control','label'=>'URL *']);
													echo $this->Form->control('position',['required'=>true,'options' =>['top'=>'Top','left_top'=>'Left Top','left_bottom'=>'Left Bottom','right_top'=>'Right Top','right_bottom'=>'Right Bottom','id'=>'position'] ,'class'=>'form-control','label'=>'Position *']);
                                                    echo $this->Form->control('banner_type_id', ['required'=>true,'options' => $bannerTypes, 'empty' => true,'class'=>'multi-select wide form-control','label'=>'Banner Type *']);

													echo $this->Form->control('price',['class'=>'form-control','id'=>'price']);
													echo $this->Form->control('note',['class'=>'form-control']);
													echo $this->Form->control('status',['required'=>true,'options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','label'=>'Status *']);
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

    const submitBtn = document.getElementById('submitBtn');
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');
    const positionInput = document.getElementById('position');
    const titleInput = document.querySelector('input[name="title"]');
    const descriptionInput = document.querySelector('textarea[name="description"]');
    const previewImage = document.getElementById('preview-image');
    const photoInput = document.querySelector('input[type="file"]');

    

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
        } else {
            // Set default image if no file selected
            previewImage.src = "/newsview.jpg"; // Replace 'default_image.jpg' with your default image path
        }
    });

    // Event listener for start_date input field
    startDateInput.addEventListener('change', function() {
        validateDates();
    });

    // Event listener for end_date input field
    endDateInput.addEventListener('change', function() {
        validateDates();
    });

    function validateDates() {
        var startDate = new Date(startDateInput.value);
        var endDate = new Date(endDateInput.value);

        if (startDate > endDate) {
            alert('End Date must be after Start Date');
            endDateInput.value = ''; // Clear end date input
        }
    }

    
</script>
