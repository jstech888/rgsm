<!DOCTYPE html>
<html>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
	<meta http-equiv="Content-Language" content="<?php echo $Lang;?>" />
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<meta http-equiv="Content-Encoding" content="gzip" />
	
    <meta charset="utf-8">
	
    <title><?php echo $meta["value"]["title"];?></title>
    <meta name="keywords" 		content="<?php echo isset($meta["value"]["keywords"])?$meta["value"]["keywords"]:"";?>" />
    <meta name="description" 	content="<?php echo isset($meta["value"]["description"])?$meta["value"]["description"]:"";?>">
	
	<meta name="google" 		content="notranslate" />
	
    <meta name="viewport" 		content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/libs/css/frontend.css" />
    <link rel="stylesheet" type="text/css" href="/libs/css/frontend_style.css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="/theme/assets/img/favicon.ico">
	
	<?php /*<meta property="og:site_name" content=""/>
	<meta property="og:url"                content="http://beautywomantest2.mooo.com" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="beautywomantest2" />
	<meta property="og:description"        content="beautywomantest2" />
	<meta property="og:image"              content="http://beautywomantest2.mooo.com/ckfinder/userfiles/files/Logo/LOGO.png" />
	<meta property="fb:admins" content="696537311">
	<meta property="fb:app_id" content="240635869352317">
	*/?> 

<?php if( isset($og) ) { ?>
	<!-- Facebook og 與 Google meta 設定 begin-->
	<meta property="og:url"                content="<?php echo $og["url"];?>" />
	<meta property="og:type"               content="<?php echo $og["type"];?>" />
	<meta property="og:title"              content="<?php echo trim($og["title"]);?>" />
	<meta property="og:description"        content="<?php echo $og["description"];?>" />
	<link rel="image_src" 				   href="<?php echo $og["image"];?>">
	<meta property="og:image" 			   content="<?php echo $og["image"];?>">
<?php } else { ?>		
    <meta name="author" 		content="<?php echo isset($meta["value"]["author"])?$meta["value"]["author"]:"";?>">
<?php }?>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<style>
	
	
	.on_sale-tccG9-icon {
	  background: url('/libs/images/promotionicon_<?php echo $Lang;?>.png');
	  background-size: 80px 80px;
	  background-repeat: no-repeat;
	  width: 80px;
	  height: 80px;
	  position: absolute;
	  top: -10px;
      right: -40px;
      display: inline-block;
	}
	
	.on_sale-tccG9-icon.size-xs {
	  background-size: 60px 60px;
	  width: 60px;
	  height: 60px;
	  top: -5px;
      right: -20px;
	}
	.on_sale-tccG9-icon.pos-center {
	  margin-left: 30px;
	  top: -10px;
	  right: 30px;
	}
	.on_sale-tccG9-icon.pos-left {
	  margin-left: 0;
	  top: -10px;
	  left: 0px;
	}
	.thumbnail {
	  position: relative;
	}

.social-tools {
  height: 24px;
/*   overflow: hidden; */
}
	</style>
