<!DOCTYPE html>
<html>
<head>
	<title>MYOL</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  	<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  	<style>.asteriskField{color: red;}</style>
  	<script>
    	$( function() {
      		$( "#datepicker" ).datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd" });
      		$( "#datepicker" ).datepicker( "setDate", "0" );
    	} );
  	</script>
</head>
<body>
	<?php
	  	include("db_connection_asterisk.php");
	?>
	<div class="container-fluid">
  		<div class="col-sm-offset-0 col-sm-12">
    		<div class="panel panel-default">
      			<div class="panel-heading"><center><b style="font-size: 16px;">DAILY AGENT LOGIN/LOGOUT DATE & TIME</b></center></div>
      			<div class="panel-body">
			        <div class="row" style="margin-bottom: 10px;">
			          	<div class="col-sm-offset-2 col-sm-8">
			            	<form class="form-inline" method="post">
                                                                            <center>
                                                                                    <div class="form-group">
                                                                                            <label class="control-label requiredField" for="date">
                                                                                            Date
                                                                                            <span class="asteriskField">
                                                                                                    *
                                                                                            </span>
                                                                                            </label>
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-addon">
                                                                                                    <i class="fa fa-calendar"></i>
                                                                                                </div>
                                                                                            <input class="form-control" id="datepicker" name="start_date" placeholder="YYYY-MM-DD" type="text" required="" autocomplete="off" />
                                                                                            </div>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                            <button class="btn btn-primary " name="submit" type="submit">Submit</button>
                                                                                    </div>
                                                                            </center>
			            	</form>
			          	</div>
			        </div>
			        <?php
			          	if(isset($_POST["submit"]))
			          	{
			            	echo "<h4><center>Date: <b>".$_POST['start_date']."</b>; Agent: <b>All Agents</b></center></h4>";
			          	}
			        ?>
        			<div class="row">
          				<div class="col-sm-12">
	            			<table class="table table-striped table-bordered table-hover">
	              				<thead>
	                				<tr class="success">
	                					<th>SL</th>
		                  				<th>AGENT</th>
		                  				<th>LOGIN TIME</th>
		                  				<th>LOGOUT TIME</th>
		                  				<!-- <th>CAMPAIGN</th> -->
		                  				<!-- <th>GROUP</th> -->
	                				</tr>
	              				</thead>
		              			<tbody>

	              				<?php
	                				if(isset($_POST["submit"])) {
	                					$i = 0;
	                  					$sqlUser = "SELECT user_id, user FROM vicidial_users ORDER BY user";
	                      				$resultUser = $connAsterisk->query($sqlUser);

	                      				if ($resultUser->num_rows > 0) {
	                          				// output data of each row
	                          				while($rowUser = $resultUser->fetch_assoc()) {
	                            				$user = $rowUser["user"];

	                            				$increasedDate = $_POST['start_date'];

	                            				$sql = "SELECT user_log_id, user, event, event_date, campaign_id, user_group FROM vicidial_user_log where user='$user' and `event`= 'LOGIN' and event_date >= '$increasedDate 00:00:00' and event_date <= '$increasedDate 23:59:59' order by event_date limit 1";
	                            				$result = mysqli_query($connAsterisk, $sql);

	                            				$sql2 = "SELECT user_log_id, user, event, event_date, campaign_id, user_group FROM vicidial_user_log where user='$user' and `event`= 'LOGOUT' and event_date >= '$increasedDate 00:00:00' and event_date <= '$increasedDate 23:59:59' order by event_date DESC limit 1";
	                            				$result2 = mysqli_query($connAsterisk, $sql2);

	                            				if ((mysqli_num_rows($result) > 0) || (mysqli_num_rows($result2) > 0)) {
	                                				// output data of each row
	                                				while(($row = mysqli_fetch_assoc($result))) {   
	                        	?>
	                                  					<tr>
	                                  						<td><?php echo ++$i; ?></td>
	                                    					<td class="text-capitalize"><?php echo $row["user"]; ?></td>
	                                    					<td><?php echo $row["event_date"]; ?></td>
	                            <?php
	                                      				if(($row2 = mysqli_fetch_assoc($result2))) {
	                            ?>
	                                      					<td><?php echo $row2["event_date"]; ?></td>
	                            <?php
	                                      				} else {
	                            ?>
	                                    					<td class="bg-danger">Did not Logout</td>
	                            <?php
	                                    				}
	                            ?>
	                                    					<!-- <td><?php //echo $row["campaign_id"]; ?></td> -->
	                                    					<!-- <td><?php //echo $row["user_group"]; ?></td> -->
	                                  					</tr>
	                        	<?php
	                                				}
	                            				}

	                        				}
	            						}
	                					mysqli_close($connAsterisk);
	                				}
	              				?>
	       
	              				</tbody>
            				</table>
          				</div>
        			</div>
        
      			</div>
    		</div>
  		</div>
	</div>
</body>
</html>