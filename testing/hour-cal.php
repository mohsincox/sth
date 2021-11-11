<?php

$from       = '9:30';
$to         = '18:00';

echo $fromDay      = strtotime('00:00');
echo "<br>";
echo $officeStart      = strtotime('9:30');
echo "<br>";

echo $officeCheck = $officeStart - $fromDay;
echo "<br>";

echo $total      = strtotime($to) - strtotime($from);
$hours      = floor($total / 60 / 60);
$minutes    = round(($total - ($hours * 60 * 60)) / 60);

echo "<br>";
echo $hours.'.'.$minutes;
echo "<br>";


$time = '9:30:00';
$time = explode(':', $time);
echo $a = ($time[0]*60) + ($time[1]) + ($time[2]/60);
var_dump($a);


/*
$from2       = '9:30:00';
$to2         = '18:00:00';


$login = '10:00:00';

echo $late      = strtotime($login) - strtotime($from2);

echo "<br>";

echo gmdate('H:i:s', $late);
*/