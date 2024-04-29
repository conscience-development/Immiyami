
<div class="galleries index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('Galleries') ?></h4>
			<?= $this->Html->link(__('New Gallery'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="guestTable-all" class="display" style="min-width: 845px">
					<thead>
						<thead>
							<tr>
																<th id="th_checkbox"> </th>
																<th><?= $this->Paginator->sort('title') ?></th>
																<th><?= $this->Paginator->sort('photo') ?></th>
																<!--<th><?= $this->Paginator->sort('photo_dir') ?></th>-->
																<th><?= $this->Paginator->sort('status') ?></th>
																<th><?= $this->Paginator->sort('user_id') ?></th>
																<!--<th><?= $this->Paginator->sort('created', 'Created Date') ?></th>-->
																<th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($galleries as $gallery): ?>
                <tr>
					<td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$gallery->id?>"></td>
<!--
                    <td><?= $this->Number->format($gallery->id) ?></td>
-->
<!--
                    <td><?= h($gallery->title) ?></td>
-->
                    <td><?= h($gallery->photo) ?></td>
<!--
                    <td><?= h($gallery->photo_dir) ?></td>
-->
                    <td><?= h($gallery->status) ?></td>
                    <td><?= $gallery->has('user') ? $this->Html->link($gallery->user->name, ['controller' => 'Users', 'action' => 'view', $gallery->user->id]) : '' ?></td>
<!--
                    <td><?= h($gallery->created) ?></td>
-->
                    
                    <td class="actions">
						<div class="d-flex">
						<?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $gallery->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $gallery->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $gallery->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete Gallery?', $gallery->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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
    

