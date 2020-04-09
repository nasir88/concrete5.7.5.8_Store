<?php
//Add By Nasir
//namespace Concrete\Controller\SinglePage\Dashboard\System\Basics;
namespace Application\Controller\SinglePage\Dashboard\System\Basics;

use \Concrete\Core\Page\Controller\DashboardPageController;
use Config;
use Loader;

//Add By Nasir
use Exception;
use \Application\Controller\MyControllers\MyTheme as URLTheme;

class Name extends DashboardPageController {

	public function view() {
		$this->set('site', h(Config::get('concrete.site')));
	}

	public function sitename_saved() {
		$this->set('message', t("Your site's name has been saved."));
		$this->view();
	}

	public function update_sitename() {
		if ($this->token->validate("update_sitename")) {
			if ($this->isPost()) {
				Config::save('concrete.site', $this->post('SITE'));
				//Add By Nasir
				$URLTheme = new URLTheme();
				$myURLTheme = $URLTheme->myURLTheme();
				$myURLThemeAdminLte = $URLTheme->myURLThemeAdminLte();
				if($myURLTheme === $myURLThemeAdminLte) {
					$this->redirect('/'.$myURLTheme.'/system/name','sitename_saved');
				}else{
					$this->redirect('/'.$myURLTheme.'/system/basics/name','sitename_saved');
				}
			}
		} else {
			$this->set('error', array($this->token->getErrorMessage()));
		}
	}


}
