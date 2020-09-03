
    <link rel="stylesheet" type="text/css" href="vendor/plugins/datepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/tagmanager/tagmanager.css">


<body class="editors-page form-input-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
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
                            <a>產品管理</a>
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
                <div class="tray tray-center p10 pb0 va-t animated-delay"  data-animate="1100">
					<div class="panel">
						<div class="panel-heading">
							<!-- title -->
							<h3 class="panel-title text-muted text-center mt10 fw400">產品管理</h3>
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
                                  <div class="row ">
                                    <div class="form-group">
                                      <label for="inputUniqueHost" class="col-xs-12 col-lg-1 control-label text-right" >剩餘數量:</label>
                                      <div class="col-lg-2">
                                        <div class="form-group">
                                          <div class="col-lg-5">
                                            <input type="text" class="form-control startdate" name="start" id="start" value="<?php echo isset($start)? $start:"" ;?>" style="width:100px" >
                                          </div>
                                          <div class="col-lg-2">
                                            <label for="inputUniqueHost" class="control-label text-right" >  ~</label>
                                          </div>
                                          <div class="col-lg-5">
                                            <input type="text" class="form-control enddate" name="end" id="end" value="<?php echo isset($end)? $end:"" ;?>" style="width:100px" >
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-1 text-right" style="padding-top: 8px;">
                                          <button type="button" onclick="frmSearch();" class="btn btn-primary btn-xs pull-left">查詢</button>
                                          <button type="button" onclick="frmReset();" class="btn btn-xs pull-left" style="margin-left: 10px;">清除</button>
                                      </div>
                                  </div>
                                </div>

							<div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist">
									<?php echo $htmlLang;?>
								</ul>
							</div>
							<div class="tabs-content main-tab-content">
									<div class="panel-heading">
										<div class="panel-title hidden-xs">
											<span class="glyphicon glyphicon-tasks"></span>產品列表</div>
									</div>
									<div class="panel-body pn">

										<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
                                          <thead>
												<tr>
													<th>父層</th>
                          							<th>商品屬性</th>
													<th>標題</th>
													<th>圖片</th>

													<th>數量</th>
													<th width="100">狀態</th>
													<th>操作</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>父層</th>
                          							<th>商品屬性</th>
													<th>標題</th>
													<th>圖片</th>
													<th>數量</th>
													<th>狀態</th>
													<th>操作</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
												foreach( $products AS $record )
												{
													if( isset($record["detail"]) )
													{
											?>
												<tr>
													<td><?php echo $record["parentName"];?></td>
                          							<td><?php echo @$record["showType"];?></td>
													<td style="max-width:300px;"><?php echo $record["detail"]["name"];?></td>
													<td><img src="<?php echo $record["detail"]["src"];?>" class="img-responsive" style="max-width:120px;"/></td>
													<?php if(is_array($record["stock"])) {?>
													<td>
														<select class="form-control">
														<?php foreach( $record["stock"] AS &$row ) { ?>
															<option><?php echo $row["formatType"]." : ".$row["value"];?></option>
														<?php } ?>
														</select>
													</td>
													<?php } else { ?>
													<td>數量：<?php echo $record["stock"];?></td>
													<?php } ?>
													<td style="width:100px;">
														<div>
															<div class="col-md-12 mb15" style="margin-right:0;padding-right:0;">
																<select class="form-control" onchange="saveProductFlag('<?php echo $record["PID"];?>',this);">
													<?php
														foreach( $listFlag AS $k=>&$flag )
														{
															$isSel = ( $record["flag"] == $k ) ? "selected" : "";
															echo "<option value=\"{$k}\" {$isSel}>{$flag}</option>";
														}
													?>
																</select>
															</div>
															<div class="clearfix"></div>
													<?php
														$isShow = ( $record["flag"] == 3 ) ? "" : "style=\"display:none\"";
														$flagVar = $record["flagVar"];
														$startDate = (isset($flagVar["startDate"]))?$flagVar["startDate"]:date("Y-m-d 00:00:00",strtotime("-7 days"));
														$endDate = (isset($flagVar["endDate"]))?$flagVar["endDate"]:date("Y-m-d 23:59:59",strtotime("+7 days"));
													?>
															<div class="product-flag-3" <?php echo $isShow;?>>
																<div class="col-md-12" style="margin-right:0;padding-right:0;">
																	<div class="input-group date"  name="daterange">
																		<span class="input-group-addon cursor"><i class="fa fa-calendar"></i></span>
																		<input type="text" class="form-control datetimepicker1" data-id="<?php echo $record["PID"];?>" value="<?php echo $startDate;?> - <?php echo $endDate;?>">
																	</div>
																</div>
																<div class="clearfix"></div>
															</div>
														</div>
														<div class="clearfix"></div>
													</td>
													<td>
                                                        <?php if (!in_array($record["type"],array('2','3'))){?>
                                                        <a href="/admin/product/addP?id=<?php echo $record["PID"];?>" class="btn btn-info btn-xs">設定加購品</a>
                                                        <?php }?>
													    <a href="/admin/product/copy?id=<?php echo $record["detailKey"];?>" class="btn btn-primary btn-xs">複製</a>
														<a href="/admin/product/edit?id=<?php echo $record["detailKey"];?>" class="btn btn-success btn-xs">編輯</a>
														<a onclick="init_deleteListRow('<?php echo $record["detailKey"];?>')" class="btn btn-danger btn-xs btn-delete">刪除</a>
													</td>
												</tr>
											<?php
													}
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

  <script>

  function test(){
  //e.preventDefault();
  $('#myModal').modal("show");
  }
  </script>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="/admin/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="/admin/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/magnific/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/spin.min.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/ladda/ladda.min.js"></script>
    <script type="text/javascript" src="/libs/jquery.switchButton.js"></script>

    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/tagmanager/tagmanager.js"></script>


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
        <?php if(@$errMsg){ ?>
          alert('<?php echo @$errMsg;?>');
    	<?php }?>
        jQuery(document).ready(function() {

            // Init Theme Core
            Core.init();

            // Init Theme Core
            Demo.init();

        });
    </script>

	<script type="text/javascript">


	function saveProductFlag(PID,self)
	{
		if( $(self).val() == 3 )
		{
			$(".product-flag-3 .datetimepicker1[data-id='"+PID+"']").parent().parent().parent().fadeIn();
		}
		else
		{
			$(".product-flag-3 .datetimepicker1[data-id='"+PID+"']").parent().parent().parent().fadeOut();

			$.ajax({
				url: "<?php echo base_url('/admin/product/changeFlag');?>",
				async:true, cache:false, method:"POST",
				data:{ "id" : PID, "flag" : $(self).val() },
				success:function(data, status, xhr){
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'修改完成！':"修改失敗！";
					PM.show({title:data.message, text:text, type:type });
				},
				error:function(xhr, stauts, err){ PM.erro(); }
			});
		}
	}

	var ajaxData = [];

	function init_MainLangCodeSwitch(){
		$(".main-langCode li a").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(e){
				location.href = "/admin/product/listTable?lang="+$(this).attr("data-langCode");
			});
		});
	}

	function init_DataTable()
	{
		$('.datetimepicker1').each(function(){
			$(this).daterangepicker({
				format: "YYYY-MM-DD HH:mm:ss"
			});
			$(this).on('apply.daterangepicker', function(ev, picker) {
				var PID 	= $(ev.currentTarget).attr("data-id");
				var flagVar = {
					"startDate" : picker.startDate.format('YYYY-MM-DD 00:00:00'),
					"endDate"	: picker.endDate.format('YYYY-MM-DD 23:59:59')
				};
				$.ajax({
					url: "<?php echo base_url('/admin/product/changeFlag');?>",
					async:true, cache:false, method:"POST",
					data:{ "id" : PID, "flag" : 3, "flagVar": flagVar },
					success:function(data, status, xhr){
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'修改完成！':"修改失敗！";
						PM.show({title:data.message, text:text, type:type });
					},
					error:function(xhr, stauts, err){ PM.erro(); }
				});
			});
		});

		$('#datatable3').dataTable({
			"order": [[ 0, "desc" ]],
			"language": {
				"lengthMenu"		: "每頁顯示 _MENU_ 筆",
				"search"			: "關鍵字　",
				"zeroRecords"		: "找不到任何相對應資料",
				"info"				: "目前 _PAGE_ 頁，共 _PAGES_ 頁",
				"infoEmpty"			: "資料是空的",
				"infoFiltered"		: "(從 _MAX_ 筆資料中篩選)"
			}
		});
	}


	function init_deleteListRow(itemId)
	{
		if(confirm("確定刪除？"))
		{
			$.ajax({
				url: "<?php echo base_url('/admin/product/delete');?>",
				async:true,
				cache:false,
				method:"POST",
				data:{
					"mainKey" : itemId
				},
				success:function(data, status, xhr){

					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'刪除完成！':"刪除失敗！";
					PM.show({title:data.message, text:text, type:type });

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

	function frmSearch(){
		FormSubmit({
			method: "POST",
			action: "/admin/product/listTable",
			data: {
              start : $('#start').val(),
		      end : $('#end').val()
		    }
		});
	}
	function frmReset(){
		//$('#start').val('');
		//$('#end').val('');
	    location = '/admin/product/listTable';
	}


	$(function(){
		init_MainLangCodeSwitch();
		init_DataTable();
		//init_deleteListRow();
	});
	</script>

</body>
</html>