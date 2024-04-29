
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($postsCategory->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="postsCategories view content">
											<table class="table table-bordered table-responsive-sm">
																																												<tr>
													<th><?= __('Post') ?></th>
													<td><?= $postsCategory->has('post') ? $this->Html->link($postsCategory->post->title, ['controller' => 'Posts', 'action' => 'view', $postsCategory->post->id]) : '' ?></td>
												</tr>
																																												<tr>
													<th><?= __('Category') ?></th>
													<td><?= $postsCategory->has('category') ? $this->Html->link($postsCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $postsCategory->category->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($postsCategory->id) ?></td>
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


