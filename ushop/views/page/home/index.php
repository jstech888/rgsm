<?php	
	include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."WHSlider.php");
	include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."ProductNavTabs.php");
	include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."GridBlock.php");
	include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."NewsNavTabs.php");
	include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."StoryNavTabs.php");
?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script>  
<script>
window.onload = function(){
	var zoom = ( $(".grid-container-block").outerWidth() / 1400 );
	$(".grid-container-1113").css({'zoom': zoom });
	$(".grid-block").click(function(){
		location.href = $(this).attr("data-href");
	});
	$('.productNavTabs-slider').each(function(){
		var sliderCount = $(this).attr("data-sliderCount");
		$(this).slick({
		  dots: false,
		  infinite: false,
		  autoplay: true,
		  centerMode: false,
		  focusOnSelect: true,
		  autoplaySpeed: 2000,
		  speed: 1000,
		  slidesToShow:( sliderCount > 4 ) ? 4:sliderCount,
		  slidesToScroll: ( sliderCount > 4 ) ? 4:sliderCount,
		  responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow:( sliderCount > 2 ) ? 2:sliderCount,
				slidesToScroll: ( sliderCount > 2 ) ? 2:sliderCount
			  }
			},
			{
			  breakpoint: 768,
			  settings: {
				slidesToShow: ( sliderCount > 1 ) ? 1:sliderCount,
				slidesToScroll: ( sliderCount > 1 ) ? 1:sliderCount
			  }
			}
		  ]
		});
	});
	
}
$( window ).resize(function() {
	var zoom = ( $(".grid-container-block").outerWidth() / 1400 );
	$(".grid-container-1113").css({'zoom': zoom });
});
$(function(){
  $('.water-flow').masonry({
    itemSelector : '.item-story', columnWidth : 350
  });	
});
</script>
<script>
$(function(){init_thumbnail});
$( window ).load(init_thumbnail);
$( window ).resize(init_thumbnail);
function init_thumbnail() 
{
	$(".NewsNavTabs-slider .thumbnail").each(function(){
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