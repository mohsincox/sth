<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Agent Performence</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
  	
</head>

<body>
<?php
	include_once("db_connection_asterisk.php");	
?>
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
          						

									$sql = "SELECT user, campaign_id, status, calls_today, last_state_change FROM `vicidial_live_agents` ORDER BY user";
									$result = mysqli_query($connAsterisk, $sql);
        					?>
        				</div>
					</div>

			        <div class="row">
			          	<div class="col-sm-12">
			          		<div class="table-responsive">
					            <table class="table table-striped table-bordered table-hover" id="example">
					              	<thead>
					                	<tr class="success">
					                  		<th>SL</th>
					                  		<th>Agent</th>
					                  		<th>campaign_id</th>
					                 		<th>status</th>
					                 		<th>HH:MM:SS</th>
					                 		<th>calls_today</th>
					                 		
					                 		
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
       		 							<tr>
				                          	<td><?php echo ++$i; ?></td>
				                          	<td><?php echo $row["user"]; ?></td>
				                          	<td><?php echo $row["campaign_id"]; ?></td>
				                          	<td><?php echo $row["status"]; ?></td>
				                          	<td><?php echo gmdate("H:i:s", $diff_sec); ?></td>
				                          	<td><?php echo $row["calls_today"]; ?></td>
				                          	
				                          	
				                        </tr>

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
