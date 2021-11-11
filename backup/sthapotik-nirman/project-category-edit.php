<!DOCTYPE html>
<html lang="en">
<head>
  	<title>STHAPOTIK NIRMAN</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style type="text/css">
		.asteriskField{color: red;}
	</style>
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

<?php
	$categoryId = $_GET["categoryId"];
	$sqlEdit = "SELECT id, name FROM project_categories WHERE id = '$categoryId'";
	$resultEdit = mysqli_query($conn, $sqlEdit);

	if (mysqli_num_rows($resultEdit) > 0) {
	    
	    while($rowEdit = mysqli_fetch_assoc($resultEdit)) {
	        
	        $id = $rowEdit["id"];
	        $name = $rowEdit["name"];
	    }
	}

	if(isset($_POST['submit'])) {
		$categoryId = $_POST['category_id'];
		$categoryName = $_POST['category_name'];

		$sqlSearch = "SELECT  name FROM project_categories WHERE name='$categoryName' AND NOT id='$categoryId'";
		$resultSearch = mysqli_query($conn, $sqlSearch);
		if (mysqli_num_rows($resultSearch) > 0) {
			echo "<center><span class='bg-danger'>This Project Category already exist.</span></center>";
		} 
		else {
			$sql = "UPDATE project_categories SET name='$categoryName' WHERE id='$categoryId'";

			if (mysqli_query($conn, $sql)) {
			    echo "<center><span class='bg-success'>Project Category updated successfully</span></center>";
			    //header("Location: http://localhost//"); /* Redirect browser */
				////exit();
			} 
			else {
			    echo "<center><span class='bg-danger'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</span></center>";
			}
		}	
	}
?>

<div class="container">
	<div class="row">
    	<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-success">
			    <div class="panel-heading">
			    	Edit Project Category
			    </div>
			    <div class="panel-body">
					<form action="" method="post" >
						<input type="hidden" class="form-control" id="category_id" name="category_id" value="<?php echo $id; ?>" autocomplete="off" required="required">
		  				<div class="form-group">
		    				<label for="category_name">Project Category Name: <span class="asteriskField">*</span></label>
		    				<input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $name; ?>" autocomplete="off" required="required">
		  				</div>
		  				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>

					    <div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog">
						      	<div class="modal-content">
							        <div class="modal-header bg-primary">
							          	<button type="button" class="close" data-dismiss="modal">&times;</button>
							          	<h4 class="modal-title">Confirmation Message</h4>
							        </div>
							        <div class="modal-body">
							          	<h3>Update Project Category?</h3>
							        </div>
							        <div class="modal-footer bg-success">
							          	<button type="submit" name="submit"  class="btn btn-primary btn-block">Yes</button>
							        </div>
						      	</div>
						    </div>
						</div>
					</form>
			    </div>
			</div>					  
		</div>					  
	</div>					  
</div>

</body>
</html>
