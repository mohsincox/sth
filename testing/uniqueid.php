<!DOCTYPE html>
<html>
<body>

<?php
	for($i = 0; $i < 50000; $i++) {
		// echo uniqid();
		echo substr(uniqid(), -9);		// OK
		// echo substr(uniqid(), -8);			// 23 dup
		// echo substr(uniqid(), -7);			// dup
		// echo substr(uniqid(), -6);		// 83 dup
		// echo substr(uniqid(), -5);	// 9 duplicate
		echo "<br>";
	}
?>

</body>
</html>
