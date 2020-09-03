<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<link rel="stylesheet" type="text/css" href="/libs/multiselect/bootstrap-multiselect.css">
<style>
  .control-label {
	  font-size: 15px;
	  text-align: right;
	  height: 36px;
	  padding-top: 0;
	  line-height: 36px;
  }
  .row {
	margin-top: 15px;
    padding: 0 20px;
  }
  .inline {
    display: inline-block;
    width: initial;
  }
	.switch {
	  padding: 7px 0;
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
                            <a>部落格</a>
                        </li>
                        <li class="crumb-active">
                            <a>一般資訊</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">一般資訊</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										編輯區塊
										<div class="pull-right">
											<!--
											<div class="btn btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>新增</span>
												<!-- The file input field used as target for the file upload widget 
												<input id="upload-image" type="file" name="files" >												
											</div>
											-->
											<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
												<span class="ladda-spinner"></span>
											</button>
										</div>
									</div>
								</div>
								<div class="panel-body">
								
									<div class="row">
										<label for="blog-class" class="col-sm-2 control-label">部落格-分類</label>
										<div class="col-sm-4">		
											<?php  
												$isSel = $selfBlog["class"] == 0 ? "selected":"";
											?>
											<select id="blog-class" class="form-control" multiple="multiple" data-allSelectedText="全部" data-nonSelectedText="請選擇" data-nSelectedText=" - 個">
											<?php
												$arrSelClass = explode(",",$selfBlog["class"]);
												foreach( $arr_class AS $class )
												{
													$isSel = ( in_array($class["id"], $arrSelClass) )?"selected":"";
											?><option value="<?php echo $class["id"];?>" <?php echo $isSel;?>><?php echo isset($class["value"][$Lang]["title"])?$class["value"][$Lang]["title"]:$class["key"];?></option><?php	
												}
											?>												
											</select>
										</div>
									</div>
									
								
									<div class="tabs-menu main-langCode ">
										<ul class="nav nav-tabs" role="tablist">
											<?php echo $htmlLangDefault;?>
										</ul>
									</div>
									<div class="tabs-content main-tab-content">
										
										<div class="row">
											<label for="blog-title" class="col-sm-2 control-label">部落格-名稱</label>
											<div class="col-sm-10">											
												<input class="form-control" id="blog-title" value="<?php echo isset($selfBlog["value"][$DEFAULTLANG]["title"])?$selfBlog["value"][$DEFAULTLANG]["title"]:"";?>" onkeyup="saveTempData('value','title',this);"/>
											</div>
										</div>	
									
										<div class="row">
											<label for="blog-mail" class="col-sm-2 control-label">部落格-信箱</label>
											<div class="col-sm-10">											
												<input class="form-control" id="blog-mail" value="<?php echo isset($selfBlog["value"][$DEFAULTLANG]["mail"])?$selfBlog["value"][$DEFAULTLANG]["mail"]:"";?>" onkeyup="saveTempData('value','mail',this);"/>
											</div>
										</div>
										
										<div class="row">
											<label for="blog-description" class="col-sm-2 control-label">部落格-描述</label>
											<div class="col-sm-10">											
												<textarea class="form-control" id="blog-description"><?php echo isset($selfBlog["value"][$DEFAULTLANG]["description"])?$selfBlog["value"][$DEFAULTLANG]["description"]:"";?></textarea>
											</div>
										</div>	
										
										<div class="row">
											<label for="blog-banner" class="col-sm-2 control-label">部落格-橫幅</label>
											<div class="col-sm-10">											
												<a class="btn btn-success btn-block" onclick="selectBanner();"><i class="glyphicon glyphicon-plus"></i> 選擇圖片</a>
											</div>
										</div>
										<div class="row">
											<label for="blog-banner" class="col-sm-2 control-label"></label>
											<div class="col-sm-10 text-center">											
												<img id="blog-banner-show" src="<?php echo isset($selfBlog["value"][$DEFAULTLANG]["banner"]["url"])?$selfBlog["value"][$DEFAULTLANG]["banner"]["url"]:"";?>" class="thumbnail" style="margin: 0 auto;max-width:100%;" />
											</div>
										</div>
										
									</div>
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

    <!-- jQuery -->
    <script type="text/javascript" src="/admin/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="/admin/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/uploads/user/ckfinder.js"></script>
    <script type="text/javascript" src="/admin/vendor/editors/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/magnific/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/spin.min.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/ladda.min.js"></script>
    <script type="text/javascript" src="/libs/jquery.switchButton.js"></script>
	
    <!-- Datatables -->
    <script type="text/javascript" src="/admin/vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

    <!-- Datatables Tabletools addon -->
    <script type="text/javascript" src="/admin/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

    <!-- Datatables Editor addon - READ LICENSING NOT MIT  -->
	<script src="/libs/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="/libs/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
	
    <script src="/libs/multiselect/bootstrap-multiselect.js"></script>
	<script src="<?php echo base_url("libs/bootstrap-touchspin/src/jquery.bootstrap-touchspin.js");?>"></script>

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

            CKEDITOR.disableAutoInline = true;

            // Init Ckeditor
            var editorContent1 = CKEDITOR.replace('blog-description', {				
                filebrowserBrowseUrl: 		'/uploads/user/ckfinder.html',
                height: 400
            });
			
			for (var i in CKEDITOR.instances) {
				CKEDITOR.instances[i].on('change', function(evt) {
					var id = $(this).attr("id");

					if( id == "cke_1" )
					{
						var lang = $(".main-langCode li.active a").attr("data-langCode");
						selfBlog.value[lang].description = evt.editor.getData();
					}
			
				});
			}
			
        });
	
	function init_MainLangCodeSwitch()
	{
		
		$(".main-langCode li a").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(e){
				$(".main-tab-content").fadeOut(500);
				$(".main-langCode li").removeClass("active");
				$(this).parent().addClass("active");
				$(".main-tab-content").fadeOut(500);
				
				setTimeout(function(){
					loadTempData();
					$(".main-tab-content").fadeIn(500);
				},500);
				
			});
		});
		
		$('.main-langCode a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
			var langCode 	= $(this).attr("data-langCode");
		});
		
		$('.main-langCode a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			var langCode 	= $(this).attr("data-langCode");
			
		});
	}
	
	function loadTempData()
	{
		var lang = $(".main-langCode li.active a").attr("data-langCode");
		$("#blog-title").val(selfBlog.value[lang].title);
		$("#blog-mail").val(selfBlog.value[lang].mail);
		CKEDITOR.instances["blog-description"].setData(selfBlog.value[lang].description);
		$("#blog-banner-show").attr("src",selfBlog.value[lang].banner.url);
	}
	
	var selfBlog = <?php echo json_encode($selfBlog);?>;
	
	function saveTempData(key1,key2,self)
	{
		var lang = $(".main-langCode li.active a").attr("data-langCode");
		selfBlog[key1][lang][key2] = $(self).val();
	}
	
	
	function selectBanner()
	{
		MediaStack.popup({
			selectActionFunction : function(e){
				var file = MediaStack.convertFileObject(e);
				
				var lang = $(".main-langCode li.active a").attr("data-langCode");
				selfBlog.value[lang].banner = file;
				
				$("#blog-banner-show").attr("src",file.url);
			}
		});
	}
	
	function init_pageSave()
	{
		$(".page-save").unbind("click");
		$(".page-save").bind("click",function(){
			if(confirm("確定修改？"))
			{
				selfBlog.class = ($("#blog-class").val() == null)?"":$("#blog-class").val().join(",");
				$.ajax({
					url: "<?php echo base_url('/admin/blog/info/save');?>",
					async:true,
					cache:false,
					method:"POST",
					data:selfBlog,
					success:function(data, status, xhr){
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'修改完成！':"修改失敗！";
						
						PM.show({ title: data.message, text: text, type: type });
												
						setTimeout(function(){
							//location.reload();
						},1000);
					},
					error:function(xhr, stauts, err){
						PM.erro();	
					}
				});	
			}
		});
	}
	$(function(){
		init_pageSave();
		
		init_MainLangCodeSwitch();
		
		$("#blog-class").multiselect({
            nonSelectedText: "請選擇",
            includeSelectAllOption: true,
            allSelectedText: "全部",
            nSelectedText: " - 個",
            enableFiltering: true,
            maxHeight: 300
        });
	});
	</script>
	
</body>
</html>