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
                            <a>網站語系管理</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">網站語系管理</h3>
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
											<span class="glyphicon glyphicon-tasks"></span>網站語系列表</div>
									</div>
									<div class="panel-body pn">
										<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>編碼</th>
													<th>預設名稱</th>													
											<?php foreach( $listLang AS $record ) { echo "<th>{$record["default_locale"]}</th>"; } ?>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>編碼</th>
													<th>預設名稱</th>			
											<?php foreach( $listLang AS $record ) { echo "<th>{$record["default_locale"]}</th>"; } ?>
												</tr>
											</tfoot>
											<tbody>
											<?php 											
												$ind = 0;
												foreach( $listLang AS $record ) 
												{
											?>
												<tr>
													<td><?php echo $record["tag"];?></td>
													<td><?php echo $record["english_name"];?></td>
																		
											<?php 				
												foreach( $listLang AS $recordB ) 
												{
											?>
													<td><input class="form-control" value="<?php echo (isset($record[$recordB["tag"]]["display"]))?$record[$recordB["tag"]]["display"]:"";?>" onkeyup="saveTempData('<?php echo $record['tag'];?>','<?php echo $recordB['tag'];?>',this);"/></td>
											<?php
												}
											?>
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
											<a class="btn btn-info" onclick="pagesave();">儲存</a>
										</div>
										<div class="clearfix"></div>
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
    </script>
    
	<script type="text/javascript">
	
	var ajaxData = [];
	var listDisplay = <?php echo json_encode($listDisplay);?>;
	
	function init_MainLangCodeSwitch(){
		$(".main-langCode li a").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(e){
				location.href = "/admin/product/listTable?lang="+$(this).attr("data-langCode");
			});
		});
	}
	
	function saveTempData(key1,key2,self)
	{
		( typeof(listDisplay[key1]) == "undefined" ) ? listDisplay[key1] = {} : "";
		( typeof(listDisplay[key1][key2]) == "undefined" ) ? listDisplay[key1][key2] = {} : "";
		listDisplay[key1][key2] = {
			"self_code" : key1,
			"display_code" : key2,
			"display" : $(self).val()
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
	
	function changeAct(id,lang,self)
	{
		var status 	= $("#"+$(self).attr("id")+":checked").length;
		var str		= (status == 1)?"啟用":"停用";
		if( confirm("確定"+str+lang+"?") )
		{
			$.ajax({
				url: "<?php echo base_url('/admin/pageTraslate/swapActLang');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"langData" : {
						"code" : lang,
						"active" : status
					}
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
	}
	
	function pagesave()
	{
		$.ajax({
			url: "<?php echo base_url('/admin/pageTraslate/saveDisplayLang');?>",
			async:true,
			cache:false,
			method:"POST",
			data:{
				"langData" : listDisplay
			},
			success:function(data, status, xhr){
				console.log(data, status, xhr);
				var type = data.code == 1?"info":"danger";
				var text = data.code == 1?'儲存完成！':"儲存失敗！";
				
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
		( listDisplay.length == 0 ) ? listDisplay = {} : '';
		init_MainLangCodeSwitch();
		init_DataTable();
		//init_deleteListRow();
	});
	</script>
	
</body>
</html>