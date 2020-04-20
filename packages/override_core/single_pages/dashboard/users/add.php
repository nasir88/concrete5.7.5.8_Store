<?php 
defined('C5_EXECUTE') or die("Access Denied.");
$ih = Loader::helper('concrete/ui'); 
$u = new User();
?>

    <form method="post" action="<?php echo $view->action('submit')?>">
		
			<div class="row">
			
				<div id="NSR_Form" class="col-nsr-100 padLeftRight15">	
				
					<div class="form-label">
						<label style="min-width:110px">
							<?php echo t('Username')?>
						</label>
						<label style="text-align:center; min-width:20px">:</label>
					</div>
					
					<div class="form-input">  
						<?php echo $form->text('uName', array('class' => 'width80 mobile-width'))?>
					</div>

				</div>
			
				<div id="NSR_Form" class="col-nsr-100 padLeftRight15">	
				
					<div class="form-label">
						<label style="min-width:110px">
							<?php echo t('Password')?></label>
						</label>
						<label style="text-align:center; min-width:20px">:</label>
					</div>
					
					<div class="form-input">  
						<?php echo $form->password('uPassword', array('class' => 'width80 mobile-width'))?>
					</div>

				</div>
			
				<div id="NSR_Form" class="col-nsr-100 padLeftRight15">	
				
					<div class="form-label">
						<label style="min-width:110px">
							<?php echo t('Email Address')?></label>
						</label>
						<label style="text-align:center; min-width:20px">:</label>
					</div>
					
					<div class="form-input">  
						<?php echo $form->email('uEmail', array('class' => 'width80 mobile-width'))?>
					</div>

				</div>
		
				<?php 
				if ($u->isSuperUser()) { 
					if (count($locales)) { // "> 1" because en_US is always available ?>
					
					<div id="NSR_Form" class="col-nsr-100 padLeftRight15">	
					
						<div class="form-label">
							<label style="min-width:110px">
								<?php echo t('Language')?></label>
							</label>
							<label style="text-align:center; min-width:20px">:</label>
						</div>
						
						<div class="form-input">  
							<?php print $form->select('uDefaultLanguage', $locales, Localization::activeLocale(), array('class' => 'width80 mobile-width')); ?>
						</div>

					</div>

				<?php }
				} ?>

			</div>

	   	<?php if (count($attribs) > 0) { ?>

	   		<fieldset>
	   			<legend><?php echo t('Registration Data')?></legend>

				<?php foreach($attribs as $ak) {
					if (in_array($ak->getAttributeKeyID(), $assignment->getAttributesAllowedArray())) {
					?>
					<div class="row">
	                	<div class="form-group">
	                    	<label class="control-label col-sm-3"><?php echo $ak->getAttributeKeyDisplayName()?></label>
	                    	<div class="col-sm-7">
		                        <?php $ak->render('form', null, false)?>
		                    </div>
		                </div>
		            </div>
	                <?php } ?>
	            <?php } ?>


	   		</fieldset>

		<?php } ?>


		<br>
		<fieldset>
			<legend><?php echo t('Groups')?></legend>
			<?php foreach ($gArray as $g) {
				$gp = new Permissions($g);
				if ($gp->canAssignGroup()) {
				?>
				<div class="row">
					<div id="NSR_Form" class="col-nsr-100 padLeftRight15">	
							<input type="checkbox" name="gID[]" value="<?php echo $g->getGroupID()?>" <?php if (isset($_POST['gID']) && is_array($_POST['gID']) && in_array($g->getGroupID(), $_POST['gID'])) { ?> checked <?php } ?>>
							<?php echo $g->getGroupDisplayName()?>
					</div>
				</div>
	        <?php }

	       } ?>
        </fieldset>
		<br>
		
		<?php echo $token->output('submit');?>

		<div class="ccm-dashboard-form-actions-wrapper">
			<div class="ccm-dashboard-form-actions">
				<a href="<?php echo View::url('/'.$_SESSION['myURLTheme'].'/users/search')?>" class="btn btn-default pull-left"><i class="fa fa-ban"></i> &nbsp;  <?php echo t('Cancel')?></a>
				<?php //echo Loader::helper("form")->submit('add',  t('Add'), array('class' => 'btn btn-primary pull-right'))?>
                <button class="pull-right btn btn-primary" type="submit" ><i class="fa fa-save"></i> &nbsp; <?php echo t('Save')?></button>
			</div>
		</div>
		
    </form>
