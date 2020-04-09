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

<?php if ($paymentComplete) { ?>

	<div class="row marginBot10">
		<div class="col-lg-12">
		
			<div class="wrapper-content">

				<center>
					<h3><?php echo t("Your payment has been sent") ?>.</h3>
					<br>
				
					<a class="btn btn-primary" href="<?=View::url('/myorder')?>"><?=t("Go to order list")?></a>
					<br><br>
				</center>
			
			</div>
		
		</div>
	</div>
	
<?php } elseif ($paymentExpired) { ?>

	<div class="row marginBot10">
		<div class="col-lg-12">
		
			<div class="wrapper-content">

				<center>
					<h3><?php echo t("Your order has been canceled") ?>.</h3>
					<br>
					<a class="btn btn-primary" href="<?=View::url('/')?>"><?=t("Continue Shopping")?></a>
					<br><br>
				</center>
			
			</div>
		
		</div>
	</div>
	
<?php } else { ?>
			
	<?php if (!$invalidOrderPayment) { ?>

		<div class="row marginBot10">
			<div class="col-lg-12">
				<div class="wrapper-content">
				
					<div class="col-lg-9">
						<h3><i class="fa fa-fw fa-check-circle icon-order-success"></i> <?php echo t("Your Order has been successfully submitted !")?></h3>		
						<?php echo t("Please complete the payment within")?> 
						<span id="countdown">
							<span class="days"></span> <span class="lbldays"><?php echo t("Days")?></span>
							<span class="hours"></span> <span class="lblhours"><?php echo t("Hours")?></span>
							<span class="minutes"></span> <span class="lblminutes"><?php echo t("Minutes")?></span>
							<span class="seconds"></span> <span class="lblseconds"><?php echo t("Seconds")?></span> 
						</span>

						<br>
						<br>
						
						<?php echo t("Order Number")?> : <?php echo $orderID; ?>
						<br>	
						<?php echo t("Name")?> : <?php echo $baFirstName. " " .$baLastName; ?>
						<br>
						<?php echo t("Address")?> : <?php echo $baFirstAddress. " " .$baSecondAddress. " " .$baPostalCode. " " .$baCity. " " .$baState. " " .$baCountry ?>
						<br>
						<?php echo t("Phone")?> : <?php echo $baPhone ?>
						<br>
						<?php if($baCompanyName !=='') { ?>
							<?php echo t("Company")?> : <?php echo $baCompanyName ?>
							<br>
						<?php } ?>
						<br>
					</div>
					
					<div class="col-lg-3" style="text-align: right">
						<br>
						<?php echo t("Amount")?> : <span class="payment-amount"><?php echo Price::format($Amount); ?></span>
						<span id="payment-amount" style="display:none"><?php echo $Amount; ?></span>
					</div>
					
				</div>
			</div>
		</div>

		<div class="row marginBot10">
			<div class="col-lg-12">
				<div class="wrapper-content">
					<br>
					
						<form id="payment-form-group" method="post" action="<?php echo View::url('/payment/submit')?>">
								
							<?php 
								if ($enabledPaymentMethods) {
							?>
							
								<div class="col-lg-6">
			
									<div class="title-header">
										<?php echo t("Choose your payment method")?> : 
									</div>
									
									<div class="col-container clearfix">
										<div id="checkout-payment-method-options">
											<?php 
												$i = 1;
												foreach ($enabledPaymentMethods as $pm) {
													if ($pm->getPaymentMethodHandle() !== 'invoice') {
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
											}
											?>
										</div>
									</div>
								
								</div>
									
								<div class="col-lg-6">
									<div style="border:1px dotted #ccc; margin-bottom:10px; padding:15px;">
										<?php 
											foreach ($enabledPaymentMethods as $pm) {
												echo "<div class=\"payment-method-container hidden\" data-payment-method-id=\"{$pm->getPaymentMethodID()}\">";
												$pm->renderCheckoutForm();
												echo "</div>";
											}
										?>
									</div>
								</div>
									
							<?php
								} else {
							?>
								<p class="alert alert-warning"><?php echo  t('There are currently no payment methods available to process your order.'); ?></p>
							<?php 
								} 
							?>

								<div class="clearfix checkout-form-group-buttons">
									<?php  if ($enabledPaymentMethods) { ?>
										  <input type="hidden" name="txtOrderID" value="<?=$orderID ?>">
										  <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-credit-card"></i> &nbsp;<?= t('Complete Payment');?></button>
									<?php } ?>
								</div>

						</form>
					
					<br>
				</div>
			</div>
		</div>
		
	<?php } else { ?>

		<div class="row marginBot10">
			<div class="col-lg-12">
				<div class="wrapper-content">

					<center>
						<h3><?php echo t("Your order was invalid. Kindly check your order") ?>.</h3>
						<br>
						<a class="btn btn-primary" href="<?=View::url('/myorder')?>"><?=t("Go to order list")?></a>
						<br><br>
					</center>
		
				</div>
			</div>
		</div>
	
	<?php } ?>

<?php } ?>

