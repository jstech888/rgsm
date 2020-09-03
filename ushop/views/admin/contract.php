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
                            <a href="<?php echo base_url("/admin/page/contract");?>"><?php echo $title;?></a>
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
							<!-- 必要資訊 -->
							<div class="row">
								<div class="form-group">
									<label class="col-lg-3 control-label" for="gMapAddress" style="line-height: 35px;text-align: right;">Google Map 標記地址</label>
									<div class="col-lg-8">
										<input class="form-control" id="gMapAddress" type="text" value="<?php echo $infopage["en"]['image']["markAddress"];?>">
										<span class="help-block mt5"><i class="fa fa-bell"></i>完整地址含郵遞區號</span>
									</div>
								</div>
							</div>
							<!-- /必要資訊 -->
							
							
							<div class="pull-right">
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label">儲存</span>
									<span class="ladda-spinner"></span>
								</button>
							</div>
							<div class="tabs-menu">
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" data-langCode="en">英文</a></li>
									<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" data-langCode="zh-hant">繁體中文</a></li>
									<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" data-langCode="zh-hans">簡體中文</a></li>
								</ul>
							</div>
							
							<div class="tabs-content">
								<form class="form-horizontal mb20" role="form">
									<div class="form-group">
										<label class="col-lg-3 control-label" for="gMapTitle" style="line-height: 35px;text-align: right;">Google Map 標記標題</label>
										<div class="col-lg-8">
											<input class="form-control" id="gMapTitle" type="text" value="<?php echo $infopage["en"]['image']["markTitle"];?>">
										</div>
									</div>
									<div class="form-group">
										<label for="pageTitle" class="col-lg-1 control-label">顯示名稱</label>
										<div class="col-lg-11">
											<input type="text" id="pageTitle" class="form-control" placeholder="公司介紹別名" value="<?php echo $infopage["en"]['title'];?>">
										</div>
									</div>
								</form>
								
								<!-- ckeditor -->
								<textarea name="ckeditor1" id="ckeditor1" name="ckeditor1" rows="12">
								   <?php echo $infopage["en"]['content'];?>
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
					['Bold','Italic','Underline','Strike'],
					[ 'NumberedList', 'BulletedList',  '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ],
					['Table','HorizontalRule','SpecialChar'],
					'/',
					['Styles','Format','Font','FontSize'],
				    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
					{ name: 'colors', items: [ 'TextColor','BGColor' ] },
					['Maximize','Source']
				],
                height: window.screen.height - 400 ,
                on: {
                    instanceReady: function(evt) {
                       // $('.cke').addClass('admin-skin cke-hide-bottom');
                    }
                },
            });
			
            CKFinder.setupCKEditor( editorContent, '/admin/vendor/editors/ckfinder/');
			$("input[type=radio]").switchButton({
				on_label: '顯示',
				off_label: '隱藏',
				width: 50,
				height: 16,
				button_width: 25
			});

        });
    </script>
    <!-- END: PAGE SCRIPTS -->
	<script type="text/javascript">
		var key				= "<?php echo $title;?>";
		var obj_infopage  	= <?php echo json_encode($infopage);?>;
		var contentCKED		= "";
		$(function(){
			contentCKED		= CKEDITOR.instances.ckeditor1;
			$(".tabs-menu li a").each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(e){
					var langCode = $(this).attr("data-langCode");
					var infopage = obj_infopage[langCode];
					setTimeout(function(){
						$(".tabs-content").fadeIn(500);
						$("#gMapTitle").val(infopage['image']['markTitle']);
						$("#pageTitle").val(infopage['title']);
						contentCKED.setData(infopage['content']);
					},1500);
				});
			});
			
			
			$('a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
				$(".tabs-content").fadeOut(500);
				var langCode 									= $(this).attr("data-langCode");
				obj_infopage[langCode]['image']['markTitle'] 	= $("#gMapTitle").val();
				obj_infopage[langCode]['title'] 				= $("#pageTitle").val();
				obj_infopage[langCode]['content'] 				= contentCKED.getData();
			});
			
			$("#gMapAddress").keyup(function() {
				obj_infopage['en']["image"]['markAddress'] 			= $(this).val();
				obj_infopage['zh-hant']["image"]['markAddress'] 	= $(this).val();
				obj_infopage['zh-hans']["image"]['markAddress'] 	= $(this).val();
			});
			$("#gMapTitle").keyup(function() {
				var langCode 									= $(".tabs-menu li.active").find("a").attr("data-langCode");
				obj_infopage[langCode].image.markTitle 			= $(this).val();
			});
			$("#pageTitle").keyup(function() {
				var langCode 						= $(".tabs-menu li.active").find("a").attr("data-langCode");
				obj_infopage[langCode]['title'] 	= $(this).val();
			});
			
			contentCKED.on( 'contentDom', function(e){
				var editable = contentCKED.editable();
				 editable.attachListener( contentCKED.document, 'keydown', function() {
					var langCode 						= $(".tabs-menu li.active").find("a").attr("data-langCode");
					obj_infopage[langCode]['content'] 	= contentCKED.getData();
				} );
			});
			
			$('.page-save').click(function(e){
				e.preventDefault();
				$("[name=\"picture\"]").val(JSON.stringify(obj_infopage['en']['image']));
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