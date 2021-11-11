<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="agent_live_activity"></div>


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
		xmlhttp.open("GET","agent_live_status.php",true);
		xmlhttp.send();
	}
  
	function setTime() 
	{  
		var time = 3
		var myTimer=setInterval( function() 
		{
			time--;
			if (time === 0) {
				activity2();
				time = 3;
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
		xmlhttp.open("GET","agent_live_status.php",true);
		xmlhttp.send();
	}
  
	window.onload = activity();
</script>
</body>
</html>