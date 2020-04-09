<?php defined('C5_EXECUTE') or die('Access denied.'); ?>

<div class="forgotPassword">
	<form method="post" action="<?php echo URL::to('/login', 'callback', $authType->getAuthenticationTypeHandle(), 'forgot_password') ?>">
		
		<h4><?php echo t('Forgot Your Password?') ?></h4>
		
		<div class="ccm-message"><?php echo isset($intro_msg) ? $intro_msg : '' ?></div>
			<div class='help-block'>
				<?php echo t('Enter your email address below. We will send you instructions to reset your password.') ?>
			</div>
		</div>
		
		<div class="form-group">
			<input name="uEmail" type="email" placeholder="<?php echo t('Email Address') ?>" class="form-control" />
		</div>
		
		
		<div class="form-group">
			<button name="resetPassword" class="btn btn-primary" style="width:100%!important;"><?php echo t('Reset and Email Password') ?></button>
		</div>
		
		<div class="form-group">
			<center>
				<a href="<?php echo \URL::to('/login') ?>" class="btn"><?php echo t('Go Back') ?></a>
			</center>
		</div>
		
	</form>
</div>
