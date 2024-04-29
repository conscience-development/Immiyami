
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($help->title) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="helps view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Title') ?></th>
													<td><?= h($help->title) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Status') ?></th>
													<td><?= h($help->status) ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($help->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($help->created) ?></td>
												</tr>
																																			</table>
																											<div class="text">
												<strong><?= __('Description') ?></strong>
												<blockquote>
													<?= $this->Text->autoParagraph(h($help->description)); ?>
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


