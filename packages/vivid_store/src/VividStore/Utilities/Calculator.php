<?php  
namespace Concrete\Package\VividStore\Src\VividStore\Utilities;

use Concrete\Package\VividStore\Src\VividStore\Cart\Cart as StoreCart;
use Concrete\Package\VividStore\Src\VividStore\Product\Product as StoreProduct;
use Concrete\Package\VividStore\Src\VividStore\Tax\Tax as StoreTax;
use Concrete\Package\VividStore\Src\VividStore\Shipping\ShippingMethod as StoreShippingMethod;
use Concrete\Package\VividStore\Src\VividStore\Discount\DiscountModal as DiscountModal;
use Config;
use Session;
use Exception;

class Calculator
{
    public static function getSubTotal()
    {
        $cart = StoreCart::getCart();
        $subtotal = 0;
        if ($cart) {
            foreach ($cart as $cartItem) {
                $pID = $cartItem['product']['pID'];
                $qty = $cartItem['product']['qty'];
                $product = StoreProduct::getByID($pID);

                if ($cartItem['product']['variation']) {
                    $product->setVariation($cartItem['product']['variation']);
                }
                if (is_object($product)) {
                    $productSubTotal = $product->getActivePrice() * $qty;
                    $subtotal = $subtotal + $productSubTotal;
                }
            }
        }
        return max($subtotal, 0);
    }
    public static function getShippingTotal($smID = null)
    {
        $sessionShippingMethodID = Session::get('smID');
        if ($smID) {
            $shippingMethod = StoreShippingMethod::getByID($smID);
            Session::set('smID', $smID);
        } elseif (!empty($sessionShippingMethodID)) {
            $shippingMethod = StoreShippingMethod::getByID($sessionShippingMethodID);
        } else {
            $shippingTotal = 0;
        }
        if (is_object($shippingMethod)) {
            $shippingTotal = $shippingMethod->getShippingMethodTypeMethod()->getRate();
        } else {
            $shippingTotal = 0;
        }
        return $shippingTotal;
    }
    public static function getTaxTotals()
    {
        return StoreTax::getTaxes();
    }
    //Add By Nasir - DISCOUNT001
	public static function getGrandTotal()
    {
		$totalDiscount = 0;
		$totals = self::getTotals();
        $total = $totals['total'];
	
		$totalDiscount = self::getTotalDiscount();
		
		$grandTotal = ($total - $totalDiscount);
	
        return $grandTotal;
    }
	public static function getTotals()
    {
        $subTotal = self::getSubTotal();
        $shippingTotal = self::getShippingTotal();
        $taxes = StoreTax::getTaxes();
        $addedTaxTotal = 0;
        $includedTaxTotal = 0;
        $taxCalc = Config::get('vividstore.calculation');

        if ($taxes) {
            foreach ($taxes as $tax) {
                if ($taxCalc != 'extract') {
                    $addedTaxTotal += $tax['taxamount'];
                } else {
                    $includedTaxTotal += $tax['taxamount'];
                }
            }
        }
		
		$total = ($subTotal + $addedTaxTotal + $includedTaxTotal + $shippingTotal);
		
        return array('subTotal'=>$subTotal,'taxes'=>$taxes, 'taxTotal'=>$addedTaxTotal + $includedTaxTotal, 'shippingTotal'=>$shippingTotal, 'total'=>$total);
    }	
	public static function getTotalDiscount()
    {
		$discounts = StoreCart::getDiscounts();
		$calcDiscount = self::calcDiscount($discounts);
        $GrandTotalDiscount = $calcDiscount['GrandTotalDiscount'];
		return $GrandTotalDiscount;
	}
	public static function calcDiscount($discounts = null) {
	
		$discountslength = count($discounts);
		
		$totals = self::getTotals();
        $subtotal = $totals['subTotal'];
        $shippingtotal = $totals['shippingTotal'];

		if ($discountslength > 0) {

			$sumArray = array();
			$discountstrings = array();
			$total = $subtotal + $shippingtotal;
			
			$TotalValue = 0;
			$ShippingSubTotalValue = 0;
			$ShippingTotalValue = 0;
			
			$TotalPercentage = 0;
			$ShippingSubTotalPercentage = 0;
			$ShippingTotalPercentage = 0;

			foreach ($discounts as $k=>$discount) {
	
				//Description Deduct From
				if ($discount->drDeductFrom == 'subtotal') {
					$descDeductFrom = t('Items Sub-total');
				}
				if ($discount->drDeductFrom == 'shipping') {
					$descDeductFrom = t('Shipping');
				}
				if ($discount->drDeductFrom == 'total') {
					$descDeductFrom = t('Total');
				}
							
				//Amount Deduct From Using Type Value
				if ($discount->drDeductType  == 'value' ) {
					$sumArray[$discount->drDeductType][$descDeductFrom][$discount->drDisplay] += $discount->drValue;
				}

				//Amount Deduct From Using Type Percentage
				if ($discount->drDeductType  == 'percentage' ) {
					if ($discount->drDeductFrom == 'subtotal') {
						$totalFromPercentageBefore = $subtotal;
						$subtotal -= ($discount->drPercentage / 100 * $subtotal);
						$sumArray[$discount->drDeductType][$descDeductFrom][$discount->drDisplay .' ('. $discount->drPercentage .'% x '. Price::format($totalFromPercentageBefore) .')'] = $subtotal;
					}
					if ($discount->drDeductFrom == 'shipping') {
						$totalFromPercentageBefore = $shippingtotal;
						$shippingtotal -= ($discount->drPercentage / 100 * $shippingtotal);
						$sumArray[$discount->drDeductType][$descDeductFrom][$discount->drDisplay .' ('. $discount->drPercentage .'% x '. Price::format($totalFromPercentageBefore) .')'] = $shippingtotal;
					}
					if ($discount->drDeductFrom == 'total') {
						$totalFromPercentageBefore = $total;
						$total -= ($discount->drPercentage / 100 * $total);
						$sumArray[$discount->drDeductType][$descDeductFrom][$discount->drDisplay .' ('. $discount->drPercentage .'% x '. Price::format($totalFromPercentageBefore) .')'] = $total;
					}
				}
				
			}
			
			//Display Discount Applied (Value)
			foreach ($sumArray as $key1 => $sumArray2) {
					
				if ($key1 == 'value'){
					foreach ($sumArray2 as $key2 => $sumArray3) {
						foreach ($sumArray3 as $key3 => $sumArray4) {
							if ($key2 == 'Total'){
								$TotalValue += $sumArray4;
							}
							if ($key2 == 'Shipping'){
								$ShippingTotalValue += $sumArray4;
							}
							if ($key2 == 'Items Sub-total'){
								$ShippingSubTotalValue += $sumArray4;
							}				
						}
					}
				}
				
			}
			
			//Display Discount Applied (Percentage)
			foreach ($sumArray as $key1 => $sumArray2) {
					
				if ($key1 == 'percentage'){
					foreach ($sumArray2 as $key2 => $sumArray3) {
						foreach ($sumArray3 as $key3 => $sumArray4) {
							if ($key2 == 'Total'){
								$TotalPercentage = $sumArray4;
							}
							if ($key2 == 'Shipping'){
								$ShippingTotalPercentage = $sumArray4;
							}
							if ($key2 == 'Items Sub-total'){
								$ShippingSubTotalPercentage = $sumArray4;
							}
						}
					}
				}
				
			}
			
			//var_dump($sumArray);
			
			$TotalItemsDiscount = $ShippingSubTotalValue + $ShippingSubTotalPercentage;
			$TotalShippingDiscount = $ShippingTotalValue + $ShippingTotalPercentage;
			$TotalDiscount = $TotalValue + $TotalPercentage;
			
			$GrandTotalDiscount = $TotalItemsDiscount + $TotalShippingDiscount + $TotalDiscount;
			
			return array('TotalItemsDiscount'=>$TotalItemsDiscount,'TotalShippingDiscount'=>$TotalShippingDiscount,'TotalDiscount'=>$TotalDiscount,'GrandTotalDiscount'=>$GrandTotalDiscount);

		}
	}
	//End
	public static function convertToMM($size)
    {
        $storeSizeUnit = Config::get('vividstore.sizeUnit');
        switch ($storeSizeUnit) {
            case "in":
                $mm = $size / 0.039370;
                break;
            case "cm":
                $mm = $size * 10;
                break;
            case "mm":
                $mm = $size;
                break;
        }
        return $mm;
    }
    public static function convertFromMM($mmSize)
    {
        $storeSizeUnit = Config::get('vividstore.sizeUnit');
        switch ($storeSizeUnit) {
            case "in":
                $size = $mmSize * 0.039370;
                break;
            case "cm":
                $size = $mmSize / 10;
                break;
            case "mm":
                $size = $mmSize;
                break;
        }
        return $size;
    }
    public static function convertToGrams($weight)
    {
        $storeWeightUnit = Config::get('vividstore.weightUnit');
        switch ($storeWeightUnit) {
            case "lb":
                $grams = $weight / 0.0022046;
                break;
            case "kg":
                $grams = $weight * 1000;
                break;
            case "g":
                $grams = $weight;
                break;
        }
        return $grams;
    }
    public static function convertFromGrams($grams)
    {
        $storeWeightUnit = Config::get('vividstore.weightUnit');
        switch ($storeWeightUnit) {
            case "lb":
                $weight = $grams * 0.0022046;
                break;
            case "kg":
                $weight = $grams / 1000;
                break;
            case "g":
                $weight = $grams;
                break;
        }
        return $weight;
    }
}
