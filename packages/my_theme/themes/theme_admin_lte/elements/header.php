<?php      
defined('C5_EXECUTE') or die(_("Access Denied.")); 

//Check User Login
$u=new User();
if($u->isLoggedIn()) {
}else{
	header("Location: ".DIR_REL."/index.php/login");
	exit();
}

//Loader UserInfo
$profile = UserInfo::getByID($u->getUserID());	

//Loader Tools MyTheme
use Concrete\Package\MyTheme\Src\MyThemesSRC as ThemeSRC;
$ToolsSitePath = ThemeSRC::PackagePathTools();

//Loader Logo Site
use Concrete\Package\NsrSiteLogo\Src\SiteLogoSrc as SiteLogoSRC;
$SiteLogoData = SiteLogoSRC::getAllDataByPK();
$SiteLogoPath = SiteLogoSRC::PackagePathImage();
$ImageLogo = $SiteLogoPath.'/'.$SiteLogoData['imageFile'];
$ImageLogoMini = $SiteLogoPath.'/'.$SiteLogoData['imageFileMini'];

//Loader URL Account
session_start(); 
use \Application\Controller\MyControllers\MyTheme as URLTheme;
$URLTheme = new URLTheme();
$_SESSION['myURLTheme'] = $URLTheme->myURLTheme();

?>
<!DOCTYPE html>
<html class="no-js" lang="<?php     echo Localization::activeLanguage()?>">
  <head>
  
	<?php Loader::element('header_required'); ?>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/bootstrap/css/bootstrap.css">
    
	<!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <!--  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- daterange picker -->
    <!-- <link rel="stylesheet" href="<?php// echo $this->getThemePath();?>/plugins/daterangepicker/daterangepicker-bs3.css"> -->
    <!-- iCheck for checkboxes and radio inputs -->
    <!-- <link rel="stylesheet" href="<?php //echo $this->getThemePath();?>/plugins/iCheck/all.css"> -->
    <!-- Bootstrap Color Picker -->
    <!-- <link rel="stylesheet" href="<?php //echo $this->getThemePath();?>/plugins/colorpicker/bootstrap-colorpicker.min.css"> -->
    <!-- Bootstrap Time Picker -->
    <!-- <link rel="stylesheet" href="<?php //echo $this->getThemePath();?>/plugins/timepicker/bootstrap-timepicker.min.css"> -->
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/plugins/select2/select2.css">
    <!-- TagsInput -->
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/plugins/tagsinput/bootstrap-tagsinput.css">
    
	<!-- AdminLTE Skins -->
    <!-- <link rel="stylesheet" href="<?php //echo $this->getThemePath();?>/dist/css/skins/skin-blue.min.css"> -->
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/skins/_all-skins.min.css">
	
	<!-- Theme Style -->
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/AdminLTE_New.css">

	
	<?php if (!$c->isEditMode()) { ?>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo $ToolsSitePath;?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- Validator -->
    <script src="<?php echo $ToolsSitePath;?>/plugins/validator/jquery.validate.js"></script>
    <script src="<?php echo $ToolsSitePath;?>/plugins/validator/jquery-validate.bootstrap-tooltip.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $ToolsSitePath;?>/plugins/fastclick/fastclick.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo $ToolsSitePath;?>/plugins/select2/select2.js"></script>
    <!-- TagsInput -->
    <script src="<?php echo $ToolsSitePath;?>/plugins/tagsinput/bootstrap-tagsinput.js"></script>
    <script src="<?php echo $ToolsSitePath;?>/plugins/tagsinput/bootstrap-tagsinput-angular.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $ToolsSitePath;?>/dist/js/app.js"></script>
	<?php } ?>
	
	
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
	Optionally, you can add Slimscroll and FastClick plugins.
	Both of these plugins are recommended to enhance the
	user experience. Slimscroll is required when using the
	fixed layout.
  -->
  <body class="hold-transition skin-yellow sidebar-mini">
  
	<?php if($u->isSuperUser()) { ?>
	<div class="<?php echo $c->getPageWrapperClass()?>">
	<?php } else { ?>
	<div>
	<?php } ?>
	
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <div class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
			<img src="<?php echo $ImageLogoMini ?>">
		  </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
			<img src="<?php echo $ImageLogo ?>">
		  </span>
        </div>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
		  
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="<?php echo DIR_REL; ?>/"><i class="fa fa-arrow-circle-left"></i> <span class="lblBackToWeb"> &nbsp;&nbsp; <?php echo t("Back To Website")?> </span> </a>
              </li>
			  <li>
				<a href="<?php 
					use Concrete\Core\Validation\CSRF\Token; 
					echo URL::to('/login', 'logout', id(new Token())->generate('logout'));?>">
					<i class="fa fa-sign-out"></i> 
						<span class="lblSignOut"> &nbsp;&nbsp; <?php echo t("Sign Out")?> </span>
				</a>
			  </li>
            </ul>
          </div>
        </nav>
		
      </header>
	  
      <!-- Left side column. contains the logo and sidebar -->
	<?php if($u->isSuperUser()) { ?>
      <aside class="main-sidebar main-sidebar-SuperUser">
	<?php } else { ?>
      <aside class="main-sidebar">
	<?php } ?>

        <!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
		
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src=" <?php echo $profile->getUserAvatar()->getPath()?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info text-uppercase">
				<p>
					<?php echo $profile->getUserDisplayName() ?>
				</p>
				<i class="fa fa-edit"></i> <a href="<?php echo $view->url('/'.$_SESSION['myURLTheme'].'/users/search/view/'.$u->getUserID())?>"> <?php echo t('Edit Profile'); ?> </a>
            </div>
          </div>
		  
		  <!-- Sidebar Search -->
		  <?php
			$a = new GlobalArea('AdminLTE Search');
			$a->display();
		  ?>

          <!-- Sidebar Menu -->
		  <?php
			$a = new GlobalArea('AdminLTE Navigation');
			$a->display();
		  ?>
		  
        </section>
        <!-- /.sidebar -->
      </aside>