</head> <!-- BEGIN: PAGE SCRIPTS -->
<body sCurrency="<?php echo $Currency;?>" sLanguage="<?php echo $Lang;?>">

	<script type="text/javascript" src="/libs/js/frontend.js"></script>

	<!-- 將這個標記放在標頭中，或放在內文結尾標記前面。 -->
		
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	
	<!-- 將這個標記放在標頭中，或放在內文結尾標記前面。 
		 
		 繁中 zh-TW
		 簡中 zh-CN
		 美國 空白
		 英國 en-GB
	-->
	<script src="https://apis.google.com/js/platform.js" async defer>
	  {lang: 'zh-TW'}
	</script>
	
	<script>
		var isLogin = <?php echo ($self === false)?'false':'true';?>;
		var region = "<?php echo $Currency;?>";
		var roundToDecimalPlace = 0;
		var prod_add_list = [];
		var prod_id_list = [];
		var idx = 0;
		
		function init_shoppingcart()
		{
			(region == "TWD")?roundToDecimalPlace = 0:roundToDecimalPlace = 2;	
			
			$(".dPrice").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });
			$(".nPrice").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });
			
			$(".btn-add-to-sp-cart").each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(){
					$.each(prod_id_list, function(key, value) {
					    // console.log(prod_add_list[value]);
					    var qty_now = $(".btn-add-to-addlist[data-pid='"+value+"']").attr("data-qty");
					    var formatType_now = $(".btn-add-to-addlist[data-pid='"+value+"']").attr("data-formattype");
// alert("key="+key+", PID="+value+", QTY="+qty_now+", formatType_now="+formatType_now);
					    cart.add(value, qty_now, formatType_now, function(s){return;});
					});
				});
			});

			$(".btn-add-to-addlist").click(function(){
				prod_id_list = [];
				idx = 0;
				$(".btn-add-to-addlist").each(function(){
					if($(this).prop("checked")===true){
						var PID = $(this).attr("data-pid");
						var qty = $(this).attr("data-qty");
						var formatType = $(this).attr("data-formatType");
						if ( formatType == "" )
						{
							PM.erro({
								title:objLang.shoppingcart.addCartFailureTitle,
								text:objLang.shoppingcart.addCartFailureSpec
							});
							$(this).prop("checked",false);
							$('#formattype'+PID).focus();
						}
						else{
							prod_add_list[PID] = {"qty":qty, "formatType":formatType};
							prod_id_list[idx] = PID;
							idx++;	
						}						
					}
				});
				// console.log(prod_id_list);
			});
			$(".btn-add-to-addlist2").each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(){
					if($(this).prop("checked")===true){
						var PID = $(this).attr("data-pid");
						var qty = $(this).attr("data-qty");
						var formatType = $(this).attr("data-formatType");
						if ( formatType == "" )
						{
							PM.erro({
								title:objLang.shoppingcart.addCartFailureTitle,
								text:objLang.shoppingcart.addCartFailureSpec
							});	
						}
						prod_id_list[idx] = PID;
						prod_add_list[PID] = {"qty":qty, "formatType":formatType};
						console.log(prod_id_list);
						idx++;
					}
					else{
						var PID = $(this).attr("data-pid");
						// delete product_add_list.PID;
						prod_id_list.indexOf(PID).remove();
						product_add_list[PID] = null;
						console.log(prod_id_list);
						idx--;
					}
					// var PID = $(this).attr("data-pid");
					// var qty = $(this).attr("data-qty");
					// var formatType = $(this).attr("data-formatType");
					// if ( formatType == "" )
					// {
					// 	PM.erro({
					// 			title:objLang.shoppingcart.addCartFailureTitle,
					// 			text:objLang.shoppingcart.addCartFailureSpec
					// 	});	
					// }
					// else
					// {
					// 	cart.add(PID,qty,formatType,function(s){return;});
					// }
				});
			});

			$(".formatType-select2").each(function(){
				$(this).on("change",function(){						
					var PID = $(this).attr("data-pid");
					var formatType = $(this).val();
					$(".btn-add-to-addlist[data-pid='"+PID+"']").attr("data-formatType",formatType);

					$(".btn-selectQty-to-add[data-pid='"+PID+"']").empty();
					if(formatTypeStock[formatType]>0){
						var max = formatTypeStock[formatType]>12 ? 12 : formatTypeStock[formatType];
						for(var i=1;i<=max;i++){
							$(".btn-selectQty-to-add[data-pid='"+PID+"']").append('<option value="' + i + '">' + i + '</option>');	
						}
					}
					else{
						$(".btn-selectQty-to-add[data-pid='"+PID+"']").append('<option value="">---</option>');	
					}
					
					// $(".btn-selectQty-to-add[data-pid='"+PID+"']").attr("max",formatTypeStock[formatType]);
					// $(".btn-selectQty-to-add[data-pid='"+PID+"']").val("1");
				});
			});
			$(".btn-selectQty-to-add2").each(function(){
				$(this).on("change",function(){			
					var PID = $(this).attr("data-pid");
					var qty = $(this).val();
					$(".btn-add-to-addlist[data-pid='"+PID+"']").attr("data-qty",qty);
				});
			});
			$(".formatType-select").each(function(){
				$(this).on("change",function(){						
					var PID = $(this).attr("data-pid");
					var formatType = $(this).val();
					$(".btn-add-to-cart[data-pid='"+PID+"']").attr("data-formatType",formatType);
					$(".btn-direct-buy[data-pid='"+PID+"']").attr("data-formatType",formatType);

					$(".btn-selectQty-to-add[data-pid='"+PID+"']").empty();
					if(formatTypeStock[formatType]>0){
						var max = formatTypeStock[formatType]>12 ? 12 : formatTypeStock[formatType];
						for(var i=1;i<=max;i++){
							$(".btn-selectQty-to-add[data-pid='"+PID+"']").append('<option value="' + i + '">' + i + '</option>');	
						}
					}
					else{
						$(".btn-selectQty-to-add[data-pid='"+PID+"']").append('<option value="">---</option>');	
					}

				});
			});
			
			$(".btn-add-to-cart").each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(){					
					var PID = $(this).attr("data-pid");
					var qty = $(this).attr("data-qty");
					var formatType = $(this).attr("data-formatType");
					if ( formatType == "" )
					{
						PM.erro({
								title:objLang.shoppingcart.addCartFailureTitle,
								text:objLang.shoppingcart.addCartFailureSpec
						});	
					}
					else
					{
						cart.add(PID,qty,formatType,function(s){return;});
					}
				});
			});

			$( ".btn-buy-direct" ).each( function()
			{
				$( this ).unbind( "click" );
				$( this ).bind( "click", function()
				{		
				  	var PID = $( this ).attr( "data-pid" );
				  	var qty = $( this ).attr( "data-qty" );
				  	var formatType = $( this ).attr( "data-formatType" );

				  	if ( formatType == "" )
					{
						PM.erro({
							title:objLang.shoppingcart.addCartFailureTitle,
							text:objLang.shoppingcart.addCartFailureSpec
						});
						return;
					}
					else
					{
						cart.add(PID,qty,formatType,function(s){
							location.href='/shoppingcart';
							return;
						});
					}
				} );
			} );
			$(".btn-selectQty-to-add").each(function(){
				$(this).on("change",function(){			
					var PID = $(this).attr("data-pid");
					var qty = $(this).val();
					$(".btn-add-to-cart[data-pid='"+PID+"']").attr("data-qty",qty);
					$(".btn-direct-buy[data-pid='"+PID+"']").attr("data-qty",qty);
				});
			});
			
		}
		$(function(){
			cart.init();
			init_shoppingcart();
			followIt();
		});
		
		var objLang = <?php echo json_encode($objLang,true);?>;
		var listCartItem = false;
		var cart = {	
			init : function() {
				$.ajax({
					 url: "/shoppingcart/show?currency="+region,
					 type:"GET",
					 dataType:'json',
					 cache: false,
					 success: function(data,status,xhr){
						 listCartItem = data;
						 $(".shopping-cart-block ul.media-list").empty();
						 if( data.cart.length == 0 )
						 {
							$(".shopping-cart-block ul.media-list").append('<li class="empty">'+objLang.shoppingcart.empty+'</li>');
						 }
						 else
						 {
							for( var k in data.cart )
							{
								var srcitem = data.cart[k];
								var additonProdStr = "" ;
								if (srcitem.status == "3") {
									additonProdStr = "<font color='red'>["+objLang.shoppingcart.addProd+"]</font>";
								}
								
								var newItem = '<li class="media">' +
									'<a type="button" class="close remove-from-cart" onclick="cart.del(\''+srcitem.PID+'\',\''+srcitem.formatType+'\');"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>' +
									'<a href="'+srcitem.href+'" class="pull-left">' +
										'<img src="'+srcitem.src+'" class="media-object" alt="'+srcitem.alt+'" style="max-width:80px">' +
									'</a>' +
									'<div class="media-body">' +
										'<div class="media-heading">' +
											'<a href="'+srcitem.href+'">'+additonProdStr+srcitem.name+'</a>' +
										'</div>' +
										'<p class="cart-item">' +
											'<span class="quantity">'+srcitem.qty+' × <span class="amount fcurrency">'+parseFloat(srcitem.showPrice).toFixed(2)+'</span></span>' +
										'</p>' +
									'</div>' +
								'</li>';
								
								$(".shopping-cart-block ul.media-list").append(newItem);
							}
						 }	
						 
						 $(".shopping-cart-block .total > .amount").text(data.total);
						 $(".shopping-cart-block .hightlight > .qty").text(data.count);
						 $(".shopping-cart-block .hightlight > .amount").text(data.total.toFixed(2));
						 
						$(".shopping-cart-block .total > .amount").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace  });
					 },
					 error:function(xhr, ajaxOptions, thrownError){ 
						PM.erro({
							title:objLang.shoppingcart.addCartFailureTitle,
							text:objLang.shoppingcart.addCartFailureContent
						});
					 }
				});
			},
			add : function(PID, qty, formatType, callback) 
			{
				$.ajax({
					url: "/shoppingcart/append",
					type:"POST",
					dataType:'json',
					data:{ 'PID' : PID, 'qty' : qty, 'formatType' : formatType },
					cache: false,
					success: function(data,status,xhr)
					{
					 	var type = data.code == "200"?"info":"danger";
						var title = data.code == "200"?objLang.shoppingcart.addCartSuccessTitle:objLang.shoppingcart.addCartInsufficientTitle;
						var text = data.code == "200"?objLang.shoppingcart.addCartSuccessContent:objLang.shoppingcart.addCartInsufficientContent;

						if ( data.code == "100" )
						{
						 	title = objLang.shoppingcart.addCartInsufficientTitle;
						 	text =  objLang.shoppingcart.addCartAddpurchaseError ;
						}
						else if( data.code == "-1" )
						{
						 	title = objLang.shoppingcart.addCartInsufficientTitle;
						 	text = objLang.shoppingcart.addCartInsufficientContent;
						}

						PM.show({
							type: type,
							title: title,
							text: text
						});
						
						cart.init();
						callback(true);
					},
					error:function(xhr, ajaxOptions, thrownError)
					{
						PM.erro({
							title:objLang.shoppingcart.addCartFailureTitle,
							text:objLang.shoppingcart.addCartFailureContent
						});						
						cart.init();
						callback(false);
					}
				});
			},
			addlist : function(Prod_List, callback) 
			{
				$.ajax({
					 url: "/shoppingcart/appendlist",
					 type:"POST",
					 dataType:'json',
					 data: Prod_List,
					 cache: false,
					 success: function(data,status,xhr){
					 	var type = data.code == "200"?"info":"danger";
						 var title = data.code == "200"?objLang.shoppingcart.addCartSuccessTitle:objLang.shoppingcart.addCartInsufficientTitle;
						 var text = data.code == "200"?objLang.shoppingcart.addCartSuccessContent:objLang.shoppingcart.addCartInsufficientContent;

						 if ( data.code == "100" )
						 {
						 	 title = objLang.shoppingcart.addCartInsufficientTitle;
						 	 text =  objLang.shoppingcart.addCartAddpurchaseError ;
						 }
						 else if( data.code == "-1" )
						 {
						 	 title = objLang.shoppingcart.addCartInsufficientTitle;
						 	 text = objLang.shoppingcart.addCartInsufficientContent;
						 }

						 PM.show({
							type: type,
							title: title,
							text: text
						 });
						cart.init();
						callback(true);
					 },
					 error:function(xhr, ajaxOptions, thrownError){ 
						PM.erro({
							title:objLang.shoppingcart.addCartFailureTitle,
							text:objLang.shoppingcart.addCartFailureContent
						});						
						cart.init();
						callback(false);
					 }
				});
			},			
			setQty : function() {
				
			},
			del : function(PID, formatType) {
				$.ajax({
					 url: "/shoppingcart/delete",
					 type:"POST",
					 dataType:'json',
					 data:{ 'PID' : PID, 'formatType' : formatType },
					 cache: false,
					 success: function(data,status,xhr){
						 PM.show({
							type: "info",
							title:objLang.shoppingcart.delCartSuccessTitle,
							text:objLang.shoppingcart.delCartSuccessContent
						 });						 
						cart.init();
					 },
					 error:function(xhr, ajaxOptions, thrownError){ 
						PM.erro({
							title:objLang.shoppingcart.addCartFailureTitle,
							text:objLang.shoppingcart.addCartFailureContent
						});						
						cart.init();
					 }
				});
			},
			clear : function(PID, formatType) 
			{
				$.ajax({
					url: "/shoppingcart/clear",
					type:"POST",
					dataType:'json',
					data:{},
					cache: false,
					success: function(data,status,xhr)
					{
						PM.show({
							type: "info",
							title:objLang.shoppingcart.delCartSuccessTitle,
							text:objLang.shoppingcart.delCartSuccessContent
						});
						cart.init();
					},
					error: function(xhr, ajaxOptions, thrownError)
					{
						PM.erro({
							title:objLang.shoppingcart.addCartFailureTitle,
							text:objLang.shoppingcart.addCartFailureContent
						});
						cart.init();
					}
				});
			}
		};
		

