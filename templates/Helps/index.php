
<div class="helps index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('Helps') ?></h4>
			<?= $this->Html->link(__('New Help'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="guestTable-all" class="display" style="min-width: 845px">
					<thead>
						<thead>
							<tr>
                                <th></th>
                                <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <!-- <th><?= $this->Paginator->sort('description') ?></th> -->
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($helps as $help): ?>
                <tr>
                    <td><input type="checkbox" class="checkbox_check_ind" val_id="<?=$help->id?>"></td>
                    <td><?= h($help->title) ?></td>
                    <!-- <td><?= h($help->description) ?></td> -->
                    <td>
						<? if($help->status == '0'){ ?>
							Inactive
						<?}else{?>
							Active
						<?}?>
					</td>

                    <td class="actions">
						<div class="d-flex">
						<?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $help->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $help->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $help->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete help?', $help->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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


