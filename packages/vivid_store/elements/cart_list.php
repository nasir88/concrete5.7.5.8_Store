<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Product\Product as StoreProduct;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as StorePrice;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionGroup as StoreProductOptionGroup;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionItem as StoreProductOptionItem;

?>
<ul class="checkout-cart-list">
    <?php 
    if ($cart) {
        $i=1;
        foreach ($cart as $k=>$cartItem) {
            $pID = $cartItem['product']['pID'];
            $qty = $cartItem['product']['qty'];
            $product = StoreProduct::getByID($pID);

            if ($cartItem['product']['variation']) {
                $product->setVariation($cartItem['product']['variation']);
            }

            if ($i%2==0) {
                $classes=" striped";
            } else {
                $classes="";
            }
            if (is_object($product)) {
                ?>

                <li class="checkout-cart-item clearfix<?php echo $classes?>" data-instance-id="<?php echo $k?>" data-product-id="<?php echo $pID?>">
                    <div class="cart-list-thumb">
                        <a href="<?php echo URL::page(Page::getByID($product->getProductPageID()))?>">
                        <?php echo $product->getProductImageThumb()?>
                        </a>
                    </div>
                    <div class="checkout-cart-product-name">
                        <a href="<?php echo URL::page(Page::getByID($product->getProductPageID()))?>">
                        <?php echo $product->getProductName()?>
                        </a>
                    </div>

                    <div class="checkout-cart-item-price">
                        <?php echo StorePrice::format($product->getActivePrice())?>
                    </div>

                    <?php  if ($product->allowQuantity()) {
    ?>
                    <div class="checkout-cart-product-qty">
                        <span class="checkout-cart-item-label"><?php echo t("Quantity:")?></span>
                        <?php echo $qty?>
                    </div>
                    <?php  
}
                ?>

                    <?php  if ($cartItem['productAttributes']) {
    ?>
                        <div class="checkout-cart-item-attributes">
                            <?php  foreach ($cartItem['productAttributes'] as $groupID => $valID) {
    $groupID = str_replace("pog", "", $groupID);
    $optiongroup = StoreProductOptionGroup::getByID($groupID);
    $optionvalue = StoreProductOptionItem::getByID($valID);

    ?>
                                <div class="cart-list-item-attribute">
                                    <span class="cart-list-item-attribute-label"><?php echo  ($optiongroup ? $optiongroup->getName() : '')?>:</span>
                                    <span class="cart-list-item-attribute-value"><?php echo  ($optionvalue ? $optionvalue->getName(): '')?></span>
                                </div>
                            <?php  
}
    ?>
                        </div>
                    <?php  
}
                ?>


                </li>

                <?php 

            }//if is_object
            $i++;
        }//foreach
    }//if cart
    ?>
</ul>