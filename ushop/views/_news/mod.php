
<link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css"/>
<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js?<?php echo $time;?>"></script>

<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css"/>
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>

<div class="container">
<div class="section mt25">
	<!-- 麵包屑 -->
	<div class="text-right">
		<!-- 麵包屑 -->
		<ol class="breadcrumb">
		  <li><a href="/"><?php echo $objLang['shoppingcart']["home"];?></a></li>
		  <li><a href="/blog"><?php echo $objLang['function_bar']["bloger"];?></a></li>
		  <li><a href="/blog/moderators/<?php echo $bloger["id"];?>"><?php echo $bloger["name"];?></a></li>
		</ol>
		<div class="clearfix"></div>
		<!-- /麵包屑 -->
	</div>
	<div class="row">
		<div class="col-sm-8">
			<div class="row table-layout mod-block" style="border-bottom:none;">
				<div class="col-xs-4 pic-block p15 prC">
					<a class="picture" href="/blog/moderators/<?php echo $bloger["id"];?>">
						<img src="<?php echo $bloger["picture"]["url"];?>" class="img-thumbnail product-image"/>
					</a>
				</div>
				<div class="col-xs-8 info-block p10">
					<div><span class="iLabel"><?php echo $objLang["bloger"]["nick"];?></span><span class="ad-title"><?php echo $bloger["name"];?></span></div>
					<div><span class="iLabel"><?php echo $objLang["bloger"]["blogTitle"];?></span><span class="ad-title"><?php echo $blog["value"][$Lang]["title"];?></span></div>
					<div><span class="iLabel"><?php echo $objLang["bloger"]["touch"];?></span><span class="ad-title"><?php echo $blog["touch"];?><?php echo $objLang["bloger"]["touchQty"];?></span></div>
					<div><span class="iLabel"><?php echo $objLang["bloger"]["blogDesc"];?></span></div>
					<div><span><?php echo $blog["value"][$Lang]["description"];?></span></div>
					<div><span class="iLabel"><?php echo $objLang["bloger"]["msgForMe"];?></span></div>
					<div>
						<?php if( $self === false ) { ?>
						<span><?php echo $objLang["bloger"]["OnlyForMember"];?></span>
						<?php } else if ( $self["id"] == $bloger["id"] ) { ?>
						<span><?php echo $objLang["bloger"]["OnlyMsgOther"];?></span>
						<?php } else { ?> 
						<textarea class="form-control" id="sendMsgToBlog-content" name="sendMsgToBlog-content"></textarea>
						<div class="pull-right">
							<a class="btn btn-info btn-xs" onclick="sendMsgToBlog('<?php echo $bloger["id"];?>');"><?php echo $objLang["bloger"]["sendMsg"];?></a>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
						<?php } ?>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="block-title ml0"><?php echo $objLang["bloger"]["hotNews"];?></div>
			<?php 
			$listStory = $authorHotArticle[$page-1];
			include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."blog" . DIRECTORY_SEPARATOR ."lastArticle.php"); 
			?>	
		</div>
		<div class="col-sm-4">
		<!-- 個人動態 -->
			<div class="block-title" style="margin-left:0;margin-bottom: 0;margin-right: 0;"><?php echo $objLang["bloger"]["authorNews"];?></div>
			<?php
				$inds = 1;
				foreach( $authorLastArticle AS $article )
				{
					if( $inds === 6 )
						break;
					
					$lastItem = ( $inds == count($authorLastArticle) || $inds === 5 )?"border-bottom":"";
			?>
			<div class="row table-layout ad-item hot-news <?php echo $lastItem;?>">
				<div class="col-xs-3 info-block p5 text-center">
					<img src="<?php echo $bloger["picture"]["url"];?>" class="img-thumbnail" />
				</div>
				<div class="col-xs-9 info-block p5">					
					<div class="author-section"> 
						<H3 class="author-name"><?php echo $bloger["name"];?></H3>
						<span class="author-post-time"><?php echo $article["showTime"];?><?php echo $objLang["bloger"]["whenPostTime"];?></span>
					</div>
					<a class="ad-title" href="/blog/detail/<?php echo $article["id"];?>">
						<div class="row table-layout bk-ad-article">
							<div class="col-xs-5 info-block p5">
								<div class="thumbnail">
								<img src="<?php echo $article["blog-extra"]["url"];?>" class="img-thumbnail" />
								</div>
							</div>							
							<div class="col-xs-7 info-block p5">
								<div class="article-title"><?php echo $article["blog-title"];?></div>
								<?php $arrDesc = explode("\n",$story["blog-content"]); ?>
								<div class="article-desc"><?php echo isset($arrDesc[0])?$arrDesc[0]:"";?></div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<?php
					$inds++;
				}
			?>
		<!-- /個人動態 -->
		<!-- 推薦商品 -->
			<div class="block-title" style="margin-left:0;margin-bottom: 0;margin-right: 0;"><?php echo $objLang["bloger"]["RecPost"];?></div>
			<?php
				$inds = 1;
				foreach( $recProduct AS $product )
				{
					if( $inds === 6 )
						break;
					
					$lastItem = ( $inds == count($recProduct) || $inds === 5 )?"border-bottom":"";
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
					<div class="ad-price"><span class="dPrice"><?php echo $product["cPrice"];?></span></div>
					<?php
						$rawScore = $product["touch"] / $TotalRaty;
						$score = round( $rawScore * 5, 2 );
					?>
					<div class="ad-raty" data-score="<?php echo $score;?>" style="margin-bottom: 8px;"></div>
					<?php echo ($product["stock"] == 0)?'<a href="#" class="btn btn-default btn-sellout btn-xs pull-right" role="button"> '.$objLang["product"]["sellOut"].' </a>':'<a href="#" class="btn btn-rounded btn-default btn-more-info btn-add-to-cart pull-right" data-pid="'.$product["PID"].'" data-qty="1"> '.$objLang["product"]["addToCart"].' </a>';?>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php
					$inds++;
				}
			?>
			<!-- /推薦商品 -->
		
			<!-- AD區塊 -->
			<div class="block-title mt15" style="margin-left:0;margin-bottom:0;margin-right:0;"><?php echo $objLang["catelog"]["newsAct"];?><div class="more"></div></div>
			<div class="ad-slider-block">
				<div id="my-slide-ad">
				<?php $sliderKey = 0; ?>
				<?php foreach( $activityWidgetSlider AS $slider ) { ?>
					<div onclick="redirect('<?php echo $slider["value"]["href"];?>');" data-lazy-background="<?php echo $slider["value"]["image"]["url"];?>" slider-type="image" slider-key="<?php echo $sliderKey;?>" style="cursor:pointer;"></div>
				<?php 	$sliderKey++; ?>
				<?php } ?>
				</div>
			</div>
			<!-- /AD區塊 -->
		</div>
	</div>
</div>
</div>
<script>

var param = {};
$(function(){
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