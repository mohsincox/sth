<?php
	// function rangeMonth ($datestr) {
	//    date_default_timezone_set (date_default_timezone_get());
	//    $dt = strtotime ($datestr);
	//    return array (
	//      "start" => date ('Y-m-d', strtotime ('first day of this month', $dt)),
	//      "end" => date ('Y-m-d', strtotime ('last day of this month', $dt))
	//    );
	//  }

	//  // function rangeWeek ($datestr) {
	//  //   date_default_timezone_set (date_default_timezone_get());
	//  //   $dt = strtotime ($datestr);
	//  //   return array (
	//  //     "start" => date ('N', $dt) == 1 ? date ('Y-m-d', $dt) : date ('Y-m-d', strtotime ('last monday', $dt)),
	//  //     "end" => date('N', $dt) == 7 ? date ('Y-m-d', $dt) : date ('Y-m-d', strtotime ('next sunday', $dt))
	//  //   );
	//  // }

	//  print_r (rangeMonth('2011-4-5')); // format: YYYY-M-D
	//  // print_r (rangeWeek('2011-4-5'));


	
	echo $dt = strtotime ('2019-06');
	echo '<br>';
	echo date ('Y-m-d', strtotime ('first day of this month', $dt));
	echo '<br>';
	echo date ('Y-m-d', strtotime ('last day of this month', $dt));
	

	 // print_r (rangeMonth('2011-4-5'));