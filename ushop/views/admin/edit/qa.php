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
                            <a href="<?php echo base_url("/admin/page/qa");?>"><?php echo $title;?></a>
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
							
								<div class="panel panel-alert panel-border top">
									<div class="panel-heading">
										<span class="panel-title">問題</span>
									</div>
									<div class="panel-body">
										<input type="text" id="inputStandard" class="form-control" onkeyup="saveTempData('quest',this);" value="<?php echo $quest["quest"];?>">									
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="panel panel-alert panel-border top">
									<div class="panel-heading">
										<span class="panel-title">回答</span>
									</div>
									<div class="panel-body">
										<textarea name="ckeditor1" id="ckeditor1" rows="12">
										   <?php 
											echo $quest["answer"]["html"];
										   ?>
										</textarea>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="pull-right mt15">
									<a class="btn btn-success page-save">儲存</a>
									<a class="btn btn-default" href="/admin/page/qa">返回</a>
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
			
			
            CKEDITOR.disableAutoInline = true;
            var editorContent2 = CKEDITOR.replace('ckeditor1', {
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
					quest.answer.html = evt.editor.getData();
				});
			}
        });
    </script>
    <!-- END: PAGE SCRIPTS -->
	
	
	<script type="text/javascript">
	
		function saveTempData(fk,self)
		{
			quest[fk] = $(self).val();
		}
		
		var key				= "<?php echo $title;?>";
		var quest  			= <?php echo json_encode($quest);?>;
		var Lang			= "<?php echo $Lang;?>";
		var	contentKey 		= "<?php echo $_GET["id"];?>";
		
		$(function(){
			
			MainLangCode();
		
			$('.page-save').click(function(e){
				e.preventDefault();
				
				var l = Ladda.create(this);
				l.start();
				$.ajax({
					url: "<?php echo base_url('/page/save_qa');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{
						"postData" : [quest]
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