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
                            <a>後台選單維護</a>
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
										<span class="glyphicon glyphicon-tasks"></span>後台列表
										<div class="pull-right">
											<a class="btn btn-info btn-xs" onclick="addBKMenuType();"><span class="glyphicons glyphicons-circle_plus"style="font-size:12px;"></span> 新增類別</a>
											<a class="btn btn-warning btn-xs" onclick="addBKMenu();"><span class="glyphicons glyphicons-circle_plus" style="font-size:12px;"></span> 新增模組</a>
										</div>
									</div>
								</div>
								<div class="panel-body pn">
								<div class="col-md-2"></div>
								<div class="col-md-8">
							<!--
						<div class="cf nestable-lists">
							<div class="dd" id="nestable">
								<ol class="dd-list">
								<?php
								$ind=1;
								$indTWO=false;
								$indTHREE=false;
								foreach( $BKM  AS $menu )
								{
									echo "<li class=\"dd-item\" data-id=\"{$ind}\" data-item-id=\"{$menu['id']}\" data-type=\"{$menu['type']}\">";
									$ind++;
									
									if( isset($menu["child"]) && count($menu["child"]) > 0)
									{
										$indTWO = $indTWO == false ? count($menu) + 1 :$indTWO;
										echo "<div class=\"dd-handle bg-info text-muted\"><span class=\"glyphicons glyphicons-tag\"></span> {$menu['name']}</div>";
										
										echo "<ol class=\"dd-list\">";
										foreach( $menu["child"] AS $smenu )
										{		
											echo "<li class=\"dd-item\" data-id=\"{$indTWO}\" data-item-id=\"{$smenu['id']}\" data-type=\"{$smenu['type']}\">";
											$indTWO++;
											if( isset($smenu["child"]) && count( $smenu["child"] ) > 0 )
											{
												$indTHREE = $indTHREE == false ? count($menu) + 1 + count($smenu) + 1 :$indTHREE;
												echo "<div class=\"dd-handle bg-info text-muted\"><span class=\"glyphicons glyphicons-tag\"></span>   {$smenu['name']}</div>";
												echo "<ol class=\"dd-list\">";
												foreach( $smenu["child"] AS $tmenu )
												{
													if( isset( $tmenu["path"] ) )
													{		
														echo "<li class=\"dd-item\" data-id=\"{$indTHREE}\" data-item-id=\"{$tmenu['id']}\" data-type=\"{$tmenu['type']}\">
																<div class=\"dd-handle bg-warning\" style=\"color:#000;\"><span class=\"glyphicons glyphicons-adjust_alt\"></span> {$tmenu['name']}</div>
															  </li>";
													}
													else
													{
														echo "<li class=\"dd-item\" data-id=\"{$indTHREE}\">
																<div class=\"dd-handle bg-info text-muted\"><span class=\"glyphicons glyphicons-tag\"></span> {$tmenu['name']}</div>
															  </li>";
													}			
													$indTHREE++;		
												}
												echo "</ol>";
											}
											else
											{
												echo "<div class=\"dd-handle bg-warning\" style=\"color:#000;\"><span class=\"glyphicons glyphicons-adjust_alt\"></span> {$smenu['name']}</div>";
											}
											echo "</li>";	
										}
										echo "</ol>";
										
									}
									else
									{
										echo "<div class=\"dd-handle bg-warning text-muted\"><span class=\"glyphicons glyphicons-warning\"  style=\"color:#000;\"></span> {$menu['name']}</div>";
									
									}
									echo "</li>";
								}
								?>
								</ol>
							</div>
						</div>
							-->
								</div>
								</div>
								<div class="col-md-2"></div>
								<div class="panel-footer">
									<div class="pull-right">
										<a class="btn btn-info" onclick="saveSortMenu();"><span class="glyphicons glyphicons-file_import"></span> 儲存</a>
										<a class="btn btn-default" onclick="location.reload();"><span class="glyphicons glyphicons-unshare"></span> 取消</a>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-heading">
									<div class="panel-title hidden-xs">
										<span class="glyphicon glyphicon-tasks"></span>類別列表
										<div class="pull-right">
											<a class="btn btn-info btn-xs" onclick="addBKMenuType();">新增</a>
										</div>
									</div>
								</div>
								<div class="panel-body pn">
									<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>名稱</th>
												<th>類別</th>
												<th>順序</th>
												<th>操作</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>#</th>
												<th>名稱</th>
												<th>類別</th>
												<th>順序</th>
												<th>操作</th>
											</tr>
										</tfoot>
										<tbody>
										<?php 											
											$ind = 1;
											foreach( $listMenuType AS $record ) 
											{
										?>
											<tr>
												<td><?php echo $ind;?></td>
												<td><input class="form-control" type="text" value="<?php echo $record["name"];?>" onkeyup="saveTempDataType('<?php echo $record["id"];?>','name',this);" /></td>
												<td>
													<select class="form-control" onchange="saveTempDataType('<?php echo $record["id"];?>','type_id',this);">
													<?php
														$isSel = ( $record["type_id"] == 0 ) ? "selected" : "";
														echo "<option value=\"0\" {$isSel}>根層</option>";
														foreach( $listMenuType AS $recType) 
														{
															$isSel = ( $record["type_id"] == $recType["id"] ) ? "selected" : "";														
															echo "<option value=\"{$recType["id"]}\" {$isSel}>{$recType['name']}</option>";
														}
													?>
													</select>
												</td>
												<td><input class="form-control" type="text" value="<?php echo $record["sortKey"];?>" onkeyup="saveTempDataType('<?php echo $record["id"];?>','sortKey',this);" /></td>
												<td>												
													<a class="btn btn-danger btn-xs" onclick="delBKMenuType('<?php echo $record["id"];?>');">刪除</a>
												</td>
											</tr>
										<?php
											$ind++;
											}
										?>
										</tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="pull-right">
										<a class="btn btn-info btn-xs" onclick="page_save_type();">儲存</a>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-heading">
									<div class="panel-title hidden-xs">
										<span class="glyphicon glyphicon-tasks"></span>功能列表
										<div class="pull-right">
											<a class="btn btn-info btn-xs" onclick="addBKMenu();">新增</a>
										</div>
									</div>
								</div>
								<div class="panel-body pn">
									<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>按鈕</th>
												<th>類別</th>
												<th>連結</th>
												<th>順序</th>
												<th>操作</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>#</th>
												<th>按鈕</th>
												<th>類別</th>
												<th>連結</th>
												<th>順序</th>
												<th>操作</th>
											</tr>
										</tfoot>
										<tbody>
										<?php 											
											$ind = 1;
											foreach( $listMenu AS $record ) 
											{
										?>
											<tr>
												<td><?php echo $ind;?></td>
												<td><input class="form-control" type="text" value="<?php echo $record["name"];?>" onkeyup="saveTempData('<?php echo $record["id"];?>','name',this);" /><span style="display:none"><?php echo $record["name"];?></span></td>
												<td>
													<select class="form-control" onchange="saveTempData('<?php echo $record["id"];?>','type_id',this);">
													<?php
														$isSel = ( $record["type_id"] == 0 ) ? "selected" : "";
														echo "<option value=\"0\" {$isSel}>隱藏</option>";
														foreach( $listMenuType AS $recType) 
														{
															$isSel = ( $record["type_id"] == $recType["id"] ) ? "selected" : "";														
															echo "<option value=\"{$recType["id"]}\" {$isSel}>{$recType['name']}</option>";
														}
													?>
													</select><span style="display:none"><?php echo $record["type_id"];?></span>
												</td>
												<td><input  class="form-control" type="text" value="<?php echo $record["path"];?>" onkeyup="saveTempData('<?php echo $record["id"];?>','path',this);" /></td>
												<td><input  class="form-control" type="text" value="<?php echo $record["sortKey"];?>" onkeyup="saveTempData('<?php echo $record["id"];?>','sortKey',this);" /></td>
												<td>												
													<a class="btn btn-danger btn-xs" onclick="delBKMenu('<?php echo $record["id"];?>');">刪除</a>
												</td>
											</tr>
										<?php
											$ind++;
											}
										?>
										</tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="pull-right">
										<a class="btn btn-info btn-xs" onclick="page_save();">儲存</a>
									</div>
									<div class="clearfix"></div>
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
		var newBKM  = [];
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();
			
			$('#nestable').nestable({
				group: 1
			});
			$('#nestable').on('change', function(e) {
				var list   	= e.length ? e : $(e.target);
				var	listA	= list.nestable('serialize');
				newBKM = recursiveCheckLevel( listA, 0 );
			});
			init_DataTable();
        });
		
		function recursiveCheckLevel( findObj, type_id )
		{
			var inds = 0;
			var targetObj = [];
			for( var sort in findObj )
			{		
				var list = findObj[sort];	
				var childItem = $.extend(true, {}, list );
				
				childItem.id = list.itemId;
				childItem.type_id = type_id;
				childItem.sortKey = inds;
				
				targetObj.push(childItem);
				inds++;
				
				if( typeof(list.children) != "undefined" && list.type == "type" )
				{
					//childItem.children = recursiveCheckLevel( list.children, childItem.itemId );
					
					var tempItem = recursiveCheckLevel( list.children, childItem.itemId );
					for( var k in tempItem )
					{
						targetObj.push(tempItem[k]);
					}
				}
				
			}
			return targetObj;
		}
		
		function saveSortMenu()
		{
			if( newBKM.length > 0 )
			{
				$.ajax({
					url: "<?php echo base_url('/admin/bkMenu/saveSortMenu');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{ "postData" : newBKM },
					success:function(data, status, xhr){
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'儲存完成！':"儲存失敗！";
						PM.show({ title: data.message, text: text, type: type});
						setTimeout(function(){
							//location.reload();
						},1000);
					},
					error:function(xhr, stauts, err){
						PM.erro();
					}
				});	
			}
		}
		
    </script>
    
	<script type="text/javascript">
	
	var ajaxData = [];
	
	var BKM	= <?php echo json_encode($BKM);?>;
	
	var listMenu = <?php echo json_encode($listMenu);?>;
	var listMenuType = <?php echo json_encode($listMenuType);?>;
	
	function init_DataTable()
	{
		$('#datatable2').dataTable({
			"order": [[ 0, "asc" ]], 
			"language": {
				"lengthMenu"		: "每頁顯示 _MENU_ 筆",
				"search"			: "關鍵字　",
				"zeroRecords"		: "找不到任何相對應資料",
				"info"				: "目前 _PAGE_ 頁，共 _PAGES_ 頁",
				"infoEmpty"			: "資料是空的",
				"infoFiltered"		: "(從 _MAX_ 筆資料中篩選)"
			}
		});
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
	
	
	function addBKMenuType()
	{
		var name = prompt("請輸入類別名稱", "");
		if( name != null )
		{
			$.ajax({
				url: "<?php echo base_url('/admin/bkmenutype/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"postData" : [
						{ 'id':'-1', 'name':name }
					]
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
						location.reload();
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
	}
	
	function saveTempDataType(id,key,self)
	{
		for( var k in listMenuType )
		{
			if( id == listMenuType[k].id ) 
			{		
				listMenuType[k][key] = $(self).val();		
			}
		}
	}
	
	function page_save_type()
	{
		if(confirm("確定修改？"))
		{
			
			$.ajax({
				url: "<?php echo base_url('/admin/bkmenutype/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"postData" : listMenuType
				},
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'修改完成！':"修改失敗！";
					
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
						location.reload();
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
	}
	
	function delBKMenuType(id)
	{		
		if(confirm("確定刪除？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/bkmenutype/delete');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{ "postData": { "id" : id } },
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'刪除完成！':"刪除失敗！";
					
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
						location.reload();
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
	}
	
	function addBKMenu()
	{
		var name = prompt("請輸入按鈕名稱", "");
		if( name != null )
		{
			$.ajax({
				url: "<?php echo base_url('/admin/bkmenu/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"postData" : [
						{ 'id':'-1', 'name':name, 'path':'' }
					]
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
						location.reload();
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
	}
	
	function saveTempData(id,key,self)
	{
		for( var k in listMenu )
		{
			if( id == listMenu[k].id ) 
			{		
				listMenu[k][key] = $(self).val();		
			}
		}
	}
	
	function page_save()
	{
		if(confirm("確定修改？"))
		{
			
			$.ajax({
				url: "<?php echo base_url('/admin/bkmenu/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"postData" : listMenu
				},
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'修改完成！':"修改失敗！";
					
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
						location.reload();
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
	}
		
	function delBKMenu(id)
	{		
		if(confirm("確定刪除？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/bkmenu/delete');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{ "postData": { "id" : id } },
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'刪除完成！':"刪除失敗！";
					
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
						location.reload();
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
	}
	$(function(){
		
	});
	</script>
	
</body>
</html>