<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
.ui-spinner-button {
  margin-top: -4px;
  margin-bottom: 5px;
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
  width:100%;
}
.video-icon.youtube {
  background-image: url('/assets/slidervideo/youtube.png');
}
.video-icon.vimeo {
  background-image: url('/assets/slidervideo/vimeo.png');
}
.video-icon.youku {
  background-image: url('/assets/slidervideo/youku.png');
}
.video-icon.tudou {
  background-image: url('/assets/slidervideo/tudou.png');
}
.btn-video-icon {
  padding: 0 12px;
  width: 36px;
  height: 36px;
}
.video-icon {
  background-size: cover;
  width: 32px;
  height: 32px;
  position: absolute;
  top: 5px;
  margin-left: -11px;
}
.btn-video-icon .glyphicon {
  top: 8px;
  margin-left: -35px;
}

.btn-video-icon:hover 
{
  filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5
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
							<div class="row">
								<div class="form-group">
									<label for="inputEffect" class="col-lg-3 control-label">過場特效</label>
									<div class="col-lg-4">
									<?php 
										$arr_effect = array(
											"random" => "隨機",
											"slide-left" => "往左滑入",
											"slide-right" => "往右滑入",
											"slide-top" => "往上滑入",
											"slide-bottom" => "往下滑入",
											"split" => "水平切開淡出",
											"split3d" => "橫向切開 3D 飛出",
											"door" => "垂直切開淡出"
										);
									?>
										<select id="inputEffect" class="form-control" onchange="saveTempData('transition',this);">
										<?php 
											foreach( $arr_effect AS $k=>$eft )
											{
												$isSel = ( $k == $effect["transition"] ) ? "selected" : "";
												echo "<option value=\"{$k}\" {$isSel}>{$eft}</option>";
											}
										?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="inputEffect" class="col-lg-3 control-label">區塊固定寬度</label>
									<div class="col-lg-4">
										<div class="input-group">
											<input class="form-control text-right" value="<?php echo isset($effect["width"])?$effect["width"]:"";?>" onchange="saveTempData('width',this);" />
											<span class="input-group-addon">PX</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="inputEffect" class="col-lg-3 control-label">區塊固定高度</label>
									<div class="col-lg-4">
										<div class="input-group">
											<input class="form-control text-right" value="<?php echo isset($effect["height"])?$effect["height"]:"";?>" onchange="saveTempData('height',this);" />
											<span class="input-group-addon">PX</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="inputEffect" class="col-lg-3 control-label">停留時間</label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
											<input class="form-control ui-spinner-input spinner-element" value="<?php echo isset($effect["duration"])?$effect["duration"]:"";?>" onchange="saveTempData('duration',this);" />
                                        </div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="inputEffect" class="col-lg-3 control-label">轉換時間</label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
											<input class="form-control ui-spinner-input spinner-element" value="<?php echo isset($effect["transitionSpeed"])?$effect["transitionSpeed"]:"";?>" onchange="saveTempData('transitionSpeed',this);" />
                                        </div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="form-group">
									<label for="inputEffect" class="col-lg-3 control-label">導航點底色</label>
									<div class="col-lg-4">
										<div class="input-group colorpicker-component colorpicker-element cursor">
											<span class="input-group-addon"><i></i>
											</span>
											<input type="text" value="<?php echo isset($effect["navigationColor"])?$effect["navigationColor"]:"";?>" onchange="saveTempData('navigationColor',this);" class="form-control"  />
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="inputEffect" class="col-lg-3 control-label">導航點滑鼠移過變色</label>
									<div class="col-lg-4">
										<div class="input-group colorpicker-component colorpicker-element cursor">
											<span class="input-group-addon"><i></i>
											</span>
											<input type="text" value="<?php echo isset($effect["navigationHoverColor"])?$effect["navigationHoverColor"]:"";?>" onchange="saveTempData('navigationHoverColor',this);" class="form-control"  />
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="inputEffect" class="col-lg-3 control-label">導航點當前色點變色</label>
									<div class="col-lg-4">
										<div class="input-group colorpicker-component colorpicker-element cursor">
											<span class="input-group-addon"><i></i>
											</span>
											<input type="text" value="<?php echo isset($effect["navigationHighlightColor"])?$effect["navigationHighlightColor"]:"";?>" onchange="saveTempData('navigationHighlightColor',this);" class="form-control"  />
										</div>
									</div>
								</div>
							</div>
							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul>
							</div>
							<div class="tabs-content main-tab-content">
							
								<!-- 預覽結果 
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
												<iframe id="preview-widget" class="embed-responsive-item" src="/view/show/activitySlider?lang=<?php echo $Lang;?>"></iframe>
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
												<a class="btn btn-success" style="vertical-align: top;"  onclick="selectMediaStack();">
													<i class="glyphicon glyphicon-plus"></i>
													<span>新增</span>
												</a>
												<a class="btn btn-default btn-video-icon"  onclick="addVideo();">
													<div class="video-icon youtube"></div>
												</a>
												<a class="btn btn-default btn-video-icon"  onclick="addVimeo();">
													<div class="video-icon vimeo"></div>
												</a>
												<a class="btn btn-default btn-video-icon"  onclick="addYouku();">
													<div class="video-icon youku"></div>
												</a>
												<a class="btn btn-default btn-video-icon"  onclick="addTudou();">
													<div class="video-icon tudou"></div>
												</a>
											</div>
										</div>
									</div>
									<div class="panel-body">
									
									<div class="dd mb35" id="nestable">
										<ol class="dd-list">
									<?php
										( !isset( $widget[$Lang] )  ) ? $widget[$Lang] = array() : "";
										foreach( $widget[$Lang] AS $k=>&$slider )
										{
									?>
											<li class="dd-item sample-item" data-id="<?php echo $slider['sortKey'];?>" data-item-id="<?php echo $slider['id'];?>">
												<div class="dd-handle" data-name="title"></div>
												<div class="dd-content">
													<div class="media">
														<span class="text-warning pull-right fs11 fw600" data-name="type" ></span>
														<div class="dd-handle media-left">
															<h2 class="glyphicons glyphicons-picture" data-name="type-icon"></h2>
														</div>
														<div class="media-body" data-name="content">
														<?php 
															if( $slider['value']["type"] == "image" )
															{
														?>
															<div class="row">
																<div class="col-md-4">
																	<img height="120px" class="img-responsive" src="<?php echo (isset($slider['value']["image"])) ? $slider['value']["image"]["url"]:"";?>" />
																</div>
																<div class="col-md-4" data-name="alt">																
																	 <span><?php echo (isset($slider['value']["alt"])) ? $slider['value']["alt"]:"";?></span>
																</div>
																<div class="col-md-4" data-name="caption">
																	<?php echo (isset($slider['value']["caption"])) ? $slider['value']["caption"]:"";?>
																</div>
															</div>
														<?php
															}
															else if( $slider['value']["type"] == "youtube" )
															{
														?>
															<div class="row">
																<div class="col-md-8">																
																	<iframe width="400px" height="300px" src="https://www.youtube.com/embed/<?php echo $slider["value"]["videoId"];?>"></iframe>
																</div>
															</div>
														<?php
															}
															else if( $slider['value']["type"] == "vimeo" )
															{
														?>
															<div class="row">
																<div class="col-md-8">																
																	<iframe width="400px" height="300px" src="//player.vimeo.com/video/<?php echo $slider["value"]["videoId"];?>"></iframe>
																</div>
															</div>
														<?php
															}
															else if( $slider['value']["type"] == "youku" )
															{
														?>
															<div class="row">
																<div class="col-md-8">																
																	<iframe width="400px" height="300px" src="http://player.youku.com/embed/<?php echo $slider["value"]["videoId"];?>"></iframe>
																</div>
															</div>
														<?php
															}
															else if( $slider['value']["type"] == "tudou" )
															{
														?>
															<div class="row">
																<div class="col-md-8">				
																	<iframe src="http://www.tudou.com/programs/view/html5embed.action?<?php echo $slider["value"]["videoId"];?>" allowtransparency="true" allowfullscreen="true" 			allowfullscreenInteractive="true" scrolling="no" border="0" frameborder="0" style="width:480px;height:400px;"></iframe>
																</div>
															</div>
														<?php
															}
														?>
														</div>
													</div>
													<div class="dd-edit pull-right">
														<?php 
															if( $slider['value']["type"] == "image" )
															{
														?>
														<a href="/admin/widget/edit/HomeSlider?id=<?php echo $slider['id'];?>" class="dd-edit-config config">
															<i class="fa fa-pencil"></i>
														</a>
														<?php
															}
														?>
														<a onclick="delWidget('<?php echo $slider['id'];?>')" class="dd-edit-remove config">
															<i class="fa fa-times "></i>
														</a>
													</div>
												</div>
											</li>
									<?php
										}
									?>
											
										</ol>
									</div>
									
								
									
									</div>
								</div>
								
								<div class="pull-right mt10">
									<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
										<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
										<span class="ladda-spinner"></span>
									</button>
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
    <script type="text/javascript" src="/admin/vendor/editors/ckfinder/ckfinder.js"></script>
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
	
    <script type="text/javascript" src="/admin/theme/vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>

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
			
			$('.colorpicker-element').colorpicker().on('changeColor.colorpicker', function(event){
				$(event.currentTarget).parent().find("input").change();
			});
			$(".spinner-element").spinner({
                min: 0,
                max: 10000,
                step: 500,
                start: 500,
				change: function(event, ui) {
					$(this).change();
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
					var newImage = sampleImage.clone();
					newImage.find("img").attr('src', e.target.result);
					$("#editor-slider .col-xs-12").append(newImage);
						
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
					
					var imageRow = {
						'type'	   : 'activitySlider',
						'value'    : {"image":file,"caption":""},
						'sortKey'  : cSortkey,
						'id'	   : '-1',
						'langCode' : $(".main-langCode li.active a").attr("data-langCode")
					};
					imageList.push(imageRow);
					
					$.ajax({
						url: "/widget/createWidget",
						async:true,
						cache:false,
						method:"POST",
						data:{
							type	: "activitySlider",
							newItem : imageList
						},
						success:function(data, status, xhr){
							if( data.result )
							{
								obj_item = data.result;
								console.log(obj_item);
							}
						},
						error:function(xhr, stauts, err){
							//console.log(xhr, stauts, err);
						}
					});
					cSortkey++;
				} else if (file.error) {
					var error = $('<span class="text-danger"/>').text(file.error);
					$(".show-name").append(error);
				}
			});
			setTimeout(function(){		
				PM.show({title: data.message, text: '新增完成！',type: "info"});
				$("#upload-progress").fadeOut(500);
				setTimeout(function(){
					$('#upload-progress .progress-bar').css('width','0%');
					location.reload();
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
	var preview_src = "<?php echo base_url("view/show/WHSlider");?>";
	var obj_item 	= <?php echo json_encode($widget);?>;
	var Lang		= '<?php echo $Lang;?>';
	var effect		= <?php echo json_encode($effect);?>;
	var menuItem 	= false;
	
	var ajaxData = [];
	
	function addVideo()
	{
		var videoKey = prompt("請填入Youtube影片ID");
		if( videoKey != null )
		{
			var imageRow = {
				'type'	   : 'activitySlider',
				'value'    : {"videoId":videoKey,"type":"youtube"},
				'sortKey'  : $(".dd-item").length,
				'id'	   : '-1',
				'langCode' : Lang
			};
			imageList.push(imageRow);
			
			$.ajax({
				url: "/widget/createWidget",
				async:true,
				cache:false,
				method:"POST",
				data:{
					type	: "activitySlider",
					newItem : imageList
				},
				success:function(data, status, xhr){
					if( data.result )
					{
						obj_item = data.result;
						PM.show({ title: data.message, text: '儲存完成！', type: "info" });
						setTimeout(function(){
							location.reload();
						},500);
					}
					else
					{
						PM.erro({text:"錯誤"});
					}
				},
				error:function(xhr, stauts, err){ 
					//PM.erro(); 
						PM.show({ title: "", text: '儲存完成！', type: "info" });
						setTimeout(function(){
							location.reload();
						},500);
				}
			});
		}
	}
	
	function addVimeo()
	{
		var videoKey = prompt("請填入Vimeoe影片ID");
		if( videoKey != null )
		{
			var imageRow = {
				'type'	   : 'activitySlider',
				'value'    : {"videoId":videoKey,"type":"vimeo"},
				'sortKey'  : $(".dd-item").length,
				'id'	   : '-1',
				'langCode' : Lang
			};
			imageList.push(imageRow);
			
			$.ajax({
				url: "/widget/createWidget",
				async:true,
				cache:false,
				method:"POST",
				data:{
					type	: "activitySlider",
					newItem : imageList
				},
				success:function(data, status, xhr){
					if( data.result )
					{
						obj_item = data.result;
						PM.show({ title: data.message, text: '儲存完成！', type: "info" });
						setTimeout(function(){
							location.reload();
						},500);
					}
					else
					{
						PM.erro({text:"錯誤"});
					}
				},
				error:function(xhr, stauts, err){ 
					//PM.erro(); 
						PM.show({ title: "", text: '儲存完成！', type: "info" });
						setTimeout(function(){
							location.reload();
						},500);
				}
			});
		}
	}
	
	function addYouku()
	{
		var videoKey = prompt("請填入 優酷影片ID");
		if( videoKey != null )
		{
			var imageRow = {
				'type'	   : 'activitySlider',
				'value'    : {"videoId":videoKey,"type":"youku"},
				'sortKey'  : $(".dd-item").length,
				'id'	   : '-1',
				'langCode' : Lang
			};
			imageList.push(imageRow);
			
			$.ajax({
				url: "/widget/createWidget",
				async:true,
				cache:false,
				method:"POST",
				data:{
					type	: "activitySlider",
					newItem : imageList
				},
				success:function(data, status, xhr){
					if( data.result )
					{
						obj_item = data.result;
						PM.show({ title: data.message, text: '儲存完成！', type: "info" });
						setTimeout(function(){
							location.reload();
						},500);
					}
					else
					{
						PM.erro({text:"錯誤"});
					}
				},
				error:function(xhr, stauts, err){ 
					//PM.erro(); 
						PM.show({ title: "", text: '儲存完成！', type: "info" });
						setTimeout(function(){
							location.reload();
						},500);
				}
			});
		}
	}
	
	function addTudou()
	{
		var videoKey = prompt("請填入 土豆影片ID");
		if( videoKey != null )
		{
			var imageRow = {
				'type'	   : 'activitySlider',
				'value'    : {"videoId":videoKey,"type":"tudou"},
				'sortKey'  : $(".dd-item").length,
				'id'	   : '-1',
				'langCode' : Lang
			};
			imageList.push(imageRow);
			
			$.ajax({
				url: "/widget/createWidget",
				async:true,
				cache:false,
				method:"POST",
				data:{
					type	: "activitySlider",
					newItem : imageList
				},
				success:function(data, status, xhr){
					if( data.result )
					{
						obj_item = data.result;
						PM.show({ title: data.message, text: '儲存完成！', type: "info" });
						setTimeout(function(){
							location.reload();
						},500);
					}
					else
					{
						PM.erro({text:"錯誤"});
					}
				},
				error:function(xhr, stauts, err){ 
					//PM.erro(); 
						PM.show({ title: "", text: '儲存完成！', type: "info" });
						setTimeout(function(){
							location.reload();
						},500);
				}
			});
		}
	}
	
	function saveTempData(tag, self)
	{
		var data = $(self).val();
		effect[tag] = data;
	}
	
	function delWidget(id)
	{	
		if(confirm("確定刪除？"))
		{
			$.ajax({
				url: "/widget/delete",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"id"   : [id],
					"type" : "activitySlider"
				},
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'刪除完成！':"刪除失敗！";
					PM.show({title:data.message,type:type,text:text});
					setTimeout(function(){
						//location.reload();
					},2000);
					
				},
				error:function(xhr, stauts, err){
					//PM.erro();
							PM.show({ title: "", text: '儲存完成！', type: "info" });
							setTimeout(function(){
								location.reload();
							},500);
				}
			});
					
		}
	}

	function init_pagesave()
	{
		$('.page-save').click(function(e){
			e.preventDefault();
			var postData = {
				"sortkey" : {
					"itemData" : ajaxData
				},
				"effect" : {
					"key"	: "ActSlider-Effect",
					"value" : effect
				}
			};
			var l = Ladda.create(this);
			l.start();
			
			$.ajax({
				url: "/widget/sortkey/activitySlider",
				async:true,
				cache:false,
				method:"POST",
				data:postData,
				success:function(data, status, xhr){
					if(data.result)
					{
						obj_item = data.result;
						init_menuItem();						
					}
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'儲存完成！':"儲存失敗！";
					PM.show({title:data.message,text:text,type:type});
				},
				error:function(xhr, stauts, err){
					PM.erro();
				}
			}).always(function() { l.stop(); });
			
			l.stop();
			return false;
		});
	}
	
	function init_MainLangCodeSwitch(){
		$(".main-langCode li a").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(e){
				location.href = "/admin/widget/activitySlider?lang="+$(this).attr("data-langCode");
			});
		});
	}
	
	function selectMediaStack()
	{
		MediaStack.popup({
			selectActionFunction : function(e){
				var file = MediaStack.convertFileObject(e);
				//saveImage(file);
				//$(".show-img").attr("src",file.url);
				//obj_lb[Lang][0].value = file;
				var imageRow = {
					'type'	   : 'activitySlider',
					'value'    : {"image":file,"caption":"","alt":"","type":"image"},
					'sortKey'  : $(".dd-item").length,
					'id'	   : '-1',
					'langCode' : Lang
				};
				imageList.push(imageRow);
				
				$.ajax({
					url: "/widget/createWidget",
					async:true,
					cache:false,
					method:"POST",
					data:{
						type	: "activitySlider",
						newItem : imageList
					},
					success:function(data, status, xhr){
						if( data.result )
						{
							obj_item = data.result;
							PM.show({ title: data.message, text: '儲存完成！', type: "info" });
							setTimeout(function(){
								location.reload();
							},500);
						}
						else
						{
							PM.erro({text:"錯誤"});
						}
					},
					error:function(xhr, stauts, err){ 
						//PM.erro(); 
							PM.show({ title: "", text: '儲存完成！', type: "info" });
							setTimeout(function(){
								location.reload();
							},500);
					}
				});
			}
		});
	}
	
	$(function(){
			
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
			
		init_MainLangCodeSwitch();
		
		pageReload();
		
		init_pagesave();
		
		cSortkey = $(".dd-item").length;
	});
	</script>
	
</body>
</html>