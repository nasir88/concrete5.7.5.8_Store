<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
?>

<?php
if (is_object($product)) {
    ?>

<form class="product-detail-block" id="form-add-to-cart-<?php echo $product->getProductID()?>">

    <div class="row">
	
		<?php if ($showProductName) { ?>
			<h2 class="product-name"><?php echo $product->getProductName()?></h2>
		<?php } ?>
	
        <?php if ($showImage) { ?>
			<div class="col-md-7 product-image">
				<?php
					$imgObj = $product->getProductImageObj();
					if (is_object($imgObj)) {
						$thumb = Core::make('helper/image')->getThumbnail($imgObj, 200, 200, true);
						?>
							<div class="product-primary-image">
								<a href="<?php echo $imgObj->getRelativePath()?>" class="product-thumb">
									<img src="<?php echo $thumb->src?>">
								</a>
							</div>
				<?php 
					}
				?>

				<?php
				$images = $product->getProductImagesObjects();
				if (count($images)>0) {
					echo '<div class="product-additional-images">';
						foreach ($images as $secondaryimage) {
							if (is_object($secondaryimage)) {
								$thumb = Core::make('helper/image')->getThumbnail($secondaryimage, 100, 100, true);
				?>
								  <a class="product-thumb" href="<?php echo $secondaryimage->getRelativePath()?>"><img class="thumb" src="<?php echo $thumb->src?>"></a>
				<?php 
							}
						}
						foreach ($images as $secondaryimage) {
							if (is_object($secondaryimage)) {
								echo '<div class="filler"></div>';
							}
						}
					echo '</div>';
				}
				?>
			
			<?php if ($showProductDetails) { ?>
			
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab"><?php echo t("Product Details")?></a></li>
                  <!--<li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>-->
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <?php echo $product->getProductDetail()?>
                  </div>
                  <!--<div class="tab-pane" id="tab_2">
                  </div>-->
                </div>
              </div>
			  
			<?php } ?>
			
			</div>
			
			<div class="col-md-5">
        <?php 
		} else {
		?>
			<div class="col-md-12">
        <?php 
		}
			?>
			
			<div class="product-button-shell stock-label <?php echo($product->isSellable() ? 'hidden' : '');?>">
				<span class="btn btn-danger out-of-stock-label"><?php echo t("Out Of Stock")?></span>
				<hr>
			</div>
            
            <?php //if ($showIsFeatured) {
					//if ($product->isFeatured()) {
			?> 
					<!--<span class="product-featured"><?php //echo t("Featured Item")?></span>-->
		    <?php 
					//}
				//}
			?>
            
            <?php if ($showProductPrice) {
    ?>
            <span class="product-price">
                <?php
                    $salePrice = $product->getProductSalePrice();
    if (isset($salePrice) && $salePrice != "") {
        echo '<span class="sale-price">'.t("On Sale").' : '.$product->getFormattedSalePrice().'</span>';
        echo '<span class="original-price">'.$product->getFormattedOriginalPrice().'</span>';
    } else {
        echo $product->getFormattedPrice();
    }
    ?>
            </span>
            <?php 
}
    ?>
            
            <?php //if ($showProductDescription) { ?>
            <!--<div class="product-description">
                <?php //echo $product->getProductDesc()?>
            </div>-->
            <?php //} ?>
	
            <?php //if ($showGroups) {?>
				<!--<div class="product-groups">
					<strong><?php //echo t("Groups")?> : </strong>
					<ul>
					<?php
						//$productgroups = $product->getProductGroups();
						//foreach ($productgroups as $pg) {
					?>
						<li class="product-group"><?php //echo  $pg->gName; ?> </li>
					<?php 
						//}
					?>
					</ul>
				</div>-->
            <?php //} ?>
            
            <?php if ($showDimensions) {
    ?>
            <div class="product-dimensions">
                <strong><?php echo t("Dimensions")?> : </strong>
                <span class="dimensions"><?php echo $product->getDimensions()?></span>
                <?php echo Config::get('vividstore.sizeUnit');
    ?>
            </div>
            <?php 
}
    ?>
            
            <?php if ($showWeight) {
    ?>
            <div class="product-weight">
                <strong><?php echo t("Weight")?> : </strong>
                <span class="weight"><?php echo $product->getProductWeight()?></span>
                <?php echo Config::get('vividstore.weightUnit');
    ?>
            </div>
            <?php 
}
    ?>
            
				<div class="clearfix col-container product-options" id="product-options-<?php echo $bID; ?>">
					<?php if ($product->allowQuantity()) {
		?>
					<div class="product-option-group vivid-store-col-2">
						<label class="option-group-label"><?php echo t('Quantity')?></label>
						<input type="number" name="quantity" class="product-qty" value="1" min="1" step="1" <?php echo($product->allowBackOrders() ? '' :'max="' . $product->getProductQty() . '"');
		?>>
					</div>
						<?php 
	} else {
		?>
						<input type="hidden" name="quantity" class="product-qty" value="1">
					<?php 
	}
		?>
					<?php

					foreach ($optionGroups as $optionGroup) {
						$groupoptions = array();
						foreach ($optionItems as $option) {
							if ($option->getProductOptionGroupID() == $optionGroup->getID()) {
								$groupoptions[] = $option;
							}
						}
						?>
						<?php if (!empty($groupoptions)) {
		?>
							<div class="product-option-group vivid-store-col-2">
								<label class="option-group-label"><?php echo $optionGroup->getName() ?></label>
								<select name="pog<?php echo $optionGroup->getID() ?>">
									<?php
									foreach ($groupoptions as $option) {
										?>
										<option value="<?php echo $option->getID() ?>"><?php echo $option->getName() ?></option>
										<?php
										// below is an example of a radio button, comment out the <select> and <option> tags to use instead
										//echo '<input type="radio" name="pog'.$optionGroup->getID().'" value="'. $option->getID(). '" />' . $option->getName() . '<br />'; ?>
									<?php 
									}
		?>
								</select>
							</div>
						<?php 
	}
					}
		?>
				</div>

            <?php if ($showCartButton) {
    ?>
			<hr>
            <div class="product-button-shell">
			
                <input type="hidden" name="pID" value="<?php echo $product->getProductID()?>">
                    <a href="javascript:vividStore.addToCart(<?php echo $product->getProductID()?>,false)" class="btn btn-primary btn-add-to-cart <?php echo($product->isSellable() ? '' : 'hidden');
    ?> ">
	<i class="fa fa-shopping-cart"></i> &nbsp;
	<?php echo($btnText ? h($btnText) : t("Add to Cart"))?></a>
                    
            </div>
            <?php 
}
    ?>
            
			</div>
		
    </div>
    
</form>

    <script type="text/javascript">
    $(function() {
    $('.product-thumb').magnificPopup({
        type:'image',
        gallery:{enabled:true}
    });

    <?php if ($product->hasVariations() && !empty($variationLookup)) {
    ?>

        <?php
        $varationData = array();
    foreach ($variationLookup as $key=>$variation) {
        $product->setVariation($variation);

        $imgObj = $variation->getVariationImageObj();

        if ($imgObj) {
            $thumb = Core::make('helper/image')->getThumbnail($imgObj, 600, 800, true);
        }

        $varationData[$key] = array(
            'price'=>$product->getFormattedOriginalPrice(),
            'saleprice'=>$product->getFormattedSalePrice(),
            'available'=>($variation->isSellable()),
            'imageThumb'=>$thumb ? $thumb->src : '',
            'image'=>$imgObj ? $imgObj->getRelativePath() : '',
            'weight'=>($product->getProductWeight()),
            'dimensions'=>($product->getDimensions())

            );
    }
    ?>

        $('#product-options-<?php echo $bID; ?> select, #product-options-<?php echo $bID; ?> input').change(function(){
            var variationdata = <?php echo json_encode($varationData); ?>;
            var ar = [];

            $('#product-options-<?php echo $bID; ?> select, #product-options-<?php echo $bID; ?> input:checked').each(function(){
                ar.push($(this).val());
            })

            ar.sort();
            var pdb = $(this).closest('.product-detail-block');

            if (variationdata[ar.join('_')]['saleprice']) {
                var pricing =  '<span class="sale-price"><?php echo t("On Sale"); ?> : '+ variationdata[ar.join('_')]['saleprice']+'</span>' +
                    '<span class="original-price">' + variationdata[ar.join('_')]['price'] +'</span>';
                pdb.find('.product-price').html(pricing);
            } else {
                pdb.find('.product-price').html(variationdata[ar.join('_')]['price']);
            }
			
			if (variationdata[ar.join('_')]['dimensions']) {
				var dimensions = variationdata[ar.join('_')]['dimensions'];
				pdb.find('.dimensions').text(dimensions);
			}
			
			if (variationdata[ar.join('_')]['weight']) {
				var weight = variationdata[ar.join('_')]['weight'];
				pdb.find('.weight').text(weight);
			}

            if (variationdata[ar.join('_')]['available']) {
                //pdb.find('.out-of-stock-label').addClass('hidden');
                pdb.find('.stock-label').addClass('hidden');
                pdb.find('.btn-add-to-cart').removeClass('hidden');
            } else {
                //pdb.find('.out-of-stock-label').removeClass('hidden');
                pdb.find('.stock-label').removeClass('hidden');
                pdb.find('.btn-add-to-cart').addClass('hidden');
            }

            if (variationdata[ar.join('_')]['imageThumb']) {
                var image = pdb.find('.product-primary-image img');

                if (image) {
                    image.attr('src', variationdata[ar.join('_')]['imageThumb']);
                    var link = image.parent();

                    if (link) {
                        link.attr('href', variationdata[ar.join('_')]['image'])
                    }
                }
            }

        });
    <?php 
}
    ?>

});
</script>
   
<?php 
} else {
?>
    <div class="alert alert-info"><?php echo t("We can't seem to find this product at the moment")?></div>
<?php 
} ?>