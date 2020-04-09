<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); 

$FirstMainContent = new Area('First Main');
$FirstMainContentBlocks = $FirstMainContent->getTotalBlocksInArea($c);
$displayFirstMainContent = $FirstMainContentBlocks > 0 || $c->isEditMode();

$SectionBreadcrumb = new GlobalArea('Section Breadcrumb');
$SectionBreadcrumbBlocks = $SectionBreadcrumb->getTotalBlocksInArea();
$displaySectionBreadcrumb = $SectionBreadcrumbBlocks > 0 || $c->isEditMode();

?>


    <div class="container">
	
		<?php if ($displaySectionBreadcrumb) { ?>
			<div class="row marginBot10">
				<div class="col-md-12">
			
					<?php
						$SectionBreadcrumb->display();
					?>
				
				</div>
			</div>
		<?php } ?>
		
        <div class="row row_content2">
            <div class="col-md-3 pad-right-3">
				
				<div class="category2">
					<?php
						$a = new GlobalArea('Section List Category');
						$a->display();
					?>
				</div>
				
            </div>
            <div class="col-md-9 ListProductCategory">
				<?php
					$a = new GlobalArea('Section List Product');
					$a->display();
				?>
            </div>
        </div>
		
	</div>
	
	<div class="container">
	
		<div class="row row_content2">	
			<?php 
				$SectionBottom1 = new GlobalArea('Section Bottom 1');
				$SectionBottom1Blocks = $SectionBottom1->getTotalBlocksInArea();
				$displaySectionBottom1 = $SectionBottom1Blocks > 0 || $c->isEditMode();

				if ($displaySectionBottom1) { ?>
				
					<?php
						$SectionBottom1->display();
					?>
					
			<?php } ?>
        </div>
		
    </div>

<?php  $this->inc('elements/footer.php'); ?>
