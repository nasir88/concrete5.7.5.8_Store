<?php
//Add By Nasir
//namespace Concrete\Package\VividStore\Controller\SinglePage;
namespace Application\Controller\SinglePage;

use PageController;
use Core;
use View;
use Session;
use Config;
use Page;
use Exception;
use \Concrete\Package\VividStore\Src\VividStore\Order\Order as StoreOrder;
use \Concrete\Package\VividStore\Src\VividStore\Cart\Cart as StoreCart;
use \Concrete\Package\VividStore\Src\VividStore\Payment\Method as StorePaymentMethod;
use \Concrete\Package\VividStore\Src\VividStore\Customer\Customer as StoreCustomer;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Calculator as StoreCalculator;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Checkout as StoreCheckoutUtility;
use \Concrete\Package\VividStore\Src\VividStore\Shipping\ShippingMethod as StoreShippingMethod;

//Add By Nasir - DISCOUNT001
use \Concrete\Package\VividStore\Src\VividStore\Discount\DiscountRule as StoreDiscountRule;
//End


class checkout extends PageController
{
    public function __construct()
    {
        parent::__construct(Page::getByPath('/checkout/'));
        $this->requiresLogin = StoreCart::requiresLogin();
        $this->customer = new StoreCustomer();
        $guestCheckout = Config::get('vividstore.guestCheckout');
        $this->guestCheckout = $guestCheckout ? $guestCheckout : 'off';
        $this->showLoginScreen = $this->showLoginScreen();
    }
	
    public function view()
    {
        if (StoreCart::getTotalItemsInCart() == 0) {
            $this->redirect("/cart/");
        }

        $this->set('customer', $this->customer);
        $this->set('form', Core::make("helper/form"));

		//Add By Nasir - DISCOUNT001
        $discountsWithCodesExist = StoreDiscountRule::discountsWithCodesExist();
        $this->set("discountsWithCodesExist",$discountsWithCodesExist);
        $this->set('discounts', StoreCart::getDiscounts());
		//End
		
		self::loadShippingForGrandTotal();
		
        $totals = StoreCalculator::getTotals();
        $this->set('subtotal', $totals['subTotal']);
        $this->set('taxes', $totals['taxes']);
        $this->set('taxtotal', $totals['taxTotal']);
        $this->set('shippingtotal', $totals['shippingTotal']);
        $this->set('shippingEnabled', StoreCart::isShippable());
		
        $GrandTotal = StoreCalculator::getGrandTotal();
        $this->set('grandtotal', $GrandTotal);

        $this->getFooterAssets();

        $enabledMethods = StorePaymentMethod::getEnabledMethods();
        $availableMethods = array();
        foreach ($enabledMethods as $em) {
            $emmc = $em->getMethodController();
            //if ($totals['total'] >= $emmc->getPaymentMinimum() && $totals['total'] <=  $emmc->getPaymentMaximum()) {
                $availableMethods[] = $em;
            //}
        }

        $this->set("enabledPaymentMethods", $availableMethods);
    }
		
	public function getCartListElement()
    {
        $fileSystem = new \Illuminate\Filesystem\Filesystem;
        if ($fileSystem->exists(DIR_BASE.'/application/elements/cart_list.php')) {
            View::element('cart_list', array('cart'=>StoreCart::getCart()));
        } else {
            View::element('cart_list', array('cart'=>StoreCart::getCart()), 'vivid_store');
        }
    }
	
    public function getFooterAssets()
    {
        $this->requireAsset('javascript', 'jquery');
        $js = \Concrete\Package\VividStore\Controller::returnHeaderJS();
        $this->addFooterItem($js);
        $this->requireAsset('javascript', 'vivid-store');
        $this->requireAsset('css', 'vivid-store');
    }

    public function showLoginScreen()
    {

        //this is a really dirty check we should move to another class.
        if ($this->customer->isGuest() && ($this->requiresLogin || $this->guestCheckout == 'off' || ($this->guestCheckout == 'option' && $_GET['guest'] != '1'))) {
            return true;
        } else {
            return false;
        }
    }

    public function hasGuestCheckout()
    {
        if ($this->guestCheckout == 'option' && !$this->requiresLogin) {
            return true;
        }
        return false;
    }
    
    public function failed()
    {
        $this->set('paymentErrors', Session::get('paymentErrors'));
        $this->addFooterItem("
            <script type=\"text/javascript\">
                $(function(){
                    vividStore.loadViaHash();
                });
            </script>
        ");
        $this->view();
    }
		
	public function submit()
    {
        $data = $this->post();
        
        //process payment
        $pmHandle = $data['payment-method'];
        $pm = StorePaymentMethod::getByHandle($pmHandle);
		
        if ($pm === false) {
            //There was no payment method enabled somehow.
            //so we'll force invoice.
            $pm = StorePaymentMethod::getByHandle('invoice');
        }

        if ($pm->getMethodController()->external == true) {
            $pmsess = Session::get('paymentMethod');
            $pmsess[$pm->getPaymentMethodID()] = $data['payment-method'];
            Session::set('paymentMethod', $pmsess);
            $order = StoreOrder::add($data, $pm, null, 'incomplete');
            Session::set('orderID', $order->getOrderID());
			
			if ($pm->getMethodController()->placeOrder == true) {
				$this->redirect('/payment/order/'.$order->getOrderID());
			}else{
				$this->redirect('/checkout/external');
			}
        } else {
            $payment = $pm->submitPayment();
            if ($payment['error']==1) {
                $pmsess = Session::get('paymentMethod');
                $pmsess[$pm->getPaymentMethodID()] = $data['payment-method'];
                Session::set('paymentMethod', $pmsess);
                $errors = $payment['errorMessage'];
                Session::set('paymentErrors', $errors);
                $customer = new StoreCustomer();
                if($customer->isGuest()) {
                    $this->redirect("/checkout/?guest=1#payment");
                } else {
                    $this->redirect("/checkout/failed#payment");
                }
            } else {
                $transactionReference = $payment['transactionReference'];
                StoreOrder::add($data, $pm, $transactionReference);
				Session::set('paymentMethod', $pmsess);
                $this->redirect('/checkout/complete');
            }
        }
    }
   
    public function loadShippingForGrandTotal()
    {
		Session::set('FreeShipping',1);
		$sessionShippingMethodID = Session::get('smID');
		Session::set('smID_Temp',$sessionShippingMethodID);
		$i=1;
			
		$eligibleMethods = StoreShippingMethod::getEligibleMethods();
		foreach ($eligibleMethods as $method) {
			if ($method->isEnabled()) {
				Session::set('FreeShipping',0);
				
				if ($i==1) {
					Session::set('smID',$method->getShippingMethodID());
				}
				
				if (Session::get('smID_Temp') == $method->getShippingMethodID()) {
					Session::set('smID',$sessionShippingMethodID);
					break;
				}
			$i++;  
			}		
		}
			
		//throw new Exception(Session::get('FreeShipping'));
		if (Session::get('FreeShipping') == 1) {
			Session::set('smID',null);
		}
    }	
	
}
