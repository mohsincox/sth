<!DOCTYPE html>
<html>
<body>

<?php

    $servername = "localhost";
    $username = "root";
    $password = "m";
    $dbname = "asterisk";

   
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $start_date_time = date('2018-10-28 00:00:00');
    $end_date_time = date('Y-m-d 23:59:59');
    
    $sql = "SELECT `lead_id`, `phone_number`, `status` FROM `vicidial_list` WHERE  `status` = 'SVYHU' AND (`modify_date` BETWEEN '$start_date_time' AND '$end_date_time')";
    $result = $conn->query($sql);
    //echo $result->num_rows;
    $arr1 = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["lead_id"]. " - Name: " . $row["phone_number"]. " " . $row["status"]. "<br>";
            $phone_number = "0".$row["phone_number"];

            $BanglaText = "সোনার বাংলা";

             $unicodeBanglaTextForSms = strtoupper(bin2hex(iconv('UTF-8', 'UCS-2BE', $BanglaText))); 

            $arr1[] = [
                $phone_number,
                $unicodeBanglaTextForSms,
                "123456789"
            ];
        }

        $conn->close();

        $arr_count = count($arr1);
        $str = "";
        for ($row=0; $row < $arr_count; $row++) { 
            
            $nested_arr_count = count($arr1[$row]);
            
            for ($col = 0; $col < $nested_arr_count; $col++)
            {
                if ($col == 1) {
                    $str = $str. "sms[".$row."][".$col."]=". urlencode($arr1[$row][$col])."&";
                } else {
                    $str = $str. "sms[".$row."][".$col."]=". $arr1[$row][$col]."&";
                }
                
            }

        }
        echo $str;

        // $user = "Mediacomltd";
        // $pass = "16?4T02h";
        // $sid = "BhalobasharBDBng";

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

    } else {
        echo "0 results";
    }
    
    //echo '<pre>',print_r($arr1,1),'</pre>';
    
    

    
?>

</body>
</html>