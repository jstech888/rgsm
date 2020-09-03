<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
  .control-label {
	  padding-top: 8px;
	  font-size: 15px;
	  text-align: right;
  }
  .row {
	margin-top: 15px;
    padding: 0 20px;
  }
  .inline {
    display: inline-block;
    width: initial;
  }
	.switch {
	  padding: 7px 0;
	}
.nav-tabs {
  border-bottom: none;
}
.tabs-menu {
  margin-top: 15px;
}
.tabs-content  {
  padding: 20px 10px;
  border: 1px #e3e3e3 solid;
}
</style>
    <!-- Start: Main -->
    <div id="main">
        <!-- Start: Header -->
		<?php include_once(dirname(dirname(__FILE__))."/widget/headerBar.php"); ?>
        <!-- End: Header -->

        <!-- Start: Sidebar -->
		<?php include_once(dirname(dirname(__FILE__))."/widget/MainMenu.php"); ?>
		
        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- Start: Topbar -->
            <header id="topbar">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="crumb-active">
                            <a>商店管理</a>
                        </li>
                        <li class="crumb-active">
                            <a>信件管理</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">信件管理</h3>
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
									<div class="panel panel-info panel-border top" id="spy2">
										<div class="panel-heading">
											<span class="panel-title">
												<span class="glyphicons glyphicons-table"></span>信件列表
											</span>
										</div>
										<div class="panel-body pn">
											<table class="table">
												<thead>
													<tr>
														<th>#</th>
														<th>寄送時機</th>
														<th>操作</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>產出訂單</td>
														<td class="text-center"><a class="btn btn-warning btn-xs" onclick="editMail('OrderSuccessMail');">編輯</a></td>
													</tr>
													<tr>
														<td>2</td>
														<td>管理員切換訂單狀態，為已寄送</td>
														<td class="text-center"><a class="btn btn-warning btn-xs" onclick="editMail('OrderSend');">編輯</a></td>
													</tr>
													<tr>
														<td>3</td>
														<td>客戶忘記密碼確認信件</td>
														<td class="text-center"><a class="btn btn-warning btn-xs" onclick="editMail('forgotPassword');">編輯</a></td>
													</tr>
													<tr>
														<td>4</td>
														<td>會員帳號啟用信</td>
														<td class="text-center"><a class="btn btn-warning btn-xs" onclick="editMail('memberActive');">編輯</a></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="panel panel-info panel-border top">
										<div class="panel-heading">
											<span class="panel-title">信件內文編輯器</span>
										</div>
										<div class="panel-body">
											<div class="empty-block">
												<center><H3>請先選擇 信件列表 其中一項</H3></center>
											</div>
											<div class="edit-block">
												<div class="form-group">
													<label for="mail-title" class="col-xs-3 control-label" style="line-height: 22px;height: 22px;">信件標題</label>
													<div class="col-xs-8">
														<input type="text" class="form-control" id="mail-title" placeholder="">
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="form-group">
													<label class="col-lg-12 control-label text-center" for="ckeditor1" style="border-bottom: 3px solid #000;">信件內文</label>
													<div class="col-lg-12" style="padding:0;margin:0;">
														<textarea class="form-control"  name="ckeditor1" id="ckeditor1" rows="12"></textarea>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
										<div class="panel-footer">
											<div class="pull-right">
												<a class="btn btn-warning btn-mail-save" onclick="saveMail();">儲存</a>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
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
			
            CKEDITOR.disableAutoInline = true;
			
            var editor = CKEDITOR.replace('ckeditor1', {
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 300
            });
			
			$(".empty-block").show();
			$(".edit-block").hide();
			$(".btn-mail-save").hide();
        });
	
	var currentKey = false;
	
    function editMail( key )
	{
		currentKey = key;
		$("#mail-title").val(listMail[key].title);
		CKEDITOR.instances.ckeditor1.setData(listMail[key].content);
		
		$(".empty-block").hide();
		$(".edit-block").show();
		$(".btn-mail-save").show();
	}
	
	function saveMail()
	{
		listMail[currentKey].title = $("#mail-title").val();
		listMail[currentKey].content = CKEDITOR.instances.ckeditor1.getData();
		
		$("#mail-title").val("");
		CKEDITOR.instances.ckeditor1.setData("");
		currentKey = false;
		
		$(".empty-block").show();
		$(".edit-block").hide();
		$(".btn-mail-save").hide();
		
		pageSave();
	}
	
	var ajaxData = [];
	
	var listMail = <?php echo json_encode($listMail);?>;
	
	function pageSave()
	{
		var ajaxData = { "optionData" : [ 
			{ "type" : "OrderSuccessMail", "value" : listMail.OrderSuccessMail },
			{ "type" : "OrderSend", "value" : listMail.OrderSend } ,
			{ "type" : "forgotPassword", "value" : listMail.forgotPassword } ,
			{ "type" : "memberActive", "value" : listMail.memberActive } 
		]};
			
		$.ajax({
			url: "<?php echo base_url('/admin/option/change');?>",
			async:true,
			cache:false,
			method:"POST",
			data:ajaxData,
			success:function(data, status, xhr){
				var type = data.code == 1?"info":"danger";
				var text = data.code == 1?'修改完成！':"修改失敗！";
				
				PM.show({ title: data.message, text: text, type: type });
				
				setTimeout(function(){
					location.reload();
				},1000);
			},
			error:function(xhr, stauts, err){						
				PM.erro();						
			}
				});	
	}
	$(function(){
	});
	</script>
	
</body>
</html>