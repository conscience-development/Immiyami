<div class="banners index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Banners') ?></h4>
            <?= $this->Html->link(__('New Banner'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th id="th_checkbox"> </th>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <th><?= $this->Paginator->sort('sponsor_name') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('photo') ?></th>
-->
                                <!--<th><?= $this->Paginator->sort('photo_dir') ?></th>-->
                         
																<th><?= $this->Paginator->sort('start_date') ?></th>

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
                                <th style="width: 100px;"><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($banners as $banner): ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$banner->id?>"></td>
                            <!--
                    <td><?= $this->Number->format($banner->id) ?></td>
-->                         

                            <?if(strlen($banner->title)>10):?>
                                <td><?= substr_replace($banner->title,"...",10) ?></td>
                            <?else:?>
                                <td><?=h($banner->title)?></td>
                            <?endif?>
                            <td><?= $banner->has('user') ? $this->Html->link($banner->user->first_name, ['controller' => 'Users', 'action' => 'view', $banner->user->id]) : '' ?>
                            </td>
                            <!--
                    <td><?= h($banner->photo) ?></td>
                    <td><?= h($banner->photo_dir) ?></td>
                    <td><?= h(date('Y/m/d H:i', strtotime($banner->start_date))) ?></td>
-->                         
                            <td><?= h(date('Y/m/d',strtotime($banner->start_date)))?></td>
                            <td><?= h(date('Y/m/d',strtotime($banner->end_date)))?></td>
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

                            <td><?= date('Y/m/d H:i:s',strtotime($banner->created))?></td>

                            <td class="actions">
                                <div class="d-flex">
                                    <? if($banner->status == '0'){ ?>
                                    <?= $this->Form->postLink('<i class="fa fa-check">'.__('').'</i>', 
								['action' => 'changestatus', $banner->id],
								['escape' => false, 'confirm' => __('Are you sure you want to update # {0}?', $banner->id),'class' => 'btn btn-danger shadow btn-xs sharp me-1']) ?>

                                    <?}?>

                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $banner->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $banner->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>

                                    <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $banner->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this banners', $banner->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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