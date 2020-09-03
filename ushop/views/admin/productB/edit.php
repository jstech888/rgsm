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
.main-langCode li,
.main-langCode li {
	cursor: pointer;
}

.img-container {
  display: inline-block !important;
  padding: 5px;
  cursor: pointer;
  max-width: 110px;
}
.img-container img:hover {
  border-color: #000;
}

.btn-img-remove {
  width: 100px;
  background: rgba(0,0,0,0.6);
  color: #fff;
  position: absolute;
  margin-top: -20px;
  display: none;
}

.radio-custom {	
  display: inline-block;
  width: initial;
}
.img-layout {
  max-width: 100px;
  border: none;
  cursor:pointer;
}
.dd-item.active {
  border: 3px dashed #70CA63;
}
.dd-item.active .dd-handle {
  background: #70CA63;
}
.dd-item.active .media-left {
  background: #70CA63;
  color: #fff;
}
.video-list tr.active {	
  border: 3px dashed #F6BB42;
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
                            <a>產品管理</a>
                        </li>
                        <li class="crumb-active">
                            <a>產品編輯</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400"></h3>
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
									
								
								
										<div class="col-sm-12 mt15">
											<div class="pull-right">
												<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
													<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
													<span class="ladda-spinner"></span>
												</button>
												<a class="btn btn-default" href="/admin/product/listTableB">返回</a>
											</div>
											<div class="clearfix"></div>
										</div>
										
										
								
										<div class="col-sm-12 mt15" style="margin-bottom:15px;">
											<div class="form-group">
												<label for="product-key" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 15px;margin-bottom: 0;text-align: right;">SEO 網址搜索名稱</label>
												<div class="col-xs-7 col-md-8 col-lg-9">
													<input type="text" id="product-key" class="form-control globalInput" placeholder="" value="<?php echo $data_price['priceKey']?>">
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										
										
							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist">
								<?php 
									$enActive = ( $Lang == "en" ) 		? " class=\"active\"" : "";
									$twActive = ( $Lang == "zh-hant" ) 	? " class=\"active\"" : "";
									$cnActive = ( $Lang == "zh-hans" ) 	? " class=\"active\"" : "";
								?>
									<li role="presentation"<?php echo $enActive;?>><a aria-controls="home" 		role="tab" data-toggle="tab" data-langCode="en">英文</a></li>
									<li role="presentation"<?php echo $twActive;?>><a aria-controls="profile" 	role="tab" data-toggle="tab" data-langCode="zh-hant">繁體中文</a></li>
									<!-- <li role="presentation"><a aria-controls="messages" 	role="tab" data-toggle="tab" data-langCode="zh-hans">簡體中文</a></li> -->
								</ul>
							</div>
							<div class="tabs-content main-tab-content">
							
										<div class="panel panel-info panel-border top">
											<div class="panel-heading">
												<span class="panel-title">名稱</span>
											</div>
											<div class="panel-body">
												<div class="col-sm-12" style="margin-bottom:15px;">
													<input type="text" id="product-name" class="form-control globalInput" placeholder="" value="<?php echo $data_detail[$Lang]['name']?>">
													<div class="clearfix"></div>
												</div>
												<div class="clearfix"></div>
											</div>									
										</div>
										<div class="panel panel-info panel-border top">
											<div class="panel-heading">
												<span class="panel-title">SPEC</span>
											</div>
											<div class="panel-body">
												<div class="col-sm-12" style="margin-bottom:15px;">
													<textarea name="ckeditor2" id="ckeditor2" rows="12" class="form-control"><?php echo (isset($data_detail[$Lang]["value"]["spec"]))?$data_detail[$Lang]["value"]["spec"]:""; ?></textarea>
													<div class="clearfix"></div>
												</div>
												<div class="clearfix"></div>
											</div>									
										</div>
										<div class="panel panel-info panel-border top">
											<div class="panel-heading">
												<span class="panel-title">VIDEO</span>
											</div>
											<div class="panel-body admin-form theme-primary">
												<div class="col-sm-12 mb30">
													<div class="panel" id="spy3">
														<div class="panel-heading">
															<span class="panel-title">
																<span class="glyphicons glyphicons-table"></span>VIDEO 清單</span>
														</div>
														<div class="panel-body pn">
															<table class="table table-hover video-list">
																<thead>
																	<tr>
																		<th>#</th>
																		<th>Video</th>
																		<th>Control</th>
																	</tr>
																</thead>
																<tbody>
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="clearfix"></div>
												<div class="panel panel-default panel-border top" id="video-editor">
													<div class="panel-heading">
														<span class="panel-title">VIDEO 編輯器</span>
													</div>
													<div class="panel-body">
														<div class="admin-form theme-primary">
															<div class="col-sm-12">
																<div class="section">
																	<label class="field">
																		<input type="text" name="videoTitle" id="videoTitle" class="gui-input" placeholder="影片標題">
																	</label>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="section">
																	<label class="field">
																		<textarea class="gui-textarea" id="videoDesc" name="videoDesc" placeholder="影片內文"></textarea>
																	</label>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="section">
																	<label class="field prepend-icon">
																		<textarea class="gui-textarea" id="videoScript" name="videoScript" placeholder="<iframe></iframe>"></textarea>
																		<label for="videoScript" class="field-icon"><i class="fa fa-comments"></i></label>
																		<span class="input-footer">貼入 影片分享的嵌入Script片段</span>
																	</label>
																</div>
															</div>
															<div class="clearfix"></div>
														</div>
													</div>
													<div class="panel-footer">
														<div class="pull-right">
															<a class="btn btn-info btn-add" onclick="addVideo();">新增</a>
															<a class="btn btn-warning btn-edit" style="display:none;" onclick="saveVideo();">儲存</a>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>									
										</div>

										<div class="panel panel-info panel-border top">
											<div class="panel-heading">
												<span class="panel-title">頁面區塊</span>
											</div>
											<div class="panel-body">
												<div class="dd mb35" id="nestable">
													<ol class="dd-list"></ol>
												</div>	
											</div>
										</div>
														
										
										<!-- upload-prograss-bar -->
										<div id="upload-result" class="upload-progress" style="display:none;">
											<!-- The global progress bar -->
											<div id="upload-progress" class="progress" style="height: 5px;margin-bottom: 0;">
												<div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" style="width: 0%"></div>
											</div>
										</div>
										<!-- /upload-prograss-bar -->
										<div class="panel panel-info panel-border top" id="editor">
											<div class="panel-heading">
												<span class="panel-title">頁面 編輯區</span>
												<div class="widget-menu pull-right">
													<a class="btn btn-info btn-xs btn-new" onclick="addBlock();">新增</a>
													<a class="btn btn-warning btn-xs btn-edit" style="display:none;" onclick="saveBlock(this);">儲存</a>
												</div>
											</div>
											<div class="panel-body">
												<div class="col-sm-12 mb15">
													<div class="form-group">
														<label for="layout" class="col-xs-4 col-md-3 col-lg-2 control-label" style="  line-height: 121px;font-size: 15px;margin-bottom: 0;text-align: right;">Layout</label>
														<div class="col-xs-7 col-md-8 col-lg-9">
															<?php
																$layout_up 		= "checked";
																$layout_down 	= "";
																$layout_left 	= "";
																$layout_right 	= "";
																$layout_banner 	= "";
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
													<div class="clearfix"></div>
													<div class="form-group">
														<label for="product-src" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 15px;margin-bottom: 0;text-align: right;"></label>
														<div class="col-xs-7 col-md-8 col-lg-9 text-center">
															<div class="btn btn-success btn-block fileinput-button">
																<i class="glyphicon glyphicon-plus"></i>
																<span>選擇照片</span>
																<!-- The file input field used as target for the file upload widget -->
																<input id="upload-image" type="file" name="files" >
															</div>
														</div>
														<div class="clearfix"></div>
														<label for="product-src" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 15px;margin-bottom: 0;text-align: right;"></label>
														<div class="col-xs-7 col-md-8 col-lg-9" style="text-align: center; padding: 5px;">
															<img id="product-image" class="img-thumbnail image-product-remove" style="height:150px;">
														</div>
													</div>
													<div class="clearfix"></div>
													
													<div class="col-sm-12" style="margin-bottom:15px;">
														<textarea name="ckeditor1" id="ckeditor1" rows="12"></textarea>
														<div class="clearfix"></div>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="clearfix"></div>
											</div>									
										</div>
										
											
							</div>
									</div>
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
	
	<div style="display:none;">
		<ol>
			<li class="dd-item sample-dd-item" data-id="1" data-item-id="1">
				<div class="dd-handle"><h3 data-name="title"></h3></div>
				<div class="dd-content">
					<div class="media">
						<div class="dd-handle media-left">
							<h2 class="glyphicons glyphicon-pencil" data-name="type-icon"></h2>
						</div>
						<div class="media-body">
							<div class="col-md-4">
								<img data-name="layout" class="img-thumbnail" />
							</div>
							<div class="col-md-4">
								<img data-name="imgUrl" class="img-thumbnail" />
							</div>
							<div class="col-md-4" data-name="text"></div>						
						</div>
					</div>
					<div class="dd-edit pull-right">
						<a class="dd-edit-change config dd-block-edit"   data-item-id="1"><i class="fa fa-pencil"></i></a>
						<a class="dd-edit-remove config dd-block-remove" data-item-id="1"><i class="fa fa-times "></i></a>
					</div>
				</div>
			</li>
		</ol>
	</div>

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

	
    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>
    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
	
    <!-- Theme Javascript -->
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/demo.js"></script>
    <script type="text/javascript" src="/admin/js/page.js"></script>
	
	<!-- video control -->
    <script type="text/javascript">
		function initVideo()
		{
			(typeof(data_detail[Lang].value.video) == "undefined")?data_detail[Lang].value.video=[]:"";			
			$(".video-list tbody tr").remove();
			for( var k in data_detail[Lang].value.video )
			{
				var objVideo = data_detail[Lang].value.video[k];
				var newVideo = "<tr tragetId=\""+k+"\">"+
									"<td>" + (k+1) + "</td>" + 
									"<td>" + objVideo.title + "</td>" + 
									"<td>" + 
										"<a class=\"btn btn-warning btn-xs\" onclick=\"editVideo('" + k + "');\">編輯</a>" + 
										"<a class=\"btn btn-danger btn-xs\" onclick=\"delVideo('" + k + "');\">刪除</a>" +
									"</td>" + 
								"</tr>";
				$(".video-list tbody").append(newVideo);
			}
			clearEditor();
		}
		function clearEditor()
		{
			$("#videoTitle").val('');
			$("#videoDesc").val('');
			$("#videoScript").val('');
		}
		function addVideo()
		{
			var newVideo = {
				"title" : $("#videoTitle").val(),
				"desc"  : $("#videoDesc").val(),
				"link"  : $("#videoScript").val()
			};
			
			data_detail[Lang].value.video.push(newVideo);
			initVideo();
		}
		function delVideo(id)
		{
			var TempVideoList = [];
			for(var k in data_detail[Lang].value.video )
			{
				if( k != id ) 
				{
					TempVideoList.push(data_detail[Lang].value.video[k]);
				}
			}
			delete data_detail[Lang].value.video;
			data_detail[Lang].value.video = [];
			data_detail[Lang].value.video = TempVideoList;
			initVideo();
		}
		function editVideo(id)
		{
			var objVideo = data_detail[Lang].value.video[id];
			
			$("#videoTitle").val(objVideo.title);
			$("#videoDesc").val(objVideo.desc);
			$("#videoScript").val(objVideo.link);
			
			$("tr[tragetId='"+id+"']").addClass("active");
			$("#video-editor .btn-add").hide();
			$("#video-editor .btn-edit").show();
		}
		function saveVideo()
		{
			var id = $(".video-list tr.active").attr("tragetId");
			var newVideo = {
				"title" : $("#videoTitle").val(),
				"desc"  : $("#videoDesc").val(),
				"link"  : $("#videoScript").val()
			};
			
			data_detail[Lang].value.video[id] = newVideo;
			initVideo();
			
			$("tr[targeId='"+id+"']").removeClass("active");
			$("#video-editor .btn-add").show();
			$("#video-editor .btn-edit").hide();		
		}
		$(function(){
			initVideo();
		});
	</script>
	<!-- /video control -->
	
    <script type="text/javascript">
	
	
		var old_mainKey     = '<?php echo $data_product["detailKey"];?>';
		var data_product	= <?php echo json_encode($data_product);?>;
		var data_detail 	= <?php echo json_encode($data_detail);?>;
		var data_price 		= <?php echo json_encode($data_price);?>;
		var data_stock 		= <?php echo json_encode($data_stock);?>;
		var Lang			= '<?php echo $Lang;?>';
		
		var menuItem 	= false;
		
		var tempBlock = { "layout":"up", "image":{}, "text":"" };
		
		var tempBlockObj = {
			init: function()
			{
				tempBlock = { "layout":"up", "image":{}, "text":"" };
			},			
			getData: function()
			{
				tempBlock.layout = $('[name="radioLayout"]:checked').attr("data-layout");
				return tempBlock;
			},
			setData: function(obj)
			{
				delete tempBlock;
				tempBlock = { "layout":"up", "image":{}, "text":"" };
				tempBlock = jQuery.extend(true, {}, obj);
			}
		};
		
		var ddItem = false;
		function init_nestable()
		{			
		
			if(ddItem == false) 
			{
				ddItem = $(".sample-dd-item").clone();	
				$(".sample-dd-item").remove();
				ddItem.removeClass("sample-dd-item");
			}
			$('#nestable').nestable('destroy');
			$('#nestable ol').empty();
			
			for( var k in data_detail[Lang].value.UI )
			{
				var newItem = ddItem.clone();
				var block = data_detail[Lang].value.UI[k];
				
				newItem.attr("data-id",k);
				newItem.attr("data-item-id",k);
				var layoutImg = "1";
				switch(block.layout)
				{
					case "up":
						layoutImg = "3";
						break;
					case "down":
						layoutImg = "4";
						break;
					case "left":
						layoutImg = "2";
						break;
					case "right":
						layoutImg = "1";
						break;
					case "banner":
						layoutImg = "5";
						break;
				}
				newItem.find('[data-name="layout"]').attr('src','/assets/back/layout'+layoutImg+'.png');
				(typeof(block.image.thumbnailUrl)!="undefined")?newItem.find('[data-name="imgUrl"]').attr("src",block.image.url):'';
				newItem.find('[data-name="text"]').html(block.text);
				
				newItem.find('.dd-block-edit').attr("data-item-id",k);
				newItem.find('.dd-block-remove').attr("data-item-id",k);
				$('#nestable ol').append(newItem);
				
			}
			
			$('#nestable .dd-block-edit').each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(){
					var editItem = data_detail[Lang].value.UI[$(this).attr("data-item-id")];
					$(".dd-item").removeClass("active");
					$(".dd-item[data-item-id='"+$(this).attr("data-item-id")+"']").addClass("active");
					$("#editor .btn-edit").show();
					$("#editor .btn-new").hide();
					tempBlockObj.setData(editItem);
					
					
					$('#editor [name="radioLayout"]').prop("checked",false);
					$('#editor [name="radioLayout"]').attr("checked",false);					
					$('#editor [name="radioLayout"][data-layout="'+editItem.layout+'"]').prop("checked",true);
					$('#editor [name="radioLayout"][data-layout="'+editItem.layout+'"]').attr("checked",true);
					
					var imgURL = ( typeof(editItem.image.url) == "undefined" ) ? "" : editItem.image.url;
					$('#editor img#product-image').attr("src",imgURL);
					CKEDITOR.instances.ckeditor1.setData(editItem.text);
				});
			});
			$('#nestable .dd-block-remove').each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(){
					
					var newUI = [];
					for( var k in data_detail[Lang].value.UI )
					{
						if( k != $(this).attr("data-item-id") )
						{
							newUI.push(data_detail[Lang].value.UI[k]);
						}
					}
					delete data_detail[Lang].value.UI;
					data_detail[Lang].value.UI = [];
					data_detail[Lang].value.UI = newUI;		
					init_nestable();					
				});
			});
			
            $('#nestable').nestable();
			$('#nestable').on("change",function(e){
				var newUI = [];
				var list   	= e.length ? e : $(e.target);
				var	raw		= list.nestable('serialize');	
				for( var k in raw )
				{
					newUI.push(data_detail[Lang].value.UI[raw[k]['itemId']]);
				}
				
				delete data_detail[Lang].value.UI;
				data_detail[Lang].value.UI = [];
				data_detail[Lang].value.UI = newUI;	
			});
		}
		
		function saveBlock(self)
		{
			var id = $(".dd-item.active").attr("data-item-id");
			var newTempBlock = jQuery.extend(true, {}, tempBlockObj.getData());
			data_detail[Lang]['value']['UI'][id] = newTempBlock;
			
			init_nestable();
			
			$(self).hide();
			$("#editor .btn-new").show();
			
			tempBlockObj.init();
			
			$('#editor [name="radioLayout"]').prop("checked",false);
			$('#editor [name="radioLayout"]').attr("checked",false);					
			$('#editor [name="radioLayout"][data-layout="'+tempBlock.layout+'"]').prop("checked",true);
			$('#editor [name="radioLayout"][data-layout="'+tempBlock.layout+'"]').attr("checked",true);
			
			var imgURL = ( typeof(tempBlock.image.url) == "undefined" ) ? "" : tempBlock.image.url;
			$('#editor img#product-image').attr("src",imgURL);
			CKEDITOR.instances.ckeditor1.setData(tempBlock.text);
		}
		
		function addBlock()
		{
			var newTempBlock = jQuery.extend(true, {}, tempBlockObj.getData());
			data_detail[Lang]['value']['UI'].push(newTempBlock);
			
			init_nestable();
		}
		
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();

            CKEDITOR.disableAutoInline = true;

            // Init Ckeditor
            var editorContent = CKEDITOR.replace('ckeditor1', {
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
				    '/',
					['Format','FontSize','-','TextColor','BGColor']
				],
                height: 300 ,
                on: {
                    instanceReady: function(evt) {
                       // $('.cke').addClass('admin-skin cke-hide-bottom');
                    }
                }
            });
			
			
            CKFinder.setupCKEditor( editorContent, '/admin/vendor/editors/ckfinder/');
			
            var editorContent2 = CKEDITOR.replace('ckeditor2', {
				toolbar: [
					['Source','-','Save','NewPage','Preview','-','Templates'],
				    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
				    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
				    ['Button', 'ImageButton'],
				    '/',
				    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
					['NumberedList','BulletedList','-','liststyle','-','Outdent','Indent','Blockquote'],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					['Table','TableTools','ShowBlocks']
				],
                height: 300 ,
                on: {
                    instanceReady: function(evt) {
                       // $('.cke').addClass('admin-skin cke-hide-bottom');
                    }
                }
            });
            CKFinder.setupCKEditor( editorContent2, '/admin/vendor/editors/ckfinder/');
			
			for (var i in CKEDITOR.instances) {
				CKEDITOR.instances[i].on('change', function(evt) {
					if(evt.editor.name == "ckeditor1")
					{
						tempBlock.text = evt.editor.getData();	
					}
					if(evt.editor.name == "ckeditor2")
					{
						(typeof(data_detail[Lang].value.spec) == "undefined")?data_detail[Lang].value.spec="":'';
						data_detail[Lang].value.spec = evt.editor.getData();	
					}
				});
			}
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
        });
    </script>
    
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
			$("#upload-progress").show();
			$.each(data.files, function (index, file) {
				var reader = new FileReader();
				var name =  file.name;
				reader.onload = function (e) {
					$("#product-image").attr("src", e.target.result).show();
				}

				tempBlock.file = reader.readAsDataURL(file);
			});
		}).on('fileuploadprogressall', function (e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#upload-progress .progress-bar').css( 'width', progress + '%' );
		}).on('fileuploaddone', function (e, data) {
			
			$.each(data.result.files, function (index, file) {
				if (file.url) {
					tempBlock.image = renewFile(file);
					$("#product-image").val(file['src']);
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
	
	var mainKeyisChange = false;
	function init_globalInputKeyUP()
	{
		$(".globalInput").unbind("keyup");
		$(".globalInput").bind("keyup",function(){
			saveTempData();
			if($(this).attr("id") == "product-key")
			{
				mainKeyisChange = (  $(this).val() != old_mainKey );
			}
		});
	}
	
	function saveTempData()
	{
		var mainkey = $("#product-key").val();
		data_product['detailKey'] = data_product['priceKey'] = data_product['stockKey'] = mainkey;		
		
		data_price['priceKey'] = mainkey;
		data_stock['stockKey'] = mainkey;
		
		for( var l in data_detail )
		{
			data_detail[l]['detailKey'] = mainkey;
		}
		data_detail[Lang]['name'] 	 = $("#product-name").val();
		/*
		(typeof(data_detail[Lang].value.video) == "undefined")?data_detail[Lang].value.video=[]:'';
		data_detail[Lang].value.video = $("#product-video").val();
		*/
	}
	function checkMainKeyExist()
	{
		var isExistRS = $.ajax({
				url: "<?php echo base_url('/admin/product/isMainKeyExist');?>",
				async:false,
				cache:false,
				method:"GET",
				data:{
					'pkey':$("#product-key").val()
				}
		});
		return isExistRS.responseJSON.resp;
	}
	 
	function init_pagesave()
	{
		$('.page-save').click(function(e){
			e.preventDefault();
			
			<?php 
			$jsIsNew = ( $isNew ) ? "T" : "F";
			?>
			var isNew = '<?php echo $jsIsNew;?>';

			var ajaxData = {
				'data_product': data_product,
				'data_detail' : data_detail,
				'data_price'  : data_price,
				'data_stock'  : data_stock
			};
			
			( isNew == "T" )?ajaxData['isNew']=true:'';
			
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			saveTempData(lang);
			
			if(mainKeyisChange)
			{
				var isExistRS = checkMainKeyExist();
				if( isExistRS == true )
				{
					new PNotify({
						title: "欄位錯誤",
						text: '[SEO 網址搜索名稱] 僅用英數字命名，不可重複，不可使用非法字元！',
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
					return false;					
				}
			}
			else
			{
				if(isNew == "T")
				{
					new PNotify({
						title: "欄位錯誤",
						text: '[SEO 網址搜索名稱] 僅用英數字命名，不可重複，不可使用非法字元！',
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
					return false;		
				}
			}
			
			
			var l = Ladda.create(this);
			l.start();
			$.ajax({
				url: "<?php echo base_url('/admin/product/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data:ajaxData,
				success:function(data, status, xhr){
					console.log(data, status, xhr);
					l.stop();
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
						//location.href = "/admin/product/listTable";
					},1000);
				},
				error:function(xhr, stauts, err){
					l.stop();
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
			return false;
		});
	}
	
	
	function init_MainLangCodeSwitch(){
		$(".main-langCode li a").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(e){
				location.href = "/admin/product/editB?id=<?php echo $_GET["id"];?>&lang="+$(this).attr("data-langCode");
			});
		});
	}
	
	$(function(){
		
		$(".img-layout").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(){
				var targeId = $(this).attr("target-id");
				$(targeId).get(0).click();
			});
		});
		
		
		
		init_globalInputKeyUP();		
			
		init_pagesave();
		init_MainLangCodeSwitch();
		
		
		init_nestable();
	});
	</script>
	
</body>
</html>