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
	include_once('db_connection.php');	
?>

<?php
	include_once('navbar.php');
	//require $_SERVER['DOCUMENT_ROOT'].'/loginphp/navbar.php';
?>

<?php
	$subProjectId = $_GET["subProjectId"];
	$sqlEdit = "SELECT id, sub_name, project_id, sub_image, sub_hover_text, sub_description FROM sub_projects WHERE id = '$subProjectId'";
	$resultEdit = mysqli_query($conn, $sqlEdit);

	if (mysqli_num_rows($resultEdit) > 0) {
	    
	    while($rowEdit = mysqli_fetch_assoc($resultEdit)) {
	        
	        $id = $rowEdit["id"];
	        $subName = $rowEdit["sub_name"];
	        $projectId = $rowEdit["project_id"];
	        $subImage = $rowEdit["sub_image"];
	        $subHoverText = $rowEdit["sub_hover_text"];
	        $subDescription = $rowEdit["sub_description"];
	    }
	}
?>

<div class="container">
	<div class="row">
    	<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-danger">
			    <div class="panel-heading">
			    	Edit Sub Project
			    </div>
			    <div class="panel-body">

					<form class="form-horizontal" action="sub-project-upload-edit.php" method="post" enctype="multipart/form-data">
						<input type="hidden" class="form-control" id="sub_project_id" name="sub_project_id" placeholder="Enter Sub Project Id" autocomplete="off" required="required" value="<?php echo $id; ?>">
					  	<div class="form-group">
					    	<label class="control-label col-sm-3" for="sub_project_name">Sub Project Name: <span class="asteriskField">*</span></label>
					    	<div class="col-sm-9">
					      		<input type="text" class="form-control" id="sub_project_name" name="sub_project_name" placeholder="Enter Project Name" autocomplete="off" required="required" value="<?php echo $subName; ?>">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-sm-3" for="project_id">Select Project: <span class="asteriskField">*</span></label>
					    	<div class="col-sm-9">
					      		<select class="form-control" id="project_id" name="project_id" required="required">
        							<option value="">Select Project</option>
        							<?php
        								$sql = "SELECT  id, name FROM projects";
											$result = mysqli_query($conn, $sql);
					              			$i = 0;
					              			if (mysqli_num_rows($result) > 0) {
    
    											while($row = mysqli_fetch_assoc($result)) {
        							?>
        							<option <?php if ($projectId == $row['id']) echo 'selected' ; ?> value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
        							<?php
        								}
        							}
        							?>
      							</select>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-sm-3" for="sub_image">Image: </label>
					    	<div class="col-sm-9"> 
					      		<input type="file" class="form-control" id="sub_image" name="sub_image" placeholder="Upload Image">
					    	</div>
					  	</div>

					  	<div class="col-sm-offset-3">
					  		<?php
					  			if (isset($subImage) != null) {
					  		?>
					  			<img src="assets/subuploads/<?php echo $subImage; ?>" width="100" height="100" id="image-tag">
					  		<?php
					  			} else {
					  		?> 
					  			<img src="" id="image-tag">
					  		<?php
					  			}
					  		?>
					  		
					  	</div>

					  	<div class="form-group">
					    	<label class="control-label col-sm-3" for="sub_hover_text">Sub Text Hover: </label>
					    	<div class="col-sm-9">
					      		<input type="text" class="form-control" id="sub_hover_text" name="sub_hover_text" placeholder="Enter Sub Text Hover" autocomplete="off" value="<?php echo $subHoverText; ?>">
					    	</div>
					  	</div>

					  	<div class="form-group">
					    	<label class="control-label col-sm-3" for="">Sub Description: </label>
					    	<div class="col-sm-9">
					      		<textarea class="form-control" id="sub_description" name="sub_description"><?php echo $subDescription; ?></textarea>
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
							          	<h3>Edit Project?</h3>
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
