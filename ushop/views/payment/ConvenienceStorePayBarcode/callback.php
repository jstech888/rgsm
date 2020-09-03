
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
  margin-bottom: 10px;
}
.line-item {
  text-align:left;
  diplay: inline-block;
  position: relative;
  width: 200px;
  margin: 0 auto;
  border-bottom: 1px solid #EEE;
  margin-bottom: 25px;
}
.line-head {
  text-align:right;
  display: inline-block;
  font-size: 14px;
  width: 85px;
}
.line-body {
  text-align:left;
  display: inline-block;
  font-size: 14px;
}
.line-barcode {
  text-align:center;
  display: block;
}
.line-account {
  text-align:center;
  display: block;
}
.center-block {
  float:none;
  margin: 0 auto;
}
.head-block {
  padding: 15px;
  border-bottom: 1px solid #666;
}
.line-item.barcode {
  width: 300px;
  margin-bottom: 50px;
}
	.line-barcode {
	  width: 300px;
	  height: 50px;
	  position: relative;
	  display: block;
	  margin: 0;
	  padding: 0;
	  float: none;
	  text-align: left;
	}
.container {
  min-width: 600px !important;
}
</style>

<section id="content">
	<div class="panel invoice-panel">
         <div class="panel-heading">
             <span class="panel-title"> <span class="glyphicon glyphicon-print"></span> 訂單明細</span>
         </div>
         <div class="panel-body p20" id="invoice-item">

             <div class="row mb30">
                 <div class="col-md-8 center-block mt15 head-block">
					 <div class="col-md-6">
						 <div class="pull-left">
							 <h1 class="lh10 mt10 mn-title"> 訂單資訊 </h1>
							 <h5 class="mn"> 建立日期：  </h5>
							 <h5 class="mn"> 訂單狀態：  </h5>
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
                             <span class="panel-title"> <i class="fa fa-user"></i> 訂購人 </span>
                         </div>
                         <div class="panel-body">
							
							<div class="line-item">
								<div class="line-head"><strong>姓名</strong>：</div>
								<div class="line-body"></div>
							</div>
							<div class="line-item">
								<div class="line-head"><strong>信箱</strong>：</div>
								<div class="line-body"></div>
							</div>
							<div class="line-item">
								<div class="line-head"><strong>電話</strong>：</div>
								<div class="line-body"></div>
							</div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-8 center-block">
                     <div class="panel panel-alt">
                         <div class="panel-heading">
                             <span class="panel-title"> <i class="fa fa-location-arrow"></i> 配送方式 </span>
                         </div>
                         <div class="panel-body">
							<address>
								<strong>客戶指定地址</strong>
								<br> 
							</address>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-8 center-block">
                     <div class="panel panel-alt">
                         <div class="panel-heading">
                             <span class="panel-title"> <i class="fa fa-info"></i> 付款方式 </span>
                         </div>
                         <div class="panel-body">
						 
							<label class="line-title">超商代收條碼</label>
							<div class="line-item barcode">
								<div class="line-barcode" id="BarcodeA"><?php echo $param["BarcodeA"];?></div>
							</div>
							<div class="line-item barcode">
								<div class="line-barcode" id="BarcodeB"><?php echo $param["BarcodeB"];?></div>
							</div>
							<div class="line-item barcode">
								<div class="line-barcode" id="BarcodeC"><?php echo $param["BarcodeC"];?></div>
							</div>
							<hr/>
							<label class="line-title">郵局代收條碼</label>
							<div class="line-item barcode">
								<div class="line-barcode " id="PostBarcodeA"><?php echo $param["PostBarcodeA"];?></div>
							</div>
							<div class="line-item barcode">
								<div class="line-barcode" id="PostBarcodeB"><?php echo $param["PostBarcodeB"];?></div>
							</div>
							<div class="line-item barcode">
								<div class="line-barcode" id="PostBarcodeC"><?php echo $param["PostBarcodeC"];?></div>
							</div>
							<hr/>
							<label class="line-title">虛擬匯款帳戶</label>
							<div class="line-item">
								<div class="line-account"><?php echo $param["EntityATM"];?></div>
							</div>
							<!--
							<div class="line-item">
								<div class="line-head"><strong>持卡人</strong>：</div>
								<div class="line-body"></div>
							</div>
							<div class="line-item">
								<div class="line-head"><strong>卡片末四碼</strong>：</div>
								<div class="line-body"></div>
							</div>
							-->
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
                                 <th>名稱</th>
                                 <th>數量</th>
                                 <th>單價</th>
                                 <th>合計</th>
                             </tr>
                         </thead>
                         <tbody>
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
                                     <th><b>小計</b>
                                     </th>
                                     <th style="  width: 100px;"></th>
                                 </tr>
                             </thead>
							<tbody>
								<tr>
									<td><b>紅利點數</b></td>
									<td class="text-right">(-)</td>
								</tr>
								<tr>
									<td><b>手續費</b></td>
									<td class="text-right"></td>
								</tr>
								<tr>
									<td><b>運費</b></td>
									<td class="text-right"></td>
								</tr>
								<tr>
									<td><b>總計</b>
									</td>
									<td class="text-right"></td>
								</tr>
							</tbody>
                         </table>
                     </div>
                     <div class="clearfix"></div>
                     <div class="invoice-buttons">
                         <a onclick="printVoice()" class="btn btn-default mr10"><i class="fa fa-print pr5"></i> 列印</a>
                     </div>
                 </div>
             </div>

         </div>
     </div>
