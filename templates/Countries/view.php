
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($country->name) ?></h4>
                            </div>
                            <div class="card-body">																												
										<div class="countries view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Name') ?></th>
													<td><?= h($country->name) ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($country->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= date('Y/m/d H:s', strtotime(h($country->created))) ?></td>
												</tr>
																																			</table>
																																																			<div class="related">
												<h4><?= __('Related Users') ?></h4>
												<?php if (!empty($country->users)) : ?>
												<div class="table-responsive">
													<table class="table table-bordered table-responsive-sm">
														<tr>
																							<th><?= __('Id') ?></th>
																							<th><?= __('First Name') ?></th>
																							<th><?= __('Last Name') ?></th>
																							<th><?= __('Email') ?></th>
																							<th><?= __('Password') ?></th>
																							<th><?= __('Bio') ?></th>
																							<th><?= __('Contact') ?></th>
																							<th><?= __('Photo') ?></th>
																							<th><?= __('Photo Dir') ?></th>
																							<th><?= __('Last Login') ?></th>
																							<th><?= __('Password Reset Token') ?></th>
																							<th><?= __('Company Name') ?></th>
																							<th><?= __('Status') ?></th>
																							<th><?= __('Role') ?></th>
																							<th><?= __('Category Id') ?></th>
																							<th><?= __('Country Id') ?></th>
																							<th><?= __('Preferred Country Id') ?></th>
																							<th><?= __('Coupon Id') ?></th>
																							<th><?= __('Created') ?></th>
																							<th class="actions"><?= __('Actions') ?></th>
														</tr>
														<?php foreach ($country->users as $users) : ?>
														<tr>
																							<td><?= h($users->id) ?></td>
																							<td><?= h($users->first_name) ?></td>
																							<td><?= h($users->last_name) ?></td>
																							<td><?= h($users->email) ?></td>
																							<td><?= h($users->password) ?></td>
																							<td><?= h($users->bio) ?></td>
																							<td><?= h($users->contact) ?></td>
																							<td><?= h($users->photo) ?></td>
																							<td><?= h($users->photo_dir) ?></td>
																							<td><?= h($users->last_login) ?></td>
																							<td><?= h($users->password_reset_token) ?></td>
																							<td><?= h($users->company_name) ?></td>
																							<td><?= h($users->status) ?></td>
																							<td><?= h($users->role) ?></td>
																							<td><?= h($users->category_id) ?></td>
																							<td><?= h($users->country_id) ?></td>
																							<td><?= h($users->preferred_country_id) ?></td>
																							<td><?= h($users->coupon_id) ?></td>
																							<td><?= date('Y/m/d H:s', strtotime(h($users->created))) ?></td>
																															<td class="actions">
																<?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
																<?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
																<?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete ', $users->id)]) ?>
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


