<?php
	require 'php/connection.php';
	if(!isset($_SESSION['Username'])){
	header("location: login.php");
	}
	
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$file = $_FILES['image'];
		
		$fileSize = $file["size"];
		
		$img = $_FILES['image']['name'];
		$sql = $link->query("INSERT INTO tbluploadimages values ('NULL','$name','$img')");
		if($fileSize < 2000000 And $fileSize != 0 ){
			move_uploaded_file($_FILES['image']['tmp_name'], "pictures/$img");
			echo "<script>alert('".$fileSize."B Image has been Uploaded')</script>";
		}else{
			echo "<script>alert('Image size is greater than 2000000B!')</script>";
			echo "<script>alert('Upload Failed')</script>";
		}
		
	}
	
?>

<html>
	<head>
		<title>Image Upload</title>
		<link rel = "stylesheet" type = "text/css" href = "Css/client_design_Reg.css">
	</head>
	
	<body>
		
		<form action = "" method = "post" enctype = "multipart/form-data">
			
			<div class = "file_inner_image">
			<h2 style = "color:black" class = "infoprofile">Profile Picture</h2>
			<label style = "color:white">Name</label>
			<input type = "text" name = "name" required>
			<br>
			<label style = "color:white">Select Image to Upload (2000000B or 2MB)</label>
			<label style = "color:white"><input type = "file" name = "image" required></label>
			<input type = "submit" name = "submit" value = "Upload"><br>
			</div>
		</form>
		</div>
	</body>
</html>