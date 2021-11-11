<?php
$username = "root";
$password = "MLg@777";
$hostname = "localhost";
$connect = mysql_connect($hostname, $username, $password)
        or die("Unable to connect to MySQL");
$select = mysql_select_db("asterisk",$connect);

$date_time = date('Y-m-d h:i:s');

$result=mysql_query("INSERT INTO `vicidial_list` (`lead_id`,`entry_date`,`modify_date`,`status`,`user`,`vendor_lead_code`,`source_id`,`list_id`,`gmt_offset_now`,`called_since_last_reset`,`phone_code`,`phone_number`,`title`,`first_name`,`middle_initial`,`last_name`,`address1`,`address2`,`address3`,`city`,`state`,`province`,`postal_code`,`country_code`,`gender`,`date_of_birth`,`alt_phone`,`email`,`security_phrase`,`comments`,`called_count`,`last_local_call_time`,`rank`,`owner`,`entry_list_id`) VALUES('NULL','$date_time','0000-00-00 00:00:00','NEW','','','','1009','6.00','N','0','".$_GET['callerid']."','','misscall','','','','','','','','','','','','','','','','','0','2021-04-21 00:00:00','0','','0')");

mysql_close($connect);
?>
