<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductVariation\ProductVariation as StoreProductVariation;
?>

<div class="row marginBot10">
	<div class="col-lg-12">
		<div class="wrapper-content">
			<div class="owl-carousel-arrows floatLeft">
				<div class="title-header">
					<?php echo t("Features Product")?>
				</div>
			</div>
			<div class="owl-carousel-arrows floatRight">
				<a data-toggle="tooltip" data-original-title="<?php echo t("Previous") ?>" class="btn btn-primary prev" ><i class="fa fa-angle-left"></i></a>
				<a data-toggle="tooltip" data-original-title="<?php echo t("Next") ?>" class="btn btn-primary next" ><i class="fa fa-angle-right"></i></a>
			</div>
		</div>
	</div>
</div>

<?php
$c = Page::getCurrentPage();
if ($c->isEditMode()) { 
?>
    <div class="ccm-edit-mode-disabled-item">
        <div style="padding: 40px 0px 40px 0px"><?php echo t('Features Product Slider disabled in edit mode.')?></div>
    </div>
<?php  } else { ?>

<div class="row marginBot10">	
<div class="col-lg-12">	
<?php
if ($products) {
    echo "<div class='product-slider wrapper-content' style='padding-left:0px; padding-right:0px;'>";

    $i=1;
    foreach ($products as $product) {
        $optionGroups = $product->getProductOptionGroups();

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
								<img src="<?php echo $thumb->src?>" alt="">
								<!--<img src="http://placehold.it/200x200" width="200px" height="200px" alt="">-->
						<?php
							}
						?>
						<div class="caption">
						
							<div class="title">
								<div class="EqHeightDiv">
									<!--<div class="ShortText">-->
										<?php echo $product->getProductName()?>
									<!--</div>-->
								</div>
							</div>
							
							<div class="price">
							<?php
								$salePrice = $product->getProductSalePrice();
								if (isset($salePrice) && $salePrice != "") {
									echo '<span class="sale-price">'.$product->getFormattedSalePrice().'</span>';
												
									if ($product->getProductPrice() != "0.00" || $product->getProductPrice() != "0") {
										echo '<span class="original-price">'.$product->getFormattedOriginalPrice().'</span>';
									}else{
										echo '<span class="original-price-zero">&nbsp;</span>';
									}
									
								} else {
									echo $product->getFormattedPrice();
								}
							?>
							</div>
							
						</div>
						<div class="align">
							<a data-toggle="tooltip" data-original-title="<?php echo t("More Details") ?>" 
								href="<?php echo URL::to('/product-detail'); ?>?pID=<?php echo $product->getProductID(); ?>"
								class="btn btn-default btn-more-details">
									<i class="fa fa-info-circle"></i>
							</a>
							<input type="hidden" name="pID" value="<?php echo $product->getProductID()?>">
							<input type="hidden" name="quantity" class="product-qty" value="1">
							
							<?php 
								if ($product->isSellable()) {
							?>
							
								<?php 
									$optionCount = 0;
									foreach ($optionGroups as $optionGroup) {
										$optionCount++;
									}
								
									if ($optionCount !== 0) { ?>
									<a data-toggle="tooltip" data-original-title="<?php echo t("Add to Cart") ?>" href="<?php echo URL::to('/product-detail'); ?>?pID=<?php echo $product->getProductID(); ?>" class="btn btn-primary btn-add-to-cart">
										<i class="fa fa-shopping-cart"></i>
									</a>
								<?php }else{ ?>
									<a data-toggle="tooltip" data-original-title="<?php echo t("Add to Cart") ?>" href="javascript:vividStore.addToCart(<?php echo $product->getProductID()?>,'list')" class="btn btn-primary btn-add-to-cart">
										<i class="fa fa-shopping-cart"></i>
									</a>
								<?php } ?>
								
							<?php
								}else{
							?>
								<span class="btn btn-danger">
									<?php echo t("Out of Stock")?>
								</span>
							<?php
								}
							?>
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
</div>

<?php  } ?>