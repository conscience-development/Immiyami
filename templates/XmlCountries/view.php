
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($xmlCountry->name) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="xmlCountries view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Name') ?></th>
													<td><?= h($xmlCountry->name) ?></td>
												</tr>
																																												<tr>
													<th><?= __('Xml Sheet') ?></th>
													<td><?= $xmlCountry->has('xml_sheet') ? $this->Html->link($xmlCountry->xml_sheet->name, ['controller' => 'XmlSheets', 'action' => 'view', $xmlCountry->xml_sheet->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($xmlCountry->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($xmlCountry->created) ?></td>
												</tr>
																																			</table>
																																																			<div class="related">
												<h4><?= __('Related Xml Submissions') ?></h4>
												<?php if (!empty($xmlCountry->xml_submissions)) : ?>
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
														<?php foreach ($xmlCountry->xml_submissions as $xmlSubmissions) : ?>
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
																																			<div class="related">
												<h4><?= __('Related Xml Visatypes') ?></h4>
												<?php if (!empty($xmlCountry->xml_visatypes)) : ?>
												<div class="table-responsive">
													<table class="table table-bordered table-responsive-sm">
														<tr>
																							<th><?= __('Id') ?></th>
																							<th><?= __('Name') ?></th>
																							<th><?= __('Xml Country Id') ?></th>
																							<th><?= __('Created') ?></th>
																							<th class="actions"><?= __('Actions') ?></th>
														</tr>
														<?php foreach ($xmlCountry->xml_visatypes as $xmlVisatypes) : ?>
														<tr>
																							<td><?= h($xmlVisatypes->id) ?></td>
																							<td><?= h($xmlVisatypes->name) ?></td>
																							<td><?= h($xmlVisatypes->xml_country_id) ?></td>
																							<td><?= h($xmlVisatypes->created) ?></td>
																															<td class="actions">
																<?= $this->Html->link(__('View'), ['controller' => 'XmlVisatypes', 'action' => 'view', $xmlVisatypes->id]) ?>
																<?= $this->Html->link(__('Edit'), ['controller' => 'XmlVisatypes', 'action' => 'edit', $xmlVisatypes->id]) ?>
																<?= $this->Form->postLink(__('Delete'), ['controller' => 'XmlVisatypes', 'action' => 'delete', $xmlVisatypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmlVisatypes->id)]) ?>
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


