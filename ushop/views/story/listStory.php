<link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css"/>
<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js?1460354894"></script>
<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css"/>
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script>  
<style>
.breadcrumb-block {
  position: relative;
  display: block;
  margin-left: 0;
  margin-right: 0;
}
.caption > H3 {
  margin-top: 5px;
  margin-bottom: 5px;
  height: auto;
  cursor: pointer;
  font-weight: normal;
  font-size: 18px;
}
.caption > H3:hover {
  color: #601586;
}
.water-flow {
  position: relative;
  display: block;  
}
@media (max-width: 1400px) 
{
  .breadcrumb-block {
	width: 950px;
	margin: 0 auto;
	padding: 0 11px;
  }	
  .water-flow {
    margin-left: auto;
    margin-right: auto;
  }
}
@media (max-width: 992px) 
{
  .breadcrumb-block {
	width: 705px;
	margin: 0 auto;
	padding: 0 11px;
  }	
}
@media (max-width: 768px)
{
  .breadcrumb-block {
	width: 305px;
    position: relative;
	max-width: 100%;
	margin: 0 auto;
	padding: 0;
  }	
}
.item-story {
    width: 300px;
    margin: 10px;
    float: left;
    border: 1px solid #C6C6C6;
}
</style>
<style>
  .breadcrumb-block {
    position: relative;
    display: block;
    margin-left: 0;
    margin-right: 0;
  }
  .caption > H3 {
    margin-top: 5px;
    margin-bottom: 5px;
    height: auto;
    cursor: pointer;
    font-weight: normal;
    font-size: 18px;
  }
  .caption > H3:hover {
    color: #601586;
  }
  .water-flow {
    position: relative;
    display: block;
  }
  @media (max-width: 1400px) {
    .breadcrumb-block {
      width: 950px;
      margin: 0 auto;
      padding: 0 11px;
    }
    .water-flow {
      margin-left: auto;
      margin-right: auto;
    }
  }
  @media (max-width: 992px) {
    .breadcrumb-block {
      width: 705px;
      margin: 0 auto;
      padding: 0 11px;
    }
  }
  @media (max-width: 768px) {
    .breadcrumb-block {
      width: 305px;
      position: relative;
      max-width: 100%;
      margin: 0 auto;
      padding: 0;
    }
  }
  .item-story {
    width: 300px;
    margin: 10px;
    float: left;
    border: 1px solid #C6C6C6;
  }

  h3.story-title {
    font-size: 20px;
    line-height: 26px;
    margin: 10px 0;
  }
</style>
<div class="container media self">
<div class="section mt25">
	<!-- 麵包屑 -->
	<div class="breadcrumb-block">
		<!-- 麵包屑 -->
		<ol class="breadcrumb">
		  <li><a href="/"><?php echo $objLang['shoppingcart']["home"];?></a></li>
		  <li><a href="/<?php echo $method ; ?>"><?php echo $titleName ; ?></a></li>
		</ol>
		<div class="clearfix"></div>
		<!-- /麵包屑 -->
	</div>
	<div class="media-story text-center">
		<div class="water-flow">
			<?php foreach( $listStory AS $story ) { ?> 
			<div class="item-story">
				<div class="thumbnail">
					<a href="/<?php echo $method ; ?>/detail/<?php echo $story["id"];?>"><img src="<?php echo $story["value"]["url"];?>" class="responsive"/></a>
				</div>
				<div class="caption">
					<a href="/<?php echo $method ; ?>/detail/<?php echo $story["id"];?>"><H3 class="story-title"><?php echo $story["blog-title"];?></H3></a>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php } ?>
		</div>
	</div>
</div> 
</div>
<script>
window.onload = function(){
  $('.water-flow').masonry({
    itemSelector : '.item-story', columnWidth : 320
  });
};
</script>