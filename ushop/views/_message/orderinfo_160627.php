
<style>
.invoice-panel {
	margin-top: 20px;
}

.mw100 {
	max-width: 200px;
}

.mt10 {
	margin-top: 10px;
}

.panel-title {
	text-align: center;
	font-size: 22px;
}

.
#invoice-info {
	margin-top: 30px;
}

.block {
	margin-bottom: 30px;
}

.text-right {
	text-align: right;
}

.panel-title {
	text-align: center;
	font-size: 18px;
}

.col-md-12.image-logo {
	text-align: center;
}

.invoice-buttons {
	margin-top: 10px;
	margin-bottom: 10px;
}

.btn-default:hover {
	background-color: #000000;
	background-image: none;
	color: #fff;
}

.panel-info.panel-border.top {
	margin-top: 30px;
	margin-bottom: 20px;
	border-top-color: #9775ac;
}
#trans-total {
  font-size: 20px;
  font-weight: 700;
  width: 125px;
}
#trans-total .dPrice {
  color: #000000;
}
</style>
<div class="container">
	<div class="panel panel-info panel-border top invoice-panel">
		<div class="panel-heading">
			<span class="panel-title"><?php echo $objLang["orderlist"]['detail'];?></span>
		</div>
		<div class="panel-body p20" id="invoice-item">
			<div class="row block">
				<h3 style="text-align: center; color: #ad2b29; font-size: 20px;"><?php echo isset($objLang["orderlist"]['detaillabel1'])?$objLang["orderlist"]['detaillabel1']:"我們會將訂單通知信寄到您的信箱!";?></h3>
				<p style="text-align: center; font-size: 20px; font-size: 16px;"><?php echo isset($objLang["orderlist"]['detaillabel2'])?$objLang["orderlist"]['detaillabel2']:"-以下是您這次的訂單明細-";?></p>
				<div class="col-md-12 image-logo">
					<img src="<?php echo $logo["url"];?>"
						class="img-responsive center-block mt10 mw100 col-hidden-xs"
						alt="<?php echo isset($logo["alt"])?$logo["alt"]:"";?>"
						style="height: 70px;">
				</div>
			</div>
			<div class="row block" style="margin-bottom: 0px;">
				<div class="col-md-12">
					<div class="panel-title text-center "><?php echo $objLang["orderlist"]['orderStatus'];?></div>
					<div class="text-center mt15"><?php echo $list_order['status']['html'];?></div>
					<div class="text-center mt15"><?php echo $list_order['createTime'];?></div>
					<div class="text-center mt15"><?php echo $list_order['unique_id'];?></div>

				</div>
			</div>
			<div class="row" id="invoice-info">
				<div class="col-md-12 text-right print-invoice">
					<div class="invoice-buttons">
						<a href="javascript:window.print()" class="btn btn-default mr10"><i
							class="fa fa-print pr5"></i></a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="panel-title"> <i class="fa fa-user"></i> <?php echo $objLang["orderlist"]['BillTo'];?></span>
						</div>
						<div class="panel-body">
							<address>	
                <?php echo $objLang["orderlist"]['BillMail'];?><?php echo $list_order['dataUser']["mail"];?>
                <br> <?php echo $objLang["orderlist"]['BillName'];?><?php echo $list_order['dataUser']["nickname"];?>
                <br> <?php echo $objLang["orderlist"]['BillPhone'];?><?php echo $list_order['dataUser']["phone"];?>
              </address>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="panel-title" style="font-size: 18px;"> <img
								src="/libs/images/2.png"
								style="height: 23px; font-size: 18px; margin-right: 8px; float: left; width: 25px;"> <?php echo $objLang["orderlist"]['ShipTo'];?></span>
						</div>
						<div class="panel-body">
							<address>
                                
                                  <?php echo $list_order['shipData']["reciverName"];?>
                                <br>(<?php echo $list_order['shipData']["zip"];?>)<?php echo $list_order['shipData']["address"];?>
                            </address>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="panel-title" style="font-size: 18px;"> <span
								class="glyphicon glyphicon-credit-card" style="top: 4px;"></span> <?php echo $objLang["orderlist"]['PayMethod'];?> </span>
						</div>
						<div class="panel-body">
							<address>
                                <?php echo $objLang["shoppingcart"][$list_order['cashFlow']]; ?>
                                <?php
                                if ( isset( $list_order [ 'cashData' ] [ "callback" ] [ "PaymentTypeName" ] ) && $list_order [ 'cashData' ] [ "callback" ] [ "PaymentTypeName" ] != "" )
                                {
                                  echo " ( " . $list_order [ 'cashData' ] [ "callback" ] [ "PaymentTypeName" ] . " ) ";
                                }
                                if ( isset( $list_order [ 'cashData' ] [ "callback" ] [ "ExpireDate" ] ) && $list_order [ 'cashData' ] [ "callback" ] [ "ExpireDate" ] != "" )
                                {
                                  echo "<br>" . $objLang [ "orderlist" ] [ 'ExpireDate' ] . ":" . $list_order [ 'cashData' ] [ "callback" ] [ "ExpireDate" ];
                                }
                                ?>


								<?php
        
