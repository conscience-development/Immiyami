
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($postsCountry->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="postsCountries view content">
											<table class="table table-bordered table-responsive-sm">
																																												<tr>
													<th><?= __('Country') ?></th>
													<td><?= $postsCountry->has('country') ? $this->Html->link($postsCountry->country->name, ['controller' => 'Countries', 'action' => 'view', $postsCountry->country->id]) : '' ?></td>
												</tr>
																																												<tr>
													<th><?= __('Post') ?></th>
													<td><?= $postsCountry->has('post') ? $this->Html->link($postsCountry->post->title, ['controller' => 'Posts', 'action' => 'view', $postsCountry->post->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($postsCountry->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($postsCountry->created) ?></td>
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


