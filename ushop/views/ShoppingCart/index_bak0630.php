<link rel="stylesheet" type="text/css"
	href="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
<script type="text/javascript"
	src="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<style>
.product-remove {
	text-align: center;
}
.product-remove>span.glyphicon-remove {
	cursor: pointer;
	color: #000;
	margin: 0 auto;
	font-size: 21px;
}
.product-remove>span.glyphicon-remove:hover {
	filter: alpa(opacity = 80); /* old IE */
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80,
		FinishOpacity=15, Style=3, StartX=0, FinishX=100, StartY=0, FinishY=16);
	/*supported by current IE*/
	-moz-opacity: 0.7; /* Moz + FF */
	opacity: 0.7; /* 支持新版瀏覽器 */
}
.product-name, .product-name>a {
	/*   color: #777; */
	font-size: 15px;
}
.product-thumbnail img:hover {
	filter: alpa(opacity = 80); /* old IE */
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80,
		FinishOpacity=15, Style=3, StartX=0, FinishX=100, StartY=0, FinishY=16);
	/*supported by current IE*/
	-moz-opacity: 0.7; /* Moz + FF */
	opacity: 0.7; /* 支持新版瀏覽器 */
}

.product-quantity-block {
	width: 120px;
}

.page-total {
	font-size: 16px;
	text-align: right;
}

.page-tools {
	text-align: right;
}
.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
}
.input-group-btn>.btn {
	padding: 6px 12px;
}

.btn-update-qty {
	display: none;
	position: absolute;
	margin-left: 40px;
	margin-top: 6px;
}

.product-quantity, .product-subtotal {
	position: relative;
}

.mobile-remove {
	display: none;
	position: absolute;
	top: 0;
	right: 0;
	color: red;
}

@media ( max-width : 992px) {
	.product-thumbnail, .product-price, .product-thumbnail, .product-price {
		display: none !important;
	}
}

