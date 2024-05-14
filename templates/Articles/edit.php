<!-- 
    Modified by sehan 
    changes : Added to show the image that upload for file 
              commented and invisible the part of the short descprition 
-->
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header text-center">
        <h4 class="card-title"><?= __('Edit Article') ?></h4>
      </div>
      <div class="card-body">
        <div class="form-validation">
          <?= $this->Form->create($article, ['type' => 'file']) ?>
          <div class="row">
            <div class="col-xl-12">
              <fieldset>
                <div class="form-group">
                  <?= $this->Form->control('title', ['class' => 'form-control','label'=>'Title *','id'=>'title','required'=>true]); ?>
                </div>
                
                <!-- disable according to the client requirements  -->
                <!-- <div class="form-group">
                  <?= $this->Form->control('short_description', ['class' => 'form-control']); ?>
                </div> -->

                <div class="form-group">
                  <?= $this->Form->control('description', ['class' => 'form-control','label'=>'Description']); ?>
                </div>

                <div class="form-group">

                <br/> <br/>
                <p class="form-text text-muted">
                    <?= __('Leave empty to keep existing photo.') ?>
                  </p>
                  
                   <?php if($article->short_description){  ?>
                                    <img src="<?=$article->short_description;?>" class="existing-image" style="width: 250px; height: auto;" />
                        <?php }elseif($article->photo){  ?>
                                    <img class="existing-image" src="/files/articles/photo/<?= $article->photo_dir; ?>/square_<?= $article->photo; ?>" alt="<?= h($article->title) ?>" style="width: 250px; height: auto;"  />
                        <?php    }else{ ?>
                                    <img class="existing-image" src="/files/articles/photo/newsview.jpg" alt="<?= h($article->title) ?>" style="width: 250px; height: auto;" />
                        <?php    } ?>
                        
                        
                
                  <?= $this->Form->control('photo', ['type' => 'file','id' => 'articlePhoto', 'class' => 'form-control','accept' => 'image/*']); ?>
                </div>

                <div class="form-group">
                  <?= $this->Form->control('status', ['options' => ['0' => 'Inactive', '1' => 'Active'], 'class' => 'form-control','label'=>'Status *']); ?>
                </div>

                </fieldset>
            </div>
          </div>
          <div class="mb-3 mt-3 row">
            <div class="col-lg-12 align-right">
              <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary','id'=>'submitBtn']); ?>
            </div>
          </div>
          <?= $this->Form->end(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#articlePhoto').on('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = new Image();
                img.src = e.target.result;
                img.onload = function() {
                    // Adjust image size as needed
                    img.style.width = '350px'; // Adjust width as needed
                    img.style.height = 'auto';
                    
                    // Replace existing image with the new image
                    $('.existing-image img').attr('src', img.src);
                    $('.existing-image').show(); // Show the container
                };
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
<script>
        const submitBtn = document.getElementById('submitBtn');
        const titleInput = document.querySelector('input[name="title"]');
        const descriptionInput = document.querySelector('textarea[name="description"]');

        // const type=document.getElementById('type');

        // submitBtn.addEventListener('click', function() {
            // if (titleInput.value === '' || descriptionInput.value === '') {
                // alert('Please fill in both the title and description fields.');
            // }
        // });


        </script>
</body>
</html>
