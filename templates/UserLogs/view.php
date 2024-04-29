
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($userLog->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="userLogs view content">
											<table class="table table-bordered table-responsive-sm">
																																												<tr>
													<th><?= __('User') ?></th>
													<td><?= $userLog->has('user') ? $this->Html->link($userLog->user->first_name, ['controller' => 'Users', 'action' => 'view', $userLog->user->id]) : '' ?></td>
												</tr>
																																				<tr>
													<th><?= __('Action') ?></th>
													<td><?= h($userLog->action) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Useragent') ?></th>
													<td><?= h($userLog->useragent) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Os') ?></th>
													<td><?= h($userLog->os) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Ip') ?></th>
													<td><?= h($userLog->ip) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Host') ?></th>
													<td><?= h($userLog->host) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Referrer') ?></th>
													<td><?= h($userLog->referrer) ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($userLog->id) ?></td>
																				</tr>
																				<tr>
													<th><?= __('Status') ?></th>
																													<td><?= $userLog->status === null ? '' : $this->Number->format($userLog->status) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($userLog->created) ?></td>
												</tr>
																				<tr>
													<th><?= __('Modified') ?></th>
													<td><?= h($userLog->modified) ?></td>
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


