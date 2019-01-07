<?php
include('inc_session.php');?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Add Post</title>

    <?php include('inc_headsection.php');?>
    <link href="datatable/jquery.dataTables.min.css" type="text/css" rel="stylesheet"> 
</head>

<body>

    <div id="wrapper">

     <?php include('inc_navbar.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               <?php 
					if (isset($_POST['submit'])) 
					{
						$title = $_POST['title'];
						$keyword = $_POST['keyword'];
						$heading = $_POST['heading'];
						$description = $_POST['description'];
						$shortstory = $_POST['shortstory'];
						$fullstory = $_POST['fullstory'];
						$category_id = $_POST['category_id'];
						$postdate = date('Y-m-d');
						$tmpname = $_FILES['upload']['tmp_name'];
						$size = $_FILES['upload']['size'];
						$name = $_FILES['upload']['name'];
						$type = $_FILES['upload']['type'];
						$path = "../uploads";
						$fpath = $path.$name;
						$role= $_POST['role'];
						$status=$_POST['status'];
						$user_id = $_POST['user_id'];
						if (empty($heading) && empty($fullstory)) {
							echo "Heading and Full Story are mandatory.";
						}
						else{
							include ('connection.php');
							$input = "INSERT INTO post(title, keyword, description, heading, shortstory, fullstory, category_id, user_id, image, role, postdate, status) VALUES ('$title', '$keyword', '$description', '$heading', '$shortstory', '$fullstory', '$category_id', '$user_id', '$name', '$role', '$postdate', '$status')";
							$qry = mysqli_query($conn, $input) or die (mysqli_error());
							if ($qry) {
								echo "Post added";
								if(move_uploaded_file($tmpname, $path.$name)){
									echo "file uploaded";
									echo "<img src =$path.$name/>";
								}
								else{
									echo "something wrong";
								}
							}
							else{
								echo "Trouble posting your file.Try again later";
							}
						}
					}
				?>

				<form method="post" action="" name="addpost">
					<fieldset>
						<legend>Post your heart!!!!</legend>
						Title:   <textarea rows="2" cols="30" type="text" name="title" placeholder="title"></textarea>
						Keyword: <textarea rows="2" cols="30" placeholder="Keyword" name="keyword"></textarea><br/>
						Heading: <textarea rows="4" cols="30" placeholder="Heading" name="heading"></textarea>
						Description: <textarea rows="6" cols="30" placeholder="Description" name="description"></textarea><br/>
						Short Story: <textarea rows="6" cols="30" placeholder="ShortStory" name="shortstory"></textarea>
						Full Story: <textarea rows="10" cols="30" placeholder="Full Story" name="fullstory"></textarea><br/>
						Image: <input type="file" name="upload"/>
								<input type="submit" name="submit" value="upload"/><br>
						Role: <input type="radio" name="role" value="1">1
							<input type="radio" name="role" value="0">0
						Status: <input type="radio" name="status" value=1>active
                                <input type="radio" name="status" value=0>deactive<br/>
						<select size=1 name="category_id">
							<?php
							$stmt = "SELECT * FROM category WHERE status = 1";
							include('connection.php');
							$qry = mysqli_query($conn, $stmt);
							while($row = mysqli_fetch_array($qry))
							{
								echo "<option value =" .$row['id'] .">".$row['Name']."</option>";
							}
							mysqli_close($conn);
							?>
						</select>

						<select size=1 name="user_id">
							<?php
							$stmt = "SELECT * FROM users WHERE status = 0";
							include('connection.php');
							$qry = mysqli_query($conn, $stmt);
							while($row = mysqli_fetch_array($qry))
							{
								echo "<option value =" .$row['id'] .">".$row['username']."</option>";
							}
							mysqli_close($conn);
							?>
						</select>
						<input type="submit" name="submit" placeholder="Post" value="submit">
						<button><a href="viewpost.php">View Post</a></button>
					</fieldset>
				</form>
            </div>
            <!-- /.row -->
      
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include('inc_footerscript.php');?>

</body>

</html>