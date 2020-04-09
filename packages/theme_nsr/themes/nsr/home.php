<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php'); 

$FirstMainContent = new Area('First Main');
$FirstMainContentBlocks = $FirstMainContent->getTotalBlocksInArea($c);
$displayFirstMainContent = $FirstMainContentBlocks > 0 || $c->isEditMode();

$SecondMainContent = new Area('Second Main');
$SecondMainContentBlocks = $SecondMainContent->getTotalBlocksInArea($c);
$displaySecondMainContent = $SecondMainContentBlocks > 0 || $c->isEditMode();

?>

<div class="container">
	
		<?php if ($displayFirstMainContent) { ?>
		
			<div class="row marginBot20">
				<div class="col-md-12">
				
					<?php $FirstMainContent->display($c); ?>
					
				</div>
			</div>
			
		<?php } ?>
		
			<div class="row marginBot20">
				<div class="col-md-12">
					
					<?php
						$a = new Area('Slider');
						$a->display($c);
					?>
				
				</div>
			</div>
		
		<?php if ($displaySecondMainContent) { ?>
		
			<div class="row marginBot20">
				<div class="col-md-12">
				
					<?php $SecondMainContent->display($c); ?>

				</div>
			</div>
			
		<?php } ?>
		
</div>

<?php  $this->inc('elements/footer.php'); ?>
