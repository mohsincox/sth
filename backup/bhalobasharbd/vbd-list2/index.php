<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Report</title>
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
	include_once('../session.php');
	// include_once("../db_connection_asterisk.php");
	$connAsterisk = mysqli_connect("http://192.168.100.34", "root", "Dev1234", "asterisk");
	
	if (!$connAsterisk) {
		die("Connection failed: " . mysqli_connect_error());
	}

	include_once('../navbar.php');	
?>
	<div class="container-fluid">
		<div class="col-sm-offset-0 col-sm-12">
		  	<div class="panel panel-default">
			    <div class="panel-heading text-center">
			    	<b><i style="font-size: 18px;">Date wise List Report</i></b>
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

									$sql = "SELECT lead_id, modify_date, phone_number, status, security_phrase  FROM `vicidial_list` WHERE status = 'SVYHU' AND (`modify_date` BETWEEN '$startDateTime' AND '$endDateTime') ORDER BY modify_date";
									$result = mysqli_query($connAsterisk, $sql);
        					?>
        				</div>
					</div>

			        <div class="row">
			          	<div class="col-sm-12">
			          		<div class="table-responsive">
					            <table class="table table-striped table-bordered table-hover" id="exampleZZZZZ">
					              	<thead>
					                	<tr class="success">
					                  		<th>SL</th>
					                  		<th>lead_id</th>
					                  		<th>modify_date</th>
					                  		<th>phone_number</th>
					                 		<th>status</th>
					                 		<th>security_phrase</th>
					                 		
					                 		
					                	</tr>
					              	</thead>
					              	<tbody>
					              		<?php
					              			$i = 0;
					              			if (mysqli_num_rows($result) > 0) {
    
    											while($row = mysqli_fetch_assoc($result)) {
    												
       									?>
       		 							<tr>
				                          	<td><?php echo ++$i; ?></td>
				                          	<td><?php echo $row["lead_id"]; ?></td>
				                          	<td><?php echo $row["modify_date"]; ?></td>
				                          	<td><?php echo $row["phone_number"]; ?></td>
				                          	<td><?php echo $row["status"]; ?></td>
				                          	<td><?php echo $row["security_phrase"]; ?></td>
				                          	
				                          	
				                          	
				                        </tr>

       									<?php
   												}
											} else {
    											echo "<h4><center><span class='img-thumbnail bg-danger'>There is no data in between <b>".$_POST['start_date']."</b> & <b>".$_POST['end_date']."</b></span></center></h4>";
											}
											mysqli_close($connAsterisk);
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
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>
</body>
</html>
