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
.show-img {
  width: <?php echo $data_detail[$bannerLang]['value']['width'];?>px;
  height: <?php echo $data_detail[$bannerLang]['value']['height'];?>px;
}

.unset {
  padding: 0px !important;
  margin: 0px !important;
}

.ui-widget-content.draggable {
  position: absolute;
  top: 10px;
  left: 10px;
  border: 1px dashed red;
  padding: 3px 6px;
  cursor:pointer;
}
#draggable-textBlock {
  min-width: 100px;
  min-height: 30px;
  max-width:100%;
}
.row.table-layout .br-a {
  vertical-align: middle !important;
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
                        <li class="crumb-active">
                            <a>BANNER</a>
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
									<div class="panel-heading text-center">
										<div class="caption">
											編輯區塊
										</div>
									</div>
									<div class="panel-body admin-form theme-primary">
										<div class="col-md-12 unset">
											<div class="panel panel-info panel-border top">
														<div class="panel-heading text-center">
															<span class="panel-title">BANNER 編輯器</span>
														</div>
														<div class="panel-body unset">
															<div class="has-error text-left">
																<span class="help-block mt5"><i class="fa fa-bell"></i> 虛線為示意，前台不顯示！</span>
																<span class="help-block mt5"><i class="fa fa-bell"></i> 視窗解析度不足，將會影響編輯結果之座標值！</span>
															</div>
															<div class="col-md-12 unset">
																<div class="col-md-12 br-a br-light bg-light p15">
																	<div class="row">
																		<div class="col-md-8 col-md-offset-2 text-center">
																			<a class="btn btn-success" onclick="selectMediaStack();">
																				<i class="glyphicon glyphicon-plus"></i> <span>選擇照片</span>
																			</a>
																		</div>
																	</div>
																</div>
																<div class="col-md-12 br-a br-light bg-light dark va-t p10">
																	<div id="animation-switcher" class="unset">
																		<div class="row unset">
																			<div class="col-xs-12 img-block unset">
																				<?php $imgUrl = $data_detail[$bannerLang]['value']['slider'][$sliderId]['image']['url']; ?>
																				<div class="draggable-block">
																					<img src="<?php echo $imgUrl;?>" id="bannerbkimg" class="show-img"/>			
																					<div id="draggable-textBlock" data-type="textBlock" class="ui-widget-content draggable">
																					<?php
																						echo isset($data_detail[$bannerLang]['value']['slider'][$sliderId]["text"])? $data_detail[$bannerLang]['value']['slider'][$sliderId]["text"]:"文字區塊";
																					?>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row table-layout">
																	<div class="col-xs-2 br-a br-light bg-light p30">
																		<div class="row">
																			<div class="col-md-12 text-center">描述</div>
																		</div>
																	</div>
																	<div class="col-xs-4 br-a br-light bg-light dark va-t p10">
																		<div class="row">
																			<div class="col-xs-12 text-center">
																				<input id="logo-alt" class="form-control" value="<?php
																		echo isset($data_detail[$bannerLang]['value']['slider'][$sliderId]["image"]["alt"])? $data_detail[$bannerLang]['value']['slider'][$sliderId]["image"]["alt"]:"sample";
																	?>" onkeyup="saveImageALT(this);" />
																			</div>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																</div>
																<div class="col-md-12 br-a br-light bg-light dark va-t p10">
																	<textarea name="ckeditor1" id="ckeditor1" rows="12">
																	<?php
																		echo isset($data_detail[$bannerLang]['value']['slider'][$sliderId]["text"])? $data_detail[$bannerLang]['value']['slider'][$sliderId]["text"]:"文字區塊";
																	?>
																	</textarea>
																</div>
																<div class="clearfix"></div>
															</div>
														</div>
											</div>
											<div class="clearfix"></div>
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
	
		refer_uri = <?php echo ( $isNew ) ? "false" : "'/admin/catalogue/listTable'";?>;
		
		var bannerId 	= '<?php echo $bannerId;?>';
		var sliderId 	= '<?php echo $sliderId;?>';
		var bannerLang 	= '<?php echo $bannerLang;?>';
		<?php $jsIsNew = ( $isNew ) ? "T" : "F"; ?>
		var isNew = '<?php echo $jsIsNew;?>';
		var old_mainKey     = '<?php echo $data_product["detailKey"];?>';
		var data_product	= <?php echo json_encode($data_product);?>;
		var data_detail 	= <?php echo json_encode($data_detail);?>;
		var data_price	 	= <?php echo json_encode($data_price);?>;
		var data_stock	 	= <?php echo json_encode($data_stock);?>;
		
		var maxWidth 	= data_detail[bannerLang]['value']['width'];
		var maxHeight	= data_detail[bannerLang]['value']['height'];
		
		
		var bkofs = false;
		function init_draggable_offset()
		{	
			var w = $("#bannerbkimg").outerWidth() + 110;
			$(".tray").css({"max-width":w,"width":w});
			$("#topbar").css({"max-width":w,"width":w});
			bkofs = $(".draggable-block").offset();
			
			var CTOffset = ( typeof( data_detail[bannerLang]['value']['slider'][sliderId].offset ) == "undefined" )?{top: 5, left: 5}:data_detail[bannerLang]['value']['slider'][sliderId].offset; 
			
			CTOffset.top = bkofs.top + ( ( CTOffset.top / 100 ) * maxHeight );
			CTOffset.left = bkofs.left + ( ( CTOffset.left / 100 ) * maxWidth );
			console.log(CTOffset);
			
			$("#draggable-textBlock").offset({ top : CTOffset.top, left : CTOffset.left});				
		}
		
		function saveImageALT(self)
		{
			data_detail[bannerLang]['value']['slider'][sliderId].image.alt = $(self).val();
		}
		
        jQuery(document).ready(function() {
            Core.init();
            Demo.init();
			
            CKEDITOR.disableAutoInline = true;

            // Init Ckeditor
            var editorContent1 = CKEDITOR.replace('ckeditor1', {				
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 400
            });
			
			for (var i in CKEDITOR.instances) {
				CKEDITOR.instances[i].on('change', function(evt) {
					var id = $(this).attr("id");

					if( id == "cke_1" )
					{
						data_detail[bannerLang]['value']['slider'][sliderId].text = evt.editor.getData();
						$("#draggable-textBlock").html(evt.editor.getData());
					}
			
				});
			}
			
			init_draggable_offset();
			
			$( ".draggable" ).draggable({
				containment: ".show-img",
				stop: function() {
					
					var offset = $(this).offset();			
					
					var newLeft = ( ( ( offset.left - bkofs.left ) / maxWidth ) * 100 );
					var newTop  = ( ( ( offset.top  - bkofs.top  ) / maxHeight ) * 100 );
					$(this).offset();
					
					data_detail[bannerLang]['value']['slider'][sliderId].offset = { top : newTop.toString(), left : newLeft.toString()};
				}
			});
        });
	
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
				file.alt = "";
				data_detail[bannerLang]['value']['slider'][sliderId].image = file;
				$("#bannerbkimg").attr("src",file.url);
			}
		});
	}
	
	
	$(function(){
		init_pagesave();
		
	});
	</script>
	
</body>
</html>