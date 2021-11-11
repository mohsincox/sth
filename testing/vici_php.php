<html>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script>
	var auto_refresh = setInterval(
		function()
		{
			console.log("mohsin");
		  	$('#loaddiv').load('str-first-char.php');
		}, 1000);
</script>

<body>
	<div id="loaddiv">
	</div>
</body>

</html>