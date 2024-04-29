<!--**********************************
			Content body start
		***********************************-->
<!-- row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">
					<?= h($payment->title) ?>
				</h4>
			</div>
			<div class="card-body">



				<div class="payments view content">
					<table class="table table-bordered table-responsive-sm">
						<tr>
							<th>
								<?= __('Title') ?>
							</th>
							<td>
								<?= h($payment->title) ?>
							</td>
						</tr>
						<tr>
							<th>
								<?= __('Type') ?>
							</th>
							<td>
								<?= h($payment->type) ?>
							</td>
						</tr>
						<tr>
							<th>
								<?= __('Package') ?>
							</th>
							<td>
								<?= h($payment->package) ?>
							</td>
						</tr>
						<tr>
							<th>
								<?= __('Status') ?>
							</th>
							<td>
                                <?if($payment->status=='1'):?>
                                    <span style="color: blue;">Active</span>
                                <?elseif($payment->status=='0'):?>
                                    <span style="color: red;">Inactive</span>
                                <?endif?>
                            </td>
						</tr>
						<tr>
							<th>
								<?= __('User') ?>
							</th>
							<td>
								<!-- <?= $payment->has('user') ? $this->Html->link($payment->user->name, ['controller' => 'Users', 'action' => 'view', $payment->user->id]) : '' ?> -->
								<?= h($payment->user->first_name);?>
							</td>
						</tr>
						<tr>
							<th>
								<?= __('Price') ?>
							</th>
							<td>
								<?= $payment->price === null ? '' : $this->Number->format($payment->price) ?>
							</td>
						</tr>
						<tr>
							<th>
								<?= __('Payment Date') ?>
							</th>
							<td>
							<?=  date('Y/m/d H:s',strtotime($payment->payment_date)) ?>
							</td>
						</tr>
						<tr>
							<th>
								<?= __('Created') ?>
							</th>
							<td>
								<?=  date('Y/m/d H:s',strtotime($payment->created)) ?>
							</td>
						</tr>
					</table>
				</div>




			</div>
		</div>
	</div>
</div>
<!--**********************************
			Content body end
		***********************************-->