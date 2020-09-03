<?php
if (!isset($_SESSION['referrer'])) {
    $_SESSION['referrer'] = "" ; 
} else {
	if ( $_SESSION['referrer'] == "/admin/order/detail" ) {
		 $_SESSION['referrer'] = "" ; 
		 header("Refresh:0");
	}
}
?>

<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>

.tabs-menu {
  margin-top: 15px;
}
.tabs-content  {
  padding: 20px 10px;
  border: 1px #e3e3e3 solid;
}
.nav.nav-tabs{
  border-bottom:none;
}
.nav.nav-tabs li.active {
  background: #FFF;
}
.embed-responsive {
	height:600px;
}
.media-left {
  padding: 0;
  border: 1px #e4e4e4 solid;
  background: #eaeaea;
}
.media-left .glyphicons {
  margin: 15px;
}
.media-left {
  vertical-align: middle;
}
.dd-edit {
  top: inherit;
  bottom: 0;
}
.media-body {
  padding: 5px 25px;
  font-weight: normal;
}
ul {
  -webkit-padding-start: 20px;
}
#datatable3_length {
  margin: 15px;
}
select[name="datatable3_length"] {
  display:inline-block;
}
#datatable3_filter {
  margin: 15px;
}
input[type="search"]{
  display: inline-block;
}
#datatable3_info {
  margin: 15px;
}
#datatable3_paginate {
  margin: 15px;
}
.order_status {
	color: #fff;
}
.order_status_selector {
  color: #000;
  /*position: absolute;*/
  /*margin-top: 6px;*/
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
                    </ol>
                </div>
                <div class="topbar-right">
					<!-- <input type="radio" name="show" class="widget-isShow" checked> -->
                </div>
            </header>
            <!-- End: Topbar -->
			
            <!-- Begin: Content -->
            <section class="table-layout animated fadeIn">
                <!-- begin: .tray-center -->
                <div class="tray tray-center p30 pb0 va-t animated-delay"  data-animate="1100">
					<div class="panel">
						<div class="panel-heading">
							<!-- title -->
							<h3 class="panel-title text-muted text-center mt10 fw400">訂單管理</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										操作區塊
									</div>
								</div>
								<div class="panel-body">
									<div class="row ">
										<div class="form-group">
											<label for="inputUniqueHost" class="col-xs-12 col-lg-1 control-label text-right" >訂單時間:</label>
											<div class="col-lg-2"> 
                        			            <input type="radio" name="quickDateAsign" value="3" onclick="changeSearchDate(3);" > 3 天 
                        			            <input type="radio" name="quickDateAsign" value="7" onclick="changeSearchDate(7);" > 1 週  
                        			            <input type="radio" name="quickDateAsign" value="30" onclick="changeSearchDate(30);" > 1 月 
                        			            <input type="radio" name="quickDateAsign" value="99" onclick="changeSearchDate(99);" > ALL
                        			        </div>
                        			        <div class="col-lg-2"> 
                        			        	<div class="form-group">
                        			        		<div class="col-lg-5">
                        			        			<input type="text" class="form-control startdate" name="start" id="start" value="<?php echo isset($start)? $start:"" ;?>" style="width:100px" >
                        			        		</div>
                        			        		<div class="col-lg-2">
                        			        			<label for="inputUniqueHost" class="control-label text-right" >~</label>
                        			        		</div>
                        			        		<div class="col-lg-5">
                        			        			<input type="text" class="form-control enddate" name="end" id="end" value="<?php echo isset($end)? $end:"" ;?>" style="width:100px" >
                        			        		</div>
                        			        	</div>
                        			        </div>                        			        
                        			        <div class="col-lg-2">
                        			        	<div class="form-group">
                        			        		<div class="col-lg-2">
                        			            		<label for="inputUniqueHost" class="control-label text-right"  >email: </label>		
                        			            	</div>
                        			            	<div class="col-lg-10">
                        			            		<input type="email" class="form-control" name="email" id="email" value="<?php echo isset($email)? $email:"" ;?>" >
                        			            	</div>
                        			            </div>
                        			        </div>
                        			        <div class="col-lg-1 text-right" style="padding-top: 8px;">
                        			            <button type="button" onclick="frmSearch();" class="btn btn-primary btn-xs pull-left">查詢</button>
                        			            <button type="button" onclick="frmReset();" class="btn btn-xs pull-left" style="margin-left: 10px;">清除</button>
                        			        </div>
                        			    </div>
									</div>
									<div class="row ">
                			        	<div class="form-group">
                			        		<div class="col-lg-2" style="text-align: right;" >
                			        			<label for="inputUniqueHost"  class="control-label" >訂單狀態:</label>
                			        		</div>
                			        		<div class="col-lg-2">
                			        			<select class="form-control" name="ordtype" id="ordtype">
                			        				<option value="all" >全部</option>
													<?php
													foreach( $list_status_selector AS $inds => $option )
													{
														$isSelected = ( isset($ordtype) && $ordtype == $inds && $ordtype !== "all") ? " selected" : "";
													?>
														<option value="<?php echo $inds;?>" <?php echo $isSelected;?>><?php echo $option ;?></option>
													<?php 
													}
													?>
												</select>
                			        		</div>
                			        		<div class="col-lg-2" style="text-align: right;">
                			        			<label for="inputUniqueHost"  class="control-label" >付款狀態:</label>
                			        		</div>
                			        		<div class="col-lg-2">
                			        			<select class="form-control" name="paymenttype" id="paymenttype">
                			        				<option value="all" >全部</option>
													<?php
													foreach( $list_payment_status_selector AS $inds => $option )
													{
														if( $inds != "0")
														{
															$isSelected = ( isset($paymenttype) && $paymenttype == $inds && $paymenttype !== "all") ? " selected" : "";
													?>
															<option value="<?php echo $inds;?>" <?php echo $isSelected;?>><?php echo $option ;?></option>
													<?php 
														}
													}
													?>
												</select>
                			        		</div>
                			        		<div class="col-lg-2" style="text-align: right;">
                			        			<label for="inputUniqueHost"  class="control-label" >運送狀態:</label>
                			        		</div>
                			        		<div class="col-lg-2">
                			        			<select class="form-control" name="shiptype" id="shiptype">
                			        				<option value="all" >全部</option>
													<?php
													foreach( $list_ship_status_selector AS $inds => $option )
													{
														if( $inds != "0")
														{
															$isSelected = ( isset($shiptype) && $shiptype == $inds && $shiptype !== "all") ? " selected" : "";
													?>
															<option value="<?php echo $inds;?>" <?php echo $isSelected;?>><?php echo $option ;?></option>
													<?php 
														}
													}
													?>
												</select>
                			        		</div>
                			        	</div>
                    			    </div>
									
									<div class="panel-heading">
										<div class="panel-title hidden-xs">
											<span class="glyphicon glyphicon-tasks"></span>訂單列表</div>
									</div>
									<div class="panel-body pn">
										<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>編號</th>
													<th>客戶</th>
													<th>訂單狀態</th>
													<th>付款狀態</th>
													<th>運送狀態</th>
													<th>付款</th>
													<th>總額</th>
													<th>時間</th>
													<th>操作</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>編號</th>
													<th>客戶</th>
													<th>訂單狀態</th>
													<th>付款狀態</th>
													<th>運送狀態</th>
													<th>付款</th>
													<th>總額</th>
													<th>時間</th>
													<th>操作</th>
												</tr>
											</tfoot>
											<tbody>
											<?php 
												foreach( $list_order AS $record ) 
												{
											?>
												<tr>
													<td><?php echo $record["unique_id"];?></td>
													<td><?php echo $record["userMail"];?></td>
													<td class="order_status">
														<select id="orderType_<?php echo $record["id"];?>" class="order_status_selector" style="width:52px;" onchange="orderPopup('<?php echo $record["id"];?>','<?php echo $record["unique_id"];?>', this);">
														<?php
														$tmpOrderString = " ";
														foreach( $list_status_selector AS $inds => $option )
														{
															$isSelected = ( $record["type"] == $inds ) ? " selected" : "";
															$tmpOrderString = ( $record["type"] == $inds ) ? $option : "";
														?>
															<option value="<?php echo $inds;?>" <?php echo $isSelected;?>><?php echo $option;?></option>
														<?php													
														}
														?>
														</select>
														<?php /*<br/>
														<?php echo $tmpOrderString ; */?>
													</td>
													<td class="order_status">
														<select id="paymentType_<?php echo $record["id"];?>" class="order_status_selector" style="width:52px;" onchange="paymentPopup('<?php echo $record["id"];?>','<?php echo $record["unique_id"];?>', this);">
														<?php
														$tmpPaymentString = " ";
														foreach( $list_payment_status_selector AS $inds => $option )
														{
															$isSelected = ( $record["paymentType"] == $inds ) ? " selected" : "";
															$tmpPaymentString = ( $record["paymentType"] == $inds ) ? $option : "";
														?>
															<option value="<?php echo $inds;?>" <?php echo $isSelected;?>><?php echo $option;?></option>
														<?php													
														}
														?>
														</select>
														<?php /*<br/>
														<?php echo $tmpPaymentString ; */?>
													</td>
													<td class="order_status">
														<select id="shipType_<?php echo $record["id"];?>" class="order_status_selector" style="width:52px;" onchange="shipPopup('<?php echo $record["id"];?>','<?php echo $record["unique_id"];?>', this);">
														<?php
														$tmpShipString = " ";
														foreach( $list_ship_status_selector AS $inds => $option )
														{
															$isSelected = ( $record["shipType"] == $inds ) ? " selected" : "";
															$tmpShipString = ( $record["shipType"] == $inds ) ? $option : "";
														?>
															<option value="<?php echo $inds;?>" <?php echo $isSelected;?>><?php echo $option;?></option>
														<?php													
														}
														?>
														</select>
														<?php /*<br/>
														<?php echo $tmpShipString ; */?>
													</td>
													<td><?php echo $objLang["shoppingcart"][$record['cashFlow']]; ?>
													<?php echo isset($record['cashData']["callback"]["PaymentTypeName"]) ? "(".$record['cashData']["callback"]["PaymentTypeName"].")":"" ?>
													<?php 
// error_log(print_r($record["cashData"],true)."\r\n\r\n",3,"uploads/log_admin_order_listTable_record[cashData].log");													
														if( $record["cashFlow"] == "BankRemittances" )
														{	
// echo "<br>BankRemittancesAccount=".$record["cashData"]["BankRemittancesAccount"];
															echo "銀行匯款<br/>後四碼：" . "<input id=\"bank-remittances-account-".$record["id"]."\" type=\"text\" value=\"".$record["cashData"]["BankRemittancesAccount"]."\" style=\"width:52px;\" > ";
															echo "&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"btn btn-success btn-xs btn-bank-remittances\" onclick=\"changeRemittCanUpdate(".$record["id"].")\">修改</a> " ;
														}
													?></td>
													<td><?php echo $record["iso_code"];?> <?php echo round($record['clearTotal']/ $record['rate'], 2);?></td>
													<td><?php echo $record["createTime"];?></td>
													<td>	
														<a href="/admin/order/detail?id=<?php echo $record["id"];?>" class="btn btn-success btn-xs">檢視</a>	
														<a class="btn btn-info btn-xs" onclick="orderLogPopup('<?php echo $record["unique_id"];?>');" >更改紀錄</a>
													<?php
														$shipTypeTime_arr = explode(" ", $record["shipTypeTime"]);
														$shipTypeDate_arr = explode("-", $shipTypeTime_arr[0]);
														$deadline = date("Y-m-d H:i:s", mktime(23, 59, 59, $shipTypeDate_arr[1], $shipTypeDate_arr[2]+7, $shipTypeDate_arr[0]));
														$nowTime = date("Y-m-d H:i:s");
														if( ($record["shipType"] == 10 || $record["shipType"] == 30) && ($nowTime>=$deadline) && $record["userId"] != "-1" && intval($ShoppingPointRate) > 0 )
														{
															if( $record["isAllot"] == 0 )
															{
													?>
														<a href="/admin/order/shoppingPoint?id=<?php echo $record["id"];?>" class="btn btn-primary btn-xs">配置購物金</a>	
													<?php
															}
															else
															{
													?>
														<a class="btn btn-default btn-xs">購物金已配置</a>														
													<?php
															}	
															
														}
													?>
													<?php
													$failType = array("-1");   // 作廢
													if( in_array($record["type"], $failType) )
													{
														// 作廢 時 顯示 庫存回補 ；更改 訂單 "isRefundStock: 1=>已回補"
														if ( $record["isRefundStock"] == "0" ) {
															echo "<a onclick=\"refundStock('".$record["id"]."')\" class=\"btn btn-primary btn-xs\">庫存回補</a>	";
														}
														else{
															echo "<a class=\"btn btn-default btn-xs\">庫存已回補</a>	" ;
														}
													}
													/* 
													if( $record["type"] == 2 ) { ?>
														<a href="/admin/order/ShipmentNotice?id=<?php echo $record["id"];?>" class="btn btn-system btn-xs">出貨單</a>
													<?php
													}
														$failType = array("101","100","-1");
														if( in_array($record["type"], $failType) )
														{
															if( $record["bonusLogId"] != "-1" && isset($record["bonusStatus"]) ){
																if( $record["bonusStatus"] == "1" ){
																	?>
					
																<a onclick="revokeBonus(<?php echo $record["bonusLogId"];?>);" class="btn btn-danger btn-xs">註銷紅利金</a>
															<?php
																}
																else if(  $record["bonusStatus"] == "0" ){
																?>
																<a class="btn btn-danger btn-xs">紅利金已註銷</a>
															<?php
																}
															}
														}
														else{
															if( $record["bonusLogId"] != "-1" ){
																if( isset($record["bonusStatus"]) ){
																	if( $record["bonusStatus"] == "1" ){
																	?>
																		<a class="btn btn-danger btn-xs">紅利金已配置</a>
																	<?php
																	}
																	else if( $record["bonusStatus"] == "0" ){
																	?>
																		<a class="btn btn-danger btn-xs">紅利金已註銷</a>
																	<?php
																	}
																}
															}

														}*/
													?>
													</td>
												</tr>
											<?php
												}
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end: .tray-center -->
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

	<!-- jquery popup -->
    <script type="text/javascript" src="/libs/jquery.bpopup.js"></script>

    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/tagmanager/tagmanager.js"></script>

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
    var orderStatus = <?php echo json_encode($list_status_selector) ; ?> ;
    var paymentStatus = <?php echo json_encode($list_payment_status_selector) ; ?> ;
    var shipStatus = <?php echo json_encode($list_ship_status_selector) ; ?> ;
    
    $(function(){
		$('.startdate').datetimepicker({
			"format" : "YYYY-MM-DD",
			"pickTime": false
		});
		$('.enddate').datetimepicker({
			"format" : "YYYY-MM-DD",
			"pickTime": false
		});
	});
   	function frmSearch(){
		FormSubmit({
			method: "POST",
			action: "/admin/order/listTable",
			data: { start : $('#start').val(),
				end : $('#end').val(),
				ordtype : $('#ordtype').find(":selected").val()  ,
				email : $('#email').val()
				}
		});
	}
	function frmReset(){
		$('#start').val('');
		$('#end').val('');
		$('#ordtype').find(":selected").attr("selected", false);
		$('#ordtype option[value=all]').attr("selected", true);
		$('#email').val('') ;
	}

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

	function changeRemittCanUpdate(itemId)
	{
		var tmpval = $('#bank-remittances-account-'+itemId).val(); 
		var cashData =  { 'BankRemittancesAccount':tmpval } ;
		//console.log(itemId, tmpval , cashData );
		if(confirm("確定修改？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/order/changeBankRemittancesAccount');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"id" 	: itemId,
					"cashFlow" 	: "BankRemittances",
					"cashData" 	: cashData
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
						location.reload();
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
	
	function refundStock(orderId){
		//console.log(itemId, tmpval , cashData );
		if(confirm("確定修改？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/order/refundStock');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"orderId" 	: orderId
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
						location.reload();
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
						location.reload();
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

	function changeOrderStatus()
	{
		var itemId = $('#orderOrderId').val();
		var orderStatusValue = $('#orderStatusValue').val();
		var orderReson = $('#orderReson').val();

			$.ajax({
				url: "<?php echo base_url('/admin/order/changeStatus');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"id" 		: itemId,
					"method"	: "orderType",
					"type" 		: orderStatusValue,
					"reson"		: orderReson
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
						location.reload();
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

	function changePaymentStatus()
	{
		var itemId = $('#paymentOrderId').val();
		var paymentStatusValue = $('#paymentStatusValue').val();
		var paymentReson = $('#paymentReson').val();

			$.ajax({
				url: "<?php echo base_url('/admin/order/changeStatus');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"id" 		: itemId,
					"method"	: "paymentType",
					"type" 		: paymentStatusValue,
					"reson"		: paymentReson
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
						location.reload();
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

	function changeShipStatus()
	{
		var itemId = $('#shipOrderId').val();
		var shipStatusValue = $('#shipStatusValue').val();
		var shipReson = $('#shipReson').val();

			$.ajax({
				url: "<?php echo base_url('/admin/order/changeStatus');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"id" 		: itemId,
					"method"	: "shipType",
					"type" 		: shipStatusValue,
					"reson"		: shipReson
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
						location.reload();
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

	function orderPopup(itemId, uniqueId, option)
	{
		$('#unique_idOrderDiv').html(uniqueId) ;
		$('#orderOrderId').val(itemId) ;
		$('#orderStatusValue').val($(option[option.selectedIndex]).val()) ;
		$('#orderStatusDiv').html($(option[option.selectedIndex]).text());
		var orderTypeVal = $("#orderType_"+itemId).val();
		var paymentTypeVal = $("#paymentType_"+itemId).val();
		var shipTypeVal = $("#shipType_"+itemId).val();

		if($(option[option.selectedIndex]).val()==9)
		{
			if(!(shipTypeVal==2||shipTypeVal==31)){
				alert('運送狀態不符合訂單取消條件，請重新操作!');
				$("#orderType_"+itemId).val(orderTypeVal);
				return;
			}
		}

		if($(option[option.selectedIndex]).val()==-1)
		{
			if(!(shipTypeVal==2||shipTypeVal==31)){
				alert('運送狀態不符合訂單取消條件，請重新操作!');
				$("#orderType_"+itemId).val(orderTypeVal);
				return;
			}
		}
// alert("orderType_"+itemId+"="+$("#orderType_"+itemId).val()+", paymentType_"+itemId+"="+$("#paymentType_"+itemId).val()+", shipType_"+itemId+"="+$("#shipType_"+itemId).val());
// return;
		$('#orderStatusPopup').bPopup(
		{
			content: 'iframe',
			follow: [false, false]
		});
	}

	function orderPopupCancel()
	{ 
		var bPopup = $('#orderStatusPopup').bPopup() ;
		bPopup.close();
		setTimeout(function(){
			location.reload();
		},300);
	}

	function paymentPopup(itemId, uniqueId, option)
	{
		$('#unique_idPaymentDiv').html(uniqueId) ;
		$('#paymentOrderId').val(itemId) ;
		$('#paymentStatusValue').val($(option[option.selectedIndex]).val()) ;
		$('#paymentStatusDiv').html($(option[option.selectedIndex]).text());
		
		$('#paymentStatusPopup').bPopup(
		{
			content: 'iframe',
			follow: [false, false]
		});
	}
	
	function paymentPopupCancel()
	{ 
		var bPopup = $('#paymentStatusPopup').bPopup() ;
		bPopup.close();
		setTimeout(function(){
			location.reload();
		},300);
	}

	function shipPopup(itemId, uniqueId, option)
	{
		$('#unique_idShipDiv').html(uniqueId) ;
		$('#shipOrderId').val(itemId) ;
		$('#shipStatusValue').val($(option[option.selectedIndex]).val()) ;
		$('#shipStatusDiv').html($(option[option.selectedIndex]).text());
		
		$('#shipStatusPopup').bPopup(
		{
			content: 'iframe',
			follow: [false, false]
		});
	}
	
	function shipPopupCancel()
	{ 
		var bPopup = $('#shipStatusPopup').bPopup() ;
		bPopup.close();
		setTimeout(function(){
			location.reload();
		},300);
	}

	function orderLogPopup(uniqueId)
	{
		var returnData = "" ;
		$('#unique_idDiv').html(uniqueId) ;
		$.ajax({
			url: "<?php echo base_url('/admin/order/qryLogData');?>",
			async:true,
			cache:false,
			method:"POST",
			data:{
				orderId : uniqueId
			},
			success:function(data, status, xhr){
				//console.log(data);
				returnData = data.resp ; 
console.log(returnData);
				resetHTML(returnData) ; 
				//return_meta_data.resetHtml() ;
			},
			error:function(xhr, stauts, err){
				//console.log(xhr, stauts, err) ;
			}
		});
	}

	function resetHTML(rtnData){
		var content = "" ;
		var mapArray = "" ;
		var statusString = "" ;
		content += "<div class=\"form-group\"> ";
		content += "	<div class=\"col-xs-2\">修改人</div>";
		content += "	<div class=\"col-xs-2\">時間</div>";
		content += "	<div class=\"col-xs-2\">狀態</div>";
		content += "	<div class=\"col-xs-2\">修改為</div>";
		content += "	<div class=\"col-xs-4\">備註/原因</div>";
		content += "	<div class=\"clearfix\"></div>";
		content += "</div>";
		for( var k in rtnData )
		{
			if ( rtnData[k].method == "orderAddrUpdate" )    //orderType|paymentType|shipType
			{
				statusString = "寄送地址" ;
				mapArray = orderStatus ;   //set mapping arrary form json
				var reason = rtnData[k].reson;
				rtnData[k].reson = reason.city+reason.district+reason.zip+reason.address;
			}
			if ( rtnData[k].method == "orderType" )    //orderType|paymentType|shipType
			{
				statusString = "訂單狀態" ;
				mapArray = orderStatus ;   //set mapping arrary form json
			}
			if ( rtnData[k].method == "paymentType" )    //orderType|paymentType|shipType
			{
				statusString = "付款狀態" ;
				mapArray = paymentStatus ;
			}
			if ( rtnData[k].method == "shipType" )    //orderType|paymentType|shipType
			{
				statusString = "運送狀態" ;
				mapArray = shipStatus ;
			}
			if ( rtnData[k].method == "refundStock" )    //orderType|paymentType|shipType
			{
				statusString = "庫存回補" ;
				mapArray[0] = "" ;
			}
			if ( rtnData[k].method == "carrier" )    //orderType|paymentType|shipType
			{
				statusString = "Carrier Update" ;
				mapArray[0] = "" ;
			}

			content += "<div class=\"form-group\"> ";
			content += "	<div class=\"col-xs-2\">"+rtnData[k].userName+"</div>";
			content += "	<div class=\"col-xs-2\">"+rtnData[k].createTime+"</div>";
			content += "	<div class=\"col-xs-2\">"+statusString+"</div>";
			content += "	<div class=\"col-xs-2\">"+mapArray[rtnData[k].type]+"</div>";
			content += "	<div class=\"col-xs-4\">"+rtnData[k].reson+"</div>";
			content += "	<div class=\"clearfix\"></div>";
			content += "</div>";

		}
		$(".returnpopupHtml").html(content) ; 

		$('#orderLogPopup').bPopup(
		{
			content: 'iframe',
			follow: [false, false]
		});
	}

	function revokeBonus(itemId)
	{
		///console.log(itemId, option.value);
		if(confirm("確定修改？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/order/revokeBonus');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"id" 	: itemId
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
						location.reload();
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
	});
	</script>
	
</body>
</html>

<div id="orderStatusPopup" class="panel mb30" style="display: none;width:500px ;" >
	<input type="hidden" name="orderStatusValue" id="orderStatusValue" value="" >
	<input type="hidden" name="orderOrderId" id="orderOrderId" value="" >
	<div class="panel-heading" style="text-align: center;">
		<span class="panel-title">訂單狀態修改</span>
	</div>
	<div class="form-group" style="height: 20px;margin-top: 8px;">
		<div  class="col-xs-3" style="text-align: right" >訂單編號:</div>
		<div  class="col-xs-8" >
			<div id="unique_idOrderDiv"></div>
		</div>
	</div>
	<div class="form-group" style="height: 20px;margin-top: 8px;">
		<div  class="col-xs-3" style="text-align: right" >狀態修改為:</div>
		<div  class="col-xs-8" >
			<div id="orderStatusDiv"></div>
		</div>
	</div>
	<div class="form-group" style="height: 40px;">
		<div  class="col-xs-3" style="text-align: right" >備註/原因:</div>
		<div  class="col-xs-8" >
			<textarea name="orderReson" id="orderReson" rows="3" style="display:inline;width: 100%;"  ></textarea>
		</div>
	</div>
	<div class="form-group" style="height: 60px">
		<div  class="col-xs-6" style="text-align: right;margin-top: 8px">
			<a class="btn btn-info" onclick="changeOrderStatus();">確定修改</a>
		</div>
		<div  class="col-xs-6" style="margin-top: 8px" >
			<a class="btn btn-default" onclick="orderPopupCancel();">取消</a>
		</div>
	</div>
</div>

<div id="paymentStatusPopup" class="panel mb30" style="display: none;width:500px ;" >
	<input type="hidden" name="paymentStatusValue" id="paymentStatusValue" value="" >
	<input type="hidden" name="paymentOrderId" id="paymentOrderId" value="" >
	<div class="panel-heading" style="text-align: center;">
		<span class="panel-title">付款狀態修改</span>
	</div>
	<div class="form-group" style="height: 20px;margin-top: 8px;">
		<div  class="col-xs-3" style="text-align: right" >訂單編號:</div>
		<div  class="col-xs-8" >
			<div id="unique_idPaymentDiv"></div>
		</div>
	</div>
	<div class="form-group" style="height: 20px;margin-top: 8px;">
		<div  class="col-xs-3" style="text-align: right" >狀態修改為:</div>
		<div  class="col-xs-8" >
			<div id="paymentStatusDiv"></div>
		</div>
	</div>
	<div class="form-group" style="height: 40px;">
		<div  class="col-xs-3" style="text-align: right" >備註/原因:</div>
		<div  class="col-xs-8" >
			<textarea name="paymentReson" id="paymentReson" rows="3" style="display:inline;width: 100%;"  ></textarea>
		</div>
	</div>
	<div class="form-group" style="height: 60px">
		<div  class="col-xs-6" style="text-align: right;margin-top: 8px">
			<a class="btn btn-info" onclick="changePaymentStatus();">確定修改</a>
		</div>
		<div  class="col-xs-6" style="margin-top: 8px" >
			<a class="btn btn-default" onclick="paymentPopupCancel();">取消</a>
		</div>
	</div>
</div>

<div id="shipStatusPopup" class="panel mb30" style="display: none;width:500px ;" >
	<input type="hidden" name="shipStatusValue" id="shipStatusValue" value="" >
	<input type="hidden" name="shipOrderId" id="shipOrderId" value="" >
	<div class="panel-heading" style="text-align: center;">
		<span class="panel-title">運送狀態修改</span>
	</div>
	<div class="form-group" style="height: 20px;margin-top: 8px;">
		<div  class="col-xs-3" style="text-align: right" >訂單編號:</div>
		<div  class="col-xs-8" >
			<div id="unique_idShipDiv"></div>
		</div>
	</div>
	<div class="form-group" style="height: 20px;margin-top: 8px;">
		<div  class="col-xs-3" style="text-align: right" >狀態修改為:</div>
		<div  class="col-xs-8" >
			<div id="shipStatusDiv"></div>
		</div>
	</div>
	<div class="form-group" style="height: 40px;">
		<div  class="col-xs-3" style="text-align: right" >備註/原因:</div>
		<div  class="col-xs-8" >
			<textarea name="shipReson" id="shipReson" rows="3" style="display:inline;width: 100%;"  ></textarea>
		</div>
	</div>
	<div class="form-group" style="height: 60px">
		<div  class="col-xs-6" style="text-align: right;margin-top: 8px">
			<a class="btn btn-info" onclick="changeShipStatus();">確定修改</a>
		</div>
		<div  class="col-xs-6" style="margin-top: 8px" >
			<a class="btn btn-default" onclick="shipPopupCancel();">取消</a>
		</div>
	</div>
</div>

<div id="orderLogPopup" class="panel mb30" style="display: none;width:600px ;" >
	<div class="panel-heading" style="text-align: center;">
		<span class="panel-title">更改紀錄</span>
	</div>
	<div class="form-group" style="height: 20px;margin-top: 8px;">
		<div  class="col-xs-3" style="text-align: right" >訂單編號:</div>
		<div  class="col-xs-8" >
			<div id="unique_idDiv"></div>
		</div>
	</div>
	<div class="panel-body product-stock-panel-body returnpopupHtml">
		<div class="form-group">
			<div class="col-xs-2">時間</div>
			<div class="col-xs-2">狀態</div>
			<div class="col-xs-2">修改為</div>
			<div class="col-xs-6">備註/原因</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div id="orderCarrierPopup" class="panel mb30" style="display: none;width:600px ;" >
	<input type="hidden" name="carrierOrderId" id="carrierOrderId" value="" >
	<div class="panel-heading" style="text-align: center;">
		<span class="panel-title">Carrier</span>
	</div>
	<div class="form-group" style="height: 20px;margin-top: 8px;">
		<div  class="col-xs-3" style="text-align: right" >訂單編號:</div>
		<div  class="col-xs-8" >
			<div id="unique_ship_idDiv"></div>
		</div>
	</div>
	<div class="form-group" style="height: 20px;margin-top: 8px;">
		<div  class="col-xs-3" style="text-align: right" >Carrier:</div>
		<div  class="col-xs-7" >
			<input type="text" id="carrier" name="carrier" style="display:inline;width: 100%;">
		</div>
	</div>
	<div class="form-group" style="height: 20px;margin-top: 8px;">
		<div  class="col-xs-3" style="text-align: right" >Tracking No:</div>
		<div  class="col-xs-7" >
			<div id="shipStatusDiv"></div>
			<input type="text" id="trackingNo" name="trackingNo" style="display:inline;width: 100%;">
		</div>
	</div>
	<div class="form-group" style="height: 60px">
		<div  class="col-xs-6" style="text-align: right;margin-top: 8px">
			<a class="btn btn-info" onclick="changeOrderCarrier();">確定修改</a>
		</div>
		<div  class="col-xs-6" style="margin-top: 8px" >
			<a class="btn btn-default" onclick="orderCarrierPopupCancel();">取消</a>
		</div>
	</div>
</div>