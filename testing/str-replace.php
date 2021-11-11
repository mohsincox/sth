<?php

	// $subject = 'REGISTER 11223344 here' ;
	// $search = '11223344' ;
	$subject = 'V7081206040000000011' ;
	$search = 'V70812060400000000' ;
	$trimmed = str_replace($search, '', $subject) ;
	echo $trimmed ;

	echo "<br>";

	// echo strlen("Thank you for placing order. Your Order ID is 1000, please call 16556 for further query or support. Igloo Ice Cream Team");
	echo strlen("Your order has been delivered. Enjoy Igloo Ice Cream. To know about recent promotional offers, please call 16556. Thank you.");