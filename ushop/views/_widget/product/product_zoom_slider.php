<style>
<!-- /* div that surrounds Cloud Zoom image and content slider. */
#surround {
	/*width:100%;*/
	/*border: 1px solid #B8B8B8;*/
	
}
/* Image expands to width of surround */
img.cloudzoom {
	width: 100%;
}
/* CSS for slider - will expand to width of surround */
#slider1 {
	height: 155px;
	border-top: none;
	border-bottom: none;
	/*margin: 20px 0px;*/
	position: relative;
	margin-bottom: 5px;
	width: 100%;
}

.slick-initialized .slick-slide {
	padding: 5px 0;
}

.slider-item {
	padding: 5px 8px;
	cursor: pointer;
	display: inline-block;
	position: relative;
	text-align: center;
}

.slider-item img:hover {
	filter: alpa(opacity = 80); /* old IE */
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80,
		FinishOpacity=15, Style=3, StartX=0, FinishX=100, StartY=0, FinishY=16);
	/*supported by current IE*/
	-moz-opacity: 0.7; /* Moz + FF */
	opacity: 0.7; /* 支持新版瀏覽器 */
}

.slider-item img {
	/*border: 1px solid #A9A9AD !important;*/
	
}

.social-like {
	font-size: 16px;
	font-weight: bold;
	line-height: 20px;
}

.social-btn {
	display: inline-block;
}

#___plusone_0 {
	vertical-align: text-bottom !important;
	margin-top: 3px !important;
	margin-left: 7px !important;
}

.touch-history {
	font-size: 16px;
	/*margin: 0px 15px;*/
	line-height: 20px;
}

.display-inline-block {
	display: inline-block;
}
-->
.list-inline {
    padding-left: 0;
    margin-left: -5px;
    list-style: none;
    float: left;
    margin-right: 40px;
}
</style>

<div class="images product-display">
<?php if($product['inSOff']) { ?>
	<div class="countdown-list">
		<div class="clock" end-date="<?php echo $product["inSOffEnd"];?>"></div>
	</div>
<?php } ?>

	<div id="surround" class="text-center">
  <!--
      <?php if($product['inSOff']) { ?>
      <div class="countdown-list">
  			<div class="text-center date-block">
  				<div class="date"><?php echo date("m/d",strtotime($product["inSOffBegin"]));?></div>
  				-
  				<div class="date"><?php echo date("m/d",strtotime($product["inSOffEnd"]));?></div>
  				<div class="title"><?php echo $objLang["product"]["soffTitle"];?></div>
  			</div>
  			<span class="clock" end-date="<?php echo $product["inSOffEnd"];?>"></span>
  		</div>
      <?php } ?>
  -->
    <img itemprop="image" class="cloudzoom"
			alt="Cloud Zoom small image" id="zoom1"
			src="<?php  echo isset($product['value']->image)?$product['value']->image[0]->url : ""; 
// echo "/libs/images/demo/product_bigc1.jpg";			
?>"
			data-cloudzoom='
        zoomSizeMode: "image",
        zoomPosition: 4,
        tintColor: "#000",
        tintOpacity: 0.5,
        captionPosition:"bottom",
        variableMagnification: false,
        startMagnification: 2.23606,
        maxMagnification: 2.23606,
        animationTime: 0,
        easeTime: 0,
        easing: 0,
        autoInside:true,  
        image: "<?php  echo isset($product['value']->image)?$product['value']->image[0]->url : ""; 
// echo "/libs/images/demo/product_bigc1.jpg";  
?>"'>
	</div>
	<div class="slider responsive" id="slider1">
    <?php if( isset($product['value']->image) ) { foreach( $product['value']->image AS $image ) { ?>
    <div class="slider-item">
			<img class='cloudzoom-gallery' src="<?php echo $image->url; 
// echo "/libs/images/demo/product_bigc1.jpg";			
?>"
				data-cloudzoom='
          zoomSizeMode: "image",
          zoomPosition: 4,
          tintColor: "#000",
          tintOpacity: 0.5,
          captionPosition:"bottom",
          variableMagnification: false,
          startMagnification: 2.23606,
          maxMagnification: 2.23606,
          disableZoom: "auto",
          animationTime: 0,
          easeTime: 0,
          easing: 0,
          autoInside:true,  
          image: "<?php  echo $image->url; 
  // echo "/libs/images/demo/product_bigc1.jpg" ?>"'>
		</div>
  <?php } }?>
  </div>
