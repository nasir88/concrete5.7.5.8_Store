<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); 

$SectionBottom1 = new GlobalArea('Section Bottom 1');
$SectionBottom1Blocks = $SectionBottom1->getTotalBlocksInArea();
$displaySectionBottom1 = $SectionBottom1Blocks > 0 || $c->isEditMode();
?>

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
		<div class="col-md-3">
			<div class="wrapper-content">
				<?php
					$a = new GlobalArea('Section Left Content');
					$a->display();
				?>
			</div>
		</div>
		<div class="col-md-9">
			<div class="wrapper-content">
				<?php
					$a = new GlobalArea('Section List Product');
					$a->display();
				?>
			</div>
		</div>
	</div>
		
	<?php 
		if ($displaySectionBottom1) { 
	?>
	
		<div class="row marginBot10">	
			<div class="col-md-12">
				<div class="wrapper-content">
					<?php
						$SectionBottom1->display();
					?>
				</div>
			</div>
		</div>
			
	<?php } ?>
	
</div>

<?php  $this->inc('elements/footer.php'); ?>
