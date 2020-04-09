<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<!doctype html>
<html class="no-js" lang="<?php echo Localization::activeLanguage()?>">
<head>

	<!--Start - Default Theme-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo $view->getThemePath()?>/css/bootstrap-modified.css">
    <?php echo $html->css($view->getStylesheet('main.less'))?>
    <?php Loader::element('header_required', array('pageTitle' => isset($pageTitle) ? $pageTitle : '', 'pageDescription' => isset($pageDescription) ? $pageDescription : ''));?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement('style')
            msViewportStyle.appendChild(
                document.createTextNode(
                    '@-ms-viewport{width:auto!important}'
                )
            )
            document.querySelector('head').appendChild(msViewportStyle)
        }
    </script>
	<!--End - Default Theme-->

	<!--Start - My Theme-->
    <link href="<?php echo $view->getThemePath(); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $view->getThemePath(); ?>/css/font-awesome.css" rel="stylesheet">
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
			.navbar-fixed-top, .navbar-fixed-bottom {
				position: inherit!important;
				z-index: 0!important;
			}
			
		</style>
	<?php 
		} 
	?>	
	
	<?php
		if (!$c->isEditMode()) {
	?>
		<script src="<?php echo $view->getThemePath(); ?>/js/bootstrap.js"></script>
		<script src="<?php echo $view->getThemePath(); ?>/js/waypoints.min.js"></script>
		<script src="<?php echo $view->getThemePath(); ?>/js/owl.carousel.min.js"></script>
		<script src="<?php echo $view->getThemePath(); ?>/js/front.js"></script>
	<?php 
		} 
	?>
	<!--End - My Theme-->
</head>
<body>
<div class="<?php echo $c->getPageWrapperClass()?>">