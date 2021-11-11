<?php
	include_once('session.php');
	include_once("db_connection.php");

	if ($_FILES["image"]["name"] == null) {
		$projectId = $_POST['project_id'];
		$projectName = $_POST['project_name'];
        $categoryId = $_POST['category_id'];
		//$projectImage = "";
		$hoverText = $_POST['hover_text'];
		$description = $_POST['description'];

		$sqlSearch = "SELECT  name FROM projects WHERE name='$projectName' AND NOT id='$projectId'";
		$resultSearch = mysqli_query($conn, $sqlSearch);
		if (mysqli_num_rows($resultSearch) > 0) {
			echo "<center><span class='bg-danger'>This Project already exist.</span></center>";
		} 
		else {
			$sql = "UPDATE projects SET name='$projectName', category_id='$categoryId', hover_text='$hoverText', description='$description' WHERE id='$projectId'";
			if (mysqli_query($conn, $sql)) {
			    echo "<center><span class='bg-success'>Project updated successfully</span></center>";
			    header("Location: project-index.php"); /* Redirect browser */
				////exit();
			} 
			else {
			    echo "<center><span class='bg-danger'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</span></center>";
			}
		}
	} else {
		$target_dir = "assets/uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["image"]["tmp_name"]);
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
		if ($_FILES["image"]["size"] > 5000000) {
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
			$projectId = $_POST['project_id'];
	        $projectName = $_POST['project_name'];
	        $categoryId = $_POST['category_id'];
			$projectImage = $_FILES["image"]["name"];
			$hoverText = $_POST['hover_text'];
			$description = $_POST['description'];
			$sqlSearch = "SELECT  name FROM projects WHERE name='$projectName' AND NOT id='$projectId'";
			$resultSearch = mysqli_query($conn, $sqlSearch);
			if (mysqli_num_rows($resultSearch) > 0) {
				echo "<center><span class='bg-danger'>This Project Category already exist.</span></center>";
				exit();
			}

			$sqlEdit = "SELECT id, name, category_id, image, hover_text, description FROM projects WHERE id = '$projectId'";
			$resultEdit = mysqli_query($conn, $sqlEdit);

			if (mysqli_num_rows($resultEdit) > 0) {
			    
			    while($rowEdit = mysqli_fetch_assoc($resultEdit)) {
			        
			        $idForImg = $rowEdit["id"];
			        $nameForImg = $rowEdit["name"];
			        $categoryIdForImg = $rowEdit["category_id"];
			        $imageForImg = $rowEdit["image"];
			        $hoverTextForImg = $rowEdit["hover_text"];
			        $descriptionForImg = $rowEdit["description"];
			    }
			}
			// delete file
			if (file_exists("assets/uploads/".$imageForImg)) {
			    unlink("assets/uploads/".$imageForImg);
			    echo 'File '.$imageForImg.' has been deleted';
			}

		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";

				// $sqlSearch = "SELECT  name FROM projects WHERE name='$projectName' AND NOT id='$projectId'";
				// $resultSearch = mysqli_query($conn, $sqlSearch);
				// if (mysqli_num_rows($resultSearch) > 0) {
				// 	echo "<center><span class='bg-danger'>This Project Category already exist.</span></center>";
				// } 
				//else {
					$sql = "UPDATE projects SET name='$projectName', category_id='$categoryId', image='$projectImage', hover_text='$hoverText', description='$description' WHERE id='$projectId'";
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