<?php
//Add By Nasir
//namespace Concrete\Package\VividStore\Controller\SinglePage\Dashboard\Store;
namespace Application\Controller\SinglePage\Dashboard\Store;

use \Concrete\Core\Page\Controller\DashboardPageController;

//Add By Nasir
use \Application\Controller\MyControllers\MyTheme as URLTheme;

class Reports extends DashboardPageController
{

    public function view()
    {
		//Add By Nasir
		$URLTheme = new URLTheme();
		$myURLTheme = $URLTheme->myURLTheme();
        $this->redirect('/'.$myURLTheme.'/store/reports/sales');
    }
    
}
