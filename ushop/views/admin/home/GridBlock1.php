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
	height:400px;
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
.gridBlockRow {
  padding-left: 0px;
  padding-right: 0px;
}
.item-image {
  border: 5px #e2e2e2 dashed;
  margin: 5px;
  cursor:pointer;
}
.item-image:hover {
  border-color: #A0DCEA;
}

.grid-container-1113 {
  display:block;
  position: relative;
  width: 1280px;
  height: 700px;
  background-color: #fff;
  zoom: 1;
}
.grid-container-1113 .grid-block {
  display: inline-block;
  position: absolute;
  background-repeat: no-repeat;
  cursor: pointer;
}
.grid-container-1113 .grid-block:hover {
  filter:alpa(opacity=80);   /* old IE */
  filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=80,FinishOpacity=15, Style=3, StartX=0, FinishX=100, StartY=0,FinishY=16); /*supported by current IE*/
  -moz-opacity:0.7;          /* Moz + FF */
  opacity:0.7;               /* 支持新版瀏覽器 */
}
.grid-container-1113 .grid-block-1 {
	width: 412px;
  height: 677px;
  background-color: #777;
  margin: 5px;
  top: 0;
  left: 0;
  background-size: 412px 677px;
}
.grid-container-1113 .grid-block-2 {
  width: 412px;
  height: 677px;
  background-color: #777;
  margin: 5px;
  margin-left: 0;
  top: 0;
  right: 428px;
  background-size: 412px 677px;
}
.grid-container-1113 .grid-block-3 {
  width: 412px;
  height: 677px;
  background-color: #777;
  margin: 5px;
  top: 0;
  right: 0;
  background-size: 412px 677px;
}
.section {
  position: relative;
  background: #fff;
  padding: 0;
}

.tool-box{
  position: absolute;
  left: 50%;
  top: 50%;
  margin-top: -25px;
  margin-left: -60px;
  background-color: rgba(172, 172, 172, 0.58);
    width: initial;
    height: initial;
  width: auto;
  height: auto;
  padding: 6px 4px;
  display:none;
}
.grid-container-1113 .grid-block:hover > .tool-box {
  display:inline-block;
}
.alert,
.link-bar {
  position: absolute;
  width: 100%;
  height: 30px;
  background-color: rgba(0,0,0,0.5);
  color: #fff;
  padding: 5px;
}
.link-bar {	
  bottom: 0;
}
.alert {
  top: 0;
  text-align:center;
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
							
							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										編輯區塊
										<div class="pull-right">
											<div class="btn btn-success fileinput-button" style="display:none;">
												<i class="glyphicon glyphicon-plus"></i>
												<span>新增</span>
												<!-- The file input field used as target for the file upload widget -->
												<input id="upload-image" type="file" name="files" >
											</div>
											<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
												<span class="ladda-spinner"></span>
											</button>
										</div>
									</div>
								</div>
								<div class="panel-body">
									<?php $GridBlock = $widget[$Lang][0]; ?>
									<div class="tabs-menu main-langCode ">
										<ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul>
									</div>
									<div class="tabs-content main-tab-content">		
										<div class="row p10">
											<div class="grid-container-1113">
												
												<div class="grid-block grid-block-1" data-href="<?php echo isset($GridBlock['value'][0]['link'])?$GridBlock['value'][0]['link']:"";?>" style="background-image:url('<?php echo $GridBlock['value'][0]['url'];?>');">
													<div class="alert">412 x 677</div>
													<div class="tool-box">
														<div class="btn btn-info" onclick="saveTempData(0,'link');">連結</div>
														<div class="btn btn-warning" onclick="saveTempData(0,'image');">換圖</div>
													</div>
													<div class="link-bar link-bar-0"><?php echo isset($GridBlock['value'][0]['link'])?$GridBlock['value'][0]['link']:"";?></div>
												</div>
												<div class="grid-block grid-block-2" data-href="<?php echo isset($GridBlock['value'][1]['link'])?$GridBlock['value'][1]['link']:"";?>" style="background-image:url('<?php echo $GridBlock['value'][1]['url'];?>');">
													<div class="alert">建議尺寸：412 x 677</div>
													<div class="tool-box">
														<div class="btn btn-info" onclick="saveTempData(1,'link');">連結</div>
														<div class="btn btn-warning" onclick="saveTempData(1,'image');">換圖</div>
													</div>
													<div class="link-bar link-bar-1"><?php echo isset($GridBlock['value'][1]['link'])?$GridBlock['value'][1]['link']:"";?></div>
												</div>
												<div class="grid-block grid-block-3" data-href="<?php echo isset($GridBlock['value'][2]['link'])?$GridBlock['value'][2]['link']:"";?>" style="background-image:url('<?php echo $GridBlock['value'][2]['url'];?>');">
													<div class="alert">建議尺寸：412 x 677</div>
													<div class="tool-box">
														<div class="btn btn-info" onclick="saveTempData(2,'link');">連結</div>
														<div class="btn btn-warning" onclick="saveTempData(2,'image');">換圖</div>
													</div>
													<div class="link-bar link-bar-2"><?php echo isset($GridBlock['value'][2]['link'])?$GridBlock['value'][2]['link']:"";?></div>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									<!--
									<div class="row">
										<div class="col-sm-4 vc_hidden-xs wpb_column vc_column_container gridBlockRow">
											<div class="wpb_single_image wpb_content_element overlay vc_align_left">
												<div class="wpb_wrapper item-image" datafrd="0" datasrd="0" >								
													<a>
														<img width="100%" src="holder.js/100%x242" class="vc_box_border_grey attachment-full" alt="img-baner1">
													</a>
												</div> 
											</div> 
										
											<div class="wpb_single_image wpb_content_element overlay vc_align_left">
												<div class="wpb_wrapper item-image" datafrd="0" datasrd="1">								
													<a>
														<img width="100%" src="holder.js/100%x165" class="vc_box_border_grey attachment-full" alt="img-baner1">
													</a>
												</div> 
											</div> 
										</div> 
										<div class="col-sm-4 vc_hidden-xs wpb_column vc_column_container gridBlockRow">
											<div class="wpb_single_image wpb_content_element overlay vc_align_left">
												<div class="wpb_wrapper item-image" datafrd="1" datasrd="0">								
													<a>
														<img width="100%" src="holder.js/100%x424" class="vc_box_border_grey attachment-full" alt="img-baner1">
													</a>
												</div> 
											</div> 
										</div> 
									
										<div class="col-sm-4 vc_hidden-xs wpb_column vc_column_container gridBlockRow">
											<div class="wpb_single_image wpb_content_element overlay vc_align_left">
												<div class="wpb_wrapper item-image" datafrd="2" datasrd="0">								
													<a>
														<img width="100%" src="holder.js/100%x242" class="vc_box_border_grey attachment-full" alt="img-baner1">
													</a>
												</div> 
											</div> 
										
											<div class="wpb_single_image wpb_content_element overlay vc_align_left">
												<div class="wpb_wrapper item-image" datafrd="2" datasrd="1">								
													<a>
														<img width="100%" src="holder.js/100%x165" class="vc_box_border_grey attachment-full" alt="img-baner1">
													</a>
												</div> 
											</div> 
										</div> 
									</div>
								<!--
								<div class="dd mb35" id="nestable">
									<ol class="dd-list">
										<li class="dd-item sample-item" data-id="1" data-item-id="1">
											<div class="dd-handle" data-name="title"></div>
											<div class="dd-content">
												<div class="media">
													<span class="text-warning pull-right fs11 fw600" data-name="type" ></span>
													<div class="dd-handle media-left">
														<h2 class="glyphicons glyphicons-picture" data-name="type-icon"></h2>
													</div>
													<div class="media-body" data-name="content">
														<img height="120px" src="http://new-celena.mooo.com/uploads/revslider/ex/slide-01.jpg" />
													</div>
												</div>
												<div class="dd-edit pull-right">
													<a data-id="12" href="#Mod_Remove_This" class="dd-edit-remove config" data-toggle="modal">
														<i class="fa fa-times "></i>
													</a>
												</div>
											</div>
										</li>
									</ol>
								</div>
								-->
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
	
	<script src="/admin/js/holder/holder.js"></script>
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
        });
    </script>
    
	<script type="text/javascript">
	var preview_src = "<?php echo base_url("view/show/GridBlock");?>";
	
	var Lang		= '<?php echo $Lang;?>';
	var obj_item 	= <?php echo json_encode($widget);?>;
	var menuItem 	= false;
	
	var frd = 0;
	var srd = 0;
	
	