@media ( max-width : 992px) {
	.product-remove, .product-thumbnail, .product-price {
		display: none !important;
	}
	.mobile-remove {
		display: block;
	}
}
@media screen and ( max-width : 460px) {
	#product-name{
		width: 85px;
	}
}
@media ( max-width : 360px) {
	.product-name>a {
		display: inline-block;
		max-width: 60px;
		overflow: hidden;
	}
}
#top{
	width: 1000px;
    max-width: 100%;
    margin: 0 auto;
    margin-top: 30px;
    margin-bottom: 20px;
    border-top-color: #9775ac;
}
.btn:hover {
    color: #333;
    text-decoration: none;
    background: #e0e0e0;
	border-color: #adadad;
}
.table>tbody>tr>td.product-subtotal {
  padding-right: 15px;
}
.table>thead:first-child>tr:first-child>th.product-formatType {
  min-width: 50px;
}
</style>
<div class="container">
	<div class="section mt10 p15 shopping-cart-container">
		<div class="panel panel-info panel-border top" id="top">
			<div class="panel-heading">
				<span class="panel-title"><?php echo $objLang["shoppingcart"]['title'];?></span>
			</div>
			<div class="panel-body">
				<table class="shoppincart-table cart table table-striped"
					cellspacing="0">
					<thead>
						<tr>
							<th class="product-remove">&nbsp;</th>
							<th class="product-thumbnail">&nbsp;</th>
							<th class="product-name" id="product-name"><?php echo $objLang["shoppingcart"]['productdTitle'];?></th>
							<th class="product-price"><?php echo $objLang["shoppingcart"]['productPrice'];?></th>
							<th class="product-formatType"><?php echo $objLang["shoppingcart"]['productFormatType'];?></th>
							<th class="product-quantity"><?php echo $objLang["shoppingcart"]['productQuantity'];?></th>
							<th class="product-subtotal"><?php echo $objLang["shoppingcart"]['productTotal'];?></th>
						</tr>
					</thead>
					<tbody>
						<!--<tr class="page-total">
						<td colspan="7" class="total">
							<strong><?php echo $objLang["shoppingcart"]['total'];?><?php echo $Currency;?></strong><span class="shoppingcart-total"><?php echo $ucart['total'];?></span>
						</td>
					</tr>-->
						<tr class="page-total">
							<td colspan="8" class="total"><strong><?php echo $objLang["shoppingcart"]['total'];?></strong>
							<?php if( $DateLimitCheckoutDiscount["inTerm"] === true ) { ?>										
							<span class="shoppingcart-total"><?php echo round(floatval($ucart['total']) * floatval($DateLimitCheckoutDiscount["Rate"]));?></span>
							<?php } else { ?>
							<span class="shoppingcart-total"><?php echo $ucart['total'];?></span>
							<?php } ?>
						</td>
						</tr>
						<tr class="page-tools">
							<td colspan="7" class="actions">
								<a class="btn btn-default" href="/"><?php echo $objLang["shoppingcart"]['keepshopping'];?></a>
								<?php 
								if ( intval($ucart['total']) > 0 )
								{
									if( $self !== false) 
									{
									?>
										<a class="btn btn-submit" href="/checkout"><?php echo $objLang["shoppingcart"]['checkout'];?></a>
									<?php
									}
									else{
								?>
								<!--<a class="btn btn-submit" href="/checkout"><?php echo $objLang["shoppingcart"]['checkout'];?></a>-->
									<a class="btn btn-submit" href="#please-login" data-toggle="modal"><?php echo $objLang["shoppingcart"]['checkout'];?></a>
								<?php
									}
								}
								?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="quick-view-box modal fade" id="please-login" tabindex="-1"
			role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body quick-view-content">
						<div class="panel-body">
						<form class="form-horizontal" role="form" method="post" action="/user/login" name="login_form" id="login_form">
							<input type="hidden" class="form-control" name="redirectURL" id="redirectURL" value="/checkout" >
							<div class="row">
								<div class="login-login col-sm-6">
									<div class="member-login title"><?php echo $objLang["login"]['panelTitle'];?>
									</div>
									<div class="member-login subtitle"><?php echo $objLang["login"]['checkLoginTitle'];?>
									</div>
									<div class="form-box">
										<div class="form-group">
											<label for="username" class="col-xs-4 control-label"><?php echo $objLang["login"]['username_Label'];?></label>
											<div class="col-xs-8">
												<input type="text" class="form-control" name="username" id="username" placeholder="<?php echo $objLang["login"]['username_placeholder'];?>" required>
											</div>
										</div>
										<div class="form-group">
											<label for="password" class="col-xs-4 control-label"><?php echo $objLang["login"]['password_Label'];?></label>
											<div class="col-xs-8">
												<input type="password" class="form-control" name="password" id="password" placeholder="<?php echo $objLang["login"]['password_placeholder'];?>" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12">
												<div class="captcha-label">
													<img id="captcha-image" class="responsive" src="<?php echo "/core/captcha.php?t=".time();?>" />
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 captcha-input">
												<input id="captcha-form" placeholder="<?php echo $objLang["login"]['captchaPlaceholder'];?>" type="text" name="captcha" class="form-control" maxlength="10" pattern="^([_A-z0-9]){3,10}$" required /> <a class="btn btn-default btn-reload" onclick="document.getElementById('captcha-image').src='/core/captcha.php?'+Math.random();document.getElementById('captcha-form').focus();"> <i class="fa fa-repeat"></i>
												</a> <span class="help-block with-errors"></span>
											</div>
										</div>
									</div>
									<div class="login-footer">
										<button type="submit" class="btn btn-default btn-submit"><?php echo $objLang["login"]['sign_in'];?></button>
										<a class="btn btn-default btn-forgotten" href="/user/forgot"><?php echo $objLang["login"]['forget_password'];?></a>
										<div class="clearfix"></div>
										<?php if ($isMemberCheckFacebook){?>
          									<div class="text-center" style="margin-top: 10px;">
												<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"><?php echo $objLang["login"]['facebookLoginTitle'];?>
												</fb:login-button>
											</div>
											<div class="clearfix"></div>
										<?php }?>
									</div>
								</div>
								<div class="login-register col-sm-6">								
								<div class="member-register title"><?php echo $objLang["login"]['registerTitle'];?>
									</div>
									<div class="member-register subtitle">									
									<?php echo $objLang["login"]['checkRegisterTitle'];?>
									</div>
									<div class="login-footer">
										<a class="btn btn-default btn-member" href="/user/register?redirectURL=/checkout"><?php echo $objLang["login"]['registerButtonTitle'];?></a>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- popup member area ends-->
	</div>
