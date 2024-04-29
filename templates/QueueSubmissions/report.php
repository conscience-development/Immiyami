<div class="queueSubmissions index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Sumition Reports') ?></h4>
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
                                <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                                <th><?= $this->Paginator->sort('message') ?></th>
                                <th><?= $this->Paginator->sort('member_id') ?></th>
                                <th><?= $this->Paginator->sort('supplier_id') ?></th>
                                <th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($queueSubmissions as $queueSubmission): ?>
                        <tr>
                            <!-- <td><?= $this->Number->format($queueSubmission->id) ?></td> -->
                            <td><?= h($queueSubmission->message) ?></td>
                            <td>
                                <?
                        $Users = \Cake\ORM\TableRegistry::getTableLocator()->get('Users');
                        $userData = $Users->get($queueSubmission->member_id);
                        echo $userData->first_name;
                    //$queueSubmission->member_id === null ? '' : $this->Number->format($queueSubmission->member_id)
                    ?>
                            </td>
                            <td><?= $queueSubmission->has('user') ? $this->Html->link($queueSubmission->user->first_name, ['controller' => 'Users', 'action' => 'view', $queueSubmission->user->id]) : '' ?>
                            </td>
                            <td><?= date('Y/m/d H:s', strtotime($queueSubmission->created)) ?></td>

                            <td class="actions">
                                <div class="d-flex">
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $queueSubmission->id],
							['escape' => false, 'title' => __('View'),'target'=>'_blank', 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $queueSubmission->id],
							['escape' => false, 'title' => __('Edit'),'target'=>'_blank', 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <!-- <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $queueSubmission->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete Queue Submission ?', $queueSubmission->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?> -->
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