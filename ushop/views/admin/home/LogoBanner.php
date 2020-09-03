
<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
.row.table-layout .br-a {
  vertical-align: middle !important;
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
                            <a href="<?php echo base_url("/admin/widget/LogoBanner");?>">商店LOGO</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">商店LOGO</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist"><ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul>
							</div>
							<div class="tabs-content main-tab-content">
								
											<!--
											<div class="col-md-8 col-md-offset-2 text-center">
												<div class="btn btn-success fileinput-button">
													<i class="glyphicon glyphicon-plus"></i>
													<span>選擇照片</span>
													<!-- The file input field used as target for the file upload widget 
													<input id="upload-image" type="file" name="files" >
												</div>
											</div>
											-->
								<!-- 表頭圖示 -->
								<div class="row table-layout" id="modal-content">
									<div class="col-xs-4 br-a br-light bg-light p30">
										<div class="row">
											<div class="col-md-12 text-center">
												<a class="btn btn-info" onclick="selectMediaStack();">
													<i class="glyphicon glyphicon-plus"></i>選擇照片													
												</a>
											</div>
										</div>
									</div>
									<div class="col-xs-8 br-a br-light bg-light dark va-t p10">
										<div id="animation-switcher" class="ph20">
											<div class="row">
												<div class="col-xs-12 text-center">
													<img src="<?php 
													echo ( isset($widget[$Lang][0]['value']) )?$widget[$Lang][0]['value']['url']:'/uploads/sample-icon.png';
													?>" class="img-thumbnail show-img" style="max-width: 300px;"/>
												</div>
												<div class="col-xs-12 text-center">
													<span class="show-name"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /表頭圖示 -->
								<div class="row table-layout">
									<div class="col-xs-4 br-a br-light bg-light p30">
										<div class="row">
											<div class="col-md-12 text-center">描述</div>
										</div>
									</div>
									<div class="col-xs-8 br-a br-light bg-light dark va-t p10">
										<div class="row">
											<div class="col-xs-12 text-center">
												<input id="logo-alt" class="form-control" value="" onkeyup="saveTempData('alt',this);" />
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="pull-right">
								<a class="btn btn-info btn-save" onclick="saveImage();"> <span class="glyphicons glyphicons-file_import"></span>儲存 </a>
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
    <script type="text/javascript" src="/admin/vendor/editors/ckfinder/ckfinder.js"></script>
    <script type="text/javascript" src="/admin/vendor/editors/ckeditor/ckeditor.js"></script>
	
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
		
	function saveTempData( key, self )
	{
		obj_lb[Lang][0].value[key] = $(self).val();
	}
	
	function selectMediaStack()
	{
		MediaStack.popup({
			basePath : "/uploads/members/",
			selectActionFunction : function(e){
				var file = MediaStack.convertFileObject(e);
				//saveImage(file);
				$(".show-img").attr("src",file.url);
				obj_lb[Lang][0].value = file;
			}
		});
	}
	
     jQuery(document).ready(function() {

         "use strict";

         // Init Theme Core    
         Core.init();

         // Init Theme Core    
         Demo.init();

         // Turn off automatic editor initilization.
         // Used to prevent conflictions with multiple text 
         // editors being displayed on the same page.
		/*
		$("input[type=radio]").switchButton({
			on_label: '顯示',
			off_label: '隱藏',
			width: 50,
			height: 16,
			button_width: 25
		});
		*/
		MainLangCode();
		$("#logo-alt").val((typeof(obj_lb[Lang][0].value) == "undefined") ? "" : obj_lb[Lang][0].value.alt);
     });
    </script>
    <!-- END: PAGE SCRIPTS -->
	<script type="text/javascript">
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
			
			delRealImage(getLocation(obj_lb.en[0].value.url).pathname);
			var _data = data;
			$.each(data.files, function (index, file) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('.show-img').attr('src', e.target.result);
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
					saveImage(file);
					
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
		var Lang = "<?php echo $Lang;?>";
		var type = "<?php echo $key;?>";
		var obj_lb = <?php echo json_encode($widget);?>;
		
		
		function saveImage()
		{
			( typeof(obj_lb[Lang]) == "undefined") ? obj_lb[Lang] = [] : '';
			( typeof(obj_lb[Lang][0]) == "undefined") ? obj_lb[Lang][0] = {} : '';
			//obj_lb[Lang][0] = obj_lb[Lang][0].value;
			
			var widgetData = {};
			widgetData[Lang] = [];
			widgetData[Lang][0] = {
				"value" : obj_lb[Lang][0].value,
				"langCode" : Lang
			};
			var postData = {
				"type" 		: "LogoBanner",
				"widgetData"	: widgetData
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
	</script>
</body>

</html>