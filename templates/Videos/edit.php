<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video $video
 */
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
                                <h4 class="card-title"><?= __('Edit Video') ?></h4>
                            </div>
                            <div class="card-body">   
                                <div class="form-validation">
                                    <?= $this->Form->create($video,['type'=>'file']) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('title',['class'=>'form-control','required'=>true,'label'=>'Titile *']);
                                                    echo $this->Form->control('type',['class'=>'form-control bold-text','id' => 'videoType','readonly'=>true,'required'=>true,'label'=>'Type *','style'=>'background:#ececec']);
                                                    if($video->type=='youtube'){
                                                        echo $this->Form->control('url',['type'=>'text','class'=>'form-control ','id'=> 'url','label'=>'URL *','required'=>true]);
                                                        $code = explode('=', $video->url);
									                    $code = explode('&', $code[1]);
                                                        ?>
                                                        <br/>
                                                        <div style="margin-left:9px">
                                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $code[0]; ?>"
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                allowfullscreen></iframe>
                                                        </div>
                                                    <?}
                                                    if($video->type=='upload'){
                                                        ?>  <br/>
                                                            <p class="form-text text-muted" style="margin:8px">
                                                                <?= __('Leave empty to keep existing photo.') ?>
                                                            </p>
                                                        <?
                                                        echo $this->Form->control('photo',['label'=>'Photo (480*360) - ( chosen-file: '.$video->photo.' )','type'=>'file','class'=>'form-control','style' => 'display: block;','id'=>'photo','accept' => "image/*"]);
                                                        ?>
                                                            <div class="preview-image" style="margin:8px">
                                                                <img src="/files/videos/photo/<?= $video->photo_dir; ?>/square_<?= $video->photo; ?>" alt="<?= h($video->title) ?>" style="width: 250px; height: auto;" />
                                                            </div>
                                                        <?
                                                        echo $this->Form->control('file',['label'=>'File ( chosen-file: '.$video->file.' )','type'=>'file','class'=>'form-control','style' => 'display: block;','id'=>'file','label'=>'File *']);
                                                        ?>
                                                            <div class="video-image" style="margin:8px">
                                                                <video width="400" height="340" controls>
										                            <source src="/files/videos/file/<?= $video->file_dir; ?>/<?= $video->file; ?>">
									                        </video>
                                                            </div>
                                                        <?
                                                    }
                                                    echo $this->Form->control('featured',['options' =>['0'=>'No','1'=>'Yes'] ,'class'=>'form-control','required'=>true ,'label'=>'Featured *']);
													echo $this->Form->control('premium',['options' =>['0'=>'No','1'=>'Yes'] ,'class'=>'form-control','required'=>true,'label'=>'Premium *']);
                                                    echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','label'=>'Status *']);
													    //echo $this->Form->control('photo_dir',['class'=>'form-control']);            
													//~ echo $this->Form->control('file_dir',['class'=>'form-control']);
										
												?>
											</fieldset>
												
                                            </div>
                                            <div class="mb-3 mt-3 row">
												<div class="col-lg-12 align-right">
													<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
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
    $(document).ready(function() {
        // Real-time preview for photo input
        const photoInput = document.querySelector('#photo');
        const previewImage = document.querySelector('.preview-image img');

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

        // Real-time preview for video file input
        const fileInput = document.querySelector('#file');
        const videoSource = document.querySelector('.video-image video source');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    videoSource.src = e.target.result;
                    const videoPlayer = document.querySelector('.video-image video');
                    videoPlayer.load();
                };

                reader.readAsDataURL(file);
            }
        });

        // Bold text in the input field
        const videoType = document.getElementById('videoType');
        videoType.style.fontWeight = 'bold';
    });
</script>



