<?php
$ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, 'http://localhost/testing/insert.php');
curl_setopt($ch, CURLOPT_URL, 'http://horizonnetwork.powersms.net.bd/sendsms?userId=myol&password=myol123&smsText=Testonly&commaSeperatedReceiverNumbers=01758214966');
curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);

curl_exec($ch);
curl_close($ch);
?>