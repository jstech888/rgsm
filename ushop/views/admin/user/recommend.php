
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
                            <a>個人服務</a>
                        </li>
                        <li class="crumb-active">
							<a>推薦商品</a>
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
                        <span class="panel-title"> <span class="glyphicon glyphicon-user"></span> 推薦商品</span>
                    </div>
                    <div class="panel-body p20 admin-form theme-primary" id="invoice-item">
						<div class="tabs-menu main-langCode ">
							<ul class="nav nav-tabs" role="tablist"><ul class="nav nav-tabs" role="tablist"><?php echo $htmlLang; ?></ul>
						</div>
						<div class="tabs-content main-tab-content">
							<select multiple="multiple" id="multiSelect1" name="multiSelectHot[]">
							<?php	
								$arr_seleted = $listRecommend[$Lang]["value"];
								foreach( $listProduct AS $row )
								{
									$isSelected = (in_array( $row['PID'], $arr_seleted)) ? "selected" : '';
									if( (in_array( $row['PID'], $arr_seleted)) === false )
									{
										if( $row["Shelves"] === false ) { continue; } 
									}
							?>
							  <option value="<?php echo $row['PID'];?>" <?php echo $isSelected;?> ><?php echo $row["detail"]['name'];?></option>
							<?php
								}
							?>
							</select>
						</div>
					</div>		
                    <div class="panel-footer">	
						<div class="pull-right btn-group">
							<a class="btn btn-info" onclick="page_save();">儲存</a>
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
			  selectableHeader: "<div class='custom-header'>商品列表</div>",
			  selectionHeader: "<div class='custom-header'>推薦商品</div>"
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
	});
	var isSend = false;
	function sengMsg()
	{
		var message = CKEDITOR.instances.ckeditor1.getData();
		if( $.trim(message) != "" && isSend === false )
		{
			isSend = true;
			PM.show({ title: "留言板", text: '訊息處理中...', type: "warning"});
			var ajaxData = { "content" : message, "to" : withId };
			$.ajax({
				url: "/admin/user/inbox/sendMsg",
				async:true,
				cache:false,
				method:"POST",
				data:ajaxData,
				success:function(data, status, xhr){
					PM.show({ title: "留言板", text: '訊息已經送出！', type: "info"});
					setTimeout(function(){location.reload()},1000);
				},
				error:function(xhr, stauts, err){
					PM.erro();
				}
			});
		}
	}
	
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