<!-- Fancytree CSS -->
<link rel="stylesheet" type="text/css" href="/admin/vendor/plugins/fancytree/skin-win8/ui.fancytree.min.css">
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
#cke_1_top {
	width: 100%;
}
.main-langCode li,
.main-langCode li {
	cursor: pointer;
}
.admin-form .section-divider span {
  background: #fff;
}
.show-img {
  width: 1400px;
  max-width: 1400px;
}

.unset {
  padding: 0px !important;
  margin: 0px !important;
}

.ui-widget-content.draggable {
  position: absolute;
  top: 10px;
  left: 10px;
  border: 1px dashed red;
  padding: 3px 6px;
  cursor:pointer;
}
#draggable-textBlock {
  min-width: 100px;
  min-height: 30px;
  max-width:100%;
}
.row.table-layout .br-a {
  vertical-align: middle !important;
}

.embed-responsive {
	height:300px;
}
.portlet.box.grey-cascade {
  border: 1px solid #b1bdbd;
  border-top: 0;
}
.portlet.box.grey-cascade > .portlet-title {
  background-color: #95a5a6;
}
.portlet.box.grey-cascade > .portlet-title > .caption {
  color: white;
}
.portlet.box.grey-cascade > .portlet-title > .caption > i {
  color: white;
}
.portlet.box.grey-cascade > .portlet-title > .actions .btn-default {
  background: transparent !important;
  background-color: transparent !important;
  border: 1px solid #d2d9d9;
  color: #e0e5e5;
}
.portlet.box.grey-cascade > .portlet-title > .actions .btn-default > i {
  color: #e8ecec;
}
.portlet.box.grey-cascade > .portlet-title > .actions .btn-default:hover, .portlet.box.grey-cascade > .portlet-title > .actions .btn-default:focus, .portlet.box.grey-cascade > .portlet-title > .actions .btn-default:active, .portlet.box.grey-cascade > .portlet-title > .actions .btn-default.active {
  border: 1px solid #eef0f0;
  color: #fcfcfc;
}
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
.dd-edit {
  top: inherit;
  bottom: 0;
}
.media-left {
  padding: 0;
  border: 1px #e4e4e4 solid;
  background: #eaeaea;
}
.media-left .glyphicons {
  margin: 15px;
}

.dd-item .media-body {
	padding-left: 11px;
}
.dd-item .list-unstyled {
	padding-left:0;
}
.media-body ul{
	width: 100%;
}
.dd-item>.dd-handle *{
	margin:0 !important;
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
                            <a>產品管理</a>
                        </li>
                        <li class="crumb-active">
                            <a><?php echo $title;?></a>
                        </li>
                        <li class="crumb-active">
                            <a>區塊編輯</a>
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
									<div class="panel-heading text-center">
										<div class="caption">
											編輯區塊
										</div>
									</div>
									<div class="panel-body admin-form theme-primary">
														
										<div class="row mb15">
											<div class="col-xs-12 text-center mt15">
												<a class="btn btn-info" href="/admin/option/exportNewsLetterList">匯出訂閱清單</a>
											</div>
											<div class="col-xs-12 text-center">
												<span class="help-block mt5" style="color:red;"><i class="fa fa-bell"></i> 超過100封以上，請匯出另外請專業系統代寄，避免被各大Mail Server 拒收！</span>
											</div>
											<div class="col-xs-12">
											<select multiple="multiple" id="reciverlist" name="reciverlist[]">
												<?php foreach( $listMail AS &$item ) { ?>
												<option value="<?php echo $item["id"];?>"><?php echo $item["mail"];?></option>
												<?php } ?>
											</select>
											</div>
										</div>
											
										<div class="col-md-12 unset">
											<div class="col-md-12 unset">
														<div class="row table-layout">
															<div class="col-xs-2 br-a br-light bg-light p30">
																<div class="row">
																	<div class="col-md-12 text-center">主旨</div>
																</div>
															</div>
															<div class="col-xs-10 br-a br-light bg-light dark va-t p10">
																<div class="row">
																	<div class="col-xs-12 text-center"><input id="mail-title" class="form-control" value="" /></div>
																</div>
															</div>
															<div class="clearfix"></div>
														</div>
														<div class="col-md-12 br-a br-light bg-light dark va-t p10">
															<textarea name="ckeditor1" id="ckeditor1" rows="12"></textarea>
														</div>
														<div class="clearfix"></div>
													</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="panel-footer">
										<div class="pull-right mt10 btn-group">
											<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 寄出</span>
												<span class="ladda-spinner"></span>
											</button>
										</div>
										<div class="clearfix"></div>
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

	
    <!-- Fancytree Plugin -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/jquery.fancytree-all.min.js"></script>

    <!-- Fancytree Addon - Childcounter -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.childcounter.js"></script>

    <!-- Fancytree Addon - Childcounter -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.columnview.js"></script>

    <!-- Fancytree Addon - Drag and Drop -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.dnd.js"></script>

    <!-- Fancytree Addon - Inline Edit -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.edit.js"></script>

    <!-- Fancytree Addon - Inline Edit -->
    <script type="text/javascript" src="/admin/vendor/plugins/fancytree/extensions/jquery.fancytree.filter.js"></script>

    <!-- Page Plugins via CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>
    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/vendor/plugins/daterange/daterangepicker.js"></script>
    <script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
	
    <link href="/admin/vendor/plugins/multiselect/css/multi-select.css" media="screen" rel="stylesheet" type="text/css" />

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
			
			init_pagesave();
			
			CKEDITOR.disableAutoInline = true;

            // Init Ckeditor
            var editorContent1 = CKEDITOR.replace('ckeditor1', {				
                filebrowserBrowseUrl: 		'/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 400
            });
			
			$("#reciverlist").multiSelect({				
			  selectableHeader: "<div class='custom-header'>訂閱清單</div>",
			  selectionHeader: "<div class='custom-header'>寄送清單</div>"
			});
        });
	
	
	function init_pagesave()
	{
		$('.page-save').click(function(e){
			e.preventDefault();
			if( $("#reciverlist").val() == null )
			{
				alert("至少選擇一位收件人！");
				return;
			}
			//var l = Ladda.create(this);
			//l.start();
			var type = "info";
			var text = '送出完成！';
			PM.show({title:"操作完成",text:text,type:type});
						
			$.ajax({
				url: "<?php echo base_url('/admin/option/sendEDM');?>",
				method:"POST",
				data:{ 
					"reciver" : $("#reciverlist").val().join(","),
					"subject" : $("#mail-title").val(),
					"content" : CKEDITOR.instances.ckeditor1.getData()
				},
				success:function(data, status, xhr){
					/*console.log(data, status, xhr ) ;
					var type = data.code == 1?"info":"danger";
					var text = data.code == 1?'送出完成！':"送出失敗！";
					PM.show({title:data.message,text:text,type:type});
					l.stop();
					*/
				},
				error:function(xhr, stauts, err){
					/*PM.erro();
					l.stop();*/
				}
			});
			return false;
		});
	}
	
	</script>
	
</body>
</html>