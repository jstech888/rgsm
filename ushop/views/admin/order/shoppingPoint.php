
<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
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
.center-block {
  text-align:center;
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
							<a>配置購物金</a>
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
                        <span class="panel-title"> <span class="glyphicon glyphicon-print"></span> 配置紅利點數</span>
                    </div>
                    <div class="panel-body p20" id="invoice-item">

                        <div class="row mb30">
                            <div class="col-md-12 center-block"> 
								<img src="/admin/img/ubestshop_logo.png" class="img-responsive center-block mt10 mw200 hidden-xs" alt="AdminDesigns"> 
							</div>
                            <div class="col-md-12 center-block">
                                <div>
                                    <h1 class="lh10 mt10 mn-title"> 交易資訊 </h1>
                                    <h5 class="mn"> 建立日期： <?php echo $list_order['createTime'];?> </h5>
                                    <h5 class="mn"> 訂單狀態： <?php echo $list_order['status']['html'];?> </h5>
                                    <h5 class="mn"> 姓名： <?php echo $list_order['dataUser']['name'];?> </h5>
                                    <h5 class="mn"> 信箱： <?php echo $list_order['dataUser']['mail'];?> </h5>
                                    <h5 class="mn"> 電話： <?php echo $list_order['dataUser']['phone'];?> </h5>
                                </div>
                            </div>
                        </div>
						<div class="row" id="invoice-footer">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <table class="table" id="invoice-summary">
                                        <thead>
                                            <tr>
                                                <th><b>小計</b></th>
                                                <th>TWD <?php echo $list_order['total'];?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>購物金折抵</b></td>
                                                <td>TWD (-)<?php echo $list_order['shoppingPoint'];?></td>
                                            </tr>
                                            <tr>
                                                <td><b>優惠券</b></td>
                                                <td>TWD (-)<?php echo $list_order['coupon']['amount'];?></td>
                                            </tr>
                                            <tr>
                                                <td><b>總計</b></td>
                                                <td>TWD <?php echo $list_order['total'] - $list_order['shoppingPoint'] - $list_order['coupon']['amount'];?></td>
                                            </tr>
                                            <tr>
                                                <td><b>本次 購物金</b></td>
                                                <td><input type="text" class="form-control" readonly value="<?php echo floor( ( $list_order['total'] - $list_order['shoppingPoint'] - $list_order['coupon']['amount'] ) / intval($ShoppingPointRate) );?>"/></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="clearfix"></div>
								
									<span style="padding-left:9px;">是否配置給 <?php echo $list_order['dataUser']['name'];?> ？</span>
									<div class="invoice-buttons" style="display: inline-block;">
										<a class="btn btn-default mr10" onclick="distributeShoppingPoint('<?php echo $list_order['id'];?>', '<?php echo $list_order['dataUser']['id'];?>', '<?php echo floor( ( $list_order['total'] - $list_order['shoppingPoint'] - $list_order['coupon']['amount'] ) / intval($ShoppingPointRate) );?>');"><i class="glyphicons glyphicons-settings pr5"></i> 配置</a>
									</div>
                            </div>
                        </div>

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
	
	function distributeShoppingPoint(transId, userId, value)
	{
		///console.log(itemId, option.value);
		if(confirm("確定配置？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/order/distributeShoppingPoint');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"transId"	: transId,
					"userId" 	: userId,
					"value" 	: value
				},
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'配置完成！':"配置失敗！";
					
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
						location.href = "/admin/order/listTable";
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
		
	});
	</script>
	
</body>
</html>