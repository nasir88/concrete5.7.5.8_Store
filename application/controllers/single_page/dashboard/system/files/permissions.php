<?php
//Add By Nasir
//namespace Concrete\Controller\SinglePage\Dashboard\System\Files;
namespace Application\Controller\SinglePage\Dashboard\System\Files;

use \Concrete\Core\Page\Controller\DashboardPageController;
use Config;
use Loader;
use PermissionKey;
use TaskPermission;
use PermissionAccess;
use FileSet;

//Add By Nasir
use Exception;
use \Application\Controller\MyControllers\MyTheme as URLTheme;

class Permissions extends DashboardPageController {
	
	public function save() {
		if (Loader::helper('validation/token')->validate('save_permissions')) {
			$fs = FileSet::getGlobal();
			$tp = new TaskPermission();
			if ($tp->canAccessTaskPermissions()) {
				$permissions = PermissionKey::getList('file_set');
				foreach($permissions as $pk) {
					$pk->setPermissionObject($fs);
					$paID = $_POST['pkID'][$pk->getPermissionKeyID()];
					$pt = $pk->getPermissionAssignmentObject();
					$pt->clearPermissionAssignment();
					if ($paID > 0) {
						$pa = PermissionAccess::getByID($paID, $pk);
						if (is_object($pa)) {
							$pt->assignPermissionAccess($pa);
						}			
					}		
				}
				$this->set('success', t('Permissions updated successfully.'));
			}
			
		} else {
			$this->error->add(Loader::helper("validation/token")->getErrorMessage());
		}
		
	}

}