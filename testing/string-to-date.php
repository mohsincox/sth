<?php
	//$time = strtotime('10/16/2003');
	$time = strtotime('01-Jan-19');

	$newformat = date('Y-m-d',$time);

	echo $newformat;
?>