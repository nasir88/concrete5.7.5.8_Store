<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<?php
		$u = new user();
		$g = Group::getByName('Administrators');
		if ($u->inGroup($g)||$u->isSuperUser()) {
?>

	<div style="width: 100%; padding: 5px; font-weight: bold; border: 3px dotted #28ABE3; font-weight: bold;"> Section Page : <?php  echo $cSectionLanding; ?></span></div>

<?php } else {  ?>

	<span id="<?php  echo str_replace(' ', '', $cSectionLanding); ?>"></span>
	
<?php }  ?>