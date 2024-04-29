
<div class="xmlCriterias index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('Xml Criterias') ?></h4>
			<?= $this->Html->link(__('New Xml Criteria'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="guestTable-all" class="display" style="min-width: 845px">
					<thead>
						<thead>
							<tr>
																<th><?= $this->Paginator->sort('id') ?></th>
																<th><?= $this->Paginator->sort('name') ?></th>
																<th><?= $this->Paginator->sort('tagname') ?></th>
																<th><?= $this->Paginator->sort('useForSuggestions') ?></th>
																<th><?= $this->Paginator->sort('maxpoint') ?></th>
																<th><?= $this->Paginator->sort('question') ?></th>
																<th><?= $this->Paginator->sort('xml_qualification_id') ?></th>
																<th><?= $this->Paginator->sort('created ', 'Created Date') ?></th>
																<th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($xmlCriterias as $xmlCriteria): ?>
                <tr>
                    <td><?= $this->Number->format($xmlCriteria->id) ?></td>
                    <td><?= h($xmlCriteria->name) ?></td>
                    <td><?= h($xmlCriteria->tagname) ?></td>
                    <td><?= h($xmlCriteria->useForSuggestions) ?></td>
                    <td><?= h($xmlCriteria->maxpoint) ?></td>
                    <td><?= h($xmlCriteria->question) ?></td>
                    <td><?= $xmlCriteria->has('xml_qualification') ? $this->Html->link($xmlCriteria->xml_qualification->name, ['controller' => 'XmlQualifications', 'action' => 'view', $xmlCriteria->xml_qualification->id]) : '' ?></td>
                    <td><?= h($xmlCriteria->created) ?></td>
                    
                    <td class="actions">
						<div class="d-flex">
						<?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $xmlCriteria->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $xmlCriteria->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $xmlCriteria->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $xmlCriteria->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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
    

