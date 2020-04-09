<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<div class="container">

	<div class="row marginBot10">
		<div class="col-md-12">
		
			<?php
				$a = new GlobalArea('Section Breadcrumb');
				$a->display();
			?>
			
		</div>
	</div>
		
	<div class="row marginBot10">
		<div class="col-md-12">
		
			<div class="wrapper-content">
				<?php
					$a = new Area('Main');
					$a->display($c);
				?>
			</div>
			
		</div>
	</div>

</div>

<?php  $this->inc('elements/footer.php'); ?>