</div>


<div class="promo row">
	<div class="col-md-12">
		<div class="name">分享：</div>
		<div class="social-share">
			<ul class="list-inline">
        <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/dialog/share?app_id=966242223397117&display=popup&href=<?php echo urlencode($socialHref);?>" target="_blank">
        <span class="fa fa-facebook"></span>
        </a>				
        <a class="btn btn-social-icon btn-google" href="https://plus.google.com/share?url=<?php echo urlencode($socialHref);?>" target="_blank"> <span
          class="fa fa-google-plus"></span>
        </a>
        <a class="btn btn-social-icon btn-weibo" target="_blank"
          href="http://v.t.sina.com.cn/share/share.php?title=網址標題&url=<?php echo urlencode($socialHref);?>">
          <img src="/libs/css/images/demo/weibo.png" width="33px" />
        </a>				
			</ul>
		</div>
		<div class="social-like">
      <?php echo $objLang["product"]["socialLike"];?>
      <div class="fb-like social-btn" data-href="<?php echo $socialHref;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
			<div class="g-plusone social-btn"></div>
		</div>		
	</div>
</div>


<div class="touch-history">
  <?php
  $rawScore = $product [ "touch" ] / $TotalRaty;
  $score = round( $rawScore * 5, 2 );
  ?>
                <div
class="touch-raty mt10 mb10 display-inline-block"
data-score="<?php echo $score;?>"></div>
    <?php echo $product["touch"];?><?php echo $objLang["product"]["touchHistory"];?>
  </div>

<script type="text/javascript">
  var product = <?php echo json_encode($product);?>;
  
  $(function(){
  	touchProduct();
  });
  
  // Initialize the slider.
  $( function( )
  {
    $( '.countdown-list' ).each( function( )
    {
      var endDate = $( this ).find( ".clock" ).attr( "end-date" );
      $( this ).find( ".clock" ).countdown( endDate ).on( 'update.countdown', function( event )
      {
        var $this = $( this ).html( event.strftime( '' + '<span class="c"><i class="fa fa-clock-o" aria-hidden="true"></i></span>' + '<span class="d"><span class="val">%-D</span><span class="uni">天</span></span>' + '<span class="h"><span class="val">%-H</span><span class="uni">時</span></span>' + '<span class="m"><span class="val">%-M</span><span class="uni">分</span></span>' + '<span class="s"><span class="val">%-S</span><span class="uni">秒</span></span>' ) );
      } ).on( 'finish.countdown', function( event )
      {
        $( this ).html( event.strftime( '' + '<span class="c"><i class="fa fa-clock-o" aria-hidden="true"></i></span>' + '<span class="d"><span class="val">%-D</span><span class="uni">天</span></span>' + '<span class="h"><span class="val">%-H</span><span class="uni">時</span></span>' + '<span class="m"><span class="val">%-M</span><span class="uni">分</span></span>' + '<span class="s"><span class="val">%-S</span><span class="uni">秒</span></span>' ) );
        $( ".price-tools .btn-add-to-cart, .price-tools .btn-add-to-sp-cart" ).addClass( "disabled" );

      } );
    } );
    
    if ( $( document ).width( ) > 750 )
      $( ".cloudzoom" ).CloudZoom( );

    $( '.touch-raty' ).raty(
    {
      readOnly: true,
      score: function( )
      {
        return $( this ).attr( 'data-score' );
      }
    } );
    $( '.responsive' ).slick(
    {
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
      {
        breakpoint: 450,
        settings:
        {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      } ]
    } );
    $( ".slider-item img" ).each( function( )
    {
      $( this ).unbind( "click" );
      $( this ).bind( "click", function( )
      {
        var newSrc = $( this ).attr( "src" );
        var newDataCloudzoom = $( this ).attr( "data-cloudzoom" );
        $( "#zoom1" ).attr( "src", newSrc );
        $( "#zoom1" ).attr( "data-cloudzoom", newDataCloudzoom );
        if ( $( document ).width( ) > 750 )
        {
          $( '.cloudzoom' ).data( 'CloudZoom' ).destroy( );
          $( ".cloudzoom" ).CloudZoom( );
        }

      } );
    } );
  } );
</script>