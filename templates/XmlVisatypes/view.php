
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($xmlVisatype->name) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="xmlVisatypes view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Name') ?></th>
													<td><?= h($xmlVisatype->name) ?></td>
												</tr>
																																												<tr>
													<th><?= __('Xml Country') ?></th>
													<td><?= $xmlVisatype->has('xml_country') ? $this->Html->link($xmlVisatype->xml_country->name, ['controller' => 'XmlCountries', 'action' => 'view', $xmlVisatype->xml_country->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($xmlVisatype->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($xmlVisatype->created) ?></td>
												</tr>
																																			</table>
																																																			<div class="related">
												<h4><?= __('Related Xml Qualifications') ?></h4>
												<?php if (!empty($xmlVisatype->xml_qualifications)) : ?>
												<div class="table-responsive">
													<table class="table table-bordered table-responsive-sm">
														<tr>
																							<th><?= __('Id') ?></th>
																							<th><?= __('Name') ?></th>
																							<th><?= __('Xml Visatype Id') ?></th>
																							<th><?= __('Xml Qualif Point Id') ?></th>
																							<th><?= __('Created') ?></th>
																							<th class="actions"><?= __('Actions') ?></th>
														</tr>
														<?php foreach ($xmlVisatype->xml_qualifications as $xmlQualifications) : ?>
														<tr>
																							<td><?= h($xmlQualifications->id) ?></td>
																							<td><?= h($xmlQualifications->name) ?></td>
																							<td><?= h($xmlQualifications->xml_visatype_id) ?></td>
																							<td><?= h($xmlQualifications->xml_qualif_point_id) ?></td>
																							<td><?= h($xmlQualifications->created) ?></td>
																															<td class="actions">
																<?= $this->Html->link(__('View'), ['controller' => 'XmlQualifications', 'action' => 'view', $xmlQualifications->id]) ?>
																<?= $this->Html->link(__('Edit'), ['controller' => 'XmlQualifications', 'action' => 'edit', $xmlQualifications->id]) ?>
																<?= $this->Form->postLink(__('Delete'), ['controller' => 'XmlQualifications', 'action' => 'delete', $xmlQualifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $xmlQualifications->id)]) ?>
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


