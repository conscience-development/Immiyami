
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($flag->name) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="flags view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Name') ?></th>
													<td><?= h($flag->name) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Photo') ?></th>
													<td><?= h($flag->photo) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Photo Dir') ?></th>
													<td><?= h($flag->photo_dir) ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($flag->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($flag->created) ?></td>
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


