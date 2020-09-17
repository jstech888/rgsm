<!DOCTYPE html>
<html>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>後台管理系統</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta http-equiv="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	
    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300">
	
	
    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="/admin/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Admin Modals CSS -->
    <link rel="stylesheet" type="text/css" href="/admin/admin-tools/admin-plugins/admin-modal/adminmodal.css">
	
<?php
	if( $css_include != false )
	{
		include_once(dirname(__FILE__)."/css/".$css_include.".php");
	}
?>
	<link rel="stylesheet" type="text/css" href="/libs/jquery.switchButton.css">
	<link rel="stylesheet" type="text/css" href="/admin/vendor/plugins/nestable/nestable.css">
	
    <link rel="stylesheet" type="text/css" href="/admin/theme/vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css">

	
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="/admin/theme/assets/skin/default_skin/css/theme.css">


    <!-- Favicon -->
    <link rel="shortcut icon" href="/admin/theme/assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
	<style>
	
	#sidebar_left {
	  min-height: 1625px;
	}
	
	/*拖曳編輯模塊*/
	.dd-edit{right:0;margin:0;overflow:hidden;position:absolute;top:0;white-space:nowrap;max-width:180px;}
	.dd-edit > a{float:left;width:30px;height:30px;background:rgba(100,100,100,0.1);cursor:pointer;line-height:30px;text-align:center;opacity:0;-webkit-transition:all .5s;-moz-transition:all .5s;-o-transition:all .5s;-ms-transition:all .5s;transition:all .5s;color:#999;}
	div:hover > .dd-edit a{opacity:1;}
	div:hover > .dd-edit a.disabled{cursor:not-allowed;}
	.dd-edit > a:hover{color:#4B8DF8;}
	div[class*=bg-].dd3-content .dd-edit > a {color:#FFF;background:rgba(0,0,0,0.2)}
	table .dd-edit{position:relative;}
	table .dd-edit > a{opacity:1;background:none;height:20px;width:20px;font-size:15px;line-height:20px;}
	table .dd-edit > a.dd-edit-change{margin-right:5px;}
		
	/*拖曳排序自動高度*/
	.dda-content{display:block;min-height:30px;margin:5px 0;padding:5px 10px 5px 40px;color:#333;text-decoration:none;font-weight:400;border:1px solid #ccc;background:#fafafa;-webkit-border-radius:3px;border-radius:3px;box-sizing:border-box;-moz-box-sizing:border-box}
	.dda-content:hover{background:#fff}
	.dd-dragel > .dda-item > .dda-content{margin:0}
	.dda-item > button{margin-left:30px}
	.dda-handle{position:absolute;margin:0;left:0;top:0;float:left;cursor:move;width:30px;height:100%;text-indent:100%;white-space:nowrap;overflow:hidden;border:1px solid #aaa;background:#ddd;border-top-right-radius:0;border-bottom-right-radius:0}
	.dda-handle:before{content:'≡';display:block;position:absolute;left:0;top:50%;margin-top:-12px;width:100%;text-align:center;text-indent:0;color:#fff;font-size:20px;font-weight:normal}
	.dda-handle:hover{background:#ddd}
	.dd-dragel .dd-handle{box-shadow:none}
	.dd-dragel .dd-item{box-shadow:2px 4px 6px 0 rgba(0,0,0,0.1)}
	.dda-content .owl-item > div {margin: 0 5px 0 0;}
	#content_wrapper {
	   margin-top: 60px;
	}
	#sidebar_left.nano > .nano-content {
 	   	margin-top: 0px;
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
	.nav.nav-tabs li,
	.nav.nav-tabs li a {
	  cursor:pointer;
	}
	
	.control-label {
	  text-align: right;
	  line-height: 40px;
	}
	
	#sidebar_left {
	  min-height: 1400px;
	}
	div.dataTables_length select {
	  display: inline-block;
	}
	.sidebar-menu {
		padding-top: 120px;
	}
	body, html {
		font-size: 16px;
	}
	</style>
</head>
