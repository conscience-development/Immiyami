
<div class="xmlSheets index col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?= __('Xml Sheets') ?></h4>
			<?= $this->Html->link(__('New Xml Sheet'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="guestTable-all" class="display" style="min-width: 845px">
					<thead>
						<thead>
							<tr>
<!--
																<th><?= $this->Paginator->sort('id') ?></th>
-->
																<th><?= $this->Paginator->sort('name') ?></th>
																<th><?= $this->Paginator->sort('version') ?></th>
<!--
																<th><?= $this->Paginator->sort('file') ?></th>
-->
<!--
																<th><?= $this->Paginator->sort('file_dir') ?></th>
-->
																<th><?= $this->Paginator->sort('status') ?></th>
																<th><?= $this->Paginator->sort('user_id') ?></th>
<!--
																<th><?= $this->Paginator->sort('created', 'Created Date') ?></th>
-->
																<th class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
					</thead>
					<tbody>
                <?php foreach ($xmlSheets as $k=>$xmlSheet):
                    ?>
					<?
						if($xmlSheet->status=='1'):
					?>
                		<tr class="<? if($k == 0){ echo 'b-color-red';}?>">
					<?endif;?>
<!--
                    <td><?= $this->Number->format($xmlSheet->id) ?></td>
-->
                    <td><?= h($xmlSheet->name) ?></td>
                    <td><?= h($xmlSheet->version) ?></td>
<!--
                    <td><?= h($xmlSheet->file) ?></td>
                    <td><?= h($xmlSheet->file_dir) ?></td>
-->
                    <td><? if($xmlSheet->status == '0'){ ?>
							Inactive
						<?}else{?>
							Active
						<?}?></td>
                    <td><?= $xmlSheet->has('user') ? $this->Html->link($xmlSheet->user->first_name, ['controller' => 'Users', 'action' => 'view', $xmlSheet->user->id]) : '' ?></td>
<!--
                    <td><?= h($xmlSheet->created) ?></td>
-->

                    <td class="actions">
						<div class="d-flex">
						<a href="/files/xmlsheets/file/<?=$xmlSheet->file_dir;?>/<?=$xmlSheet->file;?>" download  title="Download" class="btn btn-primary shadow btn-xs sharp me-1">
							<i class="fas fa-download"></i>
						</a>

						<?= $this->Html->link(
							'<i class="fas fa-eye">' . __('') . '</i>',
							['action' => 'view', $xmlSheet->id],
							['escape' => false, 'title' => __('View'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
<!--
						<?= $this->Html->link(
							'<i class="fas fa-pencil-alt">' . __('') . '</i>',
							['action' => 'edit', $xmlSheet->id],
							['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-primary shadow btn-xs sharp me-1']
						) ?>
-->
						<?= $this->Form->postLink('<i class="fa fa-trash">'.__('').'</i>',
							['action' => 'delete', $xmlSheet->id],
							['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $xmlSheet->id),'class' => 'btn btn-danger shadow btn-xs sharp']) ?>
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


