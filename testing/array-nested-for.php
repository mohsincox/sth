<!DOCTYPE html>
<html>
<body>

<?php
    $cars = array
        (
            array("01719307656","Test SMS 1","123456789"),
            array("01873051953","Test SMS 2","123456789")
        );

    $arr_count = count($cars);
    $str = "";
    for ($row=0; $row < $arr_count; $row++) { 
        
        $nested_arr_count = count($cars[$row]);
        
        for ($col = 0; $col < $nested_arr_count; $col++)
        {
            if ($col == 1) {
                $str = $str. "sms[".$row."][".$col."]=". urlencode($cars[$row][$col])."&";
            } else {
                $str = $str. "sms[".$row."][".$col."]=". $cars[$row][$col]."&";
            }
            
        }

    }
    echo $str;

    $user = "Mediacomltd";
    $pass = "16?4T02h";
    $sid = "BHALOBASHARBD";

    // $url="http://sms.sslwireless.com/pushapi/dynamic/server.php";
    // $param="user=$user&pass=$pass&".$str."sid=$sid";
    // $crl = curl_init();
    // curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE);
    // curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2);
    // curl_setopt($crl,CURLOPT_URL,$url);
    // curl_setopt($crl,CURLOPT_HEADER,0);
    // curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
    // curl_setopt($crl,CURLOPT_POST,1);
    // curl_setopt($crl,CURLOPT_POSTFIELDS,$param);
    // $response = curl_exec($crl);
    // curl_close($crl);
    // echo $response;
?>

</body>
</html>