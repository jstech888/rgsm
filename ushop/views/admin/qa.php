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
  width: 10%;
  padding:25px;
  text-align: center;
}
.media-body {
  width: 1000px;
  min-width: 100%;
  max-width: 100%;
}
.panel {
  margin-bottom: 0px;
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
                    					
					<div class="panel">
						<div class="panel-heading">
							<!-- title -->
							<h3 class="panel-title text-muted text-center mt10 fw400"><?php echo $title;?></h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							
							<div class="tabs-menu main-langCode">
								<ul class="nav nav-tabs" role="tablist">
								
								<?php 
									$enActive = ( $Lang == "en" ) 		? " class=\"active\"" : "";
									$twActive = ( $Lang == "zh-hant" ) 	? " class=\"active\"" : "";
								?>
									<li role="presentation"<?php echo $enActive;?>><a href="#home" 		aria-controls="home" 		role="tab" data-toggle="tab" data-langCode="en">英文</a></li>
									<li role="presentation"<?php echo $twActive;?>><a href="#profile" 	aria-controls="profile" 	role="tab" data-toggle="tab" data-langCode="zh-hant">繁體中文</a></li>
								</ul>
								
								
							</div>
							<div class="tabs-content">
								<div class="panel panel-default panel-border top mb25" id="pagemeta">
									<div class="panel-heading">
										<span class="panel-title">頁面名稱</span>
									</div>
									<div class="panel-body pn">
										<div style="padding:15px;">
											<input class="form-control" name="title" value="<?php echo $meta["value"]["title"];?>" />
										</div>
									</div>
									<div class="panel-footer">
										<div class="pull-right">
											<a class="btn btn-default" onclick="savePageMetaTemp();" >儲存</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="panel panel-success panel-border top mb25">
									<div class="panel-heading">
										<span class="panel-title">類別管理</span>
										<div class="pull-right">
											<a class="btn btn-success btn-xs" onclick="addType();">新增</a>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="panel-body pn">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>名稱</th>
													<th>操作</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$ind = 1;
											foreach( $listType AS $row )
											{
											?>
												<tr>
													<td><?php echo $ind;?></td>
													<td><input class="form-control" value="<?php echo $row["type"];?>" onkeyup="saveTempType('<?php echo $row["id"];?>',this);" /></td>
													<td><a class="btn btn-danger btn-xs" onclick="delType('<?php echo $row["id"];?>','<?php echo $row["type"];?>');">刪除</a></td>
												</tr>
											<?php
												$ind++;
											}
											?>
											</tbody>
										</table>
									</div>
									<div class="panel-footer">
										<div class="pull-right">
											<a class="btn btn-success" onclick="saveType();">儲存</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								
								<div class="panel panel-info panel-border top">
									<div class="panel-heading">
										<span class="panel-title">問答管理</span>
										<div class="pull-right">
											<a class="btn btn-info btn-xs" onclick="addQuest();">新增</a>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="panel-body ">
								
										<div class="dd" id="nestable">
											<ol class="dd-list">
											<?php
												foreach($listQuest AS $k=>$item )
												{
											?>
												<li class="dd-item sample-item" data-id="<?php echo $item["sortKey"];?>" data-item-id="<?php echo $item["id"];?>">
													<div class="dd-handle" data-name="title"></div>
													<div class="dd-content">
														<div class="media">
															<span class="text-warning pull-right fs11 fw600" data-name="type" ></span>
															<div class="dd-handle media-left">
																<h2 class="glyphicons glyphicons-lightbulb" data-name="type-icon"></h2>
															</div>
															<div class="media-body" data-name="content">
																<div class="col-md-3">
																	<select class="form-control" onchange="changeQAType('<?php echo $item["id"];?>',this);">
																	<?php
																		foreach($listType AS $row)
																		{
																			$isSed = ( $row["id"] == $item["type_id"] ) ? "selected" : "";
																			echo "<option value=\"".$row["id"]."\" ".$isSed.">".$row["type"]."</option>";
																		}
																		$isSed = ( "-1" == $item["type_id"] ) ? "selected" : "";
																		echo "<option value=\"-1\" ".$isSed.">隱藏</option>";
																	?>
																	</select>
																</div>	
																<div class="col-md-3">
																	<span>問題：<?php echo $item["quest"];?></span>
																</div>	
																<div class="col-md-4" style="max-height: 100px;overflow:auto;">
																	<span>回答：<?php echo $item["answer"]["html"];?></span>		
																</div>									
															</div>
														</div>
														<div class="dd-edit pull-right">
															<a class="dd-edit-change config" href="/admin/page/edit/qa?id=<?php echo $item["id"];?>">
																<i class="fa fa-pencil"></i>
															</a>
															<a class="dd-edit-remove config" onclick="delQuest('<?php echo $item["id"];?>','<?php echo $item["quest"];?>');">
																<i class="fa fa-times "></i>
															</a>
														</div>
													</div>
												</li>
											<?php
												}
											?>
											</ol>
										</div>
										
									</div>
									<div class="panel-footer">
										<div class="pull-right">
											<a class="btn btn-info page-save" data-style="zoom-in">
												<span class="ladda-label">儲存</span>
												<span class="ladda-spinner"></span>
											</a>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="clearfix"></div>
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
        });
		
		var metapage = <?php echo json_encode($meta);?>;
		function savePageMetaTemp()
		{
			metapage.value.title = $('#pagemeta input[name="title"]').val();
			
			savePageMeta(metapage);
		}
    </script>
    <!-- END: PAGE SCRIPTS -->
	
	<script type="text/javascript">
		var key				= "<?php echo $title;?>";
		var Lang			= "<?php echo $Lang;?>";
		var listType        = <?php echo json_encode($listType);?>;
		var listQuest       = <?php echo json_encode($listQuest);?>;
		
		function addType()
		{
			var newType = window.prompt("請輸入類別名稱？", "");
			if( newType != null )
			{
				$.ajax({
					url: "<?php echo base_url('/page/save_qaType');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{
						"postData" : [{
							"id"   		: -1,
							"type" 		: newType,
							"langCode" 	: Lang
						}]
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
						
						setTimeout(function(){
						  location.reload();
						},1000);
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
				});
			}
		}
		
		function delType(id, title)
		{
			if(confirm("確定刪除" + title))
			{
				$.ajax({
					url: "<?php echo base_url('/page/delete_QAType');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{
						"id" : id
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
						
						setTimeout(function(){
						  location.reload();
						},1000);
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
				});
			}
		}
		
		function saveTempType( id, self )
		{
			var newType = $(self).val();
			
			for( var k in listType )
			{
				if( listType[k].id == id )
				{
					listType[k].type = newType;
				}
			}
		}
		
		function saveType()
		{
			$.ajax({
				url: "<?php echo base_url('/page/save_qaType');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"postData" : listType
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
					
					setTimeout(function(){
					  location.reload();
					},1000);
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
			});
		}
		
		var contentCKED		= "";
		function addQuest()
		{
			var newQuest = window.prompt("請輸入問答題目？", "");
			if( newQuest != null )
			{
				$.ajax({
					url: "<?php echo base_url('/page/save_qa');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{
						"postData" : [{
							"id"   		: -1,
							"type_id"	: -1,
							"quest"		: newQuest,
							"answer"	: {"html":""},
							"sortKey"	: listQuest.length,
							"langCode" 	: Lang
						}]
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
						
						setTimeout(function(){
						  location.reload();
						},1000);
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
				});
			}
		
		}
		
		function delQuest(id, title)
		{
			if(confirm("確定刪除" + title))
			{
				$.ajax({
					url: "<?php echo base_url('/page/delete_qa');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{
						"id" : id
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
						
						setTimeout(function(){
						  location.reload();
						},1000);
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
				});
			}
		}
		
		function changeQAType( id, self )
		{
			var type = $(self).val();
			$.ajax({
				url: "<?php echo base_url('/page/save_qa');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"postData" : [
						{ "id" : id, "type_id" : $(self).val() }
					]
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
					
					setTimeout(function(){
					  location.reload();
					},1000);
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
			});
		}
		
		var sortQuest = [];
		
		$(function(){
			
            $('#nestable').nestable();
			$('#nestable').on("change",function(e){
				delete sortQuest;
				sortQuest = [];
				var list   	= e.length ? e : $(e.target);
				var	raw		= list.nestable('serialize');	
				var cnt		= 0;
				for( var k in raw )
				{
					sortQuest.push({"id":raw[k]['itemId'],"sortKey":cnt});
					cnt++;
				}
			});
			
			
			MainLangCode();
		
			$('.page-save').click(function(e){
				if( sortQuest.length > 0 )
				{
					e.preventDefault();				
					var l = Ladda.create(this);
					l.start();
					$.ajax({
						url: "<?php echo base_url('/page/save_qa');?>",
						async:true,
						cache:false,
						method:"POST",
						data:{
							"postData" : sortQuest
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
							
							setTimeout(function(){
							  location.reload();
							},1000);
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
				}
			});
		});
	</script>
</body>

</html>