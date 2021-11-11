<?php

	if (!isset($_GET['i'])) {
		echo "<h4>Parameter Missing</h4>";
		exit();
	}

	// echo $ticketID = base64_decode($_GET['i']);
	// echo $ticketID = $_GET['i'];
	// exit();

	$ticketID = base64_decode($_GET['i']);

	$api_url = 'http://223.27.93.37:8080/igloo-oms/api/get-ticket-information?ticketID=' . $ticketID;

	$client_id = 'IglooIceCream';
	$client_secret = 'myolbdamlbd';

	$context = stream_context_create(array(
	    'http' => array(
	        'header' => "Authorization: Basic " . base64_encode("$client_id:$client_secret"),
	    ),
	));

	$json = file_get_contents($api_url, false, $context);

	$obj = json_decode($json);
	// print_r($obj);
	// exit();
	// echo $obj->customerNumber;

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
	    			<?php
	    			if (isset($obj->price)) {
	    			?>
	    			<div class="table-responsive">          
                        <table class="table table-sm">
                            <tbody>
                                <!-- <tr>
                                    <td><b>Order ID</b></td>
                                    <td><?php echo $obj->ticketID; ?></td>
                                </tr> -->
                                <tr>
                                    <td><b>Name</b></td>
                                    <td><?php echo $obj->customerName; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Phone Number</b></td>
                                    <td><?php echo $obj->customerNumber; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Address</b></td>
                                    <td><?php echo $obj->customerAddress; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Product</b></td>
                                    <td><?php echo $obj->product; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Total Price</b></td>
                                    <td><b>৳ <?php echo $obj->price; ?></b> Taka</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                    	<form method="POST" action="sslpayment.php">
                    		<input type="hidden" name="ticketID" value="<?php echo $obj->ticketID; ?>">
  							<input type="hidden" name="customerName" value="<?php echo $obj->customerName; ?>">
  							<input type="hidden" name="customerNumber" value="<?php echo $obj->customerNumber; ?>">
  							<input type="hidden" name="customerAddress" value="<?php echo $obj->customerAddress; ?>">
  							<input type="hidden" name="product" value="<?php echo $obj->product; ?>">
  							<input type="hidden" name="price" value="<?php echo $obj->price; ?>">
  							<button type="submit" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pay Now &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
						</form>
                    </div>
                    <?php
	    			} else {
	    				// echo "<h2>JSON Data parsing error!</h2>";
	    				echo "<h4 class='text-center'>Error: Wrong URL!</h4>";
	    			}
	    			?>
	    		</div> 
	    		<!-- <div class="card-footer">IGLOO</div> -->
	  		</div>
		</div>
	</div>
</div>

</body>
</html>