window.onload = function(){
	var zoom = ( ( $(".main-tab-content").outerWidth() - 20 ) / 1400 );
	$(".grid-container-1113").css({'zoom': zoom });
}
$( window ).resize(function() {
	var zoom = ( ( $(".main-tab-content").outerWidth() - 20 ) / 1400 );
	$(".grid-container-1113").css({'zoom': zoom });
});
	function saveTempData(inds, key)
	{
		if( key == "image" )
		{
			var oldLink = typeof(obj_item[Lang][0].value[inds].link) == "string" ? obj_item[Lang][0].value[inds].link : "";
			MediaStack.popup({
				selectActionFunction : function(e){
					var file = MediaStack.convertFileObject(e);
					obj_item[Lang][0].value[inds] = file;
					obj_item[Lang][0].value[inds].link = oldLink;
					$(".grid-block-"+(inds+1)).css("background", "url("+file.url+") no-repeat");
					var w = $(".grid-block-"+(inds+1)).outerWidth();
					var h = $(".grid-block-"+(inds+1)).outerHeight();
					$(".grid-block-"+(inds+1)).css({ 
						 "background-image": "url("+file.url+")", 
						 "background-size": w+"px "+h+"px"
					});
				}
			});
		}
		else
		{			
			var newValue = prompt("請輸入該圖希望連結的位置：","");
			if (newValue!=null && $.trim(newValue)!="")
			{
				obj_item[Lang][0].value[inds][key] = newValue;
				if(key == "link")
				{
					$(".link-bar-"+inds).html(newValue);
				}
			}
		}			
	}
	
	function init_pagesave()
	{
		$('.page-save').click(function(e){
			e.preventDefault();
			var postData = {
				type       : "GridBlock1",
				widgetData : obj_item
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
					PM.show({"title":data.message,"text":text,"type":type});
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
				
		init_pagesave();
		
		pageReload();
		
		MainLangCode();
	});
	</script>
	
</body>
</html>