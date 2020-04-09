<?php 
namespace Concrete\Package\VividStore\Controller\SinglePage\Order;

use PageController;
use Database;
use Core;
use View;
use Session;
use Config;
use Page;
use Exception;
use Illuminate\Filesystem\Filesystem;
use \Concrete\Package\VividStore\Src\VividStore\Order\OrderStatus\OrderStatus as StoreOrderStatus;
use \Concrete\Package\VividStore\Src\VividStore\Order\OrderList as StoreOrderList;
use \Concrete\Package\VividStore\Src\VividStore\Order\Order as StoreOrder;
use \Concrete\Package\VividStore\Src\VividStore\MyOrder\MyOrderList as StoreMyOrderList;

class MyOrders extends PageController
{
    public function view($status = '')
    {
        $this->set('form', Core::make("helper/form"));
		$this->getFooterAssets();
	
		//Display Page Listing MyOrder
        $orderList = new StoreMyOrderList();     
        $orderList->setItemsPerPage(10);
		if ($this->get('keywords')) {
            $orderList->setSearch($this->get('keywords'));
        }
        if ($status) {
            $orderList->setStatus($status);
        }
        $paginator = $orderList->getPagination();
        $pagination = $paginator->renderDefaultView();
        $this->set('orderList',$paginator->getCurrentPageResults());  
        $this->set('pagination',$pagination);
        $this->set('paginator', $paginator);   
		
        $this->set('orderStatuses', StoreOrderStatus::getList());
        $this->set('statuses', StoreOrderStatus::getAll());
    }
    public function order_details($oID)
    {
        $this->set("oID",$oID);
        $order = StoreOrder::getByID($oID);
        $this->set("getOrderPaid",$order->getOrderPaid());
    }
    public function getFooterAssets()
    {
        $this->requireAsset('css', 'vividStoreDashboard');
        $this->requireAsset('javascript', 'vividStoreFunctions');
    }
}
