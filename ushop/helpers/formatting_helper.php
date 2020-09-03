<?php 
function format_address($fields, $br=false)
{
	if(empty($fields))
	{
		return ;
	}
	
	// Default format
	$default = "{firstname} {lastname}\n{company}\n{address_1}\n{address_2}\n{city}, {zone} {postcode}\n{country}";
	
	// Fetch country record to determine which format to use
	$CI = &get_instance();
	$CI->load->model('location_model');
	$c_data = $CI->location_model->get_country($fields['country_id']);
	
	if(empty($c_data->address_format))
	{
		$formatted	= $default;
	} else {
		$formatted	= $c_data->address_format;
	}

	$formatted		= str_replace('{firstname}', $fields['firstname'], $formatted);
	$formatted		= str_replace('{lastname}',  $fields['lastname'], $formatted);
	$formatted		= str_replace('{company}',  $fields['company'], $formatted);
	
	$formatted		= str_replace('{address_1}', $fields['address1'], $formatted);
	$formatted		= str_replace('{address_2}', $fields['address2'], $formatted);
	$formatted		= str_replace('{city}', $fields['city'], $formatted);
	$formatted		= str_replace('{zone}', $fields['zone'], $formatted);
	$formatted		= str_replace('{postcode}', $fields['zip'], $formatted);
	$formatted		= str_replace('{country}', $fields['country'], $formatted);
	
	// remove any extra new lines resulting from blank company or address line
	$formatted		= preg_replace('`[\r\n]+`',"\n",$formatted);
	if($br)
	{
		$formatted	= nl2br($formatted);
	}
	return $formatted;
	
}
if ( ! function_exists('format_transaction_no'))
{
	function format_transaction_no($type_id,$transactionid)
	{
		$result = str_pad($transactionid,8,'0',STR_PAD_LEFT);

		if(isset($_GLOBALS["tx_type"]))
		{
			$tx_type 	= $_GLOBALS["tx_type"];
		}
		else
		{
			$ci			= & get_instance();
			$ci->load->database(); 
			$sql 		= "SELECT id,short FROM gc_tx_type"; 
			$query		= $ci->db->query($sql);
			$tx_type 	= $_GLOBALS["tx_type"] = $query->result();
		}
		
		
		
		foreach($tx_type as $row)
		{
			if($row->id  == $type_id)
			{
				return $row->short.''.$result;
			}
		}
		return $result;
	}
}
/*format account number*/
if ( ! function_exists('format_account_number'))
{
	function format_account_number($currency_id = FALSE,$accountid = 0,$agentid = 0)
	{
		$result = str_pad($accountid,6,'0',STR_PAD_LEFT).'-'. str_pad($agentid,5,'0',STR_PAD_LEFT);
		$currency = cache_currency();
		foreach($currency as $row)
		{
			if($row->id  == $currency_id)
			{
				return $row->currency_code.'-'.$result;
			}
		}
		return $result;
	}
}
if ( ! function_exists('explore_account_number'))
{
	function explore_account_number($value)
	{
		$result = $op = explode("-", $value);
		if(count($op) > 2)
		{
			$currency = $this->cache_currency();
			foreach($currency as $row)
			{
				if($row->currency_code  == $op[1])
				{
					$result['accountid'] 		=  abs($op[2]);
					$result['currencyid'] 		=  $row->id;
				}
			}
		}
		else
		{
			$result['accountid']				=	abs($op[0]);
		}
		return $result;
	}
}
function remove_format_bank_account($value)
{
	$value =str_replace('-', '', $value); 
	$value =str_replace(' ', '', $value);
	return $value ;
}
function format_bank_account($value)
{
	$result = $op = explode("-", $value);
	if(count($op) > 2)
	{
		return $value;
	}
	else
	{
		$newvalue="";
		for ($i=0;$i<strlen($value);$i=$i+4)
		{
			$newvalue.=substr($value,$i,4).'-';
		}
		$result=trim($newvalue,'-');
		return $result;
	}
	 
}

function cache_currencylist()
{
	if(isset($_GLOBALS["currencylist"]))
	{
		$currency 	= $_GLOBALS["currencylist"];
	}
	else
	{
		$ci			= & get_instance();
		$ci->load->database();
		$sql 		= "SELECT id,code
						FROM gc_currency
						WHERE active = 1 order by code";
		$query		= $ci->db->query($sql);
		$currencydata 	=  $query->result();
		if($currencydata){
			$list=array();
			foreach ($currencydata as $item)
			{
				$list[$item->code]=$item->id;
			}
		   $currency=$_GLOBALS["currencylist"] =$list;
		}
 	}
	return $currency;
}

function cache_currency()
{
	if(isset($_GLOBALS["currency"]))
	{
		$currency 	= $_GLOBALS["currency"];
	}
	else
	{
		$ci			= & get_instance();
		$ci->load->database(); 
		$sql 		= "SELECT id,code,name_en, name_big5,code as currency_code,is_display
						FROM gc_currency 
						WHERE active = 1 order by code"; 
		$query		= $ci->db->query($sql);
		$currency 	= $_GLOBALS["currency"] = $query->result();
	}
	return $currency;
}
function cache_epaylinks()
{
	if(isset($_GLOBALS["epaylinks"]))
	{
		$epaylinks 	= $_GLOBALS["epaylinks"];
	}
	else
	{
		$ci			= & get_instance();
		$ci->load->database();
		$sql 		= "SELECT * from 
						gc_online_merchant
						WHERE id = 1 ";
		$query		= $ci->db->query($sql);
		$epaylinks 	= $_GLOBALS["epaylinks"] = $query->row();
	}
	return $epaylinks;
}

