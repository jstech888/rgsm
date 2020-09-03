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
#cke_1_top {
	width: 100%;
}

.draggable {
  position: absolute;
  border: 1px solid #000;
  width: 200px;  
  color: #000;
  cursor: pointer;
  background: #fff;
}
#draggable-Start {
  left: 100px;
  top: 0;
}
#draggable-d-Start {
  left: 100px;
  top: 50px;
}

#draggable-End {
  left: 100px;
  top: 500px;
}
#draggable-d-End {
  left: 100px;
  top: 550px;
}


</style>
    <!-- Start: Main -->
    <div id="main">
        <!-- Start: Header -->
		<?php
			include_once(dirname(dirname(dirname(__FILE__)))."/widget/headerBar.php");
		?>
        <!-- End: Header -->

        <!-- Start: Sidebar -->
		<?php
			include_once(dirname(dirname(dirname(__FILE__)))."/widget/MainMenu.php");
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
                        <li class="crumb-active">
                            <a href="<?php echo base_url("/admin/widget/HomeSlider");?>"><?php echo $title;?></a>
                        </li>
                        <li class="crumb-active">
                            <a>編輯</a>
                        </li>
                        <li class="crumb-active">
                            <a></a>
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
							
								<div class="panel">
									<div class="panel-heading text-center">
										<div class="caption">
											編輯區塊
										</div>
									</div>
									<div class="panel-body">
									
							<!-- upload-prograss-bar -->
							<div id="upload-result" class="upload-progress" style="display:none;">
								<!-- The global progress bar -->
								<div id="upload-progress" class="progress" style="height: 5px;margin-bottom: 0;">
									<div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" style="width: 0%"></div>
								</div>
							</div>
							<!-- /upload-prograss-bar -->
								<div class="col-md-12 br-a br-light bg-light p15">
									<div class="row">
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
								<div class="col-md-12 br-a br-light bg-light dark va-t p10">
								<div id="animation-switcher" class="ph20">
									<div class="row">
										<div class="col-xs-12 img-block">
											<div class="draggable-block">
												<img src="<?php echo ( isset($widget["value"]["image"]["mediumUrl"]) ) ? $widget["value"]["image"]["mediumUrl"] : "";?>" id="bannerbkimg" class="show-img"/>											
												<div id="draggable-Start"   data-type="title" data-term="start" class="ui-widget-content draggable">
												  <p>標題動畫 起始處</p>
												</div>
												<div id="draggable-End"     data-type="title" data-term="end" class="ui-widget-content draggable">
												  <p>標題動畫 停止處</p>
												</div>
												<div id="draggable-d-Start" data-type="description" data-term="start" class="ui-widget-content draggable">
												  <p>短文動畫 起始處</p>
												</div>
												<div id="draggable-d-End"   data-type="description" data-term="end" class="ui-widget-content draggable">
												  <p>短文動畫 停止處</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								</div>
										<div class="col-sm-12" style="margin-bottom:15px;margin-top:15px;">
											<div class="form-group">
												<label for="inputTitle" class="col-xs-4 col-md-3 col-lg-1 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;">標題</label>
												<div class="col-xs-7 col-md-8 col-lg-10">
													<input type="text" id="inputTitle" class="form-control" onkeyup="saveTempData(this, 'title');" value="<?php echo isset($widget["value"]["caption"]["title"]) ? $widget["value"]["caption"]["title"] : "";?>">
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="col-sm-12" style="margin-bottom:15px;">
											<div class="form-group">
												<label for="inputDescription" class="col-xs-4 col-md-3 col-lg-1 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;">短文</label>
												<div class="col-xs-7 col-md-8 col-lg-10">
													<!-- <input type="text" id="inputDescription" class="form-control" onkeyup="saveTempData(this, 'description');" value="<?php echo isset($widget["value"]["caption"]["description"]) ? $widget["value"]["caption"]["description"] :"";?>"> -->
													
													<textarea name="ckeditor1" id="ckeditor1" rows="12">
														<?php echo isset($widget["value"]["caption"]["description"]) ? $widget["value"]["caption"]["description"] :"";?>
													</textarea>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								
								<div class="pull-right mt10">
									<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
										<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
										<span class="ladda-spinner"></span>
									</button>
									<a href="/admin/widget/HomeSlider" class="btn btn-default">返回</a>
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
	<script type="text/javascript" src="/admin/vendor/editors/ckfinder/ckfinder.js"></script>
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
		refer_uri = "/admin/widget/HomeSlider";
	
		function init_draggable_offset()
		{		
			var cntTop  = bkofs.top  + ( parseInt(obj_item.value.pos.title.start.top)  * h / 100 );
			var cntLeft = bkofs.left + ( parseInt(obj_item.value.pos.title.start.left) * w / 100 );
			$("#draggable-Start").offset({ top : cntTop, left : cntLeft});
			
			cntTop  = bkofs.top  + ( parseInt(obj_item.value.pos.title.end.top)  * h / 100 );
			cntLeft = bkofs.left + ( parseInt(obj_item.value.pos.title.end.left) * w / 100 );
			$("#draggable-End").offset({ top : cntTop, left : cntLeft});
			
			cntTop  = bkofs.top  + ( parseInt(obj_item.value.pos.description.start.top)  * h / 100 );
			cntLeft = bkofs.left + ( parseInt(obj_item.value.pos.description.start.left) * w / 100 );
			$("#draggable-d-Start").offset({ top : cntTop, left : cntLeft});
						
			cntTop  = bkofs.top  + ( parseInt(obj_item.value.pos.description.end.top)  * h / 100 );
			cntLeft = bkofs.left + ( parseInt(obj_item.value.pos.description.end.left) * w / 100 );
			$("#draggable-d-End").offset({ top : cntTop, left : cntLeft});				
		}
		
		var bannerbkimg = false;
		var offx, offy, w, h, isOverEl = false;
		
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();
			
			//$("#draggable-Start").draggable({ containment: "parent" });
			//$("#draggable-End").draggable({ containment: "parent" });
			
			editorContent = CKEDITOR.replace('ckeditor1', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: 	'/admin/vendor/editors/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl: 	'/admin/vendor/editors/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl: 		'/admin/vendor/editors/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: 	'/admin/vendor/editors/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl: 	'/admin/vendor/editors/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Flash',
                height: window.screen.height - 400 
            });

			for (var i in CKEDITOR.instances) {
				CKEDITOR.instances[i].on('change', function(evt) {
					var data = evt.editor.getData();
					( typeof(obj_item.value.caption) == "string" )?obj_item.value.caption={}:'';
					obj_item.value.caption.description = data;
				});
			}
			
			var Img = new Image(); 
			Img.onload = function (e) { 
				w = e.path[0].naturalWidth;
				h = e.path[0].naturalHeight;
				console.log("onload w/h:",w,h);
				init_draggable_offset();
			} 
			Img.src = "<?php echo $widget["value"]["image"]["mediumUrl"];?>"; 
			
			
			bkofs = $(".draggable-block").offset();
			
			
			if( typeof(obj_item.value.pos)  == "undefined" )
			{
				obj_item.value.pos = {
					"title" : {
						"start" : { "top" : 80, "left" : 5 },
						"end" : { "top" : 5, "left" : 5 }
					},
					"description" : {
						"start" : { "top" : 10, "left" : 80 },
						"end" : { "top" : 10, "left" : 5 }
					}
				};
			}
			
			$( ".draggable" ).draggable({
			  containment: ".show-img",
			  stop: function() {
				var offset = $(this).offset();
				
				
				var newLeft = Math.floor( ( ( offset.left - bkofs.left ) / w ) * 100 );
				var newTop  = Math.floor( ( ( offset.top  - bkofs.top  ) / h ) * 100 );
				$(this).offset();
				
				var type = $(this).attr("data-type");
				var term = $(this).attr("data-term");
				
				( typeof(obj_item.value["pos"]) != "object" ) ? obj_item.value["pos"] = {} : "";
				( typeof(obj_item.value["pos"][type]) != "object" ) ? obj_item.value["pos"][type] = {} : "";
				
				console.log("drag-stop-save:",{ top : newTop.toString(), left : newLeft.toString()});
				obj_item.value["pos"][type][term] = { top : newTop.toString(), left : newLeft.toString()};
				
			  }
			});
        });
    </script>
    <script type="text/javascript">
	var imageList = [];
	var sampleImage = $(".sample-image").clone().remove("sample-image");
	
	var cSortkey = 0;
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
			delete imageList;
			imageList = [];
			$("#upload-result").fadeIn(300);
			var _data = data;
			$(".image-list").remove();
			
			$.each(data.files, function (index, file) {
				var reader = new FileReader();
				var name =  file.name;
				reader.onload = function (e) {
					$(".img-block img").attr('src', e.target.result)
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
					//$(".show-name").eq(index).wrap(link);
					//$(".show-img").eq(index).data("object",JSON.stringify(file));					
					file['src'] 		= getLocation(file.url).pathname.replace(/\//,'');		
					
					delete obj_item.value.image;
					obj_item.value.image = file;
					cSortkey++;
				} else if (file.error) {
					var error = $('<span class="text-danger"/>').text(file.error);
					$(".show-name").append(error);
				}
			});
			setTimeout(function(){		
				new PNotify({
					title: data.message,
					text: '新增完成！',
					shadow: true,
					opacity: "0.75",
					type: "info",
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
				$("#upload-progress").fadeOut(500);
				setTimeout(function(){
					$('#upload-progress .progress-bar').css('width','0%');
					//location.reload();
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
	var obj_item 	= <?php echo json_encode($widget);?>;
	var menuItem 	= false;
	
	
	function saveTempData(self, key)
	{
		var data = $(self).val();
		( typeof(obj_item.value.caption) == "string" )?obj_item.value.caption={}:'';
		obj_item.value.caption[key] =  data;
	}
	
	function init_pagesave()
	{
		$('.page-save').click(function(e){
			e.preventDefault();
			
			var langCode = obj_item.langCode;
			var postData = {
				type  		: "HomeSlider",
				widgetData 	: [ [ obj_item ] ]
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
			
			l.stop();
			return false;
		});
	}
	
	$(function(){
		init_pagesave();
	});
	</script>
	
</body>
</html>