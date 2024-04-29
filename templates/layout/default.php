

<!DOCTYPE html>
<html lang="en">
<head>

    <?= $this->element('admin/head') ?>

</head>
<body>

	<!--*******************
		Preloader start
	********************-->
	<div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
	</div>
	<!--*******************
		Preloader end
	********************-->

	<!--**********************************
		Main wrapper start
	***********************************-->
	<div id="main-wrapper">

		<!--**********************************
			Nav header start
		***********************************-->
		<?= $this->element('admin/header_nav') ?>
		<!--**********************************
			Nav header end
		***********************************-->


		<!--**********************************
			Header start
		***********************************-->
		<?= $this->element('admin/header') ?>
		<!--**********************************
			Header end ti-comment-alt
		***********************************-->

		<!--**********************************
			Sidebar start
		***********************************-->

		<?= $this->element('admin/sidebar') ?>

		<!--**********************************
			Sidebar end
		***********************************-->

		<!--**********************************
			Content body start
		***********************************-->
		<div class="content-body">
			<!-- row -->
			<div class="container-fluid">
				<?= $this->Flash->render() ?>
				<? if( in_array($controller_action,['supplierq']) ){ ?>
				<?= $this->element('admin/actions_bar_search') ?>
				<? } ?>
				<? if( in_array($controller_action,['index','member','indexSponsor','supplier','sponsor','supplierp']) ){ ?>
				<?= $this->element('admin/actions_bar') ?>
				<? } ?>
				<? if( in_array($controller_action,['report']) ){ ?>
				<?= $this->element('admin/actions_bar_report') ?>
				<? } ?>
				<?= $this->fetch('content') ?>

			</div>
		</div>
		<!--**********************************
			Content body end
		***********************************-->



		<!--**********************************
			Footer start
		***********************************-->

		<?= $this->element('admin/copyright') ?>
		<!--**********************************
			Footer end
		***********************************-->

		<!--**********************************
		   Support ticket button start
		***********************************-->

		<!--**********************************
		   Support ticket button end
		***********************************-->


	</div>
	<!--**********************************
		Main wrapper end
	***********************************-->

	<!--**********************************
		Scripts
	***********************************-->

	<?= $this->element('admin/footer') ?>

</body>
</html>
