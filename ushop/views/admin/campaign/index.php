
    <link rel="stylesheet" type="text/css" href="/admin/vendor/plugins/datepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendor/plugins/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendor/plugins/tagmanager/tagmanager.css">


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
                            <a>2016抽獎活動管理</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">2016抽獎活動管理</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">

							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										操作區塊
										<div class="pull-right">
											<!--
											<div class="btn btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>新增</span>
												<!-- The file input field used as target for the file upload widget
												<input id="upload-image" type="file" name="files" >
											</div>
											
											<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
												<span class="ladda-spinner"></span>
											</button>
											-->
										</div>
									</div>
								</div>
								<div class="panel-body">
                                  	<div class="row ">
                                  		<div class="form-group">
                                  			<h3>查詢條件</h3>
											<form action="" method="get" role="form" >
											<input type="hidden" name="_r" value="<?php echo rand()?>">
											<input type="hidden" name="step" value="">
											<div class="form-group">
												<label>序號</label>
												<input class="form-control" type="text" name="sn" value="<?php echo $this->input->get('sn')?>">
											</div>
											<div class="form-group">
											<label>客戶姓名</label>
											<input class="form-control" type="text" name="username" value="<?php echo $this->input->get('username')?>">
											</div>
											<div class="form-group">
											<label>客戶電話</label>
											<input class="form-control" type="text" name="phone" value="<?php echo $this->input->get('phone')?>">
											</div>
											<div class="form-group">
											<label for="sel1">是否已兌獎</label>
											<select class="form-control" name="played_flag" id="sel1">
											  <option <?php if($this->input->get('played_flag') == '' ):?>selected<?php endif;?> value="">全部</option>
											  <option <?php if($this->input->get('played_flag') == '1' ):?>selected<?php endif;?> value="1">是</option>
											  <option <?php if($this->input->get('played_flag') == '0' ):?>selected<?php endif;?> value="0">否</option>
											</select>
											</div>
											<div class="form-group">
											<label for="sel1">獎項</label>
											<select class="form-control" name="gift_id" id="gift_id">
											  <option <?php if($this->input->get('gift_id') == '' ):?>selected<?php endif;?> value="">全部</option>
											  <?php foreach($gitf_opts as $id=>$name):?>
											  <option <?php if($this->input->get('gift_id') == $id ):?>selected<?php endif;?> value="<?php echo $id?>"><?php echo $name?></option>
											  <?php endforeach;?>
											</select>
											</div>
											<input type="submit" name="do" class="btn btn-primary" value="查詢">
											<?php /*
											<label class="btn btn-warning btn-file">
											    上傳序號資料 <input type="file" style="display: none;">
											</label>
											<label class="btn btn-warning btn-file">
											    上傳中獎使用人資料 <input type="file" style="display: none;">
											</label>
											<label class="btn btn-warning btn-file">
											    上傳獎品資料 <input type="file" style="display: none;">
											</label> */?>
											<span id="file-upload-section" style="float:right;margin-right:5px;"></span>
											<label class="btn btn-success btn-file" style="float:right;margin-right:5px;">
									        下載已兌獎資料 <input type="button" style="display: none;" onclick="window.location.href='<?php echo site_url('/admin/campaign/download')?>'">
											</label>
											</form>
											<p class="text-danger" style="float:right;margin-right:5px;">上傳資料格式請使用csv檔案</p>
                                  		</div>
                                  	</div>

							<!-- <div class="tabs-menu main-langCode ">
								<ul class="nav nav-tabs" role="tablist">
									<?php echo $htmlLang;?>
								</ul>
							</div> -->

							<div class="tabs-content main-tab-content">
									<div class="panel-heading">
										<div class="panel-title hidden-xs">
											<span class="glyphicon glyphicon-tasks"></span>抽獎明細列表</div>
									</div>
									<div class="panel-body pn">

										<table class="table table-striped table-hover" id="datatable3" cellspacing="0" width="100%">
                                          	<thead>
												<tr>
													<th>流水號</th>
													<th>序號</th>
													<th>客戶姓名</th>
													<th>兌獎時間</th>
													<th>客戶電話</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>流水號</th>
													<th>序號</th>
													<th>客戶姓名</th>
													<th>兌獎時間</th>
													<th>客戶電話</th>
												</tr>
											</tfoot>
											<tbody>
											<?php foreach($datalist['list'] as $data):?>
											<tr>
												<td><?php echo $data->id?></td>
												<td><?php echo $data->sn?></td>
												<td><?php echo $data->username?></td>
												<?php if($data->played_at):?>
												<td><?php echo date('Y-m-d H:i:s',strtotime($data->played_at))?></td>
												<?php else:?>
												<td>&nbsp;</td>
												<?php endif;?>
												<td><?php echo $data->phone?></td>
											</tr>
											<?php endforeach;?>
											</tbody>
										</table>
										
									</div>

							</div>
								</div>
							</div>

							<!-- <div class="pull-right mt10">
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
									<span class="ladda-spinner"></span>
								</button>
							</div> -->
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
    <script type="text/javascript" src="/admin/js/fileuploader.js"></script>

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
			"order": [[ 0, "asc" ]],
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

  	function export_excel(){
      location = '/admin/product/listTable?excel=1';
    }

	$(function(){
		// init_MainLangCodeSwitch();
		init_DataTable();

		var uploader = new qq.FileUploader({
    	    multiple:false,
		    element: document.getElementById('file-upload-section'),
		    action: '<?php echo site_url('campaign_manager/upload')?>',
		    onSubmit: function(id, fileName){
		    	var confirmed=confirm('資料將會被覆蓋,是否執行?');
		    	return confirmed;
		    },
		    onProgress: function(id, fileName, loaded, total){},
		    onComplete: function(id, fileName, responseJSON){
		        if(responseJSON.success){
		            alert('已成功更新'+responseJSON.total+'筆資料');
		        }else{
                    alert('操作錯誤 '+responseJSON.error);
		        }
		    },
		    onCancel: function(id, fileName){},
		    onError: function(id, fileName, xhr){},
		    uploadButtonText:'上傳資料',
		    failUploadText:'上傳失敗',
		    cancelButtonText:'取消',
		    params:{},
		    allowedExtensions:['csv'],
		    template:
		    '<label class="qq-upload-button btn btn-warning btn-file">'+
        	'{uploadButtonText}<input id="uploadctl" name="file" type="file" style="display: none;">'+
        	'</label>'+
        	'<div style="display:none;"><div  class="qq-uploader"></div><ul class="qq-upload-list"></ul>'+
        	'<div class="qq-uploader">' +
            '<div class="qq-upload-drop-area"><span></span></div>' +
            '<div class="" ></div>' +
            '<ul class="qq-upload-list"></ul>' +
         '</div></div>',
		    hideShowDropArea:true,
		    messages: {
		    	typeError: "檔案類型不符合",
	            sizeError: "{file} 過大,不可超過 {sizeLimit}.",
	            minSizeError: "{file} 過小,不可小於 {minSizeLimit}.",
	            emptyError: "{file} 不可為空.",
	            onLeave: "檔案正在上傳中."
		    },
		    inputName:'file',
		    showMessage: function(message){ alert(message); }
		});

	});
	</script>

</body>
</html>