<?php defined('C5_EXECUTE') or die("Access Denied.");?>
<form method="post" action="<?php echo $view->action('update_sitename')?>">
	<?php echo $this->controller->token->output('update_sitename')?>
	
	<div class="row">
	
		<div id="NSR_Form" class="col-nsr-100 padLeftRight15">	
		
			<div class="form-label">
				<label style="min-width:73px">
					<?php echo t('Site Name')?>
				</label>
				<label style="text-align:center; min-width:20px">:</label>
			</div>
			
			<div class="form-input">  
				<?php echo $form->text('SITE', $site, array('class' => 'width80 mobile-width'))?>
			</div>

		</div>

	</div>
	
	<div class="ccm-dashboard-form-actions-wrapper">
	<div class="ccm-dashboard-form-actions">
		<button class="pull-right btn btn-primary" type="submit" ><?php echo t('Save')?></button>
	</div>
	</div>
</form>