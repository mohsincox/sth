<?php
  
  $connection = mysqli_connect("localhost", "root", "", "reactdb");

  // Query to run
  $query = mysqli_query($connection,
           "SELECT * FROM contacts ");

  // Create empty array to hold query results
  $someArray = [];

  // Loop through query and push results into $someArray;
  while ($row = mysqli_fetch_assoc($query)) {
    array_push($someArray, [
      'name'   => $row['name'],
      'email' => $row['email']
    ]);
  }

  // Convert the Array to a JSON String and echo it
  $someJSON = json_encode($someArray);
  echo $someJSON;
?>