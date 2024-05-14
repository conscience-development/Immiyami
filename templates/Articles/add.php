<!-- 
    Modified by sehan 
    changes : Remove the short descprition from the Add Article form
-->

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 * @var \Cake\Collection\CollectionInterface|string[] $users
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
                                <h4 class="card-title"><?= __('Add Article') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($article,['type'=>'file']) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('title',['class'=>'form-control','label'=>'Title *','id'=>'title','required'=>true]);
													echo $this->Form->control('short_description',['required' => false,'label'=>'ddd','class'=>'form-control','id'=>'short_description','type' => 'hidden']);
                                                    echo $this->Form->control('description',['class'=>'form-control','label'=>'Description']);                                                    ?>
                                                    <br/>
                                                    <button id="gen-thumb">Genarate Thumbnail</button>
                                                    <p class="form-text text-muted" style="margin:8px">
                                                        <?= __('Leave empty to keep existing photo.') ?>
                                                    </p>
													<?echo $this->Form->control('photo',['label'=>'Photo (750*450)','type'=>'file','class'=>'form-control','accept' => 'image/*']);?>
                                                    <div class="col-xl-12">
                                                        <fieldset>
                                                            <div class="img-preview">
                                                                <img id="preview-image" src="/files/articles/photo/newsview.jpg" alt="Preview Image" width="200px" length="112px">
                                                            </div>
                                                        </fieldset>
                                                    </div>
													<?//echo $this->Form->control('photo_dir',['class'=>'form-control']);
													echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','label'=>'Status *','id'=>'status']);
													//~ echo $this->Form->control('user_id', ['options' => $users, 'empty' => true,'class'=>'multi-select wide form-control']);
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
    const titleInput = document.querySelector('input[name="title"]');
    const descriptionInput = document.querySelector('textarea[name="description"]');
    const previewImage = document.getElementById('preview-image');
    const photoInput = document.querySelector('input[type="file"]');

    const title =document.getElementById('title');
    const descprition =document.getElementById('descprition');
    const status =document.getElementById('status');
    const gen_thumb =document.getElementById('gen-thumb');

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
    
    gen_thumb.addEventListener('click', function() {
        event.preventDefault();
        var oembedUrl = document.getElementsByTagName('iframe')[0].getAttribute('src');
        document.getElementById('preview-image').src = getYouTubeThumbnail(oembedUrl)
        var textarea = document.getElementById('short_description')
        textarea.value = getYouTubeThumbnail(oembedUrl)
    });
    
    function getYouTubeThumbnail(embedUrl) {
        const videoId = embedUrl.match(/\/embed\/([^/?]+)/)[1]
        // Construct thumbnail URL
        var thumbnailUrl = 'https://i.ytimg.com/vi/' + videoId + '/maxresdefault.jpg';
        // Return the thumbnail URL
        return thumbnailUrl;
    }
    

    submitBtn.addEventListener('click', function() {
        // if (titleInput.value == '',description.value =='',status.value =='') {
        //     alert('Please fill the title field');
        //     return false; // Prevent form submission
        // } else {
        //     // Optionally, you can add additional form validation logic here
        // }
    });
</script>

