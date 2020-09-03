<body class="editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<style>
  .control-label {
	line-height: 32px;
	padding-top: 3px;
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
  .warning {
	color: red;
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
                            <a>商店管理</a>
                        </li>
                        <li class="crumb-active">
                            <a>商店設定</a>
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
											<button type="button" class="btn ladda-button btn-info page-save" data-style="zoom-in">
												<span class="ladda-label"><span class="glyphicons glyphicons-file_import"></span> 儲存</span>
												<span class="ladda-spinner"></span>
											</button>
										</div>
									</div>
								</div>
								<div class="panel-body">
									<div class="row text-center" style="margin:0;padding:0;">
										<H3 class="warning">金額目前以新台幣(TWD)做設置，對應不同貨幣時會使用，商店設置中的參考匯率做轉換。</H3>
									</div>
									<div class="row">
										<?php  $allpayStatus = isset($allpayMerchantParam["status"])? $allpayMerchantParam["status"] : "" ?>
										<label for="web" class="col-sm-6 control-label" style="padding-left: 0;padding-right: 0;">環境設定</label>
										<div class="col-sm-4">
											<input type="checkbox" id="allpayStatus" name="allpayStatus" value="1" <?php echo ($allpayStatus == "1") ?"checked" :"" ?> >
											<p class="help-block">(勾為啟用正式環境設定)</p>
										</div>
									</div>

									<?php 
										if( isset($allpayMerchantParam["web"]) )
										{
											foreach( $allpayMerchantParam["web"] AS $method => $account )
											{
									?>
									<div class="row">
										<label for="web" class="col-sm-6 control-label" style="padding-left: 0;padding-right: 0;"><?php echo $method;?> </label>
										<div class="col-sm-4">
											<input class="form-control web-account" id="web-<?php echo $method;?>" data-mehtod="<?php echo $method;?>" value="<?php echo $account;?>">
										</div>
									</div>
									<?php
											}
										}
									?>
									<div class="row">
										<label for="FreeFare" class="col-sm-6 control-label" style="padding-left: 0;padding-right: 0;">免運費設置</label>
										<div class="col-sm-4">
											<input class="form-control" id="FreeFare" name="FreeFare" value="<?php echo $FreeFare;?>"/>
											<p class="help-block">此金額為門檻，意思是超過此金額則免運費。</p>
										</div>
									</div>
									<div class="tab-block mb25">
										<ul class="nav nav-tabs tabs-border">
											<li class="active">
												<a href="#tab8_1" data-toggle="tab">本島</a>
											</li>
											<li>
												<a href="#tab8_2" data-toggle="tab">外島</a>
											</li>
											<!--<li>
												<a href="#tab8_3" data-toggle="tab">中國</a>
											</li>-->
											<li>
												<a href="#tab8_4" data-toggle="tab">外國</a>
											</li>
										</ul>
										<div class="tab-content">
											<div id="tab8_1" class="tab-pane active">
												<?php
													foreach( $cashflow AS $methodKey => $param )
													{
												?>
											  <div class="col-md-6">
												<div class="panel panel-dark">
													<div class="panel-heading">
														<span class="panel-title"><?php echo $cashflowMethod[$methodKey];?></span>
													</div>
													<div class="panel-body">		
														<div class="row" style="margin:0;padding:0;">										
															<label for="<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">手續費</label>
															<div class="col-sm-6">
																<input class="form-control feeContain" id="<?php echo $methodKey;?>" data-key="<?php echo $methodKey;?>" data-loc="inIsland" data-type="fee" name="<?php echo $methodKey;?>" value="<?php echo $param["inIsland"]['fee'];?>"/>
																<p class="help-block">當客戶結帳時，選擇 銀行匯款 需另計的手續費。(設置為 0 前台結帳頁則不加入計算)</p>
															</div>
														</div>	
														<div class="row" style="margin:0;padding:0;">										
															<label for="<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">運費</label>
															<div class="col-sm-6">
																<input class="form-control feeContain" id="<?php echo $methodKey;?>" data-key="<?php echo $methodKey;?>" data-loc="inIsland" data-type="fare" name="<?php echo $methodKey;?>" value="<?php echo $param["inIsland"]['fare'];?>"/>
																<p class="help-block">當客戶結帳時，選擇 銀行匯款 對應的貨運配用費用。(設置為 0 前台結帳頁則不加入計算)</p>
															</div>
														</div>
														<div class="row" style="margin:0;padding:0;">										
															<label for="<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">狀態</label>
															<div class="col-sm-6" style="padding-top: 10px;" id="<?php echo $methodKey;?>-inIsland">
															<?php 
																$isAct = isset($param["inIsland"]['status']) && $param["inIsland"]['status'] == 1?'checked':"";
															?>
																<input type="radio" name="<?php echo $methodKey;?>-inIsland" class="widget-isShow" id="<?php echo $methodKey;?>-inIsland" <?php echo $isAct;?>>
															</div>
														</div>
													</div>
												</div>
											  </div>
												<?php
													}
												?>
											</div>
											<div id="tab8_2" class="tab-pane">
												<?php
													foreach( $cashflow AS $methodKey => $param )
													{
												?>
											  <div class="col-md-6">
												<div class="panel panel-dark">
													<div class="panel-heading">
														<span class="panel-title"><?php echo $cashflowMethod[$methodKey];?></span>
													</div>
													<div class="panel-body">		
														<div class="row" style="margin:0;padding:0;">										
															<label for="outsea-<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">手續費</label>
															<div class="col-sm-6">
																<input class="form-control feeContain" id="outsea-<?php echo $methodKey;?>" data-key="<?php echo $methodKey;?>" data-loc="outIsland" data-type="fee" name="outsea-<?php echo $methodKey;?>" value="<?php echo $param["outIsland"]['fee'];?>"/>
																<p class="help-block">當客戶結帳時，選擇 銀行匯款 需另計的手續費。(設置為 0 前台結帳頁則不加入計算)</p>
															</div>
														</div>	
														<div class="row" style="margin:0;padding:0;">										
															<label for="outsea-<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">運費</label>
															<div class="col-sm-6">
																<input class="form-control feeContain" id="outsea-<?php echo $methodKey;?>" data-key="<?php echo $methodKey;?>" data-loc="outIsland" data-type="fare"  name="outsea-<?php echo $methodKey;?>" value="<?php echo $param["outIsland"]['fare'];?>"/>
																<p class="help-block">當客戶結帳時，選擇 銀行匯款 對應的貨運配用費用。(設置為 0 前台結帳頁則不加入計算)</p>
															</div>
														</div>
														<div class="row" style="margin:0;padding:0;">										
															<label for="<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">狀態</label>
															<div class="col-sm-6" style="padding-top: 10px;">
																<?php 
																	$isAct = isset($param["outIsland"]['status']) && $param["outIsland"]['status'] == 1?'checked':"";
																?>
																	<input type="radio" name="<?php echo $methodKey;?>-outIsland" class="widget-isShow" id="<?php echo $methodKey;?>-outIsland" <?php echo $isAct;?>>
															</div>
														</div>
													</div>
												</div>
											  </div>
												<?php
													}
												?>
											</div>
											<div id="tab8_3" class="tab-pane">
												<?php
													foreach( $cashflow AS $methodKey => $param )
													{
												?>
											  <div class="col-md-6">
												<div class="panel panel-dark">
													<div class="panel-heading">
														<span class="panel-title"><?php echo $cashflowMethod[$methodKey];?></span>
													</div>
													<div class="panel-body">		
														<div class="row" style="margin:0;padding:0;">										
															<label for="china-<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">手續費</label>
															<div class="col-sm-6">
																<input class="form-control feeContain" id="china-<?php echo $methodKey;?>" data-key="<?php echo $methodKey;?>" data-loc="china" data-type="fee" name="china-<?php echo $methodKey;?>" value="<?php echo isset($param["china"]['fee'])?$param["china"]['fee']:"1";?>"/>
																<p class="help-block">當客戶結帳時，選擇 銀行匯款 需另計的手續費。(設置為 0 前台結帳頁則不加入計算)</p>
															</div>
														</div>	
														<div class="row" style="margin:0;padding:0;">										
															<label for="china-<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">運費</label>
															<div class="col-sm-6">
																<input class="form-control feeContain" id="china-<?php echo $methodKey;?>" data-key="<?php echo $methodKey;?>" data-loc="china" data-type="fare"  name="china-<?php echo $methodKey;?>" value="<?php echo isset($param["china"]['fare'])?$param["china"]['fare']:"1";?>"/>
																<p class="help-block">當客戶結帳時，選擇 銀行匯款 對應的貨運配用費用。(設置為 0 前台結帳頁則不加入計算)</p>
															</div>
														</div>
														<div class="row" style="margin:0;padding:0;">										
															<label for="<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">狀態</label>
															<div class="col-sm-6" style="padding-top: 10px;">
																<?php 
																	$isAct = isset($param["china"]['status']) && $param["china"]['status'] == 1?'checked':"";
																?>
																	<input type="radio" name="<?php echo $methodKey;?>-china" class="widget-isShow" id="<?php echo $methodKey;?>-china" <?php echo $isAct;?>>
															</div>
														</div>
													</div>
												</div>
											  </div>
												<?php
													}
												?>
											</div>
											<div id="tab8_4" class="tab-pane">
												<?php
													foreach( $cashflow AS $methodKey => $param )
													{
												?>
											  <div class="col-md-6">
												<div class="panel panel-dark">
													<div class="panel-heading">
														<span class="panel-title"><?php echo $cashflowMethod[$methodKey];?></span>
													</div>
													<div class="panel-body">		
														<div class="row" style="margin:0;padding:0;">										
															<label for="foreign-<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">手續費</label>
															<div class="col-sm-6">
																<input class="form-control feeContain" id="foreign-<?php echo $methodKey;?>" data-key="<?php echo $methodKey;?>" data-loc="foreign" data-type="fee" name="foreign-<?php echo $methodKey;?>" value="<?php echo isset($param["foreign"]['fee'])?$param["foreign"]['fee']:"1";?>"/>
																<p class="help-block">當客戶結帳時，選擇 銀行匯款 需另計的手續費。(設置為 0 前台結帳頁則不加入計算)</p>
															</div>
														</div>	
														<div class="row" style="margin:0;padding:0;">										
															<label for="china-<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">運費</label>
															<div class="col-sm-6">
																<input class="form-control feeContain" id="foreign-<?php echo $methodKey;?>" data-key="<?php echo $methodKey;?>" data-loc="foreign" data-type="fare"  name="foreign-<?php echo $methodKey;?>" value="<?php echo isset($param["foreign"]['fare'])?$param["foreign"]['fare']:"1";?>"/>
																<p class="help-block">當客戶結帳時，選擇 銀行匯款 對應的貨運配用費用。(設置為 0 前台結帳頁則不加入計算)</p>
															</div>
														</div>
														<div class="row" style="margin:0;padding:0;">										
															<label for="<?php echo $methodKey;?>" class="col-sm-2 control-label" style="padding-left: 0;padding-right: 0;">狀態</label>
															<div class="col-sm-6" style="padding-top: 10px;">
																<?php 
																	$isAct = isset($param["foreign"]['status']) && $param["foreign"]['status'] == 1?'checked':"";
																?>
																	<input type="radio" name="<?php echo $methodKey;?>-foreign" class="widget-isShow" id="<?php echo $methodKey;?>-foreign" <?php echo $isAct;?>>
															</div>
														</div>
													</div>
												</div>
											  </div>
												<?php
													}
												?>
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
			$("input[type=radio]").switchButton({
				on_label: '顯示',
				off_label: '隱藏',
				width: 50,
				height: 16,
				button_width: 25
			});
        });
    </script>
    
	<script type="text/javascript">
	
	var ajaxData = [];
	var cashflowMethod = <?php echo json_encode($cashflowMethod);?>;
	function init_pageSave()
	{
		$(".page-save").unbind("click");
		$(".page-save").bind("click",function(){
			if(confirm("確定修改？"))
			{
				var optionData = [];
				
				var webAccount = {};
				
				$(".web-account").each(function(){
					webAccount[$(this).attr("data-mehtod")] = $(this).val();
				});

				var allpayStatus = ($('#allpayStatus').prop('checked'))? "1" :"0" ;
				
				optionData.push( { "type" : "allpayMerchantParam", "value" : { "web" : webAccount, "status" : allpayStatus } } );				
				
				optionData.push( { "type" : "FreeFare", "value" : $("#FreeFare").val() } );
				
				for( var k in cashflowMethod )
				{
					var item = { "type" : k, "value" : {"inIsland":{"fee":"1","fare":"1","status":"1"},"outIsland":{"fee":"1","fare":"1","status":"1"},"china":{"fee":"1","fare":"1","status":"1"},"foreign":{"fee":"1","fare":"1","status":"0"}} };
					optionData.push(item);
				}
					
				$(".feeContain").each(function(){
					var key  = $(this).attr("data-key");
					var loc  = $(this).attr("data-loc");
					var type = $(this).attr("data-type");
					
					for( var i in optionData )
					{
						if( optionData[i].type == key )
						{
							optionData[i].value[loc][type] 	= $(this).val();
							optionData[i].value[loc].status = $('input#'+key+'-'+loc+'[type="radio"]:checked').length;
						}
					}
				});
				
				
				$.ajax({
					url: "<?php echo base_url('/admin/option/change');?>",
					async:true,
					cache:false,
					method:"POST",
					data:{ "optionData" : optionData },
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