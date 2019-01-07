<?php
include('inc_session.php');?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title></title>

    <?php include('inc_headsection.php');?>
    <link href="datatable/jquery.dataTables.min.css" type="text/css" rel="stylesheet"> 
</head>

<body>

    <div id="wrapper">

     <?php include('inc_navbar.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gallery</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php 
                    if (isset($_POST['submit'])) 
                    {
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $post_id = $_POST['post_id'];
                        $user_id = $_POST['user_id'];
                        $tmpname = $_FILES['upload']['tmp_name'];
                        $size = $_FILES['upload']['size'];
                        $name = $_FILES['upload']['name'];
                        $type = $_FILES['upload']['type'];
                        $path = "../uploads";
                        $fpath = $path.$name;
                        if(move_uploaded_file($tmpname, $path.$name)){
                            include ('connection.php');
                            $input = "INSERT INTO gallery(title, description, image, type, post_id, user_id, status ) VALUES ('$title', '$description', '$image','$type', '$post_id', '$user_id')";
                            $qry = mysqli_query($conn, $input) or die (mysqli_error());
                            if ($qry) {
                                echo "Photo added<br/>";
                                echo "<img src =$path.$name/>";
                            }
                            else{
                                echo "Trouble posting your file.Try again later";
                            }
                            
                        }
                        else{
                            echo "something wrong";
                        }
                    }
                ?>
               <form method="post" action="" name="addphotos" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Save your Moments</legend>
                        Title: <br/>  <textarea rows="2" cols="30" type="text" name="title" placeholder="title"></textarea><br/>
                        Description:<br/> <textarea rows="6" cols="30" placeholder="Description" name="description"></textarea><br/>
                        Image:<input type="file" name="upload"><br/>
                        Type:<select>
                            <option value="banner" name="banner">Banner</option>
                            <option value="photo" name="photo">Photos</option>
                            <option value="logo" name="logo">logo</option>
                        </select><br/>
                        Category:
                        <select size=1 name="post_id">
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
                        </select><br/>
                        User:
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
                        <br/>
                        <input type="submit" name="submit" placeholder="Post" value="submit">
                        <button><a href="viewphotos.php">View Photos</a></button>
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
