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
.panel-title {
  font-size: 18px;
}
.nav.tabs-left.tabs-border li.active a{
  text-transform: uppercase;
  font-size: 18px;
  font-weight: bold;
  border-left-color: #4a89dc;
  color: #4a89dc;
}

.nav.tabs-left.tabs-border li a{
  text-transform: uppercase;
  font-size: 16px;
}
.sub-panel {
  margin-top: 15px;
}
.input-label {
  font-size: 16px;
  padding-top: 7px;
  text-align: left;
}
.input-block{
  border-bottom: 1px dashed #9E9E9E;
  margin: 15px 0;
  padding-bottom: 15px;
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
                            <a>靜態語系設定</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">語系資料設定</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										資料區塊
										<div class="pull-right">
											<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
												<span class="ladda-spinner"></span>
											</button>
										</div>
									</div>
								</div>
								<div class="panel-body">
								
								<?php
									$pageCNT = 1;
									foreach($listPage AS $name => $listPath)
									{
										if( $name == "widget" ){ continue; };
								?>
								<div class="panel panel-system">
									<div class="panel-heading">
										<span class="panel-title"><?php echo (array_key_exists($name,$mapping)) ? $mapping[$name] : $name;?></span>
									</div>
									<div class="panel-body">
									
										<table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>#</th>
													<th>預設名稱</th>
											<?php foreach(array_keys($listPath) AS $key ) { 	
													if( $key != "default" && $key != "chmod" && isset($widgetLang[$key][$Lang]) )
													{
														echo "<th>{$widgetLang[$key][$Lang]}</th>";
													}										
											} ?>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>#</th>
													<th>預設名稱</th>
											<?php foreach(array_keys($listPath) AS $key ) { 	
													if( $key != "default" && $key != "chmod" && isset($widgetLang[$key][$Lang]) )
													{
														echo "<th>{$widgetLang[$key][$Lang]}</th>";
													}										
											} ?>
												</tr>
											</tfoot>
											<tbody>
											<?php 											
												$ind = 1;
												foreach( $listPath["default"]["object"] AS $objK => &$dLangV  ) 
												{
													if(is_string($dLangV))
													{
											?>
												<tr>
													<td><?php echo $ind;?></td>		
												    <td><?php echo $dLangV;?></td>			
											<?php 		
													foreach( $listPath AS $LangK => $LangItems ) 
													{
														if($LangK != "default" && isset($widgetLang[$LangK]) )
														{
															$tempObj = json_decode(json_encode($LangItems["object"]),true);
															$translate = isset($tempObj[$objK]) ? $tempObj[$objK] : "";
															echo "<td><input class=\"form-control input-data\" value=\"{$translate}\" onkeyup=\"saveTempData('{$name}','{$LangK}','{$objK}',this);\"/></td>";
														}
													}
											?>
												</tr>
											<?php											
													$ind++;	
													}
												}
											?>
											</tbody>
										</table>
												
									</div>
								</div>
								<?php		
										$pageCNT++;
									}
								?>
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
	var listPage = <?php echo json_encode($listPage);?>;
	function saveTempData( page, lang, objK, self )
	{
		listPage[page][lang]['object'][objK] = $(self).val();
	}
	/*
	function init_saveTempData()
	{
		$(".input-data").each(function(){
			$(this).unbind("keyup");
			$(this).bind("keyup",function(){
				var level = $(this).attr("data-level");
				var page  = $(this).attr("data-page");
				var lang  = $(this).attr("data-lang");
				var title = $(this).attr("data-title");
				
				var value = $(this).val();
				switch(level)
				{
					case "1":
						listPage[page][lang]['object'][title] = value;
						break;
					case "2":
						var child = $(this).attr("data-child");
						listPage[page][lang]['object'][title][child] = value;
						break;
					case "3":
						var list  = $(this).attr("data-list");
						listPage[page][lang]['object'][title]['ol'][list]= value;
						break;
				}
			});
		});
	}
	*/
	function ini_pageSave()
	{
		$('.page-save').each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(){
				
				if(confirm("確定更新目前所有翻譯？"))
				{
					$.ajax({
						url: "<?php echo base_url('/admin/pageTraslate/update');?>",
						async:true,
						cache:false,
						method:"POST",
						data:{
							"listPage" : listPage
						},
						success:function(data, status, xhr){
							
							var type = data.code == 1?"info":"danger";
							var text = data.code == 1?'更新完成！':"更新失敗！";
							
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
							
							return false;
							
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
			});
		});
	}
	
	$(function(){
		ini_pageSave();
	});
	</script>
	
</body>
</html>