<?php
	echo $actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo '<br>';
	echo $hostLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
	echo '<br>';
	//echo $ip = $_SERVER[HTTP_HOST];
	//$data = "123_String";    
	$ip = substr($hostLink, strpos($hostLink, "/") + 2);    
	echo $ip;
?>