<?php
	$headers = array();
	$headers[] = "x-auth-token: $token";
	$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
	$state_ch = curl_init();
	    curl_setopt($state_ch, CURLOPT_URL,"url");
	    curl_setopt($state_ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($state_ch, CURLOPT_HTTPHEADER, $headers);
	    $state_result = curl_exec ($state_ch);
	    $state_result = json_decode($state_result); 
	    print_r($state_result);


// $curl = curl_init();
// $auth_data = array(
// 	'client_id' 		=> 'XBnKaywRCrj05mM-XXX-6DXuZ3FFkUgiw45',
// 	'client_secret' 	=> 'btHTWVNMUATHEnF-XXX-2nQabKcKVo3VXtU',
// 	'grant_type' 		=> 'client_credentials'
// );

// curl_setopt($curl, CURLOPT_POST, 1);
// curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
// curl_setopt($curl, CURLOPT_URL, 'http://localhost/laravel-test/request/completion/2');
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

// $result = curl_exec($curl);
// if(!$result){die("Connection Failure");}
// curl_close($curl);
// echo $result;