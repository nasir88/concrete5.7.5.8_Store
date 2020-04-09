<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php $cat = PermissionKeyCategory::getByHandle('page');?>

<table class="ccm-permission-grid table table-striped">
    <?php
    $permissions = PermissionKey::getList('page');
    foreach($permissions as $pk) {
        $pk->setPermissionObject($page);
        ?>
		
		
		<?php
			//Administrator
			$u = new User();
			if($u->isSuperUser() == false){
		
				//4 = Preview Page As User
				//5 = Edit Properties
				//7 = Edit Speed Settings
				//8 = Change Theme
				//10 = Edit Page Type
				//18 = Edit Multilingual Settings
				if ($pk->getPermissionKeyID() != '4' && $pk->getPermissionKeyID() != '5' && $pk->getPermissionKeyID() != '7' && $pk->getPermissionKeyID() != '8' && $pk->getPermissionKeyID() != '10' && $pk->getPermissionKeyID() != '18') {
		?>
        <tr>
            <td class="ccm-permission-grid-name" id="ccm-permission-grid-name-<?php echo $pk->getPermissionKeyID()?>"><strong><?php if ($editPermissions) { ?><a dialog-title="<?php echo $pk->getPermissionKeyDisplayName()?>" data-pkID="<?php echo $pk->getPermissionKeyID()?>" data-paID="<?php echo $pk->getPermissionAccessID()?>" onclick="ccm_PagePermissionLaunchDialog(this)" href="javascript:void(0)"><?php } ?><?php echo $pk->getPermissionKeyDisplayName()?><?php if ($editPermissions) { ?></a><?php } ?></strong></td>
            <td id="ccm-permission-grid-cell-<?php echo $pk->getPermissionKeyID()?>" <?php if ($editPermissions) { ?>class="ccm-permission-grid-cell"<?php } ?>><?php echo Loader::element('permission/labels', array('pk' => $pk))?></td>
		</tr>
		<?php 	} 
			}
		?>
		
		<?php
			//SuperUser
			if($u->isSuperUser() == true){
		?>
        <tr>
            <td class="ccm-permission-grid-name" id="ccm-permission-grid-name-<?php echo $pk->getPermissionKeyID()?>"><strong><?php if ($editPermissions) { ?><a dialog-title="<?php echo $pk->getPermissionKeyDisplayName()?>" data-pkID="<?php echo $pk->getPermissionKeyID()?>" data-paID="<?php echo $pk->getPermissionAccessID()?>" onclick="ccm_PagePermissionLaunchDialog(this)" href="javascript:void(0)"><?php } ?><?php echo $pk->getPermissionKeyDisplayName()?><?php if ($editPermissions) { ?></a><?php } ?></strong></td>
            <td id="ccm-permission-grid-cell-<?php echo $pk->getPermissionKeyID()?>" <?php if ($editPermissions) { ?>class="ccm-permission-grid-cell"<?php } ?>><?php echo Loader::element('permission/labels', array('pk' => $pk))?></td>
        </tr>
		<?php } ?>
	
	
    <?php } ?>
    <?php if ($editPermissions) { ?>
        <tr>
            <td class="ccm-permission-grid-name" ></td>
            <td>
                <?php echo Loader::element('permission/clipboard', array('pkCategory' => $cat))?>
            </td>
        </tr>
    <?php } ?>
</table>



	<script type="text/javascript">
        ccm_PagePermissionLaunchDialog = function(link) {
            var dupe = $(link).attr('data-duplicate');
            if (dupe != 1) {
                dupe = 0;
            }
            jQuery.fn.dialog.open({
                title: $(link).attr('dialog-title'),
                href: '<?php echo REL_DIR_FILES_TOOLS_REQUIRED?>/edit_collection_popup?cID=<?php echo $page->getCollectionID()?>&ctask=set_advanced_permissions&duplicate=' + dupe + '&pkID=' + $(link).attr('data-pkID') + '&paID=' + $(link).attr('data-paID'),
                modal: false,
                width: 500,
                height: 380
            });
        }
	</script>
