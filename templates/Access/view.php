
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($acces->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="access view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Status') ?></th>
													<td><?= h($acces->status) ?></td>
												</tr>
																																												<tr>
													<th><?= __('User') ?></th>
													<td><?= $acces->has('user') ? $this->Html->link($acces->user->first_name, ['controller' => 'Users', 'action' => 'view', $acces->user->id]) : '' ?></td>
												</tr>
																																												<tr>
													<th><?= __('Controller Func') ?></th>
													<td><?= $acces->has('controller_func') ? $this->Html->link($acces->controller_func->id, ['controller' => 'ControllerFunc', 'action' => 'view', $acces->controller_func->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($acces->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($acces->created) ?></td>
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


