<?php
// create a new cURL resource

/*
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "https://www.rupeebiz.com/apiservice.asmx/Recharge?apiToken=f6cdec2deec043b8bd2def31fbbde2a6&mn=919940435278&op=1&amt=10&reqid=65S4F6S4DF&field1=&field2=");
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
//curl_exec($ch);
//var_dump(curl_exec($ch)) ;
// close cURL resource, and free up system resources

//$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//var_dump(curl_exec($ch));

$response = curl_exec($ch);

$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);


curl_close($ch);

//echo 'HTTP code: ' . $httpcode;

var_dump($body);

if ($body == false) {
	echo "success";
} else {
	echo "not";
}

*/


//$str = file_get_contents("https://www.rupeebiz.com/apiservice.asmx/Recharge?apiToken=f6cdec2deec043b8bd2def31fbbde2a6&mn=919940435278&op=1&amt=10&reqid=65S4F6S4DF&field1=&field2=");
//echo $str;
$str = " 65S4F6S4DF FAILED Insufficient minimum balance. 7.6600 919940435278 1016 10 ";
$strrev = strrev($str);
echo $strrev;
$arr = explode(" ",$strrev);
print_r($arr);
echo $arr[2];
//var_dump($arr[8]);

// if ($arr[8] == '1000') {
// 	echo 'success';
// } else {
// 	echo 'not';
// }
?>