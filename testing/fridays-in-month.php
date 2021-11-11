<?php
	$workdays = array();
	$type = CAL_GREGORIAN;
	// $month = date('n'); // Month ID, 1 through to 12.
	$month = date('03'); // Month ID, 1 through to 12.
	$year = date('Y'); // Year in 4 digit 2009 format.
	$day_count = cal_days_in_month($type, $month, $year); // Get the amount of days

	//loop through all days
	for ($i = 1; $i <= $day_count; $i++) {

	        $date = $year.'/'.$month.'/'.$i; //format date
	        $get_name = date('l', strtotime($date)); //get week day
	        $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars

	        //if not a weekend add day to array
	        // if($day_name != 'Sun' && $day_name != 'Sat'){
	        if($day_name == 'Fri'){
	            $workdays[] = $i;
	        }

	}

	// look at items in the array uncomment the next line
	print_r($workdays);
	echo "<br>";
   	echo count($workdays);
	echo "<br>";
	echo sizeof($workdays);