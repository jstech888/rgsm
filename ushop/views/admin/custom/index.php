<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
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
#datatable3_length {
  margin: 15px;
}
select[name="datatable3_length"] {
  display:inline-block;
}
#datatable3_filter {
  margin: 15px;
}
input[type="search"]{
  display: inline-block;
}
#datatable3_info {
  margin: 15px;
}
#datatable3_paginate {
  margin: 15px;
}

.control-group {
  color: transparent;
}

.tools {
  position: absolute;
  top: 5px;
  right: 18px;
}
.tools .edit {
  color: rgb(15, 94, 222);
  font-size: 20px;
  position: absolute;
  margin-left: -25px;
}
.tools .remove {
  color: red;
  font-size:18px;
}
.tools .remove:hover {
  color: rgb(255, 119, 119);
}

.tools .edit:hover {
  color: rgb(255, 119, 119);
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
                            <a>進階客戶管理</a>
                        </li>
                        <li class="crumb-active">
                            <a>最高權限設置</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">操作區塊</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<div class="panel">
								<div class="panel-heading">
									<div class="panel-title hidden-xs">
										<span class="glyphicon glyphicon-tasks"></span>類別列表
										<div class="pull-right">
											<a class="btn btn-info btn-xs" onclick="addGroup();">新增</a>
										</div>
									</div>
								</div>
								<div class="panel-body pn">
								
									<div class="col-xs-12 br-a br-light bg-light p30">
										<div class="row">
											<div class="col-sm-12">
												<h5 class="text-muted mtn mb30 text-center">調群組權限</h5>
											</div>
											
										<?php 											
											$ind = 1;
											foreach( $listGroup AS $record ) 
											{
										?>
											<div class="col-md-3">
												<a class="holder-style p15 mb20 text-center">
													<span class="fa fa-user fs40 holder-icon"></span>
													<br> <input class="form-control text-center" type="text" value="<?php echo $record["name"];?>" onkeyup="saveTempDataGroup('<?php echo $record["id"];?>','name',this);" />
													<div class="tools">
														<span class="fa fa-edit edit" onclick="action('/admin/authority?id=<?php echo $record["id"];?>')"></span>
														<span class="fa fa-times-circle remove" onclick="delGroup('<?php echo $record["id"];?>');"></span>
													</div>
													<div class="clearfix"></div>
												</a>
											</div>
										<?php
											$ind++;
											}
										?>

										</div>
									</div>
									
								</div>
								<div class="panel-footer">
									<div class="pull-right">
										<a class="btn btn-info btn-xs" onclick="page_save_group();">儲存</a>
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
	
    <script src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.js"></script>
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
        });
    </script>
    
	<script type="text/javascript">
	
	var ajaxData = [];
	
	var listGroup = <?php echo json_encode($listGroup);?>;
	
	
	function addGroup()
	{
		var name = prompt("請輸入類別名稱", "");
		if( name != null )
		{
			$.ajax({
				url: "<?php echo base_url('/admin/custom/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"postData" : [
						{ 'id':'-1', 'name':name }
					]
				},
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'新增完成！':"新增失敗！";
					
					new PNotify({
						title: data.message,
						text: text,
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
	
	function saveTempDataGroup(id,key,self)
	{
		for( var k in listGroup )
		{
			if( id == listGroup[k].id ) 
			{		
				listGroup[k][key] = $(self).val();		
			}
		}
	}
	
	function delGroup(id)
	{		
		if(confirm("確定刪除？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/custom/delete');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{ "postData": { "id" : id } },
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'刪除完成！':"刪除失敗！";
					
					new PNotify({
						title: data.message,
						text: text,
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
						//location.reload();
					},1000);
				},
				error:function(xhr, stauts, err){
					
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
	
	function page_save_group()
	{
		if(confirm("確定修改？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/custom/save');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"postData" : listGroup
				},
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'修改完成！':"修改失敗！";
					
					new PNotify({
						title: data.message,
						text: text,
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
		
	$(function(){
		
	});
	</script>
	
</body>
</html>