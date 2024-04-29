
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($activityLog->id) ?></h4>
                            </div>
                            <div class="card-body">



										<div class="activityLogs view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Scope Model') ?></th>
													<td><?= h($activityLog->scope_model) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Scope Id') ?></th>
													<td><?= h($activityLog->scope_id) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Issuer Model') ?></th>
													<td><?= h($activityLog->issuer_model) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Issuer Id') ?></th>
													<td><?= h($activityLog->issuer_id) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Object Model') ?></th>
													<td><?= h($activityLog->object_model) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Object Id') ?></th>
													<td><?= h($activityLog->object_id) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Level') ?></th>
													<td><?= h($activityLog->level) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Action') ?></th>
													<td><?= h($activityLog->action) ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($activityLog->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created At') ?></th>
													<td><?= h($activityLog->created_at) ?></td>
												</tr>
																																			</table>
																											<!-- <div class="text">
												<strong><?= __('Message') ?></strong>
												<blockquote>
													<?= $this->Text->autoParagraph(h($activityLog->message)); ?>
												</blockquote>
											</div> -->
																			<div class="text">
												<strong><?= __('Data') ?></strong>
												<pre>
													<? print_r($activityLog->data); ?>
												</pre>
											</div>
																																										</div>




                            </div>
                        </div>
                    </div>
                </div>
        <!--**********************************
            Content body end
        ***********************************-->