</div>
<script>
var ucart = false;
var DateLimitCheckoutDiscount = <?php echo json_encode($DateLimitCheckoutDiscount);?>;
var shoppincart = {
	init : function() {
		$.ajax({
			 url: "/shoppingcart/show",
			 type:"GET",
			 dataType:'json',
			 success: function(data,status,xhr){
				 ucart = data;
				 $("table.shoppincart-table tr.cart_item").remove();
				 if( ucart.count == 0 )
				{
					$("table.shoppincart-table tr.page-total span.shoppingcart-total").text(ucart.total);
					$("table.shoppincart-table tr.page-total span.shoppingcart-total").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });
					$('<tr class="empty"><td colspan="7"><center><H3>'+objLang.shoppingcart.emptyDescription+'</H3></center></td></tr>').insertBefore( "table.shoppincart-table tr.page-total");
				}
				 else 
				{
					var tmpTotal = ucart.total ;
				 	if ( DateLimitCheckoutDiscount.inTerm === true ) {
				 		if ( parseFloat(ucart.total) >= parseFloat(DateLimitCheckoutDiscount.LimitAmount) ){
				 			tmpTotal = Math.round(parseFloat(ucart.total)*parseFloat(DateLimitCheckoutDiscount.Rate)) ; 
				 		}
				 	}
				 	$("table.shoppincart-table tr.page-total span.shoppingcart-total").text(tmpTotal);
					$("table.shoppincart-table tr.page-total span.shoppingcart-total").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });

					for( var k in ucart.cart )
					{
						if ( ucart.cart[k].PID !== undefined ) {
							var CartItem = shoppincart.createCartItem(ucart.cart[k],k);
							$(CartItem).insertBefore("table.shoppincart-table tr.page-total");
							$('tr#cart-'+k+' td.product-quantity input[name="quantity"]').TouchSpin({ min: 1,　max: 100000　});
						}
					}
					$('td.product-quantity input[name="quantity"]').on("change",function(){
						$(this).parent().parent().parent().find(".btn-update-qty").show();
						if ( parseInt($(this).val()) > parseInt(ucart.cart[k].stock) ){ // 限制最多只能買庫存數量
							$(this).val(ucart.cart[k].stock);
						}
						//console.log($(this).val());
					});
					if ( DateLimitCheckoutDiscount.inTerm === true ) {
				 		if ( parseFloat(ucart.total) >= parseFloat(DateLimitCheckoutDiscount.LimitAmount) ){
				 			$("<tr class=\"cart_item\"><td colspan=\"8\" class=\"total\" style=\"color:red; font-size: 15px;text-align: right;\"><?php echo $objLang['shoppingcart']['dateLimitDiscountName'];?>:"+(Math.round((1-parseFloat(DateLimitCheckoutDiscount.Rate))*100))+"%</td></tr>").insertBefore($("table.shoppincart-table tr.page-total"))
				 		}
				 	}
				 }

				 /*
				 $("table.shoppincart-table tr.page-total span.shoppingcart-total").text(ucart.total);
				 $("table.shoppincart-table tr.page-total span.shoppingcart-total").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });
		
				 if( ucart.count == 0 )
				 {
					$('<tr colspan="7" class="empty"><td colspan="6"><center><H1>'+objLang.shoppingcart.emptyDescription+'</H1></center></td></tr>').insertBefore( "table.shoppincart-table tr.page-total");
				 }
				 else 
				 {		
					for( var k in ucart.cart )
					{
						var CartItem = shoppincart.createCartItem(ucart.cart[k],k);
						$(CartItem).insertBefore("table.shoppincart-table tr.page-total");
						$('tr#cart-'+k+' td.product-quantity input[name="quantity"]').TouchSpin({ min: 1,　max: 100000　});
						
					}
					$('td.product-quantity input[name="quantity"]').on("change",function(){
						$(this).parent().parent().parent().find(".btn-update-qty").show();
						console.log($(this).val());
					});
				 }*/
			 },
			 error:function(xhr, ajaxOptions, thrownError){ 
				PM.erro({
					title:objLang.shoppingcart.addCartFailureTitle,
					text:objLang.shoppingcart.addCartFailureContent
				});
			 }
		});
	},
	createCartItem : function(cartSrc,k) {
		var cartFormatType = "" ;
		var additonProdStr = "";
		if (cartSrc.formatType == "F") {
			cartFormatType = "--" ;
		}
		else{
			cartFormatType = cartSrc.formatType ;
		}
		if (cartSrc.status == "3") {
			additonProdStr = "<font color='red'>["+objLang.shoppingcart.addProd+"]</font>";
		}
		var newCartSrc = '<tr id="cart-'+k+'" class="cart_item">' +
			'<td class="product-remove"><span class="glyphicon glyphicon-remove" onclick="shoppincart.delCartItem(\''+cartSrc.PID+'\',\''+cartSrc.formatType+'\');"></span></td>' +
			'<td class="product-thumbnail">' +
				'<a href="'+cartSrc.href+'">' +
					'<img src="'+cartSrc.src+'" width="120px" class="responsive" alt="'+cartSrc.alt+'">' +
				'</a>' +
			'</td>' +
			'<td class="product-name"><a href="'+cartSrc.href+'">'+additonProdStr+cartSrc.name+'</a></td>' +
			'<td class="product-price">'+cartSrc.showPrice+'</td>' +
			'<td class="product-formatType">'+cartFormatType+'</td>' +
			'<td class="product-quantity">' +
				'<div class="product-quantity-block">' +
					'<input id="product-qty-input-'+cartSrc.PID+'-'+cartSrc.formatType+'" type="number" step="1" min="1" name="quantity" value="'+cartSrc.qty+'" class="input-text text form-control" size="4">' +
				'</div>' +
				'<div class="btn btn-success btn-xs btn-submit btn-update-qty" onclick="shoppincart.updateCartItem(\''+cartSrc.PID+'\',\''+cartSrc.formatType+'\');">'+objLang.shoppingcart.updateQty+'</div>' +
			'</td>' +
			'<td class="product-subtotal">' +
				'<span class="amount">'+(cartSrc.qty * cartSrc.showPrice)+'</span>' +
				'<div class="mobile-remove"><span class="glyphicon glyphicon-remove" onclick="shoppincart.delCartItem(\''+cartSrc.PID+'\',\''+cartSrc.formatType+'\');"></span></div>' +
			'</td>' +
		'</tr>';
		return newCartSrc;
	},
	updateCartItem : function( PID, formatType ) {
		var qty = $('#product-qty-input-'+PID+'-'+formatType).val();
		$.ajax({
			 url: "/shoppingcart/update",
			 type:"POST",
			 dataType:'json',
			 data:{ 'PID' : PID, 'qty' : qty, 'formatType' : formatType },
			 success: function(data,status,xhr){
				 PM.show({
					type: "info",
					title:objLang.shoppingcart.updCartSuccessTitle,
					text:objLang.shoppingcart.updCartSuccessContent
				 });		
				shoppincart.init();
				cart.init();
			 },
			 error:function(xhr, ajaxOptions, thrownError){ 
				PM.erro({
					title:objLang.shoppingcart.addCartFailureTitle,
					text:objLang.shoppingcart.addCartFailureContent
				});		
				shoppincart.init();				
				cart.init();
			 }
		});
		
	},
	delCartItem : function(PID, formatType) {
		$.ajax({
			 url: "/shoppingcart/delete",
			 type:"POST",
			 dataType:'json',
			 data:{ 'PID' : PID, 'formatType' : formatType  },
			 success: function(data,status,xhr){
				 PM.show({
					type: "info",
					title:objLang.shoppingcart.delCartSuccessTitle,
					text:objLang.shoppingcart.delCartSuccessContent
				 });		
				shoppincart.init();
				cart.init();
			 },
			 error:function(xhr, ajaxOptions, thrownError){ 
				PM.erro({
					title:objLang.shoppingcart.addCartFailureTitle,
					text:objLang.shoppingcart.addCartFailureContent
				});		
				shoppincart.init();				
				cart.init();
			 }
		});
	}
};

$(function(){
	shoppincart.init();
});
</script>