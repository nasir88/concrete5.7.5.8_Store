<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Product\Product as StoreProduct;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as StorePrice;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionGroup as StoreProductOptionGroup;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionItem as StoreProductOptionItem;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Checkout as StoreCheckoutUtility;
use \Concrete\Package\VividStore\Src\VividStore\Customer\Customer as StoreCustomer;
use \Concrete\Package\VividStore\Src\VividStore\Address\AddressModal as AddressModal;

$form = Core::make("helper/form");
$customer = new StoreCustomer();
$billingCountryArray = StoreCheckoutUtility::getCountryOptions();
$billingCountries = $billingCountryArray['countries'];
$dataAddress = AddressModal::getMyAddressByID($baID);
?>

<script type="text/javascript">
$(function() {

    $('#address-modal').slimScroll({
		height: 'auto',
		borderRadius: '0px',
		alwaysVisible: true
    });
	
	$(window).resize(function () {
		$('#address-modal').slimScroll({
			height: 'auto',
			borderRadius: '0px',
			alwaysVisible: true
		});
	});
	
	$('#checkout-form-group-address').validate({
		rules: {
			baFirstName: 'required',
			baLastName: 'required',
			baPhone: 'required',
			baFirstAddress: 'required',
			baCountry: 'required',
			baCity: 'required',
			baState: 'required',
			baPostalCode: 'required',
		},
		messages: {
			baFirstName: '<?php echo t('Enter your first name') ?>.',
			baLastName: '<?php echo t('Enter your last name') ?>.',
			baPhone: '<?php echo t('Enter your phone number') ?>.',
			baFirstAddress: '<?php echo t('Enter your address line 1') ?>.',
			baCountry: '<?php echo t('Enter your country') ?>.',
			baCity: '<?php echo t('Enter your city') ?>.',
			baState: '<?php echo t('Enter your state') ?>.',
			baPostalCode: '<?php echo t('Enter your postal code') ?>.',
		},
		submitHandler: function(form) {
			vividStore.waiting('');
			var urls = vividStore.URLs.Address+"/updateAddressModal";
			
			$.ajax({
                 type: "POST",
                 url: urls,
                 data: $(form).serialize(),
                 success: function () {
					vividStore.showShippingMethods();
                 }
             });
		}
    });

});
</script>

<div class="box-modal clearfix" id="cart-modal">

	<div id="address-modal">
		<form id="checkout-form-group-address" method="post" action="" style="position:relative;">
		
			<input name="baID" type="hidden" value="<?php echo $baID ?>">
			<input name="baMode" type="hidden" value="<?php echo $baMode ?>">
		
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="address-first-name" class="control-label"><?php echo t("First Name")?></label>
						<?php   
						echo $form->text('baFirstName', $dataAddress['baFirstName'], array("id"=>"address-first-name", "data-placement"=>"bottom", "class"=>"input-sm")); ?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="address-last-name" class="control-label"><?php echo t("Last Name")?></label>
						<?php  echo $form->text('baLastName', $dataAddress['baLastName'], array("id"=>"address-last-name", "data-placement"=>"bottom", "class"=>"input-sm")); ?>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label for="address-company-name" class="control-label"><?php echo t("Company Name")?></label>
						<?php  echo $form->text('baCompanyName', $dataAddress['baCompanyName'], array("id"=>"address-company-name", "class"=>"input-sm")); ?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="address-phone-number" class="control-label"><?php echo t("Phone")?></label>
						<?php  echo $form->text('baPhone', $dataAddress['baPhone'], array("id"=>"address-phone-number", "data-placement"=>"bottom", "class"=>"input-sm")); ?>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="address-line-first" class="control-label"><?php echo t("Address Line 1")?></label>
						<?php  echo $form->text('baFirstAddress', $dataAddress['baFirstAddress'], array("id"=>"address-line-first", "data-placement"=>"bottom", "class"=>"input-sm")); ?>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<label for="address-line-second" class="control-label"><?php echo t("Address Line 2")?></label>
						<?php  echo $form->text('baSecondAddress', $dataAddress['baSecondAddress'], array("id"=>"address-line-second", "class"=>"input-sm")); ?>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label for="address-country" class="control-label"><?php echo t("Country")?></label>
						<?php  echo $form->select('baCountry', $billingCountries, $dataAddress['baCountry'], array("id"=>"address-country", "class"=>"input-sm")); ?>
						
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="address-city" class="control-label"><?php echo t("City")?> / <?php echo t("Town")?></label>
						<?php  echo $form->text('baCity', $dataAddress['baCity'], array("id"=>"address-city", "data-placement"=>"bottom", "class"=>"input-sm")); ?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="address-state" class="control-label"><?php echo t("State")?></label>
						<?php  echo $form->text('baState', $dataAddress['baState'], array("id"=>"address-state", "data-placement"=>"bottom", "class"=>"input-sm")); ?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="address-postal-code" class="control-label"><?php echo t("Postal Code")?></label>
						<?php  echo $form->text('baPostalCode', $dataAddress['baPostalCode'], array("id"=>"address-postal-code", "data-placement"=>"bottom", "type"=>"number", "class"=>"input-sm")); ?>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<div class="modal-footer">
						<a class="btn btn-default" href="javascript:vividStore.exitModal()"><?php echo t("Cancel")?></a>
						<button id="btnConfirm" type="submit" class="btn btn-primary pull-right"><?php echo t("Confirm")?></button>
					</div>
				</div>
			</div>
			
		</form>
		
	</div>

</div>
