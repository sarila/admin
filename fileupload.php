<!DOCTYPE html>
<html>
<head>
	<title>file upload</title>
</head>
<body>
<?php
		$tmpname = $_FILES['upload']['tmp_name'];
		$size = $_FILES['upload']['size'];
		$name = $_FILES['upload']['name'];
		$type = $_FILES['upload']['type'];
		$path = "../uploads";
		$fpath = $path.$name;
		if(move_uploaded_file($tmpname, $path.$name)){
			echo "file uploaded";
			echo "<img src =$path.$name/>";
		}
		else{
			echo "something wrong";
		}

	 ?>

	<form method="POST" name="ImgUpload" action="" enctype="multipart/form-data">
		<input type="file" name="upload"/>
		<input type="submit" name="submit" value="upload"/>
		
	</form>
</body>
</html>