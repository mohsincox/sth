<?php
	echo '<pre>';
	print_r(gettimeofday());
	echo '</pre>';
	echo '<br>';
	echo date("Y-m-d H:i:s.u"); 
	echo '<br>';
	echo date('Y-m-d H:i:s.') . gettimeofday()['usec'];
	echo '<br>';
	echo date('Y-m-d H:i:s.') . gettimeofday()['usec'] / 1000;

	echo '<br>';
	echo date('Y-m-d H:i:s.') . (int)round(gettimeofday()['usec'] / 1000);
?>