<?php 
  define('ADMIN_LOGIN','admin1'); 
  define('ADMIN_PASSWORD','password1'); // Could be hashed too.
  
  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) 
      || ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN) 
      || ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) { 
    header('HTTP/1.1 401 Unauthorized'); 
    header('WWW-Authenticate: Basic realm="Password For Blog"'); 
    exit("Access Denied: Username and password required."); 
  } else {
  	echo 'Hamba';
  }
?>