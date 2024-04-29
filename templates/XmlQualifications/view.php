
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($xmlQualification->name) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="xmlQualifications view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Name') ?></th>
													<td><?= h($xmlQualification->name) ?></td>
												</tr>
																																												<tr>
													<th><?= __('Xml Visatype') ?></th>
													<td><?= $xmlQualification->has('xml_visatype') ? $this->Html->link($xmlQualification->xml_visatype->name, ['controller' => 'XmlVisatypes', 'action' => 'view', $xmlQualification->xml_visatype->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($xmlQualification->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($xmlQualification->created) ?></td>
												</tr>
																																			</table>
																																																			<div class="related">
												<h4><?= __('Related Xml Criterias') ?></h4>
												<?php if (!empty($xmlQualification->xml_criterias)) : ?>
												<div class="table-responsive">
													<table class="table table-bordered table-responsive-sm">
														<tr>
																							<th><?= __('Id') ?></th>
																							<th><?= __('Name') ?></th>
																							<th><?= __('Tagname') ?></th>
																							<th><?= __('UseForSuggestions') ?></th>
																							<th><?= __('Maxpoint') ?></th>
																							<th><?= __('Question') ?></th>
																							<th><?= __('Xml Qualification Id') ?></th>
																							<th><?= __('Created') ?></th>
																							<th class="actions"><?= __('Actions') ?></th>
														</tr>
														<?php foreach ($xmlQualification->xml_criterias as $xmlCriterias) : ?>
														<tr>
																							<td><?= h($xmlCriterias->id) ?></td>
																							<td><?= h($xmlCriterias->name) ?></td>
																							<td><?= h($xmlCriterias->tagname) ?></td>
																							<td><?= h($xmlCriterias->useForSuggestions) ?></td>
																							<td><?= h($xmlCriterias->maxpoint) ?></td>
																							<td><?= h($xmlCriterias->question) ?></td>
																							<td><?= h($xmlCriterias->xml_qualification_id) ?></td>
																							<td><?= h($xmlCriterias->created) ?></td>
																															<td class="actions">
																<?= $this->Html->link(__('View'), ['controller' => 'XmlCriterias', 'action' => 'view', $xmlCriterias->id]) ?>
																<?= $this->Html->link(__('Edit'), ['controller' => 'XmlCriterias', 'action' => 'edit', $xmlCriterias->id]) ?>
																<?= $this->Form->postLink(__('Delete'), ['controller' => 'XmlCriterias', 'action' => 'delete', $xmlCriterias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmlCriterias->id)]) ?>
															</td>
														</tr>
														<?php endforeach; ?>
													</table>
												</div>
												<?php endif; ?>
											</div>
																																			<div class="related">
												<h4><?= __('Related Xml Submissions') ?></h4>
												<?php if (!empty($xmlQualification->xml_submissions)) : ?>
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
														<?php foreach ($xmlQualification->xml_submissions as $xmlSubmissions) : ?>
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


