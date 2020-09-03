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
.control-label {
  padding-top: 0 !important;
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
                            <a>商店管理</a>
                        </li>
                        <li class="crumb-active">
                            <a>訂單報表</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">報表下載</h3>
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
								
								<div class="tab-block mb25">
									<ul class="nav nav-tabs tabs-border">
										<li class="active">
											<a href="#tab8_1" data-toggle="tab">訂單</a>
										</li>
										<li>
											<a href="#tab8_2" data-toggle="tab">產品</a>
										</li>
										<li>
											<a href="#tab8_3" data-toggle="tab">電子報</a>
										</li>
									</ul>
									<div class="tab-content">
										<div id="tab8_1" class="tab-pane active">
											<div class="panel">
												<div class="panel-heading">
													<span class="panel-title">日報表匯出</span>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form">
														<div class="form-group">
															<label for="inputHelp" class="col-lg-2 control-label">日期選擇</label>
															<div class="col-lg-4">
																<select class="form-control" onchange="changeURL('days',this);">
																<?php
																	$start_year			= date("Y-m-d");															
																	$end_year			= date("Y-m-d",strtotime($start_year." -60 days"));
																	
																	while( $start_year != $end_year )
																	{
																?>
																	<option value="<?php echo $start_year;?>"><?php echo $start_year;?></option>
																<?php
																		$start_year = date("Y-m-d",strtotime($start_year." -1 days"));
																	}
																?>
																</select>
																<span class="help-block mt5"><i class="fa fa-bell"></i> 可選擇範圍 60天前 ~ 至今</span>
															</div>
														</div>
														<div class="pull-right">
															<a id="days-report-download" href="/admin/order/exportExcell/days/<?php echo date("Y-m-d");?>"  class="btn btn-info">下載</a>
														</div>
														<div class="clearfix"></div>
													</form>
												</div>
											</div>
											<div class="panel">
												<div class="panel-heading">
													<span class="panel-title">月報表匯出</span>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form">
														<div class="form-group">
															<label for="inputHelp" class="col-lg-2 control-label">年度月份選擇</label>
															<div class="col-lg-4">
																<select class="form-control" onchange="changeURL('months',this);">
																<?php
																	$start_year_key		= date("Y-m-01");
																	$start_year			= date("Y-m");															
																	$end_year			= date("Y-m",strtotime($start_year." -6 months"));
																	
																	while( $start_year != $end_year )
																	{
																?>
																	<option value="<?php echo $start_year_key;?>"><?php echo $start_year;?></option>
																<?php
																		$start_year_key = date("Y-m-01",strtotime($start_year_key." -1 months"));
																		$start_year = date("Y-m",strtotime($start_year_key));
																	}
																?>
																</select>
																<span class="help-block mt5"><i class="fa fa-bell"></i> 可選擇範圍 6個月前 ~ 至今</span>
															</div>
														</div>
														<div class="pull-right">
															<a id="months-report-download" href="/admin/order/exportExcell/months/<?php echo date("Y-m-01");?>" class="btn btn-info">下載</a>
														</div>
														<div class="clearfix"></div>
													</form>
												</div>
											</div>
											<div class="panel">
												<div class="panel-heading">
													<span class="panel-title">年度報表匯出</span>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form">
														<div class="form-group">
															<label for="inputHelp" class="col-lg-2 control-label">年度選擇</label>
															<div class="col-lg-4">
																<select class="form-control" onchange="changeURL('years',this);">
																<?php
																	$start_year_match 	= date("Y");
																	$start_year			= date("Y-01-01");
																	
																	while( $start_year_match != "1970" )
																	{
																?>
																	<option value="<?php echo $start_year;?>"><?php echo $start_year_match;?></option>
																<?php
																		$start_year 	  = date("Y-01-01",strtotime($start_year." -1 years"));
																		$start_year_match = date("Y",strtotime($start_year));
																	}
																?>
																</select>
																<span class="help-block mt5"><i class="fa fa-bell"></i> 可選擇範圍 1970~ 至今</span>
															</div>
														</div>
														<div class="pull-right">
															<a id="years-report-download" href="/admin/order/exportExcell/years/<?php echo date("Y-01-01");?>" class="btn btn-info">下載</a>
														</div>
														<div class="clearfix"></div>
													</form>
												</div>
											</div>
										</div>
										<div id="tab8_2" class="tab-pane">
											<div class="panel">
												<div class="panel-heading">
													<span class="panel-title">日報表匯出</span>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form">
														<div class="form-group">
															<label for="inputHelp" class="col-lg-2 control-label">日期選擇</label>
															<div class="col-lg-4">
																<select class="form-control" onchange="changeProductURL('days',this);">
																<?php
																	$start_year			= date("Y-m-d");															
																	$end_year			= date("Y-m-d",strtotime($start_year." -60 days"));
																	
																	while( $start_year != $end_year )
																	{
																?>
																	<option value="<?php echo $start_year;?>"><?php echo $start_year;?></option>
																<?php
																		$start_year = date("Y-m-d",strtotime($start_year." -1 days"));
																	}
																?>
																</select>
																<span class="help-block mt5"><i class="fa fa-bell"></i> 可選擇範圍 60天前 ~ 至今</span>
															</div>
														</div>
														<div class="pull-right">
															<a id="days-product-report-download" href="/admin/order/productExportExcel/days/<?php echo date("Y-m-d");?>"  class="btn btn-info">下載</a>
														</div>
														<div class="clearfix"></div>
													</form>
												</div>
											</div>
											<div class="panel">
												<div class="panel-heading">
													<span class="panel-title">月報表匯出</span>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form">
														<div class="form-group">
															<label for="inputHelp" class="col-lg-2 control-label">年度月份選擇</label>
															<div class="col-lg-4">
																<select class="form-control" onchange="changeProductURL('months',this);">
																<?php
																	$start_year_key		= date("Y-m-01");
																	$start_year			= date("Y-m");															
																	$end_year			= date("Y-m",strtotime($start_year." -6 months"));
																	
																	while( $start_year != $end_year )
																	{
																?>
																	<option value="<?php echo $start_year_key;?>"><?php echo $start_year;?></option>
																<?php
																		$start_year_key = date("Y-m-01",strtotime($start_year_key." -1 months"));
																		$start_year = date("Y-m",strtotime($start_year_key));
																	}
																?>
																</select>
																<span class="help-block mt5"><i class="fa fa-bell"></i> 可選擇範圍 6個月前 ~ 至今</span>
															</div>
														</div>
														<div class="pull-right">
															<a id="months-product-report-download" href="/admin/order/productExportExcel/months/<?php echo date("Y-m-01");?>" class="btn btn-info">下載</a>
														</div>
														<div class="clearfix"></div>
													</form>
												</div>
											</div>
											
											<div class="panel">
												<div class="panel-heading">
													<span class="panel-title">年度報表匯出</span>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form">
														<div class="form-group">
															<label for="inputHelp" class="col-lg-2 control-label">年度選擇</label>
															<div class="col-lg-4">
																<select class="form-control" onchange="changeProductURL('years',this);">
																<?php
																	$start_year_match 	= date("Y");
																	$start_year			= date("Y-01-01");
																	
																	while( $start_year_match != "1970" )
																	{
																?>
																	<option value="<?php echo $start_year;?>"><?php echo $start_year_match;?></option>
																<?php
																		$start_year 	  = date("Y-01-01",strtotime($start_year." -1 years"));
																		$start_year_match = date("Y",strtotime($start_year));
																	}
																?>
																</select>
																<span class="help-block mt5"><i class="fa fa-bell"></i> 可選擇範圍 1970~ 至今</span>
															</div>
														</div>
														<div class="pull-right">
															<a id="years-product-report-download" href="/admin/order/productExportExcel/years/<?php echo date("Y-01-01");?>" class="btn btn-info">下載</a>
														</div>
														<div class="clearfix"></div>
													</form>
												</div>
											</div>
										</div>

										<div id="tab8_3" class="tab-pane">
											<div class="panel">
												<div class="panel-heading">
													<span class="panel-title">電子報匯出</span>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form">
														<div class="col-xs-12 text-center mt15">
															<a id="days-product-report-download" href="/admin/option/exportNewsLetterList"  class="btn btn-info">匯出電子報資料</a>
														</div>
														<div class="clearfix"></div>
													</form>
												</div>
											</div>
										</div>
									</div>
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
    
	function changeURL(method,self)
	{		
		$("#"+method+"-report-download").attr("href",'/admin/order/exportExcell/' + method + '/' + $(self).val());
	}
	
	function changeProductURL(method,self)
	{		
		$("#"+method+"-product-report-download").attr("href",'/admin/order/productExportExcel/' + method + '/' + $(self).val());
	}

	function blogOrderSubmit(){
		var actionURL = "/admin/order/exportBlogOrderExcell/months/" + $("#blogOrderDate").val() + "/"+ $("#blogOrderTypemonths:checked").val() + "/" + $("#hostId").val() ;
		$('#blogOrderfrm').attr('action',actionURL) ; 
		$('#blogOrderfrm').submit();
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