<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Product\Product as StoreProduct;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as StorePrice;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionGroup as StoreProductOptionGroup;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionItem as StoreProductOptionItem;

?>
<div class="cart-page-cart">

    <h1><?php echo t("Shopping Cart")?></h1>

    <?php  if (isset($actiondata) and !empty($actiondata)) {
    ?>
        <?php  if ($actiondata['action'] =='update') {
    ?>
            <p class="alert alert-success"><?php echo  t('Your cart has been updated');
    ?></p>
        <?php  
}
    ?>

        <?php  if ($actiondata['action'] == 'clear') {
    ?>
            <p class="alert alert-warning"><?php echo  t('Your cart has been cleared');
    ?></p>
        <?php  
}
    ?>

        <?php  if ($actiondata['action'] == 'remove') {
    ?>
            <p class="alert alert-warning"><?php echo  t('Item removed');
    ?></p>
        <?php  
}
    ?>

        <?php  if ($actiondata['quantity'] != $actiondata['added']) {
    ?>
            <p class="alert alert-warning"><?php echo  t('Due to stock levels your quantity has been limited');
    ?></p>
        <?php  
}
    ?>
    <?php  
} ?>

    <input id='cartURL' type='hidden' data-cart-url='<?php echo View::url("/cart/")?>'>
    
    <ul class="cart-page-cart-list">
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
        
        <li class="cart-page-cart-list-item clearfix<?php echo $classes?>" data-instance-id="<?php echo $k?>" data-product-id="<?php echo $pID?>">
            <div class="cart-list-thumb">
                <a href="<?php echo URL::page(Page::getByID($product->getProductPageID()))?>">
                    <?php echo $product->getProductImageThumb()?>
                </a>
            </div>
            <div class="cart-list-product-name">
                <a href="<?php echo URL::page(Page::getByID($product->getProductPageID()))?>">
                    <?php echo $product->getProductName()?>
                </a>
            </div>
            
            <div class="cart-list-item-price">
                <?php  
                    $salePrice = $product->getProductSalePrice();
                if (isset($salePrice) && $salePrice != "") {
                    echo '<span class="original-price">'.StorePrice::format($product->getProductPrice()).'</span>';
                    echo '<span class="sale-price">'.StorePrice::format($salePrice).'</span>';
                } else {
                    echo StorePrice::format($product->getProductPrice());
                }
                ?>
            </div>
            <div class="cart-list-product-qty">
                <?php  if ($product->allowQuantity()) {
    ?>
                    <form method="post">
                        <input type="hidden" name="instance" value="<?php echo $k?>" />
                        <span class="cart-item-label"><?php echo t("Quantity:")?></span>
                        <input type="number" name="pQty" min="1" <?php echo ($product->allowBackOrders() || $product->isUnlimited()  ? '' :'max="' . $product->getProductQty() . '"');
    ?> value="<?php echo $qty?>" style="width: 50px;">
                        <button name="action" value="update" class="btn-cart-list-update" type="submit"><?php echo t("Update")?></button>
                    </form>
                <?php  
}
                ?>
            </div>
            <div class="cart-list-item-links">
                <form method="post">
                    <input type="hidden" name="instance" value="<?php echo $k?>" />
                     <button name="action" value="remove" class="btn-cart-list-remove" type="submit"><?php echo t("Remove")?></button>
                </form>
            </div>

            <?php  if ($cartItem['productAttributes']) {
    ?>
            <div class="cart-list-item-attributes">
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

    <?php  if ($cart  && !empty($cart)) {
    ?>
    <div class="cart-page-cart-total">        
        <span class="cart-grand-total-label"><?php echo t("Sub Total")?>:</span>
        <span class="cart-grand-total-value"><?php echo StorePrice::format($total)?></span>
    </div>
        
    <div class="cart-page-cart-links">
        <form method="post">
            <button name="action" value="clear" class="btn-cart-list-clear" type="submit"><?php echo t("Clear Cart")?></button>
        </form>
        <a class="btn-cart-page-checkout" href="<?php echo View::url('/checkout')?>"><?php echo t('Checkout')?></a>
    </div>
    <?php  
} else {
    ?>
    <p class="alert alert-info"><?php echo  t('Your cart is empty');
    ?></p>
    <?php  
} ?>
    
</div>
