<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
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
                <h4 class="card-title">
                    <?= __('Edit Post') ?>
                </h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <?= $this->Form->create($post, ['type' => 'file']) ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <fieldset>
                                <?php
                                echo $this->Form->control('supplier_id', ['options' => $users,'empty' => true, 'class' => 'multi-select wide form-control','label'=>'Supplier *']);
                                echo $this->Form->control('title', ['class' => 'form-control', 'id' => 'title','label'=>'Title *','required'=>true]);
                                // echo $this->Form->control('short_description', ['class' => 'form-control']);
                                echo $this->Form->control('description', ['class' => 'form-control', 'id' => 'description','label'=>'Description *']);
                                // echo $this->Form->control('photo', ['label' => 'Cover Photo ( chosen-file: ' . $post->photo . ' )', 'type' => 'file', 'class' => 'form-control']);   ?>
                                <?
                                //echo $this->Form->control('photo_dir',['class'=>'form-control']);
                                echo $this->Form->control('url', ['class' => 'form-control', 'id' => 'url','label'=>'URL *','required'=>true]);
                                // echo $this->Form->control('clicks',['class'=>'form-control']);
                                ?>
                                <div class="hidden">
                                    <?= $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1, 'empty' => true, 'class' => 'multi-select wide form-control']) ?>
                                </div>
                                <?
                                // echo $this->Form->select('Categories._ids',$post->posts_categories->category, ['multiple' => 'checkbox', 'label' => 'select one or more Categories', 'class' => 'checkbox-horizontal']);
                                //echo $this->Form->select('Categories._ids', ['multiple'=>'checkbox','required'=>true,'id'=>'cates','options' => $categories,'value'=>$categoriesS,'multiple'=>true, 'empty' => true,'class'=>'multiselect wide form-control']);   ?>
                                <?// echo $this->Form->control()  ?>
                                <div class="col-lg-12">
                                    <? echo $this->Form->control('photo', ['id' => 'photo', 'label' => 'Cover Image * - ( chosen-file: ' . $post->photo . ' )', 'type' => 'file', 'class' => 'form-control', 'accept' => 'image/*',]); ?>
                                    <div>
                                        <img src="/files/posts/photo/<?= $post->photo_dir; ?>/<?= $post->photo; ?>"
                                            width="200px" height="112px" id="preview-image">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <? echo $this->Form->control('postImages', ["id" => "postImages", 'accept' => 'image/*', 'label' => 'Images * (800px x 600px) (Maximum 4)*', 'type' => 'file', 'multiple' => true, 'class' => 'form-control']); ?>
                                    <div>New uploaded images </div>
                                    <div class="multiple-img-preview">

                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3 mb-3 images-tbl-dl">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <h4>Uploaded Images</h4>
                                                <hr>
                                                <table id="guestTable-all" class="display" style="min-width: 845px">
                                                    <thead>
                                                        <thead>
                                                            <tr>
                                                                <th>Image Name</th>
                                                                <th>Image</th>
                                                                <th class="actions">
                                                                    <?= __('Actions') ?>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($post->post_images as $postImage): ?>
                                                            <tr>
                                                                <td>
                                                                    <?= h($postImage->photo) ?>
                                                                </td>
                                                                <td>
                                                                    <img src="/files/postimages/photo/<?= $postImage->photo_dir; ?>/square_<?= $postImage->photo; ?>"
                                                                        alt="" class="w-20 mb-2">
                                                                </td>

                                                                <td class="actions">
                                                                    <div class="d-flex">
                                                                        <a href="/PostImages/deletePImg/<?= $postImage->id; ?>"
                                                                            class="btn btn-danger shadow btn-xs sharp"
                                                                            onclick="return confirm('Are you sure you want to delete post images #<?= $postImage->photo ?>')">
                                                                            <i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>

                                                <br />
                                                <div style="marging-left:10px">
                                                    <!-- Select Categories * : </br><br />
                                                    <div
                                                        style="overflow:scroll;height:100px;overflow-x: hidden;margin: left 10px;">
                                                        <? echo $this->Form->select('posts_countries._ids', $categories, ['multiple' => 'checkbox', 'label' => 'select one or more Categories *', 'class' => 'checkbox-horizontal']) ?>
                                                    </div> -->
                                                    <? echo $this->Form->control('Categories._ids', ['required'=>true,'id'=>'cates','options' => $categories,'value'=>'','multiple'=>true, 'empty' => true,'class'=>'multiselect wide form-control']);?>

                                                    <br />
                                                    <!-- Select Countries * : </br><br />
                                                    <div
                                                        style="overflow:scroll;height:100px;overflow-x: hidden;margin: left 10px;">
                                                        <? echo $this->Form->select('posts_categories._ids', $countries, ['multiple' => 'checkbox', 'label' => 'select one or more Countries *', 'class' => 'checkbox-horizontal', 'default' => $selectedCountryIds]) ?>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                            <?echo $this->Form->control('status', ['options' => ['0' => 'Inactive', '1' => 'Active'], 'class' => 'form-control','label'=>'Status *']);?>

                        </div>
                        <div class="mb-3 mt-3 row">
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

<style>
    .hidden {
        display: none;
    }
</style>
<!--**********************************
            Content body end
        ***********************************-->

<script>
    const photoInput = document.getElementById('photo');
    const previewImage = document.getElementById('preview-image');

    const postImagesInput = document.getElementById('postImages');
    const multiplePreviewContainer = document.querySelector('.multiple-img-preview');

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
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
                reader.readAsDataURL(file);

                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.width = 100; // Set a smaller width for multiple previews
                    img.height = 50; // Set a smaller height for multiple previews
                    multiplePreviewContainer.appendChild(img);
                };
            }
        }
    }

    photoInput.addEventListener('change', updateSingleImagePreview);
    postImagesInput.addEventListener('change', updateMultipleImagePreview);

    const submitBtn = document.getElementById('submitBtn');
    const url = document.getElementById('url');
    const description = document.getElementById('description');
    const photo = document.getElementById('photo');
    const titleInput = document.getElementById('titleInput');

    // submitBtn.addEventListener('click', function () {
    //     if (titleInput.value.trim() === '' || url.value.trim() === '' || description.value.trim() === '' || photo.value === '') {
    //         alert('Please fill in all the required fields.');
    //         return false; // Prevent form submission
    //     }
    //     else {

    //     }
    // });

</script>