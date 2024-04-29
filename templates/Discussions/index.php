<?
use Cake\ORM\TableRegistry;
?>
<div class="discussions index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Discussions') ?></h4>
            <?= $this->Html->link(__('New Discussion'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <th id="th_checkbox"> </th>
                                <th><?= $this->Paginator->sort('supplier_id') ?></th>
                                <th><?= $this->Paginator->sort('member_id') ?></th>
                                <th><?= $this->Paginator->sort('date') ?></th>
                                <!-- <th><?= $this->Paginator->sort('description') ?></th> -->
                                <th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($discussions as $discussion): ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$discussion->id?>"></td>
                            <td>
                                <?

                    // $discussion->supplier_id === null ? '' : $this->Number->format($discussion->supplier_id)
                    $this->Suppliers = TableRegistry::get('Users');
                    $supplier = $this->Suppliers->get($discussion->supplier_id);
                    echo $this->Html->link($supplier->first_name, ['controller' => 'Users', 'action' => 'view', $supplier->id]);
                    ?>
                            </td>
                            <td><?= $discussion->has('user') ? $this->Html->link($discussion->user->first_name, ['controller' => 'Users', 'action' => 'view', $discussion->user->id]) : '' ?>
                            </td>
                            <td><?= date('Y/m/d H:i',strtotime($discussion->date) )?></td>
                            <!-- <td><?= h($discussion->description) ?></td> -->
                            <td><?= date('Y/m/d H:i',strtotime($discussion->created) )?></td>

                            <td class="actions">
                                <div class="d-flex">
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $discussion->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $discussion->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $discussion->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this Discussion', $discussion->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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