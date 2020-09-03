
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
                            <a>會員管理</a>
                        </li>
                        <li class="crumb-active">
							<a>紅利金管理</a>
						</li>
                    </ol>
                </div>
            </header>
            <!-- End: Topbar -->
			

            <!-- Begin: Content -->
            <section id="content" class="">
					
                <div class="panel panel-primary panel-border top">
                    <div class="panel-heading">
                        <span class="panel-title"> <span class="glyphicon glyphicon-user"></span> 部落客紅利金</span>
                    </div>
                    <div class="panel-body p20 admin-form theme-primary" id="invoice-item">
					
						<div class="row mb15">
							<div class="form-group">
                                <label for="inputUniqueHost" class="col-xs-12 col-lg-1 control-label text-center" style="font-size:18px;">查詢</label>
                                <div class="col-lg-2">
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
					<div class="panel" id="spy3">
                        <div class="panel-heading">
                            <span class="panel-title">
                                <span class="glyphicons glyphicons-table"></span><?php echo $current_month;?> 部落客 列表</span>
                        </div>
                        <div class="panel-body pn">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">帳號</th>
                                        <th class="text-center">信箱</th>
                                        <th class="text-center">當月會員數</th>
                                        <th class="text-center">當月訂單數</th>
                                        <th class="text-center">當月紅利金</th>
                                        <th class="text-center">會員數總計</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach( $dataListBloger AS $k => &$blgr ) { ?>
                                    <tr>
                                        <td><?php echo $blgr["id"];?></td>
                                        <td><?php echo $blgr["name"];?></td>
                                        <td><?php echo $blgr["mail"];?></td>
                                        <td class="text-right"><?php echo $blgr["hostgroupnums"];?></td>
                                        <td class="text-right"><?php echo $blgr["hostordernums"];?></td>
                                        <td class="text-right"><?php echo $blgr["hostordermoney"];?></td>
                                        <td class="text-right"><?php echo $blgr["hostgrouptotal"];?></td>
                                    </tr>
								<?php } ?>
                                </tbody>
                            </table>
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
	
			
      
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();
			
        });
		function changeMonth(self)
		{
			location.href = "/admin/user/managerbonus?q=" + $(self).val();
		}
	</script>
	
</body>
</html>