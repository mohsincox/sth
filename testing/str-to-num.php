<?php

// $str = 'In My Cart : 11 12 items';
// echo preg_match_all('!\d+!', $str, $matches);
// print_r($matches);

echo "<br>";

// $str = 'In My Cart : +011 items 12';
$str = 'Elephent road - Mr. Obayed - 01945108734';
echo $int = filter_var($str, FILTER_SANITIZE_NUMBER_INT);