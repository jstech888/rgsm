<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">

<link rel="stylesheet" href="/libs/raty/jquery.raty.css">
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

.img-container {
  position: relative;
  display: inline-block !important;
  margin-left: 5px;
  margin-top: 5px;
  cursor: pointer;
  max-width: 110px;
}
.img-container img:hover {
  border-color: #000;
} 


.product-img-container {
  position: relative;
  display: inline-block;
} 


.btn-img-alt {
  width: 100%;
  background: rgba(0,0,0,0.6);
  color: #fff;
  position: absolute;
  cursor: default;
  left: 0;
  line-height: 22px;
  height: 22px;
  width: auto;
  width: initial;
}
.btn-tools {
  position: absolute;
  top: 0;
  right: 0;
  display: none;
}

.product-img-container:hover .btn-tools {
  display: block;
}

.img-container:hover .btn-tools {
  display: block;
}
.control-label {  
  padding-top: 0px !important;
  line-height: 39px;
}
.admin-form .section-divider span {
  background: #fff;
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
                            <a>文章分類</a>
                        </li>
                        <li class="crumb-active">
                            <a>編輯</a>
                        </li>
                        <li class="crumb-active">
                            <a><?php echo $key;?></a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">分類編輯區</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">	
						
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label for="inputKey" class="col-lg-2 control-label">URI KEY</label>
									<div class="col-lg-8">
										<input class="form-control" value="<?php echo $aClass["key"];?>" onkeyup="saveTempData( 'key', false, this );">
										<span class="help-block mt5"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="inputTouch" class="col-lg-2 control-label">人氣</label>
									<div class="col-lg-8">
										<div id="touch"></div>
										<span class="help-block mt5">不可修改，當前分類被訪問的累積人氣總數</span>
									</div>
								</div>
							</form>
							
							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist"><?php echo $htmlLangDefault; ?></ul>
							</div>
							<div class="tabs-content main-tab-content admin-form theme-primary">
								<div class="col-sm-12 mb15">
									<div class="form-group">
										<label for="inputTitle" class="col-lg-2 control-label">標題</label>
										<div class="col-lg-8">
											<input id="aClass-title" class="form-control" value="<?php echo isset($aClass["value"][$DEFAULTLANG]["title"])?$aClass["value"][$DEFAULTLANG]["title"]:"";?>" onkeyup="saveTempData( 'value', 'title', this );"/>
										</div>
									</div>
								</div>
								<?php /*
								<div class="col-sm-12 mb15">
									<div class="form-group">
										<label for="icon-image" class="col-xs-4 col-md-3 col-lg-2 control-label">縮圖</label>
										<div class="col-xs-7 col-md-8 col-lg-9 text-center mb15">
											<a class="btn btn-success btn-block" onclick="selectIconMediaStack();">
												<i class="glyphicon glyphicon-plus"></i>
												<span>選擇照片</span>
											</a>
										</div>
										<label for="icon-image" class="col-xs-4 col-md-3 col-lg-2 control-label"></label>
										<div class="col-xs-7 col-md-8 col-lg-9 text-center" style="padding: 5px;">
											<div class="product-img-container">
												<img id="product-image" class="img-thumbnail image-product-remove" style="height:32px;" src="<?php echo isset($aClass["icon"][$DEFAULTLANG]["url"])?$aClass["icon"][$DEFAULTLANG]["url"]:"";?>">
												<div class="btn btn-xs btn-img-alt"><?php echo isset($aClass["icon"][$DEFAULTLANG]["alt"])?$aClass["icon"][$DEFAULTLANG]["alt"]:""?></div>
												<div class="btn-group btn-tools">
													<div class="btn btn-warning btn-xs btn-edit-img-alt" onclick="iconImageALT();"><span class="glyphicons glyphicons-pencil"></span></div>
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								*/?>
								<div class="col-sm-12 mb15">
									<div class="section-divider mb40 mt40"><span> BANNER </span></div>
									<div class="form-group">
										<div class="col-xs-12 text-center mb15">
											<a class="btn btn-success btn-block" onclick="selectBannerMediaStack();">
												<i class="glyphicon glyphicon-plus"></i>
												<span>選擇照片</span>
											</a>
										</div>
									</div>
								</div>
								<div class="col-sm-12 mb15">
									<div class="mb35">
									<?php
										( empty( $aClass["banner"][$DEFAULTLANG]["slider"] ) || !isset($aClass["banner"][$DEFAULTLANG]["slider"]) ) ? $aClass["banner"][$DEFAULTLANG]["slider"] = array() : "";
									
										$display = count($aClass["banner"][$DEFAULTLANG]["slider"]) > 0 ? "style=\"display:none;\"":"";
									?>
										<h1 class="text-center nestable-empty" <?php echo $display;?>>目前沒有BANNER</h1>
										<ol class="dd" id="nestable"></ol>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="pull-right">
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
									<span class="ladda-spinner"></span>
								</button>
							</div>
							<div class="clearfix"></div>
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

	
    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>
    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
	
	<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>
	
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
			/*
            // Init Ckeditor
            CKEDITOR.replace('ckeditor1', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 300
            });
			*/
        });
	
	refer_uri		= '/admin/blog/blogClass';
	var key			= '<?php echo $key;?>';
	var aClass		= <?php echo json_encode($aClass);?>;
	var defaultLang = '<?php echo $DEFAULTLANG;?>';

	function init_MainLangCodeSwitch() 
	{
		$(".main-langCode li a").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(e){
				$(".main-langCode li").removeClass("active");
				$(this).parent().addClass("active");
				$(".main-tab-content").fadeOut(500);
				var langCode = $(this).attr("data-langCode");
				
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
	
	
	function selectBannerMediaStack()
	{
		MediaStack.popup({
			basePath : "/uploads/members/",
			selectActionFunction : function(e){
				var file = MediaStack.convertFileObject(e);
				var lang = $(".main-langCode li.active a").attr("data-langCode");
				aClass.banner[lang].slider.push(file);
				loadTempData();
				$('.page-save').trigger("click");
			}
		});
	}
	
	function createItem( item, sortKey )
	{
		var lang = $(".main-langCode li.active a").attr("data-langCode");
		var newli = '<li class="dd-item" data-id="'+sortKey+'" data-item-id="'+sortKey+'">' +
					'<div class="dd-handle" data-name="title"></div>' +
					'<div class="dd-content">' +
						'<div class="media">' +
							'<span class="text-warning pull-right fs11 fw600" data-name="type" ></span>' +
							'<div class="dd-handle media-left">' +
								'<h2 class="glyphicons glyphicons-picture" data-name="type-icon"></h2>' +
							'</div>' +
							'<div class="media-body" data-name="content">' +
								'<div class="row">' +
									'<div class="col-md-4">' +
										'<img height="120px" class="img-responsive" src="'+item.url+'" />' +
									'</div>' +
									'<div class="col-md-4" data-name="alt">' +
										 '<span>'+item.alt+'</span>' +
									'</div>' +
								'</div>' +
							'</div>' +
						'</div>' +
						'<div class="dd-edit pull-right">' +
							'<a href="/admin/blog/blogClass/slider?key='+key+'&sid='+sortKey+'&sl='+lang+'" class="dd-edit-remove config">' +
								'<i class="fa fa-pencil "></i>' +
							'</a>' +
							'<a onclick="delItem(\''+sortKey+'\',this);" class="dd-edit-remove config">' +
								'<i class="fa fa-times "></i>' +
							'</a>' +
						'</div>' +
					'</div>' +				
				'</li>';
		return newli;
	}
	
	function delItem(key, self)
	{
		if(confirm("確認是否刪除？"))
		{
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			var CTSlider = aClass.banner[lang].slider;
			var newCTS = [];
			for( var k in CTSlider )
			{
				if( k != key )
				{
					newCTS.push(CTSlider[k]);
				}
			}	
			delete aClass.banner[lang].slider;
			aClass.banner[lang].slider = [];
			aClass.banner[lang].slider = newCTS;
			loadTempData();
		}
	}
	
	function loadTempData()
	{
		var lang = $(".main-langCode li.active a").attr("data-langCode");
		( typeof( aClass.banner[lang].slider ) == "undefined" ) ? aClass.banner[lang].slider = [] : "";
		var CTSlider = aClass.banner[lang].slider;
		
		var title  = (typeof(aClass.value[lang].title) == "undefined")?" ":aClass.value[lang].title;
		$("#aClass-title").val(title);
		
		var url  = (typeof(aClass.icon[lang].url) == "undefined")?" ":aClass.icon[lang].url;
		$("#product-image").attr("src",url);
		var alt  = (typeof(aClass.icon[lang].alt) == "undefined")?" ":aClass.icon[lang].alt;
		$(".product-img-container .btn-img-alt").html(alt);
				
		$('#nestable').nestable('destroy');
		$('#nestable').empty();
		
		for( var k in CTSlider )
		{
			var item = CTSlider[k];
			var newli = createItem( item, k );
			$('#nestable').append(newli);
		}		
		
		if( typeof(CTSlider) == "undefined" )
		{
			$('#nestable').append('<h1 class="text-center nestable-empty">目前沒有BANNER</h1>');
		}
		else
		{
			$('#nestable').on("change",function(e){
				var lang = $(".main-langCode li.active a").attr("data-langCode");
				var CTSlider = aClass.banner[lang].slider;
				var newCTSlider = [];
				
				var raw = [];
				$('#nestable li').each(function(){
					raw.push({"itemId":$(this).attr("data-item-id")});
				});
				
				for( var k in raw )
				{
					for( var j in CTSlider )
					{
						if( j == raw[k].itemId )
						{
							newCTSlider[k] = CTSlider[j];
						}
					}
				}
				delete aClass['banner'][lang].slider
				aClass.banner[lang].slider = [];
				aClass.banner[lang].slider = newCTSlider;
			});
		}
	}
	
	function saveTempData(key1,key2,self)
	{
		if(key2 == false)
		{
			aClass[key1] = $(self).val();
		}
		else
		{
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			aClass[key1][lang][key2] = $(self).val();
		}
	}
	
	/* 分類縮圖 */
	function selectIconMediaStack()
	{
		MediaStack.popup({
			basePath : "/uploads/members/",
			selectActionFunction : function(e){
				var file = MediaStack.convertFileObject(e);
				var lang = $(".main-langCode li.active a").attr("data-langCode");
				for( var k in file )
				{
					aClass.icon[lang][k] = file[k];
				}
				$("#product-image").attr("src",file.url);
			}
		});
	}		
	function iconImageALT()
	{
		var alt = prompt('請輸入分類縮圖描述：','');
		if( alt != null )
		{
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			$(".product-img-container .btn-img-alt").html(alt);
			aClass.icon[lang].alt = alt;
		}
	}
	
	function init_pagesave()
	{
		$('.page-save').click(function(e){
			e.preventDefault();
			
			var l = Ladda.create(this);
			l.start();
			$.ajax({
				url: "/admin/blog/blogClass/save",
				async:true,
				cache:false,
				method:"POST",
				data:aClass,
				success:function(data, status, xhr){
					l.stop();
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'儲存完成！':"儲存失敗！";
					PM.show({"title":data.message,"text":text,"type":type});
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
		
		var score = aClass.touch / 1000;
		score = formatFloat(score, 1);
		$('#touch').raty({ readOnly: true, score: score });
		
		init_MainLangCodeSwitch();
		
		loadTempData();
	});
	</script>
	
</body>
</html>