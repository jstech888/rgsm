
<style>

.caption > H3 {
  margin-top: 5px;
  margin-bottom: 5px;
  height: auto;
  cursor: pointer;
  font-weight: normal;
}
.caption > H3:hover {
  color: rgb(190, 139, 86);
}
.caption {
  width: 250px;
  max-width: 100%;
  text-align: center;
  margin: 0 auto;
}
.btn-add-to-cart {
  font-size: 16px;
  padding: 6px;
}
.slider-block {
  padding: 0 38px;
}

</style>
<div class="container section mt15" style="position: relative;">
<?php if( count($listStory) > 0 ) { ?>
	<div class="block-title"><?php echo $objLang["function_bar"]["newsStory"];?></div>
	<a class="section-title more btn btn-rounded btn-info" href="/story"><?php echo $objLang["function_bar"]["readMore"];?></a></a>
	<div class="water-flow">
		<?php foreach( $listStory AS $k => &$story ) { 
			if( $k > 7)
				break;
		?> 
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
	<div class="clearfix"></div>
<?php } ?>
</div>