</div>
</section>
<!--
<script type="text/javascript" src="/libs/bwip-js/bwip.js"></script>	
<script type="text/javascript" src="/libs/bwip-js/lib/symdesc.js"></script>
<script type="text/javascript" src="/libs/bwip-js/lib/needyoffset.js"></script>
<script type="text/javascript" src="/libs/bwip-js/lib/canvas.js"></script>
-->
<script type="text/javascript" src="/libs/barcode/jquery.barcode.0.3.js"></script>
<script>
var BarcodeA = '<?php echo $param["BarcodeA"];?>';
var BarcodeB = '<?php echo $param["BarcodeB"];?>';
var BarcodeC = '<?php echo $param["BarcodeC"];?>';
var PostBarcodeA = '<?php echo $param["PostBarcodeA"];?>';
var PostBarcodeB = '<?php echo $param["PostBarcodeB"];?>';
var PostBarcodeC = '<?php echo $param["PostBarcodeC"];?>';
/*
var settings = {
  output:renderer,
  bgColor: "#FFFFFF",
  color: "#000000",
  barWidth: 15,
  barHeight: 25,
  moduleSize: $("#moduleSize").val(),
  posX: $("#posX").val(),
  posY: $("#posY").val(),
  addQuietZone: $("#quietZoneSize").val()
};
*/
$(function(){	
	$('#BarcodeA').barcode({code:'code39'}).css({ textAlign: 'center', letterSpacing: '10px'}).append('<span>' + BarcodeA + '</span>');;
	$('#BarcodeB').barcode({code:'code39'}).css({ textAlign: 'center', letterSpacing: '10px'}).append('<span>' + BarcodeB + '</span>');;
	$('#BarcodeC').barcode({code:'code39'}).css({ textAlign: 'center', letterSpacing: '10px'}).append('<span>' + BarcodeC + '</span>');;
	$('#PostBarcodeA').barcode({code:'code39'}).css({ textAlign: 'center', letterSpacing: '10px'}).append('<span>' + PostBarcodeA + '</span>');;
	$('#PostBarcodeB').barcode({code:'code39'}).css({ textAlign: 'center', letterSpacing: '10px'}).append('<span>' + PostBarcodeB + '</span>');;
	$('#PostBarcodeC').barcode({code:'code39'}).css({ textAlign: 'center', letterSpacing: '10px'}).append('<span>' + PostBarcodeC + '</span>');;
})


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