<!-- <link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" /> -->
<!-- <script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js"></script> -->
<!-- <script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js?<?php //echo $time;?>"></script> -->
<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>

<style>
.col-md-12 {
    padding-right: 0px;
    padding-left: 0px;
}
.slick-slide.slick-current.slick-active {
    width: 1400px;
}
#my-slide img {
  width: 100%;
  height: 100%;
}
</style>
<?php /*<style>
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
  width: 60px;
  height: 60px;
  top: 50%;
  margin-top: -30px;
  border-radius: 50%;
  text-align: center;
  background-color: #000;
  font-family: Glyphicons;
  font-style: normal;
  font-weight: normal;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
}
.slider-control:hover {
  background-color: #e91e63;
  display: block !important;
}
.slider-control.slider-control-previous {
  left: 15px;
}
.slider-control.slider-control-next {
  right: 15px;
}
.slider-control.slider-control-next:before {
  content: "\e224";
  font-size: 28px;
  position: absolute;
  top: 16px;
  left: 16px;
  color: #fff;
}
.slider-control.slider-control-previous:before {
  content: "\e225";
  font-size: 28px;
  position: absolute;
  top: 16px;
  left: 16px;
  color: #fff;
}
.lazy-slider-title {
  // zoom:1 !important;
}
.embed-responsive.embed-responsive-16by9 {
  padding-bottom: <?php echo floor( ($WHSlidertEffect["height"] / $WHSlidertEffect["width"]) * 100 )?>%;
}
.inner.devrama-slider > .slider-control {
  display:none;
}
</style>*/?>
<div class="col-md-12">

  <?php /*<div id="my-slide" class="scroll1">*/?>
  <div id="my-slide">
    <?php          
    foreach( $HomeSlider AS $k => &$slider )
    {
    ?>
    	<div>
        <?php if($slider["value"]["caption"]["title"]!=''){  ?>
          <a href="<?php echo $slider["value"]["caption"]["title"];?>">
        <?php } ?>    
          <img data-lazy-src="<?php echo $slider["value"]["image"]["url"];?>" alt="">
        <?php if(isset($slider["value"]["caption"]["title"])){  ?>
          </a>
        <?php } ?>
      </div>
    <?php
    }
    ?>
  </div>
  <?php 
    if( count($HomeSlider) > 1 )
    {
  ?>
      <div class="inner devrama-slider">
          <div class="slider-control slider-control-previous"></div>
          <div class="slider-control slider-control-next"></div>
      </div>
  <?php
    }
  ?>

</div>

<script type="text/javascript">
var tempDuration = false;
var videoWaitting = false;
var sliderCore = false;
var param = false;
$(function(){
  $("#my-slide").hover(function(){
    $(".inner.devrama-slider > .slider-control").fadeIn();
  },function(){   
    $(".inner.devrama-slider > .slider-control").hide();
  });
  $(".slider-control").each(function(){
    $(this).click(function(){
      sliderCore.is_pause = false;
      $('.background').each(function(){
        $(this).find("iframe").attr("src"," ");
      });
    });
  });
  //, positionControl: 'left-right'
  var customParam  = {"transition":"random","navigationColor":"#ffffff","navigationHoverColor":"#a9a9a9","navigationHighlightColor":"#e91e63","duration":"3000","transitionSpeed":"1000","width":"1400","height":"540"};
  // var customParam  = {"transition":"random","navigationColor":"#ffffff","navigationHoverColor":"#a9a9a9","navigationHighlightColor":"#e91e63","duration":"7000","transitionSpeed":"1000","width":"1920","height":"650"};
  var defaultParam = {
    width: 1400,
    height: 540,
    userCSS: false,
    transitionSpeed: 1000,
    duration: 3000,
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
  param.width       = parseInt(param.width);
  param.height      = parseInt(param.height);
  param.transitionSpeed = parseInt(param.transitionSpeed);
  param.duration      = parseInt(param.duration);
  
      $('#my-slide').DrSlider(param);
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