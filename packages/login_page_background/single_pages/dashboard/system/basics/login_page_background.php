<?php  defined('C5_EXECUTE') or die('Access Denied.'); ?>

<form method="post" id="site-form" action="<?php  echo $this->action('save_settings'); ?>"  enctype="multipart/form-data">

    <?php  echo $this->controller->token->output('save_settings'); ?>

	<div class="help-block"><?php echo t('The selected image will be stretched to fill the width and height of the login page. For best results select an image that is at least 1200px by 789px. Clearing the selected image will restore the default background image.')?></div>

	<div id="NSR_Form" class="col-md-12 pad0">	
	
		<div class="form-label">
			<label style="min-width:105px">
				<?php  echo $form->label('background_image', t('Background Image')); ?>
			</label>
			<label style="text-align:center; min-width:20px">:</label>
		</div>
		
		<div class="form-input">  
			<?php  $al = Core::make('helper/concrete/asset_library'); ?>
			<?php  echo $al->image('background_image', 'background_image', 'Select Background Image', $imageObject); ?>
		</div>

	</div>
	
    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
            <button class="pull-right btn btn-primary" type="submit"><i class="fa fa-save"></i> &nbsp; <?php  echo t('Save')?></button>
        </div>
    </div>

</form>
