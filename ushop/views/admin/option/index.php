<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
  .control-label {
	  padding-top: 8px;
	  font-size: 15px;
	  text-align: right;
  }
  .row {
	margin-top: 15px;
    padding: 0 20px;
  }
  .inline {
    display: inline-block;
    width: initial;
  }
	.switch {
	  padding: 7px 0;
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
            <section class="table-layout animated fadeIn">
                <!-- begin: .tray-center -->
                <div class="tray tray-center p30 pb0 va-t animated-delay"  data-animate="1100">
					<div class="panel">
						<div class="panel-heading">
							<!-- title -->
							<h3 class="panel-title text-muted text-center mt10 fw400"><?php echo $bkm_name;?></h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										Edit Zone
										<div class="pull-right">
											<!--
											<div class="btn btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>新增</span>
												<!-- The file input field used as target for the file upload widget 
												<input id="upload-image" type="file" name="files" >												
											</div>
											-->
											<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> Save </span>
												<span class="ladda-spinner"></span>
											</button>
										</div>
									</div>
								</div>
								<div class="panel-body">

									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">Language</span>
										</div>
										<div class="panel-body">		
											<div class="row">
												<label for="default-lang" class="col-sm-2 control-label">Default</label>
												<div class="col-sm-4">
													<select class="form-control" id="default-lang">
													<?php 
														foreach( $widgetLang AS $code=>&$lang )
														{
															$isSelected = $Lang == $code ? "selected" : "";
													?>
															<option value="<?php echo $code;?>" <?php echo $isSelected;?>><?php echo $lang[$Lang];?></option>
													<?php
														}
													?>
													</select>
												</div>
											</div>	
											<div class="row">
												<label for="member-discount" class="col-sm-2 control-label">Switch option</label>
												<div class="col-sm-4">
													<div class="switch switch-primary round switch-inline inline">											
														<input id="isShowLangSelector" type="checkbox" <?php echo ($isShowLangSelector == 1) ? "checked" : "";?>>
														<label for="isShowLangSelector"></label>
													</div>
													<p class="help-block">If it show or not in front page.</p>
												</div>
											</div>	
										</div>
									</div>
									
									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">Letter Setting</span>
										</div>
										<div class="panel-body">		
										
											<div class="row" style="margin:0;padding:0;">										
												<label for="mailsetting-mail" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">Receiver</label>
												<div class="col-sm-6">
													<input class="form-control" id="mailsetting-mail" value="<?php echo (isset($AdminMail["mail"]))?$AdminMail["mail"]:"";?>"/>
<!--													<p class="help-block">多個收件人請用<span style="color:black;font-weight: bold;"> ; </span>分隔，對應前台“聯絡我們表單” (如有此功能) 之收件人</p>-->
												</div>
											</div>
											
											<div class="row" style="margin:0;padding:0;">										
												<label for="mailsetting-account" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">Sender</label>
												<div class="col-sm-6">
													<input class="form-control" id="mailsetting-account" value="<?php echo (isset($AdminMail["account"]))?$AdminMail["account"]:"";?>"/>
<!--													<p class="help-block"> 此為必填帳號，作為寄送email、電子報、訂單訊息的代表帳戶名稱 (建議使用實際email帳號)。</p>-->
												</div>
											</div>
											<!--
											<div class="row" style="margin:0;padding:0;">										
												<label for="mailsetting-password" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">寄件人密碼</label>
												<div class="col-sm-6">
													<input type="password" class="form-control" id="mailsetting-password" value="<?php echo (isset($AdminMail["password"]))?$AdminMail["password"]:"";?>"/>
													<p class="help-block">網站專用Email帳戶，目前僅支援GMail，對應電子報所使用。</p>
												</div>
											</div>
											-->
										</div>
									</div>

									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">New member registration settings</span>
										</div>
										<div class="panel-body">
											<div class="row" style="margin:0;padding:0;" >
												<label for="isMemberCheckEmailTitle" class="col-sm-3 control-label">Certification letter check ?</label>
												<div class="col-sm-9">
													<div class="switch switch-primary round switch-inline inline">
														<input id="isMemberCheckEmail" type="checkbox" <?php echo ($isMemberCheckEmail == 1) ? "checked" : "";?>>
														<label for="isMemberCheckEmail"></label>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							
							<div class="pull-right mt10">
								<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
									<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
									<span class="ladda-spinner"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end: .tray-center -->
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
	
    <script src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.js"></script>
	<script src="<?php echo base_url("libs/bootstrap-touchspin/src/jquery.bootstrap-touchspin.js");?>"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/globalize/0.1.1/globalize.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>
	<script type="text/javascript" src="/admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>

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

			 $('.date').datetimepicker({
				"format" : "YYYY/MM/DD",
				"pickTime": false
			 });
			 
			 //saveDateLimitCheckoutDiscountTempData('Rate',this);
			 $('#shopping-point-issue-date').mask('99-99');
			 $('.date').mask('9999/99/99');
			 $('#product-discount-rate').mask('0.99');

			 CKEDITOR.disableAutoInline = true;

            // Init Ckeditor
            var editorContent1 = CKEDITOR.replace('ckeditor1', {
                filebrowserBrowseUrl:     '/admin/vendor/editors/ckfinder/ckfinder.html?type=files',
                height: 400
            });

        });
    </script>
    
	<script type="text/javascript">
	
	var ajaxData = [];
	
	var ExchangeRate = <?php echo json_encode($ExchangeRate);?>;
	var socialLink = <?php echo json_encode($socialLink);?>;
	var DateLimitCheckoutDiscount = <?php echo json_encode($DateLimitCheckoutDiscount);?>;
	var BankRemittancesInfo = <?php echo json_encode($BankRemittancesInfo);?>;
	var GoogleAnalyticsInfo = <?php echo json_encode($GoogleAnalyticsInfo);?>;
	
	function saveSocialLink(ind,self)
	{
		socialLink[ind].href = $(self).val();
	}
	
	function saveExchangeRate( key, self )
	{		
		ExchangeRate[key].rate = $(self).val();
	}

	function saveDateLimitCheckoutDiscountTempData(key, self)
	{
		DateLimitCheckoutDiscount[key] = $(self).val();
	}

	function saveBankRemittancesInfoTempData(key, self)
	{
		BankRemittancesInfo[key] = $(self).val();
	}

	function saveGoogleAnalyticsInfoTempData(key, self)
	{
		GoogleAnalyticsInfo[key] = $(self).val();
	}
	
	function init_pageSave()
	{
		$(".page-save").unbind("click");
		$(".page-save").bind("click",function(){
			if(confirm("確定修改？"))
			{
				var defaultLang				= $("#default-lang").val();
				var isShowLangSelector		= $("#isShowLangSelector:checked").length;
				
				var defaultCurrency			= $("#default-currency").val();
				var isShowCurrencySelector	= $("#isShowCurrencySelector:checked").length;
				var isMemberCheckEmail   	= $("#isMemberCheckEmail:checked").length;
				var isMemberCheckFacebook   = $("#isMemberCheckFacebook:checked").length;
				
				var AdminMail               = {
					"mail" 		: $("#mailsetting-mail").val(),
					"account" 	: $("#mailsetting-account").val(),
					"password" 	: $("#mailsetting-password").val()
				};
				DateLimitCheckoutDiscount.StartDate = $("#product-discount-start-date").val();
				DateLimitCheckoutDiscount.EndDate = $("#product-discount-end-date").val();
// alert('ckeditor1='+CKEDITOR.instances.ckeditor1.getData()); return;
				DateLimitCheckoutDiscount.description = CKEDITOR.instances.ckeditor1.getData();
				ShoppingPointRate = $("#ShoppingPointRate").val();
				ShoppingPointMaxRate = $("#ShoppingPointMaxRate").val();
				RegisterMoney = $("#RegisterMoney").val();
				BirthdayMoneny = $("#BirthdayMoneny").val();
				//HostRate = $("#HostRate").val();
				if(ShoppingPointMaxRate>100){
					alert('購物金折抵上限最多只能為100%');
					$('#ShoppingPointMaxRate').focus();
					return false;
				}

				var ajaxData 		= { "optionData" : [
						{ "type" 	: "DEFAULTLANG", 			"value" : defaultLang },
						{ "type" 	: "isShowLangSelector",		"value" : isShowLangSelector },
						{ "type" 	: "DEFAULTCURRENCY", 		"value" : defaultCurrency },
						{ "type" 	: "isShowCurrencySelector",	"value" : isShowCurrencySelector },
						{ "type"	: "ExchangeRate",			"value" : ExchangeRate },
						{ "type"	: "socialLink",				"value" : socialLink },
						{ "type" 	: "AdminMail",				"value" : AdminMail },
						{ "type" 	: "DateLimitCheckoutDiscount", 	"value" : DateLimitCheckoutDiscount },
						{ "type" 	: "BankRemittancesInfo", 	"value" : BankRemittancesInfo },
						{ "type" 	: "GoogleAnalyticsInfo", 	"value" : GoogleAnalyticsInfo },
						{ "type" 	: "ShoppingPointRate", 		"value" : ShoppingPointRate },
						{ "type" 	: "ShoppingPointMaxRate", 	"value" : ShoppingPointMaxRate },
						{ "type" 	: "RegisterMoney", 			"value" : RegisterMoney },
						{ "type" 	: "BirthdayMoneny", 		"value" : BirthdayMoneny },
						{ "type" 	: "isMemberCheckEmail", 		"value" : isMemberCheckEmail },
						{ "type" 	: "isMemberCheckFacebook", 		"value" : isMemberCheckFacebook }

						/*{ "type" 	: "HostRate", 		"value" : HostRate }
						{ "type" 	: "MEMEBERPRICE", 		"value" : memberDiscount },
						{ "type" 	: "FreeFare", 			"value" : FreeFare },
						{ "type" 	: "BankRemittancesVar", "value" : BankRemittancesVar },
						{ "type" 	: "PayOnArrivalVar", 	"value" : PayOnArrivalVar }
						*/
					]};
				$.ajax({
					url: "<?php echo base_url('/admin/option/change');?>",
					async:true,
					cache:false,
					method:"POST",
					data:ajaxData,
					success:function(data, status, xhr){
						var type = data.code == 1?"info":"danger";
						var text = data.code == 1?'修改完成！':"修改失敗！";
						
						PM.show({ title: data.message, text: text, type: type });
												
						setTimeout(function(){
							location.reload();
						},1000);
					},
					error:function(xhr, stauts, err){
						PM.erro();	
					}
				});	
			}
		});
	}

	$(function(){
		init_pageSave();

		var desc = DateLimitCheckoutDiscount.description;
        CKEDITOR.instances.ckeditor1.setData(desc);
		
		$("input[name='member-discount']").TouchSpin({
			min: 0,
			max: 1,
			step: 0.1,
			decimals: 2,
			boostat: 5,
			maxboostedstep: 10
		});
		$(".feeContain").TouchSpin({
			min: 0,
			max: 1000,
			step: 1,
			decimals: 0,
			boostat: 5,
			maxboostedstep: 10,
			prefix: '$'
		});
	});
	</script>
	
</body>
</html>