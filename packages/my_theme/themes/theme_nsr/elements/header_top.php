<?php 
defined('C5_EXECUTE') or die(_("Access Denied.")); 

//Loader Tools MyTheme
use Concrete\Package\MyTheme\Src\MyThemesSRC as ThemeSRC;
$ToolsSitePath = ThemeSRC::PackagePathTools();

?>
<!doctype html>
<html class="no-js" lang="<?php echo Localization::activeLanguage()?>">
<head>

	<?php Loader::element('header_required'); ?>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	
    <!-- JS : Bootstrap 3.3.6 -->
	<?php //if (!$c->isEditMode()) {  ?>
	<script src="<?php echo $ToolsSitePath;?>/bootstrap/js/bootstrap_v3.3.6.js"></script>
	<?php //} ?>
    <!-- Validator -->
    <script src="<?php echo $ToolsSitePath;?>/plugins/validator/jquery.validate.js"></script>
    <script src="<?php echo $ToolsSitePath;?>/plugins/validator/jquery-validate.bootstrap-tooltip.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $ToolsSitePath;?>/plugins/fastclick/fastclick.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo $ToolsSitePath;?>/plugins/select2/select2.js"></script>
    <!-- InputMask -->
    <script src="<?php echo $ToolsSitePath;?>/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo $ToolsSitePath;?>/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo $ToolsSitePath;?>/plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<script src="<?php echo $ToolsSitePath;?>/plugins/input-mask/jquery.maskMoney.js" type="text/javascript"></script>
    <!-- TimePicker -->
    <script src="<?php echo $ToolsSitePath;?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- slimScroll -->
    <script src="<?php echo $ToolsSitePath;?>/plugins/slimScroll/jquery.slimscroll.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $ToolsSitePath;?>/dist/js/app.js"></script>

	
    <!-- CSS : Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/bootstrap/css/bootstrap.css">
    <!-- TimePicker -->
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/plugins/select2/select2.css">
	<!-- AdminLTE Skins -->
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/AdminLTE_New.css">

	
	<!--Start - JS : My Theme-->
	<script src="<?php echo $view->getThemePath(); ?>/js/owl.carousel.min.js"></script>
	<script src="<?php echo $view->getThemePath(); ?>/js/front.js"></script>
	
	<!--Start - CSS : My Theme-->
    <link href="<?php echo $view->getThemePath(); ?>/css/font-awesome_4.6.1.css" rel="stylesheet">
    <link href="<?php echo $view->getThemePath(); ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $view->getThemePath(); ?>/css/shop-homepage.css" rel="stylesheet">
    <link href="<?php echo $view->getThemePath(); ?>/css/shop-homepage-mobile.css" rel="stylesheet">
	
	<?php
		$u = new user();
		$g = Group::getByName('Administrators');
 
		if ($u->inGroup($g)||$u->isSuperUser()) {
	?> 
		<style>
			body {
				padding-top: 0px;
			}
			.navbar-top {
				position: inherit!important;
				z-index: 0!important;
			}
		</style>
	<?php 
		} 
	?>
	
</head>
<body>
<div class="<?php echo $c->getPageWrapperClass()?>">