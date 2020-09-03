<style>
.admin-form label {
    text-align: right;
    padding: 11px 0;
}
.admin-form.theme-primary .section-divider span {
    color: #fff;
    background-color: #000;
    padding: 2px 17px;
}
</style>
<div class="container mt25">
	<div class="panel panel-info panel-border top">
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
				<div class="clearfix"></div>
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
</div>
    <script type="text/javascript" src="/admin/vendor/plugins/highcharts/highcharts.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/raphael/raphael.js"></script>

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
			location.href = "/user/bonus?q=" + $(self).val();
		}
		</script>