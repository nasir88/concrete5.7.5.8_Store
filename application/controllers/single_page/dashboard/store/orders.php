<?php
//Add By Nasir
//namespace Concrete\Package\VividStore\Controller\SinglePage\Dashboard\Store;
namespace Application\Controller\SinglePage\Dashboard\Store;

use Exception;
use Loader;
use Core;
use \Concrete\Core\Page\Controller\DashboardPageController;
use \Concrete\Package\VividStore\Src\VividStore\Order\OrderStatus\OrderStatus as StoreOrderStatus;
use \Concrete\Package\VividStore\Src\VividStore\Order\OrderList as StoreOrderList;
use \Concrete\Package\VividStore\Src\VividStore\Order\Order as StoreOrder;
//Add By Nasir - ORDER001
use \Concrete\Package\VividStore\Src\VividStore\Order\OrderStatus\OrderStatusHistory as OrderStatusHistory;
//End

//Add By Nasir
use \Application\Controller\MyControllers\MyTheme as URLTheme;

class Orders extends DashboardPageController
{

    public function view($status = '')
    {
        $orderList = new StoreOrderList();

        if ($this->get('keywords')) {
            $orderList->setSearch($this->get('keywords'));
        }

        if ($status) {
            $orderList->setStatus($status);
        }

        $orderList->setItemsPerPage(20);

        $paginator = $orderList->getPagination();
        $pagination = $paginator->renderDefaultView();
        $this->set('orderList',$paginator->getCurrentPageResults());
        $this->set('pagination',$pagination);
        $this->set('paginator', $paginator);
        $this->set('orderStatuses', StoreOrderStatus::getList());
        $this->requireAsset('css', 'vividStoreDashboard');
        $this->requireAsset('javascript', 'vividStoreFunctions');
        $this->set('statuses', StoreOrderStatus::getAll());
    }
    public function order($oID)
    {
        $order = StoreOrder::getByID($oID);
        $this->set("oID",$oID);
        $this->set("order",$order);
        $this->set('orderStatuses', StoreOrderStatus::getList());
		
        $this->requireAsset('javascript', 'vividStoreFunctions');
    }
    public function removed()
    {
        $this->set("success",t("Order Removed"));
        $this->view();
    }
    public function updatestatus($oID)
    {
        $data = $this->post();
        StoreOrder::getByID($oID)->updateStatus($data['orderStatus']);
		
		//Add By Nasir
		$URLTheme = new URLTheme();
		$myURLTheme = $URLTheme->myURLTheme();
        $this->redirect('/'.$myURLTheme.'/store/orders/order',$oID);
    }
    public function remove($oID)
    {
        StoreOrder::getByID($oID)->remove();
		
		//Add By Nasir
		$URLTheme = new URLTheme();
		$myURLTheme = $URLTheme->myURLTheme();
        $this->redirect('/'.$myURLTheme.'/store/orders/removed');
    }

}
