<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js?<?php echo $time;?>"></script>
<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css"/>
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>

<style>
.btn-more {
  margin-top: -36px;
}
.class-title {
  /*margin-left: 32px;*/
}
.class-title * {
  display: inline-block;
}
.class-title H3 {
  color: #777; 
  font-size:20px;
}
.class-title > img {
  position: absolute;
  top: 26px;
  margin-left: -24px;
}
.slider-item .caption {
  padding: 6px 0;
  min-height: 160px;
  height: 160px;
  max-height: 160px;
}
.slider-item .caption * {
  display: inline-block;
}
.slider-item .caption > H3 {
  height: auto;
  overflow: hidden;
  font-size: 18px;
}
.slider-item .caption > .story-desc {
  height: 34px;
  overflow: hidden;
  width: 100%;
  font-size: 15px;
}
.author-section {
  left: 15px;
  bottom: 120px;
  padding-left: 45px;
}

.author-section > img {
  width: 42px;
  height: 42px;
  border-radius: 10px;
  position: absolute;
  margin-left: -45px;
}
.list-article {
  list-style-type:square;
  padding: 0;
  width: 100%;
  margin-top: 10px;
}
.list-article li {
  display:block !important;
  font-size: 18px;
  border-bottom: 1px #DDD solid;
  padding-bottom: 3px;
  height: 30px;
  overflow: hidden;
  padding-left: 22px;
}


