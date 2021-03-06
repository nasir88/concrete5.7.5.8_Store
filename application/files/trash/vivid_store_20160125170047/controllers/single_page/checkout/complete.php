<?php
namespace Concrete\Package\VividStore\Controller\SinglePage\Checkout;

use PageController;
use View;


use \Concrete\Package\VividStore\Src\VividStore\Order\Order as StoreOrder;
use \Concrete\Package\VividStore\Src\VividStore\Customer\Customer as StoreCustomer;

defined('C5_EXECUTE') or die(_("Access Denied."));
class Complete extends PageController
{
    public function view()
    {
        $customer = new StoreCustomer();
        $order = StoreOrder::getByID($customer->getLastOrderID());

        if(is_object($order)){
            $this->set("order",$order);
        } else {
            $this->redirect("/cart");
        }
        $this->requireAsset('javascript', 'jquery');
        $js = \Concrete\Package\VividStore\Controller::returnHeaderJS();
        $this->addFooterItem($js);
        $this->requireAsset('javascript', 'vivid-store');
        $this->requireAsset('css', 'vivid-store');
    }
    

}
