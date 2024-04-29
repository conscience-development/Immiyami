
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($setting->name) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="settings view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Name') ?></th>
													<td><?= h($setting->name) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Key Value') ?></th>
													<td><?= h($setting->key_value) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Value') ?></th>
													<td><?= h($setting->value) ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($setting->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($setting->created) ?></td>
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


