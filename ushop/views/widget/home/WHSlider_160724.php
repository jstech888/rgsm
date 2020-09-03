<link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" />
<!-- <script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js"></script> -->
<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js?<?php echo $time;?>"></script>
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
</style>
		<div class="col-md-12">
      <div id="my-slide" class="scroll1">
      <?php          
      foreach( $HomeSlider AS $k => &$slider )
      {
      ?>
      	<div data-lazy-background="<?php echo $slider["value"]["image"]["url"];?>" slider-type="image" slider-key="<?php echo $k;?>">
          <?php if($slider["value"]["caption"]["title"]!=''){  ?>
            <a href="<?php echo $slider["value"]["caption"]["title"];?>">
          <?php } ?>    
            <img src="<?php echo $slider["value"]["image"]["url"];?>" alt="">
          <?php if(isset($slider["value"]["caption"]["title"])){  ?>
            </a>
          <?php } ?>
        </div>
      <?php
      }
      ?>
      </div>
    </div>

<script type="text/javascript">
// var HomeSlider = [{"id":"182","type":"HomeSlider","value":{"image":{"url":"\/ckfinder\/userfiles\/files\/Banner\/BANNER_s2.jpg","thubnailUrl":"\/ckfinder\/userfiles\/_thumbs\/files\/Banner\/BANNER_s2.jpg","src":"ckfinder\/userfiles\/files\/Banner\/BANNER_s2.jpg"},"caption":{"title":"","description":""},"alt":"","type":"image","pos":{"title":{"start":{"top":"80","left":"5"},"end":{"top":"5","left":"5"}},"description":{"start":{"top":"10","left":"80"},"end":{"top":"10","left":"5"}}}},"show":"1","sortKey":"0","langCode":"zh-hant"},{"id":"180","type":"HomeSlider","value":{"image":{"url":"\/ckfinder\/userfiles\/files\/Banner\/BANNER_s.jpg","thubnailUrl":"\/ckfinder\/userfiles\/_thumbs\/files\/Banner\/BANNER_s.jpg","src":"ckfinder\/userfiles\/files\/Banner\/BANNER_s.jpg"},"caption":{"title":"<p><span style=\"color:#FFFFFF\"><span style=\"font-size:28px\"><span style=\"font-family:arial,helvetica,sans-serif\">OPEN YOUR BODY<\/span><\/span><\/span><\/p>\n","description":"<p><span style=\"color:#FFFFFF\"><span style=\"font-size:28px\"><span style=\"font-family:arial,helvetica,sans-serif\">OPEN YOUR MIND<\/span><\/span><\/span><\/p>\n"},"alt":"","type":"image","pos":{"title":{"start":{"top":"2","left":"3"},"end":{"top":"30","left":"24"}},"description":{"start":{"top":"2","left":"75"},"end":{"top":"29","left":"61"}}}},"show":"1","sortKey":"1","langCode":"zh-hant"},{"id":"198","type":"HomeSlider","value":{"image":{"url":"\/ckfinder\/userfiles\/files\/Banner\/BANNER_s3.jpg","thubnailUrl":"\/ckfinder\/userfiles\/_thumbs\/files\/Banner\/BANNER_s3.jpg","src":"ckfinder\/userfiles\/files\/Banner\/BANNER_s3.jpg"},"caption":{"title":"","description":""},"alt":"","type":"image","pos":{"title":{"start":{"top":"5","left":"5"},"end":{"top":"5","left":"5"}},"description":{"start":{"top":"5","left":"5"},"end":{"top":"5","left":"5"}}}},"show":"1","sortKey":"2","langCode":"zh-hant"},{"id":"199","type":"HomeSlider","value":{"image":{"url":"\/ckfinder\/userfiles\/files\/Banner\/BANNER_s4.jpg","thubnailUrl":"\/ckfinder\/userfiles\/_thumbs\/files\/Banner\/BANNER_s4.jpg","src":"ckfinder\/userfiles\/files\/Banner\/BANNER_s4.jpg"},"caption":{"title":"","description":""},"alt":"","type":"image","pos":{"title":{"start":{"top":"5","left":"5"},"end":{"top":"5","left":"5"}},"description":{"start":{"top":"5","left":"5"},"end":{"top":"5","left":"5"}}}},"show":"1","sortKey":"3","langCode":"zh-hant"}];
// var tempDuration = false;
// var videoWaitting = false;
// var sliderCore = false;
// var param = false;
// $(function(){
//   $("#my-slide").hover(function(){
//     $(".inner.devrama-slider > .slider-control").fadeIn();
//   },function(){   
//     $(".inner.devrama-slider > .slider-control").hide();
//   });
//   $(".slider-control").each(function(){
//     $(this).click(function(){
//       sliderCore.is_pause = false;
//       $('.background').each(function(){
//         $(this).find("iframe").attr("src"," ");
//       });
//     });
//   });
//   //, positionControl: 'left-right'
//   var customParam  = {"transition":"random","navigationColor":"#ffffff","navigationHoverColor":"#a9a9a9","navigationHighlightColor":"#e91e63","duration":"5000","transitionSpeed":"1000","width":"1920","height":"650"};
//   // var customParam  = {"transition":"random","navigationColor":"#ffffff","navigationHoverColor":"#a9a9a9","navigationHighlightColor":"#e91e63","duration":"7000","transitionSpeed":"1000","width":"1920","height":"650"};
//   var defaultParam = {
//     width: 1400,
//     height: 650,
//     userCSS: false,
//     transitionSpeed: 1000,
//     duration: 5000,
//     showNavigation: true,
//     classNavigation: undefined,
//     navigationColor: '#797979',
//     navigationHoverColor: '#A9A9A9',
//     navigationHighlightColor: '#DFDFDF',
//     navigationNumberColor: '#000000',
//     positionNavigation: 'in-center-bottom',
//     navigationType: 'circle',
//     showControl: true,
//     classButtonNext: "slider-control-next",
//     classButtonPrevious: "slider-control-previous",
//     controlColor: '#FFFFFF',
//     controlBackgroundColor: '#000000',
//     showProgress: false,
//     progressColor: '#797979',
//     positionControl: 'left-right',
//     transition: 'slide-left',
//     onReady: function() {
//       setTimeout(responsiveSlider,500);
//     }
//   };
//   param = jQuery.extend( defaultParam, customParam );
//   param.width       = parseInt(param.width);
//   param.height      = parseInt(param.height);
//   param.transitionSpeed = parseInt(param.transitionSpeed);
//   param.duration      = parseInt(param.duration);
  
//       $('#my-slide').DrSlider(param);
//   });
//   function responsiveSlider()
//   {
//     var zoom = $(".background").eq(0).outerWidth()/1920;
//     $(".lazy-slider-title").css({"zoom":zoom});
//     $(".lazy-slider-description").css({"zoom":zoom});
//   }
//   $( window ).resize(function() {
//     responsiveSlider();
//   });
$(function(){
  var param = {
    width: 1400,
    height: 650
  }

  // $('#my-slide').DrSlider(param);
});
</script>