if ( $list_order [ 'cashFlow' ] == "BankRemittances" )
        {
          echo "<br> " . $objLang [ "shoppingcart" ] [ 'enterRemittancesAccount' ] . $list_order [ 'cashData' ] [ "BankRemittancesAccount" ];
        }
        ?>
                            </address>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<img src="/libs/images/1.png"
					style="margin-left: 31px; height: 25px; font-size: 20px; float: left; width: 20px;">
				<p
					style="width: 137px; margin-left: 57px; font-size: 18px; margin-bottom: 0px;">匯款資訊</p>
				<div class="col-md-12">
					<?php
    if ( $BankRemittancesInfo != false )
    {
      include_once ( VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "checkout" . DIRECTORY_SEPARATOR . "BankRemittancesInfo.php" );
    }
    ?>
				</div>
			</div>
			<div class="row" id="invoice-table">
				<div class="col-md-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo $objLang["orderlist"]['listName'];?></th>
								<th><?php echo $objLang["orderlist"]['listQTY'];?></th>
								<th><?php echo $objLang["orderlist"]['listFormatType'];?></th>
								<th><?php echo $objLang["orderlist"]['listPrice'];?></th>
								<th><?php echo $objLang["orderlist"]['listSub'];?></th>
							</tr>
						</thead>
						<tbody>
				<?php
    $tmpcnt = 1;
    foreach ( $list_order [ 'detail' ] as $row )
    {
      ?>
                           <tr>
								<td><b><?php echo $tmpcnt;?></b></td>
								<td><?php echo $row['dataDetail'][$Lang]["name"];?></td>
								<td><?php echo $row['qty'];?></td>
								<td><?php echo ( $row['formatType'] == "F")? "--": $row['formatType'] ;?></td>
								<td><?php echo $row['price'];?></td>
								<td class="text-right pr10" style="text-align: left;"><?php echo $row['price'] * $row['qty'];?></td>
							</tr>
				<?php
      $tmpcnt ++;
    }
    ?>
                       </tbody>
					</table>
				</div>
			</div>
			<div class="row" id="invoice-footer">
				<div class="col-md-12">
					<div class="pull-right">
						<table class="table" id="invoice-summary">
							<thead>
								<tr>
									<td style="font-size: 18px;"><?php echo $objLang["orderlist"]['lastCount'];?>
                                    </td>
									<td class="text-right" style="font-size: 18px;"><?php echo round($list_order['total']/ $list_order['rate'], 4);?></td>
								</tr>
							</thead>
							<tbody>
                              <?php if( isset($list_order["promotionObj"]["value"]["inTerm"]) && $list_order["promotionObj"]["value"]["inTerm"] === true ) { ?>
                                <tr>
									<td style="font-size: 18px;"><?php echo $objLang["orderlist"]['dateLimitDiscountName'];?></td>
									<td class="text-right" style="font-size: 18px;"><?php echo "(-)".$list_order["promotionObj"]["value"]["discountAmout"];?></td>
								</tr>
                              <?php } ?>
                              <?php if (  $list_order['shoppingPoint'] > 0  || $ShoppingPointRate > 0 ) {?>
                                <tr>
									<td style="font-size: 18px;"><?php echo $objLang["orderlist"]['lastshoppingPoint'];?></td>
									<td class="text-right" style="font-size: 18px;">(-)<?php echo ( $list_order['shoppingPoint'] == 0)?0:round($list_order['shoppingPoint']/ $list_order['rate'], 4);?></td>
								</tr>
                              <?php }?>
                                <tr>
									<td style="font-size: 18px;"><?php echo $objLang["orderlist"]['lastCoupon'];?></td>
									<td class="text-right" style="font-size: 18px;">(-)<?php echo ( $list_order['coupon']['amount'] == 0)?0:round($list_order['coupon']['amount']/ $list_order['rate'], 4);?></td>
								</tr>
								<tr>
									<td style="font-size: 18px;"><?php echo $objLang["orderlist"]['lastFee'];?></td>
									<td class="text-right" style="font-size: 18px;"><?php echo ( $list_order['transFee'] == 0)?0:round($list_order['transFee']/ $list_order['rate'], 4);?></td>
								</tr>
								<tr>
									<td style="font-size: 18px;"><?php echo $objLang["orderlist"]['lastFare'];?></td>
									<td class="text-right" style="font-size: 18px;"><?php echo ( $list_order['transFare'] == 0)?0:round($list_order['transFare']/ $list_order['rate'], 4);?></td>
								</tr>
								<tr>
									<td style="font-size: 18px;"><?php echo $objLang["orderlist"]['lastTotal'];?>
                                    </td>
									<td class="text-right" id="trans-total" style="width: 125px;">
										<span style="display: inline-block;"><?php echo $list_order['iso_code'];?></span>
										<span class="dPrice"
										style="display: inline-block;"><?php echo round($list_order['clearTotal']/ $list_order['rate'], 4);?></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
		</div>
	</div>
</div>