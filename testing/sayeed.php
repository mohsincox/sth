<?php

// header("Content-Type:application/json");
// $seceretKey = '32Xhsdf7asd';
// $headers = apache_request_headers();
//     if(isset($headers['Authorization'])){
//         $api_key = $headers['Authorization'];
//         if($api_key != $seceretKey) 
//         {
//             //403,'Authorization faild'; your logic
//             exit;
//         }
//     }



$name = 'Book name';
//Server url
$url = "http://localhost/php-rest/book/$name";
$apiKey = '32Xhsdf7asd5'; // should match with Server key
$headers = array(
     'Authorization: '.$apiKey
);
// Send request to Server
$ch = curl_init($url);
// To save response in a variable from server, set headers;
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// Get response
$response = curl_exec($ch);
// Decode
$result = json_decode($response);