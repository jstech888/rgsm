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
                            <a>頁面管理</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">頁面管理</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										操作區塊
										<div class="pull-right">
											<a class="btn btn-success" onclick="addPage();">
												<i class="glyphicon glyphicon-plus"></i>
												<span>新增</span>										
											</a>
											<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
												<span class="ladda-spinner"></span>
											</button>
										</div>
									</div>
								</div>
								<div class="panel-body">
							
									<div class="panel-heading">
										<div class="panel-title hidden-xs">
											<span class="glyphicon glyphicon-tasks"></span>頁面列表</div>
									</div>
									<div class="panel-body pn">
										<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>URI</th>
													<th>操作</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>URI</th>
													<th>操作</th>
												</tr>
											</tfoot>
											<tbody>
											<?php foreach( $listPage AS $record ) { ?>
												<tr>
													<td><a href="/Page/<?php echo $record["key"];?>">/Page/<?php echo $record["key"];?></a></td>
													<td>
														<a href="/admin/page/edit?id=<?php echo $record["key"];?>" class="btn btn-success btn-xs">編輯</a>
														<a onclick="deletePage('<?php echo $record["key"];?>');" class="btn btn-danger btn-xs btn-delete">刪除</a>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							<div class="pull-right mt10">
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
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
	
	var ajaxData = [];
	
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
	
	function addPage()
	{	
		var key = prompt("請輸入新頁面的KEY");
		if( key )
		{
			$.ajax({
				url: "<?php echo base_url('/admin/page/create');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"id" : key
				},
				success:function(data, status, xhr){
					
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'新增完成！':"新增失敗！";
					
					PM.show({ title: data.message, text: text, type: type });
					
					setTimeout(function(){
						location.reload();
					},1000);
				},
				error:function(xhr, stauts, err){
					PM.erro();
				}
			});
		}
	}
		
	function deletePage(itemId)
	{
		if(confirm("確定刪除？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/page/delete');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"id" : itemId
				},
				success:function(data, status, xhr){
					
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'刪除完成！':"刪除失敗！";
				
					PM.show({ title: data.message, text: text, type: type });
					
					setTimeout(function(){
						location.reload();
					},1000);
				},
				error:function(xhr, stauts, err){
					PM.erro();
				}
			});
					
		}
	}

	
	$(function(){
		MainLangCode();
		init_DataTable();
		//init_deleteListRow();
	});
	</script>
	
</body>
</html>