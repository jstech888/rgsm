
<link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" />
<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js?<?php echo $time;?>"></script>

<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>
<style>
.breadcrumb {
	padding-left: 0;
	/*margin-top: 20px;*/
}

.story-block {
	position: relative;
	display: block;
}

.pnl-heading {
  border-bottom: 1px solid #c7c6c6;
  margin-bottom: 5px;
  padding: 5px 0;
}

.panel-story {
	border: 1px solid #B5B4B4 !important;
}

.panel-story.panel-info>.panel-heading {
	background-color: #fff;
}

.panel-story.panel-info>.panel-heading>.panel-title {
	color: #777;
	display: block;
	border-bottom: 1px solid #B5B4B4;
	margin: 25px;
	margin-left: 16px;
	margin-right: 16px;
	padding: 0;
	padding-bottom: 10px;
	text-align: left;
	font-weight: normal;
	cursor: default;
}

.panel-story.panel-info>.panel-heading .post-time {
	position: absolute;
	color: #777;
	top: 0;
	right: 33px;
	cursor: default;
}

.image-block {
	display: inline-block;
	margin: 0 auto;
}

.story-caption {
	text-align: left;
}

.story-image {
	max-width: 100%;
}

.story-caption, .image-block {
	padding: 10px;
}

.blog-block>img.banner {
	width: 100%;
}

.ad-item.static div.info-block .ad-title:hover {
	filter: alpa(opacity = 100); /* old IE */
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=1, FinishOpacity=15,
		Style=3, StartX=0, FinishX=100, StartY=0, FinishY=16);
	/*supported by current IE*/
	-moz-opacity: 1; /* Moz + FF */
	opacity: 1;
}

.ad-item.static .ad-title {
	display: inline-block;
	cursor: default;
	font-size: 16px;
	text-align: left;
}

.prC {
	padding-right: 0 !important;
	overflow: hidden;
}

.info-block>div {
	display: block;
}

.info-block>div>span {
	display: inline-block;
	font-size: 16px;
}

.blog-block .banner {
	width: 100%;
}

.ad-item.hot-news {
	padding: 11px 5px;
	/*height: 60px;
  max-height: 60px;*/
	border: 1px solid #DDD;
	border-bottom: none;
}

.ad-item.hot-news a {
	font-size: 15px;
}

.ad-item.hot-news>.info-block {
	padding-left: 35px !important;
}

.hot-news-icon {
	width: 18px;
	height: 18px;
	position: absolute;
	top: 17px;
	margin-left: -30px;
}

.ad-item.border-bottom {
	border-bottom: 1px solid #DDD;
}

@media ( max-width : 992px) {
	.block-title {
		margin: 0;
		margin-top: 25px;
	}
	.panel-info.panel-blog>.panel-heading {
		height: auto;
	}
	.panel-info.panel-blog>.panel-heading>.panel-title {
		color: #3bafda;
		font-size: 18px;
		font-weight: normal;
		padding-left: 0;
		padding-right: 0;
		cursor: default;
		line-height: 20px;
		height: 20px;
		display: -moz-inline-box;
		display: inline-block;
	}
	.panel-info.panel-blog>.panel-heading>.post-time {
		position: absolute;
		top: initial;
		right: 15px;
		bottom: -45px;
	}
	.panel-body {
		padding: 0;
	}
	.image-block {
		padding: 0;
	}
}

@media ( max-width : 500px) {
	.responsive.banner {
		display: none;
	}
}

.panel-info {
	border-color: #fff;
}

.panel-title {
	margin-top: 0;
	margin-bottom: 0;
	font-size: 16px;
	color: #ABABAB;
}

.row {
	margin-right: -15px;
	margin-left: -15px;
}

#col-xs-12 {
	text-align: left;
}

.container > .row {
    padding-left: 0;
    padding-right: 0;
}
</style>

