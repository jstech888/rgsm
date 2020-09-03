<?php
	$shoppingCart_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "ShoppingCart" . DIRECTORY_SEPARATOR;
	$temp_shoppingCart_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "ShoppingCart" . DIRECTORY_SEPARATOR . $Lang . ".json";		
	$shoppingCart_lang_path=(!file_exists($temp_shoppingCart_lang_path))?LANGPATH . "widget" . DIRECTORY_SEPARATOR . "ShoppingCart" . DIRECTORY_SEPARATOR . DEFAULTLANG . ".json":$temp_shoppingCart_lang_path;		
	$obj_shoppingCart_lang = json_decode( file_get_contents($shoppingCart_lang_path),true );
?>
<style>
	#header #cart {
		width: initial;
		margin: 8px 10px;
		z-index: 1003;
	}
	#header #cart .qty {
		display:inline-block;
	}
	#header #cart .content {
		background: #fff;
		padding: 8px;
		border: 1px solid #e7e7e7;
		z-index: 999;
		border-top: 0;
		right: 0;
		position: absolute;
	}
	#header #cart .content img {
		float: right;
		margin-left: 4px;
		margin-right: 20px;
		width: 55px;
		height: auto;
		box-shadow: 0 1px 2px 0 rgba(0,0,0,.3);
		-webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,.3);
	}
	#header #cart .buttons {
		text-align: right;
	}
	#header #cart .content .bknone {
		background:none;
		color:#FFF;
		padding-left: 15px;
	}
	#header #cart .content .buttons {
		border:none;
	}
	#header #cart .content .button{
		font-style: normal;
	}
	#header #cart > span {
	  color: #fff;
	  font-size: 18px;
	  height: 24px;
	  line-height: 24px;
	  text-align: center;
	  width: 24px;
	  position: relative;
	  background-color: #000;
	  cursor: pointer;
	}
	#header #cart .heading {
	  padding-top: 1px;
	}
	#header #cart .name {
	  text-align: left;
	}
	#header #cart .cart-item {
	  text-align: right;
	}
	#header #cart .fa-shopping-cart {
	  width: 30px;
	  font-size: 22px;
	  padding: 3px;
	  background: #000;
	  color: #FFF;
	}
	#header #cart .cart-link {
	  font-size: 18px;
	}
	#header #cart .content .bknone {
	  display: inline;
	}
	
	@media (max-width: 768px)
	{
		#cart {
		  text-align: center;
		  float: initial !important;
		}
	}
</style>

	<div id="cart" class="pull-right">
		<div class="media-body heading">
			<a class="cart-link dropdown-toggle" data-toggle="dropdown">
				<div class="fa fa-shopping-cart"></div>
				<div class="qty"><?php echo $cart['count'];?></div> 
				<?php echo $obj_shoppingCart_lang['items'];?> - <span class="amount"><?php echo $cart['total'];?></span>
			</a>
			<div class="content dropdown-menu">	     
				<ul class="cart_list product_list_widget">
					<li id="sample-cart-item">
						<button type="button" class="close remove-from-cart" data-product_id="1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
						<a href="/" class="cart-image pull-left">
							<img class="attachment-shop_thumbnail wp-post-image" alt="a">
						</a>
						<div class="cart-main-content media-body">
							<div class="name">
								<a href="/">sample</a>								
							</div>
							<p class="cart-item">
								<span class="quantity">1 × <span class="amount">1</span></span>
							</p>
						</div>
					</li>
				<?php
					if( count($cart['cart']) == 0 )
					{
				?>
					<li class="empty"><?php echo $obj_shoppingCart_lang['emptyDescription'];?></li>
				<?php
					}
					else
					{
						foreach( $cart['cart'] AS $item )
						{
				?>
					<li>
						<button type="button" class="close remove-from-cart" data-product_id="<?php echo $item['PID'];?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
						<a href="<?php echo $item['href'];?>" class="cart-image pull-left">
							<img src="<?php echo base_url($item['src']);?>" class="attachment-shop_thumbnail wp-post-image" alt="<?php echo $item['alt'];?>">
						</a>
						<div class="cart-main-content media-body">
							<div class="name">
								<a href="<?php echo $item['href'];?>"><?php echo $item['name'];?></a>								
							</div>
							<p class="cart-item">
								<span class="quantity"><?php echo $item['qty'];?> × $<span class="amount"><?php echo $item['cPrice'];?></span></span>
							</p>
						</div>
					</li>
				<?php
						}
					}
				?>
				</ul>
				<p class="total text-right empty-hide"><strong><?php echo $obj_shoppingCart_lang['subAccount'];?></strong> <span class="amount">$<?php echo $cart['total'];?></span></p>
				<p class="buttons empty-hide">
					<a href="<?php echo base_url("/shoppingcart/");?>" class="button wc-forward"><?php echo $obj_shoppingCart_lang['viewCart'];?> <span class="glyphicon glyphicon-arrow-right bknone" aria-hidden="true"></span></a>
				</p>
			</div>
		</div>
	</div>
