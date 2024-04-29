
<div class="userLogs index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('User Logs') ?></h4>
			<?= $this->Html->link(__('New User Log'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="guestTable-all" class="display" style="min-width: 845px">
					<thead>
						<thead>
							<tr>
																<th><?= $this->Paginator->sort('id') ?></th>
																<th><?= $this->Paginator->sort('user_id') ?></th>
																<th><?= $this->Paginator->sort('action') ?></th>
																<th><?= $this->Paginator->sort('useragent') ?></th>
																<th><?= $this->Paginator->sort('os') ?></th>
																<th><?= $this->Paginator->sort('ip') ?></th>
																<th><?= $this->Paginator->sort('host') ?></th>
																<th><?= $this->Paginator->sort('referrer') ?></th>
																<th><?= $this->Paginator->sort('status') ?></th>
																<th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
																<th><?= $this->Paginator->sort('modified') ?></th>
																<th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($userLogs as $userLog): ?>
                <tr>
                    <td><?= $this->Number->format($userLog->id) ?></td>
                    <td><?= $userLog->has('user') ? $this->Html->link($userLog->user->first_name, ['controller' => 'Users', 'action' => 'view', $userLog->user->id]) : '' ?></td>
                    <td><?= h($userLog->action) ?></td>
                    <td><?= h($userLog->useragent) ?></td>
                    <td><?= h($userLog->os) ?></td>
                    <td><?= h($userLog->ip) ?></td>
                    <td><?= h($userLog->host) ?></td>
                    <td><?= h($userLog->referrer) ?></td>
                    <td><?= $userLog->status === null ? '' : $this->Number->format($userLog->status) ?></td>
                    <td><?= h($userLog->created) ?></td>
                    <td><?= h($userLog->modified) ?></td>
                    
                    <td class="actions">
						<div class="d-flex">
						<?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $userLog->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $userLog->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $userLog->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete User Log ?', $userLog->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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
	<p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>    
    