<div id="columns" class="container self news">
    <div class="row mt25">
        <div class="col-md-12">
        	<!-- 麵包屑 -->
			<ol class="breadcrumb">
				<li><a href="/"><?php echo $objLang['shoppingcart']["home"];?></a></li>
				<li><a href="/news"><?php echo "最新消息";//$objLang['function_bar']["blog"];?></a></li>
				<li><a href="/blog/index/<?php echo $article['classKey'];?>"><?php echo $article['classValue'][$Lang]["title"];?></a></li>
				<li><a href="/blog/detail/<?php echo $id;?>"><?php echo $article["blog-title"];?></a></li>
			</ol>
			<div class="clearfix"></div>
			<!-- /麵包屑 -->
        </div>

        <div class="col-md-12">

          <!-- 商品 主要區塊 -->
          <div class="">

            <div class="row story-block mt15">

              	<div class="col-md-3 col-md-pull-9 column">

	                <div id="categories_block_left" class="block">
	                  <h2 class="title_block"><?php echo "最新消息";//$objLang["bloger"]["NewsList"];?></h2>
	                  <div class="block_content">
	                    <ul class="list-block tree dynamized" style="display: block;padding-left:11px;padding-right:3px;">
	                    <?php foreach($allClass AS &$class) { ?>
	                      <li>
	                        <a href="/news/index/<?php echo $class["key"];?>" title="<?php echo $class["value"][$Lang]["title"];?>"><?php echo $class["value"][$Lang]["title"];?></a>
	                      </li>
	                    <?php } ?>
	                      <!-- <li>
	                        <a href="/" title="美妝">美妝</a>
	                      </li>
	                      <li>
	                        <a href="/" title="保養">保養</a>
	                      </li> -->
	                    </ul>
	                  </div>
	                </div>
	                <!-- /Block categories module -->
	            </div>

	            <div class="col-md-3 column">

	                <div id="categories_block_left" class="block">
	                	<h2 class="title_block"><?php echo "最新消息";//$objLang["bloger"]["NewsList"];?></h2>
	                  	<div class="block_content">
		                    <ul class="list-block tree dynamized" style="display: block;padding-left:11px;padding-right:3px;">
		                    <?php foreach($allClass AS &$class) { ?>
		                      <li>
		                        <a href="/news/index/<?php echo $class["key"];?>" title="<?php echo $class["value"][$Lang]["title"];?>"><?php echo $class["value"][$Lang]["title"];?></a>
		                      </li>
		                    <?php } ?>
		                      <!-- <li>
		                        <a href="/" title="美妝">美妝</a>
		                      </li>
		                      <li>
		                        <a href="/" title="保養">保養</a>
		                      </li> -->
		                    </ul>
	                  	</div>
	                </div>
	                <!-- /Block categories module -->

	            </div>

              <div class="col-md-9">
                <H1 style="font-size: 28px; margin-top: 5px;">2016年 最新消息</H1>
                <div class="pnl pnl-info pnl-blog">
                  <div class="pnl-heading">
                    <span class="pnl-title"><?php echo $article["blog-title"];?></span>
                    <span class="pnl-time"><?php echo $objLang["bloger"]["postby"];?><?php echo $article["raw-date"];?></span>
                  </div>                  



                  <div class="pnl-body text-center">
                    <div class="image-block"><img class="story-image" src="<?php echo $article['blog-extra']["url"];?>" alt="<?php echo $article["blog-title"];?>"></div>
                    <div class="html-content"><?php echo $article['blog-content'];?></div>
                  </div>
                </div>
                <div class="panel-story-footer mb25">
                  <div class="pull-left">
                    <!--
                    <div class="fb-like" style="width: 263px;" data-href="/blog/1" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                    -->
                    <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo base_url("/blog/detail/".$id);?>&amp;width=500&amp;height=35&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=true&amp;send=false"
							scrolling="no" frameborder="0"
							style="border: none; overflow: hidden; width: 500px; height: 35px; max-width: 100%;"
							allowtransparency="true"></iframe>

                    <iframe src="//www.facebook.com/plugins/like.php?href=http://http://beautywomantest2.mooo.com/&amp;width=500&amp;height=35&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=true&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:35px; max-width: 100%;" allowtransparency="true"></iframe>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>

            </div>

          </div>

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
		if( typeof( img[0] ) != "undefined" )
		{
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
		}
	});
	
	$(".ad-item .col-xs-4");
}
</script>
<script>
$(function(){
	touchBlog();
});
</script>