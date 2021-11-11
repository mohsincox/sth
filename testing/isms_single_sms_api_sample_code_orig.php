<?php

const API_TOKEN = "<API_TOKEN>"; //put ssl provided api_token here
const SID = "<SID>"; // put ssl provided sid here
const DOMAIN = "<API_DOMAIN>"; //api domain // example http://smsplus.sslwireless.com

//Example:
//const API_TOKEN = "e97a0e5c-e058-4527-914a-e7aac4508ec6"; //put ssl provided api_token here
//const SID = "TESTSID"; // put ssl provided sid here
//const DOMAIN = "https://smsplus.sslwireless.com"; //api domain

/**
 * ===================================================================================================
 *  Send Single SMS
 * ===================================================================================================
 *
 * csms_id must be unique in same day
 */

$msisdn = "019XXXXXXXX";
$messageBody = "Message Body";
$csmsId = "2934fe343"; // csms id must be unique


echo singleSms($msisdn, $messageBody, $csmsId);




/**
 * @param $msisdn
 * @param $messageBody
 * @param $csmsId (Unique)
 */
function singleSms($msisdn, $messageBody, $csmsId)
{
    $params = [
        "api_token" => API_TOKEN,
        "sid" => SID,
        "msisdn" => $msisdn,
        "sms" => $messageBody,
        "csms_id" => $csmsId
    ];
    $url = trim(DOMAIN, '/')."/api/v3/send-sms";
    $params = json_encode($params);

    echo callApi($url, $params);
}


function callApi($url, $params)
{
    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($params),
        'accept:application/json'
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    return $response;
}

