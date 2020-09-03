
<style>

.caption > H3 {
  margin-top: 5px;
  margin-bottom: 5px;
  height: auto;
  cursor: pointer;
}
.caption {
  width: 250px;
  max-width: 100%;
  text-align: center;
  margin: 0 auto;
}
.btn-add-to-cart {
  font-size: 16px;
  padding: 6px;
}
.slider-block {
  padding: 0 38px;
}
</style>
<div class="container section mt15" style="position: relative;">
<?php if( count($ProductNavTabs["listProduct"]) > 0 ) { ?>
	<div class="slider-block">
		<div class="slider productNavTabs-slider" data-sliderCount="<?php echo count($ProductNavTabs["listProduct"]);?>">
		<?php foreach( $ProductNavTabs["listProduct"] AS $product ) { ?>
			<div class="slider-item product-item">
				<a class="thumbnail" href="/product/detail/<?php echo $product["detailKey"];?>" style="height: 180px;">
					 <?php if($product['inSOff']) { ?><div class="on_sale-tccG9-icon pos-center "></div><?php } ?>
					<img src="<?php echo $product["src"];?>" alt="<?php echo $product["alt"];?>" style="height: 180px;">
				</a>
				<div class="caption">
					<p class="spec1"><?php echo isset($product["value"]->title)?$product["value"]->title:"";?></p>
					<h3><a href="/product/detail/<?php echo $product["detailKey"];?>"><?php echo $product["name"];?></a></h3>
					<?php if( $self == false ) { ?>
					<div class="ad-price" style="display: inline-block;">  <span class="dPrice"><?php echo $product["price"];?></span></div>	
					<?php } else { ?> 
					<div class="ad-price" style="display: inline-block;">  <span class="nPrice"><?php echo $product["price"];?></span> <span class="dPrice"><?php echo $product["cPrice"];?></span></div>	
					<?php } ?>
					<div class="text-center mt15">
					<?php if( is_array( $product["stock"] ) ) { ?>
						<select class="formatType-select form-control" data-pid="<?php echo $product["PID"];?>">
						<?php foreach( $product["stock"] AS $row ) { ?>
							<option value="<?php echo $row["formatType"];?>"> <?php echo $row["formatType"];?></option>
						<?php } ?>
						</select>
						<a href="#" class="btn btn-rounded btn-default btn-more-info btn-add-to-cart" data-pid="<?php echo $product["PID"];?>" data-qty="1" data-formatType="<?php echo $product["stock"][0]["formatType"];?>"> <?php echo $objLang["product"]["addToCart"];?> </a>
					<?php } else { ?>
						<?php if($product["stock"] == 0) { ?>
						<a href="#" class="btn btn-default btn-sellout " role="button"><?php echo $objLang["product"]["sellOut"];?></a>
						<?php } else { ?>
						<a href="#" class="btn btn-rounded btn-default btn-more-info btn-add-to-cart" data-pid="<?php echo $product["PID"];?>" data-qty="1" data-formatType="F"> <?php echo $objLang["product"]["addToCart"];?> </a>
						<?php } ?>
					<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
<?php } ?>
</div>
<?php if( isset($viewmode) && $viewmode === true ) { ?> 
<script>
window.onload = function(){
	var zoom = ( $(".grid-container-block").outerWidth() / 1400 );
	$(".grid-container-1113").css({'zoom': zoom });
	$(".grid-block").click(function(){
		location.href = $(this).attr("data-href");
	});
	var sliderCount = $('.productNavTabs-slider').attr("data-sliderCount");
	$('.productNavTabs-slider').slick({
		  dots: false,
		  infinite: false,
		  autoplay: true,
		  centerMode: false,
		  focusOnSelect: true,
		  autoplaySpeed: 2000,
		  speed: 1000,
		  slidesToShow:( sliderCount > 4 ) ? 4:sliderCount,
		  slidesToScroll: ( sliderCount > 4 ) ? 4:sliderCount,
		  responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow:( sliderCount > 2 ) ? 2:sliderCount,
				slidesToScroll: ( sliderCount > 2 ) ? 2:sliderCount
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: ( sliderCount > 1 ) ? 1:sliderCount,
				slidesToScroll: ( sliderCount > 1 ) ? 1:sliderCount
			  }
			}
		  ]
		});
}
</script>
<?php } ?>