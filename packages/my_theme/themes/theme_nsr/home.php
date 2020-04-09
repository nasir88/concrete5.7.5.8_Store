<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php'); 

// first, second, third, fourth, fifth, sixth, seventh, eighth, ninth

$FirstMainContent = new Area('First Main');
$FirstMainContentBlocks = $FirstMainContent->getTotalBlocksInArea($c);
$displayFirstMainContent = $FirstMainContentBlocks > 0 || $c->isEditMode();

$SecondMainContent = new Area('Second Main');
$SecondMainContentBlocks = $SecondMainContent->getTotalBlocksInArea($c);
$displaySecondMainContent = $SecondMainContentBlocks > 0 || $c->isEditMode();

$ThirdMainContent = new Area('Third Main');
$ThirdMainContentBlocks = $ThirdMainContent->getTotalBlocksInArea($c);
$displayThirdMainContent = $ThirdMainContentBlocks > 0 || $c->isEditMode();

$SliderContent = new Area('Slider');
$SliderContentBlocks = $SliderContent->getTotalBlocksInArea($c);
$displaySliderContent = $SliderContentBlocks > 0 || $c->isEditMode();

$FeaturesSliderMainContent = new Area('Features Slider Main');
$FeaturesSliderMainContentBlocks = $FeaturesSliderMainContent->getTotalBlocksInArea($c);
$displayFeaturesSliderMainContent = $FeaturesSliderMainContentBlocks > 0 || $c->isEditMode();

?>

<div class="container">
	
		<?php if ($displayFirstMainContent) { ?>
		
			<div class="row marginBot10">
				<div class="col-md-12">
				
					<div class="wrapper-content">
						<?php $FirstMainContent->display($c); ?>
					</div>
					
				</div>
			</div>
			
		<?php } ?>
		
		
		<?php if ($displaySliderContent) { ?>
		
			<div class="row marginBot10">
				<div class="col-md-12">
				
					<?php $SliderContent->display($c); ?>
				
				</div>
			</div>
			
		<?php } ?>
		
		<?php if ($displaySecondMainContent) { ?>
		
			<div class="row marginBot10">
				<div class="col-md-12">
				
					<div class="wrapper-content">
						<?php $SecondMainContent->display($c); ?>
					</div>

				</div>
			</div>
			
		<?php } ?>
		
		<?php if ($displayFeaturesSliderMainContent) { ?>
		
			<div class="row marginBot10">
				<div class="col-md-12">
				
					<?php $FeaturesSliderMainContent->display($c); ?>

				</div>
			</div>
			
		<?php } ?>
		
		<?php if ($displayThirdMainContent) { ?>
		
			<div class="row marginBot10">
				<div class="col-md-12">
				
					<div class="wrapper-content">
						<?php $ThirdMainContent->display($c); ?>
					</div>
					
				</div>
			</div>
			
		<?php } ?>
		
</div>

<?php  $this->inc('elements/footer.php'); ?>
