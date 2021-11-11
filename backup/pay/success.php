<?php
	$ticketID = base64_decode($_GET['i']);
	//echo $ticketID;
	//echo $str = 'http://202.51.177.67:8034/iglooticket/payment-response?ticketID='.$ticketID;
	file_get_contents('http://202.51.177.67:8034/iglooticket/payment-response?ticketID='.$ticketID);
	/*
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://202.51.177.67:8034/iglooticket/payment-response?ticketID='.$ticketID);
	curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
	curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1);
	curl_exec($ch);
	curl_close($ch);
	*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>IGLOO</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body> 
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-8 offset-md-2">
	  		<div class="card border-primary">
	    		<div class="card-header" style="padding: 0px 1.25rem;"><img src="AML-Igloo-Logo.jpeg" width="300" height="50"><p class="float-right pt-3"><b>Customer Payment Information</b></p></div>
	    		<div class="card-body">
	    			<h4 class='text-center'>Payment Successful!</h4>
	    		</div> 
	  		</div>
		</div>
	</div>
</div>
</body>
</html>

