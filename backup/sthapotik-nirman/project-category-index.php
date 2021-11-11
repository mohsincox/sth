<!DOCTYPE html>
<html lang="en">
<head>
  	<title>STHAPOTIK NIRMAN</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
  	<style>.asteriskField{color: red;}</style>
</head>

<body>
<?php
	include_once('session.php');
	include_once("db_connection.php");	
?>

<?php
	include_once('navbar.php');
	//require $_SERVER['DOCUMENT_ROOT'].'/loginphp/navbar.php';
?>
	<div class="container">
		<div class="col-sm-offset-0 col-sm-12">
		  	<div class="panel panel-primary">
			    <div class="panel-heading">
			    	<b>Project Category List</b>
			    </div>
			    <div class="panel-body">

			        <div class="row">
			          	<div class="col-sm-12">
			          		<div class="table-responsive">
					            <table class="table table-striped table-bordered table-hover" id="example">
					              	<thead>
					                	<tr class="success">
					                  		<th>ID</th>
					                  		<th>Project Category Name</th>
											<th>Edit</th>
					                	</tr>
					              	</thead>
					              	<tbody>
					              		<?php	
					              			$sql = "SELECT  id, name FROM project_categories";
											$result = mysqli_query($conn, $sql);
					              			$i = 0;
					              			if (mysqli_num_rows($result) > 0) {
    
    											while($row = mysqli_fetch_assoc($result)) {
       									?>
       		 							<tr>
				                          	<td><?php echo $row["id"]; ?></td>
				                          	<td><?php echo $row["name"]; ?></td>
				                          	<td><a href="/sthapotik-nirman/project-category/edit.php?categoryId=<?php echo $row['id']; ?>" class="btn btn-success btn-xs">Edit</a></td>
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
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>
</body>
</html>
