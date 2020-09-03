
<link rel="stylesheet" type="text/css"
	href="/libs/devrama.slider/devrama-slider.css" />
<script type="text/javascript"
	src="/libs/devrama.slider/jquery.devrama.slider.js?<?php echo time();?>"></script>

<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>

<style>
.artical-block .ad-image {
	width: 180px;
	height: 160px;
	vertical-align: middle;
	display: table-cell;
	float: none;
	background-size: 180px 160px;
	background-repeat: no-repeat;
}

.middleMaxnail a, .middleMaxnail {
	overflow: hidden;
	width: 100%;
	height: 160px;
	max-height: 160px;
	display: inline-block;
}

.middlenail {
	overflow: hidden;
	width: 180px;
	height: 150px;
	max-height: 150px;
}

.artical-block .ad-image img.img-responsive {
	max-width: none;
	max-height: none;
}

.row-1 .ad-image .middlenail {
	width: 300px;
	height: auto;
	max-height: 250px;
}

.breadcrumb {
	text-align: left;
}

.item-story {
	margin: 15px;
	width: 270px;
	float: left;
	border: 1px solid #C6C6C6;
}

.caption {
	min-height: 70px;
	height: 70px;
	max-height: 70px;
	overflow: hidden;
	padding: 5px 15px;
}

.item-story-block {
	
}

#my-slide {
	padding: 0px;
}

.breadcrumb.breadcrumb-blog-class>li+li:before {
	content: "/";
	padding: 0 15px;
	color: #000000;
	font-weight: bold;
}

.list-artical, .grid-artical {
	position: relative;
	display: inline-block;
	float: none;
	margin: 0 auto;
}

.ml0 {
	margin-left: 0px;
}

.ad-title {
	font-size: 17px;
	color: #4a89dc;
	text-decoration: none;
}

.ad-title:hover {
	color: #4a89dc;
	text-decoration: none;
}

.grid-artical {
	width: 880px;
	margin: 0 auto;
}

.grid-artical .item-story.ml0 {
	width: 280px;
	display: inline-block;
	float: none;
	margin: 0 5px;
	margin-top: 10px;
}

.grid-artical .thumbnail {
	margin-top: 5px;
	margin-bottom: 5px;
	height: 160px;
}

.grid-artical .thumbnail img {
	height: 160px;
}

.grid-artical .caption {
	padding: 0px 10px;
	text-align: left !important;
}

.grid-artical .caption>H3 {
	font-weight: normal;
	font-size: 16px;
}

.item-story-1 {
	
}

.artical-block>.row.table-layout {
	padding-bottom: 10px;
	border-bottom: 1px solid #DDD;
	height: auto;
	margin-top: 10px;
}

.artical-block .ad-image {
	width: 23%;
	height: auto;
	vertical-align: middle;
	display: table-cell;
	float: left;
}

.artical-block .info-block {
	width: 77%;
	vertical-align: top;
	float: left;
}

/* .artical-block .info-block * { */
/* 	text-align: left !important; */
/* } */

.artical-block .info-block .ad-title {
	font-size: 18px;
	color: #4687df;
	text-decoration: none;
	display: block;
}

.story-desc {
	display: inline-block;
	height: auto;
	max-height: 40px;
}

.readMore {
	color: #4a89dc;
	display: inline-block !important;
	float: none !important;
}

.story-desc * {
	display: inline-block !important;
}

.artical-block .row-1 .info-block {
  width: 65%;
}

.row-1 .ad-image {
	width: 35%;
	height: auto;
	float: left;
}

.row-1 .ad-title {
	font-weight: normal;
}

.info-block {
	position: relative;
}

.social-tools {
	position: absolute;
	right: 0;
	bottom: 0px;
}

.readMore {
	display: block;
	text-align: right;
}

.readMore:hover {
	text-decoration: none;
}

.author-section {
	position: absolute;
	bottom: 25px;
	left: 10px;
	padding-left: 35px;
}

.author-section * {
	display: inline-block;
}

.author-section>.author-name {
	font-weight: normal;
	color: #f70788;
	font-size: 12px;
}

.author-section>.author-name.touch {
	color: #000;
}

