<?php  
namespace Concrete\Package\VividStore\Src\VividStore\Utilities;

use Controller;
use View;
use Exception;
use Loader;
use Core;
use Illuminate\Filesystem\Filesystem;
use \Concrete\Package\VividStore\Src\VividStore\Order\Order as StoreOrder;
use \Concrete\Package\VividStore\Src\VividStore\Order\OrderStatus\OrderStatus as StoreOrderStatus;

class OrderSlip extends Controller
{
    public function renderOrderPrintSlip($oID)
    {
        $order = StoreOrder::getByID($oID);
		
		$date = Loader::helper("date");
		$getOrderDate = $date->dateTimeFormatLocal($order->getOrderDate(),$mask = 'Y-m-d');
		$getOrderPaidDate = $date->dateTimeFormatLocal($order->getOrderPaidDate(),$mask = 'Y-m-d');
		$getOrderPaidTime = $date->dateTimeFormatLocal($order->getOrderPaidDate(),$mask = 'H:i');
		
        $this->requireAsset('javascript', 'vividStoreFunctions');

        if (Filesystem::exists(DIR_BASE."/application/elements/order_slip.php")) {
            View::element("order_slip", array('order'=>$order,'orderStatuses'=>StoreOrderStatus::getList(),'getOrderDate'=>$getOrderDate,'getOrderPaidDate'=>$getOrderPaidDate,'getOrderPaidTime'=>$getOrderPaidTime));
        } else {
            View::element("order_slip", array('order'=>$order,'orderStatuses'=>StoreOrderStatus::getList(),'getOrderDate'=>$getOrderDate,'getOrderPaidDate'=>$getOrderPaidDate,'getOrderPaidTime'=>$getOrderPaidTime), "vivid_store");
        }
    }
}
