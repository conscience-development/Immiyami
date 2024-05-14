<!-- 
    Modified by sehan 
    changes : change the single view of an article 
              Remove the short description 
              change some stylings of preview 
-->

<script src="path_to_tinymce/tinymce.min.js"></script>


<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title text-center">
          <div class="title-wrapper">
              <?= h($article->title) ?>
            </div>
        </h4>
        <div class="status-details ">
          <div class="created">
            <strong>
              <?= __('Created') ?>:
            </strong>
            <span>
              <?= date('Y/m/d H:i', strtotime($article->created)) ?>
            </span>
          </div>
          <?php if ($article->status == 1): ?>
            <div class="status active">
              <strong>
                <?= __('Status') ?>:
              </strong>
              <span style="color: blue;">Active</span>
            </div>
          <?php else: ?>
            <div class="status inactive">
              <strong>
                <?= __('Status') ?>:
              </strong>
              <span style="color: red;">Inactive</span>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="card-body">
        <div class="articles view content">
          <div class="article-details">
            <?php if ($article->photo_dir): ?>
              <div class="article-detail photo text-center">
                <img src="/files/articles/photo/<?= $article->photo_dir; ?>/square_<?= $article->photo; ?>"
                  alt="<?= h($article->title) ?>" style="width: 50%;" />
              </div>
            <?php else: ?>
              <div class="article-detail photo text-center">
                <img src="/files/articles/photo/newsview.jpg" alt="<?= h($article->title) ?>" style="width: 50%;" />
              </div>
            <?php endif; ?>

            <br /><br />
            <div class="article-content">
              <div>
                  <embed id="articleEmbed" src=<?= isset($article->description) ? "$article->description" : "" ?>></embed>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .title-wrapper {
    max-width: 50vw; /* Set the maximum width to the viewport width */
    word-wrap: break-word; /* Allow word wrap for long titles */
  }
</style>


<script>
  document.addEventListener("DOMContentLoaded", function() {
        // Find the element with the class .media
        var mediaElement = document.getElementById('articleEmbed');
        
        // Check if the .media element exists
        if (mediaElement) {
            // Hide the .media element by setting display to none
            mediaElement.style.display = "none";
        }
    });
</script>