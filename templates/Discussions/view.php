
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($discussion->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="discussions view content">
											<table class="table table-bordered table-responsive-sm">
																																												<tr>
													<th><?= __('User') ?></th>
													<td><?= $discussion->has('user') ? $this->Html->link($discussion->user->first_name, ['controller' => 'Users', 'action' => 'view', $discussion->user->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($discussion->id) ?></td>
																				</tr>
																				<tr>
													<th><?= __('Supplier Id') ?></th>
																													<td><?= $discussion->supplier_id === null ? '' : $this->Number->format($discussion->supplier_id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Date') ?></th>
													<td><?= h($discussion->date) ?></td>
												</tr>
																				<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($discussion->created) ?></td>
												</tr>
																																			</table>
																											<div class="text">
												<strong><?= __('Description') ?></strong>
												<blockquote>
													<?= $this->Text->autoParagraph(h($discussion->description)); ?>
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


