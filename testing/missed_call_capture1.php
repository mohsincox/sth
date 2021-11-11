<?php
	if(isset($_GET['phone_number'])) {
		$phone_number = $_GET['phone_number'];
		$phone_number = substr($phone_number, -10);
	} else {
		$phone_number = "Phone Number Not Valid";
		echo 'No Phone Number';
		exit();
	}

	$servername = "localhost";
	$username = "root";
	$password = "m";
	$dbname = "asterisk";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$date_time = date('Y-m-d H:i:s');
	$start_date_time = date('Y-m-d 00:00:00');
	$end_date_time = date('Y-m-d 23:59:59');

	$sql_find = "SELECT `lead_id`, `phone_number`, `status` FROM `vicidial_list` WHERE  `phone_number` = '$phone_number' AND  `list_id` = 2005 AND (`status` = 'NEW' OR `status` = 'SVYHU' ) AND (`entry_date` BETWEEN '$start_date_time' AND '$end_date_time')";
	$result = $conn->query($sql_find);
	//echo $result->num_rows;

	if ($result->num_rows < 1) {

		$sql_insert = "INSERT INTO `vicidial_list` (`lead_id`,`entry_date`,`modify_date`,`status`,`user`,`vendor_lead_code`,`source_id`,`list_id`,`gmt_offset_now`,`called_since_last_reset`,`phone_code`,`phone_number`,`title`,`first_name`,`middle_initial`,`last_name`,`address1`,`address2`,`address3`,`city`,`state`,`province`,`postal_code`,`country_code`,`gender`,`date_of_birth`,`alt_phone`,`email`,`security_phrase`,`comments`,`called_count`,`last_local_call_time`,`rank`,`owner`,`entry_list_id`) VALUES('NULL','$date_time','0000-00-00 00:00:00','NEW','','','','2005','6.00','N','0','$phone_number','','misscall','','','','','','','','','','','','','','','','','0','2018-11-01 00:00:00','0','','0')";

		if ($conn->query($sql_insert) === TRUE) {
		    echo "New record created successfully";
		} else {
		    //echo "Error: " . $sql_insert . "<br>" . $conn->error;
		}

	} else {
	    
	    $sql_insert = "INSERT INTO `vicidial_list` (`lead_id`,`entry_date`,`modify_date`,`status`,`user`,`vendor_lead_code`,`source_id`,`list_id`,`gmt_offset_now`,`called_since_last_reset`,`phone_code`,`phone_number`,`title`,`first_name`,`middle_initial`,`last_name`,`address1`,`address2`,`address3`,`city`,`state`,`province`,`postal_code`,`country_code`,`gender`,`date_of_birth`,`alt_phone`,`email`,`security_phrase`,`comments`,`called_count`,`last_local_call_time`,`rank`,`owner`,`entry_list_id`) VALUES('NULL','$date_time','0000-00-00 00:00:00','DUPN','','','','2005','6.00','N','0','$phone_number','','misscall','','','','','','','','','','','','','','','','','0','2018-11-01 00:00:00','0','','0')";

		if ($conn->query($sql_insert) === TRUE) {
		    //echo "Duplicate record created successfully";
		} else {
		    echo "Error: " . $sql_insert . "<br>" . $conn->error;
		}
	    
	}

	

	$conn->close();
?>
