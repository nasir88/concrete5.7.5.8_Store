<?php 
defined('C5_EXECUTE') or die("Access Denied.");

$FooterSectionBottom = new GlobalArea('Footer Section Bottom');
$FooterSectionBottomBlocks = $FooterSectionBottom->getTotalBlocksInArea();
$displayFooterSectionBottom = $FooterSectionBottomBlocks > 0 || $c->isEditMode();
?>

<div class="container">
	<div class="row marginBot20">
		
		<div class="col-md-3">
			<?php
				$a = new GlobalArea('Footer Section 1');
				$a->display();
			?>
		</div>
	
		<div class="col-md-3">
			<?php
				$a = new GlobalArea('Footer Section 2');
				$a->display();
			?>
		</div>
	
		<div class="col-md-3">
			<?php
				$a = new GlobalArea('Footer Section 3');
				$a->display();
			?>
		</div>
	
		<div class="col-md-3">
			<?php
				$a = new GlobalArea('Footer Section 4');
				$a->display();
			?>
		</div>
		
	</div>
		
	<?php if ($displayFooterSectionBottom) { ?>
	
		
		<div class="row marginBot20">
			<div class="col-md-12">
				<?php
					$FooterSectionBottom->display();
				?>
			</div>
		</div>
		
	<?php } ?>

</div>

	<div id="nsr_footer">
		<footer id="concrete5-brand">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<span><?php echo t('Built with <a href="http://www.concrete5.org" class="concrete5">concrete5</a> CMS.')?></span>
						<span class="pull-right">
							<?php echo Core::make('helper/navigation')->getLogInOutLink()?>
						</span>
					</div>
				</div>
			</div>
		</footer>
	</div>


<?php $this->inc('elements/footer_bottom.php');?>
