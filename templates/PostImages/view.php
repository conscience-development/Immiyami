
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($postImage->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="postImages view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Photo') ?></th>
													<td><?= h($postImage->photo) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Photo Dir') ?></th>
													<td><?= h($postImage->photo_dir) ?></td>
												</tr>
																																												<tr>
													<th><?= __('Post') ?></th>
													<td><?= $postImage->has('post') ? $this->Html->link($postImage->post->title, ['controller' => 'Posts', 'action' => 'view', $postImage->post->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($postImage->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($postImage->created) ?></td>
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


