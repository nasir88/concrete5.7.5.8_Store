<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Product\Product as StoreProduct;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Price as StorePrice;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionGroup as StoreProductOptionGroup;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionItem as StoreProductOptionItem;

?>
<div class="cart-modal clearfix" id="cart-modal">
    <a href="javascript:vividStore.exitModal()" class="product-modal-exit">x</a>
    <div class="cart-page-cart">
        <?php  if (isset($actiondata) and !empty($actiondata)) {
    ?>

            <?php  if ($actiondata['action'] == 'add') {
    ?>
                <p class="alert alert-success"><strong><?php echo  $actiondata['product']['pName'];
    ?></strong> <?php echo  t('has been added to your cart');
    ?></p>
            <?php  
}
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

        <h2><?php echo t("Shopping Cart")?></h2>

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
                                <?php echo StorePrice::format($product->getActivePrice())?>
                            </div>

                            <div class="cart-list-product-qty">
                                <?php  if ($product->allowQuantity()) {
    ?>
                                <span class="cart-item-label"><?php echo t("Quantity:")?></span>
                                <input type="number" <?php echo  ($product->allowBackOrders() || $product->isUnlimited() ? '' : 'max="'.$product->getProductQty() . '"');
    ?> min="1" value="<?php echo $qty?>" style="width: 50px;">
                                <?php  
}
                        ?>
                            </div>
                            <div class="cart-list-item-links">
                                <?php  if ($product->allowQuantity()) {
    ?>
                                <a class="btn-cart-list-update" href="javascript:vividStore.updateItem(<?php echo $k?>, true);"><?php echo t("Update")?></a>
                                <?php  
}
                        ?>
                                <a class="btn-cart-list-remove"  href="javascript:vividStore.removeItem(<?php echo $k?>, true);"><?php echo t("Remove")?></a>
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
        <?php  
} else {
    ?>
        <p class="alert alert-info"><?php echo  t('Your cart is empty');
    ?></p>
        <?php  
} ?>


        <div class="cart-page-cart-links">
            <a class="btn-cart-modal-continue" href="javascript:vividStore.exitModal()"><?php echo t("Continue Shopping")?></a>
            <?php  if ($cart  && !empty($cart)) {
    ?>
            <a class="btn-cart-modal-clear" href="javascript:vividStore.clearCart(true)"><?php echo t('Clear Cart')?></a>
            <a class="btn-cart-modal-checkout" href="<?php echo View::url('/checkout')?>"><?php echo t('Checkout')?></a>
            <?php  
} ?>
        </div>

    </div>
</div>
