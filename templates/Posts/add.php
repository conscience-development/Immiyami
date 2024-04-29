<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 * @var \App\Model\Entity\Category $category
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>

<?php

?>
<!--**********************************
            Content body start
        ***********************************-->
<!-- row -->

<style>
    .checkbox-horizontal {
        margin-right: 10px;
    }

    .checkbox-horizontal label {
        display: inline-block;
        /* Allow labels to flow horizontally */
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <?= __('Add Post') ?>
                </h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <?= $this->Form->create($post, ['url' => '/Posts/addPost', 'type' => 'file']) ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <fieldset>
                                <?php
                                echo $this->Form->control('title', ['required' => true, 'class' => 'form-control', 'id' => 'titleInput','label'=>'Title *']);
                                echo $this->Form->control('supplier_id', ['class' => 'form-control','options'=>$users,'label'=>'Supplier *']);
                                echo $this->Form->control('description', ['class' => 'form-control', 'id' => 'description']);
                                echo $this->Form->control('photo', ['accept' => 'image/*', 'required' => true, 'type' => 'file', 'class' => 'form-control', 'id' => 'photo','label'=>'Photo *']);
                                ?>
                                <div class="form-group">
                                    <div class="img-preview">
                                        <img id="preview-image" src="" alt="Uploaded Image will show here" width="200px" height="112px style="margin-left:10px">
                                    </div>
                                </div>

                                <?
                                echo $this->Form->control('postImages[]', ['required' => true, "id" => "postImages",'accept' => 'image/*', 'label' => 'Images (800px x 600px) (Maximum 4)*', 'type' => 'file', 'multiple' => true, 'class' => 'form-control']); ?>
                                <div class="form-group">
                                    <div class="multiple-img-preview">
                                    </div>
                                </div>
                                <?
                                //echo $this->Form->control('photo_dir',['class'=>'form-control']);
                                echo $this->Form->control('url', ['type' => 'url', 'class' => 'form-control', 'id' => 'url','label'=>'URL *','required'=>true]);
                                // echo $this->Form->control('status', ['options' => ['0' => 'Inactive','1' => 'active'], 'class' => 'form-control','label'=>'status *']); ?>
                                <?// echo $this->Form->control('clicks',['class'=>'form-control']);     ?>
                                <br />
                                Select Categories : *</br><br />
                                <div style="overflow:scroll;height:100px;overflow-x: hidden;">
                                    <? echo $this->Form->select('Categories._ids', $categories, ['id'=>'categoriesSelected','multiple' => 'checkbox', 'label' => 'select one or more Categories *', 'class' => 'checkbox-horizontal']) ?>
                                </div>
                                <br />
                                Select Countries : *</br><br />
                                <div style="overflow:scroll;height:100px;overflow-x: hidden;">
                                    <? echo $this->Form->select('Countries._ids', $countries, ['id'=>'countriesSelected','multiple' => 'checkbox', 'label' => 'select one or more Countries *', 'class' => 'checkbox-horizontal']) ?>
                                </div>
                                <? $this->Form->control('user_id', ['type' => 'hidden', 'required' => true, 'value' => $Auth->id, 'empty' => true, 'class' => 'multi-select wide form-control']); ?>

                        </div>

                        </fieldset>

                    </div>
                    <div class="mb-3 mt-3 row">
                        <div class="col-lg-12 align-right">
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'id' => 'submitBtn']) ?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
                <!-- <?= $this->Form->create($post, ['url' => '/Posts/addPost', 'type' => 'file']) ?>
                    <div class="adpost-card">
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <? echo $this->Form->control('title', ['required' => true, 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-lg-12">
                                <? echo $this->Form->control('photo', ['required' => true, 'id' => 'addpostCoverPhoto','accept' => 'image/*', 'label' => 'Cover Image (266px x 190px)', 'type' => 'file', 'class' => 'form-control']); ?>
                            </div>
                            <div class="form-group">
                                    <div class="img-preview">
                                        <img id="preview-image" src="" alt="Preview Image" width="200px" height="112px">
                                    </div>
                            </div>
                            <div class="col-lg-12">
                                <? echo $this->Form->control('postImages[]', ['required' => true, 'id' => 'addpostImages','accept' => 'image/*', 'label' => 'Images (800px x 600px)', 'type' => 'file', 'multiple' => true, 'class' => 'form-control']); ?>
                            </div>
                            <div class="form-group">
                                    <div class="multiple-img-preview">
                                    </div>
                            </div>

                            <div class="col-lg-12">
                                <? echo $this->Form->control('short_description', ['id' => 'short_descriptionSet', 'maxlength' => 250, 'label' => 'Short Description ( Characters 250 )', 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-lg-12">
                                <? echo $this->Form->control('description', ['required' => true, 'id' => 'descriptionSet', 'maxlength' => 1500, 'label' => 'Description ( Characters 1500 )', 'class' => 'form-control']); ?>
                            </div>
                            
                            <div class="col-lg-12">
                                Select Categories : * </br>
                                <div style="overflow:scroll;height:100px;overflow-y: hidden;">
                                    <? echo $this->Form->select('Categories._ids', $categories, [ 'label' => 'select one or more Categories ', 'class' => ' multiselect wide form-control']) ?> 
                                </div> 
                            </div>
                            <br/><br/><br/>
                            <div class="col-lg-12">
                            Select Countries : * </br>
                                <div style="overflow:scroll;height:100px;">
                                    <? echo $this->Form->select('Countries._ids', $countries, ['multiple' => 'checkbox', 'label' => 'select one or more Countries', 'class' => 'checkbox-horizontal']) ?>    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <? echo $this->Form->control('url', ['type' => 'url', 'required' => true, 'label' => 'URL', 'class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>


                    <div class="adpost-card pb-2">
                        <div class="adpost-agree">
                            <div class="form-group">
                                
                                                    <input type="checkbox" class="form-check">
-->
            </div>
            <!--
                                                <p>Send me Trade Email/SMS Alerts for people looking to buy mobile handsets in www By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer.</p>
-->
            <!-- </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-inline">
                                <i class="fas fa-check-circle"></i>
                                <span>save your ad</span>
                            </button>
                        </div>
                    </div>
                    <?= $this->Form->end() ?> -->
        </div>
    </div>
</div>
</div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            var categoriesSelected = document.querySelectorAll('input[name="Categories[_ids][]"]:checked');
            var countriesSelected = document.querySelectorAll('input[name="Countries[_ids][]"]:checked');
            
            if (categoriesSelected.length === 0 || countriesSelected.length === 0) {
                event.preventDefault(); // Prevent form submission
                alert('Please select at least one category and one country.')
                setTimeout(()=>{
                    $(".waitMe").remove();
                }, 500);
                
            }
        });
    } else {
        console.error('Form element not found.');
    }
});


    document.addEventListener('DOMContentLoaded', function() {
        const MAX_IMAGES = 4; // Maximum number of images allowed

        const photoInput = document.getElementById('photo');
        const previewImage = document.getElementById('preview-image');
        const postImagesInput = document.getElementById('postImages');
        const multiplePreviewContainer = document.querySelector('.multiple-img-preview');
        const submitBtn = document.getElementById('submitBtn');
        const url = document.getElementById('url');
        const description = document.getElementById('description');
        const titleInput = document.getElementById('titleInput');

        function updateSingleImagePreview(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.readAsDataURL(file); // Read the image content as a data URL

                reader.onload = function () {
                    previewImage.src = reader.result;
                };
            } else {
                previewImage.src = ''; // Clear the preview if no file is selected
            }
        }

        function updateMultipleImagePreview(event) {
            multiplePreviewContainer.innerHTML = ''; // Clear existing previews

            const files = event.target.files;

            if (files && files.length > 0) {
                // Limit the number of images to MAX_IMAGES
                const numImagesToAdd = Math.min(files.length, MAX_IMAGES);

                for (let i = 0; i < 4; i++) {
                    const file = files[i];
                    const reader = new FileReader();
                    reader.readAsDataURL(file);

                    // reader.onload = function (e) {
                    //     const img = document.createElement('img');
                    //     img.src = e.target.result;
                    //     img.width = 100; // Set a smaller width for multiple previews
                    //     img.height = 50; // Set a smaller height for multiple previews
                    //     multiplePreviewContainer.appendChild(img);
                    // };
                    
                    if (files.length > MAX_IMAGES) {
                            alert('You can only upload a maximum of ' + MAX_IMAGES + ' images.');
                            
                            // Clear the file input to prevent further uploads
                            postImagesInput.value = '';
                            multiplePreviewContainer.appendChild('')
                            return ;
                            
                    } 
                }

                // If the number of selected images exceeds the limit, inform the user
                
            }
        }

        photoInput.addEventListener('change', updateSingleImagePreview);
        postImagesInput.addEventListener('change', updateMultipleImagePreview);

        submitBtn.addEventListener('click', function () {
            // Additional logic for form submission if needed
        });
    });
</script>