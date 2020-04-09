<?php 
namespace Concrete\Package\VividStore\Controller\SinglePage;

use PageController;
use View;

class MyCoupons extends PageController
{
    public function view()
    {

	
        
        $this->requireAsset('javascript', 'jquery');
        $js = \Concrete\Package\VividStore\Controller::returnHeaderJS();
        $this->addFooterItem($js);
        $this->requireAsset('javascript', 'vivid-store');
        $this->requireAsset('css', 'vivid-store');
    }
}
