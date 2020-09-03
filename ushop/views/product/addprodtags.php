<style>
.centertitle_block {
  display:block;
  text-align: center;
}
.right-clear {
  padding-right: 5px;
}
.block .title_block {
  font: 700 14px/22px "Open Sans", sans-serif;
  color: #1d1f1f;
  padding: 0px 11px 15px 0;
  text-transform: uppercase;
  margin: 0 0 2px 0;
}
.block .title_block a,
.block h4 a {
  color: #1d1f1f;
  font: 700 14px/22px "Open Sans", sans-serif;
  color: #1d1f1f;
  padding: 0px 11px 15px 0;
  text-transform: uppercase;
  margin: 0 0 2px 0;
}
.block .title_block a:hover,
.block h4 a:hover {
  color: #fbc800;
  text-decoration: none;
}

.clearfix:before, .clearfix:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}
.clearfix:after {
  clear: both;
}
ul.product_list > li {
  padding-right: 20px;
}
</style>
<script type="text/javascript" src="http://prestashop-demos.org/PRS07/PRS070162/PRS02/themes/PRS070162/js/megnor/owl.carousel.js"></script>

		
<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css"/>
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>

<div class="container self">
	<div class="row mt25">
		<!-- 商品 -->
		<div class="col-sm-12">
			<div id="featured-products_block_center" class="block products_block clearfix">
				<h2 class="centertitle_block"><?php echo $currentTag;?></h2>
				<!-- 產品工具列 -->
				<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."sortPagiBar.php"); ?>
				<!-- /產品工具列 -->
				<?php $isNull = true; ?>
				<?php if( count($lastProducts) > 0 ) { ?>
				<div id="center_column" class="center_column col-xs-12 ">
					<ul class="product_list <?php echo $layout;?> row" style="opacity: 1;">								
						<?php foreach( $lastProducts AS $product ) { ?> 
						<?php if($product["status"] == 3) { 
								$isNull = false;
						?>
						<li class="ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
							<div class="product-container default clearfix" itemscope="" itemtype="http://schema.org/Product">
								<div class="left-block">
									<div class="product-image-container">
										<?php 
											$productHover = $product["src"];
											if( isset($product["value"]->image) && count($product["value"]->image) > 0 )
											if( isset($product["value"]->image) && count($product["value"]->image) > 0 )
											{
												$productHover = $product["value"]->image[0]->url;
											}								
										?>
										<div class="vel-image-more" data-idproduct="<?php echo $product["PID"];?>">
											<?php if( $product["inSOff"] === true ){ echo '<div class="on_sale-tccG9-icon pos-center "></div>'; }?>
											<a href="/product/detail/<?php echo $product["detailKey"];?>" data-fancybox-group="other-views" title="<?php echo $product["name"];?>">
												<img class="img-responsive" src="<?php echo $productHover;?>" alt="<?php echo $product["alt"];?>" title="<?php echo $product["alt"];?>" itemprop="image">
											</a>
										</div>
										<a class="product_img_link" href="/product/detail/<?php echo $product["detailKey"];?>" title="<?php echo $product["name"];?>" itemprop="url">
											<?php if( $product["inSOff"] === true ){ echo '<div class="on_sale-tccG9-icon pos-center "></div>'; }?>
											<img class=" img-responsive" src="<?php echo $product["src"];?>" alt="<?php echo $product["alt"];?>" title="<?php echo $product["name"];?>" itemprop="image">
										</a>
										<a class="new-box" href="/product/detail/<?php echo $product["detailKey"];?>"><span class="new-label">New</span></a>
									</div>
								</div>
								<div class="right-block">
									<h5 itemprop="name">
										<a class="product-name" href="/product/detail/<?php echo $product["detailKey"];?>" title="<?php echo $product["name"];?>" itemprop="url"><?php echo $product["name"];?></a>
									</h5>
									<div class="comments_note clearfix" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">	
										<?php 
											$rawrate = $product["touch"] / $TotalRaty;
											$Astart = ( $rawrate >= 0.2 ) ? "star_on" : "";
											$Bstart = ( $rawrate >= 0.4 ) ? "star_on" : "";
											$Cstart = ( $rawrate >= 0.6 ) ? "star_on" : "";
											$Dstart = ( $rawrate >= 0.8 ) ? "star_on" : "";
											$Estart = ( $rawrate >= 1   ) ? "star_on" : "";
										?>
										<div class="star_content">
											<div class="star <?php echo $Astart;?>"></div>
											<div class="star <?php echo $Bstart;?>"></div>
											<div class="star <?php echo $Cstart;?>"></div>
											<div class="star <?php echo $Dstart;?>"></div>
											<div class="star <?php echo $Estart;?>"></div>
										</div>
									</div>
									<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
										<!-- <span class="old-price product-price nPrice"><?php echo $product["price"];?></span> -->
										<span itemprop="price" class="price product-price dPrice"><?php echo $self == false?$product["price"]:$product["cPrice"];?></span>
									</div>
									<?php
										$desc = "";
										if( isset($product["value"]->description) )
										{
											$desc = mb_substr(strip_tags($product["value"]->description),0,200);
										}
									?>
									<p class="product-desc" itemprop="description"><?php echo $desc;?></p>
									<div class="functional-buttons clearfix">
																					
														<?php if( is_array( $product["stock"] ) ) { ?>
															<select class="formatType-select widget-block form-control" data-pid="<?php echo $product["PID"];?>">
															<?php $fstSel = 0; ?>
															<?php $fstSelTag = "selected"; ?>
															<?php foreach( $product["stock"] AS $k => $row ) { ?>
															<?php 	if( $row["value"] > 0 ) { ?>
															<?php 		$fstSel = $k;?>
																<option value="<?php echo $row["formatType"];?>" <?php echo $fstSelTag;?>> <?php echo $row["formatType"];?></option>
															<?php 		$fstSelTag = ""; ?>
															<?php 	} ?>
															<?php } ?>
															</select>
															<div class="addtocart">	
																<a class="button ajax_add_to_cart_button btn-add-to-cart" data-pid="<?php echo $product["PID"];?>" data-qty="1" data-formatType="<?php echo $product["stock"][$fstSel]["formatType"];?>" rel="nofollow" title="Add to cart" data-id-product="<?php echo $product["PID"];?>">
																<i class="icon icon-shopping-cart"></i><span><?php echo $objLang["product"]["addToCart"];?></span>
																</a>
															</div>
														<?php } else { ?>
															<?php if($product["stock"] == 0) { ?>
															<div class="addtocart">	
																<a href="#" class="button ajax_add_to_cart_button btn-sellout" role="button"><span><?php echo $objLang["product"]["sellOut"];?></span></a>
															</div>
															<?php } else { ?>
															<div class="addtocart">	
																<a class="button ajax_add_to_cart_button btn-add-to-cart" data-pid="<?php echo $product["PID"];?>" data-qty="1" data-formatType="F" rel="nofollow" title="Add to cart" data-id-product="<?php echo $product["PID"];?>">
																<i class="icon icon-shopping-cart"></i><span><?php echo $objLang["product"]["addToCart"];?></span>
																</a>
															</div>
															<?php } ?>
														<?php } ?>	
									</div>
									<div class="product-flags"></div>
								</div>
							</div><!-- .product-container> -->
						</li>
						<?php } else { ?>
						<?php } ?>
						<?php } ?>
					</ul>
				</div>
				<?php } if( $isNull === true ) { ?>
					<div class="block_content"><div class="m15"><center><?php echo $objLang["product"]["CatalogEmpty"];?></center></div></div>
				<?php } ?>
				<!-- 產品分頁 -->
				<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."pagination.php"); ?>
				<!-- /產品分頁 -->	
			</div>
		</div>
		<!-- /商品 -->
	</div>
