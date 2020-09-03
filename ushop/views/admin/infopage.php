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
.radio-custom {	
  display: inline-block;
  width: initial;
}
.img-layout {
  max-width: 120px;
  border: none;
  cursor:pointer;
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
                            <a href="<?php echo base_url("/admin/page/info/".$title);?>"><?php echo $title;?></a>
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
			<div style="display:none;">
				<input type="text" name="picture" value="<?php echo htmlspecialchars(json_encode($infopage[$Lang]['image']));?>">
			</div>
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
							<!-- 表頭圖示 -->
							<div class="row table-layout" id="modal-content">
								<div class="col-xs-4 br-a br-light bg-light p30">
									<div class="row">
										<div class="col-sm-12 text-center">
											<h5 class="text-muted mtn mb30">選擇表頭圖示</h5>
										</div>
										<div class="col-md-8 col-md-offset-2 text-center">
											<div class="btn btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>選擇照片</span>
												<!-- The file input field used as target for the file upload widget -->
												<input id="upload-image" type="file" name="files" >
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-8 br-a br-light bg-light dark va-t p10">
								<div id="animation-switcher" class="ph20">
									<div class="row">
										<div class="col-xs-12 text-center">
											<img src="<?php echo $infopage[$Lang]['image']['url'];?>" class="img-thumbnail show-img" style="max-width: 300px;"/>
										</div>
										<div class="col-xs-12 text-center">
											<span class="show-name"></span>
										</div>
									</div>
								</div>
								</div>
							</div>
							<!-- /表頭圖示 -->
							
							<div class="pull-right mt10">
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label">儲存</span>
									<span class="ladda-spinner"></span>
								</button>
							</div>
							
							<div class="tabs-menu main-langCode">
								<ul class="nav nav-tabs" role="tablist">
								<?php 
									$enActive = ( $Lang == "en" ) 		? " class=\"active\"" : "";
									$twActive = ( $Lang == "zh-hant" ) 	? " class=\"active\"" : "";
								?>
									<li role="presentation""<?php echo $enActive;?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab" data-langCode="en">英文</a></li>
									<li role="presentation""<?php echo $twActive;?>><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" data-langCode="zh-hant">繁體中文</a></li>
									<!-- <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" data-langCode="zh-hans">簡體中文</a></li> -->
								</ul>
							</div>
							
							<div class="tabs-content">
								<form class="form-horizontal mb20" role="form">
									<div class="form-group">
										<label for="pageTitle" class="col-lg-1 control-label" style="line-height:118px;">Layout</label>
										<div class="col-lg-11">
										<?php
											$layout_up 		= "checked";
											$layout_down 	= "";
											$layout_left 	= "";
											$layout_right 	= "";
											if(isset($infopage[$Lang]['layout']))
											{
												$layout_up 		= ($infopage[$Lang]['layout']=="up")?"checked":"";
												$layout_down 	= ($infopage[$Lang]['layout']=="down")?"checked":"";
												$layout_left 	= ($infopage[$Lang]['layout']=="left")?"checked":"";
												$layout_right 	= ($infopage[$Lang]['layout']=="right")?"checked":"";
												$layout_banner 	= ($infopage[$Lang]['layout']=="banner")?"checked":"";
											}
										?>
											<div class="radio-custom mt5">
                                                <input type="radio" id="radioLayout1" name="radioLayout" data-layout="up" <?php echo $layout_up;?> />
                                                <label for="radioLayout1"></label>
												<img src="/assets/back/layout3.png" class="img-thumbnail img-layout" target-id="#radioLayout1"/>
                                            </div>        
											<div class="radio-custom mt5">
                                                <input type="radio" id="radioLayout2" name="radioLayout" data-layout="down" <?php echo $layout_down;?>>
                                                <label for="radioLayout2"></label>
												<img src="/assets/back/layout4.png" class="img-thumbnail img-layout" target-id="#radioLayout2"/>
                                            </div>      
											<div class="radio-custom mt5">
                                                <input type="radio" id="radioLayout3" name="radioLayout" data-layout="left" <?php echo $layout_left;?>>
                                                <label for="radioLayout3"></label>
												<img src="/assets/back/layout2.png" class="img-thumbnail img-layout" target-id="#radioLayout3"/>
                                            </div>
											<div class="radio-custom mt5">
                                                <input type="radio" id="radioLayout4" name="radioLayout" data-layout="right" <?php echo $layout_right;?>>
                                                <label for="radioLayout4"></label>
												<img src="/assets/back/layout1.png" class="img-thumbnail img-layout" target-id="#radioLayout4"/>
                                            </div>
											<div class="radio-custom mt5">
                                                <input type="radio" id="radioLayout5" name="radioLayout" data-layout="banner" <?php echo $layout_banner;?>>
                                                <label for="radioLayout5"></label>
												<img src="/assets/back/layout5.png" class="img-thumbnail img-layout" target-id="#radioLayout5"/>
                                            </div>
										</div>            
									</div>                
									<div class="form-group">
										<label for="pageTitle" class="col-lg-1 control-label">顯示名稱</label>
										<div class="col-lg-11">
											<input type="text" id="pageTitle" class="form-control" placeholder="公司介紹別名" value="<?php echo $infopage[$Lang]['title'];?>">
										</div>
									</div>
								</form>
								
								<!-- ckeditor -->
								<textarea name="ckeditor1" id="ckeditor1" name="ckeditor1" rows="12">
								   <?php echo $infopage[$Lang]['content'];?>
								</textarea>
								
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

            // Turn off automatic editor initilization.
            // Used to prevent conflictions with multiple text 
            // editors being displayed on the same page.
            CKEDITOR.disableAutoInline = true;

            // Init Ckeditor
			editorContent = CKEDITOR.replace('ckeditor1', {
				toolbar: [
					['Source','-','Save','NewPage','Preview','-','Templates'],
				    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
				    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
				    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
				    '/',
				    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
					['NumberedList','BulletedList','-','ListStyle','-','Outdent','Indent','Blockquote'],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					['Link','Unlink','Anchor'],
					['Indent','Table','TableTools','ShowBlocks'],
					['Image'],
				    '/',
					['Format','FontSize','-','TextColor','BGColor']
				],
                height: 300
            });
            CKFinder.setupCKEditor( editorContent, '/admin/vendor/editors/ckfinder/');
			
			
			for (var i in CKEDITOR.instances) {
				CKEDITOR.instances[i].on('change', function(evt) {
					obj_infopage[Lang].content = evt.editor.getData();
					console.log(evt.editor.getData());
				});
			}
			/*
			$("input[type=radio]").switchButton({
				on_label: '顯示',
				off_label: '隱藏',
				width: 50,
				height: 16,
				button_width: 25
			});
			*/
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
					$("[name='picture']").val(JSON.stringify(file));
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
		var contentCKED		= "";
		
		$(function(){
						
			MainLangCode();
			
			$(".img-layout").each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(){
					var targeId = $(this).attr("target-id");
					$(targeId).get(0).click();
				});
			});
			
			contentCKED		= CKEDITOR.instances.ckeditor1;
			
			$("[name='radioLayout'").click(function(){
				var layout = $("[name='radioLayout']:checked").attr("data-layout");
				obj_infopage[Lang]['layout'] = layout;
			});	
			
			$("#pageTitle").keyup(function() {
				obj_infopage[Lang]['title']	= $(this).val();
			});
			
			
			$('.page-save').click(function(e){
				e.preventDefault();
				var postData = {
					key 		: key,
					image		: JSON.parse($("[name=\"picture\"]").val()),
					infoData	: obj_infopage
				};
				
				var l = Ladda.create(this);
				l.start();
				$.ajax({
					url: "<?php echo base_url('/page/save');?>",
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