function followIt()
{
	$(".btn-follow-it").each(function()
	{
		$(this).unbind("click");
		$(this).bind("click",function()
		{
			var PID = $( this ).attr( "data-pid" );
			$.ajax({
				url : "/user/followlist/add",
				type : "POST",
				dataType : 'json',
				data :
				{
				  'PID' : PID
				},
				success : function( data, status, xhr )
				{
				  PM.show(
				  {
				    type : "info",
				    title : objLang.shoppingcart.followItSuccessTitle,
				    text : objLang.shoppingcart.followItSuccessContent
				  } );
				  cart.init();
				},
				error : function( xhr, ajaxOptions, thrownError )
				{
				  PM.erro(
				  {
				    title : objLang.shoppingcart.addCartFailureTitle,
				    text : objLang.shoppingcart.addCartFailureContent
				  } );
				  cart.init();
				}
			});
		});
	});

  	/*$(".btn-follow-it").click( function()
  	{
    // $( this ).click( function()
    // {
      var PID = $( this ).attr( "data-pid" );
      
      $.ajax(
      {
        url : "/user/followlist/add",
        type : "POST",
        dataType : 'json',
        data :
        {
          'PID' : PID
        },
        success : function( data, status, xhr )
        {
          PM.show(
          {
            type : "info",
            title : objLang.shoppingcart.followItSuccessTitle,
            text : objLang.shoppingcart.followItSuccessContent
          } );
          cart.init();
        },
        error : function( xhr, ajaxOptions, thrownError )
        {
          PM.erro(
          {
            title : objLang.shoppingcart.addCartFailureTitle,
            text : objLang.shoppingcart.addCartFailureContent
          } );
          cart.init();
        }
      } );

    // } );
  	});*/
}
</script>
<?php
if( $debugmode === false ) 
{
	include( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."mainmenu.php");
}
?>