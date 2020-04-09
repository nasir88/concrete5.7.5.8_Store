<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<form class="product-modal clearfix" id="form-add-to-cart-modal-<?php echo $product->getProductID()?>">
    <div class="product-modal-thumb">
        <?php 
            $imgObj = $product->getProductImageObj();
            $ih = Core::make("helper/image");
            $thumb = $ih->getThumbnail($imgObj, 400, 999, false);
        ?>
        <img src="<?php echo $thumb->src?>">
    </div>
    <div class="product-modal-info-shell">
        <a href="javascript:vividStore.exitModal()" class="product-modal-exit">x</a>
        <span class="product-modal-title"><?php echo $product->getProductName()?></span>
        <span class="product-modal-price"><?php echo $product->getFormattedPrice()?></span>
        <div class="product-modal-details">
            <?php echo $product->getProductDesc()?>
        </div>
        <div class="product-modal-options clearfix">
            <div class="product-modal-option-group">
                <label class="option-group-label"><?php echo t('Quantity')?></label>
                <input type="number" name="quantity" class="product-qty" value="1" max="<?php echo $product->getProductQty()?>">
            </div>
            <?php 
            $optionGroups = $product->getProductOptionGroups();
            $optionItems = $product->getProductOptionItems();
            foreach ($optionGroups as $optionGroup) {
                ?>
                <div class="product-modal-option-group clearfix">
                    <label class="option-group-label"><?php echo $optionGroup->getName()?></label>
                    <select name="pog<?php echo $optionGroup->getID()?>">
                        <?php 
                        foreach ($optionItems as $option) {
                            if ($option->getProductOptionGroupID()==$optionGroup->getID()) {
                                ?>
                                <option value="<?php echo $option->getID()?>"><?php echo $option->getName()?></option>
                            <?php  
                            }
                        }//foreach
                        ?>
                    </select>
                </div>
            <?php  
            } ?>
        </div>
        <input type="hidden" name="pID" value="<?php echo $product->getProductID()?>">
        <div class="product-modal-buttons">
            <?php  if ($product->isSellable()) {
    ?>
            <a href="javascript:vividStore.addToCart(<?php echo $product->getProductID()?>,'modal')"><?php echo t("Add to Cart")?></a>
            <?php  
} else {
    ?>
                <span class="out-of-stock-label"><?php echo t("Out of Stock")?></span>
            <?php  
} ?>
        </div>
    </div>
</form>
