
<body class="editors-page invoice-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style> 
.control-label {
  font-size: 18px;
  padding: 0;
  padding-top: 0 !important;
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
            <section id="content" class="">

                <div class="panel panel-primary panel-border top">
                    <div class="panel-heading">
                        <span class="panel-title"> <span class="glyphicon glyphicon-user"></span> Account Info</span>
                    </div>
                    <div class="panel-body p20" id="invoice-item">
					
						<form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="inputMail" class="col-lg-2 control-label">群組</label>
                                <div class="col-lg-8">
                                    <?php
                                    $selector = false;
                                    $groupLabel = false;
                                    foreach( $listGroup as &$group )
                                    {
                                        if( $group["id"] != 5 )
                                        {
                                            ( $selector === false ) ? $selector = "<select name='group_id' id='group_id' class=\"form-control\" onchange=\"saveTempData( 'group_id', this );\"><option value=''>--- please select ---</option>" : "";

                                            if( $group["id"] == 2 )
                                            {
                                                if( $group["id"] == $selfData["group_id"] )
                                                {
                                                    $groupLabel = $group["html"];
                                                }
                                                $isSed = ( $group["id"] == $selfData["group_id"] ) ? "selected" : "";
                                                $selector.= "<option value=\"{$group["id"]}\" {$isSed}>{$group["name"]}</option>";
                                            }
                                            else
                                            {
                                                $isSed = ( $group["id"] == $selfData["group_id"] ) ? "selected" : "";
                                                $selector.= "<option value=\"{$group["id"]}\" {$isSed}>{$group["name"]}</option>";
                                            }
                                        }
                                        else if ( $admin["group_id"] == 5 && $selfData["group_id"] == 5 ){
                                            $groupLabel = $group["html"];
                                        }
                                    }
                                    $selector.= "</select>";

                                    echo $selector;
                                    ?>
                                    <span class="help-block mt5"><i class="fa fa-bell"></i> 此為不可修改欄位！ <p style="color:red;display:inline-block;">網站前台會員登入使用(會員帳號)</p></span>
                                </div>
                            </div>
							<div class="form-group">
								<label for="inputName" class="col-lg-2 control-label">Account</label>
								<div class="col-lg-8">
									<input class="form-control" value="" onkeyup="saveTempData( 'name', this );"/>
									<span class="help-block mt5">*此為必填項目 <p style="color:red;display:inline-block;">網站後台登入使用(此為後台帳號)</p></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputMail" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-8">
									<input class="form-control" value="" onkeyup="saveTempData( 'mail', this );"/>
									<span class="help-block mt5">*此為必填項目 <p style="color:red;display:inline-block;">網站前台會員登入使用(會員帳號)</p></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputGender" class="col-lg-2 control-label">Gender</label>
								<div class="col-lg-8">
									<input  type="radio" name="gender" id="gender" value="M" onclick="saveTempData( 'gender', this );" required> Male
									<input  type="radio" name="gender" id="gender" value="F" onclick="saveTempData( 'gender', this );" required> Female
									<span class="help-block mt5">*此為必填項目</span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-lg-2 control-label">Password</label>
								<div class="col-lg-8">
									<input type="password" class="form-control" value="" onkeyup="saveTempData( 'password', this );"/>
									<span class="help-block mt5">*此為必填項目</span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputRetypePW" class="col-lg-2 control-label">Repeat Password</label>
								<div class="col-lg-8">
									<input type="password" id="inputRetypePW" class="form-control" value=""/>
									<span class="help-block mt5">*此為必填項目</span>
								</div>
							</div>
							<div class="form-group">
								<label for="input-nickname" class="col-lg-2 control-label">Name</label>
								<div class="col-lg-8">
									<input id="input-nickname" class="form-control" value="" onkeyup="saveTempData( 'nickname', this );"/>
									<span class="help-block mt5">*此為必填項目</span>
								</div>
							</div>
							<div class="form-group">
								<label for="input-phone" class="col-lg-2 control-label">Phone</label>
								<div class="col-lg-8">
									<input id="input-phone" class="form-control" value="" onkeyup="saveTempData( 'phone', this );" maxlength="15"/>
									<span class="help-block mt5">*此為必填項目</span>
								</div>
							</div>
							<div class="form-group">
								<label for="input-birthday" class="col-lg-2 control-label">Birthday</label>
								<div class="col-lg-8">
									<input id="input-birthday" class="form-control date birthday" value="" onchange="saveTempData( 'birthday', this );"/>
									<span class="help-block mt5">*此為必填項目</span>
								</div>
							</div>
						</form>
                    </div>					
					<div class="panel-footer">	
						<div class="btn-group pull-right">
							<a class="btn btn-info" onclick="pageSave();">Save</a>
							<a class="btn btn-default" onclick="location.href = '/admin/user/listPage';">Back</a>
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
				$(".has-error").find(".help-block").html("*此為必填項目");
				$(".has-error").removeClass("has-error");
			},3000);
			return;
		}
		if( $("#inputRetypePW").val() != selfData.password  || selfData.password == "" || $("#inputRetypePW").val().password == "" )
		{
			var target = $("#inputRetypePW").parent().parent();
			target.addClass("has-error");
			target.find(".help-block").html("兩次輸入密碼不相符！");
			
			setTimeout(function(){
				$(".has-error").find(".help-block").html("*此為必填項目");
				$(".has-error").removeClass("has-error");
			},3000);
			return;
		}
        var ajaxData = { "saveData" : selfData };
		$.ajax({
			url: "/admin/user/createUser",
			async:true,
			cache:false,
			method:"POST",
			data:ajaxData,
			success:function(data, status, xhr){
				var title = (data.result === true)?"操作成功":"操作失敗";
				var text = (data.result === true)?"儲存完成！":"帳號或信箱重複！";
				var type = (data.result === true)?"info":"danger";
				PM.show({ title: title, text: text, type: type});
				if( data.result === true )
				{
					setTimeout(function(){
						//location.reload();
					},500);
				}
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