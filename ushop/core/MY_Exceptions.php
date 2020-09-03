<?php
class MY_Exceptions extends CI_Exceptions {

    public function show_404()
    {
		header("HTTP/1.1 302 Found");
		header("Location: /my404");
        exit;
    }
}
?>