.author-section>img {
	width: 42px;
	height: 42px;
	border-radius: 10px;
	position: absolute;
	margin-left: -45px;
}

.layou-tools {
	position: absolute;
	top: 0;
	right: 16px;
}

span.story-desc {
	display: inline-block;
	height: auto;
	max-height: none;
	min-height: 120px;
}

.layou-tools .btn {
	border-color: #FFFFFF;
	border-top-width: 2px;
	background-color: #f0f0f0;
	background-image: none;
}

.layou-tools .btn.active {
	border-color: #FFFFFF;
	color: #9775ac;
	background-color: #fff;
	text-shadow: none;
}

.story-desc {
	font-size: 14px;
}

.story-desc * {
	margin: 0;
}

@media ( max-width : 1400px) {
	.ad-item img.product-image {
		height: auto;
		vertical-align: middle;
		margin: 0 auto;
	}
	.grid-artical {
		width: 100%;
		margin: 0 auto;
	}
	.story-desc.first {
		min-height: 130px;
		max-height: 130px;
		overflow: hidden;
	}
	span.story-desc {
		min-height: 90px;
		max-height: 60px;
		overflow: hidden;
	}
}

@media ( max-width : 1150px) {
	.layou-tools {
		position: absolute;
		top: -6px;
		right: 16px;
	}
	.artical-block .info-block>.story-desc.first {
		min-height: 65px !important;
		max-height: 65px !important;
		overflow: hidden;
	}
}

@media ( max-width : 992px) {
	.ad-item img.product-image {
		height: auto;
		vertical-align: middle;
		margin: 0 auto;
	}
}

@media ( max-width : 992px) {
	.story-desc.first {
		max-height: 45px;
		overflow: hidden;
	}
	.artical-block .info-block .ad-title {
		font-size: 15px;
	}
	.row-1 .ad-image {
		width: 30%;
		height: auto;
	}
	.artical-block .ad-image {
		width: 30%;
		height: auto;
		vertical-align: middle;
		display: table-cell;
		float: left;
	}
	.row-1 .ad-image img.img-responsive {
		max-height: 160px;
	}
	.social-tools {
		position: absolute;
		right: 0;
		bottom: 0;
	}
	.row-1 .ad-image .middlenail {
		width: 180px;
		height: 150px;
		max-height: 150px;
	}
	.artical-block .info-block .ad-title {
		max-height: 22px;
		overflow: hidden;
	}
	span.story-desc {
		min-height: 54px;
		max-height: 60px;
	}
	.story-desc.first {
		max-height: 65px;
		overflow: hidden;
	}
	.artical-block .info-block {
    width: 70%;
    vertical-align: top;
    float: left;
  }
}

.row {
	margin-right: 0px;
	margin-left: 0px;
}

.row.table-layout.ad-item {
	border-bottom: 1px solid #DDD;
}

@media screen and (min-width: 992px) and (max-width: 1439px) {
	.row-1 .ad-image .middlenail {
		width: 86%;
		height: 185px;
		max-height: 250px;
	}
	.artical-block .ad-image {
		width: 35%;
		height: auto;
		vertical-align: middle;
		display: table-cell;
		float: left;
	}
	.artical-block .info-block>.story-desc.first {
		min-height: 110px !important;
		max-height: !important;
		overflow: hidden;
	}
	.author-section {
/* 		position: absolute; */
    position: relative;
/* 		bottom: 25px; */
		bottom: 15px;
		left: 10px;
		padding-left: 35px;
	}
	.social-tools {
		position: absolute;
		right: 0;
		bottom: -10px;
	}
	.artical-block .info-block {
    width: 65%;
    vertical-align: top;
    float: left;
  }
}

@media screen and (min-width: 700px) and (max-width: 991px) {
	.author-section {
		position: absolute;
		position: relative;
/* 		bottom: -25px; */
    bottom: 5px;
		left: 10px;
		padding-left: 35px;
	}
	.social-tools {
		position: absolute;
		position: relative;
		right: 0;
/* 		bottom: -65px; */
	}
}

