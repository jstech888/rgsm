<script src="https://ajax.cdnjs.com/ajax/libs/json2/20110223/json2.js"></script>
<script src="/libs/addr/json2ext.js"></script>
<script src="/libs/addr/jquery.twAddrHelper.js"></script>
<script src="/libs/addr/jquery.twzipcode-1.6.7.js"></script>

<link rel="stylesheet" type="text/css"
	href="/libs/datepicker/css/bootstrap-datepicker3.min.css">

<script src="/libs/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/libs/datepicker/locales/bootstrap-datepicker.zh-TW.min.js"
	charset="UTF-8"></script>
<script>
	$(function(){
		$('.birthday-content.date').datepicker({
			autoclose: true,
			format: "yyyy/mm/dd",
			language: "zh-TW",
			todayHighlight: true
		});
	});
	</script>
<style>
.user-form {
	margin-top: 25px;
}

.form-group {
	margin-top: 15px;
	margin-bottom: 15px;
}

.form-group .label {
	text-align: right;
	margin-top: 7px;
}

.form-group .column {
	text-align: right;
}

.bs-callout {
	padding: 20px;
	margin: 20px 0;
	border: 1px solid #eee;
	border-left-width: 5px;
	border-radius: 3px;
}

.bs-callout-info {
	border-left-color: #1b809e;
}

.bs-callout-error {
	border-left-color: #1b809e;
}

.bs-callout-warring {
	border-left-color: #FF002A;
}

label {
	margin: 0;
	padding: 0;
	/*     	line-height: 38px; */
	/*     	height: 38px; */
	text-align: right;
	font-size: 16px;
	font-weight: normal;
}

input {
	font-size: 16px;
	font-weight: normal;
}

.agreeblockcontain {
	padding: 20px;
	padding-bottom: 0px;
}

.panel-default>.panel-heading {
	text-align: center;
}

.panel-title {
	color: #000;
	font-size: 18px;
	text-align: center;
}

@media ( max-width : 768px) {
	.form-group .label {
		text-align: center;
		margin-top: 7px;
	}
	.birthday-content.date {
		text-align: center;
	}
	.agreeblockcontain {
		padding: 0px;
		margin-top: 20px;
	}
}

.agree-option {
	text-align: center;
	font-size: 16px;
	padding: 0 20px;
}

.form-horizontal .control-label {
	line-height: 18px;
}

.input-group-addon {
	/* 	  display: inline-block; */
	/* 	  padding: 0; */
	/* 	  margin-top: -4px; */
	/* 	  margin-left: -5px; */
	/* 	  border-left: 1px solid #DDD !important; */
	
}

.input-group-addon {
	display: table-cell;
}

.birthday-content input.form-control {
	/* 	  text-align: center; */
	
}

@media ( max-width : 992px) {
	.form-horizontal .form-group {
		text-align: center;
	}
	.form-control {
		margin: 0 auto;
	}
	.panel-footer>.pull-right {
		float: none !important;
		text-align: center;
	}
	.birthday-box {
		display: inline-block;
		width: initial;
		position: relative;
		float: none;
		margin: 0 auto;
	}
	.input-group {
		/* 		  width: 120px; */
		
	}
}

.panel-info.panel-border.top {
	max-width: 1000px;
	margin: 0 auto;
	margin-top: 30px;
    margin-bottom: 20px;
	border-top-color: #9775ac;
}

.form-control {
	height: 32px;
}

.form-box {
	width: 85%;
	max-width: 100%;
}

