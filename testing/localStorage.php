<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
		var p1 = "success";
	</script>
</head>
<body>
	<h3>localStorage</h3>
	<p id="result"></p>

	<?php
		echo "<script>document.writeln(p1);</script>";

		// echo "<br>";

		// echo $_SERVER['PHP_SELF'];
	?>
	
	<script src="http://code.jquery.com/jquery.js"></script>

	<script type="text/javascript">
		window.localStorage.setItem("test-token", "Mohsin Iqbal");

		var showToken = window.localStorage.getItem("test-token");
		console.log(showToken);
		// localStorage.removeItem("test-token");


		// $("result").text(showToken);
		$(document).ready(function(){
		  	$("#result").text(showToken);
		});


		// var p1 = "success";		// not get

	</script>
</body>
</html>