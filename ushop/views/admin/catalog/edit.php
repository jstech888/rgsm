<!-- Fancytree CSS -->
<link rel="stylesheet" type="text/css" href="/admin/vendor/plugins/fancytree/skin-win8/ui.fancytree.min.css">
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
                            <a>編輯</a>
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
											編輯區塊
										</div>
									</div>
									<div class="panel-body">
									
										<div class="col-sm-12" style="margin-bottom:15px;">
											<div class="form-group">
												<label for="product-key" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 15px;margin-bottom: 0;text-align: right;">SEO 網址搜索名稱</label>
												<div class="col-xs-7 col-md-8 col-lg-9">
													<input type="text" id="product-key" class="form-control globalInput" placeholder="" value="<?php echo $data_product["detailKey"]?>">
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
										
										<div class="panel mb30" id="p6">
											<div class="panel-heading">
												<span class="panel-title"> 類別編輯器 </span>
											</div>
											<div class="panel-body">
												<?php if( $isNew === false ) { ?> 
													<h2 id="tree6desp" class="text-center">新增產品無法設定類別</h2>
													<div id="tree6"></div>
												<?php } else { ?>
											<div class="form-group">
												<label for="product-parent-id" class="col-xs-4 col-md-3 col-lg-2 control-label" >選擇商品所在類別位置</label>
												<div class="col-xs-7 col-md-8 col-lg-9">
													<select class="form-control" onchange="saveTempProductData('parentId',this);">
														<option value="0">根層</option>
														<?php echo $OptionList;?>
													</select>
												</div>
											</div>
													<div class="clearfix"></div>
												<?php } ?>
											</div>
										</div>
										
							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist">
									<?php echo $htmlLangDefault;?>
								</ul>
							</div>
							<div class="tabs-content main-tab-content">
								<div class="col-sm-12" style="margin-bottom:15px;">
									<div class="form-group">
										<label for="product-name" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 15px;margin-bottom: 0;text-align: right;">建立類別名稱</label>
										<div class="col-xs-7 col-md-8 col-lg-9">
											<input type="text" id="product-name" class="form-control" placeholder="" value="<?php echo $data_detail[$DEFAULTLANG]['name']?>">
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-sm-12" style="margin-bottom:15px;">
									<div class="form-group">
										<label for="product-name" class="col-xs-4 col-md-3 col-lg-2 control-label" style="line-height: 38px;font-size: 15px;margin-bottom: 0;text-align: right;">排序</label>
										<div class="col-xs-7 col-md-8 col-lg-9">
											<input type="text" id="product-sortkey" class="form-control" placeholder="" value="<?php echo isset($currentPID)? $currentPID:"0" ?>" onkeyup="value=value.replace(/[^\d]/g,'')" >
											<span class="help-block mt5"><i class="fa fa-bell"></i> 排序:前台網站對應到的排序,數字小排序越前面,只允許數字</span>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								
								<div class="clearfix"></div>
							</div>

							<div class="clearfix"></div>
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

    <!-- Fancytree Plugin -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/jquery.fancytree-all.min.js"></script>

    <!-- Fancytree Addon - Childcounter -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.childcounter.js"></script>

    <!-- Fancytree Addon - Childcounter -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.columnview.js"></script>

    <!-- Fancytree Addon - Drag and Drop -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.dnd.js"></script>

    <!-- Fancytree Addon - Inline Edit -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.edit.js"></script>

    <!-- Fancytree Addon - Inline Edit -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.filter.js"></script>

	
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
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();
			/*
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
					['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					['Link','Unlink','Anchor'],
				    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
				    '/',
					['Format','FontSize','-','TextColor','BGColor']
				],
                height: window.screen.height - 400 ,
                on: {
                    instanceReady: function(evt) {
                       // $('.cke').addClass('admin-skin cke-hide-bottom');
                    }
                }
            });
			
            CKFinder.setupCKEditor( editorContent, '/admin/vendor/editors/ckfinder/');
			*/
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
	
	refer_uri = <?php echo ( $isNew ) ? "false" : "'/admin/catalogue/listTable'";?>;
		
	var old_mainKey     = '<?php echo $data_product["detailKey"];?>';
	var data_product	= <?php echo json_encode($data_product);?>;
	var data_detail 	= <?php echo json_encode($data_detail);?>;
	var data_price	 	= <?php echo json_encode($data_price);?>;
	var data_stock	 	= <?php echo json_encode($data_stock);?>;
	
	
	var menuItem 	= false;
	
	function init_MainLangCodeSwitch(){
		
		$(".main-langCode li a").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(e){
				$(".main-tab-content").fadeOut(500);
				$(".main-langCode li").removeClass("active");
				$(this).parent().addClass("active");
				$(".main-tab-content").fadeOut(500);
				var langCode = $(this).attr("data-langCode");
				//load 
				setTimeout(function(){
					loadTempData(langCode);
					$(".main-tab-content").fadeIn(500);
				},500);
				
			});
		});
		
		$('.main-langCode a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
			var langCode 	= $(this).attr("data-langCode");
			//save 
			saveTempData(langCode);
		});
		
		$('.main-langCode a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			var langCode 	= $(this).attr("data-langCode");
			
		});
	}
	
	function saveTempData(lang)
	{
		var mainkey = $("#product-key").val();
		data_product['detailKey'] = data_product['priceKey'] = data_product['stockKey'] = mainkey;
		data_product['sortkey'] = $("#product-sortkey").val();
		//data_product['parentId']  = $("#product-parent-id").val();
		
		data_detail[lang]['name'] = $("#product-name").val();
		
		for( var k in data_detail )
		{
			data_detail[k].detailKey = mainkey;
		}
		for( var k in data_price )
		{
			data_price[k].priceKey = mainkey;
		}
		
		
		for( var k in data_stock )
		{
			data_stock[k].stockKey = mainkey;
		}
	}
	
	function saveTempProductData(key, self)
	{
		data_product[key] = $(self).val();
	}
	
	function loadTempData(lang)
	{
		var detail = data_detail[lang];
		
		$("#product-name").val(detail['name']);
		
		$("#product-name").unbind("keyup");
		$("#product-name").bind("keyup",function(){
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			data_detail[lang]['name'] = $(this).val();
		});
	}
	
	var mainKeyisChange = false;
	function init_globalInputKeyUP()
	{
		$(".globalInput").unbind("keyup");
		$(".globalInput").bind("keyup",function(){
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			saveTempData(lang);
			if($(this).attr("id") == "product-key")
			{
				mainKeyisChange = (  $(this).val() != old_mainKey );
			}
		});
		
		$("#product-parent-id").unbind("change");
		$("#product-parent-id").bind("change",function(){
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			saveTempData(lang);
		});
	}
	
	function checkMainKeyExist()
	{
		var isExistRS = $.ajax({
				url: "<?php echo base_url('/admin/catalogue/isMainKeyExist');?>",
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
			
			var newKey = $("#product-key").val();
			if( newKey.trim().length == 0 )
			{
				PM.show({title: "欄位錯誤",text: '[SEO 網址搜索名稱] 不得為空白！',type: "danger"});
				return false;
			}
			var regex = /^[0-9a-zA-Z]{1,50}$/g;
			if( regex.test(newKey) == false )
			{
				PM.show({title: "欄位錯誤",text: '[SEO 網址搜索名稱] 有誤！僅能在1~50個字元內，大小寫英數字組合！',type: "danger"});
				return false;
			}
			
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			saveTempData(lang);
			
			if(mainKeyisChange)
			{
				var isExistRS = checkMainKeyExist();
				if( isExistRS == true )
				{
					PM.show({title: "欄位錯誤",text: '[SEO 網址搜索名稱] 僅用英數字命名，不可重複，不可使用非法字元！',type: "danger"});
					return false;					
				}
			}
			
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
						location.href = "/admin/catalogue/listTable";
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
	
	
	function activeMark()
	{
		$(".fancytree-title").each(function(){
			if( $(this).text() == currentProductTitle )
			{
				$(this).parent().find(".fancytree-icon").css({"background-position":"-48px -160px"});
			}
		});			
	}
	
	var temp = 0;
	function moveParentId(hitMode,target,self)
	{
		if( hitMode == "before" )
		{
			temp = data_product.parentId = target.parentId;
		}
		else if( hitMode == "over" || hitMode == "after" )
		{
			temp = data_product.parentId = target.id;
		}
	}
	
	function init_fancytree()
	{
		$("#tree6").fancytree({
            extensions: ["dnd", "edit", "childcounter"],
            // titlesTabbable: true,
            source: fancytree,
			childcounter: {
                   deep: true,
                   hideZeros: true,
                   hideExpanded: true
			},
            dnd: {
                autoExpandMS: 400,
                focusOnClick: true,
                preventVoidMoves: true, // Prevent dropping nodes 'before self', etc.
                preventRecursiveMoves: true, // Prevent dropping nodes on own descendants
                dragStart: function(node, data) {
                    /** This function MUST be defined to enable dragging for the tree.
                     *  Return false to cancel dragging of node.
                     */
					 
					var canDrag = ( typeof(node.data.draggable) == "undefined" ) ? false : node.data.draggable;
                    return canDrag;
                },
				dragStop: function(node, data) {
					activeMark();
				},
                dragEnter: function(node, data) {
                    /** data.otherNode may be null for non-fancytree droppables.
                     *  Return false to disallow dropping on node. In this case
                     *  dragOver and dragLeave are not called.
                     *  Return 'over', 'before, or 'after' to force a hitMode.
                     *  Return ['before', 'after'] to restrict available hitModes.
                     *  Any other return value will calc the hitMode from the cursor position.
                     */
                    // Prevent dropping a parent below another parent (only sort
                    // nodes under the same parent)
                    /*        if(node.parent !== data.otherNode.parent){
								return false;
							  }
							  // Don't allow dropping *over* a node (would create a child)
							  return ["before", "after"];
					*/
					var canDrag = ( typeof(node.data.droppable) == "undefined" ) ? false : node.data.droppable;
                    return canDrag;
                },
                dragDrop: function(node, data) {
                    /** This function MUST be defined to enable dropping of items on
                     *  the tree.
                     */
                    data.otherNode.moveTo(node, data.hitMode);
					moveParentId(data.hitMode,data.node.data,data.otherNode.data);
                }
            },
            activate: function(event, data) {
                //alert("activate " + data.node);
            }
        });
		activeMark();
	}
	
	<?php $jsIsNew = ( $isNew ) ? "T" : "F"; ?>
	var isNew = '<?php echo $jsIsNew;?>';
	var tree = false;
	var currentProductTitle= "<?php echo $currentProductTitle;?>";
	var fancytree = <?php echo json_encode($fancyTree);?>;
	
	$(function(){
		init_pagesave();
		init_MainLangCodeSwitch();
		
		/*
		var lang = $(".main-langCode li.active a").attr("data-langCode");
		loadTempData(lang);
		*/
		init_globalInputKeyUP();
		
		if(isNew == "F")
		{
			$("#tree6desp").hide();
			init_fancytree();
		}
		
		
		$("#product-name").unbind("keyup");
		$("#product-name").bind("keyup",function(){
			var lang = $(".main-langCode li.active a").attr("data-langCode");
			data_detail[lang]['name'] = $(this).val();
		});
	});
	</script>
	
</body>
</html>