<?php 

	if( !function_exists("checkemail") )
	{
		function checkEMail($bail) 
		{ 
			if(eregi("^[a-za-z0-9_]+@[a-za-z0-9\-]+\.[a-za-z0-9\-\.]+$]", $bail))
			{
				return -1;
			}
			list($username, $domain) = split("@",$bail);
			if(getmxrr($domain, $mxhost)) 
			{
				return 1;
			}
			else 
			{
				if(@fsockopen($domain, 465, $errno, $errstr, 30)) 
				{
					return 1; 
				}
				else 
				{
					return -2; 
				}
			}
		}
	}
	
	if( !function_exists("sendMailBySystemMail") )
	{
		function sendMailBySystemMail( $sMailTo = false, $sMailFrom = false, $sSubject = false, $sMessage = false )
		{
			if( $sMailTo != false && $sMailFrom != false && $sSubject != false && $sMessage != false )
			{
				//@ 為了傳送 HTML 格式的 email, 我們需要設定 MIME 版本和 Content-type header 內容.
				$sHeaders = "MIME-Version: 1.0\r\n" .
							"Content-type: text/html; charset=utf-8\r\n" .
							"From: $sMailFrom\r\n";
				//@ 傳送 email
				return mail($sMailTo, $sSubject, $sMessage, $sHeaders);
			}
			else
			{
				return false;
			}

			/* attachment mail test done 
			//system info read from database
			$system_mail = "david@chentron.com";
			//From Setting
			$base_sender = array(
				"Username" 	=> "devicten97@gmail.com",
				"Password" 	=> "x456z123",
				"From" 		=> "Celena-System@celena.com",
				"FromName" 	=> "Celena System Mail ",
				"Subject" 	=> $sSubject,
				"Body"		=> $sMessage
			);
			
			$base_mailto = array( 
				"mail" => "devicten97@gmail.com",
				"name" => "david"
			);
				
			// 代表收件者資訊的陣列   (信箱, 姓名, 代碼)
			($sMailTo==false)?$sMailTo = $base_mailto:'';

			include_once(dirname(__FILE__)."/PHPMailer/class.phpmailer.php");
			$mail = new PHPMailer();                        // 建立新物件        

			$mail->IsSMTP();                                // 設定使用SMTP方式寄信        
			$mail->SMTPAuth = false;                         // 設定SMTP需要驗證

			//$mail->SMTPSecure = "ssl";                      // Gmail的SMTP主機需要使用SSL連線   
			$mail->Host = "localhost";
			//$mail->Host = "";                 // Gmail的SMTP主機        
			//$mail->Port = 465;                              // Gmail的SMTP主機的port為465      
			$mail->CharSet = "utf-8";                       // 設定郵件編碼   
			$mail->Encoding = "base64";
			$mail->WordWrap = 50;                           // 每50個字元自動斷行
				  
			//$mail->Username = $sender['Username'];    		// 設定驗證帳號        
			//$mail->Password = $sender['Password'];          // 設定驗證密碼        
				  
			$mail->From 	= "tigrachen@chentron.com" ;    		// 設定寄件者信箱        
			$mail->FromName = "chentron";          // 設定寄件者姓名        
				  
			$mail->Subject 	= $sSubject;         	// 設定郵件標題    
			$mail->AddAttachment("/www/MedicalBeauty/ckfinder/userfiles/files/Logo/logo.png") ;     
			  
			$mail->IsHTML(true);                            // 設定郵件內容為HTML        

			$mail->AddAddress($sMailTo);  // 收件者郵件及名稱 
			$mail->Body = $sMessage  ;
			if($mail->Send()) {                             // 郵件寄出
				return "success";
			} else {
				return $mail->ErrorInfo;
			}*/
		}
	}
	
	if( !function_exists("sendMailByGMail") )
	{
		function sendMailByGMail( $content="", $mailto = false, $sender = false, $subject = "Celena Order Check Mail!" )
		{
			//system info read from database
			$system_mail = "david@chentron.com";
			//From Setting
			$base_sender = array(
				"Username" 	=> "devicten97@gmail.com",
				"Password" 	=> "x456z123",
				"From" 		=> "Celena-System@celena.com",
				"FromName" 	=> "Celena System Mail ",
				"Subject" 	=> $subject,
				"Body"		=> $content
			);
			
			$base_mailto = array( 
				"mail" => "devicten97@gmail.com",
				"name" => "david"
			);
				
			// 代表收件者資訊的陣列   (信箱, 姓名, 代碼)
			($mailto==false)?$mailto = $base_mailto:'';
			
			($sender==false)?$sender = $base_sender:'';	
			
			$sender = array_replace_recursive($base_sender, $sender);

			
			
			include_once(dirname(__FILE__)."/PHPMailer/class.phpmailer.php");
			$mail = new PHPMailer();                        // 建立新物件        

			$mail->IsSMTP();                                // 設定使用SMTP方式寄信        
			$mail->SMTPAuth = true;                         // 設定SMTP需要驗證

			$mail->SMTPSecure = "ssl";                      // Gmail的SMTP主機需要使用SSL連線   
			$mail->Host = "smtp.gmail.com";                 // Gmail的SMTP主機        
			$mail->Port = 465;                              // Gmail的SMTP主機的port為465      
			$mail->CharSet = "utf-8";                       // 設定郵件編碼   
			$mail->Encoding = "base64";
			$mail->WordWrap = 50;                           // 每50個字元自動斷行
				  
			$mail->Username = $sender['Username'];    		// 設定驗證帳號        
			$mail->Password = $sender['Password'];          // 設定驗證密碼        
				  
			$mail->From 	= $sender['From'];      		// 設定寄件者信箱        
			$mail->FromName = $sender['FromName'];          // 設定寄件者姓名        
				  
			$mail->Subject 	= $sender['Subject'];         	// 設定郵件標題        
			  
			$mail->IsHTML(true);                            // 設定郵件內容為HTML        

			$mail->AddAddress($mailto['mail'], $mailto['name']);  // 收件者郵件及名稱 
			$mail->Body = $sender['Body'];
			if($mail->Send()) {                             // 郵件寄出
				return "success";
			} else {
				return $mail->ErrorInfo;
			}
		}
	}

?>