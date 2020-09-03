<style>
#ad-title{
	color:#4817B1;
	font-size: 15px;
}
</style>
<div class="row table-layout ad-item aboutMe static" style="border-bottom:none;">
	<div class="col-xs-6 p15 prC">
		<a class="ad-image" href="/blog/moderators/<?php echo $bloger["id"];?>">
			<div class="thumbnail">
				<img src="<?php echo $bloger["picture"]["url"];?>" class="responsive product-image"/>
			</div>
		</a>
	</div>
	<div class="col-xs-6 info-block p15">
		<div><span><?php echo $objLang["bloger"]["nick"];?></span><span class="ad-title" id="ad-title"><?php echo $bloger["name"];?></span></div>
		<div><span><?php echo $objLang["bloger"]["blogTitle"];?></span><span class="ad-title" id="ad-title"><?php echo $blog["value"][$Lang]["title"];?></span></div>
		<div><span><?php echo $objLang["bloger"]["touch"];?></span><span class="ad-title"><b style="color:#D81987;"><?php echo $blog["touch"];?></b><?php echo $objLang["bloger"]["touchQty"];?></span></div>
	</div>
	<div class="clearfix"></div>
</div>
<div class="row table-layout ad-item static" style="border-top:none;  border-bottom: 1px solid #DDD">
	<div class="col-xs-12" id="col-xs-12">
		<span class="ad-title"><?php echo $objLang["bloger"]["blogDesc"];?></span>
		<div class="ad-desc" style="color:#064AA5;"><?php echo $blog["value"][$Lang]["description"];?></div>
	</div>
</div>