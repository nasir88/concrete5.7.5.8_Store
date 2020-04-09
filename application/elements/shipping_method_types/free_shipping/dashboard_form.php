<?php 
defined('C5_EXECUTE') or die("Access Denied.");
extract($vars); ?>


<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <?php  echo $form->label('baseRate', t("Apply shipping rates on (Specific Postcodes)")); ?>
			<div class="input-group">
				<?php  echo $form->number('postalSelected', '', array('id'=>'postalSelected')); ?>
				<span class="input-group-btn">
				  <button id="btnPostalSelected" class="btn btn-success" type="button"><?php echo t('Add') ?></button>
				</span>
			</div>
			
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <?php  echo $form->label('specificPostcodes', t("Specific Postcodes")); ?>
			<?php  echo $form->text('tagsPostcode', $smtm->getPostalSelected(), array('id'=>'tagsPostcode')); ?>
        </div>
    </div>
</div>  

<hr>

<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <?php  echo $form->label('countries', t("Apply shipping rates on Countries")); ?>
            <?php  echo $form->select('countries', array('all'=>t("All Countries"), 'selected'=>t("Certain Countries")), $smtm->getCountries()); ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <?php  echo $form->label('countriesSelected', t("If Certain Countries, which?")); ?>
            <select class="form-control select2" multiple name="countriesSelected[]" data-placeholder="Select a Countries">
                <?php  $selectedCountries = explode(',', $smtm->getCountriesSelected()); ?>
                <?php  foreach ($countryList as $code=>$country) {
    ?>
                    <option value="<?php echo $code?>"<?php  if (in_array($code, $selectedCountries)) {
    echo " selected";
}
    ?>><?php echo $country?></option>
                <?php  
} ?>
            </select>
        </div>
    </div>
</div> 

<hr>

<div class="row" style="display:none">
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <?php  echo $form->label('minimumAmount', t("Minimum Purchase Amount for this rate to apply")); ?>
            <?php  echo $form->text('minimumAmount', $smtm->getMinimumAmount()?$smtm->getMinimumAmount():'0'); ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <?php  echo $form->label('maximumAmount', t("Maximum Purchase Amount for this rate to apply")); ?>
            <?php  echo $form->text('maximumAmount', $smtm->getMaximumAmount()?$smtm->getMaximumAmount():'0'); ?>
            <p class="help-block"><?php echo t("Leave at 0 for no maximum")?></p>
        </div>
    </div>
</div> 
<div class="row" style="display:none">
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <?php  echo $form->label('minimumWeight', t("Minimum Weight Amount for this rate to apply")); ?>
            <div class="input-group">
                <?php  echo $form->text('minimumWeight', $smtm->getMinimumWeight()?$smtm->getMinimumWeight():'0'); ?>
                <div class="input-group-addon"><?php echo Config::get('vividstore.weightUnit')?></div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="form-group">
            <?php  echo $form->label('maximumWeight', t("Maximum Weight Amount for this rate to apply")); ?>
            <div class="input-group">
                <?php  echo $form->text('maximumWeight', $smtm->getMaximumWeight()?$smtm->getMaximumWeight():'0'); ?>
                <div class="input-group-addon"><?php echo Config::get('vividstore.weightUnit')?></div>
            </div>
            <p class="help-block"><?php echo t("Leave at 0 for no maximum")?></p>
        </div>
    </div>
</div> 

<script type="text/javascript">

	//AppendPostal
    $("#btnPostalSelected").click(function(){
		var val = $('#postalSelected').val();
		$('#tagsPostcode').tagsinput('add', val);
        $('#postalSelected').val('');
    });
	
	//TagsInput
	$('#tagsPostcode').tagsinput({
		freeInput: true,
		confirmKeys: [13, 44],
		maxChars: 0
	});
      
</script>