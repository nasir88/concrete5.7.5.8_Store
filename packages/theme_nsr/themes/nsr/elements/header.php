<?php 
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header_top.php');

//Loader Logo Site
use Concrete\Package\NsrSiteLogo\Src\SiteLogoSrc as SiteLogoSRC;
$SiteLogoData = SiteLogoSRC::getAllDataByPK();
$SiteLogoPath = SiteLogoSRC::PackagePathImage();
$ImageLogo = $SiteLogoPath.'/'.$SiteLogoData['imageFile'];
$ImageLogoMini = $SiteLogoPath.'/'.$SiteLogoData['imageFileMini'];

?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

	<div class="navbar-top">
		<div class="container">
			<ul>
				<li style="float:right">
					<a href="#" title="Contact"><i class="fa fa-phone"></i>  <span class="display-xs-none">Contact</span> </a>
				</li>
				<li style="float:right">
					<a href="#" title="Register"><i class="fa fa-edit"></i>  <span class="display-xs-none">Register</span> </a>
				</li>
				<li style="float:right">
					<a href="#" title="Login"><i class="fa fa-sign-in"></i>  <span class="display-xs-none">Login</span> </a>
				</li>
				<li style="float:right">
					<a href="#" title="My Account"><i class="fa fa-user"></i>  <span class="display-xs-none">My Account</span> </a>
				</li>
			</ul>
		</div>
	</div>
	
		<div class="container">
		
			<!-- Menu -->
			<div id="menu">
			
					<div class="pull-left menuLogo">
					
						<!-- mini logo for sidebar mini 50x50 pixels -->
						<span class="display-none display-xs-inherit">
							<img src="<?php echo $ImageLogoMini ?>" width="40px" height="40px">
						</span>
						
						<!-- logo for regular state and mobile devices -->
						<span class="display-xs-none">
							<img src="<?php echo $ImageLogo ?>" width="220px" height="40px">
						</span>
					
					</div>
					
					<div class="pull-right">
					
						<div class="display-md-inherit">
							<button type="button" title="Cart" class="navbar-toggle" data-toggle="collapse" data-target="#cart">
								<i class="fa fa-shopping-cart"></i>
							</button>
							<button type="button" title="Category" class="navbar-toggle" data-toggle="collapse" data-target="#category">
								<i class="fa fa-bars"></i>
							</button>
							<button type="button" title="Pages" class="navbar-toggle" data-toggle="collapse" data-target="#pages">
								<i class="fa fa-copy"></i>
							</button>
							<button type="button" title="Search" class="navbar-toggle" data-toggle="collapse" data-target="#search">
								<i class="fa fa-search"></i>
							</button>
						</div>
				
						<div class="display-md-none float-right" style="text-align:right;">
						
							<div class="form-inline">
								<div class="form-group">
									<?php
										$a = new GlobalArea('Search Section');
										$a->display();
									?>
								</div>

								<button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#cart">
									<i class="fa fa-shopping-cart"></i> 3 items in cart
								</button>
							</div>
							
						</div>
						
					</div>
				
			</div>
			<!-- /.Menu -->

			<!-- Search -->
			<div class="navbar-collapse2 collapse" id="search">
			
				<div class="paddTopBot20 display-none display-md-inherit">
					<?php
						$a = new GlobalArea('Search Section');
						$a->display();
					?>
				</div>
				
			</div>
			<!-- /.Search -->

			<!-- Pages -->
			<div class="navbar-collapse2 collapse" id="pages">
				<div class="display-none display-md-inherit">
					<?php
						$a = new GlobalArea('Navigation Mobile Section');
						$a->display();
					?>
				</div>
			</div>
			<!-- /.Pages -->
			
			<!-- Category -->
			<div class="navbar-collapse2 collapse" id="category">
				<div class="display-none display-md-inherit">
					<?php
						$a = new GlobalArea('Navigation Category Section');
						$a->display();
					?>
				</div>
			</div>
			<!-- /.Category -->
			
			<!-- Cart -->
			<div class="navbar-collapse2 collapse" id="cart">
				<div class="paddTopBot20 display-none display-md-inherit">
					cart
				</div>
			</div>
			<!-- /.Cart -->
		</div>
	</div>
	
</nav>

<!-- Pages -->
<div class="display-xs-none">
	<div class="container marginBot20">
		<?php
		$a = new GlobalArea('Navigation Section');
		$a->display();
		?>
	</div>
</div>							
<!-- /.Pages -->
									

