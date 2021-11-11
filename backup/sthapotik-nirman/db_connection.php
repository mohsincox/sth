<?php
	
	$conn = mysqli_connect("localhost", "root", "m", "sthapotik_nirman");
	//$connAsterisk = mysqli_connect("localhost", "intrade_apu", "Q04+o%?(!!f^", "asterisk");
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>