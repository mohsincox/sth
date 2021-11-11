<?php
$servername = "192.168.100.26";
$username = "intrade_apu";
$password = "Q04+o%?(!!f^";
// $dbname = "nestle_profile";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "myDB";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
?>