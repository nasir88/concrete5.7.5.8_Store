<?php
//Add By Nasir
//namespace Concrete\Controller\SinglePage\Account;
namespace Application\Controller\SinglePage\Account;

use \Concrete\Core\Page\Controller\AccountPageController;

//Add By Nasir
use \Application\Controller\MyControllers\MyTheme as URLTheme;

class Address extends AccountPageController {
	
	public function view() {
		//Add By Nasir
		//$URLTheme = new URLTheme();
		//$myURLAccount = $URLTheme->myURLAccount();
		//$this->redirect('/'.$myURLAccount.'/messages/inbox');

	}

}