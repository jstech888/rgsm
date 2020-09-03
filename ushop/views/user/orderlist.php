
<link href="/libs/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
<script src="/libs/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/libs/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>

<div class="container">
<style>
div.dataTables_info,
div.dataTables_length label,
div.dataTables_filter label {
  font-size: 16px;
}
#table-responsive{
/* 	width: 1000px; */
  margin: auto;
}
div.dataTables_length select {
  display: inline-block;	
}
div.dataTables_filter input {
  width: 120px;
  display: inline-block;
  margin-right:15px;
}
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
#Table_Content_List .type {
  text-align: center;
}

#Table_Content_List .type span{
  color: #FFF;
}
#Table_Content_selector label{
  line-height: 30px;
}
#Table_Content_selector{
  margin-top: 25px;
}
	@media screen and (max-width: 1439px){
		#table-responsive{
			width: 100%;
			margin: auto;
		}
	}
  @media (max-width: 767px) {
	 .col-hidden-xs {
		display:none !important;
	 }
	 .visible-xs {
		display:block !important;
	 }
	 .table-responsive {
	   padding: 12px;
	 }
	 .table-responsive table td {
	   vertical-align: middle !important;
	   text-align: center;
	 }
	 #Table_Content_List_wrapper {
       min-width: 230px;
	 }
 }
 .table-responsive {
    min-height: .01%;
    overflow-x: hidden;
}
a.btn.btn-success.btn-view.btn-xs {
  padding: 5px 8px;
  font-size: 14px;
  background-color: #f04493;
  border-radius: 5px;
}
a.btn.btn-success.btn-view.btn-xs:hover {  
  background-color: #fb045a;
}
a.btn.btn-success.btn-cancel.btn-xs {
  padding: 5px 8px;
  font-size: 14px;
  background-color: #4e8fc2;
  border-radius: 5px;
}
a.btn.btn-success.btn-cancel.btn-xs:hover {  
  background-color: #0a52ad;
}

</style>

