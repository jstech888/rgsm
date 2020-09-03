<!-- Fancytree CSS -->
<link rel="stylesheet" type="text/css" href="/admin/vendor/plugins/fancytree/skin-win8/ui.fancytree.min.css">
<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
.control-label {
  line-height: 38px;
  font-size: 15px;
  margin-bottom: 0;
  text-align: right;
}
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

.img-container {
  position: relative;
  display: inline-block !important;
  margin-left: 5px;
  margin-top: 5px;
  cursor: pointer;
  max-width: 110px;
}
.img-container img:hover {
  border-color: #000;
}


.product-img-container {
  position: relative;
  display: inline-block;
}


.btn-img-alt {
  width: 100%;
  background: rgba(0,0,0,0.6);
  color: #fff;
  position: absolute;
  margin-top: -20px;
  cursor: default;
  left: 0;
  line-height: 22px;
  height: 22px;
  bottom: 0;
}
.btn-tools {
  position: absolute;
  top: 0;
  right: 0;
  display: none;
}

.product-img-container:hover .btn-tools {
  display: block;
}

.img-container:hover .btn-tools {
  display: block;
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
          <a>商品管理</a>
        </li>
        <li class="crumb-active">
          <a>加購品編輯</a>
        </li>
      </ol>
    </div>
    <div class="topbar-right">
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
          <h3 class="panel-title text-muted text-center mt10 fw400"></h3>
          <!-- /title -->
		</div>
        <div class="panel-body">
          <form id="mainForm" method="post" action="/admin/product/saveAddP" >
          <input type="hidden" name="id" value="<?php echo @$id; ?>" />
          <div class="panel">
            <div class="panel-heading text-center">
              <div class="caption">編輯區塊</div>
            </div>

              <div class="clearfix"></div>

              <div class="tab-block mb25">
				<ul class="nav nav-tabs tabs-border">
					<li class="active">
						<a href="#tab8_1" data-toggle="tab">商品</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="tab8_1" class="tab-pane active">
						<select multiple="multiple" id="products" name="products[]">
						<?php
							$arr_seleted = @$add_product_ids;

							foreach( $produsts AS $row )
							{
								$isSelected = "" ;
								if (is_array($arr_seleted))
								{
									$isSelected = (in_array( $row['PID'], $arr_seleted)) ? "selected" : '';
								}

								?>
						  	<option value="<?php echo $row['PID'];?>" <?php echo $isSelected;?> ><?php echo $row["detail"]['name'];?></option>
							<?php
							}
						?>
						</select>
					</div>
				</div>
			</div>

            </div>
            <div class="panel-footer">
              <div class="pull-right btn-group">
                <button onclick="checkSubmit()" type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
                  <span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
                  <span class="ladda-spinner"></span>
                </button>
                <a class="btn btn-default" href="/admin/product/listTable">返回</a>
              </div>
              <div class="clearfix"></div>
            </div>

            </form>
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

    <script type="text/javascript" src="/admin/vendor/plugins/multiselect/js/jquery.multi-select.js"></script>


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

    <!-- Theme Javascript -->
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/demo.js"></script>
    <script type="text/javascript" src="/admin/js/page.js"></script>

    <script type="text/javascript">

        var lang = '<?php echo @$lang ;?>';
        $('#langArea_'+lang).show();

        jQuery(document).ready(function() {
            // Init Theme Core
            Core.init();

            // Init Theme Core
            Demo.init();

            init_MainLangCodeSwitch();

            init_ProductNavTabs();

            $('.datepicker').datepicker({dateFormat: "yy-mm-dd"});

            showTypeArea();

            $('#type').change(function(){
                showTypeArea();
            })
        });
        function init_MainLangCodeSwitch()
		{
			$(".main-langCode li a").each(function(){
				$(this).unbind("click");
				$(this).bind("click",function(e){
					$(".main-langCode li").removeClass("active");
					$(this).parent().addClass("active");
					$(".main-tab-content").fadeOut(500);
					var langCode = $(this).attr("data-langCode");

					setTimeout(function(){
					    showLangArea();
						$(".main-tab-content").fadeIn(500);
					},500);

				});
			});

			$('.main-langCode a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
				var langCode 	= $(this).attr("data-langCode");
			});

			$('.main-langCode a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				var langCode 	= $(this).attr("data-langCode");
			});
		}

        function init_ProductNavTabs()
		{
			$("#products").multiSelect({
			  selectableHeader: "<div class='custom-header'>產品列表</div>",
			  selectionHeader: "<div class='custom-header'>加購商品</div>"
			});
		}

        function showLangArea() {
          var lang   = $(".main-langCode li.active a").attr("data-langCode");
          $('.langArea').hide();
          $('#langArea_'+lang).show();
          return;
        }

        function showTypeArea() {
          var type = $('#type :selected').val();
          $('.typeArea').hide();
          $('#typeArea'+type).show();
        }


        function checkSubmit(){

            $('#mainForm').submit();
        }
    </script>



</body>
</html>