@media screen and (max-width: 699px) {
	.artical-block .ad-image {
		width: 30%;
		height: auto;
		vertical-align: middle;
		display: table-cell;
		float: none;
	}
	.artical-block .info-block {
		width: 100%;
		vertical-align: top;
		float: none;
	}
	.row-1 .ad-image .middlenail {
		width: 180px;
		height: auto;
		max-height: 150px;
		margin: auto;
	}
	.artical-block .row-1 .info-block {
		width: 100%;
		vertical-align: top;
		float: none;
/* 		margin: 74px 4px; */
		margin-top: 10px;
	}
	.middlenail {
		overflow: hidden;
		width: 180px;
		height: 150px;
		max-height: 150px;
		margin: auto;
	}
	.author-section {
		position: absolute;
		position: relative;
/* 		bottom: -25px; */
    bottom: 0;
		left: 10px;
		padding-left: 35px;
		padding-top: 5px;
    padding-bottom: 10px;
	}
	.social-tools {
		position: absolute;
		position: relative;
		right: 0;
/* 		bottom: -75px; */
	}
	.artical-block .info-block>.story-desc.first {
		min-height: 100px !important;
		max-height: 65px !important;
		overflow: hidden;
	}
	span.story-desc {
		min-height: 70px;
		max-height: 60px;
	}
}

.artical-block .info-block>.story-desc.first {
	min-height: 150px;
	overflow: hidden;
}

.fa-th:before {
	display: inline-block;
	font-family: "FontAwesome";
	content: "\f009";
}

