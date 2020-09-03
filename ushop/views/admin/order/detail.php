<?php
// if (!isset($_SESSION['referrer'])) {
    $_SESSION['referrer'] = "/admin/order/detail" ; 
// } else {
//     $_SESSION['referrer'] = "/admin/order/detail" ; 
// }
?>

<body class="editors-page invoice-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
.mn-title {
  height: 30px;
}
.mn {
	margin-top: 15px !important;
}
#invoice-item .mn,
#invoice-item address,
#invoice-item td {
  font-size: medium;
}
#invoice-item .panel-title,
#invoice-item th {
  font-size: large;
}
.line-title {
  font-size: 16px;
}
.line-item {
  text-align:left;
  diplay: inline-block;
  position: relative;
  width: 280px;
  margin: 0 auto;
  border-bottom: 1px solid #EEE;
}
.line-head {
  text-align:right;
  display: inline-block;
  font-size: 14px;
  width: 85px;
}
.line-body {
  text-align:center;
  display: inline-block;
  font-size: 14px;
}
.center-block {
  float:none;
  margin: 0 auto;
}
.head-block {
  padding: 15px;
  border-bottom: 1px solid #666;
}
.display-inline-block{
    display: inline-block;
}
</style>
    <!-- Start: Main -->
    <div id="main">
        <!-- Start: Header -->
		<?php
			include_once(dirname(dirname(__FILE__))."/widget/headerBar.php");
		?>
        <!-- End: Header -->

        <!-- Start: Sidebar -->
		<?php
			include_once(dirname(dirname(__FILE__))."/widget/MainMenu.php");
		?>
		
        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- Start: Topbar -->
            <header id="topbar">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="crumb-active">
                            <a>訂單管理</a>
                        </li>
                        <li class="crumb-active">
							<a>訂單明細</a>
						</li>
                    </ol>
                </div>
                <div class="topbar-right">
					<!-- <input type="radio" name="show" class="widget-isShow" checked> -->
                </div>
            </header>
            <!-- End: Topbar -->
			

            <!-- Begin: Content -->
            <section id="content" class="">

                <div class="panel invoice-panel">
                    <div class="panel-heading">
                        <span class="panel-title"> <span class="glyphicon glyphicon-print"></span> 訂單明細</span>
                    </div>
                    <div class="panel-body p20" id="invoice-item">

                        <div class="row mb30">
                            <div class="col-md-4">
                                <div class="pull-left">
                                    <h1 class="lh10 mt10 mn-title"> 訂單資訊 </h1>
                                    <h5 class="mn"> 訂單編號： <?php echo $list_order['unique_id'];?> </h5>
                                    <h5 class="mn"> 建立日期： <?php echo $list_order['createTime'];?> </h5>
                                    <h5 class="mn"> 訂單狀態： <?php echo isset($list_order["orderStatus"]["text"])? $list_order["orderStatus"]["text"]:"" ?> </h5>
                                    <h5 class="mn"> 付款狀態： <?php echo (isset($list_order["paymentStatus"]["text"]) && $list_order["paymentStatus"]["text"] != "" )? $list_order["paymentStatus"]["text"]:"" ?> <?php echo (isset($list_order["paymentTypeTime"]) && $list_order["paymentTypeTime"] !="0000-00-00 00:00:00")? "[".$list_order["paymentTypeTime"]."]":"--" ?> </h5>
                                    <h5 class="mn"> 運送狀態： <?php echo (isset($list_order["shipStatus"]["text"]) && $list_order["shipStatus"]["text"] !="" )? $list_order["shipStatus"]["text"]:"--" ?> <?php echo (isset($list_order["shipTypeTime"]) && $list_order["shipTypeTime"] !="0000-00-00 00:00:00")? "[".$list_order["shipTypeTime"]."]":"" ?> </h5>
                                </div>
                            </div>
                            <div class="col-md-4"> <img src="/admin/img/ubestshop_logo.png" class="img-responsive center-block mt10 mw200 hidden-xs" alt="AdminDesigns"> </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="row" id="invoice-info">
                            <div class="col-md-4">
                                <div class="panel panel-alt">
                                    <div class="panel-heading">
                                        <span class="panel-title"> <i class="fa fa-user"></i> 訂購人 </span>
                                    </div>
                                    <div class="panel-body">
										
                                        <address>
                                            帳號：<strong><?php echo ($list_order['dataUser']["name"] =="-1")? "(非會員)":$list_order['dataUser']["name"] ;?></strong>										
                                            <br>姓名：<strong><?php echo $list_order['dataUser']["nickname"];?></strong>											
                                            <br>信箱：<strong><?php echo $list_order['dataUser']["mail"];?></strong>
                                            <br>電話：<strong><?php echo $list_order['dataUser']["phone"];?></strong>
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-alt">
                                    <div class="panel-heading">
                                        <span class="panel-title"> <i class="fa fa-location-arrow"></i><?php echo $objLang["orderlist"]['ShipTo'];?></span>
                                    </div>
                                    <div class="panel-body">
                                        <address>
                                            <!--<strong><?php //echo $objLang["shoppingcart"][$list_order['shipFlow']]; ?></strong>-->
                                            收&nbsp;&nbsp;件&nbsp;&nbsp;人： <?php echo $list_order['shipData']["reciverName"];?>
                                            <br>郵遞區號： <?php echo $list_order['shipData']["zip"];?>
                                            <br>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址： <span id="addr_span"><?php echo $list_order['shipData']["address"];?> &nbsp;<a class="btn btn-info btn-xs btn-bank-remittances" onclick="editAddress();">修改</a></span>
                                            <span id="addr_edit_span" style="display:none;">
                                                <div class="country-switch text-left">
                                                  <label class="radio-inline">
                                                    <input type="radio" name="region" id="region0"  value="0" checked>
                                                    <?php echo $objLang['shoppingcart']["Taiwan"];?> </label>
                                                  <label class="radio-inline">
                                                    <input type="radio" name="region" id="region2" value="2">
                                                    <?php echo $objLang['shoppingcart']["Foreign"];?> </label>
                                                </div>
                                                <div class="countrysel" id="twzipcode">
                                                  <div data-role="county"  class="autoZip display-inline-block"></div>
                                                  <div data-role="district" class="autoZip display-inline-block"></div>
                                                  <div data-role="zipcode" class="zipcodedata display-inline-block"></div>
                                                </div>
                                                <input id="address" type="text" class="cAddress" value="<?php echo $list_order['shipData']["address"];?>" required style="width:300px;">
                                                <a class="btn btn-success btn-xs" onclick="editAddressUpdate();">儲存</a>&nbsp;
                                                <a class="btn btn-default btn-xs" onclick="cancelEditAddress();">取消</a></span>
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                            function editAddress(){
                                $('#addr_span').hide();
                                $('#addr_edit_span').show();
                            }
                            function cancelEditAddress(){
                                $('#addr_edit_span').hide();
                                $('#addr_span').show();                                
                            }                            
                            </script>
                            <div class="col-md-4">
                                <div class="panel panel-alt">
                                    <div class="panel-heading">
                                        <span class="panel-title"> <i class="fa fa-info"></i> 付款方式 </span>
                                    </div>
                                    <div class="panel-body">
                                        <label class="line-title"><?php echo $objLang["shoppingcart"][$list_order['cashFlow']]; ?></label>
                                        <?php
                                        if( $list_order['cashFlow'] == "BankRemittances" )
                                        {
                                            echo "<br> 客戶匯款帳戶後四碼：".$list_order['cashData']["BankRemittancesAccount"];
                                        }
                                        else
                                        {
                                        ?>
                                        <?php if (isset($list_order["cashData"]["callback"]["PaymentTypeName"]) ) {?>
                                        <div class="line-item">
                                            <div class="line-head"><strong>付款方式: </strong></div>
                                            <div class="line-body"><?php echo $list_order["cashData"]["callback"]["PaymentTypeName"] ;?></div>
                                        </div>
                                        <?php }?>

                                        <?php if (isset($list_order["cashData"]["callback"]["ExpireDate"]) ) {?>
                                        <div class="line-item">
                                            <div class="line-head"><strong>付款期限: </strong></div>
                                            <div class="line-body"><?php echo $list_order["cashData"]["callback"]["ExpireDate"] ;?></div>
                                        </div>
                                        <?php }?>
                                        
                                        <?php
                                        }
                                        ?>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-alt">
                                    <div class="panel-heading">
                                        <span class="panel-title"> <i class="fa fa-info"></i> 發票類型 </span>
                                    </div>
                                    <div class="panel-body">
                                        <label class="line-title"><?php echo $objLang["shoppingcart"][$list_order['invoiceData']['type']]; ?></label>
										<?php
										if( $list_order['invoiceData']['type'] == "InvoiceTypeTwo" )
										{
                                            echo "<br> 發票抬頭：".$list_order['invoiceData']["title"];
											echo "<br> 統一編號：".$list_order['invoiceData']["number"];
										}
										?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="invoice-table">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>名稱</th>
                                            <th>數量</th>
                                            <th>規格</th>
                                            <th>單價</th>
                                            <th>合計</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										foreach( $list_order['detail'] AS $row )
										{                                       
									?>
                                        <tr>
                                            <td><b><?php echo $row['id'];?></b></td>
                                            <td><?php echo $row['productName'];?></td>
                                            <td><?php echo $row['qty'];?></td>
                                            <td><?php echo ( $row['formatType'] == "F")? "--": $row['formatType'] ;?></td>
                                            <td><?php echo $row['price'];?></td>
                                            <td class="text-right pr10"><?php echo $row['price'] * $row['qty'];?></td>
                                        </tr>
									<?php
										}
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
						<?php $order = $list_order;?>
                        <div class="row" id="invoice-footer">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <table class="table" id="invoice-summary">
                                        <thead>
                                            <tr>
                                                <th><b>小計</b>
                                                </th>
												<th class="text-right" style="  width: 100px;"><?php echo round($order['total']/ $order['rate'], 4);?></th>
                                            </tr>
                                        </thead>
										<tbody>
                                            <?php if( isset($list_order["promotionObj"]["value"]["inTerm"]) && $list_order["promotionObj"]["value"]["inTerm"] === true ) { ?>
                                              <tr>
                                                <td><b>促銷折扣</b></td>
                                                <td class="text-right">(-)<?php echo ( $order["promotionObj"]["value"]["discountAmout"] == 0)?0:round($order["promotionObj"]["value"]["discountAmout"]/ $order['rate'], 4);?></td>
                                              </tr>
                                            <?php } ?>
											<tr>
												<td><b>購物金</b></td>
												<td class="text-right">(-)<?php echo ( $order['shoppingPoint'] == 0)?0:round($order['shoppingPoint']/ $order['rate'], 4);?></td>
											</tr>
											<tr>
												<td><b>優惠券</b></td>
												<td class="text-right">(-)<?php echo ( $order['coupon']['amount'] == 0)?0:round($order['coupon']['amount']/ $order['rate'], 4);?></td>
											</tr>
											<tr>
												<td><b>手續費</b></td>
												<td class="text-right"><?php echo ( $order['transFee'] == 0)?0:round($order['transFee']/ $order['rate'], 4);?></td>
											</tr>
											<tr>
												<td><b>運費</b></td>
												<td class="text-right"><?php echo ( $order['transFare'] == 0)?0:round($order['transFare']/ $order['rate'], 4);?></td>
											</tr>
											<tr>
												<td><b>總計</b>
												</td>
												<td class="text-right"><?php echo $order['iso_code'];?> <span class="dPrice"><?php echo round($order['clearTotal']/ $order['rate'], 4);?></span></td>
											</tr>
										</tbody>
                                    </table>
                                </div>
                                <div class="clearfix"></div>
                                <div class="invoice-buttons">
                                    <a href="javascript:window.print()" class="btn btn-default mr10"><i class="fa fa-print pr5"></i> 列印</a>
                                </div>
                            </div>
                        </div>
                        <br><br>

                        <?php /*<div class="col-md-12">
                            <div class="panel panel-alt">
                                <div class="panel-heading">
                                    <span class="panel-title"> <i class="fa fa-info"></i> 備註 </span>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-12 mb15">
                                        <textarea name="memo" id="memo" rows="12" style=" width:100%;"></textarea>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="pull-right mr10">
                                        <button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
                                            <span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
                                            <span class="ladda-spinner"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>*/?>



                    </div>
                </div>

            </section>
            <!-- End: Content -->
           
        </section>
	</div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="/admin/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="/admin/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/editors/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/magnific/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/spin.min.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/ladda.min.js"></script>
    <script type="text/javascript" src="/libs/jquery.switchButton.js"></script>
	
    <!-- Datatables -->
    <script type="text/javascript" src="/admin/vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

    <!-- Datatables Tabletools addon -->
    <script type="text/javascript" src="/admin/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

    <!-- Datatables Editor addon - READ LICENSING NOT MIT  -->
	<script src="/libs/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="/libs/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
	
	<script src="/libs/formatcurrency/jquery.formatCurrency.js?t=<?php echo time();?>"></script>
	<script src="/libs/formatcurrency/i18n/jquery.formatCurrency.all.js?t=<?php echo time();?>"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/demo.js"></script>
    <script type="text/javascript" src="/admin/js/page.js"></script>

    <script src="/libs/addr/jquery.twAddrHelper.js"></script>
    <script src="/libs/addr/jquery.twzipcode-1.7.8.min.js"></script>
	
    <script type="text/javascript">
    var addr =
            {
                "taiwan": "<?php echo $list_order['region'];?>",
                "county": "<?php echo $list_order['country'];?>",
                "district": "<?php echo $list_order['district'];?>",
                "address": "<?php echo $list_order['address'];?>"
            };
    var setAddress = false;
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();

            // CKEDITOR.disableAutoInline = true;
            
            // var editorContent1 = CKEDITOR.replace('ckeditor1', {
            //     filebrowserBrowseUrl: '/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
            //     height: 400
            // });

            // var desc = (typeof(detail['value']['description']) == "undefined")?"":detail['value']['description'];
            // CKEDITOR.instances.ckeditor1.setData(desc);
            $('.country-switch input[type="radio"]').each(function(){
                $(this).on("click", function( ){
                    var val = $( '.country-switch input[type="radio"]:checked' ).val( );
                    ( val == 0 ) ? $(".cCountry").val("TW") : $(".cCountry").val("OT");
                    ( val == 0 ) ? $(".autoZip").fadeIn() : $( ".autoZip" ).fadeOut();
                    ( val == 0 ) ? $(".zipcodedata").fadeIn() : $(".zipcodedata").fadeOut();
                    $(".cAddress").val("");

                    //console.log( val ) ;
                    // init_transDetail(); //計算運費
                });
            });

            $( '#twzipcode' ).twzipcode( ); 
            // setAddressInput($("#dvAddress"));

            $( "[name=\"county\"]" ).bind( "change", function( ){
                $( ".cAddress " ).val( $( this ).val( ) + $( "[name=\"district\"]" ).val( ) );
                // init_transDetail(); //計算運費 台灣外島
            });
            
            $( "[name=\"district\"]" ).bind( "change", function( ){
              $( ".cAddress " ).val( $( "[name=\"county\"]" ).val( ) + $( this ).val( ) );
              // init_transDetail(); //計算運費 台灣外島
            });
           
            $( ".autoZip" ).find( "input" ).bind( "change", function(){
                $( ".cZip" ).val( $( this ).val( ) );
            });

            init_deliveryAddress();

        });
    </script>
    
	<script type="text/javascript">
	function init_deliveryAddress(){
        var crtA = <?php echo json_encode($list_order['shipData']);?>;
        $('input[name="region"][value="'+crtA.region+'"]').get(0).click();
        $('select[name="county"] > option[value="'+crtA.city+'"]').prop("selected",true).change();
        $('select[name="county"] > option[value="'+crtA.city+'"]').attr("selected",true).change();
        $('select[name="district"] > option[value="'+crtA.district+'"]').prop("selected",true).change();
        $('select[name="district"] > option[value="'+crtA.district+'"]').attr("selected",true).change();
        $('input[name="zipcode"]').val(crtA.zip);
        $('input.cAddress').val(crtA.address);
        if( crtA.reciverName !="" && crtA.region !="" && crtA.city !="" && crtA.district !="" && crtA.zip !="" && crtA.address !="" ){
            $("#accordion .shoppingcart-trip-5").text( $(".cAddress").val() );  
      
            if( $.trim($(".cAddress").val()) == "" || $.trim($('input[name="reciverName"]').val()) == "" )
            {
                $.trim($(".cAddress").val()) == "" ?$(".cAddress").addClass("error"):"";
                $.trim($('input[name="reciverName"]').val()) == "" ?$('input[name="reciverName"]').addClass("error"):"";
                err = true;
            }
            else{
                checkoutFlowVaildate[5] = true;
            }
        }
    }

	function init_DataTable()
	{
		$('#datatable3').dataTable({
			"order": [[ 0, "desc" ]],
			"language": {
				"lengthMenu"		: "每頁顯示 _MENU_ 筆",
				"search"			: "關鍵字　",
				"zeroRecords"		: "找不到任何相對應資料",
				"info"				: "目前 _PAGE_ 頁，共 _PAGES_ 頁",
				"infoEmpty"			: "資料是空的",
				"infoFiltered"		: "(從 _MAX_ 筆資料中篩選)"
			}
		});
	}

    function editAddressUpdate()
    {
        if(confirm('確定修改?')){
            // e.preventDefault();
            var ajaxData = 
                {   "id"        : <?php echo $list_order['detail'][0]['transactionId'];?>,
                    "method"    : "orderAddrUpdate",
                    "region"    : $('input[name="region"]').val(),
                    "zip"       : $('input[name="zipcode"]').val(),
                    "address"   : $('#address').val(),
                    "city"      : $('select[name="county"]').val(),
                    "district"  : $('select[name="district"]').val()
                };
            // var l = Ladda.create(this);
            // l.start();
            $.ajax({
                url: "/admin/order/changeAddr",
                async:true,
                cache:false,
                method:"POST",
                data:ajaxData,
                success:function(data, status, xhr){
                    // l.stop();
                    var type = data.code == 1?"info":"danger";
                    var text = data.code == 1?'儲存完成！':"儲存失敗！";
                    PM.show({"title":data.message,"text":text,"type":type});

                    setTimeout(function(){
                        location.reload();
                        // location.href = '<?php echo $back_url;?>';
                    },500);
                },
                error:function(xhr, stauts, err){
                    // l.stop();
                    PM.erro();
                }
            }).always(function() { 
                //l.stop(); 
            });
            // l.stop();
            return false;
        }
    }

    function init_pagesave()
    {
        $('.page-save').click(function(e){
            e.preventDefault();

            var ajaxData = { "detail" : [ 
                    { "id" : <?php echo $list_order['detail'][0]['transactionId'];?> },
                    { "memo" : $('#memo').val() }
                    // { "memo" : CKEDITOR.instances.ckeditor1.getData(desc) },
            ]};

            var l = Ladda.create(this);
            l.start();
            $.ajax({
                url: "/admin/order/saveMemo",
                async:true,
                cache:false,
                method:"POST",
                data:ajaxData,
                success:function(data, status, xhr){
                    l.stop();
                    var type = data.code == 1?"info":"danger";
                    var text = data.code == 1?'儲存完成！':"儲存失敗！";
                    PM.show({"title":data.message,"text":text,"type":type});

                    setTimeout(function(){
                        // location.href = '<?php echo $back_url;?>';
                    },500);
                },
                error:function(xhr, stauts, err){
                    l.stop();
                    PM.erro();
                }
            }).always(function() { l.stop(); });
            l.stop();
            return false;
        });
    }
	
	
	var region = '<?php echo $list_order["iso_code"];?>';
	var roundToDecimalPlace = 0;
	
	$(function(){
		init_DataTable();
        init_pagesave();

		(region == "TWD")?roundToDecimalPlace = 0:roundToDecimalPlace = 2;
		$(".dPrice").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });

	});
	</script>
	
</body>
</html>