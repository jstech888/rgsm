
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
                            <a>WIDGET管理</a>
                        </li>
                        <li class="crumb-link">
                            <a href="<?php echo base_url("/admin/widget/".$title);?>"><?php echo $title;?></a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400"><?php echo $title;?></h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							
							<!--<div class="pull-right mt10">
								<button type="button" class="btn ladda-button btn-info page-reload" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-refresh"></span> 更新預覽畫面</span>
									<span class="ladda-spinner"></span>
								</button>
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
									<span class="ladda-spinner"></span>
								</button>
							</div>-->
							
							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul>
							</div>
							<div class="tabs-content main-tab-content">
									<div class="panel">
										<div class="panel-heading text-center">
											<div class="caption">
												編輯區塊
												<div class="pull-right">
													<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
														<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
														<span class="ladda-spinner"></span>
													</button>
												</div>
											</div>
										</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-12">
													<div class="form-group">
														<label for="newsTitle" class="col-lg-3 control-label">標題</label>
														<div class="col-lg-8">
															<input type="text" id="newsTitle" class="form-control" onkeyup="saveTempData('title', this);" value="<?php echo isset($widget[$langCode][0]['value']['title'])?$widget[$langCode][0]['value']['title']:"";?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12">
											<select multiple="multiple" id="hotnews" name="hotnews[]">
											<?php	
												$arr_seleted = isset($widget[$langCode][0]['value']['ids'])?$widget[$langCode][0]['value']['ids']:array();
												foreach( $articles AS $row )
												{
													$isSelected = (in_array( $row['id'], $arr_seleted)) ? "selected" : '';
													
											?>
											  <option value="<?php echo $row['id'];?>" <?php echo $isSelected;?> ><?php echo $row['blog-title'];?></option>
											<?php
												}
											?>
											</select>
												</div>
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

    <script type="text/javascript" src="/admin/vendor/plugins/multiselect/js/jquery.multi-select.js"></script>
	
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
		var preview_src = "<?php echo base_url("/view/show/bottomContainer");?>";
		var Lang = '<?php echo $Lang;?>';
		var widget = <?php echo json_encode($widget[$langCode][0]);?>;
		
		function saveTempData(key, self)
		{
			widget.value[key] = $(self).val();
		}
		
		function init_hotnews()
		{
			$("#hotnews").multiSelect({				
			  selectableHeader: "<div class='custom-header'>文章列表</div>",
			  selectionHeader: "<div class='custom-header'>最新消息</div>"
			});
		}
		
		function init_pageSave()
		{
			$(".page-save").unbind("click");
			$(".page-save").bind("click",function(e){
				e.preventDefault();
				
				widget.value.ids = $("#hotnews").val();
				
				var widgetData = {};
				widgetData[Lang] = widget;
				var postData = {
					"type"	 	 : "News",
					"widgetData" : [ widgetData ]
				};
				var l = Ladda.create(this);
				l.start();
				
				$.ajax({
					url: "<?php echo base_url('/widget/save');?>",
					async:true,
					cache:false,
					method:"POST",
					data:postData,
					success:function(data, status, xhr){
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'儲存完成！':"儲存失敗！";
						PM.show({title:data.message, text: text, type: type});
						
						setTimeout(function(){
							location.reload();
						},500);
					},
					error:function(xhr, stauts, err){
						PM.erro();
					}
				}).always(function() { l.stop(); });
				
				l.stop();
				return false;
			});
		}
		
		$(function(){
			if( widget.value == null )
			{
				widget.value = { ids : {} };
			}
			pageReload();
			MainLangCode();
			init_hotnews();
			init_pageSave();
		});
	</script>
</body>

</html>