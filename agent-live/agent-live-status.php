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
					            <table class="table table-striped table-bordered table-hover table-condensed" id="example">
					              	<thead>
					                	<tr class="" style="background-color: #2989d8; color: white;">
					                  		<th>SL</th>
					                  		<th>Agent</th>
					                  		<th>Campaign</th>
					                 		<th>Status</th>
					                 		<th>H:M:S</th>
					                 		<th>Number</th>
					                 		<th>Type</th>
					                 		<th>Calls</th>
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

			                          		<tr class="">
					                          	<td><?php echo ++$i; ?></td>
					                          	<td><strong class="text-capitalize"><?php echo $row["user"]; ?></strong></td>
					                          	<td><strong><?php echo $row["campaign_id"]; ?></strong></td>
					                    <?php
			                          		if ($row["status"] == 'PAUSED') {
			                          	?>
					                          	<td><button class="btn btn-danger btn-xs btn-block"><strong><?php echo $row["status"]; ?></strong></button></td>

					                    <?php
					                    	} else if ($row["status"] == 'INCALL') {
					                   	?>
					                   			<td><button class="btn btn-success btn-xs btn-block"><strong><?php echo $row["status"]; ?></strong></button></td>
					                   	<?php
					                    	} else {
					                    ?>
					                    	<td><button class="btn btn-warning btn-xs btn-block"><strong><?php echo $row["status"]; ?></strong></button></td>
					                    <?php		
					                    	}
					                    ?>
					                          	<td><strong><?php echo gmdate("H:i:s", $diff_sec); ?></strong></td>
					                          	<td><strong><?php echo $row["phone_number"]; ?></strong></td>
					                          	<td><strong><?php echo $row["comments"]; ?></strong></td>
					                          	<td><strong><?php echo $row["calls_today"]; ?></strong></td>
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