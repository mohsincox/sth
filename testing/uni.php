<?php
    // echo md5(uniqid(mt_rand(), true).microtime(true));

	// echo(rand(10000000, 99999999));

	$existing_array = [];
	for($i = 1; $i <= 100000; $i++) {
		// echo($i .'='. rand(10, 99));

		// $t = rand(10000001, 10050000);
		// $t = rand(10050001, 10100000);

		// $t = rand(40900001, 41000000);


		// $t = rand(10000001, 10100000);
		// $t = rand(10100001, 10200000);
		// $t = rand(10200001, 10300000);
		// $t = rand(10300001, 10400000);
		// $t = rand(10400001, 10500000);
		// $t = rand(10500001, 10600000);
		// $t = rand(10600001, 10700000);
		// $t = rand(10700001, 10800000);
		// $t = rand(10800001, 10900000);
		// $t = rand(10900001, 11000000);

		// $t = rand(11000001, 11100000);
		// $t = rand(11100001, 11200000);
		// $t = rand(11200001, 11300000);
		// $t = rand(11300001, 11400000);
		// $t = rand(11400001, 11500000);
		// $t = rand(11500001, 11600000);
		// $t = rand(11600001, 11700000);
		// $t = rand(11700001, 11800000);
		// $t = rand(11800001, 11900000);
		$t = rand(11900001, 12000000);

		$new_array = array('b'.$t=>$t);

		$existing_array=array_merge($existing_array, $new_array);

		// echo "<br>";
	}



	// $existing_array = array('a'=>'b', 'b'=>'c');
	// $new_array = array('d'=>'e', 'f'=>'g', 'b'=>'Z');

	// $final_array=array_merge($existing_array, $new_array);


	// echo "<pre>";
 //   		print_r($existing_array);
	// echo "</pre>";

	foreach ($existing_array as $key => $value) {
		echo $value;
		echo "<br>";
	}
?>