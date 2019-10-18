<?php
if (strlen($_SERVER['REQUEST_URI']) > 255 || strpos($_SERVER['REQUEST_URI'], "eval") || (strpos($_SERVER['REQUEST_URI'], "CONCAT") > 0) || (strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") > 0 || (strpos($_SERVER['REQUEST_URI'], "base64") > 0))) 
{
        header("HTTP/1.1 414 Request-URI Too Long");
	header("Status: 414 Request-URI Too Long");
	header("Connection: Close");
	exit;
    }
$id = htmlentities($id, ENT_QUOTES);
?>