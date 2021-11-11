<?php

/* API URL */
$url = 'http://202.51.177.67:8026/api/request-show';
   
/* Init cURL resource */
$ch = curl_init($url);
  
/* Array Parameter Data */
$data = ['name'=>'Hardik', 'email'=>'itsolutionstuff@gmail.com'];
  
/* pass encoded JSON string to the POST fields */
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  
/* set the content type json */
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'App-Key: 123456',
            'App-Secret: 1233'
        ));
  
/* set return type json */
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
/* execute request */
$result = curl_exec($ch);

print_r($result);
// echo $result;
  
/* close cURL resource */
curl_close($ch);