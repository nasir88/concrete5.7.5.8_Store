<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php
	//$c = Page::getCurrentPage();
	//if (!$c->isEditMode()) { 
	
	$u = new user();
	$g = Group::getByName('Administrators');
	if ($u->inGroup($g)||$u->isSuperUser()) {
?>

		<?php
			$c = Page::getCurrentPage();
			if (!$c->isEditMode()) { 
		?>
	
			<div style="position: absolute; left: 50%; top: 90px; z-index:2;width: 50%; ">
				<div style="position: relative; left: -50%;">
					<div class="ccm-edit-mode-disabled-item">
						<div style="padding: 10px 0px 10px 0px; font-weight: bold"><?php echo t('Menu disabled in edit mode.')?></div>
					</div>
				</div>
			</div>
	
		<?php }  ?>
			
<?php }else{ ?>

	<?php
	//$a = new GlobalArea('Navigation Section');
	//$a->display();
	?>
	
	<!-- Navbar -->
	<div id="topheader">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll" href="#home">Fame</a>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#home"></a>
						</li>
						<?php 
							$db = Database::get();
							$r = $db->Execute("SELECT * FROM nsr_landingpages");

							foreach ($r as $k=>$nsr_landingpages) {
						?>
						<li>
							<a class="page-scroll" href="#<?php  echo str_replace(' ', '', $nsr_landingpages['cName']); ?>"><?php  echo $nsr_landingpages['cName']; ?></a>
						</li>
						<?php 
							}
						?>
						<li class="hidden">
							<a href="#home"></a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	</div>
<?php } ?>
