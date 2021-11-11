<?php
	
	$conn = mysqli_connect("localhost", "intrade_apu", "Q04+o%?(!!f^", "db_nestle_crm");
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>