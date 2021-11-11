<?php

$paymentDate = date('Y-m-d');
$paymentDate=date('Y-m-d', strtotime($paymentDate));
//echo $paymentDate; // echos today! 
$contractDateBegin = date('Y-m-d', strtotime("01/01/2001"));
$contractDateEnd = date('Y-m-d', strtotime("01/01/2012"));

if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)){
    echo "is between";
}else{
    echo "NO GO!";  
}