<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as Price;

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

<div class="row">
    <div class="col-sm-8">
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
		
        <form class="checkout-form-group active-form-group" id="checkout-form-group-billing" action="" place-order-url="<?php echo View::url('/checkout/submit')?>">

			<div class="title-header">
				<?php echo t("Billing Address")?> : 
			</div>
			
            <div class="checkout-form-group-body col-container clearfix">
                <div class="clearfix">
                    <div class="vivid-store-col-2">
                        <div class="form-group">
                            <label for="checkout-billing-first-name"><?php echo t("First Name")?></label>
                            <?php  echo $form->text('checkout-billing-first-name', $customer->getValue("billing_first_name"), array("required"=>"true"));
    ?>
                        </div>
                   </div>
                   <div class="vivid-store-col-2">
                        <div class="form-group">
                            <label for="checkout-billing-last-name"><?php echo t("Last Name")?></label>
                            <?php  echo $form->text('checkout-billing-last-name', $customer->getValue("billing_last_name"), array("required"=>"true"));
    ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="vivid-store-col-2">
                        <div class="form-group">
                            <label for="checkout-billing-first-name"><?php echo t("Company Name")?></label>
                            <?php  echo $form->text('checkout-billing-company-name', $customer->getValue("billing_company_name"));
    ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <?php  if ($customer->isGuest()) {
    ?>
                    <div class="vivid-store-col-2">
                        <div class="form-group">
                            <label for="email"><?php echo t("Email")?></label>
                            <?php  echo $form->email('email', $customer->getEmail(), array("required"=>"true"));
    ?>
                        </div>
                    </div>
                    <?php  
}
    ?>
                    <div class="vivid-store-col-2">
                        <div class="form-group">
                            <label for="checkout-billing-phone"><?php echo t("Phone")?></label>
                            <?php  echo $form->telephone('checkout-billing-phone', $customer->getValue("billing_phone"), array("required"=>"true"));
    ?>
                        </div>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-billing-address-1"><?php echo t("Address 1")?></label>
                        <?php  echo $form->text('checkout-billing-address-1', $customer->getValue("billing_address")->address1, array("required"=>"true"));
    ?>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-billing-address-1"><?php echo t("Address 2")?></label>
                        <?php  echo $form->text('checkout-billing-address-2', $customer->getValue("billing_address")->address2);
    ?>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-billing-country"><?php echo t("Country")?></label>
                        <?php  $country = $customer->getValue("billing_address")->country;
    ?>
                        <?php  echo $form->select('checkout-billing-country', $billingCountries, $country?$country:($defaultBillingCountry ? $defaultBillingCountry : 'US'), array("onchange"=>"vividStore.updateBillingStates()"));
    ?>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-billing-city"><?php echo t("City")?></label>
                        <?php  echo $form->text('checkout-billing-city', $customer->getValue("billing_address")->city, array("required"=>"true"));
    ?>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-billing-state"><?php echo t("State")?></label>
                        <?php  $billingState = $customer->getValue("billing_address")->state_province;
    ?>
                        <?php  echo $form->select('checkout-billing-state', $states, $billingState?$billingState:"");
    ?>
                        <input type="hidden" id="checkout-saved-billing-state" value="<?php echo $billingState?>">
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-billing-zip"><?php echo t("Postal Code")?></label>
                        <?php  echo $form->text('checkout-billing-zip', $customer->getValue("billing_address")->postal_code, array("required"=>"true"));
    ?>
                    </div>
                </div>

                <div class="checkout-form-group-buttons">
                    <input type="submit" class="btn btn-default btn-next-pane" value="<?php echo t("Place Order")?>">
                </div>

            </div>

            <div class="checkout-form-group-summary col-container clearfix">
			
				<div class="confirm-order"></div>
			
                <div class="vivid-store-col-2">
                    <label><?php echo  t('Name');
    ?></label>
                    <p>
                        <span class="summary-name"></span><br>
                        <span class="summary-company"></span>
                    </p>

                    <label><?php echo  t('Email');
    ?></label>
                    <p class="summary-email"></p>

                    <label><?php echo  t('Phone');
    ?></label>
                    <p class="summary-phone"></p>
                </div>

                <div class="vivid-store-col-2">
                    <label><?php echo  t('Address');
    ?></label>
                    <p class="summary-address"></p>
                </div>
            </div>

        </form>
        
		<?php  if ($shippingEnabled) { ?>
		
        <form class="checkout-form-group" id="checkout-form-group-shipping">

			<div class="title-header">
				<?php echo t("Shipping Address")?> : 
			</div>

            <div class="checkout-form-group-body col-container clearfix">
                <div class="vivid-store-col-1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="ckbx-copy-billing">
                            <?php echo t("Same as Billing Address")?>
                        </label>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-shipping-first-name"><?php echo t("First Name")?></label>
                        <?php  echo $form->text('checkout-shipping-first-name', $customer->getValue("shipping_first_name"), array("required"=>"required"));
    ?>
                    </div>
               </div>
               <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-shipping-last-name"><?php echo t("Last Name")?></label>
                        <?php  echo $form->text('checkout-shipping-last-name', $customer->getValue("shipping_last_name"), array("required"=>"required"));
    ?>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-billing-first-name"><?php echo t("Company Name")?></label>
                        <?php  echo $form->text('checkout-shipping-company-name', $customer->getValue("shipping_company_name"));
    ?>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-shipping-address-1"><?php echo t("Address 1")?></label>
                        <?php  echo $form->text('checkout-shipping-address-1', $customer->getValue("shipping_address")->address1, array("required"=>"required"));
    ?>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-shipping-address-1"><?php echo t("Address 2")?></label>
                        <?php  echo $form->text('checkout-shipping-address-2', $customer->getValue("shipping_address")->address2);
    ?>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-shipping-country"><?php echo t("Country")?></label>
                        <?php  $country = $customer->getValue("shipping_address")->country;
    ?>
                        <?php  echo $form->select('checkout-shipping-country', $shippingCountries, $country?$country: ($defaultShippingCountry ? $defaultShippingCountry : 'US'), array("onchange"=>"vividStore.updateShippingStates()"));
    ?>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-shipping-city"><?php echo t("City")?></label>
                        <?php  echo $form->text('checkout-shipping-city', $customer->getValue("shipping_address")->city, array("required"=>"required"));
    ?>
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-shipping-state"><?php echo t("State")?></label>
                        <?php  $shippingState = $customer->getValue("shipping_address")->state_province;
    ?>
                        <?php  echo $form->select('checkout-shipping-state', $states, $shippingState?$shippingState:"");
    ?>
                        <input type="hidden" id="checkout-saved-shipping-state" value="<?php echo $shippingState?>">
                    </div>
                </div>
                <div class="vivid-store-col-2">
                    <div class="form-group">
                        <label for="checkout-shipping-zip"><?php echo t("Postal Code")?></label>
                        <?php  echo $form->text('checkout-shipping-zip', $customer->getValue("shipping_address")->postal_code, array("required"=>"required"));
    ?>
                    </div>
                </div>

                <div class="checkout-form-group-buttons">
                    <a href="javascript:;" class="btn btn-default btn-previous-pane"><?php echo t("Previous")?></a>
                    <input type="submit" class="btn btn-default btn-next-pane" value="<?php echo t("Next")?>">
                </div>

            </div>
            <div class="checkout-form-group-summary col-container clearfix">
                <div class="vivid-store-col-2">
                    <label><?php echo  t('Name');
    ?></label>
                    <p>
                        <span class="summary-name"></span><br>
                        <span class="summary-company"></span>
                    </p>

                </div>

                <div class="vivid-store-col-2">
                    <label><?php echo  t('Address');
    ?></label>
                    <p class="summary-address"></p>
                </div>
            </div>
        </form>

        <form class="checkout-form-group" id="checkout-form-group-shipping-method">

			<div class="title-header">
				<?php echo t("Shipping Method")?> : 
			</div>

            <div class="checkout-form-group-body">

                <div id="checkout-shipping-method-options">

                    <?php 
                        /* shipping options are loaded in via ajax,
                         * since we dont know which shipping methods are available
                         * until after the shipping address fields are filled out.
                         */
                     ?>

                </div>

                <div class="checkout-form-group-buttons">
                    <a href="javascript:;" class="btn btn-default btn-previous-pane"><?php echo t("Previous")?></a>
                    <input type="submit" class="btn btn-default btn-next-pane" value="<?php echo t("Next")?>">
                </div>

            </div>

            <div class="checkout-form-group-summary col-container clearfix">
                <div class="vivid-store-col-2">
                    <p class="summary-shipping-method"></p>
                </div>
            </div>

        </form>

        <?php } ?>

        <form class="checkout-form-group" id="checkout-form-group-payment" method="post" action="<?php echo View::url('/checkout/submit')?>">

			<div class="title-header">
				<?php echo t("Payment")?> : 
			</div>

            <div class="checkout-form-group-body">

                <?php 
				if ($enabledPaymentMethods) {
				?>
                <div class="col-container clearfix">
                    <div id="checkout-payment-method-options" class="<?php echo count($enabledPaymentMethods) == 1 ? "hidden" : ""; ?>">
                    <?php 
                        $i = 1;
                        foreach ($enabledPaymentMethods as $pm) {
                            $props = array('data-payment-method-id' => $pm->getPaymentMethodID());
                            if ($i == 1) {
                                $props['checked'] = 'checked';
                            }
                            ?>
                            <div class='radio'>
                                <label>
                                    <?php 
                                        $pmsess = Session::get('paymentMethod');
                                        echo $form->radio('payment-method', $pm->getPaymentMethodHandle(), $pmsess[$pm->getPaymentMethodID()], $props);
                                        echo $pm->getPaymentMethodDisplayName();
                                    ?>
                                </label>
                            </div>
                    <?php 
                            $i++;
                        }
                        ?>
                    </div>
                </div>
                <div class="alert alert-danger payment-errors <?php  if ($controller->getTask()=='view') { echo "hidden"; } ?>">
					<?php echo $paymentErrors?>
				</div>
                <?php 
                        foreach ($enabledPaymentMethods as $pm) {
                            echo "<div class=\"payment-method-container hidden\" data-payment-method-id=\"{$pm->getPaymentMethodID()}\">";
                            $pm->renderCheckoutForm();
                            echo "</div>";
                        }
                    } else {  //if payment methods
                ?>
					<p class="alert alert-warning"><?php echo  t('There are currently no payment methods available to process your order.'); ?></p>
                <?php } ?>

                <div class="clearfix checkout-form-group-buttons">
                    <a href="javascript:;" class="btn btn-default btn-previous-pane"><?php echo t("Previous")?></a>

                    <?php  if ($enabledPaymentMethods) { ?>
                    <input type="submit" class="btn btn-default btn-complete-order" value="<?php echo t("Complete Order")?>">
                    <?php } ?>
                </div>

            </div>

        </form>

        <?php } ?>
		</div>
    </div><!-- .checkout-form-shell -->
	
	<div class="col-sm-4 mobile-marginTop10">
		<div class="wrapper-content">
		
		<?php if ($codevalid) { ?>
			<p class="alert alert-error"><?= t('Invalid code');?></p>
		<?php } ?>
		<?php if ($codesuccess) { ?>
			<p class="alert alert-success"><?= t('Discount Has Been Applied');?></p>
		<?php } ?>
		<?php if ($codereset) { ?>
			<p class="alert alert-success"><?= t('Discount Has Been Reset');?></p>
		<?php } ?>
		
		<div class="title-header">
			<?php echo t("Your Cart")?> : 
		</div>
		<span>&nbsp;</span>
		
        <?php  $controller->getCartListElement(); ?>
		<br>
		
		<?php if ($discountsWithCodesExist) { ?>
			<div class="title-header">
				<?php echo t("Enter Discount Code")?> :
			</div>
			<span>&nbsp;</span>
			
			<form method="post" style="width:100%;" action="<?= View::url('/checkout/submitDiscount');?>">
				<div class="input-group input-group-sm">
					<input name="code" type="text" class="form-control" required="true" oninvalid="this.setCustomValidity('<?= t('Please fill out this field');?>')">
					<input type="hidden" name="action" value="code" />
					<span class="input-group-btn">
					  <button class="btn btn-primary btn-flat" type="submit"><?= t('Apply');?></button>
					</span>
				</div>
			</form>
		
			<br>
			<?php if($hasCode) { ?>
				<u><?= (count($discounts) == 1 ? t('Discount Applied') : t('Discounts Applied'));?></u> :
				<br>
				<?php
					$discountstrings = array();
					$discountAmount = 0;
					foreach($discounts as $discount) {
						$discountstrings[] = h($discount->getDisplay());
						if ($discount->drDeductType  == 'value' ) {
							$discountAmount += $discount->drValue;
						}

						if ($discount->drDeductType  == 'percentage' ) {
							if ($discount->drDeductFrom == 'subtotal') {
								$discountAmount += ($discount->drPercentage / 100 * $subtotal);
							}

							if ($discount->drDeductFrom == 'total') {
								$discountAmount += ($discount->drPercentage / 100 * ($subtotal + $shippingtotal));
							}

							if ($discount->drDeductFrom == 'shipping') {
								$discountAmount += ($discount->drPercentage / 100 * $shippingtotal);
							}

						}

					}
					echo implode(', ', $discountstrings);
				?>
				<br>
				<br>
			<?php } ?>
		<?php } ?>
		
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
			
			<?php 
				if ($taxtotal > 0) {
			?>
            <li>
				<div class="taxes">
						<?php
							foreach ($taxes as $tax) {
								if ($tax['taxamount']>0) {
									?>
									<li class="line-item tax-item">
										<strong><?php echo ($tax['name'] ? $tax['name'] : t("Tax"))?>:</strong>
										<span class="tax-amount"><?php echo Price::format($tax['taxamount']);
									?></span>
									</li>
								<?php  
								}
							}
						?>
				</div>
            </li>
			<?php
				}
			?>
			
            <?php  //if ($shippingEnabled) { ?>
            <li>
				<strong><?php echo t("Shipping")?></strong>
				<span style="float:right;">
					<span id="shipping-total"><?php echo Price::format($shippingtotal); ?></span>
				</span>
            </li>
            <?php //} ?>
		
            <?php if($hasCode) { ?>
            <li>		
				<strong><?php echo t("Discount")?></strong>
				<span style="float:right;">
					- <?=Price::format($discountAmount)?>
				</span>				
				<!--<form method="post" style="width:100%; float:right;" action="<?= View::url('/checkout/submitDiscount');?>">
					<input type="hidden" name="action" value="code_reset" />
					<button type="submit" class="btn-cart-discount-reset"><?= t('Reset');?></button>
				</form> -->				
            </li>
            <?php }?>
			
            <li>
				<strong><?php echo t("Grand Total")?></strong>
				<span style="float:right;">
					<span class="total-amount"><?php echo Price::format($total)?></span>
				</span>
            </li>
			
        </ul>

		</div>
    </div>

</div>

<?php } elseif ($controller->getTask() == "external") { ?>
    <form id="checkout-redirect-form" action="<?php echo $action?>" method="post">
        <?php 
        $pm->renderRedirectForm();
    ?>
        <input type="submit" class="btn btn-primary" value="<?php echo t('Click Here if You\'re not Redirected')?>">
    </form>
    <script type="text/javascript">
        $(function(){
           $("#checkout-redirect-form").submit();
        });
    </script>
<?php  } else { ?>
    Hey. How did you get here?
<?php } ?>
