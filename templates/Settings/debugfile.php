<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting
 */
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
?>
<!--**********************************
            Content body start
        ***********************************-->
                <!-- row -->
                                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= __('Debug Log') ?></h4>
                            </div>
                            <div class="card-body">
                            <textarea class="displayfile"  rows="20">
                                <?php readfile(ROOT."/logs/debug.log"); ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
        <!--**********************************
            Content body end
        ***********************************-->
