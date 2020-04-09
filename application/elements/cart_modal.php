<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Product\Product as StoreProduct;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as StorePrice;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionGroup as StoreProductOptionGroup;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionItem as StoreProductOptionItem;

?>

<script type="text/javascript">
$(function() {

    $('#cartlist-modal').slimScroll({
		height: 'auto',
		borderRadius: '0px',
		alwaysVisible: true
    });
	
	$(window).resize(function () {
		$('#cartlist-modal').slimScroll({
			height: 'auto',
			borderRadius: '0px',
			alwaysVisible: true
		});
	});
	
});
</script>

<div class="box-modal clearfix" id="cart-modal">

	<div id="cartlist-modal">
		<!--<a href="javascript:vividStore.exitModal()" class="btn"><i class="fa fa-fw fa-close"></i></a>-->
		<div class="cart-page-cart">
			<?php  if (isset($actiondata) and !empty($actiondata)) {
		?>

				<?php  if ($actiondata['action'] == 'add') {
		?>
					<p class="alert alert-success"><strong><?php echo  $actiondata['product']['pName'];
		?></strong> <?php echo  t('has been added to your cart');
		?></p>
				<?php  
	}
		?>

				<?php  if ($actiondata['action'] =='update') {
		?>
					<p class="alert alert-success"><?php echo  t('Your cart has been updated');
		?></p>
				<?php  
	}
		?>

				<?php  if ($actiondata['action'] == 'clear') {
		?>
					<p class="alert alert-warning"><?php echo  t('Your cart has been cleared');
		?></p>
				<?php  
	}
		?>

				<?php  if ($actiondata['action'] == 'remove') {
		?>
					<p class="alert alert-warning"><?php echo  t('Item removed');
		?></p>
				<?php  
	}
		?>

				<?php  if ($actiondata['quantity'] != $actiondata['added']) {
		?>
					<p class="alert alert-warning"><?php echo  t('Due to stock levels your quantity has been limited');
		?></p>
				<?php  
	}
		?>

			<?php  
	} ?>

			<div class="title"><?php echo t("Your Shopping Cart")?> : </div>

			<input id='cartURL' type='hidden' data-cart-url='<?php echo View::url("/cart/")?>'>

			<ul class="cart-page-cart-list">
				<?php 
				if ($cart) {
					$i=1;
					foreach ($cart as $k=>$cartItem) {
						$pID = $cartItem['product']['pID'];
						$qty = $cartItem['product']['qty'];
						$product = StoreProduct::getByID($pID);
						$ActivePrice = $product->getActivePrice() * $qty;

						if ($cartItem['product']['variation']) {
							$product->setVariation($cartItem['product']['variation']);
						}

						if ($i%2==0) {
							$classes=" striped";
						} else {
							$classes="";
						}
						if (is_object($product)) {
							?>

							<li class="cart-page-cart-list-item clearfix<?php echo $classes?>" data-instance-id="<?php echo $k?>" data-product-id="<?php echo $pID?>">
								
								<div style="width:100%;">
									<div class="cart-list-thumb">
										<a href="<?php echo URL::to('/product-detail'); ?>?pID=<?php echo $pID; ?>">
											<?php echo $product->getProductImageThumb()?>
										</a>
									</div>
									
									<div class="cart-list-product-name">
										<?php echo $product->getProductName()?>
									</div>

									<div class="cart-list-item-price">
										<?php echo StorePrice::format($product->getActivePrice()); ?> x <?php echo $qty; ?>
									</div>
								</div>
								
								<div style="width:100%;">
								
									<?php  if ($cartItem['productAttributes']) { ?>
										<div class="cart-list-item-attributes">
											<?php  
												foreach ($cartItem['productAttributes'] as $groupID => $valID) {
												$groupID = str_replace("pog", "", $groupID);
												$optiongroup = StoreProductOptionGroup::getByID($groupID);
												$optionvalue = StoreProductOptionItem::getByID($valID);

											?>
												<div class="cart-list-item-attribute">
													<span class="cart-list-item-attribute-label"><?php echo  ($optiongroup ? $optiongroup->getName() : '')?> : </span>
													<span class="cart-list-item-attribute-value"><?php echo  ($optionvalue ? $optionvalue->getName(): '')?></span>
												</div>
											<?php  
												}
											?>
										</div>
									<?php  } ?>
									
								</div>
								
								<div style="width:100%; border-top:1px dotted #ccc; margin-top: 10px;">
								
									<div class="cart-list-item-links mobile-pull-right">
									
										<?php  if ($product->allowQuantity()) { ?>
											<span class="cart-item-label"><?php echo t("Quantity")?> : </span>
											<input type="number" <?php echo  ($product->allowBackOrders() || $product->isUnlimited() ? '' : 'max="'.$product->getProductQty() . '"'); ?> min="1" value="<?php echo $qty?>" style="width: 50px;">
										<?php } ?>
										<span class="button">
											<?php  if ($product->allowQuantity()) { ?>
												<a class="btn-cart-list-update" href="javascript:vividStore.updateItem(<?php echo $k?>, true);"><i class="fa fa-edit"></i></a>
											<?php } ?>
											<a class="btn-cart-list-remove"  href="javascript:vividStore.removeItem(<?php echo $k?>, true);"><i class="fa fa-trash"></i></a>
										</span>
									</div>
									
								</div>

							</li>

							<?php 

						}//if is_object
						$i++;
					}//foreach
				}//if cart
				?>
			</ul>


			<?php  if ($cart  && !empty($cart)) { ?>
				<div class="cart-page-cart-total">
					<span class="cart-grand-total-label"><?php echo t("Sub Total")?> :</span>
					<span class="cart-grand-total-value"><?php echo StorePrice::format($total)?></span>
				</div>
			<?php  
			} else {
			?>
				<p class="alert alert-info"><?php echo  t('Your cart is empty');?></p>
			<?php  
			} 
			?>

			<div class="cart-page-cart-link">
				<div class="text-right">
					<a class="btn btn-default btn-continueShopping"><?php echo t("Continue Shopping")?></a>
					<?php  if ($cart  && !empty($cart)) { ?>
					<!--<a class="btn-cart-modal-clear mobile-xs-width mobile-marginTop10" href="javascript:vividStore.clearCart(true)"><?php //echo t('Clear Cart')?></a>-->
					<a class="btn btn-primary btn-continueCheckout"><?php echo t('Checkout')?></a>
					<?php } ?>
				</div>
			</div>

		</div>
	</div>
</div>
