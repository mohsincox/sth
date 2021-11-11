<!DOCTYPE html>
<html lang="en">
<head>
  <title>Unique Number</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
if(isset($_POST['submit'])) {

  $num=$_POST['num'];

  $num1 = $num;
  $num2 = $num + 99999; 

  $existing_array = [];
	for($i = 1; $i <= 100000; $i++) {
		
		$t = rand($num1, $num2);

		$new_array = array('b'.$t=>$t);

		$existing_array=array_merge($existing_array, $new_array);
	}

	foreach ($existing_array as $key => $value) {
		echo $value;
		echo "<br>";
	}



} else {

?> 

  <div class="container">
  <h2>Unique Number Generation</h2>
  <form action="unique-number.php" method="post">
    <div class="form-group">
      <label for="email">Number:</label>
      <input type="number" class="form-control" placeholder="Enter Number" name="num" required="">
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php
}
?>


</body>
</html>
