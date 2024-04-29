<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <?= $this->element('head') ?>


</head>
<body>


		<?= $this->element('header') ?>
		<?= $this->element('sidebar') ?>
		<?php if($page == "home"){	?>
		<?= $this->element('top-banner') ?>
		<?php } ?>
			<div class="container-fluid">
		<?php if($page == "home"){	?>

				<div class="row no-side-margin">
					<div class="col-lg-12 col-sm-12 col-xs-12">

						<?= $this->element('top-ad') ?>
					</div>
					<div class="col-lg-12 col-sm-12 col-xs-12">
					<?= $this->Flash->render() ?>
					<?= $this->element('keyfeatures') ?>
					</div>
					<div class="col-lg-2 col-sm-2 col-xs-12 d-none d-sm-block">
						 <?= $this->element('left-ad') ?>
						 <?= $this->element('left-ad2') ?>
					</div>
					<div class="col-lg-8 col-sm-8 col-xs-12">
						<?= $this->fetch('content') ?>
					</div>
					<div class="col-lg-2 col-sm-2 col-xs-12 d-none d-sm-block">
						<?= $this->element('right-ad') ?>
						<?= $this->element('right-ad2') ?>

					</div>
				</div>

        <?php }else{ ?>


				<?= $this->fetch('content') ?>

		<?php } ?>
			</div>

		<?= $this->element('footer') ?>


</body>
</html>
