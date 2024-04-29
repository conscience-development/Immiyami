
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= h($xmlCriteria->name) ?></h4>
                            </div>
                            <div class="card-body">
                                
                                
                                																																
										<div class="xmlCriterias view content">
											<table class="table table-bordered table-responsive-sm">
																																				<tr>
													<th><?= __('Name') ?></th>
													<td><?= h($xmlCriteria->name) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Tagname') ?></th>
													<td><?= h($xmlCriteria->tagname) ?></td>
												</tr>
																																				<tr>
													<th><?= __('UseForSuggestions') ?></th>
													<td><?= h($xmlCriteria->useForSuggestions) ?></td>
												</tr>
																																				<tr>
													<th><?= __('Maxpoint') ?></th>
													<td><?= h($xmlCriteria->maxpoint) ?></td>
												</tr>
																																												<tr>
													<th><?= __('Xml Qualification') ?></th>
													<td><?= $xmlCriteria->has('xml_qualification') ? $this->Html->link($xmlCriteria->xml_qualification->name, ['controller' => 'XmlQualifications', 'action' => 'view', $xmlCriteria->xml_qualification->id]) : '' ?></td>
												</tr>
																																																												<tr>
													<th><?= __('Id') ?></th>
																													<td><?= $this->Number->format($xmlCriteria->id) ?></td>
																				</tr>
																																												<tr>
													<th><?= __('Created') ?></th>
													<td><?= h($xmlCriteria->created) ?></td>
												</tr>
																																			</table>
																											<div class="text">
												<strong><?= __('Question') ?></strong>
												<blockquote>
													<?= $this->Text->autoParagraph(h($xmlCriteria->question)); ?>
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


