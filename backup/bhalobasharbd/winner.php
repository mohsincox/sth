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
	
  	
</head>

<body>
<?php
	include_once('session.php');
	
	include_once('navbar.php');	
?>
	<div class="container-fluid">
		<div class="col-sm-12">
		  	<div class="panel panel-primary">
			    
			    <div class="panel-heading text-center"><code style="font-size: 25px;">Quiz Winners Database</code></div>
			    
			    <div class="panel-body">
			    	
					<div class="row">
				    	<div class="col-sm-12">
							
        				</div>
					</div>

			        <div class="row">
			          	<div class="col-sm-12">
			          		<div class="table-responsive">
					            <table class="table table-striped table-bordered table-hover" id="example">
					              	<thead>
					                	<tr class="success">
					                  		<th>SL</th>
					                  		<th>EP</th>
					                  		<th>Date</th>
					                  		<th>SL No</th>
					                  		<th>Phone Number</th>
					                 		<th>Participation Time</th>
					                 		<th>Duration</th>
					                 		<th>Name</th>
					                 		<th>Caontact Address</th>
					                	</tr>
					              	</thead>
					              	<tbody>
					              		<?php
					              			$servername = "localhost";
											$username = "root";
											$password = "m";
											$dbname = "test";

											// Create connection
											$conn = mysqli_connect($servername, $username, $password, $dbname);
											// Check connection
											if (!$conn) {
											    die("Connection failed: " . mysqli_connect_error());
											}



					              			$sql = "SELECT id, ep, win_date, sl_no, phone_number, participation_time, duration, name, contact_address  FROM `quiz_winners` ";
											$result = mysqli_query($conn, $sql);

					              			$i = 0;
					              			if (mysqli_num_rows($result) > 0) {
    
    											while($row = mysqli_fetch_assoc($result)) {
    												
       									?>
       		 							<tr>
				                          	<td><?php echo ++$i; ?></td>
				                          	<td><?php echo $row["ep"]; ?></td>
				                          	<td><?php echo $row["win_date"]; ?></td>
				                          	<td><?php echo $row["sl_no"]; ?></td>
				                          	<td><b><?php echo $row["phone_number"]; ?></b></td>
				                          	<td><?php echo $row["participation_time"]; ?></td>
				                          	<td><?php echo $row["duration"]; ?></td>
				                          	<td><?php echo $row["name"]; ?></td>
				                          	<td><?php echo $row["contact_address"]; ?></td>
				                        </tr>

       									<?php
   												}
											} 
											mysqli_close($conn);
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
	<script type="text/javascript">
		// $(document).ready(function() {
		//     $('#example').DataTable();
		// } );
		$(document).ready(function() {
		    $('#example').DataTable( {
		        "lengthMenu": [[30, 60, -1], [30, 60, "All"]]
		    } );
		} );
	</script>
</body>
</html>
