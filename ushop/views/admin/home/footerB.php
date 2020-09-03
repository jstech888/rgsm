<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
.control-label {
  font-size: 23px;
  text-align: right;
}
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
							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul>
							</div>
							<div class="tabs-content main-tab-content">
							
							<div class="panel">
								<div class="panel-heading text-center">
									 <span class="panel-title"> 預覽結果</span>
									<div class="pull-right">
										<button type="button" class="btn ladda-button btn-info page-reload" data-style="zoom-in">
											<span class="ladda-label"><span class="glyphicons glyphicons-refresh"></span> 更新預覽畫面</span>
											<span class="ladda-spinner"></span>
										</button>
									</div>
								</div>        
								<div class="panel-body">
									<div class="row">
										<div class="embed-responsive col-sm-12">
											<iframe id="preview-widget" class="embed-responsive-item" src="/view/show/footer?lang=<?php echo $langCode;?>"></iframe>
										</div>
									</div>
								</div>
							</div>
							
							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										編輯區塊
										<div class="pull-right">
											<!--
											<div class="btn btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>新增</span>
												<!-- The file input field used as target for the file upload widget 
												<input id="upload-image" type="file" name="files" >												
											</div>
											-->
												<a class="btn btn-info page-save" onclick="init_pagesave();">
													 儲存
												</a>
										</div>
									</div>
								</div>
								<div class="panel-body">
									<div class="panel panel-info panel-border top">
										<div class="panel-heading">
											<span class="panel-title">欄位 1  </span>
										</div>
										<div class="panel-body">
											<textarea name="ckeditor1" id="ckeditor1" rows="12"><?php  echo ( isset($widget[$Lang][0]['value'][0]["content"]) )?$widget[$Lang][0]['value'][0]["content"]:'description'; ?></textarea>
										</div>
									</div>
									<div class="panel panel-info panel-border top">
										<div class="panel-heading">
											<span class="panel-title">欄位 2</span>
										</div>
										<div class="panel-body">	
											<textarea name="ckeditor2" id="ckeditor2" rows="12"><?php 
												echo ( isset($widget[$Lang][0]['value'][1]["content"]) )?$widget[$Lang][0]['value'][1]["content"]:'description';
											?></textarea>
										</div>
									</div>
									<div class="panel panel-info panel-border top">
										<div class="panel-heading">
											<span class="panel-title">欄位 3</span>
										</div>
										<div class="panel-body">	
											<textarea name="ckeditor3" id="ckeditor3" rows="12"><?php 
												echo ( isset($widget[$Lang][0]['value'][2]["content"]) )?$widget[$Lang][0]['value'][2]["content"]:'description';
											?></textarea>
										</div>
									</div>
								</div>
							</div>
							
							<div class="pull-right mt10">
								<a class="btn btn-info page-save" onclick="init_pagesave();">
									 儲存
								</a>
							</div>
							<div class="clearfix"></div>
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
	<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>
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
			
			//CKFinder.setupCKEditor( null, '/admin/vendor/editors/ckfinder/' );
			
            CKEDITOR.disableAutoInline = true;
			
            CKEDITOR.replace('ckeditor1', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 300
            });
			
            CKEDITOR.replace('ckeditor2', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 300
            });
						
            CKEDITOR.replace('ckeditor3', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 300
            });
			
			for (var i in CKEDITOR.instances) {
				CKEDITOR.instances[i].on('change', function(evt) {
					var id = $(this).attr("id");
					( typeof(obj_item[Lang][0].value) == "string" ) ? obj_item[Lang][0].value = {"left":"","middle":"","right":""}  : "";
					
					if( id == "cke_1" )
					{
						( typeof(obj_item[Lang][0].value[0]) == "undefined" ) ? obj_item[Lang][0].value[0] = {} : "";
						obj_item[Lang][0].value[0].content   = evt.editor.getData();
					}
					if( id == "cke_2" )
					{
						( typeof(obj_item[Lang][0].value[1]) == "undefined" ) ? obj_item[Lang][0].value[1] = {} : "";
						obj_item[Lang][0].value[1].content   = evt.editor.getData();
					}
					if( id == "cke_3" )
					{
						( typeof(obj_item[Lang][0].value[2]) == "undefined" ) ? obj_item[Lang][0].value[2] = {} : "";
						obj_item[Lang][0].value[2].content   = evt.editor.getData();
					}
				});
			}
        });
		
		function saveTempData (type,key,self) {
			( typeof(obj_item[Lang][0].value[key]) == "undefined" ) ? obj_item[Lang][0].value[key] = {}  : "";
			obj_item[Lang][0].value[key][type] = $(self).val();
		}
    </script>
    
	<script type="text/javascript">
	var preview_src = "<?php echo base_url("view/show/footer");?>";
	var obj_item 	= <?php echo json_encode($widget);?>;
	var menuItem 	= false;
	var Lang   		= '<?php echo $Lang;?>';
	var ajaxData = [];	
		
	function selectMediaStackLogo()
	{
		MediaStack.popup({
			selectActionFunction : function(e){
				var file = MediaStack.convertFileObject(e);
				$("#logo-img").attr("src",file.url);
				obj_item[Lang][0].value[0] = file;
			}
		});
	}
	function init_pagesave()
	{
		( typeof(obj_item[Lang][0].value) == "string" ) ? obj_item[Lang][0].value = {"left":"","middle":"","right":""}  : "";
		
		obj_item[Lang][0].value[0].content   = CKEDITOR.instances.ckeditor1.getData();
		obj_item[Lang][0].value[1].content   = CKEDITOR.instances.ckeditor2.getData();
		obj_item[Lang][0].value[2].content   = CKEDITOR.instances.ckeditor3.getData();
					
		var postData = {
			type 		: "footerB",
			widgetData	: obj_item
		};
		
		$.ajax({
			url: "<?php echo base_url('/widget/save');?>",
			async:true,
			cache:false,
			method:"POST",
			data:postData,
			success:function(data, status, xhr){
				var type = data.code == 1?"info":"danger";
				var text = data.code == 1?'儲存完成！':"儲存失敗！";
				PM.show({title:data.message,text:text,type:type});
				
				setTimeout(function(){
					location.reload();
				},500);
			},
			error:function(xhr, stauts, err){
				PM.erro();
			}
		});
	}
	
	
	
	$(function(){
		
		pageReload();
		
		MainLangCode();
		
		cSortkey = $(".dd-item").length;
	});
	</script>
	
</body>
</html>