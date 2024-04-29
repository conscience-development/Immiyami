
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($post->title) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="posts view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Title') ?></th>
													<td><?= h($post->title) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Photo') ?></th>
													<td><?= h($post->photo) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Photo Dir') ?></th>
													<td><?= h($post->photo_dir) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Url') ?></th>
													<td><?= h($post->url) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Status') ?></th>
													<td><?= h($post->status) ?></td>
												</tr>
																																												<tr>
													<th><?= __('User') ?></th>
													<td><?= $post->has('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($post->id) ?></td>
																				</tr>
																				<tr>
													<th><?= __('Clicks') ?></th>
																													<td><?= $post->clicks === null ? '' : $this->Number->format($post->clicks) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Description') ?></th>
													<td><?= h($post->description) ?></td>
												</tr>
																				<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($post->created) ?></td>
												</tr>
																																			</table>
																											<div class="text">
												<strong><?= __('Short Description') ?></strong>
												<blockquote>
													<?= $this->Text->autoParagraph(h($post->short_description)); ?>
												</blockquote>
											</div>
																																																											<div class="related">
												<h4><?= __('Related Post Images') ?></h4>
												<?php if (!empty($post->post_images)) : ?>
												<div class="table-responsive">
													<table class="table table-bordered table-responsive-sm">
														<tr>
																							<th><?= __('Id') ?></th>
																							<th><?= __('Photo') ?></th>
																							<th><?= __('Photo Dir') ?></th>
																							<th><?= __('Post Id') ?></th>
																							<th><?= __('Created') ?></th>
																							<th class="actions"><?= __('Actions') ?></th>
														</tr>
														<?php foreach ($post->post_images as $postImages) : ?>
														<tr>
																							<td><?= h($postImages->id) ?></td>
																							<td><?= h($postImages->photo) ?></td>
																							<td><?= h($postImages->photo_dir) ?></td>
																							<td><?= h($postImages->post_id) ?></td>
																							<td><?= h($postImages->created) ?></td>
																															<td class="actions">
																<?= $this->Html->link(__('View'), ['controller' => 'PostImages', 'action' => 'view', $postImages->id]) ?>
																<?= $this->Html->link(__('Edit'), ['controller' => 'PostImages', 'action' => 'edit', $postImages->id]) ?>
																<?= $this->Form->postLink(__('Delete'), ['controller' => 'PostImages', 'action' => 'delete', $postImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postImages->id)]) ?>
															</td>
														</tr>
														<?php endforeach; ?>
													</table>
												</div>
												<?php endif; ?>
											</div>
																		</div>

                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
        <!--**********************************
            Content body end
        ***********************************-->


