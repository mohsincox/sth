<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transcom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <?php	
 	//$phone_number = $_GET['phone_number']; 	
 ?>
<div class="container">
  	<div class="panel panel-primary">
    	<div class="panel-heading text-center" style="padding: 2px 15px;">Get Information by Mobile Number</div>
	    <div class="panel-body">
			<form class="form-horizontal" method="post">
				<div class="form-group top-14px">
			      	<label class="control-label col-sm-6" for="">Mobile Number:</label>
		      		<div class="col-sm-6 input-group input-group-sm">
			        	<input type="text" class="form-control" id="" placeholder="Enter Mobile Number" name="mobileNo" autocomplete="off" required="">
			      	</div>
			    </div>
			    <div class="form-group">        
			      	<div class="col-sm-offset-0 col-sm-12">
			        	<button type="submit" name="submit" class="btn btn-primary btn-xs btn-block">Submit</button>
			      	</div>
			    </div>
			</form>
			<div>
				<?php
					if(isset($_POST['submit'])) {
						$mobileNo = $_POST['mobileNo'];
						//$mobileNo = 01676260176;
						//$mobileNo = 01713041240;
						//$mobileNo = 01730340633;
						//$api_url = 'http://27.147.132.90/e.api/api/consumer-details/get-consumer-details?mobileNo=01730340633';
						//$api_url = 'http://27.147.132.90/e.api/api/consumer-details/get-consumer-details?mobileNo=' . $mobileNo;
						

						$api_url = 'http://202.53.171.126/e.API/api/consumer-details/get-consumer-details?mobileNo=' . $mobileNo;

						$client_id = 'MyOutsourcingLimited';
						$client_secret = 'TxL=y9K';

						$context = stream_context_create(array(
						    'http' => array(
						        'header' => "Authorization: Basic " . base64_encode("$client_id:$client_secret"),
						    ),
						));

						$json = file_get_contents($api_url, false, $context);

						$obj = json_decode($json);

						// if($obj->Success == false)
						// {
						// 	return "Internal server error. Please try again.";
						// }
				?>
						<h4>Consumer Information</h4>
						<table class="table table-bordered table-condensed table-striped table-hover">
							<tbody>
							    <tr>
							        <td>ConsumerId</td>
							        <td><b><?php echo $obj->ConsumerInfo->ConsumerId; ?></b></td>
							        <td>ConsumerCode</td>
							        <td><b><?php echo $obj->ConsumerInfo->ConsumerCode; ?></b></td>
							        <td>ConsumerName</td>
							        <td><b><?php echo $obj->ConsumerInfo->ConsumerName; ?></b></td>
							    </tr>
							    <tr>
							        <td>Address</td>
							        <td><b><?php echo $obj->ConsumerInfo->Address; ?></b></td>
							        <td>MobileNo</td>
							        <td><b><?php echo $obj->ConsumerInfo->MobileNo; ?></b></td>
							        <td>PhoneNo</td>
							        <td><b><?php echo $obj->ConsumerInfo->PhoneNo; ?></b></td>
							    </tr>
							    <tr>
							        <td>Email</td>
							        <td><b><?php echo $obj->ConsumerInfo->Email; ?></b></td>
							        <td>AlternativeCellNo</td>
							        <td><b><?php echo $obj->ConsumerInfo->AlternativeCellNo; ?></b></td>
							        <td>LastUpdateDate</td>
							        <td><b><?php echo $obj->ConsumerInfo->LastUpdateDate; ?></b></td>
							    </tr>
							    <tr>
							        <td>UpdateUserId</td>
							        <td><b><?php echo $obj->ConsumerInfo->UpdateUserId; ?></b></td>
							        <td>IsVerified</td>
							        <td><b><?php echo $obj->ConsumerInfo->IsVerified; ?></b></td>
							    </tr>
							</tbody>
						</table>
						<h4>Common Customer History</h4>
						<table class="table table-bordered table-condensed table-striped table-hover">
							<tbody>
							    <tr>
							        <td>ConsumerID</td>
							        <td><b><?php echo $obj->CustomerHistory[0]->ConsumerID; ?></b></td>
							        <td>Company</td>
							        <td><b><?php echo $obj->CustomerHistory[0]->Company; ?></b></td>
							        <td>System</td>
							        <td><b><?php echo $obj->CustomerHistory[0]->System; ?></b></td>
							    </tr>
							    <tr>
							        <td>TranType</td>
							        <td><b><?php echo $obj->CustomerHistory[0]->TranType; ?></b></td>
							        <td>WHCode</td>
							        <td><b><?php echo $obj->CustomerHistory[0]->WHCode; ?></b></td>
							        <td>SalesType</td>
							        <td><b><?php echo $obj->CustomerHistory[0]->SalesType; ?></b></td>
							    </tr>
							</tbody>
						</table>
						<h4>Variation Customer History</h4>
						<table class="table table-bordered table-condensed table-striped table-hover">
						    <tbody>
						      	<tr>
						        	<th>TranNo</th>
						        	<th>TranDate</th>
						        	<th>ProductCode</th>
						        	<th>ProductName</th>
						        	<th>Qty</th>
						        	<th>Amount</th>
						      	</tr>
						      	<?php
						      		$CustomerHistorys = $obj->CustomerHistory;
									foreach($CustomerHistorys as $history) {
						      	?>
							      	<tr>
							        	<td><?php echo $history->TranNo; ?></td>
							        	<td><?php echo $history->TranDate; ?></td>
							        	<td><?php echo $history->ProductCode; ?></td>
							        	<td><?php echo $history->ProductName; ?></td>
							        	<td><?php echo $history->Qty; ?></td>
							        	<td><?php echo $history->Amount; ?></td>
							      	</tr>
							    <?php		
									}
								?>
						    </tbody>
						</table>
				<?php		
					}
				?>
			</div>
	    </div>
  	</div>				  
</div>

</body>
</html>




