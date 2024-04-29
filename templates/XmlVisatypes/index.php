
<div class="xmlVisatypes index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('Xml Visatypes') ?></h4>
			<?= $this->Html->link(__('New Xml Visatype'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="guestTable-all" class="display" style="min-width: 845px">
					<thead>
						<thead>
							<tr>
																<th><?= $this->Paginator->sort('id') ?></th>
																<th><?= $this->Paginator->sort('name') ?></th>
																<th><?= $this->Paginator->sort('xml_country_id') ?></th>
																<th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
																<th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($xmlVisatypes as $xmlVisatype): ?>
                <tr>
                    <td><?= $this->Number->format($xmlVisatype->id) ?></td>
                    <td><?= h($xmlVisatype->name) ?></td>
                    <td><?= $xmlVisatype->has('xml_country') ? $this->Html->link($xmlVisatype->xml_country->name, ['controller' => 'XmlCountries', 'action' => 'view', $xmlVisatype->xml_country->id]) : '' ?></td>
                    <td><?= h($xmlVisatype->created) ?></td>
                    
                    <td class="actions">
						<div class="d-flex">
						<?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $xmlVisatype->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $xmlVisatype->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>', 
							['action' => 'delete', $xmlVisatype->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $xmlVisatype->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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
    

