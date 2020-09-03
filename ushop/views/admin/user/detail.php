
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
								<label for="inputName" class="col-lg-2 control-label">帳號</label>
								<div class="col-lg-8">
									<p id="inputName" class="form-control-static text-muted"><?php echo $selfData["name"];?></p>
									<span class="help-block mt5"><i class="fa fa-bell"></i> 此為不可修改欄位！ <p style="color:red;display:inline-block;">網站後台登入使用(此為後台帳號)</p></span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputMail" class="col-lg-2 control-label">信箱</label>
								<div class="col-lg-8">
									<p id="inputName" class="form-control-static text-muted"><?php echo $selfData["mail"];?></p>
									<span class="help-block mt5"><i class="fa fa-bell"></i> 此為不可修改欄位！ <p style="color:red;display:inline-block;">網站前台會員登入使用(會員帳號)</p></span>
								</div>
							</div>
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
                                                ( $selector === false ) ? $selector = "<select name='group_id' id='group_id' class=\"form-control\" onchange=\"saveTempData( 'group_id', this );\">" : "";

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
								<label for="input-nickname" class="col-lg-2 control-label">姓名</label>
								<div class="col-lg-8">
									<input id="input-nickname" class="form-control" value="<?php echo $selfData["nickname"];?>" onkeyup="saveTempData( 'nickname', this );"/>
									<span class="help-block mt5"></span>
								</div>
							</div>
							<div class="form-group">
								<label for="input-gender" class="col-lg-2 control-label">性別</label>
								<div class="col-lg-8" style="position: relative;top: 15px;">
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
									<span class="help-block mt5"></span>
								</div>
							</div>
							<?php /* if ( isset( $selfData["region"] ) ){?>
								<div class="form-group">
									<label for="input-birthday" class="col-lg-2 control-label">地址</label>
									<div class="col-lg-8">
										<?php 
										if ( $selfData["region"] == "0"  ){
											echo ($selfData["zip"]==0)?"":$selfData["zip"].$selfData["address"] ; 
										}
										else {
											echo $selfData["address"] ; 
										}
										?>
									</div>
								</div>
							<?php } */?>
							<div class="form-group">	
								<div class="col-lg-12">
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
		$('.date').datetimepicker({
			"format" : "YYYY/MM/DD",
			"pickTime": false
		});
	});
	
	function pageSave()
	{
        var ajaxData = { 
			"saveData" : selfData 
		};
		$.ajax({
			url: "/admin/user/saveInfo",
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
	
	function saveTempData( key, self )
	{
		selfData[key] = $(self).val();
	}
	</script>
	
</body>
</html>