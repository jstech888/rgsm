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
</style>
<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">


    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
		<?php
			include_once(dirname(__FILE__)."/widget/headerBar.php");
		?>
        <!-- End: Header -->

        <!-- Start: Sidebar -->
		<?php
			include_once(dirname(__FILE__)."/widget/MainMenu.php");
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
							
							<div class="tabs-menu main-langCode">
								<ul class="nav nav-tabs" role="tablist">
								
								<?php 
									$enActive = ( $Lang == "en" ) 		? " class=\"active\"" : "";
									$twActive = ( $Lang == "zh-hant" ) 	? " class=\"active\"" : "";
								?>
									<li role="presentation"<?php echo $enActive;?>><a href="#home" 		aria-controls="home" 		role="tab" data-toggle="tab" data-langCode="en">英文</a></li>
									<li role="presentation"<?php echo $twActive;?>><a href="#profile" 	aria-controls="profile" 	role="tab" data-toggle="tab" data-langCode="zh-hant">繁體中文</a></li>
								</ul>
								
								<div class="pull-right" style="margin-top: -55px;">
									<div class="btn btn-success fileinput-button">
										<i class="glyphicon glyphicon-plus"></i>
										<span>選擇照片</span>
										<!-- The file input field used as target for the file upload widget -->
										<input id="upload-image" type="file" name="files" >
									</div>
								</div>
								
							</div>
							
							<div class="tabs-content">
							
								<div class="dd mb35" id="nestable">
									<ol class="dd-list">
									<?php
									$infopage[$Lang]["content"] = json_decode($infopage[$Lang]["content"],true);
									if( is_array($infopage[$Lang]["content"]) )
									{
										foreach($infopage[$Lang]["content"] AS $k=>$item )
										{
									?>
										<li class="dd-item sample-item" data-id="<?php echo $k;?>" data-item-id="<?php echo $k;?>">
											<div class="dd-handle" data-name="title"></div>
											<div class="dd-content">
												<div class="media">
													<span class="text-warning pull-right fs11 fw600" data-name="type" ></span>
													<div class="dd-handle media-left">
														<!-- <h2 class="glyphicons  glyphicons-picture" data-name="type-icon"></h2> -->
														<img src="<?php echo $item["banner"]["url"];?>" class="img-responsive" style="width:120px;margin:0 auto;"/>
													</div>
													<div class="media-body" data-name="content">
														<div class="col-md-6">
															<h2>標題：<?php echo $item["title"];?></h2>
															<span>內文：<?php echo $item["description"];?></span>
														</div>
														<div class="col-md-6">
															<span>APP鏈結</span>
															<ul class="list-unstyled">
															<?php 
																foreach( $item["appbtn"] AS $type=>$btn )
																{
																	if( !empty($btn) )
																	{
															?>
																	<li><a class="btn btn-info btn-xs" href="<?php echo $btn;?>"><?php echo strtoupper($type);?></a></li>
															<?php
																	}
																}
															?>									 
															</ul>
														</div>														
													</div>
												</div>
												<div class="dd-edit pull-right">
													<a class="dd-edit-change config" href="/admin/page/edit/appdownload?id=<?php echo $k;?>">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="dd-edit-remove config" onclick="delBannerObj('<?php echo $k;?>');">
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
							
							<div class="pull-right mt10">
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label">儲存</span>
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
			/*
			delRealImage(getLocation(obj_lb.en[0].value.url).pathname);
			var _data = data;
			$.each(data.files, function (index, file) {
				var reader = new FileReader();
				reader.onload = function (e) {
					//$('.show-img').attr('src', e.target.result);
				}
				reader.readAsDataURL(file);
			});
			*/
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
	
	function saveImage(file)
	{
		if(typeof(obj_infopage[Lang].content) == "string" ){
			obj_infopage[Lang].content = [{"banner":file,"title":"","description":"","appbtn":{"android":"","apple":"","pc":""}}];
		}
		else {
			obj_infopage[Lang].content.push({"banner":file,"title":"","description":"","appbtn":{"android":"","apple":"","pc":""}});
		}
			
		var postData = {
			key 		: "appdownload",
			infoData	: obj_infopage
		};
		
		$.ajax({
			url: "/admin/page/save_batch",
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
				setTimeout(function(){
				  location.reload();
				},1000);
			},
			error:function(xhr, stauts, err){
				//console.log(xhr, stauts, err);
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
	<script type="text/javascript">
		var key				= "<?php echo $title;?>";
		var obj_infopage  	= <?php echo json_encode($infopage);?>;
		var Lang			= "<?php echo $Lang;?>";
		var contentCKED		= "";
		
		
		function delBannerObj(idk)
		{
			delete newContent;
			var newContent = [];
			for( var k in obj_infopage[Lang].content )
			{
				if(idk != k)
				{
					newContent.push(obj_infopage[Lang].content[k]);
				}
			}
			delete obj_infopage[Lang].content;
			obj_infopage[Lang].content = [];
			obj_infopage[Lang].content = newContent;
			
			$('.page-save').get(0).click();
		}
		
		$(function(){
			
            $('#nestable').nestable();
			$('#nestable').on("change",function(e){
				delete newContent;
				var newContent = [];
				var list   	= e.length ? e : $(e.target);
				var	raw		= list.nestable('serialize');	
				var cnt		= 0;
				for( var k in raw )
				{
					newContent[cnt] = obj_infopage[Lang].content[raw[k]['itemId']];
					cnt++;
				}
				delete obj_infopage[Lang].content;
				obj_infopage[Lang].content = [];
				obj_infopage[Lang].content = newContent;
				
			});
			
			
			MainLangCode();
		
			/*
			for( var k in obj_infopage )
			{
				(typeof(obj_infopage[k].content) == "string" )? obj_infopage[k].content = {"banner":"","title":"","description":"","appbtn":{"android":"","apple":"","pc":""}} : "";
			} 
			*/
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
						
						setTimeout(function(){
						  location.reload();
						},1000);
					},
					error:function(xhr, stauts, err){
						//console.log(xhr, stauts, err);
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