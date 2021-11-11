<?php
	if(isset($_GET['phone_number'])) {
		$phone_number = $_GET['phone_number'];
		$phone_number = substr($phone_number, -10);
		//exit();
	} else {
		$phone_number = "Phone Number Not Valid";
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

	$sql_find_blacklist = "SELECT `id`, `phone_number` FROM `blacklists` WHERE  `phone_number` = '$phone_number' AND (`entry_date` BETWEEN '$start_date_time' AND '$end_date_time')";
	$result_blacklist = $conn->query($sql_find_blacklist);
	if ($result_blacklist->num_rows >= 1) {

		$sql_insert_blacklist = "INSERT INTO `blacklists` (`phone_number`) VALUES('$phone_number')";

		if ($conn->query($sql_insert_blacklist) === TRUE) {
		    //echo "blacklist created successfully";
		} else {
		    echo "Error: " . $sql_insert_blacklist . "<br>" . $conn->error;
		}

		$no_with_zero_blacklist = '0'.$phone_number;
	    $sms_body_blacklist = "SMS Testing.";

	    $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://sms.sslwireless.com/pushapi/dynamic/server.php?user=Mediacomltd&pass=16?4T02h&sid=BHALOBASHARBD&sms=".urlencode($sms_body_blacklist)."&msisdn=".$no_with_zero_blacklist."&csmsid=123456789");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);


	} else {
		$sql_insert_blacklist = "INSERT INTO `blacklists` (`phone_number`) VALUES('$phone_number')";

		if ($conn->query($sql_insert_blacklist) === TRUE) {
		    //echo "blacklist created successfully";
		} else {
		    echo "Error: " . $sql_insert_blacklist . "<br>" . $conn->error;
		}

		$sql_find = "SELECT `lead_id`, `phone_number`, `status` FROM `vicidial_list` WHERE  `phone_number` = '$phone_number' AND  `status` = 'SVYHU' AND (`modify_date` BETWEEN '$start_date_time' AND '$end_date_time')";
		$result = $conn->query($sql_find);

		if ($result->num_rows > 0) {

		    $no_with_zero = '0'.$phone_number;
		    $sms_body = "Your misscall already received.";

		    $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://sms.sslwireless.com/pushapi/dynamic/server.php?user=Mediacomltd&pass=16?4T02h&sid=BHALOBASHARBD&sms=".urlencode($sms_body)."&msisdn=".$no_with_zero."&csmsid=123456789");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_exec($ch);
			curl_close($ch);
		} else {
		    
		    $sql_insert = "INSERT INTO `vicidial_list` (`lead_id`,`entry_date`,`modify_date`,`status`,`user`,`vendor_lead_code`,`source_id`,`list_id`,`gmt_offset_now`,`called_since_last_reset`,`phone_code`,`phone_number`,`title`,`first_name`,`middle_initial`,`last_name`,`address1`,`address2`,`address3`,`city`,`state`,`province`,`postal_code`,`country_code`,`gender`,`date_of_birth`,`alt_phone`,`email`,`security_phrase`,`comments`,`called_count`,`last_local_call_time`,`rank`,`owner`,`entry_list_id`) VALUES('NULL','$date_time','0000-00-00 00:00:00','NEW','','','','1001','6.00','N','0','$phone_number','','misscall','','','','','','','','','','','','','','','','','0','2018-10-23 00:00:00','0','','0')";

			if ($conn->query($sql_insert) === TRUE) {
			    //echo "New record created successfully";
			} else {
			    echo "Error: " . $sql_insert . "<br>" . $conn->error;
			}
		}

	}

	$conn->close();
?>
