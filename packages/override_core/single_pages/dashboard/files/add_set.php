<?php 
defined('C5_EXECUTE') or die("Access Denied.");
$ih = Loader::helper('concrete/ui'); 
?>

    <form method="post" id="file-sets-add" action="<?php echo $view->url('/'.$_SESSION['myURLTheme'].'/files/add_set', 'do_add')?>">
	<div class="ccm-pane-body">
    	
		<?php echo $validation_token->output('file_sets_add');?>
		
		<div class="row">
			<div class="col-nsr-100 padLeftRight15">
				<div id="NSR_Form"">	

					<div class="form-label">
						<label style="min-width:35px">
							<?php echo Loader::helper("form")->label('file_set_name', t('Name'))?>
						</label>
						<label style="text-align:center; min-width:20px">:</label>
					</div>
					
					<div class="form-input">  
						<?php echo $form->text('file_set_name','', array('class' => 'width50 mobile-width'))?>
					</div>

				</div>
			</div>
		</div>
		
	</div>
	<br>
	<div class="ccm-dashboard-form-actions-wrapper">
		<div class="ccm-dashboard-form-actions">
			<a href="<?php echo View::url('/'.$_SESSION['myURLTheme'].'/files/sets')?>" class="btn btn-default pull-left"><i class="fa fa-ban"></i> &nbsp; <?php echo t('Cancel')?></a>
			<?php //echo Loader::helper("form")->submit('add', t('Add'), array('class' => 'btn btn-primary pull-left'))?>
			<button type="submit" class="btn btn-primary pull-right" tabindex="-1"><i class="fa fa-save"></i> &nbsp; <?php echo t('Save')?></button>
		</div>
	</div>
    </form>
