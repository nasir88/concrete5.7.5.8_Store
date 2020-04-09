<?php
//Add By Nasir
//namespace Concrete\Package\VividStore\Controller\SinglePage\Dashboard;
namespace Application\Controller\SinglePage\Dashboard;

use \Concrete\Core\Page\Controller\DashboardPageController;

//Add By Nasir
use \Application\Controller\MyControllers\MyTheme as URLTheme;

class store extends DashboardPageController
{
    public function view()
    {
		//Add By Nasir
		$URLTheme = new URLTheme();
		$myURLTheme = $URLTheme->myURLTheme();
        $this->redirect('/'.$myURLTheme.'/store/orders');
    }
}
