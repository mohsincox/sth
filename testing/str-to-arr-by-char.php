<?php
	echo $data = "SHEBAIN_20180910-152919_01751505725_sadeq";
	echo "<br>";
	$whatIWant = substr($data, strpos($data, "_") + 1);    
	echo $whatIWant;
	echo "<br>";
	$data2 = "SHEBAIN_20180910-152919_01751505725_sadeq";
	$arr = explode("_", $data2);
	print_r($arr);
	//echo $first = $arr[1];
?>