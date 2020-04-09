<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as Price;
use \Concrete\Package\VividStore\Src\VividStore\Address\AddressModal as AddressModal;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Checkout as ShippingMethods;
use \Concrete\Package\VividStore\Src\VividStore\Cart\CartTotal as CartTotal;
use \Concrete\Package\VividStore\Src\VividStore\Discount\DiscountModal as DiscountModal;

$SectionBreadcrumb = new GlobalArea('Section Breadcrumb');
$SectionBreadcrumbBlocks = $SectionBreadcrumb->getTotalBlocksInArea();
$displaySectionBreadcrumb = $SectionBreadcrumbBlocks > 0 || $c->isEditMode();

if ($controller->getTask() == "view" || $controller->getTask() == "failed") {
    ?>

<?php if ($displaySectionBreadcrumb) { ?>
	<div class="row marginBot10">
		<div class="col-md-12">
	
			<?php
				$SectionBreadcrumb->display();
			?>
		
		</div>
	</div>
<?php } ?>

<div class="row marginBot10">
    <div class="col-lg-12">
		<div class="wrapper-content">

        <?php  if ($controller->showLoginScreen) { ?>
		
			<div class="checkout-form-group active-form-group" id="checkout-form-group-signin">

				<div class="title-header">
					<?php echo $controller->hasGuestCheckout() ? t('Sign in, Register or Checkout as Guest') : t('Sign in or Register')?> : 
				</div>
				<br>
				<p>
					<?php echo t("In order to proceed, you'll need to either register, or sign in with your existing account.")?>
				</p>
				<br>
				<a class="btn btn-info" href="<?php echo View::url('/login')?>"><?php echo t("Sign In")?></a>
				
				<?php  if (Config::get('concrete.user.registration.enabled')) { ?>
					<a class="btn btn-success" href="<?php echo View::url('/register')?>"><?php echo t("Register")?></a>
				<?php } ?>
				   
				<?php  if ($controller->hasGuestCheckout()) { ?>
					<p><?php echo t("Or optionally, you may choose to checkout as a guest.")?></p>
					<a class="btn btn-default" href="<?php echo View::url('/checkout/?guest=1')?>"><?php echo t("Checkout as Guest")?></a>
				<?php } ?>

			</div>
		
        <?php } else { ?>
		
			<div class="title-header">
				<?php echo t("Recipient Information")?> : 
			</div>
		
			<div id="checkout-address">
				<?php  AddressModal::getAddressListElement(); ?>
			</div>
			
			<br>
			<br>
			
			<div class="title-header">
				<?php echo t("Order Information")?> : 
			</div>
			<span>&nbsp;</span>
		
			<?php  $controller->getCartListElement(); ?>
			
			<br>
			
			<?php  if ($shippingEnabled) { ?>	
				<br>
				<form class="checkout-form-group active-form-group" id="checkout-form-group-shipping-method" msg="<?php echo t('Calculating shipping total') ?>...">

					<div class="title-header">
						<?php echo t("Delivery Information")?> : 
					</div>

					<div class="checkout-form-group-body">
						<div id="checkout-shipping-method-options">
							<?php  ShippingMethods::getShippingMethods(); ?>
						</div>
					</div>

				</form>
			<?php } ?>
			
			<br>			
			
			<div class="title-header">
				<?php echo t("Delivery Time")?> : 
			</div>
			<span>&nbsp;</span>
		
			<div id="checkout-time">
				<!--We deliver packages on business days. There may be no delivery service on weekends or public holidays.-->
				<?php
					$a = new GlobalArea('Section Delivery Time');
					$a->display();
				?>
				<br>
			</div>
					
		</div>
    </div>
</div>
	
<div class="row marginBot10">
    <div class="col-lg-12">
		<div class="wrapper-content">

			<div class="row marginBot10">

				<?php if ($discountsWithCodesExist) { ?>
				
					<div class="col-lg-8 col-md-7 col-sm-6 col-xs-12">

						<div class="title-header">
							<?php echo t("Use Discount Coupons")?> :
						</div>
						<span>&nbsp;</span>
						
						<div class="row">
							<div class="col-lg-8">
								<form id="checkout-form-group-discount" action="" style="width:100%;">
									<div class="input-group input-group-sm">
										<input name="txtCode" id="txtCode" type="text" class="form-control" style="width:100%;" required="true" oninvalid="this.setCustomValidity('<?= t('Please fill out this field');?>')">
										<input type="hidden" name="action" value="code" />
										<span class="input-group-btn">
										  <button class="btn btn-primary btn-flat" type="submit"><?= t('Apply');?></button>
										</span>
										<a class="input-group-addon btn btn-default" href="javascript:vividStore.resetDiscountCode();"><?= t('Reset');?></a>
									</div>
								</form>
							</div>
						</div>
					
						<br>
						<div id="checkout-discount-method">
							<?php DiscountModal::getDiscountListElement(); ?>
						</div>
						<br>
						<br>
					
					</div>
						
				<?php } ?>
				
				<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
				
					<div class="title-header">
						<?php echo t("Total")?> :
					</div>
					<span>&nbsp;</span>
			
					<ul class="checkout-totals-line-items-2">

						<li>
							<strong><?php echo t("Subtotal")?></strong> 
							<span style="float:right;">
								<?php echo Price::format($subtotal); ?>
								<?php  
								if ($calculation == 'extract') {
									echo '<small class="text-muted">'.t("inc. taxes")."</small>";
								}
								?>
							</span>
						</li>
						
						<?php  if ($shippingEnabled) { ?>
						<li>
							<strong><?php echo t("Shipping")?></strong>
							<span style="float:right;">
								<span id="shipping-total"><?php echo Price::format($shippingtotal); ?></span>
							</span>
						</li>
						<?php } ?>
						
						<?php 
							if ($taxtotal > 0) {
								foreach ($taxes as $tax) {
									if ($tax['taxamount']>0) {
										?>
										<li>
											<strong><?php echo ($tax['name'] ? $tax['name'] : t("Tax"))?></strong>
											<span style="float:right;">
												<span class="tax-amount"><?php echo Price::format($tax['taxamount']);?></span>
											</span>
										</li>
									<?php  
									}
								}
							}
						?>
					
						<?php if ($discountsWithCodesExist) { ?>
						<li>		
							<strong><?php echo t("Discount")?></strong>
							<span class="discount-total" style="float:right;">
								<?php echo CartTotal::getDiscountTotal(); ?>
							</span>		
						</li>
						<?php } ?>
						
						<li>
							<div id="box-total-amount">
								<span class="lbl-total-amount">
									<strong><?php echo t("Grand Total")?></strong>
								</span>
								<span class="total-amount">
									<?php echo Price::format($grandtotal)?>
								</span>
							</div>
						</li>
						
						<li>
							<hr>
							<center>
								<form class="checkout-form-group" id="checkout-form-group-payment" method="post" action="<?php echo View::url('/checkout/submit')?>">
									<input type="submit" class="btn btn-primary btn-place-order" value="<?php echo t("Place Order")?>">
								</form>
							</center>
						</li>
						
					</ul>
					
				</div>

			</div>
						


        <?php } ?>
		
		</div>
    </div>
</div>

<?php  } else { ?>
	
<div class="row marginBot10">
	<div class="col-md-12">
		Hey. How did you get here?
	</div>
</div>
	
<?php } ?>
