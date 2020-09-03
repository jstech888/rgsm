
<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">小圖輪播</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">

							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul>
							</div>
							<div class="tabs-content main-tab-content">
								<!-- 表頭圖示 -->
												<div id="editor-listLink" class="tab-pane active">
													<div class="col-lg-12">
														<div class="hint" ></div>
														<div class="clearfix"></div>
													</div>
													<div class="col-lg-12">
														<?php $AwardListAry = $widget[$Lang][0]['value']; 
														foreach ($AwardListAry as $key => $Aobj) 
														{
														?>
														<div class="form-group list-row">
															<label for="title" class="col-lg-1 control-label">
																<span class="glyphicons glyphicons-circle_minus list-remove"></span>名稱</label>
															<div class="col-lg-2">
																<input type="text" class="form-control list-title" value="<?php echo $Aobj['title'];?>" placeholder="title...">
															</div>
															<label for="href" class="col-lg-1 control-label list-content">連結</label>
															<div class="col-lg-3 list-content">
																<input type="text" class="form-control list-href" value="<?php echo $Aobj['href'];?>" placeholder="links...">
															</div>
															<div class="col-lg-2">
																<a class="btn btn-info .btn-xs img-selected" >
																	<i class="glyphicon glyphicon-plus"></i>選擇照片( 288 x 288 pixel)													
																</a>
															</div>
															<div class="col-lg-3">
																<img src="<?php echo $Aobj['imgsrc']; ?>" class="img-thumbnail show-img" style="max-width: 150px;"/>
															</div>
															<div class="clearfix"></div>
														</div>

														<?php
														}
														?>
														<div class="form-group add-row">
															<div class="col-lg-12 text-center">
																<a class="btn ladda-button btn-info .btn-xs add-list-row" data-style="zoom-in">
																	<span class="ladda-label"><span class="glyphicons glyphicons-circle_plus"></span> 添加一列</span>
																	<span class="ladda-spinner"></span>
																</a>
															</div>
														</div>
													</div>
													<div class="clearfix"></div>
												</div>
							</div>
						</div>


												


						<!--<div class="panel-footer">
							<div class="pull-right">
								<a class="btn btn-info btn-save" onclick="saveImage();"> <span class="glyphicons glyphicons-file_import"></span>儲存 </a>
							</div>
							<div class="clearfix"></div>
						</div>-->
						<div class="pull-right mt10">
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
									<span class="ladda-spinner"></span>
								</button>
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
		<div sample="editor-listLink">
			<div class="form-group list-row">
				<label for="title" class="col-lg-1 control-label">
					<span class="glyphicons glyphicons-circle_minus list-remove"></span>名稱</label>
				<div class="col-lg-2">
					<input type="text" class="form-control list-title" placeholder="title...">
				</div>
				<label for="href" class="col-lg-1 control-label list-content">連結</label>
				<div class="col-lg-3 list-content">
					<input type="text" class="form-control list-href" placeholder="links...">
				</div>
				<div class="col-lg-2">
					<a class="btn btn-info .btn-xs img-selected" >
						<i class="glyphicon glyphicon-plus"></i>選擇照片( 288 x 288 pixel)												
					</a>
				</div>
				<div class="col-lg-3">
					<img src="" class="img-thumbnail show-img" style="max-width: 150px;"/>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

    <!-- BEGIN: PAGE SCRIPTS -->

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

    <!-- Theme Javascript -->
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/demo.js"></script>
    <script type="text/javascript" src="/admin/js/page.js"></script>
	
    <script type="text/javascript">

    var preview_src = "<?php echo base_url("view/show/AwardList");?>";
	
	var Lang		= '<?php echo $Lang;?>';
	var obj_item 	= <?php echo json_encode($widget);?>;
	var menuItem 	= false;
	
	var frd = 0;
	var srd = 0;

    jQuery(document).ready(function() {
	
        // Init Theme Core    
    	Core.init();
        // Init Theme Core    
        Demo.init();
	
    });
		
	function init_pagesave()
	{
		$('.page-save').click(function(e){
			e.preventDefault();
			var l = Ladda.create(this);
			l.start();
			var postData = {
				type       : "adList",
				widgetData : obj_item
			};
			//var l = Ladda.create(this);
			//l.start();
			//console.log(obj_item);
			
			$.ajax({
				url: "<?php echo base_url('/widget/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data:postData,
				success:function(data, status, xhr){
					//console.log(data, status, xhr);
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'儲存完成！':"儲存失敗！";
					PM.show({"title":data.message,"text":text,"type":type});
					setTimeout(function(){
						location.reload();
					},1000);
				},
				error:function(xhr, stauts, err){
					console.log(xhr, stauts, err);
					PM.erro();
				}
			}).always(function() { l.stop(); });
			
			l.stop();
			return false;
		});
	}

		/*function init_pagesave()
		{
			$(".page-save").click(function(e){
				e.preventDefault();
				var l = Ladda.create(this);
				l.start();
				$.ajax({
					url: "<?php echo base_url('/admin/save');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{
						"" : obj_item
					},
					success:function(data, status, xhr){
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'儲存完成！':"儲存失敗！";								
						new PNotify({ title: data.message, text: text, shadow: true, opacity: "0.75", type: type,
							stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 },
							width: "290px", delay: 1400
						});
						setTimeout(function(){
							location.href = "/admin/mainmenu/listTable";
						},500);			
					},
					error:function(xhr, stauts, err){
						setTimeout(function(){
							new PNotify({ title: "系統異常",　text: '該動作暫時無法完成！',　shadow: true,　opacity: "0.75",　type: "danger",
								stack: {　"dir1": "down",　"dir2": "left",　"push": "top", "spacing1": 10, "spacing2": 10 },
								width: "290px", delay: 1400
							});
						},500);
					}
				}).always(function() { l.stop(); });
				
				setTimeout(function(){ l.stop(); }, 5000 );
				return false;
			});
		}*/
		
		var listObject = {};
		listObject.link = {
			init:function(){},
			clear:function(){}
		};
		
		
		listObject.listLink = {
			init:function(){
				parent = this;
				
				$("#editor-listLink .list-title").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("keyup");
					$(this).bind("keyup",function(){
						var val = $(this).val();
						var key = $(this).attr("data-key");
						//obj_item.content[key].title = val;
						obj_item[Lang][0].value[key].title = val;
					});
				});
				$("#editor-listLink .list-href").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("keyup");
					$(this).bind("keyup",function(){
						var val = $(this).val();
						var key = $(this).attr("data-key");
						//obj_item.content[key].href = val;
						obj_item[Lang][0].value[key].href = val;
					});
				});
				
				
				$("#editor-listLink .list-remove").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("click");
					$(this).bind("click",function(){
						var val = $(this).val();
						var key = $(this).attr("data-key");
						obj_item[Lang][0].value[key].href = val;
						$("#editor-listLink .list-row").eq(key).remove();
						var newContent = []
						for( var k in obj_item[Lang][0].value )
						{
							if( k != key )
							{
								newContent.push(obj_item[Lang][0].value[k]); 
							}								
						}
						delete obj_item[Lang][0].value;
						obj_item[Lang][0].value = [];
						obj_item[Lang][0].value = newContent;
						parent.init();
					});
				});
				
				$("#editor-listLink .add-list-row").unbind("click");
				$("#editor-listLink .add-list-row").bind("click",function(){
					var newItme = $("[sample=\"editor-listLink\"] > .list-row").clone();
					newItme.insertBefore($("#editor-listLink .add-row"));
					obj_item[Lang][0].value.push({title:"",type:"link",href:"",imgsrc:""});
					parent.init();
				});

				$("#editor-listLink .img-selected").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("click");
					$(this).bind("click",function(){
						var key = $(this).attr("data-key");	
						tmp_obj = $(this).parent().parent() ; 
						selectMediaStack(tmp_obj,key) ;

						parent.init();
					});
				});
			},
			clear: function(){
				//obj_item.content = [];
				obj_item[Lang][0].value = [] ;
				$("#editor-listLink .list-row").remove();
			}
		};
		
		/*function init_hoverStyle()
		{
			$('.holder-style').each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(e) {
					e.preventDefault();
				
					var activeContent = $(this).attr('href');
				
					// Content button active
					$('.holder-style').removeClass('holder-active');
					$(this).addClass('holder-active');
					
					$(".menu-contain-editor").find(".tab-pane").removeClass("active");
					$(".menu-contain-editor").find(activeContent).addClass("active");
					
					var type = $(this).attr("href").replace("#editor-", "");
					
					obj_item["type"] = type;
					
					listObject[type].clear();
					listObject[type].init();
				});
			});
		}*/
		function selectMediaStack(dom_obj,objKey)
		{
			MediaStack.popup({
				basePath : "/uploads/members/",
				selectActionFunction : function(e){
					var file = MediaStack.convertFileObject(e);
					var val = file.url ; 
					//obj_item.content[objKey].imgsrc = val ;
					obj_item[Lang][0].value[objKey].imgsrc = val ;
					dom_obj.find(".show-img").attr("src",val );
					
				}
			});
		}
		$(function(){
			listObject["listLink"].init();
			
			init_pagesave();
			pageReload();
		
			MainLangCode();
		});

	</script>
	
</body>
</html>