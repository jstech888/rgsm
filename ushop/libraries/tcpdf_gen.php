<?php
//============================================================+
// File name   : example_049.php
// Begin       : 2009-04-03
// Last Update : 2011-05-12
//
// Description : Example 049 for TCPDF class
//               WriteHTML with TCPDF callback functions
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML with TCPDF callback functions
 * @author Nicola Asuni
 * @since 2008-03-04
 */
require_once(APPPATH.'third_party/tcpdf/config/lang/eng.php');
require_once(APPPATH.'third_party/tcpdf/tcpdf.php');
class Tcpdf_gen {

	public function __construct() 
	{
		
		// create new PDF document
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		//set some language-dependent strings
		$pdf->setLanguageArray($l);
		
		
		// set font
		$pdf->SetFont('droidsansfallback', '', 9);
		
		$CI =& get_instance();
		$CI->tcpdf = $pdf;
	}
	
}
class MYPDF extends TCPDF {

	// Page footer
	public function Footer() {
		// Position from bottom
		$this->SetY(-110);
		// Set font
		$this->SetFont('droidsansfallback', 'I', 8);
		$this->writeHTML('<div style="width:100%;text-align:right;height:30px;padding-bottom:10px;">Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages().'</div>');
		$this->writeHTML('<br><br><table style="border:1px solid #000000;padding-left:20px;padding:5px;height:90px;">
							<tr>
								<td>
									重要事項 ：網上銀行提供的人民幣匯率只供參考之用，營業時間內提交的交易請求，在同一天進行處理，否則，將被處理的下一個工作日。網上銀行提供的人民幣匯率只供參考之用，營業時間內提交的
								</td>
							</tr>
							<tr>
								<td>
									交易請求，在同一天進行處理，否則，將被處理的下一個工作日。
								</td>
							</tr>
							<tr>
								<td>
									IMPORTANT NOTE : The RMB exchange rates provided in Business Internet banking are for indication only. Transaction request submitted within business hours will be processed on the same day, 
								</td>
							</tr>
							<tr>
								<td>
									 otherwise, it will be processed on the next working day. The RMB exchange rates provided in Business.
								</td>
							</tr>
						</table>');
						
		
	}
}
