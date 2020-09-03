
<body class="editors-page invoice-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
    #invoice-item {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
	
	
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
		position: relative;
        width: 297mm;
        min-height: 210mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
	.page-background {
		width: 297mm;
		height: 210mm;
        padding: 5mm;
		position: absolute;
		top: 0;
		left: 0;
	}
	
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 170mm;
        outline: 2cm #FFEAEA solid;
    }
	.order-user {
		position: relative;
		top: 94px;
		left: 0;
	}
    .order-user * {
		color: #000;
		font-size: 16px;
	}
	.order-user-id {
		display: inline-block;
		position: absolute;
		left: 90px;
		top: 27px;
	}
	.order-user-name {
		display: inline-block;
		position: absolute;
		left: 340px;
		top: 26px;
	}
	.order-user-phone {
		display: inline-block;
		position: absolute;
		left: 580px;
		top: 26px;
	}
	.order-user-address {
		display: inline-block;
		position: absolute;
		left: 70px;
		top: 54px;	
	}
	.order-user-print-date {
		display: inline-block;
		position: absolute;
		left: 310px;
		top: -4px;
		font-size: 14px;
	}
	.order-user-orderId {
		display: inline-block;
		position: absolute;
		left: 510px;
		top: -3px;
		font-size: 14px;
	}
	.order-product {
		position: relative;
		margin-left: -18px;
		margin-right: -40px;
		top: 220px;
	}
	.order-product * {
		color: #000;
		font-size: 14px;
	}
	.order-product > .tb-row {
		position: relative;
		display:block;		
		border-bottom: 1px solid #000;
	}
	.order-product > .tb-row > .tb-cell  {
		position: relative;
		display:inline-block;		
		vertical-align: middle;	
		padding: 0 3px;
	}
	.order-product > .tb-row > .tb-cell.tb-pd-order {
		width: 43px;
		text-align: right;
	}
	.order-product > .tb-row > .tb-cell.tb-pd-code {
		width: 165px;
		text-align: right;		    
	}
	.order-product > .tb-row > .tb-cell.tb-pd-name {
		width: 220px;		
		text-align: right;
	}
	.order-product > .tb-row > .tb-cell.tb-pd-qty {
		width: 80px;
		text-align: center;
	}
	.order-product > .tb-row > .tb-cell.tb-pd-iso {
		width: 81px;
		text-align: center;
	}
	.order-product > .tb-row > .tb-cell.tb-pd-price {
		width: 98px;
		text-align: right;
	}
	.order-product > .tb-row > .tb-cell.tb-pd-subT {
		width: 107px;
		text-align: right;
	}
	.order-product > .tb-row > .tb-cell.tb-pd-remark {
		width: 200px;
		text-align: center;
	}
	.order-total {
		display: inline-block;
		position: absolute;
		left: 115px;
		top: 604px;
		font-size: 18px;
		color: #000;
	}
	.order-total > span {
		diplay:inline-block;
	}
	.text-overflow-hidden {
	  overflow : hidden;
	  text-overflow : ellipsis;
	  white-space : nowrap;
	  width : 100%;
      display: inline-block;
      position: relative;
		line-height: 14px;
		position: relative;
		height: 14px;
	}
    @page {
        size: A4 landscape;
        margin: 0;
		padding: 0;
    }
    @media print {
		@page { size: A4 landscape }
        html, body {
            width: 297mm;
            height: 210mm;        
        }
        .page {
            margin-top: 0;
            margin-bottom: 0;
			margin-left: -5mm;
			margin-right: -5mm;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
        }
		.page.page-break-after {
            page-break-after: always;
		}
		.page-avoid {
            page-break-after: avoid;
		}
        .page:first-child {
			margin-top: -20mm;
        }
    }