<div class="col-xs-12 col-sm-12">
	<center><H2><?php echo $objLang["orderlist"]['title'];?></H2></center>
	<div class="table-responsive" id="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="Table_Content_List">
			<thead>
				<tr>
					<th class="col-hidden-xs" style="width: 208px;">
						<?php echo $objLang["orderlist"]['id'];?>
					</th>
					<th class="col-hidden-xs" style="width: 78px;">
						<?php echo "訂單狀態";//$objLang["orderlist"]['status'];?>
					</th>
					<th class="col-hidden-xs" style="width: 78px;">
						<?php echo "付款狀態";//$objLang["orderlist"]['status'];?>
					</th>
					<th class="col-hidden-xs" style="width: 78px;">
						<?php echo "運送狀態";//$objLang["orderlist"]['status'];?>
					</th>
					<th class="visible-xs" width="115px">
						<?php echo $objLang["orderlist"]['createTime'];?>
					</th>
					<th class="col-hidden-xs" style="width: 114px;">
						<?php echo $objLang["orderlist"]['createTime'];?>
					</th>
					<th class="col-hidden-xs" style="width: 215px;">
						<?php echo $objLang["orderlist"]['cashFlow'];?>
					</th>
					<th class="th-total" style="width: 85px;">
						<?php echo $objLang["orderlist"]['total'];?>
					</th>
					<th class="th-address col-hidden-xs" style="width: 230px;">
						<?php echo $objLang["orderlist"]['address'];?>
					</th>
					<th style="width: 130px;">
						<?php echo $objLang["orderlist"]['control'];?>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$selector_status 	= array();
				$selector_cash 		= array();
				foreach( $orderlist AS $trans )
				{
					if(!in_array($trans['Otype'],$selector_status))
						array_push($selector_status, $trans['Otype']);
					
					if(!in_array($objLang["shoppingcart"][$trans['cashFlow']],$selector_cash))
						array_push($selector_cash, $objLang["shoppingcart"][$trans['cashFlow']]);
			?>
				<tr>
					<td class="col-hidden-xs">
						<?php echo $trans['unique_id'];?>
					</td>
					<td class="type col-hidden-xs">
						<?php echo $trans['type1'];?>
					</td>
					<td class="type col-hidden-xs">
						<?php echo $trans['type2'];?>
					</td>
					<td class="type col-hidden-xs">
						<?php echo $trans['type3'];?>
					</td>
					<td class="visible-xs">
						<?php echo date("Y/m/d",strtotime($trans['createTime'])) . "<br/>" . date("H:i:s",strtotime($trans['createTime']));?>
						<br/><?php echo $trans['type'];?>
					</td>
					<td class="col-hidden-xs" align="center">
						<?php echo date("Y/m/d",strtotime($trans['createTime'])) . "<br/>" . date("H:i:s",strtotime($trans['createTime'])); //$trans['createTime'];?>
					</td>
					<td class="col-hidden-xs">
						<?php 
						if( $trans["cashFlow"] == "BankRemittances" )
						{		
							if (isset($trans["cashData"]["BankRemittancesAccount"]) ){
								if (strlen( $trans["cashData"]["BankRemittancesAccount"] ) >= 4 ){  // 有輸入則不能修改
									echo "銀行匯款<br/>後四碼：" . $trans["cashData"]["BankRemittancesAccount"]  ;
								}
								else {   // 開放修改
									echo "銀行匯款<br/>後四碼：" . "<input id=\"bank-remittances-account-".$trans["id"]."\" type=\"text\" value=\"".$trans["cashData"]["BankRemittancesAccount"]."\" style=\"width:52px;\"  onkeyup=\"value=value.replace(/[^\d]/g,'')\" > ";
									echo "<a class=\"btn btn-success btn-xs btn-bank-remittances\" onclick=\"changeRemittCanUpdate(".$trans["id"].")\" >修改</a> " ;
								}
							}
							else{
								echo "銀行匯款" ;
							}					
						}
						else{
							echo $objLang["shoppingcart"][$trans['cashFlow']];
						}
						?>
					</td>
					<td class="total">
						<?php echo $trans['iso_code'];?> <?php echo round($trans['clearTotal']/ $trans['rate'], 2);?>
					</td>		
					<td class="address col-hidden-xs">
						<?php echo $trans['zip'].'-'.$trans['address'];?>
					</td>
					<td>
						<a href="<?php echo base_url("/message?transId=".$trans['unique_id']);?>" class="btn btn-success btn-view btn-xs"><?php echo $obj_orderlist_lang['view'];?></a>
						<?php if($trans['isAllowedCancelOrder']){	?>
							<a href="<?php echo base_url("/Page/ContactUs?transId=".$trans['unique_id']);?>" class="btn btn-success btn-xs btn-cancel"><?php echo "取消訂單".$obj_orderlist_lang['cancel'];?></a>
						<?php } ?>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>
</div>
<script>
var selector_status_opt = <?php echo json_encode($selector_status);?>; 
var selector_cash_opt = <?php echo json_encode($selector_cash);?>; 

function filterGlobal (data,i) {
	setTimeout(function(){
		$('#Table_Content_List').DataTable().column(i).search( 
		   data, false, true
		).draw();
	},300);
}
function changeRemittCanUpdate(itemId)
{
	var tmpval = $('#bank-remittances-account-'+itemId).val(); 
	if (tmpval.length != 4 ) {
		alert(objLang.shoppingcart.fillOutAlert);
		$('#bank-remittances-account-'+itemId).focus();
		return false ;
	}
	var cashData =  { 'BankRemittancesAccount':tmpval } ;
	//console.log(itemId, tmpval , cashData );
	if(confirm(objLang.shoppingcart.confirmAlert)) 
	{
		$.ajax({
			url: "<?php echo base_url('/user/changeBankRemittancesAccount');?>",
			async:true,
			cache:false,
			method:"POST",
			data:{
				"id" 	: itemId,
				"cashFlow" 	: "BankRemittances",
				"cashData" 	: cashData
			},
			success:function(data, status, xhr){
				//console.log(data, status, xhr);
				var type = data.code == 1?"info":"danger";
				var text = data.code == 1?'修改完成！':"修改失敗！";
				
				new PNotify({
					title: data.message,
					text: text,
					shadow: true,
					opacity: "0.75",
					type: type,
					stack: {
						"dir1": "down",
						"dir2": "left",
						"push": "top",
						"spacing1": 10,
						"spacing2": 10
					},
					width: "290px",
					delay: 1400
				});
				
				setTimeout(function(){
					location.reload();
				},1000);
			},
			error:function(xhr, stauts, err){
				
				//console.log(xhr, stauts, err);
				new PNotify({
					title: "系統異常",
					text: '該動作暫時無法完成！',
					shadow: true,
					opacity: "0.75",
					type: "danger",
					stack: {
						"dir1": "down",
						"dir2": "left",
						"push": "top",
						"spacing1": 10,
						"spacing2": 10
					},
					width: "290px",
					delay: 1400
				});
				
			}
		});
				
	}
}
$(document).ready(function() {
	for( var k in selector_status_opt )
	{
		var opt = selector_status_opt[k];
		$(".selector_status").append("<option value='"+opt+"'>"+opt+"</option>");
	}
	$(".selector_status").bind("change",function(){
		$(".selector_cash").val("");
		filterGlobal("",1);
		filterGlobal($(this).val(),1);
	});
	
	for( var k in selector_cash_opt )
	{
		var opt = selector_cash_opt[k];
		$(".selector_cash").append("<option value='"+opt+"'>"+opt+"</option>");
	}
	$(".selector_cash").bind("change",function(){
		$(".selector_status").val("");
		filterGlobal("",1);
		filterGlobal($(this).val(),3);
	});
	
    $('#Table_Content_List').dataTable({
        "order": [[ 0, "desc" ]],
		"language": <?php echo json_encode($obj_orderlist_lang['dataTable']);?>
    });
	
	/*
	$("#Table_Content_List").find(".total").formatCurrency({ colorize:true, dropDecimals: false, region: region });	
	$("#Table_Content_List").find("th").bind("click",function(){
		$("#Table_Content_List").find(".total").formatCurrency({ colorize:true, dropDecimals: false, region: region });	
	});
	$(".pagination li").bind("click",function(){
		$("#Table_Content_List").find(".total").formatCurrency({ colorize:true,dropDecimals: false, region: region });	
	});
	*/
} );
</script>