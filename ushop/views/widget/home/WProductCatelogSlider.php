<link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" />
<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js"></script>

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

  <!-- BANNER -->
  <div id="my-slide">
  <?php 
    foreach( $selfData["value"]->slider AS $k => &$slider )
    {
  ?>
    <div data-lazy-background="<?php echo $slider->image->url;?>" slider-type="image" slider-key="<?php echo $k;?>"></div>
  <?php
    }
  ?>
  <?php /*
    foreach( $selfData["value"]->slider AS $k => &$slider )
    {
  ?>
    <div data-lazy-background="<?php echo $slider->image->url;?>" slider-type="image" slider-key="<?php echo $k+1;?>"></div>
  <?php
    } */
  ?>
  </div>
  <!-- /BANNER -->

<?php if($selfData["value"]->slider){ ?>
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
<?php } ?>