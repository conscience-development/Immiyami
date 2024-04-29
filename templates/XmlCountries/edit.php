<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\XmlCountry $xmlCountry
 * @var string[]|\Cake\Collection\CollectionInterface $xmlSheets
 */
?>
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= __('Edit Xml Country') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($xmlCountry) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
																					echo $this->Form->control('name',['class'=>'form-control']);
													echo $this->Form->control('xml_sheet_id', ['options' => $xmlSheets, 'empty' => true,'class'=>'multi-select wide form-control']);
												?>
											</fieldset>
												
                                            </div>
                                            <div class="mb-3 mt-3 row">
												<div class="col-lg-12 align-right">
													<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
												</div>
											</div>
                                        </div>
									<?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!--**********************************
            Content body end
        ***********************************-->