img.img-responsive.responsive {
	margin-left: 0px !important;
	width: 100% !important;
	height: auto !important;
}
</style>
<div class="container">
	<div class="section mt25">
		<!-- 麵包屑 -->
		<div class="text-right">
			<ol class="breadcrumb">
				<li><a href="/"><?php echo $objLang['shoppingcart']["home"];?></a></li>
				<li class="icon"><a
					href="/blog/index/<?php echo $currentClass["key"];?>"><?php echo $currentClass["value"][$Lang]["title"];?></a></li>
			</ol>
			<div class="clearfix"></div>
		</div>
		<!-- /麵包屑 -->
		<!-- BANNER -->
		<div id="my-slide" class="banner-block">
	<?php  foreach( $currentClass["banner"][$Lang]["slider"] AS $k => &$slider ) { ?>
		<div data-lazy-background="<?php echo $slider["url"];?>"
				slider-type="image" slider-key="<?php echo $k;?>"></div>
	<?php } ?>
	</div>
		<!-- /BANNER -->
		<div class="text-right mt15">
			<ol class="breadcrumb breadcrumb-blog-class">		
		<?php foreach( $allClass AS $record ) {?>
		  <li><a href="/blog/index/<?php echo $record["key"];?>"><?php echo $record["value"][$Lang]["title"];?></a></li>
		<?php } ?>
		</ol>
			<div class="clearfix"></div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="block-title ml0"><?php echo $currentClass["value"][$Lang]["title"];?> <?php echo $objLang["bloger"]["lastNews"];?></div>
				<div class="layou-tools">
			<?php
  $isGrid = $layout == "grid" ? "active" : "";
  $isList = $layout == "list" ? "active" : "";
  ?>
				<a class="btn btn-default <?php echo $isGrid;?>"
						onclick="changeLayout('grid',this);"><span class="fa fa-th"></span></a>
					<a class="btn btn-default <?php echo $isList;?>"
						onclick="changeLayout('list',this);"><span class="fa fa-navicon"></span></a>
				</div>
				<div class="text-center">
					<div class="artical-block grid-artical">
				<?php if( count($listStory) == 0 ) { ?>
				<span class="text-center"><?php echo $objLang["bloger"]["emptyContent"];?></span>
				<?php } ?>
				<?php
    $ind = 1;
    foreach ( $listStory as $story )
    {
      ?> 
				<div class="item-story item-story-<?php echo $ind;?> ml0">
							<div class="middleMaxnail">
								<a href="/blog/detail/<?php echo $story["id"];?>"><img
									src="<?php echo $story["value"]["url"];?>"
									class="img-responsive responsive"
									style="max-width: none; max-height: none;" /></a>
							</div>
							<div class="caption">
								<H3 class="story-title"><?php echo $story["blog-title"];?></H3>
							</div>
						</div>
				<?php } ?>
			</div>
				</div>
				<div class="artical-block list-artical">
				<?php if( count($listStory) == 0 ) { ?>
				<span class="text-center"><?php echo $objLang["bloger"]["emptyContent"];?></span>
				<?php } ?>
				<?php
    $ind = 1;
    foreach ( $listStory as $story )
    {
      ?> 
				<div class="row table-layout row-<?php echo $ind;?>">
						<!-- style="padding:0;background-image:url('<?php echo $story["value"]["url"];?>');" -->
						<div class="ad-image">
							<div class="middlenail">
								<a href="/blog/detail/<?php echo $story["id"];?>"> <img
									src="<?php echo $story["value"]["url"];?>"
									class="img-responsive responsive"
									/ style="width: 100% !important; height: auto !important;">
								</a>
							</div>
						</div>
						<div class="info-block p15">
							<a class="ad-title"
								href="/blog/detail/<?php echo $story["id"];?>"><?php echo $story["blog-title"];?></a>
					
						<?php $arrDesc = explode("\n",$story["blog-content"]);?>
						<?php if( $ind != 1 ) { ?>
						<span class="story-desc"><?php echo strip_tags($arrDesc[0]);?><a
								href="/blog/detail/<?php echo $story["id"];?>" class="readMore"><?php echo $objLang["bloger"]["readMore"];?></a></span>
						<?php } else { ?>						
						<span class="story-desc first">
							<?php for( $i=0;$i<10;$i++ ) { echo array_key_exists($i,$arrDesc)?strip_tags($arrDesc[$i]): ""; } ?>						
						<a href="/blog/detail/<?php echo $story["id"];?>" class="readMore"><?php echo $objLang["bloger"]["readMore"];?></a>
							</span>						
						<?php } ?>
						<div class="author-section">
								<img src="<?php echo $story["bloger"]["picture"]["url"];?>"
									class="img-rounded" />
								<div class="author-name"><?php echo $story["bloger"]["name"];?></div>
								<div class="author-name">｜</div>
								<div class="author-name"><?php echo $objLang["bloger"]["message"].$story["msgCount"];?></div>
								<div class="author-name">｜</div>
								<div class="author-name touch"><?php echo $objLang["bloger"]["touch"].$story["atouch"];?></div>
								<br />
								<div class="panel-time"><?php echo $objLang["bloger"]["postby"];?><?php echo $story["markDate"];?></div>
							</div>
							<div class="social-tools">
								<div class="fb-like" "/blog/detail/<?php echo $story["id"];?>" data-layout="standard" data-action="like" data-width="290" data-show-faces="false" data-share="true"></div>	
							</div>
							
							
						</div>
					</div>
				<?php
      $ind ++;
    }
    ?>
			</div>
				<div class="pagination-block text-center">
					<nav>
						<ul class="pagination">
					<?php if( $showPrev === true ){ ?>
					<li class="Prev"><a onclick="prevPage();"><?php echo $objLang["bloger"]["prevPage"];?></a></li>
					<?php } ?>
					<?php for( $i = 1; $i <= $totalPage; $i++ ) { $isActive = ($i==$page)?"class=\"active\"":""; ?>
					<li <?php echo $isActive;?>><a
								onclick="gotoPage(<?php echo $i;?>);"><?php echo $i;?></a></li>
					<?php } ?>
					<?php if( $showNext === true ){ ?>
					<li class="Next"><a onclick="nextPage();"><?php echo $objLang["bloger"]["nextPage"];?></a></li>
					<?php } ?>
				  </ul>
					</nav>
				</div>
			</div>
			<div class="col-md-4">
				<!-- 熱門文章 -->
				<div class="block-title" ><?php echo $currentClass["value"][$Lang]["title"];?> <?php echo $objLang["bloger"]["hotNews"];?>
					<!--<a class="btn btn-rounded btn-warning btn-xs pull-right btn-more">更多</a>-->
				</div>
			<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."blog" . DIRECTORY_SEPARATOR ."articleList.php"); ?>
			<!-- /熱門文章 -->

				<!-- 相關部落客 -->
				<div class="block-title"><?php echo $currentClass["value"][$Lang]["title"];?> <?php echo $objLang["bloger"]["relbloger"];?>
					<!--<a class="btn btn-rounded btn-warning btn-xs pull-right btn-more">更多</a>-->
				</div>
			<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."blog" . DIRECTORY_SEPARATOR ."blogList.php"); ?>	
			<!-- /相關部落客 -->

				<!-- AD區塊 -->
				<!--
			<div class="block-title mt15" style="margin-left:0px;margin-bottom:0;margin-right:0px;"><?php echo $objLang["catelog"]["newsAct"];?><div class="more"></div></div>
			<div class="ad-slider-block">
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
</div>
<script>
var page = <?php echo $page;?>;
var totalPage = <?php echo $totalPage;?>;
var layout = '<?php echo $layout;?>';

