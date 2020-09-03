
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
							
							<div class="pull-right mt10">
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
									<span class="ladda-spinner"></span>
								</button>
							</div>
							
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
											<div class="tab-block mb25">
												<ul class="nav nav-tabs tabs-border">
													<li class="active">
														<a href="#tab8_1" data-toggle="tab">現貨專區</a>
													</li>
													<!--
													<li>
														<a href="#tab8_2" data-toggle="tab">Features</a>
													</li>
													<li class="dropdown">
														<a href="#tab8_3" data-toggle="tab">Promotion</a>
													</li>
													-->
												</ul>
												<div class="tab-content">
													<div id="tab8_1" class="tab-pane active">
														<select multiple="multiple" id="multiSelectHot" name="multiSelectHot[]">
														<?php	
															$arr_seleted = $widget[$langCode][0]['value'];
															foreach( $produsts AS $row )
															{
																$isSelected = (in_array( $row['PID'], $arr_seleted)) ? "selected" : '';
																
														?>
														  <option value="<?php echo $row['PID'];?>" <?php echo $isSelected;?> ><?php echo $row["detail"]['name'];?></option>
														<?php
															}
														?>
														</select>
													</div>
													<!--
													<div id="tab8_2" class="tab-pane">
														<select multiple="multiple" id="multiSelectFeatures" name="multiSelectFeatures[]">
														<?php	
															$arr_seleted = explode(",",$widget[$langCode][0]['value']['features']['ids']);
															foreach( $produsts AS $row )
															{
																$isSelected = (in_array( $row['PID'], $arr_seleted)) ? "selected" : '';
																
														?>
														  <option value="<?php echo $row['PID'];?>" <?php echo $isSelected;?> ><?php echo $row["detail"]['name'];?></option>
														<?php
															}
														?>
														</select>
													</div>
													<div id="tab8_3" class="tab-pane">
														<select multiple="multiple" id="multiSelectPromotion" name="multiSelectPromotion[]">
														<?php	
															$arr_seleted = explode(",",$widget[$langCode][0]['value']['promotion']['ids']);
															foreach( $produsts AS $row )
															{
																$isSelected = (in_array( $row['PID'], $arr_seleted)) ? "selected" : '';
																
														?>
														  <option value="<?php echo $row['PID'];?>" <?php echo $isSelected;?> ><?php echo $row["detail"]['name'];?></option>
														<?php
															}
														?>
														</select>
													</div>
													-->
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
		var preview_src = "<?php echo base_url("/view/show/ProductNavTabs");?>";
		var Lang = '<?php echo $Lang;?>';
		var widget = <?php echo json_encode($widget[$langCode][0]);?>;
		
		
		function init_ProductNavTabs()
		{
			$("#multiSelectHot").multiSelect({				
			  selectableHeader: "<div class='custom-header'>產品列表</div>",
			  selectionHeader: "<div class='custom-header'>Hot</div>"
			});
			/*
			$("#multiSelectFeatures").multiSelect({				
			  selectableHeader: "<div class='custom-header'>產品列表</div>",
			  selectionHeader: "<div class='custom-header'>Features</div>"
			});
			$("#multiSelectPromotion").multiSelect({				
			  selectableHeader: "<div class='custom-header'>產品列表</div>",
			  selectionHeader: "<div class='custom-header'>Promotion</div>"
			});
			*/
		}
		
		function init_pageSave()
		{
			$(".page-save").unbind("click");
			$(".page-save").bind("click",function(e){
				e.preventDefault();
				
				widget.value = $("#multiSelectHot").val();
				//widget.value.features.ids = $("#multiSelectFeatures").val().join();
				//widget.value.promotion.ids = $("#multiSelectPromotion").val().join();
				
				var widgetData = {};
				widgetData[Lang] = widget;
				var postData = {
					"type"	 	 : "ProductNavTabsStock",
					"widgetData" : [widgetData]
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
						//console.log(data, status, xhr);
						
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'儲存完成！':"儲存失敗！";
						PM.show({"title":data.message,"text":text,type,type});
						
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
			pageReload();
			init_pageSave();
			init_ProductNavTabs();
			MainLangCode();
		});
	</script>
</body>

</html>