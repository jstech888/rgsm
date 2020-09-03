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
							<h3 class="panel-title text-muted text-center mt10 fw400">一般設定</h3>
							<!-- /title -->
						</div>
						<div class="panel-body">
							<div class="panel">
								<div class="panel-heading text-center">
									<div class="caption">
										編輯區塊
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
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
												<span class="ladda-spinner"></span>
											</button>
										</div>
									</div>
								</div>
								<div class="panel-body">
									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">限時結帳（全館）促銷設定；訂單結帳時顯示折扣</span>
										</div>
										<div class="panel-body">		
											<p class="help-block text-center">不在期間內或折扣率小於0.1，全館折扣都不會被執行。</p>
											<div class="row" style="margin:0;padding:0;">										
												<label for="product-discount-start-date" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">起始日</label>
												<div class="col-sm-6">
													<div class="input-group date" id="datetimepicker2">
														<span class="input-group-addon cursor"><i class="fa fa-calendar"></i>
														</span>
														<input type="text" id="product-discount-start-date" class="form-control" value="<?php echo $DateLimitCheckoutDiscount["StartDate"];?>">
													</div>
												</div>
											</div>
											
											<div class="row" style="margin:0;padding:0;">										
												<label for="product-discount-end-date" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">結數日</label>
												<div class="col-sm-6">
													<div class="input-group date" id="datetimepicker2">
														<span class="input-group-addon cursor"><i class="fa fa-calendar"></i>
														</span>
														<input type="text" id="product-discount-end-date" class="form-control" value="<?php echo $DateLimitCheckoutDiscount["EndDate"];?>">
													</div>
												</div>
											</div>
											<div class="row" style="margin:0;padding:0;">										
												<label for="product-discount-rate" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">滿額設定</label>
												<div class="col-sm-6">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-key"></i>
														</span>
														<input type="text" id="product-discount-limitamount" class="form-control product" maxlength="8" autocomplete="off" placeholder="0.00"
														 value="<?php echo $DateLimitCheckoutDiscount["LimitAmount"];?>" onkeyup="saveDateLimitCheckoutDiscountTempData('LimitAmount',this);"/>
													</div>
												</div>
											</div>
											<div class="row" style="margin:0;padding:0;">										
												<label for="product-discount-rate" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">折扣率</label>
												<div class="col-sm-6">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-key"></i>
														</span>
														<input type="text" id="product-discount-rate" class="form-control product" maxlength="4" autocomplete="off" placeholder="0.00"
														 value="<?php echo $DateLimitCheckoutDiscount["Rate"];?>" onkeyup="saveDateLimitCheckoutDiscountTempData('Rate',this);"/>
													</div>
												</div>
												<label class="col-sm-2 " style="padding-left: 0;padding-right: 0;">(ex: 全館9折 請輸入 “0.90”)</label>
											</div>
											<div class="row" style="margin:0;padding:0;">										
												<label for="product-discount-message" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">跑馬燈訊息</label>
												<div class="col-sm-6">
													<input class="form-control" id="product-discount-message" value="<?php echo $DateLimitCheckoutDiscount["Message"];?>" onkeyup="saveDateLimitCheckoutDiscountTempData('Message',this);"/>
												</div>
											</div>

											<div class="tab-block mb25">
										        <ul class="nav nav-tabs tabs-border">
										          <li class="active">
										            <a href="#tab5_1" data-toggle="tab">說明簡介</a>
										          </li>
										        </ul>
										        <div class="tab-content">
										          <div id="tab5_1" class="tab-pane active">
										            <div class="col-sm-12 mb15">
										              <textarea name="ckeditor1" id="ckeditor1" rows="5">
										              <?php echo (isset($data_detail[$DEFAULTLANG]["value"]["description"]))?$data_detail[$DEFAULTLANG]["value"]["description"]:"";?>
										              </textarea>
										              <div class="clearfix"></div>
										            </div>
										            <div class="clearfix"></div>
										          </div>
										        </div>
										    </div>
										</div>
									</div>

									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">語言 相關</span>
										</div>
										<div class="panel-body">		
											<div class="row">
												<label for="default-lang" class="col-sm-2 control-label">預設語言</label>
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
												<label for="member-discount" class="col-sm-2 control-label">語言切換器</label>
												<div class="col-sm-4">
													<div class="switch switch-primary round switch-inline inline">											
														<input id="isShowLangSelector" type="checkbox" <?php echo ($isShowLangSelector == 1) ? "checked" : "";?>>
														<label for="isShowLangSelector"></label>
													</div>
													<p class="help-block">決定前台是否顯示，語言切換器。</p>
												</div>
											</div>	
										</div>
									</div>
									
									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">信件設定</span>
										</div>
										<div class="panel-body">		
										
											<div class="row" style="margin:0;padding:0;">										
												<label for="mailsetting-mail" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">收件人設定</label>
												<div class="col-sm-6">
													<input class="form-control" id="mailsetting-mail" value="<?php echo (isset($AdminMail["mail"]))?$AdminMail["mail"]:"";?>"/>
													<p class="help-block">多個收件人請用<span style="color:black;font-weight: bold;"> ; </span>分隔，對應前台“聯絡我們表單” (如有此功能) 之收件人</p>
												</div>
											</div>
											
											<div class="row" style="margin:0;padding:0;">										
												<label for="mailsetting-account" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">寄件人帳號</label>
												<div class="col-sm-6">
													<input class="form-control" id="mailsetting-account" value="<?php echo (isset($AdminMail["account"]))?$AdminMail["account"]:"";?>"/>
													<p class="help-block"> 此為必填帳號，作為寄送email、電子報、訂單訊息的代表帳戶名稱 (建議使用實際email帳號)。</p>
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
											<span class="panel-title">貨幣 相關</span>
										</div>
										<div class="panel-body">
											<div class="row">
												<label for="default-currency" class="col-sm-2 control-label">預設貨幣</label>
												<div class="col-sm-4">
													<select class="form-control" id="default-currency">
													<?php 
														foreach( $widgetCurrency AS $currency )
														{
															$isSelected = $currency["iso_code"] == $Currency ? "selected" : "";
													?>
															<option value="<?php echo $currency["iso_code"];?>" <?php echo $isSelected;?>><?php echo $currency["iso_code"];?></option>
													<?php
														}
													?>
													</select>
												</div>
											</div>	
											<div class="row">
												<label for="member-discount" class="col-sm-2 control-label">貨幣切換器</label>
												<div class="col-sm-4">
													<div class="switch switch-primary round switch-inline inline">											
														<input id="isShowCurrencySelector" type="checkbox" <?php echo ($isShowCurrencySelector == 1) ? "checked" : "";?>>
														<label for="isShowCurrencySelector"></label>
													</div>
													<p class="help-block">決定前台是否顯示，語言切換器。</p>
												</div>
											</div>	
											<table class="table table-striped table-bordered table-hover" id="datatable3">
												<thead>
													<tr>
														<th>基礎匯率</th>
														<?php 
															foreach( $widgetCurrency AS $currency )
															{
														?>
														<th><?php echo $currency["iso_code"];?></th>														
														<?php
															}
														?>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo $Currency;?></td>
														<?php
															foreach( $ExchangeRate AS $isoCode => &$currency )
															{
														?>
														<td><input type="text" value="<?php echo $currency["rate"];?>" class="form-control" onkeyup="saveExchangeRate('<?php echo $isoCode;?>',this);"/></td>
														<?php
															}
														?>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">購物金相關</span>
										</div>
										<div class="panel-body">
											<div class="row" style="margin:0;padding:0;">
												<label for="ShoppingPointRateName" class="col-sm-2 control-label">購物金分配比例</label>
												<div class="col-sm-6">
													<input class="form-control bfh-number" id="ShoppingPointRate" maxlength="6" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo isset($ShoppingPointRate)?$ShoppingPointRate:"";?>" />
												</div>
												<label class="col-sm-4 " style="text-align: left;padding-top: 12px;">（如 300元 一點 請輸入300；如不啟用請輸入 ”0“ ）</label>
											</div>
											<div class="row" style="margin:0;padding:0;">
												<label for="ShoppingPointRateName" class="col-sm-2 control-label">購物金折抵上限</label>
												<div class="col-sm-6">
													<input class="form-control bfh-number" id="ShoppingPointMaxRate" maxlength="3" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo isset($ShoppingPointMaxRate)? $ShoppingPointMaxRate:"";?>" style="width:98%;display:initial;" /> %
												</div>
												<label class="col-sm-4 " style="text-align: left;padding-top: 12px;">（若購物金額為100元，折抵上限為50%，則只能折抵50點購物金 ; 空白為不限制）</label>
											</div>
											<div class="row" style="margin:0;padding:0;">
												<label for="RegisterMoneyName" class="col-sm-2 control-label">新會員購物金</label>
												<div class="col-sm-6">
													<input class="form-control bfh-number" id="RegisterMoney" maxlength="6" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo isset($RegisterMoney)?$RegisterMoney:"";?>" />
												</div>
												<label class="col-sm-4 " style="text-align: left;padding-top: 12px;">（會員註冊時分配之購物金）</label>
											</div>
											<div class="row" style="margin:0;padding:0;">
												<label for="BirthdayMonenyName" class="col-sm-2 control-label">會員生日購物金</label>
												<div class="col-sm-6">
													<input class="form-control bfh-number" id="BirthdayMoneny" maxlength="6" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo isset($BirthdayMoneny)?$BirthdayMoneny:"";?>" />
												</div>
												<label class="col-sm-4 " style="text-align: left;padding-top: 12px;">（會員生日當天有登入方可得到）</label>
											</div>
										</div>
									</div>
									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">新會員註冊設定</span>
										</div>
										<div class="panel-body">
											<div class="row" style="margin:0;padding:0;" >
												<label for="isMemberCheckEmailTitle" class="col-sm-3 control-label">是否啟用會員認證信機制</label>
												<div class="col-sm-9">
													<div class="switch switch-primary round switch-inline inline">
														<input id="isMemberCheckEmail" type="checkbox" <?php echo ($isMemberCheckEmail == 1) ? "checked" : "";?>>
														<label for="isMemberCheckEmail"></label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">會員登入設定</span>
										</div>
										<div class="panel-body">
											<div class="row" style="margin:0;padding:0;" >
												<label for="isMemberCheckFacebookTitle" class="col-sm-3 control-label">是否使用Facebook登入機制</label>
												<div class="col-sm-9">
													<div class="switch switch-primary round switch-inline inline">
														<input id="isMemberCheckFacebook" type="checkbox" <?php echo ($isMemberCheckFacebook == 1) ? "checked" : "";?>>
														<label for="isMemberCheckFacebook"></label>
													</div>
												</div>
											</div>
										</div>
									</div>	

									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">銀行帳號設定</span>
										</div>
										<div class="panel-body">
											<div class="row" style="margin:0;padding:0;">
												<label for="bankname" class="col-sm-2 control-label">銀行名稱</label>
												<div class="col-sm-6">
													<input class="form-control" id="bank-name" value="<?php echo isset($BankRemittancesInfo["BankNameValue"])?$BankRemittancesInfo["BankNameValue"]:"";?>" onkeyup="saveBankRemittancesInfoTempData('BankNameValue',this);"/>
												</div>
											</div>
											<div class="row" style="margin:0;padding:0;">
												<label for="bankname" class="col-sm-2 control-label">分行名稱</label>
												<div class="col-sm-6">
													<input class="form-control" id="bank-branch" value="<?php echo isset($BankRemittancesInfo["BranchNameValue"])?$BankRemittancesInfo["BranchNameValue"]:"";?>" onkeyup="saveBankRemittancesInfoTempData('BranchNameValue',this);"/>
												</div>
											</div>	
											<div class="row" style="margin:0;padding:0;">
												<label for="bankname" class="col-sm-2 control-label">銀行地址</label>
												<div class="col-sm-6">
													<input class="form-control" id="bank-addr" value="<?php echo isset($BankRemittancesInfo["BankAddrValue"])?$BankRemittancesInfo["BankAddrValue"]:"";?>" onkeyup="saveBankRemittancesInfoTempData('BankAddrValue',this);"/>
												</div>
											</div>	
											<div class="row" style="margin:0;padding:0;">
												<label for="bankname" class="col-sm-2 control-label">帳號名稱</label>
												<div class="col-sm-6">
													<input class="form-control" id="bank-account-name" value="<?php echo isset($BankRemittancesInfo["BankACValue"])?$BankRemittancesInfo["BankACValue"]:"";?>" onkeyup="saveBankRemittancesInfoTempData('BankACValue',this);"/>
												</div>
											</div>	
											<div class="row" style="margin:0;padding:0;">
												<label for="bankname" class="col-sm-2 control-label">帳戶編號</label>
												<div class="col-sm-6">
													<input class="form-control" id="bank-account-no" value="<?php echo isset($BankRemittancesInfo["BankACNoValue"])?$BankRemittancesInfo["BankACNoValue"]:"";?>" onkeyup="saveBankRemittancesInfoTempData('BankACNoValue',this);"/>
												</div>
											</div>
											<div class="row" style="margin:0;padding:0;">
												<label for="bankname" class="col-sm-2 control-label">Bank Name</label>
												<div class="col-sm-6">
													<input class="form-control" id="bank-name-en" value="<?php echo isset($BankRemittancesInfo["BankNameEnValue"])?$BankRemittancesInfo["BankNameEnValue"]:"";?>" onkeyup="saveBankRemittancesInfoTempData('BankNameEnValue',this);"/>
												</div>
											</div>
											<div class="row" style="margin:0;padding:0;">
												<label for="bankname" class="col-sm-2 control-label">Branch Name</label>
												<div class="col-sm-6">
													<input class="form-control" id="bank-name-en" value="<?php echo isset($BankRemittancesInfo["BranchNameEnValue"])?$BankRemittancesInfo["BranchNameEnValue"]:"";?>" onkeyup="saveBankRemittancesInfoTempData('BranchNameEnValue',this);"/>
												</div>
											</div>	
											<div class="row" style="margin:0;padding:0;">
												<label for="bankname" class="col-sm-2 control-label">Bank Add</label>
												<div class="col-sm-6">
													<input class="form-control" id="bank-addr-en" value="<?php echo isset($BankRemittancesInfo["BankAddrEnValue"])?$BankRemittancesInfo["BankAddrEnValue"]:"";?>" onkeyup="saveBankRemittancesInfoTempData('BankAddrEnValue',this);"/>
												</div>
											</div>	
											<div class="row" style="margin:0;padding:0;">
												<label for="bankname" class="col-sm-2 control-label">A/C Name</label>
												<div class="col-sm-6">
													<input class="form-control" id="bank-account-enname" value="<?php echo isset($BankRemittancesInfo["BankACEnValue"])?$BankRemittancesInfo["BankACEnValue"]:"";?>" onkeyup="saveBankRemittancesInfoTempData('BankACEnValue',this);"/>
												</div>
											</div>	
											<div class="row" style="margin:0;padding:0;">
												<label for="bankname" class="col-sm-2 control-label">A/C No</label>
												<div class="col-sm-6">
													<input class="form-control" id="bank-account-enno" value="<?php echo isset($BankRemittancesInfo["BankACEnNoValue"])?$BankRemittancesInfo["BankACEnNoValue"]:"";?>" onkeyup="saveBankRemittancesInfoTempData('BankACEnNoValue',this);"/>
												</div>
											</div>	
										</div>
									</div>
									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">頁尾 社群鏈結</span>
										</div>
										<div class="panel-body">		
										<?php 
											foreach( $socialLink AS $ind=>$link )
											{
										?>
											<div class="row" style="margin:0;padding:0;">										
												<label for="socialLink-<?php echo $ind;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;"><?php echo $link["name"];?></label>
												<div class="col-sm-6">
													<input class="form-control" id="socialLink-<?php echo $ind;?>" onkeyup="saveSocialLink('<?php echo $ind;?>',this);" name="socialLink-<?php echo $ind;?>" value="<?php echo $link["href"];?>"/>
													<p class="help-block">空白前台則不顯示。</p>
												</div>
											</div>	
										<?php
											}
										?>
										</div>
									</div>
									<div class="panel panel-dark">
										<div class="panel-heading">
											<span class="panel-title">Google Analytics</span>
										</div>
										<div class="panel-body">		
											<div class="row" style="margin:0;padding:0;">										
												<label for="googleAnalytics-<?php echo $ind;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">追蹤編號</label>
												<div class="col-sm-6">
													<input class="form-control" id="GoogleId" name="GoogleId" onkeyup="saveGoogleAnalyticsInfoTempData('id',this);"  value="<?php echo isset($GoogleAnalyticsInfo["id"])?$GoogleAnalyticsInfo["id"]:"";?>"/>
													<p class="help-block">空白則不統計。</p>
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