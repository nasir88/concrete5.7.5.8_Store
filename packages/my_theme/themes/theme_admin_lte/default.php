<?php      defined('C5_EXECUTE') or die(_("Access Denied."));
$this->inc('elements/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<?php
			$a = new GlobalArea('Title Header');
			$a->display();
		?>
	  
	  
	  
	  
	  
	</section>

	<!-- Main content -->
	<section class="content">

	  <div class="box box-default" style="margin-top:20px;">
			<div class="box-body">

				<?php
					$a = new Area('Full Content');
					$a->display();
				?>

			</div>
		</div>

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php     $this->inc('elements/footer.php'); ?>
