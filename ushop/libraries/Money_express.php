<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Money_express {
    
        /*http://msws.webservice.epayment.MPG.cardinfolink.com/*/
        /*http://ws.moneyswap.moneyexpress.ws.cardinfolink.com/*/
        /*epaymenttest.moneyswap.com*/
        var $nusoap_address     = 'http://epaymenttest.moneyswap.com/moneyexpress/services/Remittance?wsdl';

	var $nusoap_client;
        var $nusoap_status      = TRUE;
        
        var $delimeter_Param    = ",";
	var $delimeter_kvp      = "=";
        
        var $version            = 'UPME000001';
        var $merchant_id        = '123456789012345';
        var $merchant_name      = 'MerchantName Test';
        var $partnerId          = '94032826';
        var $mcc                = '4816';
        var $secret_key         = 'test';
        
        var $default_param      = array(
            'SendName'=>'',
            'SendID'=>'',
            'SendIDType'=>'',
            'SendContactNO'=>'',
            'SendAddress'=>'',
            'AccountNO'=>'',
            'Amount'=>'',
            'Currency'=>'',
            'LclTime'=>'',
            'StTime'=>'',
            'RRF'=>'',
            'CountryCode'=>'',
        );
        
        var $CI;
        
	public function __construct() {
            
            require_once APPPATH.'third_party/nusoap/nusoap.php';
            
            $this->CI =& get_instance();
            
            $this->nusoap_client = new soapclient($this->nusoap_address,true);
            $this->nusoap_client->soap_defencoding  = 'utf-8'; 
            $this->nusoap_client->decode_utf8       = false; 
            $this->nusoap_client->xml_encoding      = 'utf-8'; 
            
            
            $text = '';
            if($this->nusoap_client->fault)
            {
                $text = 'Error: '.$this->nusoap_client->fault;
            }
            else
            {
                if ($this->nusoap_client->getError())
                {
                    $text = 'Error: '.$this->nusoap_client->getError();
                }
            }
            
            if($text != '')
            {
                log_message('error',$text);
                $this->nusoap_status = FALSE;
            }
            else
            {
                $this->nusoap_status = TRUE;
            }
	}
        
        function __destruct()
        {
            unset($this->nusoap_client);
            $this->nusoap_status = FALSE;
        }
        
        /*
         * 
         * Response XML:
         * <?xml version="1.0" encoding="UTF-8"?>
         * <node>
         *     <entry key="respCode">15</entry>
               <entry key="transTimeLcl">20130217222611</entry>
               <entry key="transCurr">USD</entry>
               <entry key="mcc">4816</entry>
               <entry key="settAmt">1.99</entry>
               <entry key="partnerId">94032826</entry>
               <entry key="billAmt">1.99</entry>
               <entry key="version">UPME000001</entry>
               <entry key="termId">99999999</entry>
               <entry key="billRate">1.000000</entry>
               <entry key="settCurr">USD</entry>
               <entry key="acqCountryCode">826</entry>
               <entry key="merchantName">MerchantName Test</entry>
               <entry key="respMsg">no such issuers</entry>      ----!!!------   <entry key="respMsg">amount limit exceeded</entry>
               <entry key="merchantId">123456789012345</entry>
               <entry key="billCurr">USD</entry>
               <entry key="api-sign">8c9a6dc903f3bdbabbb42c6d7792e876</entry>
               <entry key="settleDate">20130217</entry>
               <entry key="rrf">98a4bc13ec8d</entry>
               <entry key="transInit">WEB</entry>
               <entry key="transAmt">1.99</entry>
               <entry key="actionCode">AVTF</entry>
               <entry key="transType">AVTP</entry>
               <entry key="transTimeSt">20130217142611</entry>
               <entry key="settRate">1.000000</entry>
               <entry key="remitCh">CIL</entry>
         * </node>
         */
        public function Account_Verification($data)
        {
            $data = array_merge($this->default_param,$data);
            if($this->nusoap_status)
            {
                $soap_param = array(
                    'version'=>$this->version,
                    'sndName'=>$data['SendName'],
                    'sndID'=>$data['SendID'],
                    'sndIDType'=>$data['SendIDType'],//'IDCARD','PASSPORT',
                    'sndContactNO'=>$data['SendContactNO'],
                    'sndAddress'=>$data['SendAddress'],
                    'rcvAcctNO'=>$data['AccountNO'],
                    'rcvAcctType'=>'BANK_CARD',
                    'transInit'=>'WEB',
                    'transAmt'=>$data['Amount'],
                    'transCurr'=>$data['Currency'],
                    'transTimeLcl'=>$data['LclTime'],
                    'transTimeSt'=>$data['StTime'],
                    'termId'=>'99999999',
                    'merchantId'=>$this->merchant_id,
                    'merchantName'=>$this->merchant_name,
                    'mcc'=>$this->mcc,//'6010',
                    'partnerId'=>$this->partnerId,
                    'rrf'=>$data['RRF'],
                    'transType'=>'AVTQ',/*AVTQ/AVTR*/
                    'acqCountryCode'=>$data['CountryCode'],
                    'userIP'=>$this->CI->input->ip_address() 
                );
                $soap_param['api-sign'] = $this->createSignature($this->secret_key, $soap_param);
                
                $row = $this->nusoap_client->call(
                    'accountVerificationService',
                    array('arg0'=>$this->createArg($soap_param))
                );
                if(!$err = $this->nusoap_client->getError())  
                {
                    log_message('error',$err);
                }
                $result = $this->proccessXML($row['return']);
                return $this->array_to_obj($result);
            }
        }
        
        public function Remittance_Payment($data)
        {
            $data = array_merge($this->default_param,$data);
            if($this->nusoap_status)
            {
                $soap_param = array(
                    'version'=>$this->version,
                    'sndName'=>$data['SendName'],   
                    'sndAddress'=>$data['SendAddress'],//'MarkRaven\'s CompanyAddress MarkRaven\'s District London 2222 United Kingdom',
                    'rcvAcctNO'=>$data['AccountNO'],
                    'rcvAcctType'=>'BANK_CARD',
                    'transInit'=>'WEB',
                    'transAmt'=>$data['Amount'],
                    'transCurr'=>$data['Currency'],
                    'transTimeLcl'=>$data['LclTime'],
                    'transTimeSt'=>$data['StTime'],
                    'termId'=>'99999999',
                    'merchantId'=>$this->merchant_id,
                    'merchantName'=>$this->merchant_name,
                    'mcc'=>$this->mcc,
                    'partnerId'=>$this->partnerId,
                    'rrf'=>$data['RRF'],
                    'transType'=>'RPTQ',
                    'acqCountryCode'=>$data['CountryCode'],
                    'userIP'=>$this->CI->input->ip_address() 
                );
                $soap_param['api-sign'] = $this->createSignature($this->secret_key, $soap_param);
                
                $row = $this->nusoap_client->call(
                    'remittanceQueryService',
                    array('arg0'=>$this->createArg($soap_param))
                );
                if(!$err = $this->nusoap_client->getError())  
                {
                    log_message('error',$err);
                }
                $result = $this->proccessXML($row['return']);
                return $this->array_to_obj($result);
            }
        }
        /*
         * 
         *  <entry key="respCode">61</entry>
            <entry key="transTimeLcl">20130217230201</entry>
            <entry key="api-sign">980dca6a0e4b0ecaa3a528226a9146f8</entry>
            <entry key="transCurr">USD</entry>
            <entry key="partnerId">94032826</entry>
            <entry key="settAmt">5000000</entry>
            <entry key="billAmt">5000000</entry>
            <entry key="rrf">000000002374</entry>
            <entry key="settleDate">20130217</entry>
            <entry key="transInit">WEB</entry>
            <entry key="transAmt">5000000</entry>
            <entry key="version">UPME000001</entry>
            <entry key="actionCode">AVTF</entry>
            <entry key="billRate">1.000000</entry>
            <entry key="transType">INQR</entry>
            <entry key="settCurr">USD</entry>
            <entry key="transTimeSt">20130217150201</entry>
            <entry key="remitCh">CIL</entry>
            <entry key="respMsg">amount limit exceeded</entry>
            <entry key="settRate">1.000000</entry>
            <entry key="billCurr">USD</entry>
         */
        public function Inquiry($data)
        {
            $data = array_merge($this->default_param,$data);
            if($this->nusoap_status)
            {
                $soap_param = array(
                    'version'=>$this->version,
                    'transInit'=>'WEB',
                    'transTimeLcl'=>$data['LclTime'],
                    'transTimeSt'=>$data['StTime'],
                    'partnerId'=>$this->partnerId,
                    'rrf'=>$data['RRF'],
                    'transType'=>'INQQ'
                );
                $soap_param['api-sign'] = $this->createSignature($this->secret_key, $soap_param);
                
                $row = $this->nusoap_client->call(
                    'transactionQueryService',
                    array('arg0'=>$this->createArg($soap_param))
                );
                if(!$err = $this->nusoap_client->getError())  
                {
                    log_message('error',$err);
                }
                $result = $this->proccessXML($row['return']);
                return $this->array_to_obj($result);
            }
        }
        
        private function createArg($param = FALSE)
        {
            $arg0 = '<?xml version="1.0" encoding="utf-8"?>';
            $arg0 .= '<code>';
            foreach ($param as $key =>$value)
            {
                $arg0 .= '<entry key="'.$key.'">'.$value.'</entry>';
            }
            $arg0 .= '</code>';
            
            return $arg0;
        }
        
        private function createSignature($secret,$array){
            ksort($array);
            foreach($array as $key => $val)
            {
                    $keyValArr[] = $key.$this->delimeter_kvp.$val;
            }
            $str = implode($this->delimeter_Param, $keyValArr).','.$secret;
            return md5($str);
		}
        
        private function proccessXML($xmlDoc)
        {
            $xml = new DOMDocument;
            $xml->loadXML($xmlDoc);
            $entries = $xml->getElementsByTagName('entry');
            $result = array();
            foreach ($entries as $entry) {
              $key      = $entry->getAttribute('key');
              $value    = $entry->nodeValue;
              if ($key && $value) {
                $result[$key] = $value;
              }
            }
            return $result;
        }
        
        private function array_to_obj($array) 
        { 
            $obj = new stdClass(); 
            foreach ($array as $key => $value) 
            { 
                if (is_array($value)) 
                { 
                    $obj->$key = $this->array_to_obj($value); 
                    
                } 
                else 
                { 
                    $obj->$key = $value; 
                } 
            }
            return $obj; 
        }
	
}