<script type='text/javascript'>
	var CartItem = false;
    $(function() {
		$('.dropdown-toggle').dropdown();
		$('#cart .cart-link').find('.amount').formatCurrency({ colorize:true, region: 'zh-TW' });
		$("#cart .total").find('.amount').formatCurrency({ colorize:true, region: 'zh-TW' });
		
		CartItem = $("#sample-cart-item").clone();
		$("#sample-cart-item").remove();
		
		$(".add_to_cart_button").each(function(){
			$(this).removeAttr("href");
			$(this).unbind("click");
			$(this).bind("click",function(e){
				//console.log("t");
				e.preventDefault();
				var l = Ladda.create(this);
				var URLs = "<?php echo base_url('/shoppingcart/append');?>";
				var qty = ($('input[name="quantity"]').length > 0)?$('input[name="quantity"]').val():1;
				var postData = { 'PID':$(this).attr("data-product_id"), 'qty':qty };
				
				
				if(l.isLoading() == false)
				{
					l.start();
					$.ajax({
						  url: URLs,
						  type:"POST",
						  dataType:'json',
						  data:postData,
						  success: function(data,status,xhr){
							 l.stop();
							 new PNotify({
								title: "<?php echo $obj_shoppingCart_lang['addCartSuccessTitle'];?>",
								text: '<?php echo $obj_shoppingCart_lang['addCartSuccessContent'];?>',
								shadow: true,
								opacity: "1",
								type: "info",
								stack: {
									"dir1": "down",
									"dir2": "left",
									"push": "top",
									"spacing1": 10,
									"spacing2": 10
								},
								width: "290px",
								delay: 500
							});

							init_shopping_header_item(data);
							(typeof(init_shopping_page_item) == "function")?init_shopping_page_item(data):'';
							
						  },
						  error:function(xhr, ajaxOptions, thrownError){ 
							l.stop();
							//console.log(xhr.ajaxOptions,thrownError); 
							new PNotify({
								title: "<?php echo $obj_shoppingCart_lang['addCartFailureTitle'];?>",
								text: '<?php echo $obj_shoppingCart_lang['addCartFailureContent'];?>',
								shadow: true,
								opacity: "1",
								type: "danger",
								stack: {
									"dir1": "down",
									"dir2": "left",
									"push": "top",
									"spacing1": 10,
									"spacing2": 10
								},
								width: "290px",
								delay: 500
							});
						  }
					}).always(function() { l.stop(); });
					
					setTimeout(function(){l.stop()}, 5000); 

				}
				/*
					/*
					$(".empty-hide").show();
					var cart = $('#fixed-cart');
					var imgtodrag = $(this).parent().parent().parent().find("img").eq(0);
					if( $(".product-display").length > 0 )
						imgtodrag = $(".cloudzoom").eq(0);
					if (imgtodrag) {
						var imgclone = imgtodrag.clone();
							imgclone.offset({
							top: imgtodrag.offset().top,
							left: imgtodrag.offset().left
						});
							imgclone.css({
							'opacity': '0.8',
								'position': 'absolute',
								'height': '150px',
								'width': '150px',
								'z-index': '100'
						});
							imgclone.appendTo($('body'));
							imgclone.animate({
							'top': cart.offset().top + 10,
								'left': cart.offset().left + 10,
								'width': 75,
								'height': 75
						}, 500, 'linear',function(){
							
						});
						
						imgclone.animate({
							'width': 0,
							'height': 0
						}, function () {
							$(this).detach()
						});
						*/
					//}
			});
		});
		
		init_remove_cart_item();
    });
	
	function init_shopping_header_item(data)
	{
		$("#cart .cart_list").empty();
		
		if( data.cart.length == 0 )
		{
			//$(empty_cart).insertBefore($(".shop_table .total").parent());
			location.reload();
		}
		
		for( var k in data.cart )
		{
			var newItem = CartItem.clone();
			var objItem = data.cart[k];
			
			newItem.find(".remove-from-cart").attr("data-product_id",objItem.PID);
			newItem.find(".cart-image").attr("href",objItem.href);
			//console.log(objItem);
			newItem.find(".cart-image").find("img").attr("src",'/'+objItem.src);
			newItem.find(".cart-image").find("img").attr("alt",'/'+objItem.alt);
			newItem.find(".name").find("a").attr("href",objItem.href);
			newItem.find(".name").find("a").text(objItem.name);
			newItem.find(".cart-item").html('<span class="quantity">'+objItem.qty+' × $<span class="amount">'+objItem.cPrice+'</span></span>');
			$("#cart .cart_list").append(newItem);
		}
		init_remove_cart_item();
		$("#cart .total .amount"	).text('$'+data.total);
		$("#cart .cart-link .qty"	).text(data.count);
		$("#cart .cart-link .amount").text(data.total);
		
		$("#cart .total").find('.amount').formatCurrency({ colorize:true, region: 'zh-TW' });
		$('#cart .cart-link').find('.amount').formatCurrency({ colorize:true, region: 'zh-TW' });	
	}
	
	function init_remove_cart_item()
	{
		$(".remove-from-cart").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(){
				var URLs = "<?php echo base_url('/shoppingcart/delete');?>";
				var postData = { 'PID':$(this).attr("data-product_id")  };
				var _this = this;
				$.ajax({
					url: URLs,
					type:"POST",
					dataType:'json',
					data:postData,
					success: function(data,status,xhr){
						init_shopping_header_item(data);
					},
					error:function(xhr, ajaxOptions, thrownError){ 
						//console.log(xhr.ajaxOptions,thrownError); 
					}
				});
			});
		});
	}

</script>
