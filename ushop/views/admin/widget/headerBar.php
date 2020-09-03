<style>
.navbar-toggle_sidemenu_l {
	width: 64px;
}

	body.sb-l-m .navbar-toggle_sidemenu_l{
	  margin-left: -70px;
	}
@media (max-width: 900px) {
	body.sb-l-m .navbar-toggle_sidemenu_l{
	  margin-left: -45px;
	}
}
	
</style>
<header class="navbar navbar-fixed-top bg-light">
            <div class="navbar-branding">
                <a class="navbar-brand" href="<?php echo base_url("/admin/dashboard");?>"> 
<!--					<img src="/admin/img/logo_richway2.png"/>-->
                </a>
            </div>
            <div class="navbar-branding navbar-toggle_sidemenu_l">
                <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
                <ul class="nav navbar-nav pull-right hidden">
                    <li>
                        <a href="#" class="sidebar-menu-toggle">
                            <span class="octicon octicon-ruby fs20 mr10 pull-right "></span>
                        </a>
                    </li>
                </ul>
            </div>
			<ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
                        <span><?php echo $admin['name'];?></span>
                        <span class="caret caret-tp hidden-xs" style="  display: inline-block !important;
  margin: 10px;"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                        <li class="bg-light br-b br-light p8">
                            <span class="pull-right mr10">管理者</span>
                            <div class="clearfix"></div>

                        </li>
                        <li class="br-t of-h">
                            <a href="<?php echo base_url("/admin/logout");?>" class="fw600 p12 animated animated-short fadeInDown">
                                <span class="fa fa-power-off pr5"></span> Logout </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>