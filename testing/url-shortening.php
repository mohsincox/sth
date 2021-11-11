<?php
	$str = 'http://www.google.com';
	echo $val = intval($str, 36);
	echo "<br>";
	// Integer to Base 36:

	echo base_convert($val, 10, 36);
	echo "<br>";

	echo substr(md5('http://www.google.com'), 0, 8);
	echo "<br>";


	// echo BaseIntEncoder::encode('1122344523');//result:3IcjVE
	// echo "<br>";

	// echo BaseIntEncoder::decode('3IcjVE');//result:1122344523
	// echo "<br>";

	echo "<br>";

	$ids = range(1,10);
foreach($ids as $id) {
  echo PseudoCrypt::unhash($id) . "\n";
}