function sign_number($value,$decimals=2)
{
	if(!is_numeric($value))
	{
		return;
	}
	if($decimals<=0)
	{
		return $value;
	}
	
	$number=pow(10,$decimals);
	$value=floor($value*$number)/$number;//小数点不进位
	return $value;
	
}
function format_money($value,$decimals=2)
{
	if(!is_numeric($value))
	{
		return;
	}
	if($decimals>0){
		$number=pow(10,$decimals);
		$value=floor($value*$number)/$number;//小数点不进位
	}
	return  number_format(abs($value), 2, '.', ',');
	 
}
function format_currency($value, $symbol=true)
{

	if(!is_numeric($value))
	{
		return;
	}
	
	$CI = &get_instance();
	
	if($value < 0 )
	{
		$neg = '-';
	} else {
		$neg = '';
	}
	 
	
	if($symbol)
	{
		 
		$formatted	= number_format(abs($value), 2, '.', ',');
		 
		if($CI->config->item('currency_symbol_side') == 'left')
		{
			$formatted	= $neg.$CI->config->item('currency_symbol').$formatted;
		}
		else
		{
			$formatted	= $neg.$formatted.$CI->config->item('currency_symbol');
		}
	}
	else
	{
		//traditional number formatting
		$formatted	= number_format(abs($value), 2, '.', ',');
	}
	
	return $formatted;
}


/** 
 * 人民币小写转大写 
 * 
 * @param string $number 数值 
 * @param string $int_unit 币种单位，默认"元"，有的需求可能为"圆" 
 * @param bool $is_round 是否对小数进行四舍五入 
 * @param bool $is_extra_zero 是否对整数部分以0结尾，小数存在的数字附加0,比如1960.30， 
 *             有的系统要求输出"壹仟玖佰陆拾元零叁角"，实际上"壹仟玖佰陆拾元叁角"也是对的 
 * @return string 
 */ 
function num2rmb($number = 0, $int_unit = '元', $is_round = TRUE, $is_extra_zero = FALSE) 
{ 
    // 将数字切分成两段 
    $parts = explode('.', $number, 2); 
    $int = isset($parts[0]) ? strval($parts[0]) : '0'; 
    $dec = isset($parts[1]) ? strval($parts[1]) : ''; 
 
    // 如果小数点后多于2位，不四舍五入就直接截，否则就处理 
    $dec_len = strlen($dec); 
    if (isset($parts[1]) && $dec_len > 2) 
    { 
        $dec = $is_round 
                ? substr(strrchr(strval(round(floatval("0.".$dec), 2)), '.'), 1) 
                : substr($parts[1], 0, 2); 
    } 
 
    // 当number为0.001时，小数点后的金额为0元 
    if(empty($int) && empty($dec)) 
    { 
        return '零'; 
    } 
 
    // 定义 
    $chs = array('0','壹','贰','叁','肆','伍','陆','柒','捌','玖'); 
    $uni = array('','拾','佰','仟'); 
    $dec_uni = array('角', '分'); 
    $exp = array('', '万'); 
    $res = ''; 
 
    // 整数部分从右向左找 
    for($i = strlen($int) - 1, $k = 0; $i >= 0; $k++) 
    { 
        $str = ''; 
        // 按照中文读写习惯，每4个字为一段进行转化，i一直在减 
        for($j = 0; $j < 4 && $i >= 0; $j++, $i--) 
        { 
            $u = $int{$i} > 0 ? $uni[$j] : ''; // 非0的数字后面添加单位 
            $str = $chs[$int{$i}] . $u . $str; 
        } 
        //echo $str."|".($k - 2)."<br>"; 
        $str = rtrim($str, '0');// 去掉末尾的0 
        $str = preg_replace("/0+/", "零", $str); // 替换多个连续的0 
        if(!isset($exp[$k])) 
        { 
            $exp[$k] = $exp[$k - 2] . '亿'; // 构建单位 
        } 
        $u2 = $str != '' ? $exp[$k] : ''; 
        $res = $str . $u2 . $res; 
    } 
 
    // 如果小数部分处理完之后是00，需要处理下 
    $dec = rtrim($dec, '0'); 
 
    // 小数部分从左向右找 
    if(!empty($dec)) 
    { 
        $res .= $int_unit; 
 
        // 是否要在整数部分以0结尾的数字后附加0，有的系统有这要求 
        if ($is_extra_zero) 
        { 
            if (substr($int, -1) === '0') 
            { 
                $res.= '零'; 
            } 
        } 
 
        for($i = 0, $cnt = strlen($dec); $i < $cnt; $i++) 
        { 
            $u = $dec{$i} > 0 ? $dec_uni[$i] : ''; // 非0的数字后面添加单位 
            $res .= $chs[$dec{$i}] . $u; 
        } 
        $res = rtrim($res, '0');// 去掉末尾的0 
        $res = preg_replace("/0+/", "零", $res); // 替换多个连续的0 
    } 
    else 
    { 
        $res .= $int_unit . '整'; 
    } 
    return $res; 
} 