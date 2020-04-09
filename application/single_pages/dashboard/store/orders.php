<?php
defined('C5_EXECUTE') or die("Access Denied.");
$dh = Core::make('helper/date');
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as Price;
use \Concrete\Package\VividStore\Src\Attribute\Key\StoreOrderKey as StoreOrderKey;
use \Concrete\Package\VividStore\Src\VividStore\Address\AddressModal as AddressModal;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\OrderSlip AS OrderSlip;
use \Concrete\Package\MyTheme\Src\MyThemesSRC as ThemeSRC;

//Loader Tools MyTheme
$ToolsSitePath = ThemeSRC::PackagePathTools();
?>

<?php if ($controller->getTask() == 'order'){ ?>

	<section class="invoice">

		<!-- title row -->
		<div class="row">
		  <div class="col-xs-12">
			<h2 class="page-header" style="padding-bottom:20px!important;">
			  <?=t("Order Status History")?>
				<a id="btn-delete-order" href="<?=View::url("/".$_SESSION['myURLTheme']."/store/orders/remove", $order->getOrderID())?>" class="btn btn-danger pull-right mobile-width">
					<i class="fa fa-fw fa-trash"></i> <?=t("Delete Order")?>
				</a>
			</h2>
		  </div><!-- /.col -->
		</div>

		<div class="row">
			<div class="col-sm-12 table-responsive">
				<table class="table table-striped">
					<thead>
					<tr>
						<th><strong><?=t("Status")?></strong></th>
						<th><?=t("Date")?></th>
						<th><?=t("User")?></th>
					</tr>
					</thead>
					<tbody>
					<?php
					$history = $order->getStatusHistory();
					if($history){
						foreach($history as $status){
							?>
							<tr>
								<td><?=$status->getOrderStatusName()?></td>
								<td><?=$status->getDate()?></td>
								<td><?=$status->getUserName()?></td>
							</tr>
						<?php
						}
					}
					?>
					</tbody>
				</table>
			</div>
		</div>

		<h2 class="page-header" style="padding-bottom:20px!important;">
			<?=t("Manage Order")?>
		</h2>
		<div class="row">
			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><?=t("Update Status")?></h4>
					</div>
					<div class="panel-body">

						<form action="<?=View::url("/".$_SESSION['myURLTheme']."/store/orders/updatestatus",$order->getOrderID())?>" method="post">
							<div class="form-group">
								<?php echo $form->select("orderStatus",$orderStatuses,$order->getStatus());?>
							</div>
							<button class="btn btn-success"><i class="fa fa-save"></i> &nbsp; <?php echo t("Update")?></button>
						</form>

					</div>
				</div>
			</div>
		</div>
		
	</section><!-- /.content -->   

	<br>

	<?php  OrderSlip::renderOrderPrintSlip($oID); ?>

	<hr>
	<div class="form-actions">
		<a href="<?php echo URL::to('/'.$_SESSION['myURLTheme'].'/store/orders')?>" class="btn btn-default" /><?php echo t('Back to Orders')?></a>
		<button id="btnPrint" class="btn btn-success pull-right"><i class="fa fa-print"></i> &nbsp; <?php echo t("Print Invoice")?></button>
	</div>

<?php } else { ?>

<div class="ccm-dashboard-content-full">
    <form role="form" class="form-inline ccm-search-fields">
	
		<div class="row">
			<div class="col-nsr-100 padLeftRight15">
			
				<?php if($statuses){?>
					<ul id="group-filters" class="nav nav-pills store_group_filter">
						<li><a href="<?php echo View::url('/'.$_SESSION['myURLTheme'].'/store/orders/')?>"><?=t('All Statuses')?></a></li>
						<?php foreach($statuses as $status){ ?>
							<li><a href="<?php echo View::url('/'.$_SESSION['myURLTheme'].'/store/orders/', $status->getHandle())?>"><?=$status->getName();?></a></li>
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

	<div class="box-body table-responsive no-padding">
    <table class="ccm-search-results-table">
        <thead>
            <th><a><?=t("Order %s","#")?></a></th>
            <th><a><?=t("Customer Name")?></a></th>
            <th><a><?=t("Order Date")?></a></th>
            <th><a><?=t("Total")?></a></th>
            <th><a><?=t("Status")?></a></th>
            <th><a><?=t("View")?></a></th>
        </thead>
        <tbody>
            <?php
                foreach($orderList as $order){
					$dataAddress = AddressModal::getMyAddressByID($order->getCustomerID());
            ?>
                <tr>
                    <td><a href="<?=View::url('/'.$_SESSION['myURLTheme'].'/store/orders/order/',$order->getOrderID())?>"><?=$order->getOrderID()?></a></td>
                    <td><?=$dataAddress['baFirstName']." ".$dataAddress['baLastName']?></td>
                    <td><?=$dh->formatDateTime($order->getOrderDate())?></td>
					<td><?=Price::format($order->getTotal())?></td>
                    <td><?=ucwords($order->getStatus())?></td>
                    <td><a class="btn btn-primary" href="<?=View::url('/'.$_SESSION['myURLTheme'].'/store/orders/order/',$order->getOrderID())?>"><?=t("View")?></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
	
</div>

<?php if ($paginator->getTotalPages() > 1) { ?>
    <?= $pagination ?>
<?php } ?>

<?php } ?>

<style>
    @media (max-width: 992px) {
        div#ccm-dashboard-content div.ccm-dashboard-content-full {
            margin-left: -20px !important;
            margin-right: -20px !important;
        }
    }
</style>