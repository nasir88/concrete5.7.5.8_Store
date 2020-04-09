<?php 
defined('C5_EXECUTE') or die("Access Denied.");
use \Concrete\Package\VividStore\Src\VividStore\Shipping\ShippingMethod as StoreShippingMethod;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as StorePrice;

Session::set('FreeShipping',1);
$sessionShippingMethodID = Session::get('smID');
$eligibleMethods = StoreShippingMethod::getEligibleMethods();
$i=1;
?>


<?php
foreach ($eligibleMethods as $method) {
	
	if ($method->isEnabled()) {
	
		Session::set('FreeShipping',0);
	
		if ($sessionShippingMethodID == $method->getShippingMethodID()) {
			$checked = true;
		} else {
			if ($i==1) {
				$checked = true;
			} else {
				$checked = false;
			}
		}
			
    ?>
		<div class="radio">
			<label>
				<input type="radio" name="shippingMethod" value="<?php echo $method->getShippingMethodID()?>"<?php  if ($checked) { echo " checked"; } ?>>
				<?php echo $method->getName()?> - <?php echo StorePrice::format($method->getShippingMethodTypeMethod()->getRate())?>
			</label>
		</div>
		
<?php 
	}
	$i++;  
} 

if (Session::get('FreeShipping') == 1) {
	echo t('Free Shipping');
}
?>



