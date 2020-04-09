<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<div id="nsr_main">
<main>

    <div class="container">
	
		<div class="row row_content2">
		
			<?php
				$a = new GlobalArea('Section Breadcrumb');
				$a->display();
			?>
			
		</div>
		
        <div class="row row_content2">
            <div class="col-md-3 pad-right-3">
				
				<div class="category2">
					<?php
						$a = new GlobalArea('Section List Category');
						$a->display();
					?>
				</div>
				
            </div>
            <div class="col-md-9">
				<?php
					$a = new GlobalArea('Section View Product');
					$a->display();
				?>
            </div>
        </div>
		
	</div>
	
	<div class="container">
	
		<div class="row row_content2">	
			<?php 
				$SectionBottom2 = new GlobalArea('Section Bottom 2');
				$SectionBottom2Blocks = $SectionBottom2->getTotalBlocksInArea();
				$displaySection2Bottom = $SectionBottom2Blocks > 0 || $c->isEditMode();

				if ($displaySectionBottom2) { ?>
				
					<?php
						$SectionBottom2->display();
					?>
					
			<?php } ?>
        </div>
		
    </div>

</main>

</div>

<?php  $this->inc('elements/footer.php'); ?>
