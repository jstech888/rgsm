
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
.message-box {
  width:25%;
  display: inline-block;
  cursor: pointer;
  border:3px solid #fff;
  text-decoration: blink !important;
}
.message-box:hover {
  border: 3px solid #4CA783;
}
.message-box .panel {
  margin-bottom: 0;
}
.message-box img {
  max-width: 100%;
  max-height: 150px;
  min-height: 150px;
}

.message-box .user-name {
  position: absolute;
  top: 0;
  margin-top: 145px;
  margin-left: -7px;
  min-width: 120px;
  background: rgba(0, 0, 0, 0.69);
  font-size: 25px !important;
}

.message-box .last-message {
  color: #000;
  text-decoration: blink !important;
}

.bubble 
{
position: relative;
  width: 100%;
  height: 120px;
  padding: 0px;
  background: #FFFFFF;
  -webkit-border-radius: 15px;
  -moz-border-radius: 15px;
  border-radius: 15px;
  padding: 15px;
  border: #7F7F7F solid 4px;
  text-align: left;
}

.bubble:after 
{
content: '';
position: absolute;
border-style: solid;
  border-width: 0 7px 15px;
border-color: #FFFFFF transparent;
display: block;
width: 0;
z-index: 1;
top: -15px;
  left: 9px;
}

.bubble:before 
{
content: '';
position: absolute;
border-style: solid;
  border-width: 0 10px 18px;
border-color: #7F7F7F transparent;
display: block;
width: 0;
z-index: 0;
top: -22px;
  left: 6px;
}
.last-author {
  font-size: 18px;
  margin-bottom: 20px;
  text-align: left;
}
.panel-widthUser {
  position: relative;
}
.tool-box {
  position: absolute;
  display: none;
  float: none;
  width: 100%;
  height: 30px;
  top: 0;
  left: 0;
  z-index: 2;
}
.panel-widthUser:hover > .tool-box {
  display: block;
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
							<a>留言板</a>
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
                        <span class="panel-title"> <span class="glyphicon glyphicon-user"></span> 留言板</span>
                    </div>
                    <div class="panel-body p20 admin-form theme-primary" id="invoice-item">
						<?php 
						foreach( $msgData AS $k => $msgBlock )
						{
							$withId = ( $userInfo[$k]["from"] == $admin["id"] ) ? $userInfo[$k]["to"] : $userInfo[$k]["from"];
							$name  = ( $userInfo[$k]["from"] == $admin["id"] ) ? $userInfo[$k]["to_name"] : $userInfo[$k]["from_name"];
							$image = ( $userInfo[$k]["from"] == $admin["id"] ) ? $userInfo[$k]["to_picture"] : $userInfo[$k]["from_picture"];
						
							$lastMsg = array_shift(array_values($msgBlock));
						?>
						<div class="message-box">
							<div class="panel panel-tile text-center panel-widthUser">
								<div class="tool-box">
									<a class="btn btn-system btn-xs" href="/admin/user/inbox/detail?withId=<?php echo $withId;?>">回覆</a>
									<div class="btn btn-danger btn-xs" onclick="hideMessage('<?php echo $withId;?>');">移除</div>									
								</div>
								<div class="panel-heading hidden">
									<span class="panel-title"><i class="fa fa-pencil"></i></span>
								</div>
								<div class="panel-body bg-primary light">
									<img class="fs70 mt10 thumbnail responsive" src="<?php echo $image["url"];?>" />
									<h1 class="user-name fs35 mbn"><?php echo $name;?></h1>
									<div class="last-author"><img src="<?php echo $lastMsg["from_picture"]["url"];?>" class="responsive" style=" min-height:32px;height:32px;" />  <?php echo $lastMsg["from_name"];?></div>
									<div class="bubble">
										<span class="last-message"><?php echo $lastMsg["content"];?></span>
									</div>
								</div>
								<div class="panel-footer bg-primary br-n p12">
									<span class="fs11"><b>最後後留言時間：<?php echo $lastMsg["datetime"];?></b></span>
								</div>
							</div>
						</div >
						<?php
						}
						?>
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
	
	var objLang = <?php echo json_encode($objLang);?>;
        jQuery(document).ready(function() {
			
            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();
        });
		
		
function hideMessage( withId )
{
	if( confirm(objLang.inbox.removeAlertMsg) )
	{
		$.ajax({
			url: "/admin/user/inbox/hideMessage",
			async:true,
			cache:false,
			method:"POST",
			data:{ withId : withId },
			success:function(data, status, xhr){
				//console.log(data,status,xhr);
				PM.show({ title: objLang.inbox.removeSuccess, text: "", type: "info"});
				location.reload();
			},
			error:function(xhr, stauts, err){
				//console.log(xhr, stauts, err);
				PM.erro({title: objLang.inbox.removeFailed});
			}
		});			
	}
}
    </script>
	
</body>
</html>