.slider-item .caption {
  padding: 6px 0;
  min-height: 260px;
  height: 260px;
  max-height: 260px;
}
.icon-dot {  
  position: absolute;
  margin-top: 5px;
  margin-left: -22px;
  width: 10px;
  margin-top: 10px;
  margin-left: -20px;
}
.caption > H3 > a,
.text-title > a,
.text-title {
  color: #4a89dc;
  font-weight: normal;
}
.author-section > .author-name.touch {
  color: #000;
}
.col-md-6 .slider-item.product-item .caption.text-left ul li a{
	color:#4a89dc;
	font-size: 16px;
    line-height: 32px;
}
.ad-blog-title {
    font-size: 17px;
}
</style>
<div class="container self blog">
	<div class="row">
	
	<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."WHSlider.php"); ?>
	
		<div class="col-md-8">
			<div class="row">
			<!-- 如果該類別尚未定義，對應語系的title欄位，則不顯示 -->
			<?php foreach( $allClassTopFive AS $class ) { ?>	
			<?php 	if( !empty($class["value"][$Lang]["title"]) && $class["listArticle"] && count($class["listArticle"][0]) > 0 ) { ?>
				<div class="col-md-6">
					<div class="slider-item product-item">
						<a href="/blog/index/<?php echo $class["key"];?>"><div class="class-title">
							<!--  <img src="<?php echo $class["icon"][$Lang]["url"];?>" class="icon" />  -->
							<H3><?php echo $class["value"][$Lang]["title"];?></H3>
						</div></a>
						<?php if( count($class["listArticle"]) > 0  ) { ?>
						<a class="btn btn-rounded btn-warning btn-xs pull-right btn-more" href="/blog/index/<?php echo $class["key"];?>"><?php echo $objLang["bloger"]["moreBtn"];?></a>
						<a class="thumbnail" href="/blog/detail/<?php echo $class["listArticle"][0]["id"];?>" style="height: 180px;">
							<img src="<?php echo $class["listArticle"][0]["value"]["url"];?>" alt="<?php echo isset($class["listArticle"][0]["value"]["alt"])?$class["listArticle"][0]["value"]["alt"]:"";?>" style="height: 180px;">
						</a>
						<?php } ?>
						<?php if( count($class["listArticle"]) > 0 ) { ?>
						<div class="caption text-left">
							<h3 class="text-title"><a href="/blog/index/<?php echo $class["key"];?>"><?php echo $class["listArticle"][0]["blog-title"];?></a></h3>	
							
							<?php $arrContent = explode("\n",$class["listArticle"][0]["blog-content"]); ?>
							<div class="story-desc"><?php echo strip_tags($arrContent[0]);?></div>
							<div class="author-section">
							
							
								<img src="<?php echo isset( $class["listArticle"][0]["bloger"]["picture"]["url"] ) ? $class["listArticle"][0]["bloger"]["picture"]["url"] : "" ?>" class="img-rounded" />
								<div class="author-name" style="color:#e91e63;"><?php echo $class["listArticle"][0]["bloger"]["name"];?></div>
								<div class="author-name" style="color:#e91e63;">|</div>
								<div class="author-name" style="color:#e91e63;"><?php echo $objLang["bloger"]["message"].$class["listArticle"][0]["msgCount"];?></div>
								<div class="author-name" style="color:#e91e63;">|</div>
								<div class="author-name touch" style="font-weight:900;"><?php echo $objLang["bloger"]["touch"].$class["listArticle"][0]["touch"];?></div>
								<br />
								<div class="panel-time"><?php echo $objLang["bloger"]["postby"];?><?php echo $class["listArticle"][0]["markDate"];?></div>
							</div>
							
							<?php if ( count($class["listArticle"]) > 1 ) { ?>
							<ul class="list-article">
								<?php for ( $i = 1 ; $i < count($class["listArticle"]) && $i < 4 ; $i++ ) { ?>
								<li><img src="/assets/home/dot.png" class="icon-dot" /><a href="/blog/detail/<?php echo $class["listArticle"][$i]["id"];?>"><?php echo $class["listArticle"][$i]["blog-title"]; ?></a></li>								
								<?php } ?>
							</ul>
							<?php } ?>
							<div class="clearfix"></div>
						</div>
						<?php } ?>
					</div>
				</div>
			<?php 	} ?>
			<?php } ?>
			</div>
		</div>
		<div class="col-md-4">
			<!-- 熱門文章 -->
			<div class="block-title" ><?php echo $objLang["bloger"]["hotNews"];?><!--<a class="btn btn-rounded btn-warning btn-xs pull-right btn-more">更多</a>--></div>
			<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."blog" . DIRECTORY_SEPARATOR ."articleList.php"); ?>
			<!-- /熱門文章 -->
			
			<!-- 相關部落客 -->
			<div class="block-title" ><?php echo $objLang["bloger"]["relbloger"];?><!--<a class="btn btn-rounded btn-warning btn-xs pull-right btn-more">更多</a>--></div>
			<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."blog" . DIRECTORY_SEPARATOR ."blogList.php"); ?>						
			<!-- /相關部落客 -->
			
			<!-- AD區塊 --><!--
			<div class="block-title mt15" style="margin-left:-15px;margin-bottom:0;margin-right:-15px;"><?php echo $objLang["catelog"]["newsAct"];?><div class="more"></div></div>
			<div class="ad-slider-block row">
				<div id="my-slide-ad">
				<?php $sliderKey = 0; ?>
				<?php foreach( $activityWidgetSlider AS $slider ) { ?>
					<div onclick="redirect('<?php echo $slider["value"]["href"];?>');" data-lazy-background="<?php echo $slider["value"]["image"]["url"];?>" slider-type="image" slider-key="<?php echo $sliderKey;?>" style="cursor:pointer;"></div>
				<?php 	$sliderKey++; ?>
				<?php } ?>
				</div>
			</div>-->
			<!-- /AD區塊 -->
		</div>
	</div>
</div>
<script>

var param = {};
$(function(){
	$('.ad-raty').raty({
		readOnly   : true,
		score: function() {
			return $(this).attr('data-score');
		}
	});
	param = {
		width: 300,
		height: 400,
		userCSS: false,
		transitionSpeed: 1000,
		duration: 6000,
		showNavigation: false,
		classNavigation: undefined,
		navigationColor: '#797979',
		navigationHoverColor: '#A9A9A9',
		navigationHighlightColor: '#DFDFDF',
		navigationNumberColor: '#000000',
		positionNavigation: 'in-center-bottom',
		navigationType: 'circle',
	    showControl: false,
	    classButtonNext: "slider-control-next",
	    classButtonPrevious: "slider-control-previous",
		controlColor: '#FFFFFF',
		controlBackgroundColor: '#000000',
		showProgress: false,
		progressColor: '#797979',
		positionControl: 'left-right',
		transition: 'slide-left'
	};
	$('#my-slide-ad').DrSlider(param);
});

</script>
<script>
$(function(){init_thumbnail});
$( window ).load(init_thumbnail);
$( window ).resize(init_thumbnail);
function init_thumbnail() 
{
	$(".thumbnail").each(function(){
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
	
	$(".ad-item .col-xs-4");
}
</script>