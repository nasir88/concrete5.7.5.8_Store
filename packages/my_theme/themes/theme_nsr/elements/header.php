<?php 
defined('C5_EXECUTE') or die(_("Access Denied.")); 

//Loader Tools MyTheme
use Concrete\Package\MyTheme\Src\MyThemesSRC as ThemeSRC;
$ToolsSitePath = ThemeSRC::PackagePathTools();

?>

<html>
<head>

	<?php Loader::element('header_required'); ?>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<?php
		$u = new user();
		$g = Group::getByName('Administrators');
		if ($u->inGroup($g)||$u->isSuperUser()) {
	?> 
	
		<!-- CSS : Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/bootstrap/css/bootstrap.css">
	
		<!-- AdminLTE Skins -->
		<link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/AdminLTE.css">
		<link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/AdminLTE_New.css">
		
	<?php 
		} else {
	?>
		
		<!-- My Theme-->
		<!-- Bootstrap Core CSS -->
		<link href="<?php echo $view->getThemePath(); ?>/asset/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Font Awesome CSS -->
		<link href="<?php echo $view->getThemePath(); ?>/css/font-awesome.min.css" rel="stylesheet">
		
		<!-- Animate CSS -->
		<link href="<?php echo $view->getThemePath(); ?>/css/animate.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="<?php echo $view->getThemePath(); ?>/css/style.css" rel="stylesheet">
		<link href="<?php echo $view->getThemePath(); ?>/css/responsive.css" rel="stylesheet">
    
		<!-- Colors CSS -->
		<link type="text/css" href="<?php echo $view->getThemePath(); ?>/css/color/green.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		
		<!-- Modernizer js -->
		<script src="<?php echo $view->getThemePath(); ?>/js/modernizr.custom.js"></script>
		
	<?php 
		}
	?>
	
</head>
<body>
<div class="<?php echo $c->getPageWrapperClass()?>">
