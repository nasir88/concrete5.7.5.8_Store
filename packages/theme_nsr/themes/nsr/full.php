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
		
			<div class="row row_title">
				<?php
					$a = new Area('Title');
					$a->display($c);
				?>
			</div>
		</div>
	
		<div class="container">
			<div class="row row_content">
				<?php
					$a = new Area('Main');
					$a->display($c);
				?>
			</div>
		</div>
	
	</main>
</div>

<?php  $this->inc('elements/footer.php'); ?>
