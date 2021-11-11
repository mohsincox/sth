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
		  	<div class="panel panel-primary">
			    <div class="panel-heading text-center">
			    	<b><i style="font-size: 18px;">Agent Live</i></b>
			    </div>
			    <div class="panel-body">
			    	

					<div class="row">
				    	<div class="col-sm-12">
							<?php
								include_once("db-connection-asterisk.php");	
								//$sql = "SELECT user, campaign_id, status, calls_today, last_state_change, comments FROM `vicidial_live_agents` ORDER BY user";
								$sql = "SELECT vicidial_live_agents.user AS user, vicidial_live_agents.campaign_id AS campaign_id, vicidial_live_agents.status AS status, vicidial_live_agents.comments AS comments, vicidial_live_agents.calls_today AS calls_today, vicidial_live_agents.last_state_change AS last_state_change, vicidial_list.phone_number AS phone_number
										FROM vicidial_live_agents
										LEFT JOIN vicidial_list ON vicidial_live_agents.lead_id = vicidial_list.lead_id
										ORDER BY vicidial_live_agents.user";
								$result = mysqli_query($connAsterisk, $sql);
        					?>
        				</div>
					</div>

			        <div class="row">
			          	<div class="col-sm-12">
			          		<div class="table-responsive">
					            <table class="table table-bordered table-hover" id="example">
					              	<thead>
					                	<tr class="warning">
					                  		<th>SL</th>
					                  		<th>Agent</th>
					                  		<th>Campaign</th>
					                 		<th>Status</th>
					                 		<th>HH:MM:SS</th>
					                 		<th>Number</th>
					                 		<th>Comment</th>
					                 		<th>Calls Today</th>
					                	</tr>
					              	</thead>
					              	<tbody>
					              		<?php
					              			$i = 0;
					              			if (mysqli_num_rows($result) > 0) {
    
    											while($row = mysqli_fetch_assoc($result)) {

    												$last_state_change = $row["last_state_change"];
    												$to_time = strtotime(date("Y-m-d H:i:s"));
													$from_time = strtotime($last_state_change);
													$diff_sec = $to_time - $from_time;
       									?>

       									<?php
			                          		if ($row["status"] == 'PAUSED') {
			                          	?>
			                          		<tr class="danger">
					                          	<td><?php echo ++$i; ?></td>
					                          	<td><strong><?php echo $row["user"]; ?></strong></td>
					                          	<td><strong><?php echo $row["campaign_id"]; ?></strong></td>
					                          	<td><strong><?php echo $row["status"]; ?></strong></td>
					                          	<td><strong><?php echo gmdate("H:i:s", $diff_sec); ?></strong></td>
					                          	<td><strong><?php echo $row["phone_number"]; ?></strong></td>
					                          	<td><strong><?php echo $row["comments"]; ?></strong></td>
					                          	<td><strong><?php echo $row["calls_today"]; ?></strong></td>
					                        </tr>
			                          	<?php
			                          		} else if($row["status"] == 'INCALL') {
			                          	?>
			                          		<tr class="success">
					                          	<td><?php echo ++$i; ?></td>
					                          	<td><strong><?php echo $row["user"]; ?></strong></td>
					                          	<td><strong><?php echo $row["campaign_id"]; ?></strong></td>
					                          	<td><strong><?php echo $row["status"]; ?></strong></td>
					                          	<td><strong><?php echo gmdate("H:i:s", $diff_sec); ?></strong></td>
					                          	<td><strong><?php echo $row["phone_number"]; ?></strong></td>
					                          	<td><strong><?php echo $row["comments"]; ?></strong></td>
					                          	<td><strong><?php echo $row["calls_today"]; ?></strong></td>
					                        </tr>
			                          	<?php
			                          		} else {
			                          	?>
			                          		<tr class="">
					                          	<td><?php echo ++$i; ?></td>
					                          	<td><strong><?php echo $row["user"]; ?></strong></td>
					                          	<td><strong><?php echo $row["campaign_id"]; ?></strong></td>
					                          	<td><strong><?php echo $row["status"]; ?></strong></td>
					                          	<td><strong><?php echo gmdate("H:i:s", $diff_sec); ?></strong></td>
					                          	<td><strong><?php echo $row["phone_number"]; ?></strong></td>
					                          	<td><strong><?php echo $row["comments"]; ?></strong></td>
					                          	<td><strong><?php echo $row["calls_today"]; ?></strong></td>
					                        </tr>
			                          	<?php
			                          		}
			                          	?>
       		 							

       									<?php
   												}
											} 
											mysqli_close($connAsterisk);
					              		?> 
					              	</tbody>
					            </table>
					            
			        		</div>
			          	</div>
			        </div>
			       
			    </div>
		  	</div>	
	  	</div>				  
	</div>
	
</body>
</html>