.gender-radio-style {
	height: 32px;
	text-align: left;
	/*padding-top: 5px;*/
}
#input-notescol-sm-5{
	margin-top: 5px;
	padding-left: 0px;
	color: #F00;
}
#display-inline-block{
	display: inline-block;
}
input.cAddress.form-control.mt15.mb15 {
    margin-top: 10px;
}
#captcha-form{
	width: 200px;
    float: left;
    margin-right: 15px;
}
@media screen  and (min-width: 768px) and (max-width: 991px){
	#col-sm-9{
		text-align: left;
	}
	#display-inline-block{
		display: inline-block;
	}
}
@media screen  and (max-width: 767px){
	#col-sm-3{
		float: left;
	}
	.gender-radio-style {
		height: 32px;
		text-align: left;
		padding-top: 0px; 
	}
	.form-box {
		width: 100%;
		max-width: 100%;
	}
	.form-horizontal .form-group {
		text-align: left;
	}
}
@media screen  and (max-width: 430px){
	#display-inline-block{
		display: block;
		margin-top: 15px;
	}
}
header.navbar.navbar-default.navbar-fixed-top.yamm.container.hidden-xs.hidden-sm .row.logo-row.desktop .pullRight .hight-light-block .form-group{
	    margin-top: 0px;
}
#captcha-image{
	height: auto;
    margin: 0;
    float: left;
    width: 170px;
}
#aaaaa{
	float: left;
  padding-top: 25px;
}
.btn {
	padding: 5px 12px;
}
.form-group div#dvAddress div#twzipcode .autoZip.display-inline-block select{
	padding: 3px 10px;
}
.agree-option a {
  color: #7814a2;
}
.agree-option a:hover {
  color: #e91e63;
}
</style>
<div class="container">
	<div class="section p15">
		<div class="row">
			<div class="col-sm-12 col-xs-12">	
		<?php
  if ( isset( $opt [ 'status' ] ) && $opt [ 'status' ] == true )
  {
    ?>
			<div class="bs-callout bs-callout-warring alert alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4>Form Submit Error !</h4>
			<?php
    foreach ( $opt [ 'message' ] as $msg )
    {
      ?>
				<p><?php echo $msg;?></p>
			<?php
    }
    ?>
			</div>
		<?php
  }
  ?>
		</div>
		</div>

		<form class="form-horizontal" role="form" method="post"
			action="/user/register" name="login_form">
			<input type="hidden" name="redirectURL" id="redirectURL" value="<?php echo isset($opt['old']['redirectURL'])?$opt['old']['redirectURL']:$redirectURL?>">
			<div class="panel panel-info panel-border top">
				<div class="panel-heading text-center">
					<span class="panel-title"><?php echo $objLang["register"]['panelTitle'];?></span>
				</div>
				<div class="panel-body">
					<div class="">
						<div class="form-box">
							<div class="form-group">
								<label for="mail" class="col-sm-3 control-label"><?php echo $objLang["register"]['mail_Label'];?> <sup
									style="color: red">*</sup></label>
								<div class="col-sm-9">
									<input type="email" class="registerformValue form-control"
										name="mail" id="mail" onblur="checkEmail(this);"
										placeholder="<?php echo $objLang["register"]['mail_placeholder'];?>"
										value="<?php echo isset($opt['old']['mail']) ? $opt['old']['mail'] : "";?>"
										required>
										
									<div class="input-notes" id="input-notescol-sm-5"><?php echo $objLang["register"]['mail_notify'];?></div>
								</div>
								
							</div>
							<div class="form-group">
								<label for="nickname" class="col-sm-3 control-label"><?php echo $objLang["register"]['nickname_Label'];?> <sup
									style="color: red">*</sup></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="nickname"
										id="nickname"
										placeholder="<?php echo $objLang["register"]['nickname_placeholder'];?>"
										value="<?php echo ( isset($opt['old']['nickname']) )?$opt['old']['nickname']:"";?>"
										required>
								</div>
							</div>
							<div class="form-group">
								<label for="mail" class="col-sm-3" id="col-sm-3"><?php echo $objLang["register"]['gender'];?> <sup
									style="color: red">*</sup></label>
								<div class="col-sm-9 gender-radio-style">
									<input type="radio" name="gender" id="gender" value="M"
										required><font style="font-size: 16px;"> <?php echo $objLang["register"]['man'];?></font>
									<input type="radio" name="gender" id="gender" value="F"
										required><font style="font-size: 16px;"> <?php echo $objLang["register"]['female'];?></font>
								</div>
							</div>
							<div class="form-group">
								<label for="birthday" class="col-sm-3 control-label"><?php echo $objLang["register"]['birthday_Label'];?> <sup
									style="color: red">*</sup></label>
								<div class="col-sm-4">
									<div class="birthday-box">
										<div class="input-group birthday-content date"
											id="datetimepicker2">
											<span class="input-group-addon cursor"><i
												class="fa fa-calendar"></i></span> <input type="text"
												class="registerformValue form-control" name="birthday"
												id="birthday"
												placeholder="<?php echo $objLang["register"]['birthday_placeholder'];?>"
												value="<?php echo isset($opt['old']['birthday']) ? $opt['old']['birthday'] : "";?>"
												required>
										</div>
									</div>
								</div>
								<div class="input-notes col-sm-5" id="input-notescol-sm-5"><?php echo $objLang["register"]['birthday_notify'];?></div>
							</div>
							<div class="form-group">
								<label for="phone" class="col-sm-3 control-label"><?php echo $objLang["register"]['phone_Label'];?> <sup
									style="color: red">*</sup></label>
								<div class="col-sm-9">
									<input type="text" class="registerformValue form-control"
										name="phone" id="phone"
										placeholder="<?php echo $objLang["register"]['phone_placeholder'];?>"
										value="<?php echo ( isset($opt['old']['phone']) ) ? $opt['old']['phone'] : ""?>"
										required>
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-sm-3 control-label"><?php echo $objLang["register"]['password_Label'];?> <sup
									style="color: red">*</sup></label>
								<div class="col-sm-9">
									<input type="password" class="registerformValue form-control"
										name="password" id="password" onblur="checkUserPWD(this);"
										placeholder="<?php echo $objLang["register"]['password_placeholder'];?>"
										autocomplete="off" required>
								</div>
							</div>
							<div class="form-group">
								<label for="retypepassword" class="col-sm-3 control-label"><?php echo $objLang["register"]['retypepassword_Label'];?> <sup
									style="color: red">*</sup></label>
								<div class="col-sm-9">
									<input type="password" class="registerformValue form-control"
										name="retypepassword" id="retypepassword"
										onblur="checkUserPWD(this);"
										placeholder="<?php echo $objLang["register"]['retypepassword_placeholder'];?>"
										required>
								</div>

							</div>
							<div class="form-group">
								<label for="address" class="col-sm-3 control-label"><?php echo $objLang["register"]['address_Label'];?></label>
								<div class="col-sm-9" id="dvAddress">
									<input type="hidden" class="cCountry" value="TW" />
									<div id="twzipcode">
										<div class="country-switch text-left">
											<div class="radio">
												<label><input type="radio" name="region" id="region1"
													value="0" style="font-size: 14px;" checked><?php echo $objLang['shoppingcart']["Taiwan"];?></label>
												<label><input type="radio" name="region" id="region3"
													value="2" style="font-size: 14px;"><?php echo $objLang['shoppingcart']["Foreign"];?></label>
											</div>
										</div>
										<div class="country-selection text-left" style="margin-top: 10px;">
											<div data-role="county" class="autoZip display-inline-block" data-style="form-control" style="display: inline-block;"></div>
											<div data-role="district" class="autoZip display-inline-block" data-style="form-control" style="display: inline-block;"></div>
											<div data-role="zipcode" class="zipcodedata display-inline-block" id="display-inline-block" data-style="form-control"></div>
										</div>
									</div>
									<input type="text" name="address"
										class="cAddress form-control mt15 mb15" />
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="subscript" class="col-xs-3 control-label"><?php echo $functionBar["subscript"];?></label>
								<div class="col-xs-7" id="dvSubscript" style="float:left;">
									<div id="twzipcode" style="float:left;">
										<div class="subscript-switch text-left">
											<div class="radio">
											  <label><input type="radio" name="subscript" id="subscript1" value="1" checked><?php echo $objLang['register']["yes"];?></label>
											  <label><input type="radio" name="subscript" id="subscript2" value="2"><?php echo $objLang['register']["no"];?></label>
											</div>
										</div>							
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="register-captcha form-group">								
								<label for="captcha" class="name col-sm-3 control-label"><?php echo $objLang["register"]['captcha_Label'];?><sup
									style="color: red">*</sup></label>
									
								<div class="col-sm-9" id="col-sm-9">
									<div class="captcha-label">
										<img id="captcha-image" class="responsive" src="<?php echo "/core/captcha.php?t=".time();?>" />
										<div id="aaaaa">
											<a class="reload" onclick="document.getElementById('captcha-image').src='/core/captcha.php?'+Math.random();
																	   document.getElementById('verification-code').focus();"> 
													<i class="fa fa-repeat" style="font-size: 20px;padding-right: 5px;"></i>
												<span style="color:#d64b96;"> 更新驗證碼 </span>
											</a>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="captcha-input">
										<input id="captcha-form" placeholder="<?php echo $objLang["register"]['captchaPlaceholder'];?>" type="text"
											name="captcha" class="form-control" maxlength="10"
											pattern="^([_A-z0-9]){3,10}$" required /> 
											
										<span class="help-block with-errors"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="agree-option">
							<input type="checkbox" name="agree" required>  <?php echo $objLang["register"]['agree_descrption'];?>
							<?php 
							$agreementString = "" ;
							$agreementTmpString = "<a data-toggle=\"modal\" href=\"#collapse-ConsumerDescription\">".$objLang["register"]['agree_descrption2']."</a>";
							$agreementString = str_replace("_AGREE_", $agreementTmpString, $objLang["register"]['agree_descrption1']);
							echo $agreementString.$objLang["register"]['agree_descrption3'] ;
							?>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="text-center">
						<button type="submit" class="btn btn-default btn-submit"><?php echo $objLang["register"]['register'];?></button>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</form>

		<!-- 消費說明同意書 -->
		<div class="modal fade" id="collapse-ConsumerDescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel"><?php echo $objLang["shoppingcart"]["ConsumerDescription"];?></h4>
		      </div>
		      <div class="modal-body">
		        <?php echo $privacy["content"];?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $objLang["register"]['agree_close'];?></button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>

