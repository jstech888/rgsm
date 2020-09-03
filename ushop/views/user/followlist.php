
<link href="/libs/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
<script src="/libs/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/libs/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
<style>
.btn-goToBuy {
}
.btn-goToBuy:hover {
  filter:alpa(opacity=80);   /* old IE */
  filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=80,FinishOpacity=15, Style=3, StartX=0, FinishX=100, StartY=0,FinishY=16); /*supported by current IE*/
  -moz-opacity:0.7;          /* Moz + FF */
  opacity:0.7;               /* 支持新版瀏覽器 */
}
.btn-goToBuy{
	padding: 5px 12px;
    font-size: 14px;
    border-radius: 7px;
    color: #fff;
    background: #e70080;
}
.btn-goToBuy:hover{
	padding: 5px 12px;
    font-size: 14px;
    border-radius: 7px;
    color: #fff;
    background: #fb045a;
}
.btn-remove{
	padding: 5px 12px;
    font-size: 14px;
    border-radius: 7px;
    color: #fff;
    background: #8850a3;
}
.btn-remove:hover{
	padding: 5px 12px;
    font-size: 14px;
    border-radius: 7px;
    color: #fff;
    background: #7814a2;
}
</style>
<div class="container">
<div class="section">
	<div class="row">
		<div class="col-md-12">
			<center><H2><?php echo $objLang["followlist"]['title'];?></H2></center>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="Table_Content_List">
					<thead>
						<tr>
							<th class="col-hidden-xs">
								<?php echo $objLang["followlist"]['id'];?>
							</th>
							<th>
								<?php echo $objLang["followlist"]['name'];?>
							</th>
							<!-- <th>
								<?php //echo $objLang["followlist"]['qty'];?>
							</th> -->
							<!-- <th>
								<?php //echo $objLang["followlist"]['status'];?>
							</th> -->
							<th>
								<?php echo $objLang["followlist"]['price'];?>
							</th>
							<th style="max-widht:200px;">
								<?php echo $objLang["followlist"]['operate'];?>
							</th>
						</tr>
					</thead>
					<tbody>
					<?php if( count($listProduct) == 0 ) { ?>
						<tr><td colspan="6"><center>EMPTY</center></td></tr>
					<?php } ?>
					<?php
						$selector_status 	= array();
						$selector_cash 		= array();
						foreach( $listProduct AS $prod )
						{
					?>
						<tr>
							<td>
								<?php echo $prod['PID'];?>
							</td>
							<td>
								<?php echo $prod['name'];?>
							</td>
							<?php /*<td>
								<?php echo $prod['stock'];?>
							</td>
							<td>
								<?php echo $prod['status'];?>
							</td>*/?>
							<td>
								<div class="ad-price" style="display: inline-block;"><span class="dPrice"><?php echo $prod["cPrice"];?></span></div>
							</td>
							<td class="text-center" style="width:210px;max-width:200px;">
								<a href="<?php echo base_url("/product/detail/".$prod['detailKey']);?>" class="btn btn-default btn-xs btn-goToBuy"><?php echo $objLang["followlist"]['gotobuy'];?></a>
								<a onclick="removeProduct('<?php echo $prod['PID'];?>');" class="btn btn-default btn-xs btn-remove"><?php echo $objLang["followlist"]['remove'];?></a>
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
	$("#Table_Content_List").find(".total").formatCurrency({ colorize:true, dropDecimals: false, region: 'zh-TW' });	
	$("#Table_Content_List").find("th").bind("click",function(){
		$("#Table_Content_List").find(".total").formatCurrency({ colorize:true, dropDecimals: false, region: 'zh-TW' });	
	});
	$(".pagination li").bind("click",function(){
		$("#Table_Content_List").find(".total").formatCurrency({ colorize:true,dropDecimals: false, region: 'zh-TW' });	
	});
} );
</script>