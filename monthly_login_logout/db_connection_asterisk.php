<?php
	$servername = "localhost";
	$username = "intrade_apu";
	$password = "Q04+o%?(!!f^";
	$dbname = "asterisk";

	// Create connection
	$connAsterisk = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$connAsterisk) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>