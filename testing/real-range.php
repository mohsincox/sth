<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Agent Performence</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  	<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  	<style>.asteriskField{color: red;}</style>
	 <script>
		$( function() {
			// $( "#datepicker" ).datepicker({ changeMonth: true, changeYear: true });
			// $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
			// $( "#datepicker1" ).datepicker({ changeMonth: true, changeYear: true });
			// $( "#datepicker1" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
			$( "#datepicker" ).datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd" });
			$( "#datepicker" ).datepicker( "setDate", "0" );
			$( "#datepicker1" ).datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd" });
			$( "#datepicker1" ).datepicker( "setDate", "0" );
		} );
	 </script>
  	
</head>

<body>
<?php
	// include_once("db_connection_asterisk.php");	
	$serverName = "192.168.100.68\SQLEXPRESS";
	$connectionInfo = array( "Database"=>"ZKF18", "UID"=>"sa", "PWD"=>"myadmin!@#");
	$conn = sqlsrv_connect( $serverName, $connectionInfo );
	if( $conn === false ) {
	    die( print_r( sqlsrv_errors(), true));
	}
?>
	<div class="container-fluid">
		<div class="col-sm-offset-0 col-sm-12">
		  	<div class="panel panel-primary">
			    <div class="panel-heading text-center">
			    	<b><i style="font-size: 18px;">Date wise Agent Performance Report</i></b>
			    </div>
			    <div class="panel-body">
			    	<div class="row">
				    	<div class="col-sm-12">
					    	<center>
								<form class="form-inline" method="post" action="">
									<div class="form-group">
									  <label class="control-label requiredField" for="date">
										Start Date
										<span class="asteriskField">
										  *
										</span>
									  </label>
									  <div class="input-group">
										<input class="form-control" id="datepicker" name="start_date" placeholder="YYYY-MM-DD" type="text" required="" autocomplete="off" />
									  </div>
								  	</div>
								  	<div class="form-group">
									  <label class="control-label requiredField" for="date">
										End Date
										<span class="asteriskField">
										  *
										</span>
									  </label>
									  <div class="input-group">
										<input class="form-control" id="datepicker1" name="end_date" placeholder="YYYY-MM-DD" type="text" required="" autocomplete="off" />
									  </div>
								  	</div>

					              	<div class="form-group">
					                	<button class="btn btn-primary " name="submit" type="submit">View</button>
					              	</div>
								</form>
							</center>
						</div>
					</div>

					<div class="row">
				    	<div class="col-sm-12">
							<?php
          						if(isset($_POST["submit"]))
          						{
          							$startDate = $_POST['start_date'];
          							$startDateTime = $startDate . ' 00:00:00';
          							$endDate = $_POST['end_date'];
          							$endDateTime = $endDate . ' 23:59:59';
            						echo "<h4 style='margin-bottom: 0px;'><center><span class='img-thumbnail bg-primary'>Start Date: <b>".$_POST['start_date']."</b>; End Date: <b>".$_POST['end_date']."</b></span></center></h4>";

									// $sql = "SELECT user, COUNT(agent_log_id) as total_calls, SUM(pause_sec) as pause, SUM(wait_sec) as wait, SUM(talk_sec) as talk, SUM(dispo_sec) as dispo, SUM(dead_sec) as dead, campaign_id, user_group FROM `vicidial_agent_log` WHERE status IS NOT NULL AND event_time BETWEEN '$startDateTime' AND '$endDateTime' GROUP BY user";
									// $result = mysqli_query($connAsterisk, $sql);
									$sql = "SELECT checkinout.USERID AS USERID, MAX(userinfo.NAME) AS NAME, MIN(userinfo.BADGENUMBER) AS BADGENUMBER, MIN(checkinout.CHECKTIME) AS minCHECKTIME, MAX(checkinout.CHECKTIME) AS maxCHECKTIME, COUNT(checkinout.USERID) AS Total FROM checkinout INNER JOIN userinfo ON userinfo.USERID = checkinout.USERID WHERE checkinout.CHECKTIME BETWEEN '$startDateTime' AND '$endDateTime' GROUP BY  checkinout.USERID";
									$stmt = sqlsrv_query( $conn, $sql );
									if( $stmt === false) {
									    die( print_r( sqlsrv_errors(), true) );
									}
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
					                  		
					                  		<th>USERID</th>
					                  		<th>NAME</th>
					                 		<th>AttID</th>
					                 		<th>minCHECKTIME</th>
					                 		<th>maxCHECKTIME</th>
					                 		<th>Total</th>
					                	</tr>
					              	</thead>
					              	<tbody>
					              		<?php
					              			$i = 0;


	// while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	//       // echo $row['USERID'].", ".$row['CHECKTIME']->format('d/m/Y')."<br />";
	//       echo $row['USERID'].", ".$row['NAME'].", ".$row['BADGENUMBER'].", ".$row['minCHECKTIME']->format('Y-m-d H:m:s').", ".$row['maxCHECKTIME']->format('Y-m-d H:m:s').", ".$row['Total']."<br />";
	// }

	// sqlsrv_free_stmt( $stmt);







					              			
    
    											while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
    												
       									?>
       		 							<tr>
				                          	<td><?php echo ++$i; ?></td>
				                          	
				                          	<td><?php echo $row['USERID']; ?></td>
				                          	<td><?php echo $row['NAME']; ?></td>
				                          	<td><?php echo $row['BADGENUMBER']; ?></td>
				                          	<td><?php echo $row['minCHECKTIME']->format('Y-m-d H:i:s'); ?></td>
				                          	<td><?php echo $row['maxCHECKTIME']->format('Y-m-d H:i:s'); ?></td>
				                          	<td><?php echo $row['Total']; ?></td>
				                        </tr>

       									<?php
   												}

   												sqlsrv_free_stmt( $stmt);
											
					              		?> 
					              	</tbody>
					            </table>
			        		</div>
			          	</div>
			        </div>
			        <?php
			    		}
			        ?>
			    </div>
		  	</div>	
	  	</div>				  
	</div>
	<script type="text/javascript">
		// $(document).ready(function() {
		//     $('#example').DataTable();
		// } );
		$(document).ready(function() {
            $('#example').DataTable( {
                "pageLength": 200
            } );
        } );
	</script>
</body>
</html>
