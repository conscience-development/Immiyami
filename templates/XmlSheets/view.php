
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($xmlSheet->name) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="xmlSheets view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Name') ?></th>
													<td><?= h($xmlSheet->name) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Version') ?></th>
													<td><?= h($xmlSheet->version) ?></td>
												</tr>
																																				<tr>
													<th><?= __('File') ?></th>
													<td><?= h($xmlSheet->file) ?></td>
												</tr>
																																				<tr>
													<th><?= __('File Dir') ?></th>
													<td><?= h($xmlSheet->file_dir) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Status') ?></th>
													<td><?= h($xmlSheet->status) ?></td>
												</tr>
																																												<tr>
													<th><?= __('User') ?></th>
													<td><?= $xmlSheet->has('user') ? $this->Html->link($xmlSheet->user->first_name, ['controller' => 'Users', 'action' => 'view', $xmlSheet->user->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($xmlSheet->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($xmlSheet->created) ?></td>
												</tr>
																																			</table>
																																																			<div class="related">
												<h4><?= __('Related Xml Countries') ?></h4>
												<?php if (!empty($xmlSheet->xml_countries)) : ?>
												<div class="table-responsive">
													<table class="table table-bordered table-responsive-sm">
														<tr>
																							<th><?= __('Id') ?></th>
																							<th><?= __('Name') ?></th>
																							<th><?= __('Xml Sheet Id') ?></th>
																							<th><?= __('Created') ?></th>
																							<th class="actions"><?= __('Actions') ?></th>
														</tr>
														<?php foreach ($xmlSheet->xml_countries as $xmlCountries) : ?>
														<tr>
																							<td><?= h($xmlCountries->id) ?></td>
																							<td><?= h($xmlCountries->name) ?></td>
																							<td><?= h($xmlCountries->xml_sheet_id) ?></td>
																							<td><?= h($xmlCountries->created) ?></td>
																															<td class="actions">
																<?= $this->Html->link(__('View'), ['controller' => 'XmlCountries', 'action' => 'view', $xmlCountries->id]) ?>
																<?= $this->Html->link(__('Edit'), ['controller' => 'XmlCountries', 'action' => 'edit', $xmlCountries->id]) ?>
																<?= $this->Form->postLink(__('Delete'), ['controller' => 'XmlCountries', 'action' => 'delete', $xmlCountries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmlCountries->id)]) ?>
															</td>
														</tr>
														<?php endforeach; ?>
													</table>
												</div>
												<?php endif; ?>
											</div>
																																			<div class="related">
												<h4><?= __('Related Xml Submissions') ?></h4>
												<?php if (!empty($xmlSheet->xml_submissions)) : ?>
												<div class="table-responsive">
													<table class="table table-bordered table-responsive-sm">
														<tr>
																							<th><?= __('Id') ?></th>
																							<th><?= __('Xml Sheet Id') ?></th>
																							<th><?= __('Xml Country Id') ?></th>
																							<th><?= __('Xml Vsatype Id') ?></th>
																							<th><?= __('Xml Qualification Id') ?></th>
																							<th><?= __('User Id') ?></th>
																							<th><?= __('Created') ?></th>
																							<th class="actions"><?= __('Actions') ?></th>
														</tr>
														<?php foreach ($xmlSheet->xml_submissions as $xmlSubmissions) : ?>
														<tr>
																							<td><?= h($xmlSubmissions->id) ?></td>
																							<td><?= h($xmlSubmissions->xml_sheet_id) ?></td>
																							<td><?= h($xmlSubmissions->xml_country_id) ?></td>
																							<td><?= h($xmlSubmissions->xml_vsatype_id) ?></td>
																							<td><?= h($xmlSubmissions->xml_qualification_id) ?></td>
																							<td><?= h($xmlSubmissions->user_id) ?></td>
																							<td><?= h($xmlSubmissions->created) ?></td>
																															<td class="actions">
																<?= $this->Html->link(__('View'), ['controller' => 'XmlSubmissions', 'action' => 'view', $xmlSubmissions->id]) ?>
																<?= $this->Html->link(__('Edit'), ['controller' => 'XmlSubmissions', 'action' => 'edit', $xmlSubmissions->id]) ?>
																<?= $this->Form->postLink(__('Delete'), ['controller' => 'XmlSubmissions', 'action' => 'delete', $xmlSubmissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmlSubmissions->id)]) ?>
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


