<div class="banners index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Banner Reports') ?></h4>
            <?= $this->Form->create(null, ['type'=>'POST']); ?>
            <?= $this->Form->control('export',['type'=>'hidden','value'=>'1','class'=>'form-control']);?>
            <?= $this->Form->button(__('Export XLSX'), ['class' => 'btn btn-primary float-right']) ?>
            <?= $this->Form->end() ?>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <th><?= $this->Paginator->sort('sponsor_name') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('photo') ?></th>
-->
                                <!--<th><?= $this->Paginator->sort('photo_dir') ?></th>-->
                                <!--
																<th><?= $this->Paginator->sort('start_date') ?></th>
-->
                                <th><?= $this->Paginator->sort('end_date') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('url') ?></th>
-->
                                <th><?= $this->Paginator->sort('position') ?></th>
                                <th><?= $this->Paginator->sort('price') ?></th>
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('banner_type_id') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('user_id') ?></th>
-->
                                <th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($banners as $banner): ?>
                        <tr>
                            <!--
                    <td><?= $this->Number->format($banner->id) ?></td>
-->
                            <td><?= h($banner->title) ?></td>
                            <td><?= $banner->has('user') ? $this->Html->link($banner->user->first_name, ['controller' => 'Users', 'action' => 'view', $banner->user->id]) : '' ?>
                            </td>
                            <!--
                    <td><?= h($banner->photo) ?></td>
                    <td><?= h($banner->photo_dir) ?></td>
                    <td><?= h($banner->start_date) ?></td>
-->
                            <td><?= date('Y/m/d',strtotime(($banner->end_date))) ?></td>
                            <!--
                    <td><?= h($banner->url) ?></td>
-->
                            <td><?= h($banner->position) ?></td>
                            <td><?= $banner->price === null ? '' : $this->Number->format($banner->price) ?></td>
                            <td>
                                <? if($banner->status == '0'){ ?>
                                Inactive
                                <?}else{?>
                                Active
                                <?}?>
                            </td>
                            <td><?= $banner->has('banner_type') ? $this->Html->link($banner->banner_type->name, ['controller' => 'BannerTypes', 'action' => 'view', $banner->banner_type->id]) : '' ?>
                            </td>


                            <td><?= date('Y/m/d H:s',strtotime(($banner->created))) ?></td>


                            <td class="actions">
                                <div class="d-flex">
                                    <? if($banner->status == '0'){ ?>
                                    <!-- <?= $this->Form->postLink('<i class="fa fa-check">'.__('').'</i>',
								['action' => 'changestatus', $banner->id],
								['escape' => false, 'confirm' => __('Are you sure you want to update # {0}?', $banner->id),'class' => 'btn btn-danger shadow btn-xs sharp me-1']) ?> -->

                                    <?}?>

                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $banner->id],
							['escape' => false, 'title' => __('View'),'target'=>'_blank', 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>

                            <td colspan="4" class="text-right">
                                <b>Total : </b>
                            </td>
                            <td>
                                <b><?=$bannerTotalPrice;?></b>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="paginator">
    <ul class="pagination  pagination-circle">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </p>
</div>