<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Agent Live</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container-fluid">
		<div class="col-sm-offset-0 col-sm-12">
		  	<!--<div class="panel panel-default">-->
<!--			    <div class="panel-heading text-center">
			    	<b>Agent Live</b>
			    </div>-->
			    <div  id="agent_live_activity"></div>
		  	<!--</div>-->	
	  	</div>				  
	</div>

	<script type="text/javascript">

		function activity2()
		{
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("agent_live_activity").innerHTML=xmlhttp.responseText;  
				}
			}
			xmlhttp.open("GET","agent-live-status.php",true);
			xmlhttp.send();
		}
	  
		function setTime() 
		{  
			var time = 4
			var myTimer=setInterval( function() 
			{
				time--;
				if (time === 0) {
					activity2();
					time = 4;
				}    
			}, 1000 );  
		}
	  
		function activity()
		{
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("agent_live_activity").innerHTML=xmlhttp.responseText;  
					setTime();
				}
			}
			xmlhttp.open("GET","agent-live-status.php",true);
			xmlhttp.send();
		}
	  
		window.onload = activity();
	</script>
	
</body>
</html>
