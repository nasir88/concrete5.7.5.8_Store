<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductVariation\ProductVariation as StoreProductVariation;
?>


<div class="row marginBot10">		
<?php
if ($products) {
    echo "<div class='product-slider'>";

    $i=1;
    foreach ($products as $product) {

?>
 
        <div class="item">         
			<div class="col-lg-12"> 
				<form class="product-thumb" id="form-add-to-cart-list-<?php echo $product->getProductID()?>">
				
					<div class="thumbnail">
						<?php 
							$imgObj = $product->getProductImageObj();
							if (is_object($imgObj)) {
								$thumb = $ih->getThumbnail($imgObj, 400, 280, true);
								$src = $imgObj->getRelativePath();
						?>
								<!--<img src="<?php //echo $thumb->src?>" alt="">-->
								<!--<img src="<?php echo $src?>" alt="">-->
								<img src="http://placehold.it/200x200" alt="">
						<?php
							}
						?>
						<div class="caption">
							<h4>
								<div class="EqHeightDiv">
									<div class="ShortText">
										<?php echo $product->getProductName()?>
									</div>
								</div>
							</h4>
							<?php
								$salePrice = $product->getProductSalePrice();
								if (isset($salePrice) && $salePrice != "") {
									echo '<span class="sale-price">'.$product->getFormattedSalePrice().'</span>';
									echo '<span class="original-price">'.$product->getFormattedOriginalPrice().'</span>';
								} else {
									echo $product->getFormattedPrice();
								}
							?>

							<hr>
							<center>
								<a data-toggle="tooltip" data-original-title="<?php echo t("More Details") ?>" href="<?php echo URL::page(Page::getByID($product->getProductPageID()))?>" class="btn btn-default btn-more-details">
									<i class="fa fa-info-circle"></i>
								</a>
								<input type="hidden" name="pID" value="<?php echo $product->getProductID()?>">
								<input type="hidden" name="quantity" class="product-qty" value="1">
								
								<?php 
									if ($product->isSellable()) {
								?>
									<a data-toggle="tooltip" data-original-title="<?php echo t("Add to Cart") ?>" href="javascript:vividStore.addToCart(<?php echo $product->getProductID()?>,'list')" class="btn btn-primary btn-add-to-cart">
										<?php //echo($btnText ? h($btnText) : t("Add to Cart"))?>
										<i class="fa fa-shopping-cart"></i>
									</a>
								<?php
									}else{
								?>
									<span class="btn btn-danger">
										<?php //echo($btnText ? h($btnText) : t("Add to Cart"))?>
										<?php echo t("Out of Stock")?>
									</span>
								<?php
									}
								?>
							</center>
							
						</div>
						
					</div>
					
				</form>
			</div>
        </div>
        
<?php 
	$i++;
    }
    echo "</div>";
}
else 
{
?>
    <div class="alert alert-info"><?php echo t("No Products Available")?></div>
<?php 
} 
?>
</div>
