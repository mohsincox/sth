<?php
    // $interval = date_diff(date_create(), date_create('2019-10-01'));
    $interval = date_diff(date_create(), date_create('0000-00-00'));
    $ticketAge = $interval->format("%yy, %mm, %dd");
    echo $ticketAge;
?>