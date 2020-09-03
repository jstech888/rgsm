<style>
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
.tabs-menu {
  margin-top: 15px;
}
.tabs-menu {
  margin-top: 15px;
}
.tabs-content  {
  padding: 20px 10px;
  border: 1px #e3e3e3 solid;
  border-top: none;
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
                        <li class="crumb-active">
                            <a>靜態資訊</a>
                        </li>
                        <li class="crumb-link">
                            <a href="<?php echo base_url("/admin/page/appdownload");?>"><?php echo $title;?></a>
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
                    
					<!-- upload-prograss-bar -->
					<div id="upload-result" class="upload-progress" style="display:none;">
						<!-- The global progress bar -->
						<div id="upload-progress" class="progress" style="height: 5px;margin-bottom: 0;">
							<div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" style="width: 0%"></div>
						</div>
					</div>
					<!-- /upload-prograss-bar -->
					
					<div class="panel">
						<div class="panel-heading">
							<!-- title -->
							<h3 class="panel-title text-muted text-center mt10 fw400"><?php echo $title;?></h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<?php
								$infopage[$Lang]["content"] = json_decode($infopage[$Lang]["content"],true);
								if( is_array($infopage[$Lang]["content"]) )
								{
							?>
								<div class="panel panel-alert panel-border top">
									<div class="panel-heading">
										<span class="panel-title">更換Banner</span>
									</div>
									<div class="panel-body">
										<div class="btn btn-success btn-block fileinput-button">
											<i class="glyphicon glyphicon-plus"></i>
											<span>選擇照片</span>
											<!-- The file input field used as target for the file upload widget -->
											<input id="upload-image" type="file" name="files" >
										</div>
										<div class="row align-center">
											<img class="img-responsive img-banner"src="<?php echo $infopage[$Lang]["content"][$_GET["id"]]["banner"]["url"];?>" />
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="panel panel-alert panel-border top">
									<div class="panel-heading">
										<span class="panel-title">文字區塊</span>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="form-group">
												<label for="inputStandard" class="col-lg-2 control-label">標題</label>
												<div class="col-lg-6">
													<input type="text" id="inputStandard" class="form-control" onkeyup="saveTempData('title',-1,this);" value="<?php echo $infopage[$Lang]["content"][$_GET["id"]]["title"];?>">
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label for="inputStandard" class="col-lg-2 control-label">內文</label>
												<div class="col-lg-6">
												
													<!-- <input type="text" id="inputStandard" class="form-control" onkeyup="saveTempData('description',-1,this);" value="<?php echo $infopage[$Lang]["content"][$_GET["id"]]["description"];?>"> -->
													
													<textarea name="ckeditor1" id="ckeditor1" rows="12" class="form-control" onkeyup="saveTempData('description',-1,this);"><?php echo $infopage[$Lang]["content"][$_GET["id"]]["description"]; ?></textarea>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="panel panel-alert panel-border top">
									<div class="panel-heading">
										<span class="panel-title">App 按鈕</span>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="form-group">
												<label for="inputStandard" class="col-lg-2 control-label">Android Link</label>
												<div class="col-lg-6">
													<input type="text" id="inputStandard" class="form-control" onkeyup="saveTempData('appbtn','android',this);" value="<?php echo $infopage[$Lang]["content"][$_GET["id"]]["appbtn"]["android"];?>">
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label for="inputStandard" class="col-lg-2 control-label">Apple Link</label>
												<div class="col-lg-6">
													<input type="text" id="inputStandard" class="form-control" onkeyup="saveTempData('appbtn','apple',this);" value="<?php echo $infopage[$Lang]["content"][$_GET["id"]]["appbtn"]["apple"];?>">
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label for="inputStandard" class="col-lg-2 control-label">PC Link</label>
												<div class="col-lg-6">
													<input type="text" id="inputStandard" class="form-control" onkeyup="saveTempData('appbtn','pc',this);" value="<?php echo $infopage[$Lang]["content"][$_GET["id"]]["appbtn"]["pc"];?>">
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="pull-right mt15">
									<a class="btn btn-success page-save">儲存</a>
									<a class="btn btn-default" href="/admin/page/appdownload">返回</a>
								</div>
							<?php
								}
							?>
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
			
			/*
			
            CKEDITOR.disableAutoInline = true;
            CKEDITOR.replace('ckeditor1', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: 	'/admin/vendor/editors/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl: 	'/admin/vendor/editors/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl: 		'/admin/vendor/editors/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: 	'/admin/vendor/editors/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl: 	'/admin/vendor/editors/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Flash',
                height: 300
            });
			
			
			for (var i in CKEDITOR.instances) {
				CKEDITOR.instances[i].on('change', function(evt) {
					obj_infopage[Lang]["content"][contentKey].description = evt.editor.getData();
				});
			}
			*/
        });
    </script>
    <!-- END: PAGE SCRIPTS -->
	
	
	<script type="text/javascript">
	
	function saveTempData(fk,sk,self)
	{
		if( sk == -1 )
		{
			obj_infopage[Lang]["content"][contentKey][fk] = $(self).val();
		}
		else
		{
			obj_infopage[Lang]["content"][contentKey][fk][sk] = $(self).val();			
		}
	}
	
	$(function () {
		// Change this to the location of your server-side upload handler:
		var url = '/uploads/';
		$('#upload-image').fileupload({
			url: url,
			dataType: 'json',
			autoUpload: true,
			acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
			maxFileSize: 5000000, // 5 MB
			disableImageResize: /Android(?!.*Chrome)|Opera/
				.test(window.navigator.userAgent),
			previewMaxWidth: 100,
			previewMaxHeight: 100,
			previewCrop: true
		}).on('fileuploadadd', function (e, data) {
			$("#upload-result").fadeIn(300);
			/*
			delRealImage(getLocation(obj_lb.en[0].value.url).pathname);
			*/
			var _data = data;
			$.each(data.files, function (index, file) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('.img-banner').attr('src', e.target.result);
				}
				reader.readAsDataURL(file);
			});
		}).on('fileuploadprogressall', function (e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#upload-progress .progress-bar').css( 'width', progress + '%' );
		}).on('fileuploaddone', function (e, data) {
			
			$.each(data.result.files, function (index, file) {
				if (file.url) {
					var link = $('<a>')
						.text(file.name)
						.attr('target', '_blank')
						.prop('href', file.url);
					$(".show-name").wrap(link);
					
					file = renewFile(file);
					
					obj_infopage[Lang]["content"][contentKey].banner = file;
					
				} else if (file.error) {
					var error = $('<span class="text-danger"/>').text(file.error);
					$(".show-name").append(error);
				}
			});
			setTimeout(function(){
				$("#upload-progress").fadeOut(500);
				setTimeout(function(){
					$('#upload-progress .progress-bar').css('width','0%');
				},600);
			},1000);
		}).on('fileuploadfail', function (e, data) {
			$.each(data.files, function (index) {
				var error = $('<span class="text-danger"/>').text('File upload failed.');
				$(".show-name").append(error);
			});
			setTimeout(function(){
				$("#upload-progress").fadeOut(500);
				setTimeout(function(){
					$('#upload-progress .progress-bar').css('width','0%');
				},600);
			},1000);
		}).prop('disabled', !$.support.fileInput)
			.parent().addClass($.support.fileInput ? undefined : 'disabled');
	});
	
	</script>
	<script type="text/javascript">
		var key				= "<?php echo $title;?>";
		var obj_infopage  	= <?php echo json_encode($infopage);?>;
		var Lang			= "<?php echo $Lang;?>";
		var	contentKey 		= "<?php echo $_GET["id"];?>";
		
		$(function(){
			
			MainLangCode();
		
			$('.page-save').click(function(e){
				e.preventDefault();
				var postData = {
					key 		: key,
					infoData	: obj_infopage
				};
				
				var l = Ladda.create(this);
				l.start();
				$.ajax({
					url: "<?php echo base_url('/page/save_batch');?>",
					async:true,
					cache:false,
					method:"POST",
					data:postData,
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