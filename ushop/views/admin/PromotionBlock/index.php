
<body class="editors-page invoice-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style> 
.control-label {
  font-size: 18px;
  padding: 0;
  padding-top: 0 !important;
}
.admin-form .section-divider span {
  background: #fff;
}
.ms-container {
  margin: 0 auto;
  width: 100%;
}
.custom-header {
  font-size: 18px;
  text-align: center;
  background: #30363E;
  color: #fff;
  font-weight: bold;
  padding: 5px 10px;
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
                            <a>Widget管理</a>
                        </li>
                        <li class="crumb-active">
							<a>主題活動首頁 精選區塊</a>
						</li>
                    </ol>
                </div>
                <div class="topbar-right">
					<!-- <input type="radio" name="show" class="widget-isShow" checked> -->
                </div>
            </header>
            <!-- End: Topbar -->
			

            <!-- Begin: Content -->
            <section id="content" class="">

                <div class="panel panel-primary panel-border top">
                    <div class="panel-heading">
                        <span class="panel-title"> <span class="glyphicon glyphicon-user"></span> 精選區塊</span>
                    </div>
                    <div class="panel-body p20 admin-form theme-primary" id="invoice-item">					
						<div class="tabs-menu main-langCode ">
							<ul class="nav nav-tabs" role="tablist"><ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul>
						</div>
						<div class="tabs-content main-tab-content">
						
							<table class="table table-striped table-hover" id="block-list" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>標題</th>
										<th>操作</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>#</th>
										<th>標題</th>
										<th>操作</th>
									</tr>
								</tfoot>
								<tbody></tbody>
							</table>
							<hr/>			
							<div class="panel panel-info panel-border top">
								<div class="panel-heading">
									<span class="panel-title">精選區塊 編輯器</span>
								</div>
								<div class="panel-body">
									<div class="form-group">
                                        <label for="inputTitle" class="col-lg-1 control-label">標題</label>
                                        <div class="col-lg-10">
                                            <input type="text" id="inputTitle" class="form-control" placeholder="">
                                        </div>
										<div class="clearfix"></div>
                                    </div>	
									<div class="form-group">
                                        <div class="col-lg-12">
											<select multiple="multiple" id="multiSelect1" name="multiSelectHot[]">
											<?php foreach( $listProduct AS $row ) { ?>
											  <option value="<?php echo $row['PID'];?>"><?php echo $row["detail"]['name'];?></option>
											<?php } ?>
											</select>
                                        </div>
										<div class="clearfix"></div>
                                    </div>		
								</div>
								<div class="panel-footer">
									<div class="pull-right btn-group">
										<a class="btn btn-create btn-info btn-xs" onclick="blockList.create();">新增</a>
										<a class="btn btn-editor btn-warning btn-xs" onclick="blockList.tempSave();">儲存</a>
										<a class="btn btn-editor btn-default btn-xs" onclick="blockList.cancel();">取消</a>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>		
							
						</div>
					</div>		
                    <div class="panel-footer">	
						<div class="pull-right btn-group">
							<a class="btn btn-info" onclick="blockList.save();">儲存</a>
						</div>
						<div class="clearfix"></div>
					</div>			
                </div>

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
	

    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/tagmanager/tagmanager.js"></script>

    <script type="text/javascript" src="/admin/vendor/plugins/multiselect/js/jquery.multi-select.js"></script>
	
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


            $("#multiSelect1").multiSelect({				
			  selectableHeader: "<div class='custom-header'>產品列表</div>",
			  selectionHeader: "<div class='custom-header'>精選產品</div>"
			});
			
			MainLangCode();
        });
    </script>
    
	<script type="text/javascript">
	var Lang		 	= '<?php echo $Lang;?>';
	var listRecommend 	= <?php echo json_encode($listRecommend);?>;
	
	$(function(){
		$('.date').datetimepicker({
			"format" : "YYYY/MM/DD",
			"pickTime": false
		});
		
		blockList.init();
		
		$(".btn-create").show();
		$(".btn-editor").hide();
	});
	
	var blockList = {
		currentId : false,
		init : function() {
			$("#block-list tbody").empty();
			for( var k in listRecommend )
			{
				var srcItem = listRecommend[k].value[Lang];
				var rowItem = "<tr>"+
								"<td>" + (parseInt(k)+1) + "</td>" +
								"<td>" + srcItem.title + "</td>" +
								"<td><a class=\"btn btn-warning btn-xs\" onclick=\"blockList.callToEditor('"+listRecommend[k].id+"');\">編輯</a><a class=\"btn btn-danger btn-xs\" onclick=\"blockList.del('"+listRecommend[k].id+"')\">移除</a></td>" +
							"</tr>";
				$("#block-list tbody").append(rowItem);
			}
		},
		create : function()
		{
			var newData = {};
			newData[Lang] = {
				title : $("#inputTitle").val(),
				listProduct : $("#multiSelect1").val(),
				langCode : Lang,
				sortKey : 0
			};
			$.ajax({
				url: "/admin/option/PromotionBlock/create",
				async:true,
				cache:false,
				method:"POST",
				data:{
					key : "PromotionBlock",
					value : newData,
					description : "主題促銷區塊"
				},
				success:function(data, status, xhr){
					PM.show({ title: "主題活動首頁 精選區塊", text: '新增完成', type: "info"});
					setTimeout(function(){location.reload()},1000);
				},
				error:function(xhr, stauts, err){
					PM.erro();
				}
			});
		},
		callToEditor : function(id) {
			this.currentId = id;
			var targetItem = {};
			for( var k in listRecommend )
			{
				if( listRecommend[k].id == id )
				{
					targetItem = listRecommend[k];
					break;
				}
			}
			( targetItem.value[Lang].listProduct == "none" ) ? targetItem.value['en'].listProduct = [] : "";
			$("#inputTitle").val(targetItem.value[Lang].title);
			$('#multiSelect1').multiSelect('deselect_all');
			var showSel = [];
			for( var k in targetItem.value[Lang].listProduct )
			{
				showSel.push(targetItem.value[Lang].listProduct[k].toString());
			}
			$('#multiSelect1').multiSelect('select', showSel);
			
			$(".btn-create").hide();
			$(".btn-editor").show();
		},
		tempSave: function(){
			
			for( var k in listRecommend )
			{
				if( listRecommend[k].id == this.currentId )
				{
					listRecommend[k].value[Lang].title = $("#inputTitle").val();
					listRecommend[k].value[Lang].listProduct = $("#multiSelect1").val();
					break;
				}
			}
			
			$(".btn-create").show();
			$(".btn-editor").hide();
			$("#inputTitle").val('');
			$('#multiSelect1').multiSelect('deselect_all');
			this.init();
		},
		save : function() {
			$.ajax({
				url: "/admin/option/PromotionBlock/save",
				async:true,
				cache:false,
				method:"POST",
				data:{
				  postData : listRecommend	
				},
				success:function(data, status, xhr){
					PM.show({ title: "主題活動首頁 精選區塊", text: '儲存完成', type: "info"});
					setTimeout(function(){location.reload()},1000);
				},
				error:function(xhr, stauts, err){
					PM.erro();
				}
			});
		},		
		del : function(id) {
			
			$.ajax({
				url: "/admin/option/PromotionBlock/delete",
				async:true,
				cache:false,
				method:"POST",
				data:{ id : id },
				success:function(data, status, xhr){
					PM.show({ title: "主題活動首頁 精選區塊", text: '刪除完成', type: "info"});
					setTimeout(function(){location.reload()},1000);
				},
				error:function(xhr, stauts, err){
					PM.erro();
				}
			});
		},
		cancel: function() {
			$(".btn-create").show();
			$(".btn-editor").hide();
			$("#inputTitle").val('');
			$('#multiSelect1').multiSelect('deselect_all');
		}
	};
	
	function page_save()
	{
		listRecommend[Lang].value = ( $("#multiSelect1").val() == null ) ? "" : $("#multiSelect1").val();
		
		$.ajax({
			url: "/admin/user/recommend/save",
			async:true,
			cache:false,
			method:"POST",
			data:{
				"postData" : listRecommend[Lang]
			},
			success:function(data, status, xhr){
				PM.show({ title: "推薦商品", text: '修改完成！', type: "info"});
				setTimeout(function(){
					//location.reload();
				},500);
			},
			error:function(xhr, stauts, err){
				PM.erro();
			}
		});
	}
	
	</script>
	
</body>
</html>