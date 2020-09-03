<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script>  
<style>
.breadcrumb {
  padding-left:  0;
}
.item-story {
  margin: 15px;  
  width: 270px;   
  float: left;  
  border: 1px solid #C6C6C6;
}
.caption {
  min-height: 70px;
  height: 70px;
  max-height: 70px;
  overflow: hidden;
  padding: 5px 15px;
}
.item-story-block {
}  
.water-flow {
  position: relative;
  display: block;
  margin-left: -15px;
  margin-right: -15px;
}
</style>
<div class="container">
<div class="section mt25">
	<!-- 麵包屑 -->
	<div class="text-right">
		<!-- 麵包屑 -->
		<ol class="breadcrumb">
		  <li><a href="/"><?php echo $objLang['shoppingcart']["home"];?></a></li>
		  <li><a href="/story"><?php echo $objLang['function_bar']["brand"];?></a></li>
		</ol>
		<div class="clearfix"></div>
		<!-- /麵包屑 -->
	</div>
	<div class="water-flow">
		<?php foreach( $listStory AS $story ) { ?> 
		<div class="item-story">
			<div class="thumbnail">
				<a href="/story/detail/<?php echo $story["id"];?>"><img src="<?php echo $story["value"]["url"];?>" class="responsive"/></a>
			</div>
			<div class="caption">
				<H3 class="story-title"><?php echo $story["blog-title"];?></H3>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php } ?>
	</div>
</div> 
</div>
<script>
$(function(){
  $('.water-flow').masonry({
    itemSelector : '.item-story', columnWidth : 300
  });
});
</script>