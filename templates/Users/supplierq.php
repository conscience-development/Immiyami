<div class="users index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Suppliers in queue') ?></h4>
            <!-- <?= $this->Html->link(__('New Supplier'), ['action' => 'addSupplier'], ['class' => 'btn btn-primary float-right']) ?> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th id="th_checkbox"> </th>
                                <th><?= $this->Paginator->sort('first_name') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('last_name') ?></th>
-->
                                <th><?= $this->Paginator->sort('email') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('bio') ?></th>
-->
                                <th><?= $this->Paginator->sort('contact') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('photo') ?></th>
-->
                                <!--<th><?= $this->Paginator->sort('photo_dir') ?></th>-->
                                <!--
																<th><?= $this->Paginator->sort('last_login') ?></th>
																<th><?= $this->Paginator->sort('password_reset_token') ?></th>
																<th><?= $this->Paginator->sort('company_name') ?></th>
-->
                                <th><?= $this->Paginator->sort('Queue') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('role') ?></th>
-->
                                <!--
																<th><?= $this->Paginator->sort('category_id') ?></th>
																<th><?= $this->Paginator->sort('country_id') ?></th>
																<th><?= $this->Paginator->sort('preferred_country_id') ?></th>
																<th><?= $this->Paginator->sort('coupon_id') ?></th>
-->
                                <th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$user->id?>"></td>
                            <!--
                    <td><?= $this->Number->format($user->id) ?></td>
-->
                            <td><?= h($user->first_name) ?></td>
                            <!--
                    <td><?= h($user->last_name) ?></td>
-->
                            <td><?= h($user->email) ?></td>
                            <!--
                    <td><?= h($user->bio) ?></td>
-->
                            <td><?= h($user->contact) ?></td>
                            <!--
                    <td><?= h($user->photo) ?></td>
                    <td><?= h($user->photo_dir) ?></td>
                    <td><?= h($user->last_login) ?></td>
                    <td><?= h($user->password_reset_token) ?></td>
                    <td><?= h($user->company_name) ?></td>
-->
                            <td>
                                <? if($user->q_active == '0'){ ?>
                                Inactive
                                <?}else{?>
                                Active
                                <?}?>
                            </td>
                            <!--
                    <td><?= h($user->role) ?></td>
-->
                            <!--
                    <td><?= $user->has('category') ? $this->Html->link($user->category->name, ['controller' => 'Categories', 'action' => 'view', $user->category->id]) : '' ?></td>
                    <td><?= $user->has('country') ? $this->Html->link($user->country->name, ['controller' => 'Countries', 'action' => 'view', $user->country->id]) : '' ?></td>
                    <td><?= $user->has('preferred_country') ? $this->Html->link($user->preferred_country->name, ['controller' => 'PreferredCountries', 'action' => 'view', $user->preferred_country->id]) : '' ?></td>
                    <td><?= $user->has('coupon') ? $this->Html->link($user->coupon->name, ['controller' => 'Coupons', 'action' => 'view', $user->coupon->id]) : '' ?></td>
                    <td><?= h($user->created) ?></td>
-->
                            <td><?= date('Y/m/d H:s',strtotime($user->created))?></td>

                            <td class="actions">
                                <div class="d-flex">
                                    <? if($user->q_active == '0'){ ?>
                                    <?= $this->Form->postLink('<i class="fa fa-check">'.__('').'</i>',
							['action' => 'changestatussupplierq', $user->id,'1'],
							['escape' => false, 'confirm' => __('Are you sure you want to update # {0}?', $user->id),'class' => 'btn btn-danger shadow btn-xs sharp me-1']) ?>

                                    <?}else{?>
                                    <?= $this->Form->postLink('<i class="fa fa-times">'.__('').'</i>',
							['action' => 'changestatussupplierq', $user->id,'0'],
							['escape' => false, 'confirm' => __('Are you sure you want to update # {0}?', $user->id),'class' => 'btn btn-danger shadow btn-xs sharp me-1']) ?>


                                    <?}?>
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $user->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
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