<?php
//Add By Nasir
//namespace Concrete\Controller\SinglePage\Dashboard\Users;
namespace Application\Controller\SinglePage\Dashboard\Users;

use \Concrete\Core\Page\Controller\DashboardPageController;
use \Concrete\Controller\Search\Groups as SearchGroupsController;
use Permissions;
use Group;
use Page;
use User;
use Loader;
use \Concrete\Core\Tree\Type\Group as GroupTree;

//Add By Nasir
use Exception;
use \Application\Controller\MyControllers\MyTheme as URLTheme;

class Groups extends DashboardPageController {

	public function view() { 
		$tree = GroupTree::get();
		$this->set('tree', $tree);
		$this->requireAsset('core/groups');

		$cnt = new SearchGroupsController();
		$cnt->search();
		$this->set('searchController', $cnt);
		
		//Add By Nasir
		$URLTheme = new URLTheme();
		$myURLTheme = $URLTheme->myURLTheme();
		$c = Page::getByPath('/'.$myURLTheme.'/users/add_group');
		
		$cp = new Permissions($c);
		$this->set('canAddGroup', $cp->canViewPage());
	}	

	public function edit($gID = false) {
		$g = Group::getByID(intval($gID));
		$gp = new Permissions($g);
        if (!is_object($g)) {
            throw new \Exception(t('Invalid group.'));
        }
		if (!$gp->canEditGroup()) {
			throw new \Exception(t('You do not have access to edit this group.'));
		}
		if (is_object($g)) { 		
			$this->set('group', $g);
		}		
	}

	public function bulk_update_complete() {
		$this->set('success', t('Groups moved successfully.'));
		$this->view();
	}

	public function update_group() {
		$g = Group::getByID(intval($_REQUEST['gID']));
		if (is_object($g)) {
			$this->set('group', $g);
		}
		$gp = new Permissions($g);
		if (!$gp->canEditGroup()) {
			$this->error->add(t('You do not have access to edit this group.'));
		}

		$txt = Loader::helper('text');
		$valt = Loader::helper('validation/token');
		$gName = $txt->sanitize($_POST['gName']);
		$gDescription = $_POST['gDescription'];
		
		if (!$gName) {
			$this->error->add(t("Name required."));
		}
		
		if (!$valt->validate('add_or_update_group')) {
			$this->error->add($valt->getErrorMessage());
		}
		
		if ($_POST['gIsBadge']) {
			if (!$this->post('gBadgeDescription')) {
				$this->error->add(t('You must specify a description for this badge. It will be displayed publicly.'));
			}
		}
		
		if (!$this->error->has()) {
			$g->update($gName, $_POST['gDescription']);
			
			//Add By Nasir
			$URLTheme = new URLTheme();
			$myURLTheme = $URLTheme->myURLTheme();
			$cntp = Page::getByPath('/'.$myURLTheme.'/users/add_group');
			
			$cnta = $cntp->getController();
			$cnta->checkExpirationOptions($g);
			$cnta->checkBadgeOptions($g);
			$cnta->checkAutomationOptions($g);
			
			//Add By Nasir
			$this->redirect('/'.$myURLTheme.'/users/groups', 'group_updated');
		}
	}
	
	public function group_added() {
		$this->set('message', t('Group added successfully'));
		$this->view();
	}
	
	public function group_updated() {
		$this->set('message', t('Group update successfully'));
		$this->view();
	}
	
	public function delete($delGroupId, $token = ''){

		$u=new User();
		try {
		
			//if(!$u->isSuperUser()) {
				//throw new Exception(t('You do not have permission to perform this action.'));
			//}
			
			$group = Group::getByID($delGroupId);			

			$num = $group->getGroupMembersNum();
			if($num > 0) {
				throw new Exception(t('To delete a group that you created, remove all the users for this group.'));
			}	
			
			if(!($group instanceof Group)) {
				throw new Exception(t('Invalid group ID.'));
			}
			
			$valt = Loader::helper('validation/token');
			if (!$valt->validate('delete_group_' . $delGroupId, $token)) {
				throw new Exception($valt->getErrorMessage());
			}
			
			$group->delete(); 
			$resultMsg=t('Group deleted successfully.');		
			$this->set('message', $resultMsg);
		} catch(Exception $e) {
			$this->error->add($e);
		}
		$this->view(); 
	}	
}

?>