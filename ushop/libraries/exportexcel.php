<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Exportexcel
{   	
	function __construct()
	{
    
	}

	public function export( $filename, $data, $arr_opt = array() ) 
	{	
		
		header("Pragma: public");
		header("Expires: 0");
		header("Content-type: application/force-download");
		header("Content-type: application/octet-stream; charset=UTF-8");
		header("Content-type: application/download");
		header("Content-type: application/vnd.ms-excel; charset=UTF-8");
		header("Pragma: no-cache");
		header("Content-Disposition: attachment; filename= $filename");
		
		
		
		$newdata = $data;
		unset($newdata['title'],$newdata['xlspayerName'],$newdata['excelStyle'],$newdata['xlsagentName'],$newdata['payoutTotal'],$newdata['receivingTotal'],$newdata['feeTotal']
				,$newdata['payoutUSDTotal'],$newdata['receivingUSDTotal'],$newdata['poCurrency'],$newdata['poTotal'],$newdata['reCurrency'],$newdata['reTotal']);
		$col_num = count(array_keys($newdata));
		
		
		
		$head = $this->form_head(array($data['xlsagentName'],$data["title"],$data['xlspayerName']),$col_num, $style="");
		
		$body = $this->form_body($newdata, $style="");
		$foot = $this->form_foot(array($data['payoutTotal'], $data['receivingTotal'], $data['feeTotal'], $data['payoutUSDTotal'], $data['receivingUSDTotal'],
								$data['poCurrency'],$data['poTotal'],$data['reCurrency'],$data['reTotal']) , $col_num ,$style="");
		echo $head;
		echo $body;
		echo $foot;
		
		
		/*
		$newdata = $data;
		unset($newdata['ep_payer_givenNames'],$newdata['title']);
		echo "<meta http-equiv='Content-type' content='text/html; charset=utf-8'>\n";
		echo "<table border='1'>\n";
		echo "<tr align='center'><td colspan='$col_num'  style='text-align:center;'>\n";
		echo $data["title"];
		echo $newdate['givenNames'][0];
		echo "</td></tr>\n";	
		
		echo"<tr>";
		$column_name = array_keys($newdata);				
		foreach($column_name as $name)
		{
			echo"<td>$name</td>";
		}
		echo"</tr>";
		
		
		
		for( $i=0;$i<count($newdata['ep_transaction_id']);$i++)
		{
			echo"<tr>";
			foreach($column_name as $name)
			{
				echo"<td>";
				echo $newdata[$name][$i];
				echo"</td>";
			}
			echo"</tr>";
		}	
		
		
		
		echo"</table>";
		exit;
		
		/*
		echo "<meta http-equiv='Content-type' content='text/html; charset=utf-8'>\n";
		echo "<table border='1'>\n";
		echo "<tr align='center'><td>\n";
		echo "交易紀錄<br style='mso-data-placement:same-cell'/>";
		
		echo "</td></tr>\n";		
		echo"<tr>";
		echo"<td>EP Transaction ID</td>";
		echo"<td>Payer Name</td>";
		echo"<td>Payout Currency</td>";
		echo"<td>Payout Amount</td>";
		echo"<td>FX Rate</td>";
		echo"<td>Fee Value</td>";
		echo"<td>Receiving Destination</td>";
		echo"<td>Receiving Currency</td>";
		echo"<td>Receiving Amount</td>";
		echo"<td>remarks</td>";
		echo"<td>Status</td>";
		echo"<td>Date Time</td>";
		
		echo"</tr>";
		echo"</table>";
		foreach( $arr_opt as $opt )
		{
			$this->operationOutput( $opt, $col_num );
		}
		
		*/
	}
		
	public function form_head( $data, $col_num, $style )
	{	
		$head = '';
		switch($style)
		{
			default:
				
				
				$head.="<meta http-equiv='Content-type' content='text/html; charset=utf-8'>\n";
				$head.="<table border='1'  style='font-weight:bold; border-color:#000000;  border:double; font-family: Tahoma;'>\n";
				$head.="<tr align='center'><td colspan='$col_num'  style='text-align:center; font-size:large;'>\n";				
				$head.= $data[0];
				$head.="<br style='mso-data-placement:same-cell'/>";
				$head.= "".$data[2]."---";
				$head.= $data[1];
				$head.= "</td></tr>\n";
				
				break;
				
			case'a':
				
				$head.="style A";
				$head.="<meta http-equiv='Content-type' content='text/html; charset=utf-8'>\n";
				$head.="<table border='1'>\n";
				$head.="<tr align='center'><td colspan='$col_num'  style='text-align:center;'>\n";
				foreach($head as $v)
					$head.=$v;
				$head.="</td></tr>\n";	
				break;
		}
		return $head;
	}
		
	public function form_body( $data, $style )
	{
		$body = '';
		switch($style)
		{
			default:
				
				$body.="<tr style='background-color: #D80000; text-align:center; color:#FFFFFF; '>\n";
				
				$column_name = array_keys($data);				
				foreach($column_name as $name)
				{
					$body.="<td>$name</td>\n";
				}
				$body.="</tr>\n";
		
				for( $i=0;$i<count($data['ep_transaction_id']);$i++)
				{
					$body.="<tr>\n";
					foreach($column_name as $name)
					{
						$body.="<td style='text-align:right;'>&nbsp;\n";
						$body.= $data[$name][$i];
						$body.="&nbsp;</td>\n";
					}
						$body.="</tr>\n";
				}		
				
				
				
							
				break;
			case 'a':

				break;
			
		}
		return $body;
	}
	
	public function form_foot( $data, $col_num, $style )
	{
		$foot = '';
		switch($style)
		{
			default:
				
				//var_dump($data[2]);
				$foot.="<tr><td colspan='$col_num'></td></tr>";
				$foot.="<tr align='center'; style='background-color:#D80000;'><td colspan='$col_num' style='text-align:center; color:#FFFFFF;'>TOTAL</td></tr>";
				$foot.="<tr style='background-color:#F8F8F8;'><td colspan='2'></td><td style='text-align:center; color:#336699;' colspan='4'>Payout Amount</td>";
				$foot.="<td style='text-align:center; color:#336699;' colspan='2'>Fee</td>";
				$foot.="<td style='text-align:center; color:#336699;' colspan='3'>Receiving Amount</td>";
				$foot.="<td colspan='3'></td>";
				$foot.="<tr style='background-color:#F8F8F8;' >\n";
				$foot.="<td colspan='2' style='text-align:center;'>\n";
				$foot.="Total:";
				$foot.="</td><td colspan='4' style='text-align:right;'>";
				foreach($data[0] as $k=>$v)
					{
						$foot.="&nbsp;\n";
						$foot.= $v;
						$foot.="&nbsp;\n";
						$foot.="<br/>";	
					}
				$foot.="<br/>";	
				foreach($data[3] as $k=>$v)
					{
						$foot.="&nbsp;\n";
						$foot.= $v;
						$foot.="&nbsp;\n";						
					}	
				$foot.="</td><td colspan='2' style='text-align:right;'>";
				foreach($data[2] as $k=>$v)
					{
						$foot.="&nbsp;\n";
						$foot.= $v;
						$foot.="&nbsp;\n";
					}
				$foot.="</td><td colspan='3' style='text-align:right;'>";
				foreach($data[1] as $k=>$v)
					{
						$foot.="&nbsp;\n";
						$foot.= $v;
						$foot.="&nbsp;\n";
						$foot.="<br/>";	
					}
				$foot.="<br/>";
				foreach($data[4] as $k=>$v)
					{
						$foot.="&nbsp;\n";
						$foot.= $v;
						$foot.="&nbsp;\n";						
					}	
				$foot.="</td><td colspan='3'></td></tr>\n";
				$foot.="<tr><td colspan='$col_num'  style='text-align:center;'>\n";
				$foot.="Copyright 2010-2014 UniForex Limited. All rights reserved.";
				$foot.="</td></tr>\n";
				
				
				$foot.="<table border='1'  style='font-weight:bold; border-color:#000000;  border:double; font-family: Tahoma;'>\n";
				
				$foot.="<tr style='background-color:#F8F8F8;'><th colspan='3' style='background-color: #D80000; color:#FFFFFF;'>TOTAL</th>";
				foreach($data[5] as $k=>$v)
					{
						
						$foot.="<th style='background-color: #D80000; text-align:center; color:#FFFFFF; '>";
						$foot.="&nbsp;\n";
						$foot.=$v;
						$foot.="&nbsp;\n";
						$foot.="</th>";
					}
				$foot.="</tr>";
				$foot.="<tr style='background-color:#F8F8F8;'><td colspan='3'>Payout Amount</td>";
				foreach($data[6] as $k=>$v)
					{
						$foot.="<td   style='text-align:right;'>";
						$foot.="&nbsp;\n";
						$foot.=$v;
						$foot.="&nbsp;\n";
						$foot.="</td>";
					}
				$foot.="</tr>";
				$foot.="<tr style='background-color:#F8F8F8;'><td colspan='3'>Receiving Amount</td>";
				foreach($data[8] as $k=>$v)
					{
						$foot.="<td style='text-align:right;'>";
						$foot.="&nbsp;\n";
						$foot.=$v;
						$foot.="&nbsp;\n";
						$foot.="</td>";
					}
				$foot.="</tr>";
				$foot.="<tr style='background-color:#F8F8F8;'><td colspan='3'>Total Payout USD Amount</td>";
				foreach($data[3] as $k=>$v)
					{
						$foot.="<td colspan='9' style='text-align:right;'>";
						$foot.="&nbsp;\n";
						$foot.=$v;
						$foot.="&nbsp;\n";
						$foot.="</td>";
					}
				$foot.="</tr>";
				$foot.="<tr style='background-color:#F8F8F8;'><td colspan='3'>Total Receiving USD Amount</td>";
				foreach($data[4] as $k=>$v)
					{
						$foot.="<td colspan='9' style='text-align:right;'>";
						$foot.="&nbsp;\n";
						$foot.=$v;
						$foot.="&nbsp;\n";
						$foot.="</td>";
					}
				$foot.="</tr>";
				$foot.="<tr style='background-color:#F8F8F8;'><td colspan='3'>Total Fee</td>";
				foreach($data[2] as $k=>$v)
					{
						$foot.="<td colspan='9' style='text-align:right;'>";
						$foot.="&nbsp;\n";
						$foot.=$v;
						$foot.="&nbsp;\n";
						$foot.="</td>";
					}
				$foot.="</tr>";
				$foot.="<tr><td colspan='$col_num'  style='text-align:center;'>\n";
				$foot.="Copyright 2010-2014 UniForex Limited. All rights reserved.";
				$foot.="</td></tr>\n";
				$foot.="</table>";
				
				
				
				$foot.="</table>";
				
					
				break;
			case 'a':
			
				break;
		}
		return $foot;
	}
	
	
	public function operationOutput($opt,$col_num)
	{
		switch($opt)
		{
			default:
				break;
			case "count":
				echo "<table border='5'>\n";
				echo "<tr><td>\n";
					
				echo "</td></tr>\n";
				echo"</table>\n";
				break;
		}
	}
}
?>