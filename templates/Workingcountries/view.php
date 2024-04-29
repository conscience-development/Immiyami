
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($workingcountry->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="workingcountries view content">
											<table class="table table-bordered table-responsive-sm">
																																												<tr>
													<th><?= __('Country') ?></th>
													<td><?= $workingcountry->has('country') ? $this->Html->link($workingcountry->country->name, ['controller' => 'Countries', 'action' => 'view', $workingcountry->country->id]) : '' ?></td>
												</tr>
																																												<tr>
													<th><?= __('User') ?></th>
													<td><?= $workingcountry->has('user') ? $this->Html->link($workingcountry->user->first_name, ['controller' => 'Users', 'action' => 'view', $workingcountry->user->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($workingcountry->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($workingcountry->created) ?></td>
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


