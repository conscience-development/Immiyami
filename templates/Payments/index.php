<div class="payments index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Member Payments') ?></h4>
            <!-- <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th id="th_checkbox"> </th>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <th><?= $this->Paginator->sort('Invoice No') ?></th>
                                <th><?= $this->Paginator->sort('price') ?></th>
                                <th><?= $this->Paginator->sort('payment_date') ?></th>
                                <th><?= $this->Paginator->sort('payment_status') ?></th>
                                <th><?= $this->Paginator->sort('package') ?></th>
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('user_id') ?></th>
                                <th style="width: 100px;"><?= $this->Paginator->sort('created','Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $payment): ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$payment->id?>"></td>
                            <!--
                    <td><?= $this->Number->format($payment->id) ?></td>
-->
                            <td><?= h($payment->title) ?></td>
                            <td><?= h($payment->txn_id) ?></td>
                            <td><?= $payment->price === null ? '' : $this->Number->format($payment->price) ?></td>
                            <td><?= $payment->payment_date === null ? '' : date('Y/m/d H:s',strtotime($payment->payment_date))?></td>
                            <td><?= h($payment->payment_status) ?></td>
                            <td><?= h($payment->package) ?></td>
                            <td>
                                <?

                        if($payment->status == '0'){
                            echo "Not Paid";
                        }else{
                            echo "Paid";
                        }
                    //echo h($payment->status) ?>
                            </td>
                            <td><?= $payment->has('user') ? $this->Html->link($payment->user->first_name, ['controller' => 'Users', 'action' => 'view', $payment->user->id]) : '' ?>
                            </td>

                            <td><?= date('Y/m/d H:s',strtotime(h($payment->created))) ?></td>


                            <td class="actions">
                                <div class="d-flex">
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $payment->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <!-- <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $payment->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?> -->
                                    <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $payment->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this payment ?', $payment->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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