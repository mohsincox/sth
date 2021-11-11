<?php
	include_once('session.php');
	include_once('db_connection.php');

	if ($_FILES["sub_image"]["name"] == null) {
		$subProjectId = $_POST['sub_project_id'];
		$subProjectName = $_POST['sub_project_name'];
        $projectId = $_POST['project_id'];
		//$projectImage = "";
		$subHoverText = $_POST['sub_hover_text'];
		$subDescription = $_POST['sub_description'];

		$sqlSearch = "SELECT  sub_name FROM sub_projects WHERE name='$subProjectName' AND NOT id='$subProjectId'";
		$resultSearch = mysqli_query($conn, $sqlSearch);
		if (mysqli_num_rows($resultSearch) > 0) {
			echo "<center><span class='bg-danger'>This Project already exist.</span></center>";
		} 
		else {
			$sql = "UPDATE sub_projects SET sub_name='$subProjectName', project_id='$projectId', sub_hover_text='$subHoverText', sub_description='$subDescription' WHERE id='$subProjectId'";
			if (mysqli_query($conn, $sql)) {
			    echo "<center><span class='bg-success'>Project updated successfully</span></center>";
			    header("Location: sub-project-index.php"); /* Redirect browser */
				////exit();
			} 
			else {
			    echo "<center><span class='bg-danger'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</span></center>";
			}
		}
	} else {
		$target_dir = "assets/subuploads/";
		$target_file = $target_dir . basename($_FILES["sub_image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["sub_image"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["sub_image"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			$subProjectId = $_POST['sub_project_id'];
	        $subProjectName = $_POST['sub_project_name'];
	        $projectId = $_POST['project_id'];
			$subProjectImage = $_FILES["sub_image"]["name"];
			$subHoverText = $_POST['sub_hover_text'];
			$subDescription = $_POST['sub_description'];
			$sqlSearch = "SELECT  sub_name FROM sub_projects WHERE sub_name='$subProjectName' AND NOT id='$subProjectId'";
			$resultSearch = mysqli_query($conn, $sqlSearch);
			if (mysqli_num_rows($resultSearch) > 0) {
				echo "<center><span class='bg-danger'>This Sub Project already exist.</span></center>";
				exit();
			}



			$sqlEdit = "SELECT id, sub_name, project_id, sub_image, sub_hover_text, sub_description FROM sub_projects WHERE id = '$subProjectId'";
			$resultEdit = mysqli_query($conn, $sqlEdit);

			if (mysqli_num_rows($resultEdit) > 0) {
			    
			    while($rowEdit = mysqli_fetch_assoc($resultEdit)) {
			        
			        $idForImg = $rowEdit["id"];
			        $subNameForImg = $rowEdit["sub_name"];
			        $projectIdForImg = $rowEdit["project_id"];
			        $subImageForImg = $rowEdit["sub_image"];
			        $subHoverTextForImg = $rowEdit["sub_hover_text"];
			        $subDescriptionForImg = $rowEdit["sub_description"];
			    }
			}


			// delete file

			if (file_exists("assets/subuploads/".$subImageForImg)) {
			    unlink("assets/subuploads/".$subImageForImg);
			    echo 'File '.$subImageForImg.' has been deleted';
			}



		    if (move_uploaded_file($_FILES["sub_image"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["sub_image"]["name"]). " has been uploaded.";

				// $sqlSearch = "SELECT  name FROM projects WHERE name='$projectName' AND NOT id='$projectId'";
				// $resultSearch = mysqli_query($conn, $sqlSearch);
				// if (mysqli_num_rows($resultSearch) > 0) {
				// 	echo "<center><span class='bg-danger'>This Project Category already exist.</span></center>";
				// } 
				//else {
					$sql = "UPDATE sub_projects SET sub_name='$subProjectName', project_id='$projectId', sub_image='$subProjectImage', sub_hover_text='$subHoverText', sub_description='$subDescription' WHERE id='$subProjectId'";
					if (mysqli_query($conn, $sql)) {
					    echo "<center><span class='bg-success'>Project updated with img successfully</span></center>";
					    //header("Location: index.php"); /* Redirect browser */
						////exit();
					} 
					else {
					    echo "<center><span class='bg-danger'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</span></center>";
					}
				//}
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}
?>