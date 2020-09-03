<style>
.img-responsive {
  width: 100%;
}
.page-content {
  text-align: center;
}
.page-artical {
  padding: 0 15px;
  margin: 0 auto;
  display: inline-block;
  text-align: left;
  float: initial;
}
.page-artical p {
  line-height: 30px;
  font-size: 16px;
}
img {
  max-width: 100%;
}
.page-block {
  margin: 0 auto;
  margin-top: 15px;
  float: none;
}
.page-title {
  font-size: 32px;
  font-weight: bold;
}
</style>
<div class="container">
	<div class="row">
		<?php 
			if( $this->data['image']['url'] == "/uploads/sample-icon.png" )
			{						
		?>
			<div class="col-sm-10 col-md-10 page-artical">
				<?php echo $content;?>
			</div>
		<?php
			}
			else
			{
				if( $layout == "up" )
				{
		?>
			<div class="col-sm-12 col-md-12">
				<a <?php echo $href;?>><img class="img-responsive" src="<?php echo $image['url'];?>"></a>
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-10 col-md-10 page-block">	
				<div class="page-title"><?php echo $title;?></div>
				<div class="page-artical">
					<?php echo $content;?>
				</div>
			</div>
		<?php
				}
				if( $layout == "down" )
				{
		?>
			<div class="col-sm-10 col-md-10 page-block">	
				<div class="page-title"><?php echo $title;?></div>
				<div class="page-artical">
					<?php echo $content;?>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-12 col-md-12">
				<a <?php echo $href;?>><img class="img-responsive" src="<?php echo $image['url'];?>"></a>
			</div>
			<div class="clearfix"></div>
		<?php
				}
				if( $layout == "left" )
				{
		?>
			<div class="col-sm-6 col-md-6">
				<a <?php echo $href;?>><img class="img-responsive" src="<?php echo $image['url'];?>"></a>
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-6 col-md-6 page-block">	
				<div class="page-title"><?php echo $title;?></div>
				<div class="page-artical">
					<?php echo $content;?>
				</div>
			</div>
			<div class="clearfix"></div>
		<?php
				}
				if( $layout == "right" )
				{
		?>
			<div class="col-sm-6 col-md-6 page-block">	
				<div class="page-title"><?php echo $title;?></div>
				<div class="page-artical">
					<?php echo $content;?>
				</div>
			</div>
			<div class="clearfix"></div>
		
			<div class="col-sm-6 col-md-6">
				<a <?php echo $href;?>><img class="img-responsive" src="<?php echo $image['url'];?>"></a>
			</div>
			<div class="clearfix"></div>
		<?php
				}
				if( $layout == "banner" )
				{
		?>
			<div class="col-sm-12 col-md-12">
				<a <?php echo $href;?>><img class="img-responsive" src="<?php echo $image['url'];?>"></a>
			</div>
			<div class="clearfix"></div>
		<?php
				}
			}						
		?>
	</div>
</div>