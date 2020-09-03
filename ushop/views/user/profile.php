  <script src="https://ajax.cdnjs.com/ajax/libs/json2/20110223/json2.js"></script>
	<script src="/libs/addr/json2ext.js"></script>
	<script src="/libs/addr/jquery.twAddrHelper.js"></script>
	<script src="/libs/addr/jquery.twzipcode-1.6.7.js"></script>

  <link rel="stylesheet" type="text/css" href="/libs/datepicker/css/bootstrap-datepicker3.min.css">

	<script src="/libs/datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="/libs/datepicker/locales/bootstrap-datepicker.zh-TW.min.js" charset="UTF-8"></script>
	<script>
	$(function(){
		$('.birthday-content.date').datepicker({
			format: "yyyy/mm/dd",
			language: "zh-TW",
			todayHighlight: true
		});
	});
	</script>
<style>
	.user-form {
		width: 780px;
		max-width: 100%;
		margin: 0 auto;
		margin-top:25px;
		border-top-color: #9775ac !important;
	}
	.box {
		text-align: center;
	}
	.form-group {
		/*margin-top:15px;*/
		margin-bottom:15px;
		text-align: left;
	}
	
	.form-group .control-label {
		text-align:right;
		margin-top: 7px;
	}
	
	.form-group .column{
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
		font-size: 18px;
		font-weight: normal;
	}
	input {
		font-size: 16px;
		font-weight: normal;
	}
	.agreeblockcontain{
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
	@media (max-width: 768px) { 
		.form-group .label {
		  text-align: center;
		  margin-top: 7px;
		}
		.birthday-content.date{
		  text-align: center;
		}
		.agreeblockcontain{
		  padding: 0px;
		  margin-top: 20px;
		}
	}
	.agree-option {
	  text-align:center;
	  font-size: 16px;
	}
	.form-horizontal .control-label {
	  line-height:18px;
	}
	.input-group-addon {
/* 	  display: inline-block; */
/* 	  padding: 0; */
/* 	  height: 38px; */
/* 	  margin-top: -4px; */
/* 	  margin-left: -5px; */
/* 	  border-left: 1px solid #DDD !important; */
	}
	.input-group-addon {
	  display: table-cell;
	}
	.birthday-content input.form-control {
	  text-align: center;
	}
	@media (max-width: 992px) { 
		.form-horizontal .form-group {
		  text-align: center;
		}
		.form-control {
		  margin: 0 auto;
		}
		.panel-footer > .pull-right {
		  float: none !important;
		  text-align:center;
		}
		.birthday-box {
		  display: inline-block;
		  width: initial;
		  position: relative;
		  float: none;
		  margin: 0 auto;
		}
		.input-group {
		  width: 120px;
		}
	}
	#form-control{
		width: 405px;
		margin-top: 15px;
	}
	.autoZip.display-inline-block{
		display: inline-block;
	}
	#col-xs-7{
		margin-top: 9px;
	}
.zipcodedata.display-inline-block{
/* 		width: 30px; */
		display: inline-block;
	}
	.cZip {
	  width: 50px;
	}
	@media screen and (max-width: 767px) { 
		#form-control{
			width: 100%;
			margin-top: 15px;
		}
		#inline-block{
/* 			display: block; */
			margin-top: 15px;
		}
	}
.btn-lg {
    padding: 5px 15px;
    font-size: 16px;
    line-height: 1.3333333;
    border-radius: 6px;
}
.radio label {
    min-height: 20px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
    font-size: 16px;
}
.form-group div#dvAddress div#twzipcode .autoZip.display-inline-block select{
	padding: 3px 10px;
}
</style>

