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
							<h3 class="panel-title text-muted text-center mt10 fw400">會員管理</h3>
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
							
									<div class="panel-heading">
										<div class="panel-title hidden-xs">
											<span class="glyphicon glyphicon-tasks"></span>會員/帳號列表</div>
									</div>
									<div class="panel-body pn">
										<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>編號</th>
													<th>帳號</th>
													<th>身分</th>
													<th>電話</th>
													<th>狀態</th>
													<th>操作</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>編號</th>
													<th>帳號</th>
													<th>身分</th>
													<th>電話</th>
													<th>狀態</th>
													<th>操作</th>
												</tr>
											</tfoot>
											<tbody>
											<?php 
												foreach( $listData AS $rec ) 
												{
													if( ($rec["group_id"] != 5 && $admin["group_id"] != 5) || $admin["group_id"] == 5 )
													{
													?>
												<tr>
													<td><?php echo $rec["id"];?></td>
													<td class="text-center">
														<?php 
														if( $rec["group_id"] == 2 || $rec["group_id"] == 5 ){
															echo $rec["name"];
														}
														else{
															echo $rec["mail"];
														}
														?>
													</td>
													<td class="text-center"><?php 
														$selector = false;
														$groupLabel = false;
														foreach( $listGroup as &$group )
														{
															if( $group["id"] != 5 )
															{
																( $selector === false ) ? $selector = "<select class=\"form-control\" onchange=\"changeGroup('{$rec["id"]}', this);\">" : "";
															
																if( $group["id"] == 2 )
																{															
																	if( $group["id"] == $rec["group_id"] )
																	{
																		$groupLabel = $group["html"];																
																	}	
																	$isSed = ( $group["id"] == $rec["group_id"] ) ? "selected" : "";
																	$selector.= "<option value=\"{$group["id"]}\" {$isSed}>{$group["name"]}</option>";
																}
																else
																{	
																	$isSed = ( $group["id"] == $rec["group_id"] ) ? "selected" : "";
																	$selector.= "<option value=\"{$group["id"]}\" {$isSed}>{$group["name"]}</option>";
																}
															}
															else if ( $admin["group_id"] == 5 && $rec["group_id"] == 5 ){
																$groupLabel = $group["html"];
															}			
														}
														$selector.= "</select>";
														
														if( $rec["group_id"] == 2 || $rec["group_id"] == 5 )
														{
															echo $groupLabel;
														}
														else
														{
															echo $selector;
														}
													?></td>														
													<td><?php echo $rec["phone"];?></td>
													<td>
													<?php 
													if ( $rec["group_id"] != 5 )
													{
													?>
														<select class="form-control" onchange="changeFlag('<?php echo $rec["id"];?>', this);"><?php 
														foreach( $FlagSelOpt AS $k=>$opt )
														{
															$isSelected = ( $rec["flag"]["title"] == $opt["title"] ) ? "selected" : "";
															echo "<option value=\"".$k."\" ".$isSelected.">".$opt["title"]."</option>";
														}
														?>
														</select>
													<?php
													}
													?>
													</td>
													<td>
                                                        <a href="/admin/user/detail?id=<?php echo $rec["id"];?>" class="btn btn-info btn-xs">編輯資料</a>
                                                        <a href="/admin/user/changePW?id=<?php echo $rec["id"];?>" class="btn btn-warning btn-xs">修改密碼</a>
													</td>
												</tr>
											<?php
													}
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
    function frmSearch(email){
		FormSubmit({
			method: "POST",
			action: "/admin/order/listTable",
			data: { email : email }
		});
	}
    </script>
    
	<script type="text/javascript">
	
	function changeGroup(id, self)
	{
        var ajaxData = {
            "saveData" : {
				"id"   : id,
				"group_id" : $(self).val()
			}
        };
		$.ajax({
			url: "/admin/user/changeInfo",
			async:true,
			cache:false,
			method:"POST",
			data:ajaxData,
			success:function(data, status, xhr){
				PM.show({ title: "會員管理", text: '修改完成！', type: "info" });
				setTimeout(function(){
					location.reload();
				},500);
			},
			error:function(xhr, stauts, err){ PM.erro(); }
		});
	}
	
	function changeHost(id, self)
	{
        var ajaxData = {
            "saveData" : {
				"id"   : id,
				"host_id" : $(self).val()
			}
        };
		$.ajax({
			url: "/admin/user/changeInfo",
			async:true,
			cache:false,
			method:"POST",
			data:ajaxData,
			success:function(data, status, xhr){
				PM.show({ title: "會員管理", text: '修改完成！', type: "info" });
			},
			error:function(xhr, stauts, err){ PM.erro(); }
		});
	}
	
	function changeFlag(id, self)
	{
        var ajaxData = {
            "saveData" : {
				"id"   : id,
				"flag" : $(self).val()
			}
        };
		$.ajax({
			url: "/admin/user/changeInfo",
			async:true,
			cache:false,
			method:"POST",
			data:ajaxData,
			success:function(data, status, xhr){
				PM.show({ title: "會員管理", text: '修改完成！', type: "info" });
				setTimeout(function(){
					location.reload();
				},500);
			},
			error:function(xhr, stauts, err){ PM.erro(); }
		});
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