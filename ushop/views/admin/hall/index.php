
    <link rel="stylesheet" type="text/css" href="vendor/plugins/datepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/tagmanager/tagmanager.css">


<body class="editors-page form-input-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
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
                            <a>活動館別管理</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">活動館別管理</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										編輯區塊
										<div class="pull-right">
											<button type="button" onclick="location.href='/admin/hall/create'" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 新增</span>
												<span class="ladda-spinner"></span>
											</button>
										</div>
									</div>
								</div>
								<div class="panel-body">

							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist">
									<?php echo $htmlLang;?>
								</ul>
							</div>
							<div class="tabs-content main-tab-content">
									<div class="panel-heading">
										<div class="panel-title hidden-xs">
											<span class="glyphicon glyphicon-tasks"></span>產品列表</div>
									</div>
									<div class="panel-body pn">
										<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>名稱</th>
													<th>類型</th>
                                                    <th>折扣類型</th>
                                                    <th>折扣</th>
													<th>啟用狀態</th>
                                                    <th>前台顯示</th>
													<th>操作</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>名稱</th>
													<th>類型</th>
                                                    <th>折扣類型</th>
                                                    <th>折扣</th>
													<th>啟用狀態</th>
                                                    <th>前台顯示</th>
													<th>操作</th>
												</tr>
											</tfoot>
											<tbody>
                                              <?php foreach ($halls as $hall){ ?>
                                                    <tr>
                                                      <td><?php echo $hall['name']; ?></td>
                                                      <td><?php echo $hall['type']; ?></td>
                                                      <td><?php echo $hall['discount_type']; ?></td>
                                                      <td><?php echo $hall['discount2']; ?></td>
                                                      <td><?php echo $hall['status']; ?></td>
                                                      <td><?php echo $hall['is_show']; ?></td>
                                                      <td>
                                                        <a href="/admin/hall/edit?id=<?php echo $hall["id"];?>" class="btn btn-success btn-xs">編輯</a>
                                                        <a href="/admin/hall/delete?id=<?php echo $hall["id"];?>" class="btn btn-danger btn-xs btn-delete">刪除</a>
                                                      </td>
                                                    </tr>
                                              <?php } ?>

											</tbody>
										</table>
									</div>

							</div>
								</div>
							</div>

							<div class="pull-right mt10">
								<button type="button" onclick="location.href='/admin/hall/create'" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 新增</span>
									<span class="ladda-spinner"></span>
								</button>
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

    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="/admin/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/magnific/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/spin.min.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/ladda.min.js"></script>
    <script type="text/javascript" src="/libs/jquery.switchButton.js"></script>

    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/tagmanager/tagmanager.js"></script>


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

	<?php if(@$errMsg){ ?>
      alert('<?php echo @$errMsg;?>');
	<?php }?>


	var ajaxData = [];

	function init_MainLangCodeSwitch(){
		$(".main-langCode li a").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(e){
				location.href = "/admin/hall/index?lang="+$(this).attr("data-langCode");
			});
		});
	}

	function init_DataTable()
	{
		$('.datetimepicker1').each(function(){
			$(this).daterangepicker({
				format: "YYYY-MM-DD HH:mm:ss"
			});
		});

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
		init_MainLangCodeSwitch();
		init_DataTable();
		//init_deleteListRow();
	});
	</script>

</body>
</html>