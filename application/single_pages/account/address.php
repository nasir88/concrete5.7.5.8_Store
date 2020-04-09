<?php 
defined('C5_EXECUTE') or die("Access Denied.");
use \Concrete\Package\VividStore\Src\VividStore\Address\AddressModal as AddressModal;
?>

<div class="row">
    <div class="col-lg-12">
		<div class="wrapper-content">

			<h1 class="page-header"><?php echo t('Address Book')?></h1>
			
			<div id="checkout-address">
				<?php  AddressModal::getAddressListElement(); ?>
			</div>
			
			<hr>
			<div class="form-actions">
				<a href="<?php echo URL::to('/account')?>" class="btn btn-default" /><?php echo t('Back to Account')?></a>
			</div>
			
		</div>
	</div>
</div>