function gotoPage(p)
{
	location.href = window.location.pathname + "?" + $.param({'p':p,'lyt':layout});
}
function prevPage()
{
	location.href = window.location.pathname + "?" + $.param({'p':page-1,'lyt':layout});
}
function nextPage()
{
	location.href = window.location.pathname + "?" + $.param({'p':page+1,'lyt':layout});
}
function changeLayout(l,self)
{
	$(".layou-tools .btn").removeClass("active");
	$(self).addClass("active");
	$(".artical-block").fadeOut(500);
	$("."+l+"-artical").fadeIn(500);
	layout = l;
}

var param = {};
$(function(){
	$(".artical-block").hide();
	$("."+layout+"-artical").show();
	
	$('.ad-raty').raty({
		readOnly   : true,
		score: function() {
			return $(this).attr('data-score');
		}
	});
	param = {
		width: 1600,
		height: 213,
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
		transition: 'slide-left',
		onReady: function() {
		  setTimeout(responsiveSlider,500);
		}
	};
	$('#my-slide').DrSlider(param);
	param.width = 300;
	param.height = 400;
	$('#my-slide-ad').DrSlider(param);
});


	function responsiveSlider()
	{
		/*
		var zoom = $(".background").eq(0).outerWidth()/1400;
		$(".lazy-slider-title").css({"zoom":zoom});
		$(".lazy-slider-description").css({"zoom":zoom});
		*/
		
	}
</script>
<script>
$(function(){init_thumbnail});
$( window ).load(init_thumbnail);
$( window ).resize(init_thumbnail);
function init_thumbnail() 
{
	$(".thumbnail, .middlenail, .middleMaxnail").each(function(){
		
		var hasMargin = true;//$(this).hasClass("middlenail") ? false : true;
		
		var w = $(this).outerWidth();
		var h = $(this).outerHeight();
		
		var img = $(this).find("img").eq(0);
		var imgW = img[0].naturalWidth;
		var imgH = img[0].naturalHeight;
		var imgRate = imgW / imgH;
		
		$(this).css({"overflow":"hidden"});
		var frameRate = w/h;
		var imageRate = imgW/imgH;
		
		var gridLayout = false;//$(this).parent().parent().hasClass("grid-artical");
		if( gridLayout === false )		
		{
			if( frameRate > imageRate ) 
			{
				var newImgH = imgH * ( w / imgW );
				var marginTop = ( parseInt(newImgH) - parseInt(h) ) / 2;
				var param = ( hasMargin ) ? {"width":w+"px","height":newImgH+"px","margin-top":"-"+marginTop+"px"} : {"width":w+"px","height":newImgH+"px"};
				$(this).find("img").css(param);
			}
			else
			{
				var newImgW = imgW * ( h / imgH );
				var marginLeft = ( parseInt(newImgW) - parseInt(w) ) / 2;
				var param = ( hasMargin ) ? {"width":newImgW+"px","height":h+"px","margin-left":"-"+marginLeft+"px"} : {"width":newImgW+"px","height":h+"px"};
				$(this).find("img").css(param);
			}				
		}
	});
	
	$(".ad-item .col-xs-4");
}
</script>