<?php
	$data = json_decode(file_get_contents('php://input'), TRUE);
	$username = $data['username'];
	$password = $data['password'];

	//var_dump($data);
	
	// if ($username == 'admin' && $password == 'admin') {
	// 	echo 1;
	// } else {
	// 	echo 0;
	// }

	$connAsterisk = mysqli_connect("localhost", "root", "m", "asterisk");
	
	if (!$connAsterisk) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($connAsterisk, $username);
	$password = mysqli_real_escape_string($connAsterisk, $password);
	
	$sql = "select * from vicidial_users where pass='$password' AND user='$username'";
	$result = mysqli_query($connAsterisk, $sql);
	$rows = mysqli_num_rows($result);
	if ($rows == 1) {
		echo 1;
	} 
	else {
		echo 0;
	}
	mysqli_close($connAsterisk); // Closing Connection
?>