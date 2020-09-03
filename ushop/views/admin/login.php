<body class="external-page sb-l-c sb-r-c">
<style>
#login1 {
  	max-width: 450px !important;
  	text-align: center;
}
img {
  	margin: 0 auto;
}
.footer-info {
	margin: 0 auto !important;
	color: #fff;
	text-align: center;
}
.footer-info span{
	display:block;
}
.bksystem-title {
	color: #1a8bca;
	font-size: 36px;
	font-weight: 900;
}
.admin-form .btn-primary,  
.admin-form .btn-primary:focus, 
.admin-form .btn-primary:active {
	border-radius: 8px;
	background-color: #f5aa1e;
	font-weight: bold;
	font-size: 18px;
}
.admin-form .btn-primary:hover {
	background-color: #F0CA81;
}
body.external-page #content .admin-form {
	/*margin-top: inherit;*/
	margin-top: 100px;
}
#content_wrapper {
	/*margin-top: inherit;*/
	margin-top: 15vh;
}
</style>
    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>

            <!-- Begin: Content -->
            <section id="content">

                <div class="admin-form theme-info" id="login1">
							
                    <?php /*
                    <div class="row mb15 table-layout">
                        <div class="col-xs-12 va-m pln">
                            <a>
                                <img src="/admin/img/logo_richway_white.png" title="UBestShop Logo" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    */ ?>

					<?php 
						$hidden = "";
						if( isset($opt) )
						{
							$hidden = $opt['status'] == "info"?"style=\"display:none;\"":"";
					?>
							<div class="alert alert-sm alert-border-left alert-<?php echo $opt['status'];?> light alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info pr10"></i>
                                <strong><?php echo $opt['message'][0];?></strong>
                            </div>
					<?php 
						}
						if($hidden != "")
						{
					?>
							<script>
								// Your application has indicated there's an error
								window.setTimeout(function(){
									// Move to a new location or you can do something else
									window.location.href = "<?php echo base_url('/admin/dashboard');?>";
								}, 3000);
							</script>
					<?php
						}
					?>
                    <div class="panel panel-info mt10 br-n" <?php echo $hidden;?>>

                        <!-- end .form-header section -->
                        <form method="post" action="/admin/login" id="contact">
                            <div class="panel-body bg-light p30">
                                <div class="row">
                                    <div class="col-sm-12 pr30">
										<i class="fa fa-cubes fa-5x"></i>
                                        
                                        <div class="section">
											<H2 class="bksystem-title">Backend Platform</H2>
                                        </div>

                                        <div class="section">
                                            <label for="username" class="field prepend-icon">
                                                <input type="text" name="username" id="username" class="gui-input" placeholder="Account">
                                                <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" name="password" id="password" class="gui-input" placeholder="Password">
                                                <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                    </div>
                                </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer clearfix p10 ph15">
                                <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
								
                            </div>
                            <!-- end .form-footer section -->
                        </form>
                    </div>
                </div>
                <div class="admin-form theme-info footer-info">
                    <span>Copyright ©2020 AAA Co., Ltd AllRights Reserved.</span>
                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="/admin/theme/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/admin/theme/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="/admin/theme/assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="/admin/js/pages/login/EasePack.min.js"></script>
    <script type="text/javascript" src="/admin/js/pages/login/rAF.js"></script>
    <script type="text/javascript" src="/admin/js/pages/login/TweenLite.min.js"></script>
    <script type="text/javascript" src="/admin/js/pages/login/login.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="/admin/js/utility/utility.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/demo.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

            // Init Demo JS
            Demo.init();

            // Init CanvasBG and pass target starting location
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });


        });
    </script>

    <!-- END: PAGE SCRIPTS -->

</body>

</html>
