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
                            <a>商店管理</a>
                        </li>
                        <li class="crumb-active">
                            <a>消費說明</a>
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
							<h3 class="panel-title text-muted text-center mt10 fw400">消費說明</h3>
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
										<ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul>
									</div>
									<div class="tabs-content main-tab-content">
										<textarea name="ckeditor1" id="ckeditor1" rows="12">
										<?php
											echo $privacy[$Lang]["content"];
										?>
										</textarea>
										<div class="clearfix"></div>
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
        });
    </script>
    
	<script type="text/javascript">
	
	var ajaxData = [];
	
	var privacy = <?php echo json_encode($privacy);?>;
	
	function init_MainLangCodeSwitch(){
		$(".main-langCode li a").each(function(){
			$(this).unbind("click");
			$(this).bind("click",function(e){
				location.href = "/admin/option/privacy?lang="+$(this).attr("data-langCode");
			});
		});
	}
	function init_pageSave()
	{
		$(".page-save").unbind("click");
		$(".page-save").bind("click",function(){
			if(confirm("確定修改？"))
			{
				var currentData	= CKEDITOR.instances.ckeditor1.getData();
				var lang = $(".main-langCode li.active a").attr("data-langCode");
				
				privacy[lang].content = currentData;
				
				var ajaxData = { "optionData" : [ { "type" : "privacy", "value" : privacy } ]};
					
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
		});
	}
	$(function(){
		init_MainLangCodeSwitch();
		init_pageSave();
	});
	</script>
	
</body>
</html>