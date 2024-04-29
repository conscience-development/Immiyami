
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($gallery->title) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="galleries view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Title') ?></th>
													<td><?= h($gallery->title) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Photo') ?></th>
													<td><?= h($gallery->photo) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Photo Dir') ?></th>
													<td><?= h($gallery->photo_dir) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Status') ?></th>
													<td><?= h($gallery->status) ?></td>
												</tr>
																																												<tr>
													<th><?= __('User') ?></th>
													<td><?= $gallery->has('user') ? $this->Html->link($gallery->user->name, ['controller' => 'Users', 'action' => 'view', $gallery->user->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($gallery->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($gallery->created) ?></td>
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