</style>
    <!-- Start: Main -->
    <div id="main" class="page-avoid">
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
        <section id="content_wrapper" class="page-avoid">

            <!-- Start: Topbar -->
            <header id="topbar">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="crumb-active">
                            <a>訂單管理</a>
                        </li>
                        <li class="crumb-active">
							<a>出貨單</a>
						</li>
                    </ol>
                </div>
            </header>
            <!-- End: Topbar -->
			

            <!-- Begin: Content -->
            <section id="content" class="page-avoid">

                <div class="panel invoice-panel page-avoid">
                    <div class="panel-heading">
                        <span class="panel-title"> <span class="glyphicon glyphicon-print"></span> 出貨單</span>
						<div class="pull-right">
							<a class="btn btn-system btn-xs" onclick="window.print();"> <span class="glyphicon glyphicon-print"></span> 列印 </a>
						</div>
                    </div>
                    <div class="panel-body page-avoid" id="invoice-item">
						<div class="book">
							<div class="page page-break-after">
								<img class="page-background" src="/assets/1.jpg" />
								
								<div class="order-user">
									<div class="order-user-print-date"><?php echo date("Y-m-d H:i:s");?></div>
									<div class="order-user-orderId"><?php echo $list_order["unique_id"];?></div>
									<div class="order-user-id"><?php echo ($list_order["userId"] == -1)?"非會員":$list_order["userId"];?></div>
									<div class="order-user-name"><?php echo $list_order['dataUser']["name"];?></div>
									<div class="order-user-phone"><?php echo $list_order['dataUser']["phone"];?></div>
									<div class="order-user-address"><?php echo $list_order['shipData']["address"];?></div>
								</div>
								<div class="order-product">
									<?php
										$ind = 1;
										foreach( $list_order['detail'] AS &$row )
										{
									?>
									<div class="tb-row">
										<div class="tb-cell tb-pd-order"><?php echo $ind;?></div>
										<div class="tb-cell tb-pd-code"><?php echo $row['id'];?></div>
										<div class="tb-cell tb-pd-name"><span class="text-overflow-hidden"><?php echo $row['productName'];?></span></div>
										<div class="tb-cell tb-pd-qty"><?php echo $row['qty'];?></div>
										<div class="tb-cell tb-pd-iso"><?php echo $list_order['iso_code'];?></div>
										<div class="tb-cell tb-pd-price"><?php echo $row['price'];?></div>
										<div class="tb-cell tb-pd-subT"><?php echo $row['price'] * $row['qty'];?></div>										
										<div class="tb-cell tb-pd-remark"></div>										
									</div>
									<?php
											$ind++;
										}
									?>
									<?php if( $list_order['shoppingPoint'] > 0 ) { ?>
									<div class="tb-row">
										<div class="tb-cell tb-pd-order"></div>
										<div class="tb-cell tb-pd-code"></div>
										<div class="tb-cell tb-pd-name">購物金</div>
										<div class="tb-cell tb-pd-qty"></div>
										<div class="tb-cell tb-pd-iso"><?php echo $list_order['iso_code'];?></div>
										<div class="tb-cell tb-pd-price"></div>
										<div class="tb-cell tb-pd-subT">(-)<?php echo round($list_order['shoppingPoint']/ $list_order['rate'], 4);?></div>										
										<div class="tb-cell tb-pd-remark"></div>										
									</div>
									<?php } ?>
									<?php if( $list_order['coupon']['amount'] > 0 ) { ?>
									<div class="tb-row">
										<div class="tb-cell tb-pd-order"></div>
										<div class="tb-cell tb-pd-code"></div>
										<div class="tb-cell tb-pd-name">優惠券</div>
										<div class="tb-cell tb-pd-qty"></div>
										<div class="tb-cell tb-pd-iso"><?php echo $list_order['iso_code'];?></div>
										<div class="tb-cell tb-pd-price"></div>
										<div class="tb-cell tb-pd-subT">(-)<?php echo round($list_order['coupon']['amount']/ $list_order['rate'], 4);?></div>										
										<div class="tb-cell tb-pd-remark"></div>										
									</div>
									<?php } ?>
									<div class="tb-row">
										<div class="tb-cell tb-pd-order"></div>
										<div class="tb-cell tb-pd-code"></div>
										<div class="tb-cell tb-pd-name">手續費</div>
										<div class="tb-cell tb-pd-qty"></div>
										<div class="tb-cell tb-pd-iso"><?php echo $list_order['iso_code'];?></div>
										<div class="tb-cell tb-pd-price"></div>
										<div class="tb-cell tb-pd-subT"><?php echo ( $list_order['transFee'] == 0)?0:round($list_order['transFee']/ $list_order['rate'], 4);?></div>										
										<div class="tb-cell tb-pd-remark"></div>										
									</div>
									<div class="tb-row">
										<div class="tb-cell tb-pd-order"></div>
										<div class="tb-cell tb-pd-code"></div>
										<div class="tb-cell tb-pd-name">運費</div>
										<div class="tb-cell tb-pd-qty"></div>
										<div class="tb-cell tb-pd-iso"><?php echo $list_order['iso_code'];?></div>
										<div class="tb-cell tb-pd-price"></div>
										<div class="tb-cell tb-pd-subT"><?php echo ( $list_order['transFare'] == 0)?0:round($list_order['transFare']/ $list_order['rate'], 4);?></div>										
										<div class="tb-cell tb-pd-remark"></div>										
									</div>
								</div>
								<div class="order-total">
									<span><?php echo $list_order['iso_code'];?></span>
									<span class="formart-price"><?php echo round($list_order['clearTotal']/ $list_order['rate'], 4);?></span>
								</div>
								
							</div>
							<div class="page page-break-after page-clone">
								<img class="page-background" src="/assets/2.jpg" />
							</div>
							<div class="page page-avoid page-clone">    
								<img class="page-background" src="/assets/3.jpg" />
							</div>
						</div>
                    </div>
					<div class="panel-footer text-center">
						<a class="btn btn-system" onclick="window.print();"> <span class="glyphicon glyphicon-print"></span> 列印 </a>
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
	
    <script type="text/javascript">
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();

        });
    </script>
    
	<script type="text/javascript">
	
	
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
	
		
	function changeStatus(itemId, option)
	{
		///console.log(itemId, option.value);
		if(confirm("確定修改？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/order/changeStatus');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"id" 	: itemId,
					"type" 	: option.value
				},
				success:function(data, status, xhr){
					console.log(data, status, xhr);
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'修改完成！':"修改失敗！";
					
					new PNotify({
						title: data.message,
						text: text,
						shadow: true,
						opacity: "0.75",
						type: type,
						stack: {
							"dir1": "down",
							"dir2": "left",
							"push": "top",
							"spacing1": 10,
							"spacing2": 10
						},
						width: "290px",
						delay: 1400
					});
					
					setTimeout(function(){
						//location.reload();
					},1000);
				},
				error:function(xhr, stauts, err){
					
					console.log(xhr, stauts, err);
					new PNotify({
						title: "系統異常",
						text: '該動作暫時無法完成！',
						shadow: true,
						opacity: "0.75",
						type: "danger",
						stack: {
							"dir1": "down",
							"dir2": "left",
							"push": "top",
							"spacing1": 10,
							"spacing2": 10
						},
						width: "290px",
						delay: 1400
					});
					
				}
			});
					
		}
	}

	
	$(function(){
		init_DataTable();
		
		$(".tb-pd-price").formatCurrency({ colorize:false, region: 'TWD', roundToDecimalPlace: 0 });
		$(".formart-price").formatCurrency({ colorize:false, region: 'TWD', roundToDecimalPlace: 0 });
		
		$(".page-clone").each(function(){
			$(this).append($(".order-user").eq(0).clone());
			$(this).append($(".order-product").eq(0).clone());
			$(this).append($(".order-total").eq(0).clone());
		});
	});
	</script>
	
</body>
</html>