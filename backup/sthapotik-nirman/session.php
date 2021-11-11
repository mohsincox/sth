<?php
	include_once('db_connection.php');

	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$sql = "select username from users where username='$user_check'";
	$ses_sql=mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session =$row['username'];
	if(!isset($login_session)){
		mysqli_close($conn); // Closing Connection
		header('Location: /sthapotik-nirman/login.php'); // Redirecting To Home Page
	}
?>