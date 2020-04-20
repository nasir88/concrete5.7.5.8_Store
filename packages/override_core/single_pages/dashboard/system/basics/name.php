<?php defined('C5_EXECUTE') or die("Access Denied.");?>
<form method="post" action="<?php echo $view->action('update_sitename')?>">
	<?php echo $this->controller->token->output('update_sitename')?>
	
	<div class="row">
		<div class="col-md-10">
			<div class="form-input">  
				<?php echo $form->text('SITE', $site, array('class' => 'width80 mobile-width'))?>
			</div>
		</div>
		<div class="col-md-2">
			<button class="pull-right btn btn-primary" type="submit" ><i class="fa fa-save"></i> &nbsp; <?php echo t('Save')?></button>
		</div>
	</div>
	
</form>