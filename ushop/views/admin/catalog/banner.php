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
.admin-form .section-divider span {
  background: #fff;
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
                            <a>圖組</a>
                        </li>
                        <li class="crumb-active">
                            <a><?php echo $data_product["detailKey"]?></a>
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
											<div class="pull-right">
												<a class="btn btn-success btn-xs fileinput-button"  onclick="selectMediaStack();">
													<i class="glyphicon glyphicon-plus"></i>
													<span>新增</span>
												</a>
											</div>
										</div>
									</div>
									<div class="panel-body admin-form theme-primary">
										
										<div class="tabs-menu main-langCode ">
											<div class="pull-right mb">
												<span class="help-block mt5"><i class="fa fa-bell"></i> 上傳一張超過一張圖片，前台則會以 [輪播方式] 顯現！</span>
											</div>
											<ul class="nav nav-tabs" role="tablist">
												<?php echo $htmlLangDefault;?>
											</ul>
										</div>
										<div class="tabs-content main-tab-content">
										
											<?php /*<div class="section-divider mb40 mt20"><span> 區塊參數 </span></div>
											<div class="form-group">
												<label for="inputEffect" class="col-lg-3 control-label">固定寬度</label>
												<div class="col-lg-6">
													<div class="input-group">
														<input id="blockMaxWidth" class="form-control text-right" value="<?php echo isset($data_detail[$DEFAULTLANG]["value"]["width"])?$data_detail[$DEFAULTLANG]["value"]["width"]:"";?>" onkeyup="saveTempData('width',this);">
														<span class="input-group-addon">PX</span>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="form-group">
												<label for="inputEffect" class="col-lg-3 control-label">固定高度</label>
												<div class="col-lg-6">
													<div class="input-group">
														<input id="blockMaxHeight" class="form-control text-right" value="<?php echo isset($data_detail[$DEFAULTLANG]["value"]["height"])?$data_detail[$DEFAULTLANG]["value"]["height"]:"";?>" onkeyup="saveTempData('height',this);">
														<span class="input-group-addon">PX</span>
													</div>
												</div>
												<div class="clearfix"></div>
											</div>*/?>
											<div class="mb0 mt0" style="color:red;">※圖片尺寸限制為 1400px*540px</div>
											<div class="section-divider mb40 mt20"><span> BANNER </span></div>
											<div class="mb35">
											<?php
												( empty( $data_detail[$DEFAULTLANG]["value"] )  ) ? $data_detail[$DEFAULTLANG]["value"] = array() : "";
												( empty( $data_detail[$DEFAULTLANG]["value"]["slider"] )  ) ? $data_detail[$DEFAULTLANG]["value"]["slider"] = array() : "";
											
												$display = count($data_detail[$DEFAULTLANG]["value"]["slider"]) > 0 ? "style=\"display:none;\"":"";
											?>
												<h1 class="text-center nestable-empty" <?php echo $display;?>>目前沒有BANNER</h1>
												<ol class="dd" id="nestable"></ol>
											</div>
											
										</div>
									</div>
									<div class="panel-footer">
										<div class="pull-right mt10 btn-group">
											<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
												<span class="ladda-spinner"></span>
											</button>
											<a class="btn btn-default" href="/admin/catalogue/listTable">返回</a>
										</div>
										<div class="clearfix"></div>
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
	
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Core.init();
            Demo.init();
        });
    </script>
    
	<script type="text/javascript">
	
	refer_uri = <?php echo ( $isNew ) ? "false" : "'/admin/catalogue/listTable'";?>;
	
	var bannerId = '<?php echo $bannerId;?>';
	<?php $jsIsNew = ( $isNew ) ? "T" : "F"; ?>
	var isNew = '<?php echo $jsIsNew;?>';
	var old_mainKey     = '<?php echo $data_product["detailKey"];?>';
	var data_product	= <?php echo json_encode($data_product);?>;
	var data_detail 	= <?php echo json_encode($data_detail);?>;
	var data_price 		= <?php echo json_encode($data_price);?>;
	var data_stock 		= <?php echo json_encode($data_stock);?>;
	
	function init_MainLangCodeSwitch(){
		
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
			//save 
			//saveTempData(langCode);
		});
		
		$('.main-langCode a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			var langCode 	= $(this).attr("data-langCode");
			
		});
	}
	
	function delWidget(id, self)
	{
		var lang = $(".main-langCode li.active a").attr("data-langCode");
		var CTSlider = data_detail[lang].value.slider;
		var newCTSlider = [];
		for( var k in  CTSlider )
		{
			if( k != id )
			{
				newCTSlider.push(CTSlider[k]);
			}
		}
		delete data_detail[lang].value.slider;
		data_detail[lang].value.slider = [];
		data_detail[lang].value.slider = newCTSlider;
		loadTempData();
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
										'<img height="120px" class="img-responsive" src="'+item.image.url+'" />' +
									'</div>' +
									'<div class="col-md-4" data-name="alt">' +
										 '<span>'+item.image.alt+'</span>' +
									'</div>' +
								'</div>' +
							'</div>' +
						'</div>' +
						'<div class="dd-edit pull-right">' +
							'<a href="/admin/catalogue/banner/slider?id='+bannerId+'&sid='+sortKey+'&sl='+lang+'" class="dd-edit-remove config">' +
								'<i class="fa fa-pencil "></i>' +
							'</a>' +
							'<a onclick="delWidget(\''+sortKey+'\',this);" class="dd-edit-remove config">' +
								'<i class="fa fa-times "></i>' +
							'</a>' +
						'</div>' +
					'</div>' +				
				'</li>';
		return newli;
	}
	
	function loadTempData()
	{
		var lang = $(".main-langCode li.active a").attr("data-langCode");
		( typeof( data_detail[lang].value.slider ) == "undefined" ) ? data_detail[lang].value.slider = [] : "";
		var CTSlider = data_detail[lang].value.slider;
		
		var MaxWidth  = (typeof(data_detail[lang].value.width) == "undefined")?"1920":data_detail[lang].value.width;
		var MaxHeight = (typeof(data_detail[lang].value.height) == "undefined")?"525":data_detail[lang].value.height;
		$("#blockMaxWidth").val(MaxWidth);
		$("#blockMaxHeight").val(MaxHeight);
				
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
				var CTSlider = data_detail[lang].value.slider;
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
				delete data_detail[lang].value.slider;
				data_detail[lang].value.slider = [];
				data_detail[lang].value.slider = newCTSlider;
			});
		}
	}
	
	function saveTempData( key, self )
	{
		var lang = $(".main-langCode li.active a").attr("data-langCode");
		(typeof(data_detail[lang].value[key]) == "undefined")?data_detail[lang].value[key]="":"";
		(typeof(data_detail[lang].value[key]) == "undefined")?data_detail[lang].value[key]="":"";
		data_detail[lang].value[key] = $(self).val();
	}
	
	function init_pagesave()
	{
		$('.page-save').click(function(e){
			e.preventDefault();
			
			var ajaxData = {
				"data_product": data_product,
				"data_detail" : data_detail,
				"data_price"  : data_price,
				"data_stock"  : data_stock
			};
			( isNew == "T" )?ajaxData['isNew']=true:'';
			
			var l = Ladda.create(this);
			l.start();
			$.ajax({
				url: "<?php echo base_url('/admin/catalogue/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data: ajaxData,
				success:function(data, status, xhr){
					console.log(data, status, xhr);
					l.stop();
					
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'儲存完成！':"儲存失敗！";
					PM.show({title: data.message,text: text,type: type});
					
					setTimeout(function(){
						//location.href = "/admin/catalogue/listTable";
					},1000);
				},
				error:function(xhr, stauts, err){
					l.stop();
					//console.log(xhr, stauts, err);
					PM.erro();
				}
			}).always(function() { l.stop(); });
			//l.stop();
			return false;
		});
	}
		
	function selectMediaStack()
	{
		MediaStack.popup({
			selectActionFunction : function(e){
				var file = MediaStack.convertFileObject(e);
				var lang = $(".main-langCode li.active a").attr("data-langCode");
				var item = { "image" : file };
				data_detail[lang].value.slider.push(item);
				loadTempData();
				$('.page-save').eq(0).click();
			}
		});
	}
	
	
	$(function(){
		init_MainLangCodeSwitch();
		init_pagesave();
		
		loadTempData();
	});
	</script>
	
</body>
</html>