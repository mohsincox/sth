<?php
	// echo $before = strtotime(date('Y-m-d H:i:00'));
	// echo "<br>";
	// echo $now = strtotime(date('Y-m-d H:i:s'));
	// echo "<br>";
	// echo $diff = $now - $before;

	//$createdAt = strtotime(date('Y-m-d 13:45:00'));
	$createdAt = strtotime('2018-09-15 16:52:06');
	$now = strtotime(date('Y-m-d H:i:s'));
	echo $secDiff = $now - $createdAt;
	echo "<br>";
	echo $hourDiff = $secDiff / 3600;
	echo "<br>";

	if ($hourDiff >= 2 && $hourDiff < 3) {
		echo '2 hour';
	} else if ($hourDiff >= 1 && $hourDiff < 2) {
		echo '1 hour';
	} else if ($hourDiff >= 24 && $hourDiff < 25) {
		echo '24 hour';
	} else if ($hourDiff >= 48 && $hourDiff < 49) {
		echo '48 hour';
	}

	echo "<br>";
	$date = date('Y-m-d');
	echo $day_before = date( 'Y-m-d', strtotime( $date . ' -1 day' ) );
?>