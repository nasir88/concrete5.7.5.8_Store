<?php 
namespace Concrete\Package\VividStore\Src\VividStore\Utilities;

use Concrete\Package\VividStore\Src\VividStore\Cart\Cart as StoreCart;
use Concrete\Package\VividStore\Src\VividStore\Product\Product as StoreProduct;
use Concrete\Package\VividStore\Src\VividStore\Tax\Tax as StoreTax;
use Concrete\Package\VividStore\Src\VividStore\Shipping\ShippingMethod as StoreShippingMethod;
use Config;
use Session;

class Calculator
{
    public static function getSubTotal()
    {
        $cart = StoreCart::getCart();
        $subtotal = 0;
        if($cart){
            foreach ($cart as $cartItem){
                $pID = $cartItem['product']['pID'];
                $qty = $cartItem['product']['qty'];
                $product = StoreProduct::getByID($pID);

                if ($cartItem['product']['variation']) {
                    $product->setVariation($cartItem['product']['variation']);
                }
                if(is_object($product)){
                    $productSubTotal = $product->getActivePrice() * $qty;
                    $subtotal = $subtotal + $productSubTotal;
                }
            }
        }
        return max($subtotal,0);
    }
    public static function getShippingTotal($smID = null)
    {
        $sessionShippingMethodID = Session::get('smID');
        if($smID){
            $shippingMethod = StoreShippingMethod::getByID($smID);
            Session::set('smID',$smID);
        } elseif(!empty($sessionShippingMethodID)) {
            $shippingMethod = StoreShippingMethod::getByID($sessionShippingMethodID);
        } else {
            $shippingTotal = 0;
        }
        if(is_object($shippingMethod)){
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
    public static function getDiscountTotals()
    {
        //should return 3 totals: subtotal, shipping, grand total
    }
    public static function getGrandTotal()
    {
        $subTotal = self::getSubTotal();
        $taxTotal = 0;
        $taxes = self::getTaxTotals();
        $taxCalc = Config::get('vividstore.calculation');
        if($taxes && $taxCalc != 'extract'){
            foreach($taxes as $tax) {
                $taxTotal += $tax['taxamount'];
            }
        }        $shippingTotal = self::getShippingTotal();
        $grandTotal = ($subTotal + $taxTotal + $shippingTotal);
        
        $discounts = StoreCart::getDiscounts(); //TODO: Get total somewhere else.
        foreach($discounts as $discount) {
            if ($discount->drDeductFrom == 'total') {
                if ($discount->drDeductType  == 'value' ) {
                    $grandTotal -= $discount->drValue;
                }

                if ($discount->drDeductType  == 'percentage' ) {
                    $grandTotal -= ($discount->drPercentage / 100 * $grandTotal);
                }
            }
        }
        
        return $grandTotal;
    }

    // returns an array of formatted cart totals
    public static function getTotals() {
        $subTotal = self::getSubTotal();
        $taxes = StoreTax::getTaxes();
        $addedTaxTotal = 0;
        $includedTaxTotal = 0;
        $taxCalc = Config::get('vividstore.calculation');

        if($taxes){
            foreach($taxes as $tax) {
                if ($taxCalc != 'extract') {
                    $addedTaxTotal += $tax['taxamount'];
                } else {
                    $includedTaxTotal += $tax['taxamount'];
                }
            }
        }

        $shippingTotal = self::getShippingTotal();
        $discountedSubtotal = $subTotal;
        $discounts = StoreCart::getDiscounts();
        foreach($discounts as $discount) {
            if ($discount->drDeductFrom == 'subtotal') {
                
                if ($discount->drDeductType  == 'value' ) {
                    $discountedSubtotal -= $discount->drValue;
                }

                if ($discount->drDeductType  == 'percentage' ) {
                    $discountedSubtotal -= ($discount->drPercentage / 100 * $discountedSubtotal);
                }
            }
        }
        
        $total = ($discountedSubtotal + $addedTaxTotal + $shippingTotal);
        
        
        foreach($discounts as $discount) {
            if ($discount->drDeductFrom == 'total') {
                if ($discount->drDeductType  == 'value' ) {
                    $total -= $discount->drValue;
                }

                if ($discount->drDeductType  == 'percentage' ) {
                    $total -= ($discount->drPercentage / 100 * $total);
                }
            }
        }

        return array('subTotal'=>$subTotal,'taxes'=>$taxes, 'taxTotal'=>$addedTaxTotal + $includedTaxTotal, 'shippingTotal'=>$shippingTotal, 'total'=>$total);
    }
}
