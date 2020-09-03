<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script>  
<style>
.breadcrumb {
  padding-left:  0;
}
</style>
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
	<div class="text-center">
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
    itemSelector : '.item-story', columnWidth : 350
  });
});
</script>