<?php
namespace Concrete\Package\VividStore\Controller\SinglePage;

use PageController;
use Core;
use View;
use Session;
use Config;
use Page;
use Exception;
use Loader;
use \Concrete\Package\VividStore\Src\VividStore\Order\Order as StoreOrder;
use \Concrete\Package\VividStore\Src\VividStore\Cart\Cart as StoreCart;
use \Concrete\Package\VividStore\Src\VividStore\Payment\Method as StorePaymentMethod;
use \Concrete\Package\VividStore\Src\VividStore\Customer\Customer as StoreCustomer;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Calculator as StoreCalculator;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Checkout as StoreCheckoutUtility;
use \Concrete\Package\VividStore\Src\VividStore\Shipping\ShippingMethod as StoreShippingMethod;
use \Concrete\Package\VividStore\Src\VividStore\Address\AddressModal as AddressModal;

class payment extends PageController
{

    public function view()
    {
		$this->redirect("/payment/order");
    }

    public function getFooterAssets()
    {
        $this->requireAsset('javascript', 'jquery');
        $js = \Concrete\Package\VividStore\Controller::returnHeaderJS();
        $this->addFooterItem($js);
        $this->requireAsset('javascript', 'vivid-store');
        $this->requireAsset('css', 'vivid-store');
        $this->requireAsset('javascript', 'countdown');
    }
		
	public function order($oID = null)
    {
        $this->set('form', Core::make("helper/form"));
		$this->getFooterAssets();
        $this->customer = new StoreCustomer();
		

		if ($this->customer->getUserID() == 0) {
			$this->redirect("/login");
		} else {
			
			$hasOrder = StoreOrder::getForCurrentOrder($oID);
				
			if ($hasOrder) {
				
				$infoOrder = StoreOrder::getByID($oID);
				$this->set('orderID', $oID);
				$this->set("Amount", $infoOrder->getTotal());
				
				//if (!$infoOrder->getOrderPaid() == 1) {
				
					$dataAddress = AddressModal::getMyAddressByDefault();
					
					$this->set("baCompanyName", $dataAddress['baCompanyName']);
					$this->set("baFirstName", $dataAddress['baFirstName']);
					$this->set("baLastName", $dataAddress['baLastName']);
					$this->set("baPhone", $dataAddress['baPhone']);
					$this->set("baFirstAddress", $dataAddress['baFirstAddress']);
					$this->set("baSecondAddress", $dataAddress['baSecondAddress']);
					$this->set("baPostalCode", $dataAddress['baPostalCode']);
					$this->set("baCity", $dataAddress['baCity']);
					$this->set("baState", $dataAddress['baState']);
					$h = Loader::helper('lists/countries');
					$countryName = $h->getCountryName($addressItem['baCountry']);
					$this->set("baCountry", $countryName);
					
					$getOrderPaidExpiredDate = date_format($infoOrder->getOrderPaidExpiredDate(),"d F Y H:i:s");
				
					$this->addFooterItem("
						<script type=\"text/javascript\">
							$(document).ready(function(){
							
								$('#countdown').countdown({
									date: '".$getOrderPaidExpiredDate."',
									format: 'on'
								},
								
									function() {
										// callback function
										vividStore.waiting();
										window.location.href = '../expired';
									}
								);
																
							});
						</script>
					");
				
					$enabledMethods = StorePaymentMethod::getEnabledMethods();
					$availableMethods = array();
					foreach ($enabledMethods as $em) {
							$availableMethods[] = $em;
					}
					$this->set("enabledPaymentMethods", $availableMethods);
					$this->set("invalidOrderPayment", false);
				
				//}else{
				//	$this->redirect('/payment/complete');
				//}
				
			}else{
				$this->set("invalidOrderPayment", true);
			}
		
		}
	}
		
	public function submit()
    {
        $data = $this->post();
        
        //process payment
        $pmHandle 	= $data['payment-method'];
        $pm 		= StorePaymentMethod::getByHandle($pmHandle);
		$orderID	= $data['txtOrderID'];
		
		$payment = $pm->submitPayment();

		if ($payment['error']==1) {
			$pmsess = Session::get('paymentMethod');
			$pmsess[$pm->getPaymentMethodID()] = $data['payment-method'];
			Session::set('paymentMethod', $pmsess);
			$errors = $payment['errorMessage'];
			Session::set('paymentErrors', $errors);
			$this->redirect("/payment/failed");
		} else {
			$statusPaid 		  = 1;
			$paidTotal 			  = $payment['paidTotal'];
			$paidDate 			  = $payment['paidDate'];
			$paidTime 			  = $payment['paidTime'];
			$transactionReference = $payment['transactionReference'];
			$paidRefund		      = $payment['paidRefund'];
			
			StoreOrder::completePayment($orderID,$pmHandle,$statusPaid,$paidTotal,$paidDate,$paidTime,$paidRefund,$transactionReference);
			$this->redirect('/payment/complete');
		}
    }
	
    public function failed()
    {
        $this->set('paymentErrors', Session::get('paymentErrors'));
        //$this->view();
    }
	
    public function complete()
    {
        $this->set('paymentComplete', true);
        //$this->view();
    }
	
    public function expired()
    {
        $this->set('paymentExpired', true);
        //$this->view();
    }
	
}
