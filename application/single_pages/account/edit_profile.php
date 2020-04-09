<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<script type="text/javascript">
$(function() {
	$('i.icon-question-sign').parent().tooltip();
});
</script>

<div class="row">
    <div class="col-lg-12">
		<div class="wrapper-content">

			<h1 class="page-header"><?php echo t('Edit Profile')?></h1>

			<form method="post" action="<?php echo $view->action('save')?>" enctype="multipart/form-data">
			<?php  $attribs = UserAttributeKey::getEditableInProfileList();
			$valt->output('profile_edit');
			?>
						
				<div class="col-md-6">
					<fieldset>
					<legend><?php echo t('Basic Information')?></legend>
					<div class="form-group">
						<?php echo $form->label('uName', t('Username'))?>
						<?php echo $form->text('uName',$profile->getUserDisplayName())?>
					</div>
					<div class="form-group">
						<?php echo $form->label('uEmail', t('Email'))?>
						<?php echo $form->text('uEmail',$profile->getUserEmail())?>
					</div>
					<?php  if (Config::get('concrete.misc.user_timezones')) { ?>
						<div class="form-group">
							<?php echo  $form->label('uTimezone', t('Time Zone'))?>
							<?php echo  $form->select('uTimezone',
								Core::make('helper/date')->getTimezones(),
								($profile->getUserTimezone()?$profile->getUserTimezone():date_default_timezone_get())
						); ?>
						</div>
					<?php  } ?>
					</fieldset>
					
					<?php
					$ats = AuthenticationType::getList(true, true);

					$ats = array_filter($ats, function(AuthenticationType $type) {
						return $type->hasHook();
					});

					$count = count($ats);
					if ($count) {
						?>
						<fieldset>
							<legend><?php echo t('Authentication Types')?></legend>
							<?php
							foreach ($ats as $at) {
								$at->renderHook();
							}
							?>
						</fieldset>
						<?php
					}
					?>
				
				</div>
				
				<div class="col-md-6">
				
					<fieldset>
						<legend><?php echo t('Change Password')?></legend>
						<div class="form-group">
							<?php echo $form->label('uPasswordNew', t('New Password'))?>
							<?php echo $form->password('uPasswordNew',array('autocomplete' => 'off'))?>
							<a href="javascript:void(0)" title="<?php echo t("Leave blank to keep current password.")?>"><i class="icon-question-sign"></i></a>
						</div>

						<div class="form-group">
							<?php echo $form->label('uPasswordNewConfirm', t('Confirm New Password'))?>
							<div class="controls">
								<?php echo $form->password('uPasswordNewConfirm',array('autocomplete' => 'off'))?>
							</div>
						</div>

					</fieldset>
				
				</div>
				<div class="col-md-12">
				<hr>
					<div class="form-actions">
						<a href="<?php echo URL::to('/account')?>" class="btn btn-default" /><?php echo t('Back to Account')?></a>
						<input type="submit" name="save" value="<?php echo t('Save')?>" class="btn btn-primary pull-right" />
					</div>
				</div>

			</form>

		</div>
	</div>
</div>
