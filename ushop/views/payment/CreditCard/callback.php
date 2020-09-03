
<!-- ConveienceStorePayBarcode -->
<style>
.section {
  background-color: #fff;
}
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
.mn-title {
  height: 30px;
}
.mn {
	margin-top: 15px !important;
}
#invoice-item .mn,
#invoice-item address,
#invoice-item td {
  font-size: medium;
}
#invoice-item .panel-title,
#invoice-item th {
  font-size: large;
}

.line-title {
  font-size: 16px;
}
.line-item {
  text-align:left;
  diplay: inline-block;
  position: relative;
  width: 280px;
  margin: 0 auto;
  border-bottom: 1px solid #EEE;
}
.line-head {
  text-align:right;
  display: inline-block;
  font-size: 14px;
  width: 85px;
}
.line-body {
  text-align:center;
  display: inline-block;
  font-size: 14px;
}
.center-block {
  float:none;
  margin: 0 auto;
}
.head-block {
  padding: 15px;
  border-bottom: 1px solid #666;
}
</style>

<section id="content">
	<div class="panel invoice-panel">
         <div class="panel-heading">
             <span class="panel-title"> <span class="glyphicon glyphicon-print"></span> <?php echo $objLang["orderlist"]['title'];?></span>
         </div>
         <div class="panel-body p20" id="invoice-item">

             <div class="row mb30">
                 <div class="col-md-8 center-block mt15 head-block">
					 <div class="col-md-6">
						 <div class="pull-left">
							 <h1 class="lh10 mt10 mn-title"> <?php echo $objLang["orderlist"]['orderStatus'];?> </h1>
							 <h5 class="mn"><?php echo $order['createTime'];?></h5>
							 <h5 class="mn"><?php echo $order['status']['html'];?></h5>
							 <h5 class="mn"><?php echo $order['unique_id'];?></h5>
						 </div>
					 </div>
					 <div class="col-md-6">
						<img src="<?php echo $logo["url"];?>" class="img-responsive center-block mt10 mw200 hidden-xs" alt="AdminDesigns">
					</div>
					 <div class="clearfix"></div>
				 </div>
             </div>
             <div class="row text-center" id="invoice-info">
                 <div class="col-md-8 center-block">
                     <div class="panel panel-alt">
                         <div class="panel-heading">
                             <span class="panel-title"> <i class="fa fa-user"></i> <?php echo $objLang["orderlist"]['BillTo'];?> </span>
                         </div>
                         <div class="panel-body">
							
							<div class="line-item">
								<div class="line-head"><strong><?php echo $objLang["orderlist"]['BillName'];?></strong></div>
								<div class="line-body"><?php echo $order['dataUser']["name"];?></div>
							</div>
							<div class="line-item">
								<div class="line-head"><strong><?php echo $objLang["orderlist"]['BillMail'];?></strong></div>
								<div class="line-body"><?php echo $order['dataUser']["mail"];?></div>
							</div>
							<div class="line-item">
								<div class="line-head"><strong><?php echo $objLang["orderlist"]['BillPhone'];?></strong></div>
								<div class="line-body"><?php echo $order['dataUser']["phone"];?></div>
							</div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-8 center-block">
                     <div class="panel panel-alt">
                         <div class="panel-heading">
                             <span class="panel-title"> <i class="fa fa-location-arrow"></i> <?php echo $objLang["orderlist"]['ShipTo'];?> </span>
                         </div>
                         <div class="panel-body">
							<address>
								<strong><?php  echo $objLang["shoppingcart"][$order['shipFlow']]; ?></strong>
								<br> <?php echo $order['shipData']["address"];?>
							</address>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-8 center-block">
                     <div class="panel panel-alt">
                         <div class="panel-heading">
                             <span class="panel-title"> <i class="fa fa-info"></i> <?php echo $objLang["orderlist"]['PayMethod'];?> </span>
                         </div>
                         <div class="panel-body">
							<label class="line-title"><?php echo $objLang["shoppingcart"][$order['cashFlow']]; ?></label>
							<div class="line-item">
								<div class="line-head"><strong><?php echo $objLang["orderlist"]['payStatus'];?></strong></div>
								<div class="line-body"><?php echo ($param["errcode"] == "00")?$objLang["orderlist"]['paySuccess']:$objLang["orderlist"]['payFailed'];?></div>
							</div>
							<div class="line-item">
								<div class="line-head"><strong><?php echo $objLang["orderlist"]['payType'];?></strong></div>
								<div class="line-body"><?php echo $param["Card_Type"] == 1?$objLang["orderlist"]['chinaPay']: $objLang["orderlist"]['creditPay'];?></div>
							</div>
							<div class="line-item">
								<div class="line-head"><strong><?php echo $objLang["orderlist"]['cardHost'];?></strong></div>
								<div class="line-body"><?php echo $param["Name"];?></div>
							</div>
							<?php if( $param["Card_Type"] == 0 ) { ?>
							<div class="line-item">
								<div class="line-head"><strong><?php echo $objLang["orderlist"]['cardNo'];?></strong></div>
								<div class="line-body"><?php echo $param["Card_NO"];?></div>
							</div>
							<?php } ?>
                         </div>
                     </div>
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
                               <th><?php echo $objLang["orderlist"]['listPrice'];?></th>
                               <th><?php echo $objLang["orderlist"]['listSub'];?></th>
                           </tr>
                         </thead>
                         <tbody>
						<?php foreach( $order['detail'] AS $row ) { ?>
                           <tr>
                               <td><b><?php echo $row['id'];?></b></td>
                               <td><?php echo $row['dataDetail'][$Lang]["name"];?></td>
                               <td><?php echo $row['qty'];?></td>
                               <td><?php echo $row['price'];?></td>
                               <td class="text-right pr10"><?php echo $row['price'] * $row['qty'];?></td>
                           </tr>
						<?php } ?>
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
                                    <th><b><?php echo $objLang["orderlist"]['lastCount'];?></b></th>
                                    <th class="text-right" style="  width: 100px;"><?php echo round($order['total']/ $order['rate'], 4);?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b><?php echo $objLang["orderlist"]['lastshoppingPoint'];?></b></td>
                                    <td class="text-right">(-)<?php echo ( $order['shoppingPoint'] == 0)?0:round($order['shoppingPoint']/ $order['rate'], 4);?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo $objLang["orderlist"]['lastCoupon'];?></b></td>
                                    <td class="text-right">(-)<?php echo ( $order['coupon']['amount'] == 0)?0:round($order['coupon']['amount']/ $order['rate'], 4);?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo $objLang["orderlist"]['lastFee'];?></b></td>
                                    <td class="text-right"><?php echo ( $order['transFee'] == 0)?0:round($order['transFee']/ $order['rate'], 4);?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo $objLang["orderlist"]['lastFare'];?></b></td>
                                    <td class="text-right"><?php echo ( $order['transFare'] == 0)?0:round($order['transFare']/ $order['rate'], 4);?></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo $objLang["orderlist"]['lastTotal'];?></b>
                                    </td>
                                    <td class="text-right"><?php echo $order['iso_code'];?> <?php echo round($order['clearTotal']/ $order['rate'], 4);?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                    <div class="invoice-buttons">
                        <a href="javascript:window.print()" class="btn btn-default mr10"><i class="fa fa-print pr5"></i></a>
                    </div>
                </div>
            </div>

         </div>
     </div>
</div>
</section>
<script>

function printVoice()
{
	html2canvas(document.getElementById('content'), {
	  onrendered: function(canvas) {
		printCanvas(canvas);
	  }
	});
}

function printCanvas(canvas)  
{  
    var dataUrl = canvas.toDataURL(); //attempt to save base64 string to server using this var  
    var windowContent = '<!DOCTYPE html>';
    windowContent += '<html>'
    windowContent += '<head><title>Print canvas</title></head>';
    windowContent += '<body>'
    windowContent += '<img src="' + dataUrl + '" style="width:100%">';
    windowContent += '</body>';
    windowContent += '</html>';
    var printWin = window.open('','');
    printWin.document.open();
    printWin.document.write(windowContent);
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();
}
</script>