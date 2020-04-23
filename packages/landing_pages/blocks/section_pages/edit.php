<?php defined('C5_EXECUTE') or die(_("Access Denied."));?>

<div class="form-group">
	<label name="lblSectionLanding"><?php echo t('Select Page :') ?></label>
	<select name="cSectionLanding" class="form-control">
<?php 
	$db = Database::get();
	$r = $db->Execute("SELECT * FROM nsr_landingpages");

	foreach ($r as $k=>$nsr_landingpages) {
?>
		<option value="<?php  echo $nsr_landingpages['cName']; ?>"><?php  echo $nsr_landingpages['cName']; ?></option>
<?php 
	}
?>
	</select>
</div>