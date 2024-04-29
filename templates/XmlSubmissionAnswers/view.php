
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($xmlSubmissionAnswer->id) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="xmlSubmissionAnswers view content">
											<table class="table table-bordered table-responsive-sm">
																																												<tr>
													<th><?= __('Xml Criteria') ?></th>
													<td><?= $xmlSubmissionAnswer->has('xml_criteria') ? $this->Html->link($xmlSubmissionAnswer->xml_criteria->name, ['controller' => 'XmlCriterias', 'action' => 'view', $xmlSubmissionAnswer->xml_criteria->id]) : '' ?></td>
												</tr>
																																												<tr>
													<th><?= __('Xml Criteria Answer') ?></th>
													<td><?= $xmlSubmissionAnswer->has('xml_criteria_answer') ? $this->Html->link($xmlSubmissionAnswer->xml_criteria_answer->name, ['controller' => 'XmlCriteriaAnswers', 'action' => 'view', $xmlSubmissionAnswer->xml_criteria_answer->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($xmlSubmissionAnswer->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($xmlSubmissionAnswer->created) ?></td>
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


