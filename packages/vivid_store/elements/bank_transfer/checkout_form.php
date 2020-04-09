<?php  defined('C5_EXECUTE') or die(_("Access Denied."));
extract($vars);
?>

<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			<label for="lblPaidDate"><?php echo t("Payment Date")?></label>
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				<input name="txtPaidDate" id="datemask" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
			</div>
		</div>
		<div class="bootstrap-timepicker">
			<div class="form-group">
				<label for="lblPaidTime"><?php echo t("Payment Time")?></label>
				<div class="input-group">
					<div class="input-group-addon">
					  <i class="fa fa-clock-o"></i>
					</div>
					<input name="txtPaidTime" type="text" class="form-control timepicker" required="true" >
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="lblPaidTotal"><?php echo t("Amount")?></label>
			<div class="input-group">
				<div class="input-group-addon">
				  <?php echo Config::get('vividstore.symbol') ?>
				</div>
				<input name="txtPaidTotal" id="txtPaidTotal" type="text" class="form-control money">
			</div>
		</div>
		<div class="form-group">
			<label for="lblPaidRefund"><?php echo t("Refund")?></label>
			<div class="input-group">
				<div class="input-group-addon">
				  <?php echo Config::get('vividstore.symbol') ?>
				</div>
				<input name="txtPaidRefund" id="txtPaidRefund" type="text" class="form-control money" readonly>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="lblTransactionRef"><?php echo t("Transaction Reference")?></label>
			<textarea name="transactionReference" class="form-control" rows="3"></textarea>
		</div>
	</div>
</div>
