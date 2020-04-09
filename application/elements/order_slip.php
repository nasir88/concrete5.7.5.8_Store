<?php 
defined('C5_EXECUTE') or die("Access Denied.");
$dh = Core::make('helper/date');
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as Price;
use \Concrete\Package\VividStore\Src\Attribute\Key\StoreOrderKey as StoreOrderKey;
use \Concrete\Package\VividStore\Src\VividStore\Address\AddressModal as AddressModal;
use \Concrete\Package\MyTheme\Src\MyThemesSRC as ThemeSRC;

//Loader Tools MyTheme
$ToolsSitePath = ThemeSRC::PackagePathTools();
?>

<div id="dvContainer">
	<section class="invoice">
		<!-- title row -->
		<div class="row">
		  <div class="col-xs-12">
			  <div class="pull-left">AdminLTE, Inc.</div>
			  <div class="pull-right">Invoice Date : <?=$getOrderDate?></div>
		  </div><!-- /.col -->
		</div>
		<!-- info row -->
		<hr>
		
		<?php
		$h = Loader::helper('lists/countries');
		$countryNameFrom = $h->getCountryName(Config::get('vividstore.fromCompanyCountry'));
		
		$dataAddress = AddressModal::getMyAddressByID($order->getCustomerID());
		$ui = UserInfo::getByID($dataAddress['uID']);
		$countryName = $h->getCountryName($dataAddress['baCountry']);
		if ($ui) { ?>

			<div class="row invoice-info">
			  <div class="col-sm-4 invoice-col">
				<?=t("From")?> : 
				<address>
				  <strong><?=Config::get('vividstore.fromCompanyName') ?></strong>
				  <br>
				  <?=Config::get('vividstore.fromCompanyFirstAddress'). " " .Config::get('vividstore.fromCompanySecondAddress'). " " .Config::get('vividstore.fromCompanyPostal'). " " .Config::get('vividstore.fromCompanyCity'). " " .Config::get('vividstore.fromCompanyState'). " " .$countryNameFrom ?>
				  <br>
				  <?=t("Registration No")?> : <?=Config::get('vividstore.fromCompanyRegistrationNo') ?>
				</address>
			  </div><!-- /.col -->
			  <div class="col-sm-4 invoice-col">
				<?=t("To")?> : 
				<address>
					<strong><?php echo $dataAddress['baFirstName']. " " .$dataAddress['baLastName']; ?></strong>
					<br>
					<?php echo $dataAddress['baFirstAddress']. " " .$dataAddress['baSecondAddress']. " " .$dataAddress['baPostalCode']. " " .$dataAddress['baCity']. " " .$dataAddress['baState']. " " .$countryName ?>
					<br>
					<?=t("Phone")?> : <?php echo $dataAddress['baPhone'] ?>
					<br>
					<?=t("Email")?> : <?=$ui->getUserEmail(); ?>
					<?php if($dataAddress['baCompanyName'] !=='') {
						echo '<br>'.t("Company") . ' : ' .$dataAddress['baCompanyName'];
					?>
					<?php } ?>
				</address>
			  </div><!-- /.col -->
			  <div class="col-sm-4 invoice-col">
				<b><?=t("Invoice")?> #<?=$order->getOrderID()?></b>
				<?php if ($order->getOrderPaid()) {
					echo '( <span class="statusPaid">' .t("Paid"). '</span> )';
				}else{
					echo '( <span class="statusUnPaid">' .t("Unpaid"). '</span> )';
				} ?>
				<br>
				<br>
				<b><?=t("Order Number")?> :</b> <?=$order->getOrderID()?>
				<br>
				<b><?=t("Order Date")?> :</b> <?=$getOrderDate?>
				<br>
				<b><?=t("Payment Date & Time")?> :</b> 
				<?php if ($order->getOrderPaid()) {
					echo $getOrderPaidDate. ' ('.$getOrderPaidTime.')';
				}else{
					echo ' - ';
				} ?>
				<br>
				<b><?=t("Payment Method")?> :</b> 
				<?=$order->getPaymentMethodName()?>
				<br>
				<?php $transactionReference = $order->getTransactionReference();
					  if ($transactionReference) { ?>
						<b><?=t("Transaction Reference")?> : </b> <?=$transactionReference?><br>
				<?php } ?>
				<?php //if ($order->isShippable()) { ?>
						<!--<b><//?=t("Shipping Method")?> : </b> <?//=$order->getShippingMethodName()?><br>-->
				<?php //} ?>
				<!--<b><?//=t("User ID")?> :</b> <a href="<?//= View::url('/'.$_SESSION['myURLTheme'].'/users/search/view/' . $ui->getUserID());?>"><?//= $ui->getUserName(); ?></a>-->
				<br>
				</div><!-- /.col -->
			</div><!-- /.row -->
		<?php } ?>
	
		<!-- Table row -->
		<b><u><?=t("Items")?></u> :</b>
		<br />
		<div class="row">
			<div class="col-xs-12 table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th><strong><?=t("Product Name")?></strong></th>
							<th><?=t("Product Options")?></th>
							<th><?=t("Price")?></th>
							<th><?=t("Quantity")?></th>
							<th><?=t("Subtotal")?></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$items = $order->getOrderItems();

							if($items){
								foreach($items as $item){
						  ?>
							<tr>
								<td><?=$item->getProductName()?>
								<?php if ($sku = $item->getSKU()) {
								echo '(' .  $sku . ')';
								 } ?>
								</td>
								<td>
									<?php
										$options = $item->getProductOptions();
										if($options){
											echo "<ul class='list-unstyled'>";
											foreach($options as $option){
												echo "<li>";
												echo "<strong>".$option['oioKey']." : </strong>";
												echo $option['oioValue'];
												echo "</li>";
											}
											echo "</ul>";
										}
									?>
								</td>
								<td><?=Price::format($item->getPricePaid())?></td>
								<td><?=$item->getQty()?></td>
								<td><?=Price::format($item->getSubTotal())?></td>
							</tr>
						  <?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	
		<?php $applieddiscounts = $order->getAppliedDiscounts();

		if (!empty($applieddiscounts)) { ?>
			<b><u><?=t("Discounts Applied")?></u> :</b>
		<br />
			
		<div class="row">
			<div class="col-xs-12 table-responsive">
			
			<table class="table table-striped">
				<thead>
				<tr>
					<th><strong><?=t("Name")?></strong></th>
					<th><?=t("Displayed")?></th>
					<th><?=t("Deducted From")?></th>
					<th><?=t("Amount")?></th>
					<th><?=t("Triggered")?></th>
				</tr>

				</thead>
				<tbody>
				<?php foreach($applieddiscounts as $discount) { ?>
					<tr>
						<td><?= h($discount['odName']); ?></td>
						<td><?= h($discount['odDisplay']); ?></td>
						<td><?= h($discount['odDeductFrom']); ?></td>
						<td><?= ($discount['odValue'] > 0 ? $discount['odValue'] : $discount['odPercentage'] . '%' ); ?></td>
						<td><?= ($discount['odCode'] ? t('by code'). ' ' .$discount['odCode']: t('Automatically') ); ?></td>
					</tr>
				<?php } ?>

				</tbody>
			</table>
			</div>
		</div>
		<?php } ?>
		<br>
		<br>
	
		<div class="row">
			<div class="col-xs-8" style="padding-top:95px;">
				<?php echo t("Computer generated document")?><br>
				<?php echo t("No Signature required")?>
			</div><!-- /.col -->
			<div class="col-xs-4">
				<div class="table-responsive">
				  <table class="table">
					<tr>
					  <th style="width:50%"><?=t("Subtotal")?> : </th>
					  <td style="text-align:right"><?=Price::format($order->getSubTotal())?></td>
					</tr>
					
					<?php if ($order->isShippable()) { ?>
					<tr>
					  <th><?=t("Shipping")?> : </th>
					  <td style="text-align:right"><?=Price::format($order->getShippingTotal())?></td>
					</tr>
					<?php } ?>
					
					<?php foreach($order->getTaxes() as $tax){?>
					<tr>
					  <th><?=$tax['label']?> : </th>
					  <td style="text-align:right"><?=Price::format($tax['amount'] ? $tax['amount'] : $tax['amountIncluded'])?></td>
					</tr>
					<?php } ?>
					
					<?php if (!empty($applieddiscounts)) { ?>
					<tr>
					  <th><?=t("Discount")?> : </th>
					  <td style="text-align:right">- <?=Price::format($order->getDiscountTotal())?></td>
					</tr>
					<?php } ?>
					
					<tr>
					  <th><?=t("Grand Total")?> : </th>
					  <td style="text-align:right"><?=Price::format($order->getTotal())?></td>
					</tr>
				  </table>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div>
		
	</section><!-- /.content -->
</div>
		
<script type="text/javascript">
	$(function () {
		$("#btnPrint").click(function () {
			var contents = $("#dvContainer").html();
			var frame1 = $('<iframe />');
			frame1[0].name = "frame1";
			frame1.css({ "position": "absolute", "top": "-1000000px" });
			$("body").append(frame1);
			var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
			frameDoc.document.open();
			//Create a new HTML document.
			frameDoc.document.write('<html><head><title>Invoice</title>');
			frameDoc.document.write('</head><body><style>body,h3,h4,th,td { font-size:9px!important; padding:5px; overflow-x: auto!important; } ');
			frameDoc.document.write('h3,h4,th,td { font-size:9px!important; } ');
			frameDoc.document.write('.pull-right { float:right!important; }</style>');
			//Append the external CSS file.
			frameDoc.document.write('<link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/bootstrap/css/bootstrap.css">');
			frameDoc.document.write('<link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/AdminLTE.css">');
			frameDoc.document.write('<link rel="stylesheet" href="<?php echo $ToolsSitePath;?>/dist/css/AdminLTE_New.css">');
			//Append the DIV contents.
			frameDoc.document.write(contents);
			frameDoc.document.write('</body></html>');
			frameDoc.document.close();
			setTimeout(function () {
				window.frames["frame1"].focus();
				window.frames["frame1"].print();
				frame1.remove();
			}, 500);
		});
	});
</script>

