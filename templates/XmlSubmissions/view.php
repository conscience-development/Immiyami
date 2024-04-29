
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($xmlSubmission->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="xmlSubmissions view content">
											<table class="table table-bordered table-responsive-sm">
																																												<tr>
													<th><?= __('Xml Sheet') ?></th>
													<td><?= $xmlSubmission->has('xml_sheet') ? $this->Html->link($xmlSubmission->xml_sheet->name, ['controller' => 'XmlSheets', 'action' => 'view', $xmlSubmission->xml_sheet->id]) : '' ?></td>
												</tr>
																																												<tr>
													<th><?= __('Xml Country') ?></th>
													<td><?= $xmlSubmission->has('xml_country') ? $this->Html->link($xmlSubmission->xml_country->name, ['controller' => 'XmlCountries', 'action' => 'view', $xmlSubmission->xml_country->id]) : '' ?></td>
												</tr>
																																												<tr>
													<th><?= __('Xml Visatype') ?></th>
													<td><?= $xmlSubmission->has('xml_visatype') ? $this->Html->link($xmlSubmission->xml_visatype->name, ['controller' => 'XmlVisatypes', 'action' => 'view', $xmlSubmission->xml_visatype->id]) : '' ?></td>
												</tr>
																																												<tr>
													<th><?= __('Xml Qualification') ?></th>
													<td><?= $xmlSubmission->has('xml_qualification') ? $this->Html->link($xmlSubmission->xml_qualification->name, ['controller' => 'XmlQualifications', 'action' => 'view', $xmlSubmission->xml_qualification->id]) : '' ?></td>
												</tr>
																																												<tr>
													<th><?= __('User') ?></th>
													<td><?= $xmlSubmission->has('user') ? $this->Html->link($xmlSubmission->user->first_name, ['controller' => 'Users', 'action' => 'view', $xmlSubmission->user->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($xmlSubmission->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($xmlSubmission->created) ?></td>
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


