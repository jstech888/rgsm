	<?php
		$ProductNavTabs_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "ProductNavTabs" . DIRECTORY_SEPARATOR;
		$temp_ProductNavTabs_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "ProductNavTabs" . DIRECTORY_SEPARATOR . $Lang . ".json";		
		$ProductNavTabs_lang_path=(!file_exists($temp_ProductNavTabs_lang_path))?LANGPATH . "widget" . DIRECTORY_SEPARATOR . "ProductNavTabs" . DIRECTORY_SEPARATOR . DEFAULTLANG . ".json":$temp_ProductNavTabs_lang_path;		
		$obj_ProductNavTabs_lang = json_decode( file_get_contents($ProductNavTabs_lang_path),true );
		
		
	?>
<style>
	.grid-block-product-list {
		text-align: center;
	}
	.purchasable {
	  margin: 0 auto;
	  float: none;
	  display: inline-block;
	}
</style>
<div class="row grid-block-product-list">
	<?php
		foreach( $productList AS $product )
		{
	?>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 featured shipping-taxable purchasable ">
		<div class="product-block product product-grid">
			<div class="product-inner">
				<div class="image">
					<a href="<?php echo $product['href'];?>">
						<img src="<?php echo base_url($product['src']);?>" class="image-no-effect wp-post-image" alt="<?php echo base_url($product['alt']);?>">    		</a>
						
					<?php
						if($product['inSOff'])
						{
					?>
					<div class="on_sale-tccG9-icon"></div>
					<?php
						}
					?>
				</div>
				<div class="product-meta">
					<div class="warp-info">
						<?php	
							if($product['price'] == $product['cPrice'])
							{
						?>
						<div class="price"><?php echo $obj_ProductNavTabs_lang['price'] ?><span class="amount product-gridBlock-price"><?php echo $product['price'];?></span></div>
						<?php
							}
							else
							{
						?>
						<div class="basic-price"><?php echo $obj_ProductNavTabs_lang['price'] ?><span class="amount product-gridBlock-price"><?php echo $product['price'];?></span></div>
						<div class="price"><?php echo $obj_ProductNavTabs_lang['discountPrice'] ?><span class="amount product-gridBlock-price"><?php echo $product['cPrice'];?></span></div>		
						<?php
							}								
						?>
						<h3 class="name">
							<a href="<?php echo $product['href'];?>"><?php echo $product['name'];?></a>
						</h3>	
						<?php 
							if( $product['stock'] > 0 )
							{
						?>
						<!--add-to-cart-->	
						<button class="btn btn-default ladda-button add-to-cart add_to_cart_button" data-style="slide-up" data-product_id="<?php echo $product['PID'];?>" data-product_sku="" data-quantity="1">
							<span class="fa fa-plus"></span>
							<span class="ladda-label"><?php echo $obj_ProductNavTabs_lang['addToCart'] ?></span>
							<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
						</button>		
						<?php
							}
							if( $product['stock'] == 0 )
							{
						?>
						<button class="btn btn-warring ">
							<span class="ladda-label"><?php echo $obj_ProductNavTabs_lang['sellOut'] ?></span>
						</button>	
						<?php
							}
						?>     
					</div>            
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	?>
</div>
<script>
	$(function(){
		$('.product-gridBlock-price').formatCurrency({ colorize:true, region: 'zh-TW' });
	});
</script>