<?php	
	include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."activitySlider.php");
?>
	<link rel="stylesheet" type="text/css" href="/libs/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/libs/slick/slick-theme.css"/>
	
	<script type="text/javascript" src="/libs/slick/slick.js"></script>
	<script type="text/javascript" src="/assets/jquery.countdown.min.js"></script>
	
<style>
.activity-container .block-title {
  text-align: center;
  color: #fff;
  background-color: #AAA;
  border-bottom: none;
  padding: 8px 0;
  font-size: 22px;
  margin-top: 0;
}
.title-star {
  background-image: url('/assets/act/stars.png');
  width: 50px;
  height: 23px;
  background-repeat: no-repeat;
  display: inline-block;
  position: absolute;
  margin-top: 4px;
}
.title-star.left {
  margin-left: -60px;
}
.title-star.right {
  margin-left: 10px;
}
.inner-block {
  padding: 0 38px;
}
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
.slick-initialized .slick-slide {
  display: block;
  height: 340px;
}
.social-tools {
  height: 24px;
  overflow: hidden;
}
.slick-slider {
  margin-bottom: 0;
}
.countdown-list {
  position: absolute;
  top: 0;
  margin-left: 50%;
}
.countdown-list:after {
  content: " ";
  background: url('/assets/act/flagged_bottom.png');
  display: block;
  width: 100%;
  height: 10px;
  background-size: 100%;
  background-repeat: no-repeat;
  margin-top: -5px;
}
.countdown-list > div > .date {
  display:inline-block;
}
.countdown-list > div > .title {
  display:block;
}
.countdown-list > span {
  display: block;
  text-align: center;
  color: #fff;
  background-color: #000;
  border: 3px solid #000;
  padding: 5px;
}
.date-block {
  font-size: 18px;
  color: #000;
  font-weight: bold;
  background-color: #fff;
  border: 3px solid #000;
  border-bottom: none;
  padding: 5px;
}
.cdTime {
  color: #FFF70C;
  font-size: 18px;
  display:inline-block;
  font-weight: bold;
}
</style>
	<?php
	$first = "";
	foreach($PromotionBlock AS $block) { 
		if( count($block["value"]["listProductDetail"]) > 0 ) {
	?>
	<div class="activity-container <?php echo $first;?>">
		<div class="block-title"><i class="title-star left"></i><?php echo $block["value"]["title"];?><i class="title-star right"></i></div>
	</div>
<div class="container activity-container">
	<div class="inner-block">
		<div class="slider menu-slider" data-sliderCount="<?php echo count($block["value"]["listProductDetail"]);?>">
	<?php foreach( $block["value"]["listProductDetail"] AS $product ) {  ?>
			<div class="slider-item product-item">				
				<a class="thumbnail" href="/product/detail/<?php echo $product["detailKey"];?>" style="height: 180px;">
					<img src="<?php echo $product["src"];?>" alt="<?php echo $product["alt"];?>" style="height: 180px;">
					<?php if($product['inSOff']) { ?>
					<div class="countdown-list">
						<!--
						<div class="text-center date-block">
							<div class="date"><?php echo date("m/d",strtotime($product["inSOffBegin"]));?></div> - 
							<div class="date"><?php echo date("m/d",strtotime($product["inSOffEnd"]));?></div>
							<div class="title"><?php echo $objLang["product"]["soffTitle"];?></div>
						</div>
						-->
						<span class="clock" end-date="<?php echo $product["inSOffEnd"];?>"></span>						
					</div>
					<?php } ?>
				</a>
				<div class="caption">
					<p class="spec1"><?php echo isset($product["value"]->title)?$product["value"]->title:"";?></p>
					<h3><a href="/product/detail/<?php echo $product["detailKey"];?>"><?php echo $product["name"];?></a></h3>
					<?php if( $self == false ) { ?>
					<div class="ad-price" style="display: inline-block;">  <span class="dPrice"><?php echo $product["price"];?></span></div>	
					<?php } else { ?> 
					<div class="ad-price" style="display: inline-block;">  <span class="nPrice"><?php echo $product["price"];?></span> <span class="dPrice"><?php echo $product["cPrice"];?></span></div>	
					<?php } ?>
					<div class="text-center mt10 mb10">
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
	</div>
</div>
	<?php 
			$first = " mt15";
		}
	} ?>
	</div>
<script>
var sliderCount = <?php echo $sliderCount;?>;
$(function(){
	 $('.countdown-list').each(function(){
		var endDate = $(this).find(".clock").attr("end-date");
		//console.log();
		var position = $(this).parent().find("img").position();
		//$( this ).css({"left" : position.left, top: position.top });
		$(this).find(".clock").countdown(endDate, function(event) {
			$(this).html(event.strftime('<div class="title">' + objLang.product.countdownTitle + '</div><div class="cdTime">%D</div>' + objLang.product.day + '<div class="cdTime">%-H</div>' + objLang.product.hour + '<div class="cdTime">%M</div>' + objLang.product.minute + '<div class="cdTime">%S</div>' + objLang.product.second + ''));
		});
	 });
});
window.onload = function() {
	$('.menu-slider').each(function(){
		sliderCount = $(this).attr("data-sliderCount");
		$(this).slick({
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
		})
	});
}
</script>