<?php 
/**
* rollback the transaction when timeout occured
*
* 
* @param 	DB connection
* @return	void
*/
function _timeout_handler(& $conn)
{
	$conn->trans_rollback();
}