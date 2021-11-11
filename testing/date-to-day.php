<?php
	// $date = '15-12-2016';
	$date = date("Y-m-d");
	// $date = '2016-12-15';
	$nameOfDay = date('D', strtotime($date));
	echo $nameOfDay;
?>