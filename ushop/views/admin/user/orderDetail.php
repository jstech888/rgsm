
<body class="editors-page invoice-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">

<style>
.invoice-panel {
  margin-top: 20px;
}
.mw100 {
  max-width:200px;
}
.mt10 {
  margin-top:10px;
}
.panel-title {
  text-align: center;
  font-size: 22px;
}
.#invoice-info {
  margin-top: 30px;
}
.block {
  margin-bottom:30px;
}
.text-right {
  text-align: right;
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
                            <a>個人服務</a>
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

                <div class="panel panel-primary panel-border top">
                    <div class="panel-heading">
                        <span class="panel-title"> <span class="glyphicon glyphicon-user"></span>訂單明細</span>
                    </div>
                    <div class="panel-body p20" id="invoice-item">
					
						<div class="panel panel-primary invoice-panel">
							<div class="panel-heading">
								<span class="panel-title"><?php echo $obj_invoice_lang['title'];?></span>
								<div class="panel-header-menu pull-right">
									<?php echo $list_order['createTime'];?> 
								</div>
							</div>
							<div class="panel-body p20" id="invoice-item">
						
								<div class="row block">
									<div class="col-md-12"> 
										<img src="<?php echo $LogoBanner["value"]["url"];?>" class="img-responsive center-block mt10 mw100 col-hidden-xs" alt="<?php echo $LogoBanner["value"]["alt"];?>"> 
									</div>		
								</div>
								<div class="row block">
									<div class="col-md-12"> 
										<div class="panel-title"><?php echo $obj_invoice_lang['orderStatus'];?><?php echo $list_order['status']['html'];?></div>
									</div>
								</div>
								<div class="row" id="invoice-info">
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-heading">
												<span class="panel-title"> <i class="fa fa-user"></i><?php echo $obj_invoice_lang['BillTo'];?></span>
											</div>
											<div class="panel-body">
												<address>										
													<?php echo $obj_invoice_lang['BillName'];?><strong><?php echo $list_order['dataUser']["name"];?></strong>											
													<br> <?php echo $obj_invoice_lang['BillMail'];?><strong><?php echo $list_order['dataUser']["mail"];?></strong>
													<br> <?php echo $obj_invoice_lang['BillPhone'];?><strong><?php echo $list_order['dataUser']["phone"];?></strong>
												</address>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-heading">
												<span class="panel-title"> <i class="fa fa-location-arrow"></i><?php echo $obj_invoice_lang['ShipTo'];?></span>
											</div>
											<div class="panel-body">
												<address>
													<strong><?php 
													echo $obj_shoppingCart_lang[$list_order['shipFlow']];
													?></strong>
													<br> <?php echo $list_order['shipData']["address"];?>
												</address>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-heading">
												<span class="panel-title"> <i class="fa fa-info"></i> <?php echo $obj_invoice_lang['PayMethod'];?> </span>
											</div>
											<div class="panel-body">
												<address>
													<strong><?php echo $obj_shoppingCart_lang[$list_order['cashFlow']]; ?></strong>
													<?php
													if( $list_order['cashFlow'] == "BankRemittances" )
													{
														echo "<br> 客戶匯款帳戶後四碼：".$list_order['cashData']["BankRemittancesAccount"];
													}
													else
													{
													?>
													<div class="line-item">
														<div class="line-head"><strong><?php echo $objLang["orderlist"]['payStatus'];?></strong></div>
														<div class="line-body"><?php echo (isset($list_order["cashData"]["callback"]["errcode"]) && $list_order["cashData"]["callback"]["errcode"] == "00")?$objLang["orderlist"]['paySuccess']:$objLang["orderlist"]['payFailed'];?></div>
													</div>
													<?php
													}
													?>
												</address>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<?php 
											if($BankRemittancesInfo != false)
											{
												include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."checkout" . DIRECTORY_SEPARATOR ."BankRemittancesInfo.php");	
											}
										?>
									</div>
								</div>
								<div class="row" id="invoice-table">
									<div class="col-md-12">
									   <table class="table table-striped">
										   <thead>
											   <tr>
												   <th>#</th>
												   <th><?php echo $obj_invoice_lang['listName'];?></th>
												   <th><?php echo $obj_invoice_lang['listQTY'];?></th>
												   <th><?php echo $obj_invoice_lang['listPrice'];?></th>
												   <th><?php echo $obj_invoice_lang['listSub'];?></th>
											   </tr>
										   </thead>
										   <tbody>
									<?php
										foreach( $list_order['detail'] AS $row )
										{
									?>
											   <tr>
												   <td><b><?php echo $row['id'];?></b></td>
												   <td><?php echo $row['dataDetail'][$Lang]["name"];?></td>
												   <td><?php echo $row['qty'];?></td>
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
								<div class="row" id="invoice-footer">
									<div class="col-md-12">
										<div class="pull-right">
											<H2 class="text-right"><?php echo $list_order['iso_code'];?></H2>
											<table class="table" id="invoice-summary">
												<thead>
													<tr>
														<th><b><?php echo $obj_invoice_lang['lastCount'];?></b>
														</th>
														<th class="text-right" style="  width: 100px;"><?php echo $list_order['total'];?></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><b><?php echo $obj_invoice_lang['lastshoppingPoint'];?></b></td>
														<td class="text-right">(-)<?php echo  floor( $list_order['shoppingPoint'] / 30 )?></td>
													</tr>
													<tr>
														<td><b><?php echo $obj_invoice_lang['lastFee'];?></b></td>
														<td class="text-right"><?php echo $list_order['transFee'];?></td>
													</tr>
													<tr>
														<td><b><?php echo $obj_invoice_lang['lastFare'];?></b></td>
														<td class="text-right"><?php echo $list_order['transFare'];?></td>
													</tr>
													<tr>
														<td><b><?php echo $obj_invoice_lang['lastTotal'];?></b>
														</td>
														<td class="text-right total"><?php echo $list_order['clearTotal'];?></td>
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
							</div>
						</div>			
										
					</div>		
					<div class="panel-footer">
						<div class="pull-right btn-group">
							<a class="btn btn-default" href="/admin/user/orderQuery/">返回</a>
						</div>
						<div class="clearfix"></div>
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
    <script type="text/javascript" src="/uploads/user/ckfinder.js"></script>
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
	

    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/tagmanager/tagmanager.js"></script>

    <script type="text/javascript" src="/libs/formatcurrency/jquery.formatCurrency.js"></script>
    <script type="text/javascript" src="/libs/formatcurrency/i18n/jquery.formatCurrency.all.js"></script>
	  
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
			
			$(".total").each(function(){
				$(this).formatCurrency({ colorize:true, dropDecimals: false, region: $(this).attr("data-ISOCODE") });	
			});
			
			init_DataTable();
        });
    </script>
    
	<script type="text/javascript">
	
	$(function(){
		$('.date').datetimepicker({
			"format" : "YYYY/MM/DD",
			"pickTime": false
		});
		
		$(".total").each(function(){
			$(this).formatCurrency({ colorize:true, dropDecimals: false, region: $(this).attr("data-ISOCODE") });	
		});
	});
	
	function init_DataTable()
	{
		$('#datatable3').dataTable({
			"order": [[ 2, "desc" ]],
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
	
	
	var isSend = false;
	function sengMsg()
	{
		var message = CKEDITOR.instances.ckeditor1.getData();
		if( $.trim(message) != "" && isSend === false )
		{
			isSend = true;
			PM.show({ title: "留言板", text: '訊息處理中...', type: "warning"});
			var ajaxData = { "content" : message, "to" : withId };
			$.ajax({
				url: "/admin/user/inbox/sendMsg",
				async:true,
				cache:false,
				method:"POST",
				data:ajaxData,
				success:function(data, status, xhr){
					PM.show({ title: "留言板", text: '訊息已經送出！', type: "info"});
					setTimeout(function(){location.reload()},1000);
				},
				error:function(xhr, stauts, err){
					PM.erro();
				}
			});
		}
	}
	
	function pageSave()
	{
		var hasNull = false;
		$(".form-control").each(function(){
			if($(this).val() == "")
			{
				var target = $(this).parent().parent();
				target.addClass("has-error");
				target.find(".help-block").html("不可以為空值！");
				hasNull = true;				
			}
		});
		if( hasNull == true )
		{
			setTimeout(function(){
				$(".has-error").find(".help-block").html("");
				$(".has-error").removeClass("has-error");
			},3000);
			return;
		}
        var ajaxData = { "saveData" : selfData };
		$.ajax({
			url: "/admin/user/saveInfo",
			async:true,
			cache:false,
			method:"POST",
			data:ajaxData,
			success:function(data, status, xhr){
				PM.show({ title: "會員管理", text: '修改完成！', type: "info"});
				setTimeout(function(){
					//location.reload();
				},500);
			},
			error:function(xhr, stauts, err){
				PM.erro();
			}
		});
	}
	
	</script>
	
</body>
</html>