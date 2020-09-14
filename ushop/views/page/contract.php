<style>
.wpo-title {
  font-weight: bold;
  text-align: center;
  border-bottom: 1px dashed #000;
  padding-bottom: 10px;
}
#wpo-mainbody p,
#wpo-mainbody li {
  line-height: 32px;
  font-size: 14px;
}
.head-article {
  text-align: center;
  vertical-align: middle;
  padding: 0px;
}
.head-article img {
  margin: 50px auto;
}
.body-article p{
  text-indent: 30px;
}
.wpo-mainbody {
  max-width: 800px;
}
.map {
  width: 100%;
  height: 400px;
}
</style>
<div id="wpo-mainbody" class="container wpo-mainbody">
	<div class="row">
		<!-- MAIN CONTENT -->
		<div id="wpo-content" class="wpo-content col-xs-12 no-sidebar" style="padding: 15px 12px">
			<h1 class="wpo-title"><?php echo $title;?></h1>			
			<article id="post-2510" class="post-2510 page type-page status-publish hentry">	
					<div class="col-sm-12 head-article">
						<div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="panel-title"><span class="glyphicon glyphicon-map-marker"></span><?php echo $image["markTitle"];?></span>
                            </div>
                            <div class="panel-body">
                                <div id="map_canvas1" class="map"></div>
                            </div>
                        </div>
					</div>
				<div class="content container">
					<div class="col-sm-12 body-article">
						<?php echo $content;?>
					</div>
				</div><!-- .entry-content -->
			</article><!-- #post -->
		</div>
		<!-- //MAIN CONTENT -->
	</div>
</div>

<!-- Google Map API -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<script type="text/javascript" src="http://labs.mario.ec/jquery-gmap/jquery.gmap.js"></script>
<!-- Bootstrap
<script type="text/javascript" src="/admin/theme/vendor/plugins/map/gmaps.min.js"></script>
<script type="text/javascript" src="/admin/theme/vendor/plugins/gmap/jquery.ui.map.min.js"></script>
<script type="text/javascript" src="/admin/theme/vendor/plugins/gmap/ui/jquery.ui.map.services.js"></script>
<script type="text/javascript" src="/admin/theme/vendor/plugins/gmap/ui/jquery.ui.map.extensions.js"></script>
<script type="text/javascript" src="/admin/theme/vendor/plugins/gmap/ui/jquery.ui.map.microformat.js"></script>
 -->
 
<script>
	var position = { coords : { latitude : "25.0554959", longitude : "121.592835" }}
	$(function(){
		// Initilize Gmap1 - basic
		if ($('#map_canvas1').length) {
			$('#map_canvas1').gMap({
				 address: "<?php echo $image["markAddress"];?>",
				 maptype: 'TERRAIN',
				 zoom: 13,
				 markers: [
					{
						address: "<?php echo $image["markAddress"];?>",
						html: "<?php echo $image["markTitle"];?>",
						icon: {
							image: "/asset/gmap_pin.png",
							iconsize: [74, 100],
							iconanchor: [74,100]
						},
						popup: true
					}
				]
			});
		}
	});
</script>