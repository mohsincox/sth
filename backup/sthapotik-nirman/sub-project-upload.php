<?php
	include_once('session.php');
	include_once('db_connection.php');

	if ($_FILES["sub_image"]["name"] == null) {
		$subProjectName = $_POST['sub_project_name'];
        $projectId = $_POST['project_id'];
		$subProjectImage = "";
		$subHoverText = $_POST['sub_hover_text'];
		$subDescription = $_POST['sub_description'];

		$sqlSearch = "SELECT  sub_name FROM sub_projects WHERE sub_name='$subProjectName'";
		$resultSearch = mysqli_query($conn, $sqlSearch);
		if (mysqli_num_rows($resultSearch) > 0) {
			echo "<center><span class='bg-danger'>This Project Category already exist.</span></center>";
		} 
		else {
			$sql = "INSERT INTO sub_projects (sub_name, project_id, sub_image, sub_hover_text, sub_description) VALUES ('$subProjectName', '$projectId', '$subProjectImage', '$subHoverText', '$description')";
			if (mysqli_query($conn, $sql)) {
			    echo "<center><span class='bg-success'>New Project created successfully</span></center>";
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
		    if (move_uploaded_file($_FILES["sub_image"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["sub_image"]["name"]). " has been uploaded.";

		        $subProjectName = $_POST['sub_project_name'];
		        $projectId = $_POST['project_id'];
				$subProjectImage = $_FILES["sub_image"]["name"];
				$subHoverText = $_POST['sub_hover_text'];
				$subDescription = $_POST['sub_description'];

				$sqlSearch = "SELECT  sub_name FROM sub_projects WHERE sub_name='$subProjectName'";
				$resultSearch = mysqli_query($conn, $sqlSearch);
				if (mysqli_num_rows($resultSearch) > 0) {
					echo "<center><span class='bg-danger'>This Project Category already exist.</span></center>";
				} 
				else {
					$sql = "INSERT INTO sub_projects (sub_name, project_id, sub_image, sub_hover_text, sub_description) VALUES ('$subProjectName', '$projectId', '$subProjectImage', '$subHoverText', '$subDescription')";
					if (mysqli_query($conn, $sql)) {
					    echo "<center><span class='bg-success'>New Sub Project created successfully</span></center>";
					    header("Location: index.php"); /* Redirect browser */
						////exit();
					} 
					else {
					    echo "<center><span class='bg-danger'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</span></center>";
					}
				}
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}
?>