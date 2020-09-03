<style><!--
	#wpo-content {
		margin-top:30px;
	}
	.label-quantity {
		font-size: 20px;
		font-weight: bold;
	}

	.cart {
		margin: 20px 0;
	}
	.countdown-list {
	  position: absolute;
	  top: 0;
	  right: 0;
	}
	.countdown-list:after {
	  content: " ";
	  background: url('/assets/act/flagged_bottom.png');
	  display: block;
	  width: 100%;
	  height: 10px;
	  background-size: 100%;
	  background-repeat: no-repeat;
	  margin-top: -5px;
	}
	.countdown-list > div > .date {
	  display:inline-block;
	}
	.countdown-list > div > .title {
	  display:block;
	}
	.countdown-list > span {
	  display: block;
	  text-align: center;
	  color: #fff;
	  background-color: #000;
	  border: 3px solid #000;
	  padding: 5px;
	}
	.date-block {
	  font-size: 18px;
	  color: #000;
	  font-weight: bold;
	  background-color: #fff;
	  border: 3px solid #000;
	  border-bottom: none;
	  padding: 5px;
	}
	.cdTime {
	  color: #FFF70C;
	  font-size: 18px;
	  display:inline-block;
	  font-weight: bold;
	}
	@media (max-width: 992px)
	{
	  .product-display {
		padding: 10px 25px;
	  }		
	  .product-info {
		margin-left: 0px !important;
		text-align: center;
	  }
	  .form-group {
		margin-bottom: 15px;
	  }	
	  .quick-checkout .control-label{
		  line-height: 45px !important;
	  }
	  .address-box {
		display: inline-block;
	  }
	  .input-group.bootstrap-touchspin {
		width: 180px;
		margin: 0 auto;
	  }
	  .description-content {
		text-align: initial;
		padding: 15px;
	  }
	}
--></style>

<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css"/>
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/cloud-zoom/cloudzoom.css">
<script type="text/javascript" src="/libs/cloud-zoom/cloudzoom.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
<script type="text/javascript" src="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

<!-- Slick.js CSS -->
<link rel="stylesheet" type="text/css" href="/libs/slick/slick.css">
<link rel="stylesheet" type="text/css" href="/libs/slick/slick-theme.css">

<!-- Slick JS -->
<script type="text/javascript" src="/libs/slick/slick.js"></script>

<script type="text/javascript" src="/assets/jquery.countdown.min.js"></script>
	
<script src="/libs/addr/json2.js"></script>
<script src="/libs/addr/json2ext.js"></script>
<script src="/libs/addr/jquery.twAddrHelper.js"></script>
<script src="/libs/addr/jquery.twzipcode-1.6.7.js"></script>	

<div class="container">
<div class="section mt15">
	<div class="row">
	<?php if( $product != false ) { ?>
		<div class="col-md-4">
			<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."product_zoom_slider.php"); ?>
		</div>		
		<div class="col-md-8">
			<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."product_info.php"); ?>			
		</div>
	<?php } else { ?>
		<center><H1><?php echo $objLang["product"]['noItem']; ?></H1></center>
	<?php } ?>
	</div>
	<div class="row">
	<?php if( $product != false ) { ?>
		<div class="col-md-12">
			<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."product_muti_desc.php"); ?>
		</div>		
	<?php } ?>
	</div>
</div>
</div>
<script>
$(function(){
	touchProduct();
});
</script>