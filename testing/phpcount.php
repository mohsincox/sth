<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iglooticket";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $sql = "SELECT COUNT(id) FROM ig_promo_code";
$sql = "SELECT COUNT(id) FROM tickets";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }

$conn->close();
?>