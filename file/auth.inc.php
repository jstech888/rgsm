<?php
session_start();

function authenticate() {
    header('WWW-Authenticate: Basic realm="CHENTRON INC."');
    header('HTTP/1.0 401 Unauthorized');
    echo "You must enter a valid login ID and password to access this resource\n";
    exit;
}

if( isset( $_SESSION["USER"] ) )
{
	 if( $_SESSION['USER'] == "-1" )
	 {
		 UNSET($_SERVER['PHP_AUTH_USER']);
		 UNSET($_SERVER['PHP_AUTH_PW']);
		 UNSET($_SESSION['USER']);
		 authenticate();
	 }
}
else
{
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		authenticate();
		exit;
	} else {
		
		$isAllow = false;
		
		$arrUser = json_decode(file_get_contents("/userData/passwd.json"),true);	
		
		if (array_key_exists($_SERVER['PHP_AUTH_USER'], $arrUser)) {
			if( $arrUser[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW'] )
			{
				$_SESSION["USER"] = $_SERVER['PHP_AUTH_USER'];
				$isAllow = true;
			}
			else
			{
				authenticate();	
				exit;
			}
		}
		else
		{
			authenticate();	
			exit;
		}
	}
}
?>