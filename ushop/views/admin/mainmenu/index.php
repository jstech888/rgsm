
<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">

<style>


.embed-responsive {
	height:300px;
}
.portlet.box.grey-cascade {
  border: 1px solid #b1bdbd;
  border-top: 0;
}
.portlet.box.grey-cascade > .portlet-title {
  background-color: #95a5a6;
}
.portlet.box.grey-cascade > .portlet-title > .caption {
  color: white;
}
.portlet.box.grey-cascade > .portlet-title > .caption > i {
  color: white;
}
.portlet.box.grey-cascade > .portlet-title > .actions .btn-default {
  background: transparent !important;
  background-color: transparent !important;
  border: 1px solid #d2d9d9;
  color: #e0e5e5;
}
.portlet.box.grey-cascade > .portlet-title > .actions .btn-default > i {
  color: #e8ecec;
}
.portlet.box.grey-cascade > .portlet-title > .actions .btn-default:hover, .portlet.box.grey-cascade > .portlet-title > .actions .btn-default:focus, .portlet.box.grey-cascade > .portlet-title > .actions .btn-default:active, .portlet.box.grey-cascade > .portlet-title > .actions .btn-default.active {
  border: 1px solid #eef0f0;
  color: #fcfcfc;
}
.tray {
  padding-top: 10px !important;
  margin-top: 0;
}
.pb0 {
  padding-bottom: 0 !important;
}
#cke_ckeditor1 {
  background: #FFF;
  margin-top: -11px;
}
.nav.nav-tabs li.active {
  background: #FFF;
}
.dd-edit {
  top: inherit;
  bottom: 0;
}
.media-left {
  padding: 0;
  border: 1px #e4e4e4 solid;
  background: #eaeaea;
}
.media-left .glyphicons {
  margin: 15px;
}

