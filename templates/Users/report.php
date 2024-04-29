<div class="users index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Users Reports') ?></h4>
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
                                <!-- <th id="th_checkbox"> </th> -->
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
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('role') ?></th>
                                <!--
																<th><?= $this->Paginator->sort('category_id') ?></th>
																<th><?= $this->Paginator->sort('country_id') ?></th>
																<th><?= $this->Paginator->sort('preferred_country_id') ?></th>
																<th><?= $this->Paginator->sort('coupon_id') ?></th>
-->
                                <th style="margin-left:10px;"><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <!-- <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$user->id?>"></td> -->
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
                                <? if($user->status == '0'){ ?>
                                Inactive
                                <?}else{?>
                                Active
                                <?}?>
                            </td>
                            <td>
                                <? if($user->role == 'student'){ echo 'member';}else{ echo $user->role;} ?>
                            </td>
                            <!--
                    <td><?= $user->has('category') ? $this->Html->link($user->category->name, ['controller' => 'Categories', 'action' => 'view', $user->category->id]) : '' ?></td>
                    <td><?= $user->has('country') ? $this->Html->link($user->country->name, ['controller' => 'Countries', 'action' => 'view', $user->country->id]) : '' ?></td>
                    <td><?= $user->has('preferred_country') ? $this->Html->link($user->preferred_country->name, ['controller' => 'PreferredCountries', 'action' => 'view', $user->preferred_country->id]) : '' ?></td>
                    <td><?= $user->has('coupon') ? $this->Html->link($user->coupon->name, ['controller' => 'Coupons', 'action' => 'view', $user->coupon->id]) : '' ?></td>
                    
-->
                            <td ><?= date('Y/m/d H:s',strtotime(($user->created))) ?></td>
                            <td class="actions">
                                <div class="d-flex">
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $user->id],
							['escape' => false, 'title' => __('View'),'target'=>'_blank', 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $user->id],
							['escape' => false, 'title' => __('Edit'),'target'=>'_blank', 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <!-- <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $user->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this User ?', $user->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?> -->
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