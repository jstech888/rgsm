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
                            <a> <?php echo $bkmt_name;?> </a>
                        </li>
                        <li class="crumb-active">
                            <a> <?php echo $bkm_name;?> </a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400"> <?php echo $bkm_name;?> </h3>
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
							
							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang;?></ul>
							</div>
							<div class="tabs-content main-tab-content">
									<div class="panel-heading">
										<div class="panel-title hidden-xs">
											<span class="glyphicon glyphicon-tasks"></span>Faq List</div>
									</div>
									<div class="panel-body pn">
										<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>Date</th>
													<th>Title</th>
<!--													<th>首圖</th>-->
													<?php if( !isset($isBrand) ) { ?><th>Catelog</th><?php } ?>
													<?php if($flag != "hide"){ ?><th>Status</th><?php } ?>
													<th>Action</th>
												</tr>
											</thead>
											<tfoot>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Title</th>
<!--													<th>首圖</th>-->
                                                    <?php if( !isset($isBrand) ) { ?><th>Catelog</th><?php } ?>
                                                    <?php if($flag != "hide"){ ?><th>Status</th><?php } ?>
                                                    <th>Action</th>
                                                </tr>
											</tfoot>
											<tbody>
											<?php 
												$flagVar = array("Pending","Pass","Violation","abnormal");
												$flagBtn = array("btn-default","btn-success","btn-danger","btn-warning");
												foreach( $articles AS $record ) {													
											?>
												<tr>
													<td><?php echo $record["markDate"];?></td>
													<td><?php echo $record["blog-title"];?></td>
<!--													<td><img src="--><?php //echo $record["value"]["url"];?><!--" class="img-responsive" style="max-width:120px;"/></td>-->
													<?php if( !isset($isBrand) ) { ?>
													<td>
														<div class="btn btn-xs btn-default">
															<?php 
																if($record["class"] == 0)
																{
																	echo "隱藏";
																}
																else
																{	 
																	echo isset($arr_class[$record["class"]]["value"][$Lang]["title"])? $arr_class[$record["class"]]["value"][$Lang]["title"]:$arr_class[$record["class"]]["key"];
																}
															?>
														</div>
													</td>
													<?php } ?>
											<?php
												if( $flag != "hide" )
												{
													if( $flag == "switch" )
													{
											?>
													<td>
														<select class="form-control" onchange="changeFlag('<?php echo $record["id"];?>',this);">
													<?php
														foreach( $flagVar AS $k=>&$Flag )
														{
															$isSel = $record["flag"] == $k ? "selected" : "";
													?>
															<option value="<?php echo $k;?>" <?php echo $isSel;?>><?php echo $Flag;?></option>													
													<?php
														}
													?>
														</select>
													</td>
											<?php
													}
													else
													{
											?>
													<td><div class="btn btn-xs <?php echo $flagBtn[$record["flag"]];?>"><?php echo $flagVar[$record["flag"]];?></div></td>													
											<?php															
													}												
												}
											?>
													<td>
														<a href="<?php echo $edit_url;?>?id=<?php echo $record["id"];?>" class="btn btn-success btn-xs">Edit</a>
														<a onclick="del(<?php echo $record["id"];?>);" class="btn btn-danger btn-xs btn-delete">Delete</a>
														<a target="_blank" href="/blog/detail/<?php echo $record["id"];?>" class="btn btn-default btn-xs">View</a>
													</td>
												</tr>
											<?php
												}
											?>
											</tbody>
										</table>
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
	

    <!-- Theme Javascript -->
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/demo.js"></script>
    <script type="text/javascript" src="/admin/js/page.js"></script>
	
    <script type="text/javascript">
	<?php
		if( $flag == "switch" )
		{
	?>
		function changeFlag(id,self)
		{
			if(confirm("確定修改？"))
			{
				$.ajax({
					url: "<?php echo base_url('/admin/blog/changeFlag');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{
						"id" : id,
						"flag" : $(self).val()
					},
					success:function(data, status, xhr){
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'修改完成！':"修改失敗！";
						PM.show({"title":data.message,"type":type,"text":text});
					},
					error:function(xhr, stauts, err){
						PM.erro();
					}
				});
			}
		}
	<?php
		}
	?>
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();

        });
    </script>
    
	<script type="text/javascript">
	var obj_item 	= <?php echo json_encode($widget);?>;
	var menuItem 	= false;
	
	var ajaxData = [];
	
	function init_MainLangCodeSwitch(){
		$(".main-langCode li a").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(e){
				location.href = "<?php echo $switch_url;?>?lang="+$(this).attr("data-langCode");
			});
		});
	}
	
	function init_DataTable()
	{
		$('#datatable3').dataTable({
			"order": [[ 0, "desc" ]],
			"language": {
                "lengthMenu"		: "Each Page _MENU_ items",
                "search"			: "Keyword　",
                "zeroRecords"		: "Could not find any corresponding information",
                "info"				: "Now _PAGE_ page，total _PAGES_ pages",
                "infoEmpty"			: "Data is empty",
                "infoFiltered"		: "(Select from _MAX_ items)"
			}
		});
	}
	
	function del(id)
	{
		if(confirm("確定刪除？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/faq/delete');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"id" : id
				},
				success:function(data, status, xhr){
					
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'刪除完成！':"刪除失敗！";
					PM.show({"title":data.message,"type":type,"text":text});
					setTimeout(function(){
						location.reload();
					},1000);
				},
				error:function(xhr, stauts, err){
					PM.erro();
				}
			});
					
		}
	}
	
	$(function(){
		init_MainLangCodeSwitch();
		init_DataTable();
	});
	</script>
	
</body>
</html>