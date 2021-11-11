<?php
	$servername = "localhost";
	$username = "root";
	$password = "m";
	$dbname = "asterisk";

	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	//$sql_find = "SELECT `lead_id`, `phone_number`, `status` FROM `vicidial_list` WHERE  `phone_number` = '$phone_number' AND  `status` = 'SVYHU' AND (`modify_date` BETWEEN '$start_date_time' AND '$end_date_time')";

	$sql = "SELECT `lead_id`, `phone_number`, `status` FROM `vicidial_list`";
	$result = $conn->query($sql);

	echo $total = $result->num_rows;

	echo "<br>";
	    
	$sql_success = "SELECT `lead_id`, `phone_number`, `status` FROM `vicidial_list` WHERE `status` = 'SVYHU' ";
	$result_success = $conn->query($sql_success);  

	echo $success = $result_success->num_rows; 

	$conn->close();
?>