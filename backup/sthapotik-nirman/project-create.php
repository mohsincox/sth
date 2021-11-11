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
	<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
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
	<div class="row">
    	<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
			    <div class="panel-heading">
			    	Add Project Category
			    </div>
			    <div class="panel-body">

					<form class="form-horizontal" action="project-upload.php" method="post" enctype="multipart/form-data">
					  	<div class="form-group">
					    	<label class="control-label col-sm-3" for="project_name">Project Name: <span class="asteriskField">*</span></label>
					    	<div class="col-sm-9">
					      		<input type="text" class="form-control" id="project_name" name="project_name" placeholder="Enter Project Name" autocomplete="off" required="required">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-sm-3" for="category_id">Select Category: <span class="asteriskField">*</span></label>
					    	<div class="col-sm-9">
					      		<select class="form-control" id="category_id" name="category_id" required="required">
        							<option value="">Select Category</option>
        							<?php
        								$sql = "SELECT  id, name FROM project_categories";
											$result = mysqli_query($conn, $sql);
					              			$i = 0;
					              			if (mysqli_num_rows($result) > 0) {
    
    											while($row = mysqli_fetch_assoc($result)) {
        							?>
        							<option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
        							<?php
        								}
        							}
        							?>
      							</select>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-sm-3" for="image">Image: </label>
					    	<div class="col-sm-9"> 
					      		<input type="file" class="form-control" id="image" name="image" placeholder="Upload Image">
					    	</div>
					  	</div>

					  	<div class="col-sm-offset-3">
					  		<img src="" id="image-tag">
					  	</div>

					  	<div class="form-group">
					    	<label class="control-label col-sm-3" for="hover_text">Text Hover: </label>
					    	<div class="col-sm-9">
					      		<input type="text" class="form-control" id="hover_text" name="hover_text" placeholder="Enter Text Hover" autocomplete="off">
					    	</div>
					  	</div>

					  	<div class="form-group">
					    	<label class="control-label col-sm-3" for="project_name">Description: </label>
					    	<div class="col-sm-9">
					      		<textarea class="form-control" id="description" name="description"></textarea>
					    	</div>
					  	</div>
					  
					  	<div class="form-group"> 
					    	<div class="col-sm-offset-3 col-sm-9">
					      		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>
					    	</div>
					  	</div>

					  	<div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog">
						      	<div class="modal-content">
							        <div class="modal-header bg-primary">
							          	<button type="button" class="close" data-dismiss="modal">&times;</button>
							          	<h4 class="modal-title">Confirmation Message</h4>
							        </div>
							        <div class="modal-body">
							          	<h3>Add Project?</h3>
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

<script>
    CKEDITOR.replace( 'description' );

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#image-tag').attr('src', e.target.result).width(100).height(100);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function(){
        readURL(this);
    });
</script>

</body>
</html>
