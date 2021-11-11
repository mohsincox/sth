<?php
include('db_connection_asterisk.php');

session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is empty";
	}
	else {
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($connAsterisk, $username);
		$password = mysqli_real_escape_string($connAsterisk, $password);
		
		$sql = "select * from vicidial_users where pass='$password' AND user='$username'";
		$result = mysqli_query($connAsterisk, $sql);
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: home.php"); // Redirecting To Other Page
		} 
		else {
			$error = "Username or Password is invalid";
		}
		mysqli_close($connAsterisk); // Closing Connection
	}
}
?>