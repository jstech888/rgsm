<style>
.banner-block {
  width:100%;
  position: relative;
  overflow: hidden;
  margin: 0;
  padding-left: 0;
  padding-right: 0;
}
.banner-block .bkimg {
  width: 100%;
}
.info-block {
  position: absolute;
  top: 0;
}

.info-text-block {
  overflow:auto;
}
.info-btn-block {
  height:20%;
  width: 100%;
}
.info-btn-block .col-md-4 {
  text-align:center;
  padding:15px;
}
.info-btn-block .col-md-4 > a {
  display: inline-block;
}
.col-md-40 {
  width: 40%;
}
.col-md-60 {
  width: 60%;
}
.col-md-offset-52 {
  margin-left: 52%;
}
.col-md-48 {
  width:48%;
}

#collapseOne.collapse.in {
  position: fixed;
  width: 100%;
}


.info-title {
  font-size: 32px;
  color: #fff;
}
.info-description {
  font-size: 22px;
  color: #fff;
}

@media ( min-width: 992px ) { 
}
@media ( max-width: 992px ) { 
	.bkimg {
	  display:block;
	}
	.banner-block .bkimg {
	  width: 152%;
	  max-width: 152%;
	}
	.col-md-offset-52 {
	  margin-left: 0%;
	}
	.col-md-48 {
	  width:100%;
	}

	.info-block.top {
	  top:0;
	}
	.info-block.bottom {
	  bottom: 0;
	}
	.info-block {
	  position: relative;
	  text-align: center;
	}
	
	.info-text-block {
	  display: block;
	  text-align: left;
	}
	.info-btn-block {
	  min-height:150px;
	  width: 100%;
	}
	
	.info-btn-block .col-md-4 {
	  padding:3px;
	}

	.info-title {
	  color: #000;
	}
	.info-description {
	  color: #000;
	}
}

.app-icon {
  width: 100%;
}

.app-icon-block {
}

.appbtn-group {
  width:32%;
  float: left;
  padding-left: 11px;
  padding-right: 11px;
}
}

#loading {
  width: 100%;
  height: 100%;
  background: #fff;
  position: fixed;
  top: 100px;
  left: 0;
  border: none;  
  z-index: 10;
}
</style>
<div class="container page-container">
	<div id="loading"></div>
<?php 
	$infopage["content"] = json_decode($infopage["content"],true);
	foreach( $infopage["content"] AS $content )
	{
?>
	<div class="banner-block col-md-12">
		<img src="<?php echo $content["banner"]["url"];?>" class="img-responsive bkimg" />
		<div class="info-block bottom col-xs-12 col-md-offset-52 col-md-48">
			<div class="info-text-block" >
				<H1 class="info-title"><?php echo $content["title"];?></H1>
				<div class="info-description"><?php echo $content["description"];?></div>
			</div>
			<div class="clearfix"></div>
			<div class="info-btn-block">
			<?php 
				foreach( $content["appbtn"] AS $type=>$link )
				{
					if( !empty($link) )
					{
			?>
				<div class="appbtn-group">
					<a href="<?php echo $link;?>" class="app-icon-block"><img src="/assets/app/icon_<?php echo $type;?>.png" class="app-icon"/></a>
				</div>
			<?php
					}
				}
			?>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
<?php
	}
?>
</div>
<script>
	var checker = false;
	$(function(){		
		responsiveBanner();
		
		checker = setInterval(function(){
			if( $((".info-block")).eq(0).outerHeight() != $(".bkimg").eq(0).outerHeight() )
			{
				responsiveBanner();
			}
			else
			{
				$("#loading").fadeOut();
				clearInterval(checker);
			}				
		},500);
		
		$(window).resize(function(){
			responsiveBanner();	
		});
	});
	
	function responsiveBanner()
	{
		 $(".info-block").each(function(){
			var infoW = $(this).outerWidth();
			var zoom = infoW / 650;
			$(this).find(".info-title").css({"zoom":zoom});
			$(this).find(".info-description").css({"zoom":zoom});
		 });
		 
		 $(".bkimg").each(function(){
			var maxHeight = $(this).outerHeight();
			$(this).parent().find(".info-block").css({"height":maxHeight});
			//padding-top: 20%;
			//padding-bottom: 35%;
			var paddingTop = Math.floor( 20 * maxHeight / 100 );
			var paddingBottom = Math.floor( 35 * maxHeight / 100 );	
			
			if( document.documentElement.clientWidth < 992 )
			{		
				paddingTop = 10;
				paddingBottom = 15;
			}
			$(this).parent().find(".info-text-block").css({"padding-top":paddingTop,"padding-bottom":paddingBottom});
		 });
		
		//$(".info-btn-block").css({"min-height":btnBlockHeight,"height":btnBlockHeight,"max-height":btnBlockHeight});	
	}
</script>