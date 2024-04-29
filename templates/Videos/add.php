<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video $video
 */
?>

<!DOCTYPE html>
<html>

<head>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://www.youtube.com/iframe_api"></script>
    
</head>
<body>
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= __('Add Video') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($video,['type'=>'file']) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
													echo $this->Form->control('title',['class'=>'form-control','required'=>true,'label'=>'Title *']);
                                                    echo $this->Form->control('type',['options' =>['youtube'=>'Youtube','upload'=>'Upload'] ,'class'=>'form-control','id' => 'videoType','default' => 'youtube','required'=>true,'label'=>'Type *']);
													echo $this->Form->control('url',['type'=>'text','class'=>'form-control' , 'style' => 'display: none;', 'id' => 'url' ,'label' => __('URL *'),'required'=>true] );
													echo $this->Form->control('photo',['label' => 'Photo * (480*360)', 'type' => 'file', 'class' => 'form-control', 'style' => 'display: none;', 'id' => 'photo','label' => __('Photo'),'accept' => 'image/*']);
													//echo $this->Form->control('photo_dir',['class'=>'form-control']);
													echo $this->Form->control('file',['type' => 'file', 'class' => 'form-control', 'style' => 'display: none;', 'id' => 'file','label'=> __('File *'),'accept' => 'video/*','required'=>false] );
													//~ echo $this->Form->control('file_dir',['class'=>'form-control']);
													echo $this->Form->control('featured',['options' =>['0'=>'No','1'=>'Yes'] ,'class'=>'form-control','required'=>true ,'label'=>'Featured *']);
													echo $this->Form->control('premium',['options' =>['0'=>'No','1'=>'Yes'] ,'class'=>'form-control','required'=>true,'label'=>'Premium *']);
													echo $this->Form->control('status',['options' =>['0'=>'Inactive','1'=>'Active'] ,'class'=>'form-control','label'=>'Status *']);
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
        // Set the default value of the dropdown to "Youtube"
        $('#videoType').val('youtube');

        // Immediately trigger the change event to handle initial visibility based on the default value
        $('#videoType').trigger('change');

        const urlInputField = document.querySelector('#url');
        const urlLabel = urlInputField.parentNode.querySelector('label');
        const photoInputField = document.querySelector('#photo');
        const photoLabel = photoInputField.parentNode.querySelector('label');
        const fileInputField = document.querySelector('#file');
        const fileLabel = fileInputField.parentNode.querySelector('label');

        urlInputField.style.display = 'block';
        urlLabel.style.display = 'block';
        photoInputField.style.display = 'none';
        fileInputField.style.display = 'none';
        photoLabel.style.display = 'none';
        fileLabel.style.display = 'none';

        $('#videoType').on('change', function() {
            var type = $(this).val();

            // Get references to the input fields and their labels
            const urlInputField = document.querySelector('#url');
            const urlLabel = urlInputField.parentNode.querySelector('label');
            const photoInputField = document.querySelector('#photo');
            const photoLabel = photoInputField.parentNode.querySelector('label');
            const fileInputField = document.querySelector('#file');
            const fileLabel = fileInputField.parentNode.querySelector('label');

            // Show/hide elements based on the selected video type
            if (type === 'youtube') {
            urlInputField.style.display = 'block';
            urlLabel.style.display = 'block';
            photoInputField.style.display = 'none';
            fileInputField.style.display = 'none';
            photoLabel.style.display = 'none';
            fileLabel.style.display = 'none';
            // Set the required attribute for URL input and remove it for file input
            urlInputField.setAttribute('required', 'required');
            fileInputField.removeAttribute('required');
        } else if (type === 'upload') {
            urlInputField.style.display = 'none';
            urlLabel.style.display = 'none';
            photoInputField.style.display = 'block';
            fileInputField.style.display = 'block';
            photoLabel.style.display = 'block';
            fileLabel.style.display = 'block';
            // Set the required attribute for file input and remove it for URL input
            fileInputField.setAttribute('required', 'required');
            urlInputField.removeAttribute('required');
        }
        });
    });

    // Function to validate if file is selected before form submission
    function validateFileUpload() {
        const fileInput = document.getElementById('file');
        if (fileInput.files.length === 0) {
            alert('Please select a video file');
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }

    // Attach the validateFileUpload function to the form submission event
    $('#videoForm').submit(function() {
        return validateFileUpload();
    });


        </script>
</body>  

</html>