.dd-item .media-body {
	padding-left: 11px;
}
.dd-item .list-unstyled {
	padding-left:0;
}
.media-body ul{
	width: 100%;
}
.dd-item>.dd-handle *{
	margin:0 !important;
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
                        <li class="crumb-active crumb-link">
                            <a>WIDGET管理</a>
                        </li>
                        <li class="crumb-active crumb-link">
                            <a>主選單管理</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">選單列表</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							
							<div class="pull-right mt10">
								<button type="button" class="btn ladda-button btn-info page-reload" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-refresh"></span> 更新預覽畫面</span>
									<span class="ladda-spinner"></span>
								</button>
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
									<span class="ladda-spinner"></span>
								</button>
							</div>
							
							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist"><ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul></ul>
							</div>
							<div class="tabs-content main-tab-content">
								<!-- 預覽結果 -->
									<div class="panel">
										<div class="panel-heading text-center">
											 <span class="panel-title"> 預覽結果</span>
										</div>        
										<div class="panel-body">
											<div class="row">
												<div class="embed-responsive col-sm-12">
													<iframe id="preview-widget" class="embed-responsive-item" src="/view/show/mainmenu?lang=<?php echo $langCode;?>"></iframe>
												</div>
											</div>
										</div>
									</div>
								<!-- /預覽結果 -->
									<div class="panel">
										<div class="panel-heading text-center">
											<div class="caption">
												編輯區塊
												<div class="pull-right">
													<a class="btn ladda-button btn-info .btn-xs  add-menu" href="/admin/mainmenu/edit?id=-1">
														<span class="ladda-label"><span class="glyphicons glyphicons-circle_plus"></span>
														新增
													</a>
													<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
														<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
														<span class="ladda-spinner"></span>
													</button>
												</div>
											</div>
										</div>
										<div class="panel-body">
									
											<div class="dd mb35" id="nestable">
												<ol class="dd-list">
												<?php 
												
													$mapping_typeIcon = array(
														"link" 		=> "glyphicons-link",
														"list" 		=> "glyphicons-list",
														"listlink"	=> "glyphicons-list",
														"slider" 	=> "glyphicons-picture",
														"video" 	=> "glyphicons-film"
													);
													if( isset($mainmenu[$Lang]) )
													{
														
														foreach( $mainmenu[$Lang] AS $menu )
														{
												?>
													<li class="dd-item" data-id="<?php echo $menu["sortkey"];?>" data-item-id="<?php echo $menu["id"];?>">
														<div class="dd-handle" data-name="title"><h3><?php echo $menu["title"];?></h3></div>
														<div class="dd-content">
															<div class="media">
																<span class="text-warning pull-right fs11 fw600" data-name="type" ><?php echo strtoupper($menu["type"]);?></span>
																<div class="dd-handle media-left">
																	<h2 class="glyphicons <?php echo $mapping_typeIcon[strtolower($menu["type"])];?>" data-name="type-icon"></h2>
																</div>
																<div class="media-body" data-name="content">
												<?php
														if($menu["type"] == "link")
														{
															echo "<a href='{$menu["href"]}'>{$menu["title"]}</a>";
														}
														if($menu["type"] == "list" || $menu["type"] == "listLink")
														{
															$html_item = '<ul>';
															foreach( $menu["content"] AS $item )
															{
																if($item["type"] == "title")
																{
																	$html_item.= "<li><p><strong>{$item["title"]}</strong></p></li>";
																}
																else
																{
																	$html_item.= "<li><span><a href='{$item["href"]}'>{$item["title"]}</a></span></li>";
																}
															}
															$html_item.= '</ul>';
															echo $html_item;
														}
														
												?>																						
																</div>
															</div>
															<div class="dd-edit pull-right">
																<a class="dd-edit-change config" href="/admin/mainmenu/edit?id=<?php echo $menu["id"];?>" >
																	<i class="fa fa-pencil"></i>
																</a>
																<a class="dd-edit-remove config" onclick="delMenu('<?php echo $menu["id"];?>');">
																	<i class="fa fa-times "></i>
																</a>
															</div>
														</div>
													</li>
												<?php
														}
													}
												?>
												</ol>
											</div>
										
											
											
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
	
    
		<!-- Fileupload included -->
		<script type="text/javascript" src="/libs/jqfileupload/js/vendor/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
		<script type="text/javascript" src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
		<script type="text/javascript" src="/libs/jqfileupload/js/jquery.iframe-transport.js"></script>
		<script type="text/javascript" src="/libs/jqfileupload/js/jquery.fileupload.js"></script>
	

    <!-- Admin Forms Javascript -->
    <script type="text/javascript" src="/admin/admin-tools/admin-forms/js/jquery-ui-monthpicker.min.js"></script>
    <script type="text/javascript" src="/admin/admin-tools/admin-forms/js/jquery-ui-timepicker.min.js"></script>
    <script type="text/javascript" src="/admin/admin-tools/admin-forms/js/jquery-ui-touch-punch.min.js"></script>
    <script type="text/javascript" src="/admin/admin-tools/admin-forms/js/jquery.spectrum.min.js"></script>
    <script type="text/javascript" src="/admin/admin-tools/admin-forms/js/jquery.stepper.min.js"></script>

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
		
		var preview_src = "<?php echo base_url("view/show/mainmenu");?>";
		var obj_menu 	= <?php echo json_encode($mainmenu);?>;
		var menuItem = false;
		
		var ajaxData = [];
		
		var modalContent = $('#modal-content');
		var currentSortObj = {};
		
		function init_nestable()
		{			
            $('#nestable').nestable();
			$('#nestable').on("change",function(e){
				delete ajaxData;
				ajaxData = [];
				var list   	= e.length ? e : $(e.target);
				var	raw		= list.nestable('serialize');	
				var cnt		= 0;
				for( var k in raw )
				{
					var record = {};
					record['id'] = raw[k]['itemId'];
					record['sortkey'] 	= cnt;
					cnt++;
					ajaxData.push(record);
				}
			});
			
		}
		
		function init_sortnestable()
		{			
            e = $('#nestable') ;
			delete ajaxData;
			ajaxData = [];
			var list   	= e.length ? e : $(e.target);
			var	raw		= list.nestable('serialize');	
			var cnt		= 0;
			for( var k in raw )
			{
				var record = {};
				record['id'] = raw[k]['itemId'];
				record['sortkey'] 	= cnt;
				cnt++;
				ajaxData.push(record);
			}
		}

		function init_pageSave()
		{
			$('.page-save').click(function(e){
				e.preventDefault();
				var l = Ladda.create(this);
				l.start();
				$.ajax({
					url: "<?php echo base_url('/widget/sortkey/mainmenu');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{
						itemData : ajaxData
					},
					success:function(data, status, xhr){
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'儲存完成！':"儲存失敗！";
						new PNotify({ title: data.message, text: text, shadow: true, opacity: "0.75", type: type,
							stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 },
							width: "290px", delay: 1400
						});
						setTimeout(function(){						
							location.reload();
						},500);
					},
					error:function(xhr, stauts, err){
						//console.log(xhr, stauts, err);
						new PNotify({ title: "系統異常", text: '該動作暫時無法完成！', shadow: true, opacity: "0.75", type: "danger",
							stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 },
							width: "290px", delay: 1400
						});
					}
				}).always(function() { l.stop(); });
				l.stop();
				return false;
			});
		
		}
		
		function delMenu( id )
		{
			if(confirm("確定刪除？"))
			{
				$.ajax({
					url: "<?php echo base_url('/admin/mainmenu/delete');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{ "id" : id },
					success:function(data, status, xhr){
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'儲存完成！':"儲存失敗！";
						new PNotify({ title: data.message, text: text, shadow: true, opacity: "0.75", type: type,
							stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 },
							width: "290px", delay: 1400
						});
						setTimeout(function(){						
							location.reload();
						},500);
					},
					error:function(xhr, stauts, err){
						//console.log(xhr, stauts, err);
						new PNotify({ title: "系統異常", text: '該動作暫時無法完成！', shadow: true, opacity: "0.75", type: "danger",
							stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 },
							width: "290px", delay: 1400
						});
					}
				});
						
			}
		}
		
		$(function(){
			MainLangCode();
			pageReload();
			
			init_nestable();
			init_sortnestable() ;
			
			init_pageSave();
		});
	</script>
</body>

</html>