<?php  
namespace Concrete\Package\VividStore\Src\VividStore\Discount;

use \Concrete\Core\Controller\Controller as RouteController;
use Database;
use Core;
use View;
use Session;
use Config;
use Page;
use Exception;
use Illuminate\Filesystem\Filesystem;
use \Concrete\Package\VividStore\Src\VividStore\Discount\DiscountRule as StoreDiscountRule;
use \Concrete\Package\VividStore\Src\VividStore\Cart\Cart as StoreCart;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Calculator as StoreCalculator;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as Price;

class DiscountModal extends RouteController
{

	public function getDiscountListElement() {
		$statusAction = $this->post('action');
		
		$discounts = StoreCart::getDiscounts();
		$calcDiscount = StoreCalculator::calcDiscount($discounts);
        $TotalItemsDiscount = $calcDiscount['TotalItemsDiscount'];
        $TotalShippingDiscount = $calcDiscount['TotalShippingDiscount'];
        $TotalDiscount = $calcDiscount['TotalDiscount'];

        $fileSystem = new \Illuminate\Filesystem\Filesystem;
        if ($fileSystem->exists(DIR_BASE.'/application/elements/discount_list.php')) {
            View::element('discount_list', array('TotalItemsDiscount'=>$TotalItemsDiscount,'TotalShippingDiscount'=>$TotalShippingDiscount,'TotalDiscount'=>$TotalDiscount,'discounts'=>$discounts,'statusAction'=>$statusAction));
        } else {
            View::element('discount_list', array('TotalItemsDiscount'=>$TotalItemsDiscount,'TotalShippingDiscount'=>$TotalShippingDiscount,'TotalDiscount'=>$TotalDiscount,'discounts'=>$discounts,'statusAction'=>$statusAction), 'vivid_store');
        }
    }
	
	public function checkDeductFrom($drDeductFrom) {
		$discounts = StoreCart::getDiscounts();
		foreach($discounts as $discount) {
			if ($drDeductFrom = $discount->drDeductFrom) {
				return false;
			}
		}
		return true;
	}
	
	public function storeCode() {
		if ($this->post('txtCode')) {
			$code = $this->post('txtCode');
			$code_separated = "'" .$code. "'";
			$rule = StoreDiscountRule::findDiscountRuleByCode($code_separated);

			if (!empty($rule)) {
			
					foreach($rule as $DiscountRule) {
						$drDeductFrom = $DiscountRule->drDeductFrom;
					}
					
					//$hasDeductFrom = $this->checkDeductFrom($drDeductFrom);
					//if ($hasDeductFrom) {
						$code_discount = isset($_SESSION['vividstore.code']) ? $_SESSION['vividstore.code'] : array();
						$code_discount[] = $code;
						$_SESSION['vividstore.code'] = $code_discount;
						$returndata = array('action'=>'add');
					//}else{
						//$returndata = array('action'=>'exist');
					//}
				
			}else{
				$returndata = array('action'=>'invalid');
			}
		}
		
        echo json_encode($returndata);
        exit();
		
    }
	
    public static function clearCode() {
		unset($_SESSION["vividstore.code"]);
		
		$returndata = array('action'=>'reset');
        echo json_encode($returndata);
        exit();
    }
		
}
