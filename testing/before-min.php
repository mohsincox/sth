<?php
	echo $before10 = strtotime("-10 minutes");
	echo "<br>";
	echo $now_time = strtotime("now");
	echo "<br>";
	echo $now10min = date("Y-m-d H:i:s", strtotime("-10 minutes"));
	echo "<br>";
	echo $now = date("Y-m-d H:i:s", strtotime("now"));
	echo "<br>";
	echo $date5sec_before = date("Y-m-d H:i:s", time() - 5);
	echo "<br>";
	echo $now_date = date("Y-m-d H:i:s");
	echo "<br>";
	echo $sec5before = time() - 5;
	echo "<br>";
	echo $sec_now = time();
	echo "<br>";
	$before1hour = date('Y-m-d H:i:s', strtotime('-1 hour'));
	echo $before1day = date('Y-m-d H:i:s', strtotime('-1 day'));
	echo "<br>";
	echo $start_date_time = date("Y-m-d H:i:s", strtotime("-1 minutes"));
	echo "<br>";
	echo $start_date_time = date("Y-m-d H:i:s", strtotime("-1 minute"));
?>