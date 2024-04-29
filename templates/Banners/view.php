<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">
          <?=substr_replace($banner->title, "...", 30)?>
        </h4>
        <div class="status-details ">
          <div class="created">
            <strong>
              <?= __('Created') ?>:
            </strong>
            <span>
              <?= date('Y/m/d H:s', strtotime($banner->created)) ?>
            </span>
          </div>
          <?php if ($banner->status == 1): ?>
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
        <div class="banner-details">
          <table class="table">
            <tbody>
              <tr>
                <td><strong><?= __('Sponsor Name') ?>:</strong></td>
                <td><?= h($banner->user->first_name) ?></td>
              </tr>
              <tr>
                <td><strong><?= __('Photo') ?>:</strong></td>
                <td><img src="/files/banners/photo/<?= $banner->photo_dir ?>/<?= $banner->photo ?>" alt="<?= $banner->title ?>" style="width: 200px; height: 200px;"></td>
              </tr>
              <tr>
                <td><strong><?= __('Start Date') ?>:</strong></td>
                <td><?= date('Y/m/d', strtotime($banner->start_date)) ?></td>
              </tr>
              <tr>
                <td><strong><?= __('End Date') ?>:</strong></td>
                <td><?= date('Y/m/d', strtotime($banner->end_date)) ?></td>
              </tr>
              <tr>
                <td><strong><?= __('Url') ?>:</strong></td>
                <td><a href='<?= $banner->url ?>'><?= h($banner->url) ?></a></td>
              </tr>
              <tr>
                <td><strong><?= __('Position') ?>:</strong></td>
                <td><?= h($banner->position) ?></td>
              </tr>
              <tr>
                <td><strong><?= __('Banner Type') ?>:</strong></td>
                <td><?= $banner->has('banner_type') ? $this->Html->link($banner->banner_type->name, ['controller' => 'BannerTypes', 'action' => 'view', $banner->banner_type->id]) : '' ?></td>
              </tr>
              <tr>
                <td><strong><?= __('Price') ?>:</strong></td>
                <td><?= $banner->price === null ? '' : $this->Number->format($banner->price) ?></td>
              </tr>
              <tr>
                <td><strong><?= __('Note') ?>:</strong></td>
                <td><blockquote><?= $banner->note ?></blockquote></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
