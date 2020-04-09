<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<script type="text/javascript">
$(function() {
	$('i.icon-question-sign').parent().tooltip();
});
</script>

<div class="row">
    <div class="col-md-12">
		<div class="wrapper-content">		
				
			<br>
			<div class="col-md-12">
				<?php echo t('You are currently logged in as') ?> <span class="text-default"><?php echo $profile->getUserDisplayName(); ?></span>.
			</div>
			
			<br>
			<br>
			
			<div class="col-md-6">
		
				<div class="title-header">
					<?php echo t('Orders')?>
				</div>
				<br>
				
				<a class="btn btn-app btn-app-account" href="<?php echo URL::to('/order/my_orders')?>">
					<i class="fa fa-inbox text-maroon"></i> <p><?php echo t('My Orders')?></p>
				</a>
				
				<a class="btn btn-app btn-app-account" href="<?php echo URL::to('/order/my_coupons')?>">
					<i class="fa fa-ticket text-purple"></i> <p><?php echo t('Coupons')?></p>
				</a>
				
				<a class="btn btn-app btn-app-account" href="<?php echo URL::to('/order/my_refunds')?>">
					<i class="fa fa-exchange text-red"></i> <p><?php echo t('Refunds')?></p>
				</a>
				
			</div>
			<div class="col-md-6">
			
				<div class="title-header">
					<?php echo t('Account')?>
				</div>
				<br>

				<?php foreach($pages as $p) {
				
				$page = Page::getByID($p->getCollectionID());
					$cp = new Permissions($page);
					if ($cp->canRead()) { 
					
						if($p->getCollectionName() === 'Edit Profile'){
							$icon_color = "text-yellow";
							$icon_box = "fa-user";
						}elseif($p->getCollectionName() === 'Profile Picture') {
							$icon_color = "text-green";
							$icon_box = "fa-image";
						}elseif($p->getCollectionName() === 'Messages') {
							$icon_color = "text-aqua";
							$icon_box = "fa-commenting";
						}elseif($p->getCollectionName() === 'Address') {
							$icon_color = "text-fuchsia";
							$icon_box = "fa-book";
						}
				 ?>
				
					<a class="btn btn-app btn-app-account" href="<?php echo $p->getCollectionLink()?>">
						<i class="fa <?php echo $icon_box; ?> <?php echo $icon_color; ?>"></i> <p><?php echo h(t($p->getCollectionName()))?></p>
					</a>
					
				<?php 
					}
				} ?>
				
				<?php
				$profileURL = $profile->getUserPublicProfileURL();
				if ($profileURL) { ?>
					<hr/>
					<div>
						<a href="<?php echo $profileURL?>"><?php echo t("View Public Profile")?></a>
						<p><?php echo t('View your public user profile and the information you are sharing.')?></p>
					</div>
				<?php } ?>
			</div>
		</div>
    </div>
</div>
