<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Product\Product as StoreProduct;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as StorePrice;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionGroup as StoreProductOptionGroup;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionItem as StoreProductOptionItem;

$h = Loader::helper('lists/countries');
?>

<script type="text/javascript">
	equalheight('.EqHeightDiv');
</script>

<div class="row">
    <?php 
    if ($address) {
        $i=1;
        foreach ($address as $k=>$addressItem) {
			$countryName = $h->getCountryName($addressItem['baCountry']);
	?>
		
	<div class="col-sm-6 col-md-6 col-lg-4">
		<div id="address-line-items" class="<?php if($addressItem['baDefault']==1) { ?>current-BorderAddress<?php } ?> EqHeightDiv">
			<div class="contents">
			
				<a class="ico-default default <?php if($addressItem['baDefault']==1) { ?>current-Address<?php } ?>" 
					href="javascript:vividStore.defaultAddress('<?php echo $addressItem['baID'] ?>','<?php echo t('Checking your delivery information from address') ?>...');">
						<span class="glyphicon glyphicon-ok"></span>
				</a>
				
				<?php if($addressItem['baCompanyName'] !=='') {
						echo $addressItem['baCompanyName'];
				?>
				<br>
				<?php } ?>
				<?php echo $addressItem['baFirstName']. " " .$addressItem['baLastName']; ?>
				<br>
				<?php echo $addressItem['baPhone'] ?>
				<br>
				<?php echo $addressItem['baFirstAddress']. " " .$addressItem['baSecondAddress']. " " .$addressItem['baPostalCode']. " " .$addressItem['baCity']. " " .$addressItem['baState']. " " .$countryName ?>
				<br>
				
			</div>
			<div class="links">
				<a class="ico-default" href="javascript:vividStore.displayAddress('<?php echo $addressItem['baID'] ?>','edit','');"><i class="fa fa-edit"></i></a>
				<a class="ico-default" href="javascript:vividStore.removeAddress('<?php echo $addressItem['baID'] ?>','');"><i class="fa fa-remove"></i></a>
			</div>
		</div>
	</div>
	<?php
			$i++;
		}
	}
	?>
	<div class="col-sm-6 col-md-6 col-lg-4">
		<div id="address-line-items" class="EqHeightDiv">
			<div class="add">
				<a class="btn add_address" href="javascript:vividStore.displayAddress('','add','');"><span class="glyphicon glyphicon-plus"></span> <br> <?php echo t("Add New Address")?></a>
			</div>
		</div>
	</div>
</div>
