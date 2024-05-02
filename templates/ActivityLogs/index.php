<?php
use Cake\ORM\TableRegistry;
?>
<div class="activityLogs index col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= __('Activity Logs') ?></h4>
            <!-- <?= $this->Html->link(__('New Activity Log'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="guestTable-all" class="display" style="min-width: 845px">
                    <thead>
                        <thead>
                            <tr>
                                <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                                <th><?= $this->Paginator->sort('created_at') ?></th>
                                <th><?= $this->Paginator->sort('scope_model') ?></th>
                                <th><?= $this->Paginator->sort('scope_id') ?></th>
                                <th><?= $this->Paginator->sort('issuer_model') ?></th>
                                <th><?= $this->Paginator->sort('issuer') ?></th>
                                <th><?= $this->Paginator->sort('object_model') ?></th>
                                <th><?= $this->Paginator->sort('object_id') ?></th>
                                <th><?= $this->Paginator->sort('level') ?></th>
                                <th><?= $this->Paginator->sort('action') ?></th>
                                <!-- <th><?= $this->Paginator->sort('message') ?></th> -->
                                <th><?= $this->Paginator->sort('data') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        <?php foreach ($activityLogs as $activityLog): ?>
                        <tr>
                            <!-- <td><?= $this->Number->format($activityLog->id) ?></td> -->
                            <td><?= date('Y/m/d H:m', strtotime($activityLog->created_at)) ?></td>
                            <td><?= h($activityLog->scope_model) ?></td>
                            <td><?= h($activityLog->scope_id) ?></td>
                            <td><?= h($activityLog->issuer_model) ?></td>
                            <td><?php
                                $this->Users = TableRegistry::get('Users');
                                if(!empty($activityLog->issuer_id)){

                                    $getUser = @$this->Users->get($activityLog->issuer_id);
                                    //h($activityLog->issuer_id)
                                       echo $getUser->first_name.' '.$getUser->last_name;
                                }
                             ?></td>
                            <td><?= h($activityLog->object_model) ?></td>
                            <td><?= h($activityLog->object_id) ?></td>
                            <td><?= h($activityLog->level) ?></td>
                            <td><?= h($activityLog->action) ?></td>
                            <!-- <td><?= h($activityLog->message) ?></td> -->
                            <td><pre><?

                            //$jsonArr = json_decode($activityLog->data);
                            print_r($activityLog->data);
                            //echo json_encode($jsonArr,JSON_PRETTY_PRINT) ?></pre></td>

                            <td class="actions">
                                <div class="d-flex">
                                    <?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $activityLog->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <!-- <?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $activityLog->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
                                    <?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $activityLog->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this Activity Log', $activityLog->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?> -->
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
