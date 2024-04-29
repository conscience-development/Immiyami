
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($controllerFunc->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="controllerFunc view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Controller') ?></th>
													<td><?= h($controllerFunc->controller) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Func') ?></th>
													<td><?= h($controllerFunc->func) ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($controllerFunc->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($controllerFunc->created) ?></td>
												</tr>
																																			</table>
																																																			<div class="related">
												<h4><?= __('Related Access') ?></h4>
												<?php if (!empty($controllerFunc->access)) : ?>
												<div class="table-responsive">
													<table class="table table-bordered table-responsive-sm">
														<tr>
																							<th><?= __('Id') ?></th>
																							<th><?= __('Status') ?></th>
																							<th><?= __('User Id') ?></th>
																							<th><?= __('Controller Func Id') ?></th>
																							<th><?= __('Created') ?></th>
																							<th class="actions"><?= __('Actions') ?></th>
														</tr>
														<?php foreach ($controllerFunc->access as $access) : ?>
														<tr>
																							<td><?= h($access->id) ?></td>
																							<td><?= h($access->status) ?></td>
																							<td><?= h($access->user_id) ?></td>
																							<td><?= h($access->controller_func_id) ?></td>
																							<td><?= h($access->created) ?></td>
																															<td class="actions">
																<?= $this->Html->link(__('View'), ['controller' => 'Access', 'action' => 'view', $access->id]) ?>
																<?= $this->Html->link(__('Edit'), ['controller' => 'Access', 'action' => 'edit', $access->id]) ?>
																<?= $this->Form->postLink(__('Delete'), ['controller' => 'Access', 'action' => 'delete', $access->id], ['confirm' => __('Are you sure you want to delete # {0}?', $access->id)]) ?>
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


