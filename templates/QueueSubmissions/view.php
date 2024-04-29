
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($queueSubmission->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="queueSubmissions view content">
											<table class="table table-bordered table-responsive-sm">
																																												<tr>
													<th><?= __('User') ?></th>
													<td><?= $queueSubmission->has('user') ? $this->Html->link($queueSubmission->user->first_name, ['controller' => 'Users', 'action' => 'view', $queueSubmission->user->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($queueSubmission->id) ?></td>
																				</tr>
																				<tr>
													<th><?= __('Member Id') ?></th>
																													<td><?= $queueSubmission->member_id === null ? '' : $this->Number->format($queueSubmission->member_id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($queueSubmission->created) ?></td>
												</tr>
																																			</table>
																											<div class="text">
												<strong><?= __('Message') ?></strong>
												<blockquote>
													<?= $this->Text->autoParagraph(h($queueSubmission->message)); ?>
												</blockquote>
											</div>
																																										</div>

                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
        <!--**********************************
            Content body end
        ***********************************-->


