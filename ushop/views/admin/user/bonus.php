
<body class="editors-page invoice-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style> 
.control-label {
  font-size: 18px;
  padding: 0;
  padding-top: 0 !important;
}
.admin-form .section-divider span {
  background: #fff;
}
.ms-container {
  margin: 0 auto;
  width: 100%;
}
.custom-header {
  font-size: 18px;
  text-align: center;
  background: #30363E;
  color: #fff;
  font-weight: bold;
  padding: 5px 10px;
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
							<a>紅利金</a>
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
                        <span class="panel-title"> <span class="glyphicon glyphicon-user"></span> 紅利金</span>
                    </div>
                    <div class="panel-body p20 admin-form theme-primary" id="invoice-item">
						<div class="row mb15">
							<div class="form-group">
                                <label for="inputUniqueHost" class="col-lg-3 control-label">分享代碼</label>
                                <div class="col-lg-8">
                                    <div type="text" id="inputUniqueHost" class="form-control"><?php echo $unique_host;?></div>
									<span class="help-block mt5"><i class="fa fa-bell"></i> 於本站任何頁面，分享該網址結尾加上 ?c=[分享代碼] ex. <?php echo base_url();?>?c=<?php echo $unique_host;?></span>
                                </div>
                            </div>
						</div>
						
						<div class="section-divider mb40 mt20"><span> 累計 </span></div>
						<div class="panel">
							<div class="panel-heading">
								<span class="panel-title"> 收益分析</span>
							</div>
							<div class="panel-body pn">
								<div id="ecommerce_chart1" style="height: 300px;"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-tile text-center br-a br-grey">
									<div class="panel-body">
										<h1 class="fs30 mt5 mbn"><?php echo $HostGroupAllNums;?></h1>
									</div>
									<div class="panel-footer br-t p12">
										<h6 class="text-system">介紹會員總數</h6>
									</div>
								</div>
							</div>
						</div>
						
						<div class="section-divider mb40 mt20"><span> 查詢 </span></div>
						<div class="row mb15">
							<div class="form-group">
                                <label for="inputUniqueHost" class="col-lg-3 control-label">查詢</label>
                                <div class="col-lg-8">
									<select class="form-control" onchange="changeMonth(this);">
									<?php
										$now_month 	 = date("Y-m");
										$start_month = date("Y-m",strtotime($now_month." -1 years +1 months"));
										$rule_month = date("Y-m",strtotime($now_month." +1 months"));
										
										$xAxisCategories = array();
										while( $start_month != $rule_month )
										{
											$isSel = $current_month == $start_month ? "selected" : "";
											
											$xAxisCategories[] = date("M/Y",strtotime($start_month));
									?>
										<option value="<?php echo $start_month;?>" <?php echo $isSel;?>><?php echo $start_month;?></option>
									<?php
											$start_month = date("Y-m",strtotime($start_month." +1 months"));
										}
									?>
									</select>
                                </div>
                            </div>
						</div>
						<div class="section-divider mb40 mt20"><span> <?php echo $current_month;?> </span></div>
						<div class="row">
							<div class="col-sm-4">
								<div class="panel panel-tile text-center br-a br-grey">
									<div class="panel-body">
										<h1 class="fs30 mt5 mbn"><?php echo $HostGroupNums;?></h1>
										<h6 class="text-system">人數</h6>
									</div>
									<div class="panel-footer br-t p12">
										<?php 
											$faArrow = '';
											( $HostGroupRate > 0 ) ? $faArrow = '<i class="fa fa-arrow-up pr5 text-success"></i>' : "";
											( $HostGroupRate < 0 ) ? $faArrow = '<i class="fa fa-arrow-down pr5 text-danger"></i>' : "";
										?>
										<span class="fs11"> <?php echo $faArrow;?> <?php echo $HostGroupRate;?>% <b>介紹會員</b></span>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="panel panel-tile text-center br-a br-grey">
									<div class="panel-body">
										<h1 class="fs30 mt5 mbn"><?php echo $HostOrderNums;?></h1>
										<h6 class="text-success">筆數</h6>
									</div>
									<div class="panel-footer br-t p12">
										<?php 
											$faArrow = '';
											( $HostOrderRate > 0 ) ? $faArrow = '<i class="fa fa-arrow-up pr5 text-success"></i>' : "";
											( $HostOrderRate < 0 ) ? $faArrow = '<i class="fa fa-arrow-down pr5 text-danger"></i>' : "";
										?>
										<span class="fs11"> <?php echo $faArrow;?> <?php echo $HostOrderRate;?>%  <b>交易訂單</b>
											</span>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="panel panel-tile text-center br-a br-grey">
									<div class="panel-body">
										<h1 class="fs30 mt5 mbn"><?php echo $HostOrderTotal;?></h1>
										<h6 class="text-danger">金額</h6>
									</div>
									<div class="panel-footer br-t p12">
										<?php 
											$faArrow = '';
											( $HostOrderTotalRate > 0 ) ? $faArrow = '<i class="fa fa-arrow-up pr5 text-success"></i>' : "";
											( $HostOrderTotalRate < 0 ) ? $faArrow = '<i class="fa fa-arrow-down pr5 text-danger"></i>' : "";
										?>
										<span class="fs11"> <?php echo $faArrow;?> <?php echo $HostOrderTotalRate;?>%  <b>紅利金</b>
											</span>
									</div>
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

    <script type="text/javascript" src="/admin/vendor/plugins/multiselect/js/jquery.multi-select.js"></script>
	
    <script type="text/javascript" src="/admin/vendor/plugins/highcharts/highcharts.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/raphael/raphael.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/demo.js"></script>
    <script type="text/javascript" src="/admin/js/page.js"></script>
	
    <script type="text/javascript">
	
			
            // Chart colors
        var highColors = [ bgSystem, bgSuccess, bgDanger, bgAlert, bgInfo, bgPrimary, bgWarning, bgDark ];

        // Chart color groups
        var sparkColors = {
            "primary": [bgPrimary, bgPrimaryLr, bgPrimaryDr],
            "info": [bgInfo, bgInfoLr, bgInfoDr],
            "warning": [bgWarning, bgWarningLr, bgWarningDr],
            "success": [bgSuccess, bgSuccessLr, bgSuccessDr],
            "alert": [bgAlert, bgAlertLr, bgAlertDr]
        };

		var xAxisCategories = <?php echo json_encode($xAxisCategories);?>;
		
		var xAxisHostGroupNums 	 = <?php echo json_encode($xAxisHostGroupNums);?>;
		var xAxisHostOrderNums   = <?php echo json_encode($xAxisHostOrderNums);?>;
		var xAxisHostOrderMoney  = <?php echo json_encode($xAxisHostOrderMoney);?>;
		
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();
			
			// Chart data
			//
			//
            var seriesData = [{
					name: '介紹會員',
					data: xAxisHostGroupNums
				}, {
					name: '交易訂單',
					data: xAxisHostOrderNums
				}, {
					name: '紅利金(單位：千)',
					data: xAxisHostOrderMoney
				}];
			
			var ecomChart = $('#ecommerce_chart1');

            if (ecomChart.length) {
                ecomChart.highcharts({
                    credits: false,
                    colors: highColors,
                    chart: {
                        backgroundColor: 'transparent',
                        className: 'br-r',
                        type: 'line',
                        zoomType: 'x',
                        panning: true,
                        panKey: 'shift',
                        marginTop: 45,
                        marginRight: 1,
                    },
                    title: {
                        text: null
                    },
                    xAxis: {
                        gridLineColor: '#EEE',
                        lineColor: '#EEE',
                        tickColor: '#EEE',
                        categories: xAxisCategories
                    },
                    yAxis: {
                        min: 0,
                        tickInterval: 5,
                        gridLineColor: '#EEE',
                        title: {
                            text: null,
                        }
                    },
                    plotOptions: {
                        spline: {
                            lineWidth: 3,
                        },
                        area: {
                            fillOpacity: 0.2
                        }
                    },
                    legend: {
                        enabled: true,
                        floating: false,
                        align: 'right',
                        verticalAlign: 'top',
                        // y: '-160px'
                    },
                    series: seriesData
                });
			}

        });
		function changeMonth(self)
		{
			location.href = "/admin/user/bonus?q=" + $(self).val();
		}
	</script>
	
</body>
</html>