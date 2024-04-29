<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PostsCategory $postsCategory
 * @var string[]|\Cake\Collection\CollectionInterface $posts
 * @var string[]|\Cake\Collection\CollectionInterface $categories
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
                                <h4 class="card-title"><?= __('Edit Posts Category') ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?= $this->Form->create($postsCategory) ?>
                                        <div class="row">
                                            <div class="col-xl-12">
												<fieldset>
												<?php
																					echo $this->Form->control('post_id', ['options' => $posts, 'empty' => true,'class'=>'multi-select wide form-control']);
													echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true,'class'=>'multi-select wide form-control']);
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
