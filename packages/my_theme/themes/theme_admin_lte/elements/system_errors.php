<?php
$_error = array();
if (isset($error)) {
    if ($error instanceof Exception) {
        $_error[] = $error->getMessage();
    } elseif ($error instanceof \Concrete\Core\Error\Error) {
        if ($error->has()) {
            $_error = $error->getList();
        }
    } else {
        $_error = $error;
    }
}
if (!empty($_error)) {
    ?>
	<div class="ccm-ui"  id="ccm-dashboard-result-message">
		<?php View::element('system_errors', array('format' => 'block', 'error' => $_error)); ?>
	</div>
	<?php
}
?>

<?php
if (isset($message)) {
    ?>
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
			<?php echo nl2br(h($message))?>
		</div>
		
	<?php
} elseif (isset($success)) {
    ?>
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
			<?php echo nl2br(h($success))?>
		</div>
		
	<?php 
}
?>