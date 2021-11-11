<?php

	$str = "1, 3, 5";
	$strToArr = explode(",",$str);
	$i = 12;
	
	$a1 = [$i];
	$a2 = $strToArr;
	print_r(array_merge($a1,$a2));
?>
