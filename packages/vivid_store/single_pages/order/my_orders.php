<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
$dh = Core::make('helper/date');
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as Price;
use \Concrete\Package\VividStore\Src\Attribute\Key\StoreOrderKey as StoreOrderKey;
use \Concrete\Package\VividStore\Src\VividStore\Address\AddressModal as AddressModal;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\OrderSlip AS OrderSlip;
use \Concrete\Package\MyTheme\Src\MyThemesSRC as ThemeSRC;
?>

<div class="row">
    <div class="col-lg-12">
		<div class="wrapper-content">

			<h1 class="page-header"><?php echo t('My Orders')?></h1>
		
			<?php if ($controller->getTask() == 'order_details'){ ?>

				<?php  OrderSlip::renderOrderPrintSlip($oID); ?>
			
				<hr>
				<div class="form-actions">
					<a href="<?php echo URL::to('/order/my_orders')?>" class="btn btn-default" /><?php echo t('Back to My Orders')?></a>
					<?php if($getOrderPaid == 1) { ?>
						<a class="btn btn-primary pull-right" href="<?=View::url('/payment/order/',$oID)?>" title="<?=t("Pay")?>"><i class="fa fa-fw fa-credit-card"></i><span class="display-xs-none"> &nbsp; <?=t("Pay")?></span> </a> &nbsp;&nbsp;
					<?php } ?>
					<button id="btnPrint" class="btn btn-success pull-right"><i class="fa fa-print"></i> &nbsp; <?php echo t("Print Invoice")?></button>
				</div>
			
			<?php }else{ ?>
			
				<?php if($orderList) { ?>
					
					<div class="ccm-dashboard-content-full">
						<form role="form" class="form-inline ccm-search-fields">
						
							<div class="row">
								<div class="col-nsr-100 padLeftRight15">
								
									<?php if($statuses){?>
										<ul id="group-filters" class="nav nav-pills myorder_group_filter activeFirst">
											<li><a class="first-child" href="<?php echo View::url('order/my_orders/')?>"><?=t('All Statuses')?></a></li>
											<?php foreach($statuses as $status){ ?>
												<li><a href="<?php echo View::url('order/my_orders/', $status->getHandle())?>"><?=$status->getName();?></a></li>
											<?php } ?>
										</ul>
									<?php } ?>

								</div>
							</div>
						
							<hr>

							<div class="row">
								<div class="col-nsr-100 padLeftRight15">
								
									<div class="input-group marginBot10 width400px mobile-width">
										<?php echo $form->search('keywords', $searchRequest['keywords'], array('placeholder' => t('Search Orders')))?>
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary widthAuto"><?php echo t('Search')?></button>
										</span>
									</div>
									
								</div>
							</div>

						</form>
					
						<?php
							foreach($orderList as $order){
								$dataAddress = AddressModal::getMyAddressByID($order->getCustomerID());
						?>
						<div id="pnlListingMyOrder">
							<div class="row">
								<div class="col-md-7">
									<div class="titleStatus"><?=ucwords($order->getStatus())?></div>
									<?=t("Order Number")?> : <?=$order->getOrderID()?>
								</div>
								<div class="col-md-4 pull-right text-right mobile-text-center mobile-pull-right-none">
									<div style="margin-top:20px;">
										<a class="btn btn-default" href="<?=View::url('/order/my_orders/order_details/',$order->getOrderID())?>" title="<?=t("Order Details / Invoice")?>"><i class="fa fa-file-text-o"></i><span class="display-xs-none"> &nbsp; <?=t("Order Details / Invoice")?></span> </a>
										<?php if($order->getOrderPaid() <> 1) { ?>
											<a class="btn btn-primary" href="<?=View::url('/payment/order/',$order->getOrderID())?>" title="<?=t("Pay")?>"><i class="fa fa-fw fa-credit-card"></i><span class="display-xs-none"> &nbsp; <?=t("Pay")?></span> </a>
										<?php } ?>
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6 col-md-3">
									<span class="title"><?=t("Order Date")?> :</span><br>
									<?=$dh->formatDateTime($order->getOrderDate())?><br><br>
								</div>
								<div class="col-sm-6 col-md-3">
									<span class="title"><?=t("Customer Name")?> :</span><br>
									<?=$dataAddress['baFirstName']." ".$dataAddress['baLastName']?><br><br>
								</div>
								<div class="col-sm-6 col-md-3">
									<span class="title"><?=t("Tracking Number")?> :</span><br>
									<?=t("--Tracking Number--")?><br><br>
								</div>
								<div class="col-sm-6 col-md-3">
									<span class="title"><?=t("Total")?> :</span><br>
									<?=Price::format($order->getTotal())?><br><br>
								</div>
							</div>
						</div>
						<?php } ?>
						
					</div>
					
					<div class="text-center">
						<?php if ($paginator->getTotalPages() > 1) { ?>
							<?= $pagination ?>
						<?php } ?>
					</div>
					
				<?php }else{ ?>
					<center><?php echo t('You have no open orders')?></center>
				<?php } ?>
			
			<?php } ?>
			
		</div>
	</div>
</div>