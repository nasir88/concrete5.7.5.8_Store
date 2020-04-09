<?php 
//Elements Controller : Package\VividStore\Src\VividStore\Discount\DiscountModal.php; 
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Cart\Cart as StoreCart;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as Price;
?>

<?php if ($statusAction != '') { ?>
<div class="row">
	<div class="col-lg-8">
	
		<?php if ($statusAction == 'invalid') { ?>
			<div class="alert alert-error">
				<a href="#" class="close" style="text-decoration:none!important;" data-dismiss="alert" aria-label="close">&times;</a>
				<?= t('Your coupon cannot be applied. Please check your coupon terms and conditions for more details.');?>
			</div>
		<?php } ?>
		<?php if ($statusAction == 'add') { ?>
			<div class="alert alert-success">
				<a href="#" class="close" style="text-decoration:none!important;" data-dismiss="alert" aria-label="close">&times;</a>
				<?= t('Coupon has been applied.');?>
			</div>
		<?php } ?>
		<?php if ($statusAction == 'reset') { ?>
			<div class="alert alert-success">
				<a href="#" class="close" style="text-decoration:none!important;" data-dismiss="alert" aria-label="close">&times;</a>
				<?= t('Coupon has been reset.');?>
			</div>
		<?php } ?>
		<?php if ($statusAction == 'exist') { ?>
			<div class="alert alert-error">
				<a href="#" class="close" style="text-decoration:none!important;" data-dismiss="alert" aria-label="close">&times;</a>
				<?= t('Limit one coupon per sub-total, per total or per shipping.');?>
			</div>
		<?php } ?>

	</div>
</div>
<?php } 

$discountslength = count($discounts);
if ($discountslength > 0) {

	$discountstrings = array();
	foreach ($discounts as $k=>$discount) {
		$discountstrings[] = h($discount->getDisplay());
	}
	
	//Display Total Discount
	echo '<u>'. t('Discounts Applied') .'</u> : <br>';
	
	echo '<b><i>' . implode(', ', $discountstrings) .'</i></b><br><br>';
	
	if (!$TotalItemsDiscount == 0 || !$TotalItemsDiscount == ''){
		echo t('Items/Product Discount') .' : '. Price::format($TotalItemsDiscount) .'<br>';
	}
	if (!$TotalShippingDiscount == 0 || !$TotalShippingDiscount == ''){
		echo t('Shipping Fee Discount') .' : '. Price::format($TotalShippingDiscount) .'<br>';
	}
	if (!$TotalDiscount == 0 || !$TotalDiscount == ''){
		echo t('Total Discount') .' : '. Price::format($TotalDiscount) .'<br>';
	}
	
?>
<?php 
} 
?>

