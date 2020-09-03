<?php

class MY_Session extends CI_Session {

    function sess_update() {
		
        if (!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || ( stripos($_SERVER['REQUEST_URI'], 'sendmoney/hit') != 0 )) {
            parent::sess_update();
        }
    }

}