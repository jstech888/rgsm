<link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css"/>
<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js?<?php echo $time;?>"></script>

<style>
.devrama-slider {
  z-index: 5;
}

.lazy-slider-title {
  font-size: 26px;
}
.lazy-slider-description {
  font-size: 22px;
}
#my-slide {
  position: relative;
  display:block;
  background: #FFF;
  
}
.slider-control {
  position: absolute;
  z-index: 20;
  cursor: pointer;
  width: 40px;
  height: 56px;
  top: 50%;
  margin-top: -20px;
}
.slider-control.slider-control-previous {
  background: url(/assets/slider/arrow_right.png) no-repeat 0 0 scroll;
  right: 0;
}
.slider-control.slider-control-next {
  background: url(/assets/slider/arrow_left.png) no-repeat 0 0 scroll;
  left: 0;
}
.lazy-slider-title {
  /* zoom:1 !important; */
}
.embed-responsive.embed-responsive-16by9 {
  padding-bottom: <?php echo floor( ($WHSlidertEffect["height"] / $WHSlidertEffect["width"]) * 100 )?>%;
}
.lazy-background {
  width: 100% !important;
}
</style>
	
<!--  -->
</div>
<div class="section" style="position: relative;">
		<?php 
			if( count( $HomeSlider ) == 1 )
			{
				$k = 0;
				$slider = $HomeSlider[$k];
		?>
			<img src="<?php echo $slider["value"]["image"]["url"];?>" class="img-responsive" style="width:100%" />
		<?php
			}
			else
			{
		?>
        <div id="my-slide">
		<?php 
			foreach( $HomeSlider AS $k => &$slider )
			{
				!isset($slider["value"]["pos"]["title"]) ? $slider["value"]["pos"]["title"] = array( "start" => array("top"=>"5","left"=>"5"), "end" => array("top"=>"5","left"=>"5")) : "";
				!isset($slider["value"]["pos"]["description"]) ? $slider["value"]["pos"]["description"] = array( "start" => array("top"=>"5","left"=>"5"), "end" => array("top"=>"5","left"=>"5")) : "";
				!isset($slider["value"]["caption"]["title"]) ? $slider["value"]["caption"]["title"] = "" : "";
				!isset($slider["value"]["caption"]["description"]) ? $slider["value"]["caption"]["description"] = "" : "";
				if($slider["value"]["type"] == "image")
				{
		?>
            <div data-lazy-background="<?php echo $slider["value"]["image"]["url"];?>" slider-type="image" slider-key="<?php echo $k;?>">
				<?php 
					if( isset($slider["value"]["caption"]) && !empty($slider["value"]["caption"]) && !is_array($slider["value"]["caption"]))
					{
				?>
				<div class="lazy-slider-title" data-pos="[
					'<?php echo isset($slider["value"]["offset"]["top"])?$slider["value"]["offset"]["top"]:"";?>%', '<?php echo isset($slider["value"]["offset"]["left"])?$slider["value"]["offset"]["left"]:"";?>%', 
					'<?php echo isset($slider["value"]["offset"]["top"])?$slider["value"]["offset"]["top"]:"";?>%', '<?php echo isset($slider["value"]["offset"]["left"])?$slider["value"]["offset"]["left"]:"";?>%']" 
					data-duration="1400" data-effect="move">
					<?php echo $slider["value"]["caption"];?>
				</div>
				<?php
					}
				?>
            </div>
		<?php
				}
				else if( $slider["value"]["type"] == "youtube" )
				{
				  $url = $k == 0 ? "https://www.youtube.com/embed/".$slider["value"]["videoId"]."?autoplay=1&loop=1&rel=0&wmode=transparent" : "";
		?>
				 <div class="background" style="background-color:#000000;" slider-type="youtube" slider-key="<?php echo $k;?>">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="<?php echo $url;?>"></iframe>
					</div>
				 </div>
		<?php
				}
				else if( $slider["value"]["type"] == "vimeo" )
				{
				  $url = $k == 0 ? "//player.vimeo.com/video/".$slider["value"]["videoId"]."?autoplay=1" : "";
		?>
				 <div class="background" style="background-color:#000000;" slider-type="vimeo" slider-key="<?php echo $k;?>">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="<?php echo $url;?>"></iframe>
					</div>
				 </div>
		<?php
				}
				else if( $slider["value"]["type"] == "youku" )
				{
				  $url = $k == 0 ? "http://player.youku.com/embed/".$slider["value"]["videoId"]."?isAutoPlay=true&isShowRelatedVideo=false&embedid=-&showAd=0" : "";
		?>
				 <div class="background" style="background-color:#000000;" slider-type="youku" slider-key="<?php echo $k;?>">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="<?php echo $url;?>"></iframe>
					</div>
				 </div>
		<?php
				}
				else if( $slider["value"]["type"] == "tudou" )
				{
				  $url = $k == 0 ? "http://www.tudou.com/programs/view/html5embed.action?".$slider["value"]["videoId"] : "";
		?>
				 <div class="background" style="background-color:#000000;" slider-type="tudou" slider-key="<?php echo $k;?>">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="<?php echo $url;?>"></iframe>
					</div>
				 </div>
		<?php
				}
			}
		?>
        </div>
		<?php } ?>
		<!--
		<div class="background" style="background-color:#000000;" slider-type="video" slider-key="5">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="//www.youtube.com/embed/ePbKGoIGAXY"></iframe>
			</div>
         </div>
		 -->
		<?php 
			if( count($HomeSlider) > 1 )
			{
		?>
		<!--
        <div class="inner devrama-slider">
            <div class="slider-control slider-control-previous"></div>
            <div class="slider-control slider-control-next"></div>
        </div>
		 -->
		<?php
			}
		?>
</div> 
<!-- </div> -->		
<script>
var HomeSlider = <?php echo json_encode($HomeSlider);?>;
var tempDuration = false;
var videoWaitting = false;
var sliderCore = false;
var param = false;
$(function(){
	$(".slider-control").each(function(){
		$(this).click(function(){
			sliderCore.is_pause = false;
			$('.background').each(function(){
				$(this).find("iframe").attr("src"," ");
			});
		});
	});
	//, positionControl: 'left-right'
	var customParam  = <?php echo json_encode($WHSlidertEffect);?>;
	var defaultParam = {
		width: 1920,
		height: 479,
		userCSS: false,
		transitionSpeed: 1000,
		duration: 6000,
		showNavigation: true,
		classNavigation: undefined,
		navigationColor: '#797979',
		navigationHoverColor: '#A9A9A9',
		navigationHighlightColor: '#DFDFDF',
		navigationNumberColor: '#000000',
		positionNavigation: 'in-center-bottom',
		navigationType: 'circle',
	    showControl: true,
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
	param = jQuery.extend( defaultParam, customParam );
	param.width 		  = parseInt(param.width);
	param.height 		  = parseInt(param.height);
	param.transitionSpeed = parseInt(param.transitionSpeed);
	param.duration 		  = parseInt(param.duration);
	
	<?php 
		if( count($HomeSlider) > 1 )
		{
	?>
		$('#my-slide').DrSlider(param);
	<?php 
		}
	?>
	
	
});
	function responsiveSlider()
	{
		var zoom = $(".background").eq(0).outerWidth()/1920;
		$(".lazy-slider-title").css({"zoom":zoom});
		$(".lazy-slider-description").css({"zoom":zoom});
	}
	$( window ).resize(function() {
		responsiveSlider();
	});
</script>