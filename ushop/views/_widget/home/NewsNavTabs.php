
<style>

.caption > H3 {
  margin-top: 5px;
  margin-bottom: 5px;
  height: auto;
  cursor: pointer;
  height: 38px !important;
  overflow: hidden;
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
.text-desc {
  height: 41px;
  overflow: hidden;
}
.author-section {
  position: absolute;
  bottom: 0;
  left: 10px;
  padding-left: 35px;
  height: 70px;
}
.author-section * {
  display:inline-block !important;
}
.author-section > .author-name {
  font-weight: bold;
  color: #1a8559;
  font-size: 12px;
  vertical-align: top;
}
.author-section > .author-name.touch {
  color: #000;
}

.author-section > img {
  width: 42px;
  height: 42px;
  border-radius: 10px;
  position: absolute;
  left: -12px;
}
.caption {
  position: relative;
}
.author-section > .panel-time {
  font-size: 8px;
}
.class-title {
  position: relative;
  width: 300px;
  max-width: 100%;
  text-align: center;
  margin: 0 auto;
  margin-bottom:15px;
  color: #777;
}
.class-title H3:hover {
  text-decoration: underline;
}
.class-title * {
  display: inline-block !important;
}
.class-title img.icon {
  position: absolute;
  top: -2px;
}
.class-title H3 {
  margin: 0;
  padding: 0;
  margin-left: 28px;
}
.product-item {
  padding: 10px;
}

.NewsNavTabs-slider .thumbnail {
  height: 180px;
  overflow: hidden;
  width: 310px;
}
.NewsNavTabs-slider .class-title {
  margin-top: 10px;
  margin-bottom: 10px;
  text-align: left;
  width: 310px;
}
.NewsNavTabs-slider .caption {
  width: 310px;
  max-width: 100%;
  text-align: center;
  margin: 0 auto;
}
.NewsNavTabs-slider .caption > H3 {
  margin-top: 10px;
  margin-bottom: 10px;
}
.NewsNavTabs-slider .caption > H3 > a {
  color: #4a89dc;
}
.NewsNavTabs-slider .text-desc {
  height: 38px;
  overflow: hidden;
}
@media (max-width: 1400px) {
.NewsNavTabs-slider .thumbnail {
  height: 180px;
  overflow: hidden;
  width: 237px;
}
}
@media (max-width: 1400px) {
.NewsNavTabs-slider .thumbnail {
  height: 180px;
  overflow: hidden;
  width: 237px;
}
}
@media (max-width: 1150px) {
.NewsNavTabs-slider .thumbnail {
  height: 180px;
  overflow: hidden;
  width: 199px;
}
}
@media (max-width: 1024px) {
.NewsNavTabs-slider .thumbnail {
  height: 180px;
  overflow: hidden;
  width: 306px;
  margin: 0 auto;
}
}
@media (max-width: 450px) {
.NewsNavTabs-slider .thumbnail {
  height: 180px;
  overflow: hidden;
  width: 210px;
  margin: 0 auto;
}
}
</style>
<div class="container section mt15" style="position: relative;">
<?php if( count($listNews) > 0 ) { ?>
	<div class="block-title"><?php echo $objLang["function_bar"]["newsBlog"];?></div>
	<a class="section-title more btn btn-rounded btn-info" href="/blog"><?php echo $objLang["function_bar"]["readMore"];?></a>
	<?php 
		$style = count($listNews) < 4 ? 'style="padding:0;"' : '';
	?>
	<div class="slider-block" <?php echo $style;?>>
		<div class="slider productNavTabs-slider NewsNavTabs-slider" data-sliderCount="<?php echo count($listNews);?>">
		<?php foreach( $listNews AS $news ) { ?>
			<div class="slider-item product-item">
				<a href="/blog/index/<?php echo $news["classKey"];?>"><div class="class-title">
					<img src="<?php echo $news["classIcon"][$Lang]["url"];?>" class="icon" />
					<H3><?php echo $news["classValue"][$Lang]["title"];?></H3>
				</div></a>
				<a class="thumbnail" href="/blog/detail/<?php echo $news["id"];?>" style="height: 180px;">
					<img src="<?php echo $news["blog-extra"]["url"];?>" alt="<?php echo isset($news["blog-extra"]["alt"])?$news["blog-extra"]["alt"]:"";?>" style="height: 180px;">
				</a>
				<div class="caption text-left">
					<h3 class="text-title"><a href="/blog/index/<?php echo $news["classKey"];?>"><?php echo $news["blog-title"];?></a></h3>	
					<div class="text-desc story-desc"><?php echo strip_tags($news["blog-content"]);?></div>
					<div class="author-section">
						<img src="<?php echo $news["bloger"]["picture"]["url"];?>" class="img-rounded" />
						
						<div class="author-name"><?php echo $news["bloger"]["name"];?></div>					
						<div class="author-name">︱</div>
						<div class="author-name"><?php echo $objLang["bloger"]["message"];?> <?php echo $news["msgCount"];?></div>
						<div class="author-name">︱</div>
						<div class="author-name touch"><?php echo $objLang["bloger"]["touch"];?> <?php echo $news["touch"];?></div>	
						<br/>						
						<div class="panel-time"><?php echo $objLang["bloger"]["postby"];?><?php echo $news["markDate"];?></div>
					</div>
					<div class="clearfix"></div>
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