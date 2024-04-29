<!--**********************************
    Content body start
***********************************-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <?= h($bannerType->name) ?>
                </h4>
            </div>
            <div class="card-body">
                <!-- Banner Type Details Table -->
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong><?= __('Name') ?></strong></td>
                            <td><?= h($bannerType->name) ?></td>
                        </tr>
                        <tr>
                            <td><strong><?= __('Created') ?></strong></td>
                            <td><?= date('Y/m/d H:s', strtotime(h($bannerType->created))) ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Related Banners Table -->
                <div class="related">
                    <h4><?= __('Related Banners') ?></h4>
                    <?php if (!empty($bannerType->banners)): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><?= __('Title') ?></th>
                                        <th><?= __('Sponsor Name') ?></th>
                                        <th><?= __('Photo') ?></th>
                                        <th><?= __('Start Date') ?></th>
                                        <th><?= __('End Date') ?></th>
                                        <th><?= __('Url') ?></th>
                                        <th><?= __('Position') ?></th>
                                        <th><?= __('Price') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bannerType->banners as $banner): ?>
                                        <tr>
                                            <td><?= h($banner->title) ?></td>
                                            <td><?= h($banner->sponsor_name) ?></td>
                                            <td><?= h($banner->photo) ?></td>
                                            <td><?= date('Y/m/d',strtotime($banner->start_date)) ?></td>
                                            <td><?= date('Y/m/d',strtotime($banner->end_date)) ?></td>
                                            <td><?= h($banner->url) ?></td>
                                            <td><?= h($banner->position) ?></td>
                                            <td><?= h($banner->price) ?></td>
                                            <td>
                                                <?php if ($banner->status == '1'): ?>
                                                    <span style="color:blue;">Active</span>
                                                <?php else: ?>
                                                    <span style="color:red;">Inactive</span>
                                                <?php endif ?>
                                            </td>
                                            <td><?= date('Y/m/d H:s',strtotime($banner->created)) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('View'), ['controller' => 'Banners', 'action' => 'view', $banner->id]) ?>
                                                <?= $this->Html->link(__('Edit'), ['controller' => 'Banners', 'action' => 'edit', $banner->id]) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Banners', 'action' => 'delete', $banner->id], ['confirm' => __('Are you sure you want to delete this Banner', $banner->id)]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
