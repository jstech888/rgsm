
<body class="editors-page invoice-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
.mn-title {
  height: 30px;
}
.mn {
	margin-top: 15px !important;
}
#invoice-item .mn,
#invoice-item address,
#invoice-item td {
  font-size: medium;
}
#invoice-item .panel-title,
#invoice-item th {
  font-size: large;
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
                            <a>會員管理</a>
                        </li>
                        <li class="crumb-active">
							<a>會員個人資訊</a>
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

                <div class="panel invoice-panel">
                    <div class="panel-heading">
                        <span class="panel-title"> <span class="glyphicon glyphicon-print"></span> 會員個人資訊</span>
                    </div>
                    <div class="panel-body p20" id="invoice-item">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="input-new-password" class="col-lg-2 control-label">新的密碼</label>
								<div class="col-lg-8">
									<input type="password" id="input-new-password" class="form-control" value="" maxlength="20"/>
									<span class="help-block mt5"><i class="fa fa-bell"></i> 必須與確認密碼想吻合，長度必須為8~20碼，內容應為英數字組合。</span>
								</div>
							</div>
							<div class="form-group">
								<label for="input-retype- password" class="col-lg-2 control-label">確認密碼</label>
								<div class="col-lg-8">
									<input type="password" id="input-retype-password" class="form-control" value="" maxlength="20"/>
									<span class="help-block mt5"><i class="fa fa-bell"></i> 重複輸入來確認是否有無輸入錯誤，長度必須為8~20碼，內容應為英數字組合。</span>
								</div>
							</div>
							<div class="form-group">	
								<div class="col-lg-10">		
									<div class="btn-group pull-right">
										<a class="btn btn-info" onclick="pageSave();">儲存</a>	
										<a class="btn btn-default" onclick="location.href = '/admin/user/listPage';">返回</a>	
									</div>
								</div>
							</div>
						</form>
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
	var selfData = <?php echo json_encode($selfData);?>;
	
	$(function(){
		
	});
	
	function saveTempData( key, self )
	{
		selfData[key] = $(self).val();
	}
	
	function pageSave()
	{
		var newPWPass    = $('#input-new-password').val().match(/^([_A-z0-9]){8,20}$/g);
		var retypePWPass = $('#input-retype-password').val().match(/^([_A-z0-9]){8,20}$/g);
		var passTheSame  = $('#input-new-password').val() == $('#input-retype-password').val();
		$("#input-retype-password").val();
		if( newPWPass && retypePWPass && passTheSame )
		{
			selfData.password = $('#input-new-password').val();
			ajaxSaveData();
		}
		else
		{
			if( newPWPass == null )
			{
				$('#input-new-password').parent().addClass("has-error");
				setTimeout(function(){
					$('#input-new-password').parent().removeClass("has-error");
				},3000);
			}
			else if( retypePWPass == null )
			{
				$('#input-retype-password').parent().addClass("has-error");
				setTimeout(function(){
					$('#input-retype-password').parent().removeClass("has-error");
				},3000);
			}
			else if( passTheSame === false )
			{
				alert("兩次密碼輸入不相符！");
			}
		}
	}
	
	function ajaxSaveData()
	{
        var ajaxData = { 
			"saveData" : selfData 
		};
		$.ajax({
			url: "/admin/user/savePW",
			async:true,
			cache:false,
			method:"POST",
			data:ajaxData,
			success:function(data, status, xhr){
				new PNotify({ title: "會員管理", text: '修改完成！', shadow: true, opacity: "0.75", type: "info",
					stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 }, width: "290px", delay: 1400
				});
				setTimeout(function(){
					location.reload();
				},500);
			},
			error:function(xhr, stauts, err){
				new PNotify({ title: "問題類型",text: '修改失敗！', shadow: true, opacity: "0.75", type: "danger",
					stack: { "dir1": "down", "dir2": "left", "push": "top", "spacing1": 10, "spacing2": 10 }, width: "290px", delay: 1400
				});
				setTimeout(function(){
					location.reload();
				},500);
			}
		});
	}
	
	</script>
	
</body>
</html>