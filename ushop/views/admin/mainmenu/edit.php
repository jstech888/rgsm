<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
.menu-contain-selector a {
  text-align: center;
}
.white-popup {
  position: relative;
  background: #FFF;
  width: 90% ;
  max-width: 90% !important;
  margin: 20px auto;
}
#list-textarea {
  width: 100%;
  height: 300px;
}
.hint {
  margin: 5px 0;
}
.col-lg-12 {
	padding:0;
}
.image-list {
	float:left;
}
.image-list {
  margin: 15px 0;
  padding: 0;
}
.control-label {
  font-size: 18px;
  text-align: right;
  line-height: 39px;
}
.list-row {
	border-bottom:1px solid #e4e4e4;
	margin-bottom:5px;
	padding:5px 0 ;
}
.caret-tp hidden-xs {
  display: inline-block !important;
  margin: 10px;
}
label.radio {
  position:	inherit !important; 
  margin-right: inherit !important; 
  background: inherit !important; 
  display: inherit !important; 
  border: 1px #eee solid !important; 
  height: inherit !important; 
  width: inherit !important; 
  top: inherit !important; 
  border-radius:0 !important;
}

.hover-block {	
  float: none;
  display: inline-block;
}
.list-remove {
  position: absolute;
  margin-left: -23px;
  margin-top: 11px;
  color: red;
  cursor:pointer;
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
                        <li class="crumb-active">
                            <a href="<?php echo base_url("/admin/mainmenu/listTable");?>"><?php echo $title;?></a>
                        </li>
                        <li class="crumb-active">
                            <a>編輯</a>
                        </li>
                        <li class="crumb-active">
                            <a></a>
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
										</div>
									</div>
									<div class="panel-body">
										<div class="section row">
											<div class="col-md-2">
												<h5 class="text-muted text-right">選單名稱</h5>
											</div>
											<div class="col-md-8">
												<input type="text" name="title" id="modal-title" class="gui-input form-control" onkeyup="saveTempData('title',this);" value="<?php echo $widget["title"];?>">
											</div>
										</div>
										<div class="section row mt15">
											<div class="col-md-2">
												<h5 class="text-muted text-right">選單連結</h5>
											</div>
											<div class="col-md-8">
												<input type="text" name="href" id="modal-href" class="gui-input form-control" onkeyup="saveTempData('href',this);" value="<?php echo $widget["href"];?>">
											</div>
										</div>
										<div class="section row menu-contain-selector text-center">
											<div class="col-sm-12 mb15" style="border-bottom: 1px solid #999;">
												<h5 class="text-muted mtn mt25  text-center">選擇內容</h5>
											</div>
											<?php 
												$linkAct = ( $widget["type"] == "link" ) ? "holder-active" : "";
												$listAct = ( $widget["type"] == "list" ) ? "holder-active" : "";
												$listLinkAct = ( $widget["type"] == "listLink" ) ? "holder-active" : "";
											?>
											<div class="col-md-3 hover-block">
												<a class="holder-style p15 mb20 <?php echo $linkAct;?>" href="#editor-link">
													<span class="fa fa-link fs40 holder-icon"></span>
													<br> 主選單連結
												</a>
											</div>
											
											<div class="col-md-3 hover-block">
												<a class="holder-style p15 mb20 <?php echo $listAct;?>" href="#editor-list">
													<span class="fa fa-list-ul fs40 holder-icon"></span>
													<br> 子選單系列連結
												</a>
											</div>
											
											<div class="col-md-3 hover-block">
												<a class="holder-style p15 mb20 <?php echo $listLinkAct;?>" href="#editor-listLink">
													<span class="fa fa-list-ul fs40 holder-icon"></span>
													<br> 子選單項目連結
												</a>
											</div>
										</div>
										<!-- end section row section -->

										<div class="section menu-contain-editor">
											<div class="tab-content">
											<?php 
												$linkAct 	 = ( $widget["type"] == "link" ) 	 ? "active" : "";
												$listAct 	 = ( $widget["type"] == "list" ) 	 ? "active" : "";
												$listLinkAct = ( $widget["type"] == "listLink" ) ? "active" : "";
											?>
												<!--<div id="editor-link" class="tab-pane <?php echo $linkAct;?>">
													<div class="col-lg-12">
														<div class="hint" ></div>
														<div class="clearfix"></div>
													</div>
												
													<div class="col-lg-12 text-center">
														<a class="btn btn-default">無子選單</a>
													</div>												
												</div>-->
												<div id="editor-list" class="tab-pane <?php echo $listAct;?>">
													<div class="col-lg-12">
														<div class="hint" ></div>
														<div class="clearfix"></div>
													</div>
												
													<div class="col-lg-12">
													<?php
													if( $listAct == "active" )
													{
														foreach( $widget["content"] AS $k => $submenu )
														{
													?>
															<div class="form-group list-row">
																<div for="title" class="col-lg-1 control-label">
																	<span class="glyphicons glyphicons-circle_minus list-remove"></span>名稱</div>
																<div class="col-lg-3">
																	<input type="text" class="form-control list-title" value="<?php echo $submenu["title"];?>">
																</div>
																<div class="col-lg-2 text-right">
																<?php
																	$isTitle = ($submenu["type"] == "title") ? "selected" : "";
																	$isHref  = ($submenu["type"] == "link")  ? "selected" : "";
																?>
																	<select class="form-control list-type">
																		<option value="title" <?php echo $isTitle;?>>標頭</option>
																		<option value="link"  <?php echo $isHref;?>>連結</option>
																	</select>
																</div>
																<label for="href" class="col-lg-1 control-label list-content">連結</label>
																<div class="col-lg-3 list-content">
																	<input type="text" class="form-control list-href" value="<?php echo $submenu["href"];?>">
																</div>
																<div class="clearfix"></div>
															</div>
													<?php
														}
													}
													?>
														<div class="form-group add-row">
															<div class="col-lg-12 text-center">
																<a href="#modal-form" class="btn ladda-button btn-info .btn-xs add-list-row" data-style="zoom-in">
																	<span class="ladda-label"><span class="glyphicons glyphicons-circle_plus"></span> 添加一列</span>
																	<span class="ladda-spinner"></span>
																</a>
															</div>
														</div>
													</div>
													<div class="clearfix"></div>
												</div>
												<div id="editor-listLink" class="tab-pane <?php echo $listLinkAct;?>">
													<div class="col-lg-12">
														<div class="hint" ></div>
														<div class="clearfix"></div>
													</div>
													<div class="col-lg-12">
													<?php
													if( $listLinkAct == "active" )
													{
														foreach( $widget["content"] AS $submenu )
														{
													?>
															<div class="form-group list-row">
																<label for="title" class="col-lg-1 control-label">
																	<span class="glyphicons glyphicons-circle_minus list-remove"></span>名稱</label>
																<div class="col-lg-3">
																	<input type="text" class="form-control list-title" value="<?php echo $submenu["title"];?>">
																</div>
																<label for="href" class="col-lg-1 control-label list-content">連結</label>
																<div class="col-lg-5 list-content">
																	<input type="text" class="form-control list-href" value="<?php echo $submenu["href"];?>">
																</div>
																<div class="clearfix"></div>
															</div>
													<?php
														}
													}
													?>
														<div class="form-group add-row">
															<div class="col-lg-12 text-center">
																<a href="#modal-form" class="btn ladda-button btn-info .btn-xs add-list-row" data-style="zoom-in">
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
									
									
									</div>								
								</div>								
								<div class="pull-right mt10">
									<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
										<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
										<span class="ladda-spinner"></span>
									</button>
									<a href="/admin/mainmenu/listTable" class="btn btn-default">返回</a>
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
	
	<div style="display:none;">	
		<div sample="editor-list">
			<div class="form-group list-row">
				<label for="title" class="col-lg-1 control-label">
					<span class="glyphicons glyphicons-circle_minus list-remove"></span>名稱</label>
				<div class="col-lg-3">
					<input type="text" class="form-control list-title" placeholder="title...">
				</div>
				<div class="col-lg-2 text-right">
					<select class="form-control list-type">
						<option value="title">標頭</option>
						<option value="href" selected>連結</option>
					</select>
				</div>
				
				<label for="href" class="col-lg-1 control-label list-content">連結</label>
				<div class="col-lg-3 list-content">
					<input type="text" class="form-control list-href" placeholder="links...">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div sample="editor-listLink">
			<div class="form-group list-row">
				<label for="title" class="col-lg-1 control-label">
					<span class="glyphicons glyphicons-circle_minus list-remove"></span>名稱</label>
				<div class="col-lg-3">
					<input type="text" class="form-control list-title" placeholder="title...">
				</div>
				<label for="href" class="col-lg-1 control-label list-content">連結</label>
				<div class="col-lg-5 list-content">
					<input type="text" class="form-control list-href" placeholder="links...">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

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
		refer_uri = "/admin/mainmenu/listTable";
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();
			
        });
		
		var obj_item 	= <?php echo json_encode($widget);?>;
		var menuItem 	= false;
		
		function saveTempData(key, self)
		{
			obj_item[key] = $(self).val();
		}
		
		function init_pagesave()
		{
			$(".page-save").click(function(e){
				e.preventDefault();
				var l = Ladda.create(this);
				l.start();
				$.ajax({
					url: "<?php echo base_url('/admin/mainmenu/save');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{
						"mainmenuData" : obj_item
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
		}
		
		var listObject = {};
		listObject.link = {
			init:function(){},
			clear:function(){}
		};
		
		listObject.list = {
			init:function(){
				parent = this;
				$("#editor-list .list-title").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("keyup");
					$(this).bind("keyup",function(){
						var val = $(this).val();
						var key = $(this).attr("data-key");
						obj_item.content[key].title = val;
					});
				});
				$("#editor-list .list-type").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("change");
					$(this).bind("change",function(){
						var val = $(this).val();
						var key = $(this).attr("data-key");
						obj_item.content[key].type = val;
						if(val == "title")
						{
							obj_item.content[key].href = "";
							$(this).parent().parent().find(".list-content").fadeOut();
						}
						else
						{
							$(this).parent().parent().find(".list-content").fadeIn();
						}
					});
				});
				$("#editor-list .list-href").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("keyup");
					$(this).bind("keyup",function(){
						var val = $(this).val();
						var key = $(this).attr("data-key");
						obj_item.content[key].href = val;
					});
				});
				
				$("#editor-list .list-remove").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("click");
					$(this).bind("click",function(){
						var val = $(this).val();
						var key = $(this).attr("data-key");
						obj_item.content[key].href = val;
						$("#editor-list .list-row").eq(key).remove();
						var newContent = []
						for( var k in obj_item.content )
						{
							if( k != key )
							{
								newContent.push(obj_item.content[k]); 
							}								
						}
						delete obj_item.content;
						obj_item.content = [];
						obj_item.content = newContent;
						parent.init();
					});
				});
				
				$("#editor-list .add-list-row").unbind("click");
				$("#editor-list .add-list-row").bind("click",function(){
					var newItme = $("[sample=\"editor-list\"] > .list-row").clone();
					obj_item.content.push({title:"",type:"link",href:""});
					newItme.insertBefore($("#editor-list .add-row"));
					parent.init();
				});
			},
			clear: function(){
				obj_item.content = [];
				$("#editor-list .list-row").remove();
			}
			
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
						obj_item.content[key].title = val;
					});
				});
				$("#editor-listLink .list-type").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("change");
					$(this).bind("change",function(){
						var val = $(this).val();
						var key = $(this).attr("data-key");
						obj_item.content[key].type = val;
						if(val == "title")
						{
							obj_item.content[key].href = "";
							$(this).parent().parent().find(".list-content").fadeOut();
						}
						else
						{
							$(this).parent().parent().find(".list-content").fadeIn();
						}
					});
				});
				$("#editor-listLink .list-href").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("keyup");
					$(this).bind("keyup",function(){
						var val = $(this).val();
						var key = $(this).attr("data-key");
						obj_item.content[key].href = val;
					});
				});
				
				
				$("#editor-listLink .list-remove").each(function(index, value){
					$(this).attr("data-key",index);
					$(this).unbind("click");
					$(this).bind("click",function(){
						var val = $(this).val();
						var key = $(this).attr("data-key");
						obj_item.content[key].href = val;
						$("#editor-listLink .list-row").eq(key).remove();
						var newContent = []
						for( var k in obj_item.content )
						{
							if( k != key )
							{
								newContent.push(obj_item.content[k]); 
							}								
						}
						delete obj_item.content;
						obj_item.content = [];
						obj_item.content = newContent;
						parent.init();
					});
				});
				
				$("#editor-listLink .add-list-row").unbind("click");
				$("#editor-listLink .add-list-row").bind("click",function(){
					var newItme = $("[sample=\"editor-listLink\"] > .list-row").clone();
					newItme.insertBefore($("#editor-listLink .add-row"));
					obj_item.content.push({title:"",type:"link",href:""});
					parent.init();
				});
			},
			clear: function(){
				obj_item.content = [];
				$("#editor-listLink .list-row").remove();
			}
		};
		
		function init_hoverStyle()
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
		}
		
		$(function(){
			listObject[obj_item.type].init();
			
			init_hoverStyle();
			
			init_pagesave();
		});
	</script>
	
</body>
</html>