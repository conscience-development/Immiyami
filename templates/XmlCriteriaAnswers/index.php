
<div class="xmlCriteriaAnswers index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('Xml Criteria Answers') ?></h4>
			<?= $this->Html->link(__('New Xml Criteria Answer'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
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
																<th><?= $this->Paginator->sort('answer') ?></th>
																<th><?= $this->Paginator->sort('point') ?></th>
																<th><?= $this->Paginator->sort('criteria_id') ?></th>
																<th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
																<th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($xmlCriteriaAnswers as $xmlCriteriaAnswer): ?>
                <tr>
                    <td><?= $this->Number->format($xmlCriteriaAnswer->id) ?></td>
                    <td><?= h($xmlCriteriaAnswer->name) ?></td>
                    <td><?= h($xmlCriteriaAnswer->tagname) ?></td>
                    <td><?= h($xmlCriteriaAnswer->answer) ?></td>
                    <td><?= h($xmlCriteriaAnswer->point) ?></td>
                    <td><?= $xmlCriteriaAnswer->has('xml_criteria') ? $this->Html->link($xmlCriteriaAnswer->xml_criteria->name, ['controller' => 'XmlCriterias', 'action' => 'view', $xmlCriteriaAnswer->xml_criteria->id]) : '' ?></td>
                    <td><?= h($xmlCriteriaAnswer->created) ?></td>
                    
                    <td class="actions">
						<div class="d-flex">
						<?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $xmlCriteriaAnswer->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $xmlCriteriaAnswer->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $xmlCriteriaAnswer->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $xmlCriteriaAnswer->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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
    

