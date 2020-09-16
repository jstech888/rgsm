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
                            <a> <?php echo $bkmt_name;?> </a>
                        </li>
                        <li class="crumb-active">
                            <a> <?php echo $bkm_name;?> </a>
                        </li>
                        <li class="crumb-active">
                            <a>Edit</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400"><?php echo $article["blog-title"];?></h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							
								<div style="display:none;">
									<input type="text" name="picture" id="blog-extra" value="<?php echo ( isset($article['raw-extra']) )?htmlspecialchars($article['raw-extra']):""; ?>">
								</div>
								
								<!-- upload-prograss-bar -->
								<div id="upload-result" class="upload-progress" style="display:none;">
									<!-- The global progress bar -->
									<div id="upload-progress" class="progress" style="height: 5px;margin-bottom: 0;">
										<div class="progress-bar progress-bar-success progress-bar-striped active"  role="progressbar" style="width: 0%"></div>
									</div>
								</div>
								<!-- /upload-prograss-bar -->
								<div class="panel">
									<div class="panel-heading text-center">
										<div class="caption">
											Edit Zone
										</div>
									</div>
									<div class="panel-body">
										<div class="col-sm-12" style="margin-bottom:15px;">
											<div class="form-group">
												<label for="blog-title" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;">Title</label>
												<div class="col-xs-7 col-md-8 col-lg-10">
													<input type="text" id="blog-title" class="form-control" placeholder="" value="<?php echo $article["blog-title"];?>">
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<?php if(!isset($isBrand)) { ?>
										<div class="col-sm-12" style="margin-bottom:15px;">
											<div class="form-group">
												<label for="blog-title" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;">標籤</label>
												<div class="col-xs-7 col-md-8 col-lg-10">
													<input type="text" id="blog-tag" class="form-control" placeholder="" value="<?php echo $article["tag"];?>">
													<p class="help-block">以逗點分隔，設定自己所需要的分類標籤</p>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
                                        <?php } ?>

										<div class="col-sm-12" style="margin-bottom:15px;">
											<div class="form-group">
												<label for="blog-class" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;">Catalog</label>
												<div class="col-xs-7 col-md-8 col-lg-10">
													<?php $isSel = $article["class"] == 0 ? "selected" : ""; ?>
													<select id="blog-class" class="form-control">														
													<?php
														foreach( $arr_class AS $class )
														{
															$isSel = ($class["id"] == $article["class"]) ? "selected" : "";
													?>
														<option value="<?php echo $class["id"];?>" <?php echo $isSel;?>><?php echo isset($class["value"][$Lang]["title"])?$class["value"][$Lang]["title"]:$class["key"];?></option>
													<?php
														}
													?>
													<option value="0" <?php echo $isSel;?>>Hide</option>
													</select>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>

										<div class="col-sm-12" style="margin-bottom:15px;">
											<div class="form-group">
												<label for="blog-date" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;">DateTime</label>
												<div class="col-xs-7 col-md-8 col-lg-10" id="datetimepicker3">
													<input type="text" id="blog-date" class="form-control" placeholder="" value="<?php echo $article["raw-date"];?>">
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<?php 
											$isShowLang = ( $isNew == false ) ? "display:none;" : "";
										?>
										<div class="col-sm-12" style="margin-bottom:15px;<?php echo $isShowLang;?>">
											<div class="form-group">
												<label for="langCode" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;">Language</label>
												<div class="col-xs-7 col-md-8 col-lg-10">
													<select type="text" id="langCode" class="form-control"><?php echo $optListLang;?></select>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<?php /* <div class="col-sm-12" style="margin-bottom:15px;">
											<div class="form-group">
												<label for="blog-date" class="col-xs-4 col-md-3 col-lg-1 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;">首圖</label>
												<div class="col-xs-7 col-md-8 col-lg-10 text-center">
													<a class="btn btn-success btn-block" onclick="selectMediaStack();">
														<i class="glyphicon glyphicon-plus"></i>
														<span>選擇照片</span>
													</a>
												</div>
												<div class="clearfix"></div>
												<label for="blog-date" class="col-xs-4 col-md-3 col-lg-1 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;"></label>
												<div class="col-xs-7 col-md-8 col-lg-10" style="text-align: center;">
													<img id="blog-image" class="img-thumbnail" src="<?php echo $article["blog-extra"]["url"];?>">
												</div>
											</div>
											<div class="clearfix"></div>
										</div> */?>
										<!--
										<div class="col-sm-12" style="margin-bottom:15px;">
											<div class="form-group">
												<label for="summary" class="col-xs-4 col-md-3 col-lg-1 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;">簡述</label>
												<div class="col-xs-7 col-md-8 col-lg-10">
													<textarea id="blog-summary" name="summary" rows="5" style="width:100%;"><?php echo $article["blog-summary"];?></textarea>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										-->
										<?php if( $self === false ) { ?>										
										<div class="col-sm-12" style="margin-bottom:15px;">
											<div class="form-group">
												<label for="summary" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 20px;margin-bottom: 0;text-align: right;">作者</label>
												<div class="col-xs-7 col-md-8 col-lg-10">
													<input type="text" id="blog-author" class="form-control" placeholder="" value="<?php echo $article["author"];?>">
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<?php } ?>
										<div class="col-sm-12" style="margin-bottom:15px;">
											<textarea name="ckeditor1" id="ckeditor1" rows="12">
												<?php echo $article["blog-content"];?>
											</textarea>
										</div>
									</div>
								</div>
								
								<div class="pull-right mt10">
									<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
										<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> Save </span>
										<span class="ladda-spinner"></span>
									</button>
									<a type="button" class="btn btn-default" href="<?php echo $back_url;?>">Back</a>
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
	<?php if( $self === false ) { ?>
	<script type="text/javascript" src="/admin/vendor/editors/ckfinder/ckfinder.js"></script>
	<?php } else { ?>
    <script type="text/javascript" src="/uploads/user/ckfinder.js"></script>
	<?php } ?>
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
	
	<script>
		<?php echo isset($refer_uri)?"refer_uri = '$refer_uri';":"";?>
	</script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();

            CKEDITOR.disableAutoInline = true;

            // Init Ckeditor
            CKEDITOR.replace('ckeditor1', {
                filebrowserBrowseUrl: '<?php echo ( $self === false ) ? '/admin/vendor/editors/ckfinder/ckfinder.html?type=files' : '/uploads/user/ckfinder.html' ?>',
                height: 300
            });
        });
		
	function selectMediaStack()
	{
		MediaStack.popup({
			selectActionFunction : function(e){
				var file = MediaStack.convertFileObject(e);
				//saveImage(file);
				$("#blog-image").attr('src', file.url);
				
				$("[name=\"picture\"]").val(JSON.stringify(file));
			}
		});
	}
    </script>
    
	<script type="text/javascript">
	var obj_item 	= <?php echo json_encode($article);?>;
	var menuItem 	= false;
	
	function init_datePicker()
	{
       // Init datetimepicker - inline + range detection
       $('#blog-date').datetimepicker({
		   format: "YYYY-MM-DD HH:mm:ss"
       });
	}
	
	function init_pagesave()
	{
		$('.page-save').click(function(e){
			e.preventDefault();
			
			obj_item["blog-title"]   	= $("#blog-title").val();
			obj_item["raw-date"] 		= $("#blog-date").val();
			obj_item["raw-extra"] 		= $("#blog-extra").val();
			obj_item["tag"]				= $("#blog-tag").val();
			obj_item["author"] 			= $("#blog-author").val();
			obj_item["class"] 			= $("#blog-class").val();
			/* obj_item["blog-summary"] 	= $("#blog-summary").val(); */
			obj_item["blog-content"] 	= CKEDITOR.instances.ckeditor1.getData();
			obj_item["langCode"] 		= $("#langCode").val();
			
			
			var l = Ladda.create(this);
			l.start();
			$.ajax({
				url: "<?php echo base_url($save_url);?>",
				async:true,
				cache:false,
				method:"POST",
				data:obj_item,
				success:function(data, status, xhr){
					console.log(data, status, xhr);
					l.stop();
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'儲存完成！':"儲存失敗！";
					PM.show({"title":data.message,"text":text,"type":type});
					
					setTimeout(function(){
						location.href = '<?php echo $back_url;?>';
					},500);
				},
				error:function(xhr, stauts, err){
					l.stop();
					PM.erro();
				}
			}).always(function() { l.stop(); });
			//l.stop();
			return false;
		});
	}
	
	$(function(){
		init_pagesave();
		
		init_datePicker();
		
		$("#langCode").val(obj_item.langCode);
	});
	</script>
	
</body>
</html>