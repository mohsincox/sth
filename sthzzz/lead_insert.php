<?php     
$username = "root";
	$password = "Myol@2828";
	$hostname = "localhost";	
	$connect = mysql_connect($hostname, $username, $password);
	$select = mysql_select_db("asterisk",$connect);
	
	$results=mysql_query("INSERT INTO `asterisk`.`vicidial_list` (`lead_id`, `entry_date`, `modify_date`, `status`, `user`, `vendor_lead_code`, `source_id`, `list_id`, `gmt_offset_now`, `called_since_last_reset`, `phone_code`, `phone_number`, `title`, `first_name`, `middle_initial`, `last_name`, `address1`, `address2`, `address3`, `city`, `state`, `province`, `postal_code`, `country_code`, `gender`, `date_of_birth`, `alt_phone`, `email`, `security_phrase`, `comments`, `called_count`, `last_local_call_time`, `rank`, `owner`, `entry_list_id`) VALUES (NULL, '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."', 'NEW', '', '', '', '1001', '6.00', 'N', '0', '".$_GET['callerid']."', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '0', '', '0')");

?>