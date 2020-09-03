
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
section.module {
  border-bottom: 5px solid;	
  min-height: 500px;
  max-height: 500px;
  overflow-y: auto;
} 
 
section.module ol {
  padding-left: 0;
}
section.module .conversation {
  list-style: none !important;
  background: #e5e5e5 !important;
  margin: 0 !important;
  padding: 0 0 50px 0 !important;
}
section.module .messages {
  background: white;
  padding: 10px;
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width: 70%;
  margin-right: 0px;
}
section.module .discussion .avatar {
  width: 80px;
  position: relative;
}
section.module .top-bar {
  background: #666;
  color: white;
  padding: 0.5rem;
  position: relative;
  overflow: hidden;
}
section.module .top-bar H1 {
  margin-top: 10px;
  text-align: center;
}

section.module .top-bar > * {
  position: relative;
}
@keyframes pulse {
  from { opacity: 0; }
  to { opacity: 0.5; }
}
section.module .discussion li {
  display: flex;
  margin-top: 30px;
}
section.module .avatar {
  width: 40px;
}
section.module .avatar img {
  width: 100%;
  display: block;
}
section.module .self {
  justify-content: flex-end;
}
section.module .other .avatar:after {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  width: 0;
  height: 0;
  border: 5px solid white;
  border-left-color: transparent;
  border-bottom-color: transparent;
}
section.module .self .avatar::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 0;
  border: 5px solid white;
  border-right-color: transparent;
  border-bottom-color: transparent;
}
section.module .self .avatar::after {
  box-shadow: 1px 1px 2px rgba(black, 0.2);
}
section.module time{
  font-size: 8px;
  color: #AFAFAF;
}
section.module .line-name {
  background: rgba(0, 0, 0, 0.6);
  text-align: center;
  color: #fff;
  position: absolute;
  width: 100%;
  top: 0;
}

section.module .self .line-name {
  margin-top: 60px;
}
section.module .other .line-name {
  margin-top: 60px;
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
							<a>訂單查詢</a>
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
                        <span class="panel-title"> <span class="glyphicon glyphicon-user"></span>訂單列表</span>
                    </div>
                    <div class="panel-body p20 admin-form theme-primary" id="invoice-item">
						<table class="table table-striped table-bordered table-hover" id="datatable3">
							<thead>
								<tr>
									<th class="col-hidden-xs">
										<?php echo $obj_orderlist_lang['id'];?>
									</th>
									<th>
										<?php echo $obj_orderlist_lang['status'];?>
									</th>
									<th>
										<?php echo $obj_orderlist_lang['createTime'];?>
									</th>
									<th>
										<?php echo $obj_orderlist_lang['currency'];?>
									</th>
									<th class="th-total">
										<?php echo $obj_orderlist_lang['total'];?>
									</th>
									<th class="th-address">
										<?php echo $obj_orderlist_lang['address'];?>
									</th>
									<th>
										<?php echo $obj_orderlist_lang['control'];?>
									</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$selector_status 	= array();
								$selector_cash 		= array();
								$show_status 		= array(0,1,2,3,4);
								foreach( $listOrder AS $trans )
								{
									
									if( in_array( $trans['Rtype'], $show_status ) )
									{
										if(!in_array($trans['Otype'],$selector_status))
											array_push($selector_status, $trans['Otype']);
										
										if(!in_array($obj_shoppingCart_lang[$trans['cashFlow']],$selector_cash))
											array_push($selector_cash, $obj_shoppingCart_lang[$trans['cashFlow']]);
							?>
								<tr>
									<td class="col-hidden-xs">
										<?php echo $trans['unique_id'];?>
									</td>
									<td class="type">
										<?php echo $trans['type'];?>
									</td>
									<td>
										<?php echo date("Y/m/d",strtotime($trans['createTime'])) . "<br/>" . date("H:i:s",strtotime($trans['createTime']));?>
									</td>
									<td>
										<?php echo $trans['iso_code'];?>
									</td>	
									<td class="total" data-ISOCODE="<?php echo $trans['iso_code'];?>">
										<?php echo $trans['clearTotal'];?>
									</td>			
									<td class="address">
										<?php echo $trans['address'];?>
									</td>
									<td class="text-center">
										<a href="/admin/user/orderQuery/detail?transId=<?php echo $trans['id'];?>" class="btn btn-success btn-xs"><?php echo $obj_orderlist_lang['view'];?></a>
									</td>
								</tr>
							<?php
									}
								}
							?>
							</tbody>
						</table>			
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

    <script type="text/javascript" src="/libs/formatcurrency/jquery.formatCurrency.js"></script>
    <script type="text/javascript" src="/libs/formatcurrency/i18n/jquery.formatCurrency.all.js"></script>
	  
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
			
			$(".total").each(function(){
				$(this).formatCurrency({ colorize:true, dropDecimals: false, region: $(this).attr("data-ISOCODE") });	
			});
			
			init_DataTable();
        });
    </script>
    
	<script type="text/javascript">
	
	$(function(){
		$('.date').datetimepicker({
			"format" : "YYYY/MM/DD",
			"pickTime": false
		});
	});
	
	function init_DataTable()
	{
		$('#datatable3').dataTable({
			"order": [[ 2, "desc" ]],
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
	
	</script>
	
</body>
</html>