<div class="container">
	<div class="box">
		<div class="panel panel-info panel-border top user-form">
			<div class="panel-heading text-center">
				<span class="panel-title"><?php echo $objLang["profile"]['panelTitle'];?></span>
			</div>
			<div class="panel-body">
			<form method="post" action='<?php echo base_url("/user/profile");?>' name="login_form">
				<div class="form-group">
					<label for="mail" class="col-xs-3 control-label"><?php echo $objLang["profile"]['mail_Label'];?></label>
					<div class="col-xs-7">		
						<input type="text" class="registerformValue form-control" name="mail" id="mail" style="cursor:no-drop;" placeholder="<?php echo $objLang["profile"]['mail_placeholder'];?>" value="<?php echo $self["mail"];?>"  required>
						<span class="help-block mt5">此為登入帳號，輸入成功後即無法更改，請確實填寫</span>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="nickname" class="col-xs-3 control-label"><?php echo $objLang["profile"]['nickname_Label'];?></label>
					<div class="col-xs-7">		
						<input type="text" class="registerformValue form-control" name="nickname" id="nickname" placeholder="<?php echo $objLang["profile"]['nickname_placeholder'];?>" value="<?php echo $self["nickname"];?>"  required>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="nickname" class="col-xs-3 control-label"><?php echo $objLang["profile"]['gender'];?></label>
					<div class="col-xs-7" id="col-xs-7">		
						<input  type="radio" name="gender" id="gender" value="M" <?php echo ($self["gender"] === "M")? "checked" :""; ?> required> <?php echo $objLang["profile"]['man'];?>
						<input  type="radio" name="gender" id="gender" value="F" <?php echo ($self["gender"] === "F")? "checked" :""; ?> required> <?php echo $objLang["profile"]['female'];?>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="birthday" class="col-xs-3 control-label"><?php echo $objLang["profile"]['birthday_Label'];?></label>
					<div class="col-xs-7" >		
						<div class="birthday-box">
							<div class="input-group birthday-content date" id="datetimepicker2">
								<span class="input-group-addon cursor"><i class="fa fa-calendar"></i></span>
								<input type="text" style="width:120px;display: inline-block;" class="registerformValue form-control" style="cursor:no-drop;" <?php echo ($self["birthday"] != "0000-00-00")? "readonly" : "" ;?>  name="birthday" id="birthday" placeholder="<?php echo $objLang["profile"]['birthday_placeholder'];?>" value="<?php echo ($self["birthday"] == "0000-00-00")? "1900/01/01" : $self["birthday"] ;?>" required>  
								
							</div>
							<?php if ($self["birthday"] != "0000-00-00") {?><span class="help-block mt5">輸入成功後即無法更改，請確實填寫</span><?php }?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="phone" class="col-xs-3 control-label"><?php echo $objLang["profile"]['phone_Label'];?></label>
					<div class="col-xs-7">		
						<input type="text" class="registerformValue form-control" name="phone" id="phone" placeholder="<?php echo $objLang["profile"]['phone_placeholder'];?>" value="<?php echo $self["phone"];?>" required>  
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="address" class="col-xs-3 control-label"><?php echo $objLang["profile"]['address_Label'];?></label>
					<div class="col-xs-7" id="dvAddress" style="float:left;">
						<input type="hidden" class="cCountry" 	value="TW" />
						<div id="twzipcode" style="float:left;">
							<div class="country-switch text-left">
								<div class="radio">
								  <label><input type="radio" name="region" id="region1" value="0" checked><?php echo $objLang['shoppingcart']["Taiwan"];?></label>
								  <label><input type="radio" name="region" id="region3" value="2"><?php echo $objLang['shoppingcart']["Foreign"];?></label>
								</div>
							</div>
							<div data-role="county" 	class="autoZip display-inline-block" data-style="form-control" style="display: inline-block;"></div>
							<div data-role="district" 	class="autoZip display-inline-block" data-style="form-control" style="display: inline-block;"></div>
							<div data-role="zipcode" 	class="zipcodedata display-inline-block" id="inline-block" data-style="form-control"></div>
												
							<input type="text" name="address" class="cAddress form-control mt15 mb15" id="form-control"/>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="phone" class="col-xs-3 control-label"><?php echo $functionBar["subscript"];?></label>
					<div class="col-xs-7" id="dvSubscript" style="float:left;">
						<div style="float:left;">
							<div class="subscript-switch text-left">
								<div class="radio">
								  <label><input type="radio" name="subscript" id="subscript1" value="1" <?php echo $self['subscript']=="1"? "checked":"";?>><?php echo $objLang['profile']["yes"];?></label>
								  <label><input type="radio" name="subscript" id="subscript2" value="2" <?php echo $self['subscript']=="2"? "checked":"";?>><?php echo $objLang['profile']["no"];?></label>
								</div>
							</div>							
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<HR>
				<div class="form-group">
					<div class="col-sm-12 col-xs-12 column">		
						<button type="submit" class="btn btn-default btn-submit btn-lg pull-right"><?php echo $objLang["profile"]['modify'];?></button> 
					</div>
				</div>
				<div class="clearfix"></div>
			</form>
			<div class="clearfix"></div>
			</div>		
		</div>
	</div>
</div>

<script>
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

function init_deliveryAddress()
{
	$('input[name="region"][value="<?php echo isset($self["region"])?$self["region"]:"";?>"]').get(0).click();
	$('select[name="county"] > option[value="<?php echo isset($self["county"])?$self["county"]:"";?>"]').prop("selected",true).change();
	$('select[name="county"] > option[value="<?php echo isset($self["county"])?$self["county"]:"";?>"]').attr("selected",true).change();
	$('select[name="district"] > option[value="<?php echo isset($self["district"])?$self["district"]:"";?>"]').prop("selected",true).change();
	$('select[name="district"] > option[value="<?php echo isset($self["district"])?$self["district"]:"";?>"]').attr("selected",true).change();
	$('input[name="zipcode"]').val("<?php echo isset($self["zip"])?$self["zip"]:"";?>");
	$('input.cAddress').val("<?php echo isset($self["address"])?$self["address"]:"";?>");
}

window.onload = function() {
	init_deliveryAddress();
	// $('select[name="subscript"]').append($("<option></option>").attr("value", "0").text("---請選擇---"));
	// $('select[name="subscript"]').append($("<option></option>").attr("value", "1").text("訂閱"));
	// $('select[name="subscript"]').append($("<option></option>").attr("value", "2").text("取消"));
}
</script>