<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
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

.control-group {
  color: transparent;
}

.tools {
  position: absolute;
  top: 5px;
  right: 18px;
}
.tools .edit {
  color: rgb(15, 94, 222);
  font-size: 20px;
  position: absolute;
  margin-left: -25px;
}
.tools .remove {
  color: red;
  font-size:18px;
}
.tools .remove:hover {
  color: rgb(255, 119, 119);
}

.tools .edit:hover {
  color: rgb(255, 119, 119);
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
                            <a>進階客戶管理</a>
                        </li>
                        <li class="crumb-active">
                            <a>最高權限設置</a>
                        </li>
                        <li class="crumb-active">
                            <a> <?php echo $dataGroup["name"];?> 群組</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">操作區塊</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<div class="panel">
								<div class="panel-heading">
									<div class="panel-title hidden-xs">
										<span class="glyphicon glyphicon-tasks"></span>權限列表
									</div>
								</div>
								<div class="panel-body pn">
									<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>#</th>
													<th>父層</th>
													<th>按鈕</th>
													<th>檢視</th>
													<th>編輯</th>
													<th>新增</th>
													<th>刪除</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>父層</th>
													<th>按鈕</th>
													<th>檢視</th>
													<th>編輯</th>
													<th>新增</th>
													<th>刪除</th>
												</tr>
											</tfoot>
											<tbody>
						<?php
							$ind = 1;
							foreach( $BKMN  AS $menu )
							{
								if( isset($menu["child"]) && count($menu["child"]) > 0)
								{
									foreach( $menu["child"] AS $smenu )
									{					
										if( isset($smenu["child"]) && count( $smenu["child"] ) > 0 )
										{		
											foreach( $smenu["child"] AS $tmenu )
											{
												if( isset( $tmenu["path"] ) )
												{	
													$authlist = isset($listAuth[$tmenu['id']])?$listAuth[$tmenu['id']]:array("read"=>0,"edit"=>0,"create"=>0,"delete"=>0);
													$isRead = ($authlist['read'] == 0)?"":"checked";
													$isEdit = ($authlist['edit'] == 0)?"":"checked";
													$isCreate = ($authlist['create'] == 0)?"":"checked";
													$isDelete = ($authlist['delete'] == 0)?"":"checked";
													echo "<tr>
														<td>{$ind}</td>
														<td>{$menu['name']}/{$smenu['name']}/{$tmenu['name']}</td>
														<td>{$tmenu['name']}</td>
														<td><div class=\"switch switch-info switch-inline\">
															<input id=\"switch-read-{$tmenu['id']}\" type=\"checkbox\" {$isRead} onchange=\"changeAct('{$tmenu['id']}','read',this);\">
															<label for=\"switch-read-{$tmenu['id']}\"></label>
														</div></td>
														<td><div class=\"switch switch-info switch-inline\">
															<input id=\"switch-edit-{$tmenu['id']}\" type=\"checkbox\" {$isEdit} onchange=\"changeAct('{$tmenu['id']}','edit',this);\">
															<label for=\"switch-edit-{$tmenu['id']}\"></label>
														</div></td>
														<td><div class=\"switch switch-info switch-inline\">
															<input id=\"switch-create-{$tmenu['id']}\" type=\"checkbox\" {$isCreate} onchange=\"changeAct('{$tmenu['id']}','create',this);\">
															<label for=\"switch-create-{$tmenu['id']}\"></label>
														</div></td>
														<td><div class=\"switch switch-info switch-inline\">
															<input id=\"switch-delete-{$tmenu['id']}\" type=\"checkbox\" {$isDelete} onchange=\"changeAct('{$tmenu['id']}','delete',this);\">
															<label for=\"switch-delete-{$tmenu['id']}\"></label>
														</div></td>
													</tr>";
													$ind++;
												}
											}
										}
										else if( isset( $smenu["path"] ) )
										{	
											$authlist = isset($listAuth[$smenu['id']])?$listAuth[$smenu['id']]:array("read"=>0,"edit"=>0,"create"=>0,"delete"=>0);
											$isRead = ($authlist['read'] == 0)?"":"checked";
											$isEdit = ($authlist['edit'] == 0)?"":"checked";
											$isCreate = ($authlist['create'] == 0)?"":"checked";
											$isDelete = ($authlist['delete'] == 0)?"":"checked";
											echo "<tr>
												<td>{$ind}</td>
												<td>{$menu['name']}/{$smenu['name']}</td>
												<td>{$smenu['name']}</td>
												<td><div class=\"switch switch-info switch-inline\">
													<input id=\"switch-read-{$smenu['id']}\" type=\"checkbox\" {$isRead} onchange=\"changeAct('{$smenu['id']}','read',this);\">
													<label for=\"switch-read-{$smenu['id']}\"></label>
												</div></td>
												<td><div class=\"switch switch-info switch-inline\">
													<input id=\"switch-edit-{$smenu['id']}\" type=\"checkbox\" {$isEdit} onchange=\"changeAct('{$smenu['id']}','edit',this);\">
													<label for=\"switch-edit-{$smenu['id']}\"></label>
												</div></td>
												<td><div class=\"switch switch-info switch-inline\">
													<input id=\"switch-create-{$smenu['id']}\" type=\"checkbox\" {$isCreate} onchange=\"changeAct('{$smenu['id']}','create',this);\">
													<label for=\"switch-create-{$smenu['id']}\"></label>
												</div></td>
												<td><div class=\"switch switch-info switch-inline\">
													<input id=\"switch-delete-{$smenu['id']}\" type=\"checkbox\" {$isDelete} onchange=\"changeAct('{$smenu['id']}','delete',this);\">
													<label for=\"switch-delete-{$smenu['id']}\"></label>
												</div></td>
											</tr>";
											$ind++;
										}
									}
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
	
    <script src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.js"></script>
	<script src="<?php echo base_url("libs/bootstrap-touchspin/src/jquery.bootstrap-touchspin.js");?>"></script>

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
	refer_uri = "/admin/custom";

	var ajaxData = [];
	var group_id = '<?php echo $group_id;?>';
	
	function changeAct( menu_id, method, self )
	{
		var status 	= $("#switch-"+method+"-"+menu_id+":checked").length;
		var item = {};
		item['group_id'] = group_id;
		item['menu_id'] = menu_id;
		item[method] = status;
		
		$.ajax({
				url: "<?php echo base_url('/admin/authority/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"postData" : [ item ]
				},
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'新增完成！':"新增失敗！";
					
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
						//location.reload();
					},1000);
				},
				error:function(xhr, stauts, err){
					
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
	
	$(function(){
		
	});
	</script>
	
</body>
</html>