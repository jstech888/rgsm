
<!-- ConveienceStorePayBarcode -->
<style>
.block {
  width: 60%;  
  margin: 0 auto;
}
.block label {
  font-size: 22px;
}
.block input {
  text-align: center;
}
.radio {
  display: inline-block;
}
.radio > label {
  font-size: 12px;
}
</style>
<div class="section text-center" style="position: relative;">
	<H1> Suntech 紅陽金流 交易測試</H1>
	<div class="block mt15">
		<form id="form1" name="form1" action="/payment/index/CreditCard" method="POST">
			  <div class="form-group">
				<label for="Gateway_Type">金流渠道</label>
				<div class="row">
					<div class="radio">
					  <label><input type="radio" name="Gateway_Type" value="0"  />測試渠道</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="Gateway_Type" value="1" checked />正式渠道</label>
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="Payment_Type">付款方式</label>
				<div class="row">
					<div class="radio">
					  <label><input type="radio" name="Payment_Type" value="CreditCard" checked  onclick="changePaymentType('CreditCard');"/>線上刷卡</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="Payment_Type" value="WebATM" onclick="changePaymentType('WebATM');" />WebATM</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="Payment_Type" value="ConvenienceStorePayBarcode" onclick="changePaymentType('ConvenienceStorePayBarcode');" />超商付款(需要列印barcode)</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="Payment_Type" value="ConvenienceStorePayCode" onclick="changePaymentType('ConvenienceStorePayCode');" />超商代碼繳費</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="Payment_Type" value="AliPay" onclick="changePaymentType('AliPay');" />支付寶</label>
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="sna">訂單編號</label>
				<input type="text" class="form-control" id="Td" name="Td" value="<?php echo time();?>">
			  </div>
			  <div class="form-group">
				<label for="sna">消費者姓名</label>
				<input type="text" class="form-control" id="sna" name="sna" value="test">
			  </div>
			  <div class="form-group">
				<label for="sdt">消費者電話</label>
				<input type="text" class="form-control" id="sdt" name="sdt" value="0912456789">
			  </div>
			  <div class="form-group">
				<label for="email">消費者Email</label>
				<input type="text" class="form-control" id="email" name="email" value="devicten97@gmail.com">
			  </div>
			  
			  <div class="product-item">
				  <div class="form-group">
					<label for="email">產品1 名稱</label>
					<input type="text" class="form-control" 	  id="ProductName1" 		name="ProductName1"		value="產品1">
				  </div>
				  <div class="form-group">
					<label for="email">產品1 價格</label>
					<input type="text" class="form-control price" id="ProductPrice1" 		name="ProductPrice1"	onkeyup="sum();" value="200">
				  </div>
				  <div class="form-group">
					<label for="email">產品1 數量</label>
					<input type="text" class="form-control qty"   id="ProductQuantity1" 	name="ProductQuantity1"	onkeyup="sum();" value="1">    
				  </div>
			  </div>
			  <div class="product-item">
				  <div class="form-group">
					<label for="email">產品2 名稱</label>
					<input type="text" class="form-control" 	  id="ProductName1" 		name="ProductName2"		value="產品2">
				  </div>
				  <div class="form-group">
					<label for="email">產品2 價格</label>
					<input type="text" class="form-control price" id="ProductPrice2" 		name="ProductPrice2"	onkeyup="sum();" value="1300">
				  </div>
				  <div class="form-group">
					<label for="email">產品2 數量</label>
					<input type="text" class="form-control qty"   id="ProductQuantity2" 	name="ProductQuantity2"	onkeyup="sum();" value="1">    
				  </div>
			  </div>
			  
			  <div class="form-group">
				<label for="MN">交易金額</label>
				<input type="text" class="form-control" id="MN" name="MN" value="1500">
			  </div>
			  
			  <div class="form-group">
				<label for="note1">訂單備註1</label>
				<textarea class="form-control" id="note1" name="note1" rows="3">test node1</textarea>
			  </div>
			  <div class="form-group">
				<label for="note2">訂單備註2</label>
				<textarea class="form-control" id="note2" name="note2" rows="3">test node2</textarea>
			  </div>
			  <div class="form-group Card_Type-contain">
				<label for="Card_Type">卡片類型</label>
				<div class="row">
					<div class="radio">
					  <label><input type="radio" name="Card_Type" value="0" checked />信用卡</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="Card_Type" value="1"/>銀聯卡</label>
					</div>
				</div>
			  </div>
			  
			  <div class="btn-group">
				<input type="submit" name="button" id="button" class="btn btn-info" value="送出" />
				<a class="btn btn-default" href="/payment/demo">返回</a>
			  </div>
		</form>
	</div>
</div>

			  <div class="form-group hide-Card_Type-contain" style="display:none">
				<label for="Card_Type">卡片類型</label>
				<div class="row">
					<div class="radio">
					  <label><input type="radio" name="Card_Type" value="0" checked />信用卡</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="Card_Type" value="1"/>銀聯卡</label>
					</div>
				</div>
			  </div>
<script>

function del(key)
{
	$("tr#product-"+key).remove();
}

function changePaymentType(type)
{
	$("#form1").attr("action","/payment/index/"+type);
	if( type == "CreditCard" )
	{
		$(".Card_Type-contain").append($(".hide-Card_Type-contain").html());
	}
	else
	{
		$(".Card_Type-contain").empty();
	}		
}

function sum()
{
	var sum = 0;
	$(".product-item").each(function(){
		sum+= parseInt($(this).find(".price").val()) * parseInt($(this).find(".qty").val());
	});
	$("#MN").val(sum);
}

function addProduct() 
{
	var key = $(".product-item").length + 1;
	if( key == 10 )	
	{
		$(".btn-addProduct").hide();
	}
	sum();	
}
</script>