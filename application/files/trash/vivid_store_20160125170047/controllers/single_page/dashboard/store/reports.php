<?php

namespace Concrete\Package\VividStore\Controller\SinglePage\Dashboard\Store;

use \Concrete\Core\Page\Controller\DashboardPageController;

class Reports extends DashboardPageController
{

    public function view()
    {
        $this->redirect('/dashboard/store/reports/sales');
    }
    
}
