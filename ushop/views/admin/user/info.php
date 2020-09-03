
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

                <div class="panel panel-primary panel-border top">
                    <div class="panel-heading">
                        <span class="panel-title"> <span class="glyphicon glyphicon-user"></span> 會員個人資訊</span>
                    </div>
                    <div class="panel-body p20 admin-form theme-primary" id="invoice-item">
						<div class="section-divider mb40 mt20"><span> 個人照片 </span></div>
						
						<div class="row table-layout" id="modal-content">
							<div class="col-xs-4 br-a br-light bg-light p30">
								<div class="row">
									<div class="col-md-12 text-center">
										<a class="btn btn-info" onclick="selectMediaStack();">
											<i class="glyphicon glyphicon-plus"></i>選擇照片													
										</a>
									</div>
								</div>
							</div>
							<div class="col-xs-8 br-a br-light bg-light dark va-t p10">
								<div id="animation-switcher" class="ph20">
									<div class="row">
										<div class="col-xs-12 text-center">
											<img src="<?php echo $selfData["picture"]["url"];?>" class="img-thumbnail show-img" style="max-width: 300px;">
										</div>
										<div class="col-xs-12 text-center">
											<span class="show-name"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br/>
						<div class="section-divider mb40 mt20"><span> 基本資訊 </span></div>
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputName" class="col-lg-2 control-label">帳號</label>
								<div class="col-lg-8">
									<p id="inputName" class="form-control-static text-muted"><?php echo $selfData["name"];?></p>
									<span class="help-block mt5">不可修改</span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputMail" class="col-lg-2 control-label">信箱</label>
								<div class="col-lg-8">
									<p id="inputName" class="form-control-static text-muted"><?php echo $selfData["mail"];?></p>
									<span class="help-block mt5">不可修改</span>
								</div>
							</div>
							<div class="form-group">
								<label for="input-nickname" class="col-lg-2 control-label">姓名</label>
								<div class="col-lg-8">
									<input id="input-nickname" class="form-control" value="<?php echo $selfData["nickname"];?>" onkeyup="saveTempData( 'nickname', this );"/>
									<span class="help-block mt5"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="input-gender" class="col-lg-2 control-label">性別</label>
								<div class="col-lg-8">
									<input  type="radio" name="gender" id="gender" value="M" <?php echo ($selfData["gender"] === "M")? "checked" :""; ?> onclick="saveTempData( 'gender', this );" required> 男
									<input  type="radio" name="gender" id="gender" value="F" <?php echo ($selfData["gender"] === "F")? "checked" :""; ?> onclick="saveTempData( 'gender', this );" required> 女
									<span class="help-block mt5"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="input-phone" class="col-lg-2 control-label">電話</label>
								<div class="col-lg-8">
									<input id="input-phone" class="form-control" value="<?php echo $selfData["phone"];?>" onkeyup="saveTempData( 'phone', this );" maxlength="15"/>
									<span class="help-block mt5"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="input-birthday" class="col-lg-2 control-label">生日</label>
								<div class="col-lg-8">
									<input id="input-birthday" class="form-control date birthday" value="<?php echo $selfData["birthday"];?>" onchange="saveTempData( 'birthday', this );"/>
									<span class="help-block mt5">不可修改</span>
								</div>
							</div>
						</form>
                    </div>					
					<div class="panel-footer">	
						<div class="btn-group pull-right">
							<a class="btn btn-info" onclick="pageSave();">儲存</a>	
							<a class="btn btn-default" onclick="location.href = '/admin/user/listPage';">返回</a>	
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
		$('.date').datetimepicker({
			"format" : "YYYY/MM/DD",
			"pickTime": false
		});
	});
	
	function selectMediaStack()
	{
		MediaStack.popup({
			basePath : "/uploads/members/",
			selectActionFunction : function(e){
				var file = MediaStack.convertFileObject(e);
				selfData.picture = file;
				//saveImage(file);
				$(".show-img").attr("src",file.url);
				//obj_lb[Lang][0].value = file;
			}
		});
	}
	
	function pageSave()
	{
		var hasNull = false;
		$(".form-control").each(function(){
			if($(this).val() == "")
			{
				var target = $(this).parent().parent();
				target.addClass("has-error");
				target.find(".help-block").html("不可以為空值！");
				hasNull = true;				
			}
		});
		if( hasNull == true )
		{
			setTimeout(function(){
				$(".has-error").find(".help-block").html("");
				$(".has-error").removeClass("has-error");
			},3000);
			return;
		}
        var ajaxData = { "saveData" : selfData };
		$.ajax({
			url: "/admin/user/saveInfo",
			async:true,
			cache:false,
			method:"POST",
			data:ajaxData,
			success:function(data, status, xhr){
				PM.show({ title: "會員管理", text: '修改完成！', type: "info"});
				setTimeout(function(){
					//location.reload();
				},500);
			},
			error:function(xhr, stauts, err){
				PM.erro();
			}
		});
	}
	
	function saveTempData( key, self )
	{
		selfData[key] = $(self).val();
	}
	</script>
	
</body>
</html>