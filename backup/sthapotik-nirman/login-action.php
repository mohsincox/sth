<?php
include('db_connection.php');

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
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
		
		$sql = "select * from users where password='$password' AND username='$username'";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: home.php"); // Redirecting To Other Page
		} 
		else {
			$error = "Username or Password is invalid";
		}
		mysqli_close($conn); // Closing Connection
	}
}
?>