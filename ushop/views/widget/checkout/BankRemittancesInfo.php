<style>
.shop-account-info-content {
	margin-bottom:15px;
}
.shop-account-info {
  margin: 0 auto !important;
  float: none !important;
}
.shop-account-info-desp {
  width: 316px;
  text-align: left;
}
</style>
<div class="col-xs-12 col-sm-12 shop-account-info-content">
	<center><H2><?php //echo $BankRemittancesInfo['value']['title'];?></H2></center>
	<div class="table-responsive">
	<table class="table table-hover table-bordered shop-account-info">
		<thead>
			<tr>
				<th><?php echo $objLang['shoppingcart']['BankNameLabel'];?></th>
				<th><?php echo $objLang['shoppingcart']['BankCodeLabel'];?></th>
				<th><?php echo $objLang['shoppingcart']['BankAccountLabel'];?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php 
				if ( isset($langCode) && $langCode =="en" )
				{
				?>
					<td><?php echo isset($BankRemittancesInfo['BankNameEnValue'])?$BankRemittancesInfo['BankNameEnValue']:"";?></td>
					<td><?php echo isset($BankRemittancesInfo['BankACEnValue'])?$BankRemittancesInfo['BankACEnValue']:"";?></td>
					<td><?php echo isset($BankRemittancesInfo['BankACEnNoValue'])?$BankRemittancesInfo['BankACEnNoValue']:"";?></td>
				<?php
				}
				else
				{
				?>
					<td><?php echo isset($BankRemittancesInfo['BankNameValue'])?$BankRemittancesInfo['BankNameValue']:"";?></td>
					<td><?php echo isset($BankRemittancesInfo['BankACValue'])?$BankRemittancesInfo['BankACValue']:"";?></td>
					<td><?php echo isset($BankRemittancesInfo['BankACNoValue'])?$BankRemittancesInfo['BankACNoValue']:"";?></td>
				<?php
				}
				?>
			</tr>
		</tbody>
	</table>
	</div>
</div>