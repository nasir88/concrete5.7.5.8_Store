<?php defined('C5_EXECUTE') or die("Access Denied.");

$token = \Core::make('Concrete\Core\Validation\CSRF\Token');

use Concrete\Core\Attribute\Key\Key;
use Concrete\Core\Http\ResponseAssetGroup;

$r = ResponseAssetGroup::get();
$r->requireAsset('javascript', 'backstretch');
$r->requireAsset('javascript', 'underscore');
$r->requireAsset('javascript', 'core/events');
?>

<style type="text/css">

	.form-control, .btn {
		border-radius: 0px!important;
		margin-bottom: 15px!important;
	}
	
</style>

<div class="login-page">
	 <div class="controls col-sm-4 col-sm-offset-4">

<?php
$attribs = UserAttributeKey::getRegistrationList();

if($registerSuccess) { ?>
<div class="row">
<?php	switch($registerSuccess) {
		case "registered":
			?>
			<p><strong><?php echo $successMsg ?></strong><br/><br/>
			<a href="<?php echo $view->url('/')?>"><?php echo t('Return to Home')?></a></p>
			<?php
		break;
		case "validate":
			?>
			<p><?php echo $successMsg[0] ?></p>
			<p><?php echo $successMsg[1] ?></p>
			<p><a href="<?php echo $view->url('/')?>"><?php echo t('Return to Home')?></a></p>
			<?php
		break;
		case "pending":
			?>
			<p><?php echo $successMsg ?></p>
			<p><a href="<?php echo $view->url('/')?>"><?php echo t('Return to Home')?></a></p>
            <?php
		break;
	} ?>
</div>
<?php
} else { ?>
	<form method="post" action="<?php echo $view->url('/register', 'do_register')?>" class="form-stacked">
		<?php $token->output('register.do_register') ?>
		<div class="row">
				<fieldset>
					<?php
					if ($displayUserName) {
						?>
						<div class="form-group">
							<input name="uName" class="form-control col-sm-12" placeholder="<?php echo t('Username')?>" autofocus="autofocus" />
						</div>
						<?php
					}
					?>
                    <div class="form-group">
						<input name="uEmail" class="form-control col-sm-12" placeholder="<?php echo t('Email Address')?>" autofocus="autofocus" />
                    </div>
                    <div class="form-group">
						<input name="uPassword" class="form-control col-sm-12" placeholder="<?php echo t('Password')?>" autocomplete="off" />
					</div>
                    <div class="form-group">
						<input name="uPasswordConfirm" class="form-control col-sm-12" placeholder="<?php echo t('Confirm Password')?>" autocomplete="off" />
					</div>

				</fieldset>
		</div>
		<?php
		if (count($attribs) > 0) {
			?>
			<div class="row">
					<fieldset>
						<legend><?php echo t('Options')?></legend>
						<?php
						$af = Loader::helper('form/attribute');
						foreach($attribs as $ak) {
							echo $af->display($ak, $ak->isAttributeKeyRequiredOnRegister());
						}
						?>
					</fieldset>
			</div>
			<?php
		}
		if (Config::get('concrete.user.registration.captcha')) {
			?>
			<div class="row">
				
					<div class="form-group">
						<div style="font-size:12px">
							<?php
							$captcha = Loader::helper('validation/captcha');
							echo $captcha->label();
							?>
						</div>
							<?php
							$captcha->showInput();
							?>
						<div style="margin-top:-20px">
							<?php
							$captcha->display();
							?>
						</div>
					</div>
					
			</div>

		<?php } ?>
		<div class="row">
			<center>
				<?php echo $form->hidden('rcID', $rcID); ?>
				<?php echo $form->submit('register', t('Register'), array('class' => 'btn btn-primary'))?>
			</center>
		</div>
		<div class="row">
			<center>
				- <a href="<?php echo URL::to('/login')?>" style="color: #9b9b9b; font-size:12px; font-weight:bold;"><?php echo t('I already have a membership') ?></a> - 
				<br>
				- <a href="<?php echo DIR_REL; ?>" style="color: #9b9b9b; font-size:12px; font-weight:bold;"><?php echo t('Back To Home') ?></a> - 
			</center>
		</div>
	</form>

	<?php
}
?>


	</div>
</div>
