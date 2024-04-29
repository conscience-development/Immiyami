
<div class="xmlSubmissions index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('Xml Submissions') ?></h4>
			<?= $this->Html->link(__('New Xml Submission'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="guestTable-all" class="display" style="min-width: 845px">
					<thead>
						<thead>
							<tr>
																<th><?= $this->Paginator->sort('id') ?></th>
																<th><?= $this->Paginator->sort('xml_sheet_id') ?></th>
																<th><?= $this->Paginator->sort('xml_country_id') ?></th>
																<th><?= $this->Paginator->sort('xml_vsatype_id') ?></th>
																<th><?= $this->Paginator->sort('xml_qualification_id') ?></th>
																<th><?= $this->Paginator->sort('user_id') ?></th>
																<th><?= $this->Paginator->sort('created ', 'Created Date') ?></th>
																<th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($xmlSubmissions as $xmlSubmission): ?>
                <tr>
                    <td><?= $this->Number->format($xmlSubmission->id) ?></td>
                    <td><?= $xmlSubmission->has('xml_sheet') ? $this->Html->link($xmlSubmission->xml_sheet->name, ['controller' => 'XmlSheets', 'action' => 'view', $xmlSubmission->xml_sheet->id]) : '' ?></td>
                    <td><?= $xmlSubmission->has('xml_country') ? $this->Html->link($xmlSubmission->xml_country->name, ['controller' => 'XmlCountries', 'action' => 'view', $xmlSubmission->xml_country->id]) : '' ?></td>
                    <td><?= $xmlSubmission->has('xml_visatype') ? $this->Html->link($xmlSubmission->xml_visatype->name, ['controller' => 'XmlVisatypes', 'action' => 'view', $xmlSubmission->xml_visatype->id]) : '' ?></td>
                    <td><?= $xmlSubmission->has('xml_qualification') ? $this->Html->link($xmlSubmission->xml_qualification->name, ['controller' => 'XmlQualifications', 'action' => 'view', $xmlSubmission->xml_qualification->id]) : '' ?></td>
                    <td><?= $xmlSubmission->has('user') ? $this->Html->link($xmlSubmission->user->first_name, ['controller' => 'Users', 'action' => 'view', $xmlSubmission->user->id]) : '' ?></td>
                    <td><?= h($xmlSubmission->created) ?></td>
                    
                    <td class="actions">
						<div class="d-flex">
						<?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $xmlSubmission->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $xmlSubmission->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $xmlSubmission->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $xmlSubmission->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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
    

