<?php 
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
?>

<!-- Utilities -->
<nav class="navbar navbar-inverse navbar-top" role="navigation">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="navbar-header display-md-width">
					<button type="button" class="navbar-toggle navbar-toggle-menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-menu">
						<span class="fa fa-bars"></span>
					</button>
					<?php
						$a = new GlobalArea('Utility Section');
						$a->display();
					?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="collapse" id="bs-example-navbar-collapse-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php
						$a = new GlobalArea('Navigation Mobile Section');
						$a->display();
					?>	
				</div>
			</div>
		</div>
	</div>
	<div class="collapse" id="bs-example-navbar-collapse-search">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-xs-12 pull-right">
					<?php
						$a = new GlobalArea('Search Section');
						$a->display();
					?>
				</div>
			</div>
		</div>
	</div>
	
</nav>
<!-- /.Utilities -->

<!-- Logo -->
<div class="container marginBot10">
	<div class="row">
		<div class="col-xs-12">
			<?php
				$a = new GlobalArea('Logo Section');
				$a->display();
			?>
		</div>
	</div>
</div>
<!-- /.Logo -->

<!-- Menu -->
<div class="display-md-none">
	<div class="container marginBot10">
		<div class="row">
			<div class="col-xs-12 col-sm-12">  
			
				<?php
					$c = Page::getCurrentPage();
					if (!$c->isEditMode()) { 
				?>
				
					<div id="containerNavSection"> 
					<?php
						$a = new GlobalArea('Navigation Section');
						$a->display();
					?>
					</div>
					<span id="pan" class="pannerNavSection" data-scroll-modifier='-1'><i class="fa fa-fw fa-arrow-circle-left"></i></span>
					<span id="pan" class="pannerNavSection" data-scroll-modifier='1'><i class="fa fa-fw fa-arrow-circle-right"></i></span>
				
				<?php }else{ ?>
					<div class="ccm-edit-mode-disabled-item">
						<div style="padding: 40px 0px 40px 0px"><?php echo t('Menu disabled in edit mode.')?></div>
					</div>
				
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- /.Menu -->