<!--**********************************
	Content body start
***********************************-->
<!-- row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">
					<?= h($coupon->name) ?>
				</h4>
			</div>
			<div class="card-body">
				<div class="coupons view content">
					<div>
						<!-- Display coupon information using appropriate HTML structure -->
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>Name</th>
									<td>
										<?= h($coupon->name) ?>
									</td>
								</tr>
								<tr>
									<th>Code</th>
									<td>
										<?= h($coupon->code) ?>
									</td>
								</tr>
								<tr>
								<tr>
									<th>Offer value</th>
									<td>
										<?= h($coupon->price) ?>
									</td>
								</tr>
								<tr>
									<th>Limitations</th>
									<td>
										<?= h($coupon->limitation) ?>
									</td>
								</tr>
								<tr>
									<th>Start Date</th>
									<td>
										<?= date('Y/m/d', strtotime($coupon->start_date)) ?>
									</td>
								</tr>
								<tr>
									<th>End Date</th>
									<td>
										<?= date('Y/m/d', strtotime($coupon->end_date)) ?>
									</td>
								</tr>
								<tr>
									<th>Created</th>
									<td>
										<?= date('Y/m/d H:s', strtotime($coupon->created)) ?>
									</td>
								</tr>

								<tr>
									<th>Status</th>
									<td>
										<? if ($coupon->status == '1'): ?>
											<span style="color: blue;">Active</span>
										<? elseif ($coupon->status == '0'): ?>
											<span style="color: red;">Inactive</span>
										<? endif ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="related">
						<h4>
							<?= __('Related Users') ?>
						</h4>
						<?php if (!empty ($coupon->users)): ?>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Email</th>
											<th>Contact</th>
											<th>Status</th>
											<th>Role</th>
											<th>Created</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($coupon->users as $user): ?>
											<tr>
												<td>
													<?= h($user->first_name) ?>
												</td>
												<td>
													<?= h($user->last_name) ?>
												</td>
												<td>
													<?= h($user->email) ?>
												</td>
												<td>
													<?= h($user->contact) ?>
												</td>
												<td>
													<? if ($coupon->status == '1'): ?>
														<span style="color: blue;">Active</span>
													<? elseif ($coupon->status == '0'): ?>
														<span style="color: red;">Inactive</span>
													<? endif ?>
												</td>
												<td>
													<?= h($user->role) ?>
												</td>
												<td>
													<? if ($user->status == '1'): ?>
														<span style="color: blue;">Active</span>
													<? elseif ($user->status == '0'): ?>
														<span style="color: red;">Inactive</span>
													<? endif ?>
												</td>
												<td>
													<?= date('Y/m/d H:s', strtotime($user->created)) ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--**********************************
	Content body end
***********************************-->