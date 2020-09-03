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
  position: absolute;
  margin-top: 6px;
}
.tool-box {
  position: absolute;
  right: 10px;
  top: 0;
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
                            <a>優惠卷管理</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">優惠卷管理</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
						
							<div class="panel" style="width:400px;margin:0 auto;">
								<div class="panel-heading text-center">
									<div class="caption">新增優惠套券</div>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="form-group">
											<label for="coupon-title" class="col-lg-3 control-label">名稱</label>
											<div class="col-lg-8">
												<input type="text" id="coupon-title" name="coupon-title" class="form-control" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="coupon-qty" class="col-lg-3 control-label">張數</label>
											<div class="col-lg-8">
												<div class="input-group">
													<input class="form-control" id="coupon-qty" name="coupon-qty" type="text">
													<span class="input-group-addon">張</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label for="coupon-amount" class="col-lg-3 control-label">金額</label>
											<div class="col-lg-8">
												<div class="input-group">
													<input class="form-control" id="coupon-amount" name="coupon-amount" type="text">
													<span class="input-group-addon">元 ( TWD ) </span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label class="col-md-3 control-label" for="coupon-expired">到期日</label>
											<div class="col-md-8">
												<div class="input-group date" id="datetimepicker2">
													<span class="input-group-addon cursor"><i class="fa fa-calendar"></i></span>
													<input type="text" class="form-control" name="coupon-expired" id="coupon-expired" />
												</div>
											</div>
										</div>
									</div>
								</div>								
								<div class="panel-footer">
									<div class="pull-right">
										<a class="btn btn-info" onclick="addNewCouponGroup();">新增</a>
									</div>
									<div class="clearfix"></div>	
								</div>		
							</div>
							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										操作區塊
									</div>
								</div>
								<div class="panel-body">
							
									<div class="panel-heading">
										<div class="panel-title hidden-xs">
											<span class="glyphicon glyphicon-tasks"></span>優惠券列表</div>
									</div>
									<div class="panel-body pn">
										<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>套券名稱</th>
													<th>到期日</th>
													<th>操作</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>套券名稱</th>
													<th>到期日</th>
													<th>操作</th>
												</tr>
											</tfoot>
											<tbody>
											<?php foreach( $listTitle AS $rec )  { ?>
												<tr>
													<td><?php echo $rec["title"];?></td>												
													<td>
														<div class="input-group date date-spec" style="width:300px;">
															<span class="input-group-addon cursor"><i class="fa fa-calendar"></i></span>
															<input type="text" class="form-control" name="coupon-expired-<?php echo $rec["id"];?>" id="coupon-expired-<?php echo $rec["id"];?>" value="<?php echo date("Y-m-d",strtotime($rec["expiredTime"]));?>" />
														</div>
													</td>
													<td>	
														<a class="btn btn-info btn-xs" onclick="changeCouponExpired('<?php echo $rec["id"];?>');">修改到期日</a>	
														<a class="btn btn-default btn-xs" href="/admin/coupon/download/<?php echo $rec["id"];?>">下載優惠券(Excel)</a>	
														<a class="btn btn-warning btn-xs" onclick="removeCoupon('<?php echo $rec["id"];?>');">刪除套券</a>	
													</td>
												</tr>
											<?php } ?>
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

    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>

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

			
            $('#datetimepicker2, .date-spec').datetimepicker({
				"format" : "YYYY/MM/DD",
				"pickTime": false
			});
			
        });
    </script>
    
	<script type="text/javascript">
	
	function addNewCouponGroup()
	{
		var err = false;
		var ajaxData = {};
		
		ajaxData.title = $("#coupon-title").val();
		ajaxData.qty = $("#coupon-qty").val();
		ajaxData.amount = $("#coupon-amount").val();
		ajaxData.expired = $("#coupon-expired").val();
		
		if( $("#coupon-title").val()  == "" )
		{
			err = true;
		}
		if( $("#coupon-qty").val()  == "" )
		{
			err = true;
		}
		if( $("#coupon-expired").val()  == "" )
		{
			err = true;
		}
		
		if( err === true )
		{
			alert("請將優惠套券欄位填寫完成！");
			return;
		}
		
		$.ajax({
			url: "/admin/coupon/create",
			async:true,
			cache:false,
			method:"POST",
			data:ajaxData,
			success:function(data, status, xhr){
				var type = data.code == -1 ? 'danger' : "info";
				PM.show({ title: "優惠卷管理", text: data.message, type: type });
				
				setTimeout(function(){
					location.reload();
				},500);
			},
			error:function(xhr, stauts, err){ PM.erro(); }
		});
	}
	
	function removeCoupon(couponId)
	{
		if( confirm("確定刪除該優惠套券？") ) 
		{
			$.ajax({
				url: "/admin/coupon/delete",
				async:true,
				cache:false,
				method:"POST",
				data:{ "couponId" : couponId },
				success:function(data, status, xhr){
					var type = data.code == -1 ? 'danger' : "info";
					PM.show({ title: "優惠卷管理", text: data.message, type: type });
					
					setTimeout(function(){
						location.reload();
					},500);
				},
				error:function(xhr, stauts, err){ PM.erro(); }
			});
		}
	}
	
	function changeCouponExpired(couponId)
	{
		var newExpired = $("#coupon-expired-"+couponId).val();
		if( confirm("確定修改該優惠套券到期日？") ) 
		{
			$.ajax({
				url: "/admin/coupon/changeCouponExpired",
				async:true,
				cache:false,
				method:"POST",
				data:{ 
					"id" : couponId,
					"expiredTime" : newExpired
				},
				success:function(data, status, xhr){
					var type = data.code == -1 ? 'danger' : "info";
					PM.show({ title: "優惠卷管理", text: data.message, type: type });
					
					setTimeout(function(){
						location.reload();
					},500);
				},
				error:function(xhr, stauts, err){ PM.erro(); }
			});
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
	
	$(function(){
		init_DataTable();
	});
	</script>
	
</body>
</html>