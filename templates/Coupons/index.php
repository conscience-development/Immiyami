<div class="coupons index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Coupons') ?></h4>
            <?= $this->Html->link(__('New Coupon'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th id="th_checkbox"> </th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('code') ?></th>
                                <th><?= $this->Paginator->sort('offer_value') ?></th>
                                <th><?= $this->Paginator->sort('limitation') ?></th>
                                <th><?= $this->Paginator->sort('start_date') ?></th>
                                <th><?= $this->Paginator->sort('end_date') ?></th>
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($coupons as $coupon): ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$coupon->id?>"></td>
                            <!--
                    <td><?= $this->Number->format($coupon->id) ?></td>
-->

                            <?if(strlen($coupon->name)>10):?>
                                <td><?= substr_replace($coupon->name,"...",10) ?></td>
                            <?else:?>
                                <td><?=h($coupon->name)?></td>
                            <?endif?>
                            <td><?= h($coupon->code) ?></td>
                            <td><?= h($coupon->price) ?></td>
                            <td><?= h($coupon->limitation) ?></td>
                            <td><?= date('Y/m/d', strtotime($coupon->start_date)) ?></td>
                            <td><?= date('Y/m/d', strtotime($coupon->end_date)) ?></td>
                            <td>
                                <? if($coupon->status == '0'){ ?>
                                Inactive
                                <?}else{?>
                                Active
                                <?}?>
                            </td>

                            <td><?= date('Y/m/d H:s', strtotime($coupon->created)) ?></td>


                            <td class="actions">
                                <div class="d-flex">
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $coupon->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $coupon->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $coupon->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this Coupon', $coupon->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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