<?php  
  $jsonData = array(
    "comments" => "Fresh food",
    "container" => false,
    "cookedTime" => 2,
    "description" => "biryani",
    "refridgeration" => true,
    "serves" => 2,
    "veg" => true
);

json_encode($jsonData);
//header("Location:Post.php?json=$jsonData");
header("Location: json-test2.php?json=" . urlencode( json_encode($jsonData)) );
?>