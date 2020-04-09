<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductVariation\ProductVariation as StoreProductVariation;
?>
		<?php
		if ($products) {
		?>
		<div id="jplist_nsr" class="jplist padding-top0" style="padding-bottom:0px!important;">
		
            <!-- panel-full -->			
			<div class="panel-full">
				<div class="jplist-panel">

					<!-- sort dropdown -->
					<div
							class="jplist-drop-down"
							data-control-type="sort-drop-down"
							data-control-name="sort"
							data-control-action="sort"
							data-control-animate-to-top="true"
							data-datetime-format="{month}/{day}/{year}"> <!-- {year}, {month}, {day}, {hour}, {min}, {sec} -->

						<ul>
							<li><span data-path="default">Sort by</span></li>
							<li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
							<li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
							<!--<li><span data-path=".desc" data-order="asc" data-type="text">Description A-Z</span></li>
							<li><span data-path=".desc" data-order="desc" data-type="text">Description Z-A</span></li>
							<li><span data-path=".like" data-order="asc" data-type="number" data-default="true">Likes asc</span></li>
							<li><span data-path=".like" data-order="desc" data-type="number">Likes desc</span></li>
							<li><span data-path=".date" data-order="asc" data-type="datetime">Date asc</span></li>
							<li><span data-path=".date" data-order="desc" data-type="datetime">Date desc</span></li>-->
						</ul>
					</div>
					
					<!-- views -->
					<div 
					   class="jplist-views" 
					   data-control-type="views" 
					   data-control-name="views" 
					   data-control-action="views"
					   data-default="jplist-grid-view">
					   
					   <button type="button" class="jplist-view" data-type="jplist-list-view"><i class="fa fa-th-list"></i></button>
					   <button type="button" class="jplist-view" data-type="jplist-grid-view"><i class="fa fa-th-large"></i></button>
					</div>	

					<!-- filter by title -->
					<div class="text-filter-box" style="float:right; width:250px;">
							<input style="width:100%;"
								data-path=".title"
								type="text"
								value=""
								placeholder="Filter by Title"
								data-control-type="textbox"
								data-control-name="title-filter"
								data-control-action="filter"
							/>
					</div>
				
				</div>
            </div>

			<!-- panel-mobile -->	
			<div class="wrap-mobile">
				<div class="panel-mobile">
											
					<div class="jplist-panel-mobile">

						<!-- sort dropdown -->
						<div
								class="jplist-drop-down"
								data-control-type="sort-drop-down"
								data-control-name="sort"
								data-control-action="sort"
								data-datetime-format="{month}/{day}/{year}"> <!-- {year}, {month}, {day}, {hour}, {min}, {sec} -->

							<ul>
								<li><span data-path="default">Sort by</span></li>
								<li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
								<li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
								<!--<li><span data-path=".desc" data-order="asc" data-type="text">Description A-Z</span></li>
								<li><span data-path=".desc" data-order="desc" data-type="text">Description Z-A</span></li>
								<li><span data-path=".like" data-order="asc" data-type="number" data-default="true">Likes asc</span></li>
								<li><span data-path=".like" data-order="desc" data-type="number">Likes desc</span></li>
								<li><span data-path=".date" data-order="asc" data-type="datetime">Date asc</span></li>
								<li><span data-path=".date" data-order="desc" data-type="datetime">Date desc</span></li>-->
							</ul>
							
						</div>
					</div>
				
					<div class="jplist-ios-button">
						&nbsp;
						<i class="fa fa-search"></i>
						&nbsp;
					</div>

					<div class="jplist-panel boxjp panel-top">

						<div style="width:100%; margin-bottom:10px;"></div>
						<!-- filter by title -->
						<div class="text-filter-box">
								<input style="width:100%; margin-bottom:10px;"
									data-path=".title"
									type="text"
									value=""
									placeholder="Filter by Title"
									data-control-type="textbox"
									data-control-name="title-filter"
									data-control-action="filter"
								/>
						</div>

					</div>
			
				</div>
			</div>
			
			<?php
				echo "<div class='list boxjp list-mobile'>";
				$i=1;
				foreach ($products as $product) {
					$optionGroups = $product->getProductOptionGroups();
			?>
			
					<div class="col-xs-6 col-sm-4 list-item">		
					
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
										
										<?php if ($showDescription) { ?>
											<div class="desc" style="display:none"><?php echo $product->getProductDesc()?></div>
										<?php } ?>
										
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
												<span style="display:none">&nbsp; <?php echo t("More Details") ?><span>
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
													<span style="display:none">&nbsp; <?php echo t("Add to Cart") ?><span>
												</a>
											<?php }else{ ?>
												<a data-toggle="tooltip" data-original-title="<?php echo t("Add to Cart") ?>" href="javascript:vividStore.addToCart(<?php echo $product->getProductID()?>,'list')" class="btn btn-primary btn-add-to-cart">
													<i class="fa fa-shopping-cart"></i>
													<span style="display:none">&nbsp; <?php echo t("Add to Cart") ?><span>
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
				
			<?php 
				$i++;
				}
			?>
				</div>
				<div class="boxjp jplist-no-results">
					<div class="col-xs-12 col-sm-12"><?php echo t("No Results Found")?></div>
				</div>
			<?php
			}
			else 
			{
			?>
				<div class="alert alert-info"><?php echo t("No Products Available")?></div>
			<?php 
			} 
			?>
			
		</div>
