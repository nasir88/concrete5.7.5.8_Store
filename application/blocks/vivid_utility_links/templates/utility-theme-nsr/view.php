<?php defined('C5_EXECUTE') or die("Access Denied.");?>
<ul>
	<li style="float:left">
		<span class="vivid-store-utility-links">
			<a href="javascript:vividStore.displayCart()" class="itemCart" title="<?php echo t("Items In Cart") ?>">
				<i class="fa fa-shopping-cart"></i> &nbsp;
				<?php if($showCartItems){?>
					<span class="items-in-cart">
						<span class="items-counter"><?=$itemCount?></span> 
						<span class="display-xs-none"><?=$itemsLabel?></span>
					</span>
				<?php } ?>
				<span class="display-xs-none">
					<?php if($showCartTotal){?>
					 : <span class="total-cart-amount"><?=$total?></span>
					<?php } ?>
				</span>
			</a>
		</span>
	</li>

	<?php 
	if($showSignIn){
		$u = new User();
		if(!$u->isLoggedIn()){
	?>
		<li style="float:right">
			<a href="<?php echo URL::to('/login'); ?>" title="<?php echo t("Log In") ?>"><i class="fa fa-sign-in"></i><span class="display-md-none"> &nbsp; <?php echo t("Log In") ?></span> </a>
		</li>
		<li style="float:right">
			<a href="<?php echo URL::to('/register'); ?>" title="<?php echo t("Register") ?>"><i class="fa fa-edit"></i><span class="display-md-none"> &nbsp; <?php echo t("Register") ?></span> </a>
		</li>
	<?php	
		}
	} 
	?>
	
	<?php 
	if($showGreeting){
		$u = new User();
		if($u->isLoggedIn()) {
	?>
		<li style="float:right">
			<a style="padding-right:0px!important" href="<?php echo URL::to('/login', 'logout', Loader::helper('validation/token')->generate('logout')); ?>" title="<?php echo t("Log Out") ?>"><i class="fa fa-sign-out"></i><span class="display-md-none"> &nbsp; <?php echo t("Log Out") ?></span> </a>
		</li>
		<!--<li style="float:right">
			<a href="<?php //echo URL::to('/checkout'); ?>" title="<?php //echo t("Checkout") ?>"><i class="fa fa-share"></i><span class="display-md-none"> &nbsp; <?php //echo t("Checkout") ?></span> </a>
		</li>-->
		<li style="float:right">
			<a href="<?php echo URL::to('/order/my_orders'); ?>" title="<?php echo t("My Orders") ?>"><i class="fa fa-cart-arrow-down"></i><span class="display-md-none"> &nbsp; <?php echo t("My Orders") ?></span> </a>
		</li>
		<li style="float:right">
			<a href="<?php echo URL::to('/account'); ?>" title="<?php echo t("My Account") ?>"><i class="fa fa-user"></i><span class="display-md-none"> &nbsp; <?php echo t("My Account") ?></span> </a>
		</li>
	<?php	
		}
	} 
	?>
		<li style="float:right">
			<a data-toggle="collapse" data-target="#bs-example-navbar-collapse-search" href="#" title="<?php echo t("Search") ?>"><i class="fa fa-search"></i><span class="display-md-none"> &nbsp; <?php echo t("Search") ?></span> </a>
		</li>
</ul>