<script>
function checkUsername(self){
	//alert($(self).val());

	$.ajax({
		 url: "/user/checkUsernameAvailable",
		 type:"POST",
		 dataType:'json',
		 data:{ 'nickname' : $(self).val() },
		 success: function(data,status,xhr){
		 	//console.log(data,status,xhr) ;
		 	if (!data.resp) {
				PM.erro({
					title:'<?php echo $objLang["register"]["panelTitle"];?>',
					text:'<?php echo $objLang["register"]["fieldAlreadyUsed"];?>'
				});
				$(self).focus();
		 	}				 
		 },
		 error:function(xhr, ajaxOptions, thrownError){ 
		 	//console.log(xhr, ajaxOptions, thrownError) ;
			/*PM.erro({
				title:"",
				text:""
			});*/						
		 }
	});
}

function checkUserPWD(self){
	//alert($(self).val());
	/*var newPWPass    = $(self).val().match(/^([_A-z0-9]){8,20}$/g);
	if (newPWPass == null) {
		PM.erro({
			title:'<?php echo $objLang["register"]["panelTitle"];?>',
			text:'<?php echo $objLang["register"]["password_placeholder"];?>'
		});
		$(self).focus();
	}*/			 
}

function checkEmail(self){
	//alert($(self).val());

	$.ajax({
		 url: "/user/checkEmailAvailable",
		 type:"POST",
		 dataType:'json',
		 data:{ 'mail' : $(self).val() },
		 success: function(data,status,xhr){
		 	//console.log(data,status,xhr) ;
		 	if (!data.resp) {
				PM.erro({
					title:'<?php echo $objLang["register"]["panelTitle"];?>',
					text:'<?php echo $objLang["register"]["fieldAlreadyUsed"];?>'
				});
				$(self).focus();
		 	}				 
		 },
		 error:function(xhr, ajaxOptions, thrownError){ 
		 	//console.log(xhr, ajaxOptions, thrownError) ;
			/*PM.erro({
				title:"",
				text:""
			});*/						
		 }
	});
}

var setAddress = false;
$(function () {
	$('.country-switch input[type="radio"]').each(function(){
		$(this).on("click",function(){
			var val = $('.country-switch input[type="radio"]:checked').val();
			( val == 0 ) ? $(".cCountry").val("TW") : $(".cCountry").val("OT");
			( val == 0 ) ? $(".autoZip").fadeIn() : $(".autoZip").fadeOut();
			( val == 0 ) ? $(".zipcodedata").fadeIn() : $(".zipcodedata").fadeOut();
			
			$(".cAddress ").val("");
		});
	});
	
	$('#twzipcode').twzipcode();
	setAddressInput($("#dvAddress"));
	
	$("[name=\"county\"]").bind("change",function(){
		$(".cAddress ").val($(this).val() + $("[name=\"district\"]").val());
	});
	$(".autoZip").find("input").bind("change",function(){
		$(".cZip").val($(this).val());
	});
	
});
</script>