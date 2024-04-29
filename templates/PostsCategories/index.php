
<div class="postsCategories index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('Posts Categories') ?></h4>
			<?= $this->Html->link(__('New Posts Category'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="guestTable-all" class="display" style="min-width: 845px">
					<thead>
						<thead>
							<tr>
																<th><?= $this->Paginator->sort('id') ?></th>
																<th><?= $this->Paginator->sort('post_id') ?></th>
																<th><?= $this->Paginator->sort('category_id') ?></th>
																<th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($postsCategories as $postsCategory): ?>
                <tr>
                    <td><?= $this->Number->format($postsCategory->id) ?></td>
                    <td><?= $postsCategory->has('post') ? $this->Html->link($postsCategory->post->title, ['controller' => 'Posts', 'action' => 'view', $postsCategory->post->id]) : '' ?></td>
                    <td><?= $postsCategory->has('category') ? $this->Html->link($postsCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $postsCategory->category->id]) : '' ?></td>
                    
                    <td class="actions">
						<div class="d-flex">
						<?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $postsCategory->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $postsCategory->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $postsCategory->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete this post Categories ?', $postsCategory->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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
    

