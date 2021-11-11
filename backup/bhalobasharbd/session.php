<?php
	include_once('db_connection_asterisk.php');

	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$sql = "select user from vicidial_users where user='$user_check'";
	$ses_sql=mysqli_query($connAsterisk, $sql);
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session =$row['user'];
	if(!isset($login_session)){
		mysqli_close($connAsterisk); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
?>