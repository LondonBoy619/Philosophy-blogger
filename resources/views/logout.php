<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/query_functions.php');
	if(checkCookie('logged_in')){
		setCookie('logged_in', 'yes', time(3600));
	}
	header('location: index.php');

?>