
<link rel="stylesheet" type="text/css"
	href="/libs/devrama.slider/devrama-slider.css" />
<script type="text/javascript"
	src="/libs/devrama.slider/jquery.devrama.slider.js?<?php echo $time;?>"></script>

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
	margin-right: 0px;
	margin-left: 0px;
}

#col-xs-12 {
	text-align: left;
}
</style>
<div class="container">
	<div class="section mt25">
		<!-- 麵包屑 -->
		<div class="text-left">
			<!-- 麵包屑 -->
			<ol class="breadcrumb">
				<li><a href="/"><?php echo $objLang['shoppingcart']["home"];?></a></li>
				<li><a href="/blog"><?php echo $objLang['function_bar']["blog"];?></a></li>
				<li><a href="/blog/index/<?php echo $article['classKey'];?>"><?php echo $article['classValue'][$Lang]["title"];?></a></li>
				<li><a href="/blog/detail/<?php echo $id;?>"><?php echo $article["blog-title"];?></a></li>
			</ol>
			<div class="clearfix"></div>
			<!-- /麵包屑 -->
		</div>
		<div class="blog-block">
			<H3 class="title"><?php echo $blog["value"][$Lang]["title"];?></H3>
			<span class="description"><?php
  $arrDesc = explode( "\n", $blog [ "value" ] [ $Lang ] [ "description" ] );
  echo $arrDesc [ 0 ];
  ?></span>
			<!-- BANNER -->
			<img class="responsive banner"
				src="<?php echo $blog["value"][$Lang]["banner"]["url"];?>" />
			<!-- /BANNER -->
		</div>
		<div class="row story-block mt15">
			<div class="col-md-8">
				<div class="panel panel-info panel-blog">
					<div class="panel-heading">
						<span class="panel-title"><?php echo $article["blog-title"];?></span>
						<span class="panel-time"><?php echo $objLang["bloger"]["postby"];?><?php echo $article["raw-date"];?></span>
						<div class="post-time">
						
	

						
						<?php foreach( $article["arrTag"] AS $tag ) { ?>
						<a class="btn btn-default btn-xs btn-tag"><?php echo $tag;?></a>
						<?php } ?>
					</div>
					</div>
					<div class="panel-body text-center">
						<div class="image-block">
							<img class="story-image"
								src="<?php echo $article['blog-extra']["url"];?>" alt="">
						</div>
						<div class="story-caption html-content detail">
						<?php echo $article['blog-content'];?>	
					</div>
					</div>
				</div>
				<div class="panel-story-footer mb25">
					<div class="pull-left">
						<!--
					<div class="fb-like" style="width: 263px;" data-href="/blog/detail/<?php echo $id;?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
					-->
						<iframe
							src="//www.facebook.com/plugins/like.php?href=<?php echo base_url("/blog/detail/".$id);?>&amp;width=500&amp;height=35&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=true&amp;send=false"
							scrolling="no" frameborder="0"
							style="border: none; overflow: hidden; width: 500px; height: 35px; max-width: 100%;"
							allowtransparency="true"></iframe>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel"
					style="border: 1px solid #ccc; border-top-left-radius: 0px; border-top-right-radius: 0px;">
					<div class="panel-heading">
						<span class="panel-title"> <span
							class="glyphicon glyphicon-comment"></span><?php echo $objLang["bloger"]["userpost"];?></span>
						<div class="panel-header-menu pull-right mr10 text-muted fs12"> <?php echo date('F d, Y');?> </div>
					</div>
					<div class="panel-body msg-body"
						style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
				<?php foreach( $listMessage AS $msg ) { ?>
					<div class="media mt15">
							<a class="pull-left" href="#"> <img
								class="media-object thumbnail thumbnail-sm rounded mw40"
								src="<?php echo $msg["picture"]["url"];?>" alt="...">
							</a>
							<div class="media-body mb5">
								<h5 class="media-heading mbn"><?php echo $msg["nickname"];?> <small> - <?php echo $msg["showTime"];?><?php echo $objLang["bloger"]["whenPostMsgTime"];?></small>
								</h5>
								<p><?php echo $msg["message"];?></p>
							</div>
						</div>
				<?php } ?>
				</div>
					<!-- 留言 -->
				<?php if( $self !== false ) { ?> 
				<!-- 登入 -->
					<div class="panel-footer p15" style="border-top: 1px solid #fff;">
						<div class="admin-form">
							<label for="reply1" class="field prepend-icon"> <input
								type="text" name="MessageBoard-reply" id="MessageBoard-reply"
								class="event-name gui-input" placeholder=""> <label for="reply1"
								class="field-icon"><i class="fa fa-pencil"></i></label>
							</label>
							<div class="pull-right mt15">
								<a class="btn btn-info"
									onclick="MessageBoard('<?php echo $article["id"];?>');"><?php echo $objLang["bloger"]["sendMsg"];?></a>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				<?php } else { ?>
				<!-- 未登入 -->
					<div class="panel-footer p15" style="border-top: 1px solid #fff;">
						<center>
							<H3><?php echo $objLang["bloger"]["nonMember"];?></H3>
						</center>
					</div>
				<?php } ?>
				<!-- /留言 -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="block-title"
					style="margin-left: 0; margin-bottom: 0; margin-right: 0;"><?php echo $objLang["bloger"]["aboutMe"];?></div>
				<!-- 關於我 -->
			<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."blog" . DIRECTORY_SEPARATOR ."aboutMe.php"); ?>
			<!-- /關於我 -->
				<div class="block-title"
					style="margin-left: 0; margin-bottom: 0; margin-right: 0;"><?php echo $objLang["bloger"]["lastPost"];?></div>
			<?php
  $inds = 1;
  foreach ( $authorLastArticle as $article )
  {
    if ( $inds === 6 )
      break;
    
    $lastItem = ( $inds == count( $authorLastArticle ) || $inds === 5 ) ? "border-bottom" : "";
    ?>
			<div
					class="row table-layout ad-item hot-news <?php echo $lastItem;?>">
					<div class="col-xs-12 info-block p15">
						<a class="ad-title"
							href="/blog/detail/<?php echo $article["id"];?>"><img
							src="/ckfinder/userfiles/files/Icons/icon_heart.png"
							class="hot-news-icon"><?php echo $article["blog-title"];?></a>
					</div>
				</div>
			<?php
    $inds ++;
  }
  ?>
			<!-- 推薦商品 -->
				<!--
			<div class="block-title" style="margin-left:0;margin-bottom: 0;margin-right: 0;"><?php echo $objLang["bloger"]["RecPost"];?></div>
			<?php
  $inds = 1;
  foreach ( $recProduct as $product )
  {
    if ( $product [ "Shelves" ] === false )
    {
      continue;
    }
    if ( $inds === 6 )
      break;
    
    $lastItem = ( $inds == count( $recProduct ) || $inds === 5 ) ? "border-bottom" : "";
    ?>
			<div class="row table-layout ad-item <?php echo $lastItem;?>">
				<div class="col-xs-2">
					<?php if( $inds === 1) { ?>
					<img src="/assets/catelog/icon_crown.jpg" class="responsive icon_crown"/>
					<?php } ?>
					<img src="/assets/catelog/icon_number<?php echo $inds;?>.png" class="responsive"/>
				</div>
				<div class="col-xs-4" style="padding:0;" >
					<a class="ad-image" href="/product/detail/<?php echo $product["detailKey"];?>">
						<?php if($product['inSOff']) { ?><div class="on_sale-tccG9-icon"></div><?php } ?>
						<img src="<?php echo $product["src"];?>" alt="<?php echo $product["alt"];?>" class="responsive product-image"/>
					</a>
				</div>
				<div class="col-xs-6 info-block p15">
					<a class="ad-title" href="/product/detail/<?php echo $product["detailKey"];?>"><?php echo $product["name"];?></a>
					
					<?php if( $self == false ) { ?>
					<div class="ad-price" style="display: inline-block;">  <span class="dPrice"><?php echo $product["price"];?></span></div>	
					<?php } else { ?> 
					<div class="ad-price" style="display: inline-block;">  <span class="dPrice"><?php echo $product["cPrice"];?></span></div>	
					<?php } ?>
					
					<?php
    $rawScore = $product [ "touch" ] / $TotalRaty;
    $score = round( $rawScore * 5, 2 );
    ?>
					<div class="ad-raty" data-score="<?php echo $score;?>" style="margin-bottom: 8px;"></div>
					<?php if( is_array( $product["stock"] ) ) { ?>
						<select class="formatType-select form-control" data-pid="<?php echo $product["PID"];?>" style="margin-bottom: 8px;">
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
				<div class="clearfix"></div>
			</div>
			<?php
    $inds ++;
  }
  ?>-->
				<!-- /推薦商品 -->
				<!-- AD區塊 -->
				<!--
			<div class="block-title mt15" style="margin-left:0;margin-bottom:0;margin-right:0;"><?php echo $objLang["catelog"]["newsAct"];?><div class="more"></div></div>
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