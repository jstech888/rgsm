<style>
.panel .panel-heading {
  text-align: center;
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
.thumb {
  max-height: 80px;
}
.dd-handle {
  width: 100%;
}
.dd-edit {
  top: initial;
  bottom: 0;
}
.media-left {
  width: 25%;
  text-align: center;
}
.media-body {
  width: 1000px;
  min-width: 100%;
  max-width: 100%;
}

.img-banner {
  width: 200px;
  margin: 0 auto;
  margin-top: 20px;
}

label {
  text-align: right;
  line-height: 36px;
  font-size: 18px;
}
.row.table-layout .br-a {
  vertical-align: middle !important;
}
</style>
<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">


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
                            <a> <?php echo $bkmt_name;?> </a>
                        </li>
                        <li class="crumb-active">
                            <a> <?php echo $bkm_name;?> </a>
                        </li>
                        <li class="crumb-active">
                            <a>Edit "<?php echo $_GET["id"];?>" page</a>
                        </li>
                    </ol>
                </div>
				<!--
                <div class="topbar-right">
					<input type="radio" name="show" class="php-data" checked>
                </div>
				-->
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
								<ul class="nav nav-tabs" role="tablist"><ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul>
							</div>
							<div class="tabs-content main-tab-content">
							
								<div class="panel panel-alert panel-border top">
									<div class="panel-heading">
										<span class="panel-title">META DATA</span>
									</div>
									<div class="panel-body">    
										<div class="row">
											<div class="form-group">
												<label class="col-lg-3 control-label">Title</label>
												<div class="col-lg-8">
													<input type="text" class="form-control" onkeyup="saveMetaData('title',this);" value="<?php echo isset($meta["value"]["title"])?$meta["value"]["title"]:"";?>" placeholder="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="col-lg-3 control-label">Keywords</label>
												<div class="col-lg-8">
													<input type="text" class="form-control" onkeyup="saveMetaData('keywords',this);" value="<?php echo isset($meta["value"]["keywords"])?$meta["value"]["keywords"]:"";?>" placeholder="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="col-lg-3 control-label">Description</label>
												<div class="col-lg-8">
													<input type="text" class="form-control" onkeyup="saveMetaData('description',this);" value="<?php echo isset($meta["value"]["description"])?$meta["value"]["description"]:"";?>" placeholder="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="col-lg-3 control-label">Author</label>
												<div class="col-lg-8">
													<input type="text" class="form-control" onkeyup="saveMetaData('author',this);" value="<?php echo isset($meta["value"]["author"])?$meta["value"]["author"]:"";?>" placeholder="">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-alert panel-border top">
									<div class="panel-heading">
										<span class="panel-title">標題</span>
									</div>
									<div class="panel-body">
										<input type="text" class="form-control" onkeyup="saveTempData('title',this);" value="<?php echo (isset($infopage["title"]))?$infopage["title"]:''; ?>">
									</div>
								</div>
								<div class="panel panel-alert panel-border top">
									<div class="panel-heading">
										<span class="panel-title">首圖</span>
									</div>
									<div class="panel-body">
										<div class="row table-layout" id="modal-content">
											<div class="col-xs-4 br-a br-light bg-light p30">
												<div class="row">
													<div class="col-md-12 text-center">
														<a class="btn btn-info" onclick="selectMediaStack();">
															<i class="glyphicon glyphicon-plus"></i>選擇照片													
														</a>
													</div>
													<?php if( isset($infopage["image"]["url"]) ) { ?> 
													<div class="col-md-12 text-center mt15">
														<a class="btn btn-danger" onclick="removeImage();">
															<i class="glyphicon glyphicon-remove"></i>移除照片													
														</a>
													</div>
													<?php } ?>
												</div>
											</div>
											<div class="col-xs-8 br-a br-light bg-light dark va-t p10">
												<div id="animation-switcher" class="ph20">
													<div class="row">
														<div class="col-xs-12 text-center">
															<img src="<?php echo (isset($infopage["image"]["url"]))?$infopage["image"]["url"]:'/uploads/sample-icon.png'; ?>" class="img-thumbnail show-img" style="max-width: 300px;"/>
														</div>
														<div class="col-xs-12 text-center">
															<span class="show-name"></span>
														</div>
													</div>
												</div>
											</div>
										</div>	
										<div class="row table-layout">
											<div class="col-xs-4 br-a br-light bg-light p30">
												<div class="row">
													<div class="col-md-12 text-center">描述</div>
												</div>
											</div>
											<div class="col-xs-8 br-a br-light bg-light dark va-t p10">
												<div class="row">
													<div class="col-xs-12 text-center">
														<input id="logo-alt" class="form-control" value="<?php echo (isset($infopage["image"]["alt"]))?$infopage["image"]["alt"]:''; ?>" onkeyup="saveTempData('alt',this);" />
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>										
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="panel panel-alert panel-border top">
									<div class="panel-heading">
										<span class="panel-title">內容</span>
									</div>
									<div class="panel-body">
										<textarea name="ckeditor1" id="ckeditor1" rows="12"><?php echo (isset($infopage["content"]))?$infopage["content"]:''; ?></textarea>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="pull-right">
								<a class="btn btn-success page-save">儲存</a>
								<a class="btn btn-default" href="/admin/page/listPage">返回</a>
							</div>
							<div class="clearfix"></div>
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

    <!-- Ckeditor JS -->
    <script type="text/javascript" src="/admin/vendor/editors/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/admin/vendor/editors/ckfinder/ckfinder.js"></script>

	<script type="text/javascript" src="/admin/vendor/plugins/nestable/jquery.nestable.js"></script>
    
	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script type="text/javascript" src="/libs/jqfileupload/js/vendor/jquery.ui.widget.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script type="text/javascript" src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script type="text/javascript" src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script type="text/javascript" src="/libs/jqfileupload/js/jquery.iframe-transport.js"></script>
	<!-- The basic File Upload plugin -->
	<script type="text/javascript" src="/libs/jqfileupload/js/jquery.fileupload.js"></script>
	
    <script type="text/javascript" src="/libs/jquery.switchButton.js"></script>
	
    <!-- Theme Javascript -->
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/demo.js"></script>
    <script type="text/javascript" src="/admin/js/page.js"></script>
	
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/ladda.min.js"></script>
	
    <script type="text/javascript">
		 var editorContent = "";
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();
			
			MainLangCode();
			
            CKEDITOR.disableAutoInline = true;
            CKEDITOR.replace('ckeditor1', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 300
            });
			
			for (var i in CKEDITOR.instances) {
				CKEDITOR.instances[i].on('change', function(evt) {
					infopage.content = evt.editor.getData();
				});
			}
        });
    </script>
    <!-- END: PAGE SCRIPTS -->
	
	
	<script type="text/javascript">
		var refer_uri		= "/admin/page/listPage";
		
		var key				= "<?php echo $title;?>";
		var infopage		= <?php echo json_encode($infopage);?>;
		var Lang			= "<?php echo $Lang;?>";
		var	contentKey 		= "<?php echo $_GET["id"];?>";
		var metadata		= <?php echo json_encode($meta);?>;
		
		function selectMediaStack()
		{
			MediaStack.popup({
				selectActionFunction : function(e){
					var file = MediaStack.convertFileObject(e);
					$(".show-img").attr("src",file.url);
					infopage.image = file;
				}
			});
		}
		
		function removeImage()
		{
			infopage.image = {};
			$(".show-img").attr("src","/uploads/sample-icon.png");
			$("#logo-alt").val(" ");
		}
		
		function saveTempData(key,self)
		{
			if( key == 'alt' )
			{
				infopage['image'][key] = $(self).val();				
			}
			else
			{
				infopage[key] = $(self).val();				
			}
		}
		
		function saveMetaData(key,self)
		{
			typeof(metadata.value) == "string"?metadata.value = {}:"";
			metadata.value[key] = $(self).val();
		}
		
		
		$(function(){
			
			$('.page-save').click(function(e){
				e.preventDefault();
				
				var l = Ladda.create(this);
				l.start();
				$.ajax({
					url: "<?php echo base_url('/admin/page/save');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{
						'metadata' : metadata,
						"infopage" : infopage
					},
					success:function(data, status, xhr){
						//console.log(data, status, xhr);
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'儲存完成！':"儲存失敗！";
						new PNotify({
							title: data.message,
							text: '儲存完成！',
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

						location.href='/admin/page/listPage';
					},
					error:function(xhr, stauts, err){
						console.log(xhr, stauts, err);
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
				}).always(function() { l.stop(); });
				return false;
			});
		});
	</script>
</body>

</html>