</div>
<script>
$(function(){	
	$('.touch-raty').raty({
		readOnly   : true,
		score: function() {
			return $(this).attr('data-score');
		}
	});
});
</script>
<script>
$(function(){init_thumbnail});
$( window ).load(init_thumbnail);
$( window ).resize(init_thumbnail);
function init_thumbnail() 
{
	$(".NewsNavTabs-slider .thumbnail").each(function(){
		var w = $(this).outerWidth();
		var h = $(this).outerHeight();
		
		var img = $(this).find("img").eq(0);
		var imgW = img[0].naturalWidth;
		var imgH = img[0].naturalHeight;
		var imgRate = imgW / imgH;
		$(this).css({"overflow":"hidden"});
		var frameRate = w/h;
		var imageRate = imgW/imgH;
		
		var gridLayout = $(this).parent().parent().hasClass("grid-artical");
		if( gridLayout === false )		
		{
			if( frameRate > imageRate ) 
			{
				var newImgH = imgH * ( w / imgW );
				var marginTop = ( parseInt(newImgH) - parseInt(h) ) / 2;
				$(this).find("img").css({"width":w+"px","height":newImgH+"px","margin-top":"-"+marginTop+"px"});
			}
			else
			{
				var newImgW = imgW * ( h / imgH );
				var marginLeft = ( parseInt(newImgW) - parseInt(w) ) / 2;
				$(this).find("img").css({"width":newImgW+"px","height":h+"px","margin-left":"-"+marginLeft+"px"});
			}				
		}
	});
}
</script>