<?php
$servername = "192.168.100.12";
$username = "myol";
$password = "mM0011@1212";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>