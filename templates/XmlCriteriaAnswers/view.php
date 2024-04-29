
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($xmlCriteriaAnswer->name) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="xmlCriteriaAnswers view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Name') ?></th>
													<td><?= h($xmlCriteriaAnswer->name) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Tagname') ?></th>
													<td><?= h($xmlCriteriaAnswer->tagname) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Point') ?></th>
													<td><?= h($xmlCriteriaAnswer->point) ?></td>
												</tr>
																																												<tr>
													<th><?= __('Xml Criteria') ?></th>
													<td><?= $xmlCriteriaAnswer->has('xml_criteria') ? $this->Html->link($xmlCriteriaAnswer->xml_criteria->name, ['controller' => 'XmlCriterias', 'action' => 'view', $xmlCriteriaAnswer->xml_criteria->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($xmlCriteriaAnswer->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($xmlCriteriaAnswer->created) ?></td>
												</tr>
																																			</table>
																											<div class="text">
												<strong><?= __('Answer') ?></strong>
												<blockquote>
													<?= $this->Text->autoParagraph(h($xmlCriteriaAnswer->answer)); ?>
												</blockquote>
											</div>
																																										</div>

                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
        <!--**********************************
            Content body end
        ***********************************-->


