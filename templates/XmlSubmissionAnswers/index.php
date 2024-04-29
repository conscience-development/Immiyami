
<div class="xmlSubmissionAnswers index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('Xml Submission Answers') ?></h4>
			<?= $this->Html->link(__('New Xml Submission Answer'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="guestTable-all" class="display" style="min-width: 845px">
					<thead>
						<thead>
							<tr>
																<th><?= $this->Paginator->sort('id') ?></th>
																<th><?= $this->Paginator->sort('criteria_id') ?></th>
																<th><?= $this->Paginator->sort('criteria_answer_id') ?></th>
																<th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
																<th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($xmlSubmissionAnswers as $xmlSubmissionAnswer): ?>
                <tr>
                    <td><?= $this->Number->format($xmlSubmissionAnswer->id) ?></td>
                    <td><?= $xmlSubmissionAnswer->has('xml_criteria') ? $this->Html->link($xmlSubmissionAnswer->xml_criteria->name, ['controller' => 'XmlCriterias', 'action' => 'view', $xmlSubmissionAnswer->xml_criteria->id]) : '' ?></td>
                    <td><?= $xmlSubmissionAnswer->has('xml_criteria_answer') ? $this->Html->link($xmlSubmissionAnswer->xml_criteria_answer->name, ['controller' => 'XmlCriteriaAnswers', 'action' => 'view', $xmlSubmissionAnswer->xml_criteria_answer->id]) : '' ?></td>
                    <td><?= h($xmlSubmissionAnswer->created) ?></td>
                    
                    <td class="actions">
						<div class="d-flex">
						<?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $xmlSubmissionAnswer->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $xmlSubmissionAnswer->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $xmlSubmissionAnswer->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $xmlSubmissionAnswer->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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
    

