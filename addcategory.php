<?php
include('inc_session.php');?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Add categories</title>

    <?php include('inc_headsection.php');?>

</head>

<body>

    <div id="wrapper">

     <?php include('inc_navbar.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               
                <?php
                    if(isset($_POST['submit']))
                    {
                        $categoryname=$_POST['categoryname'];
                        $status = $_POST['status'];
                        if(empty($categoryname))
                        {
                            echo "<b>Enter the Name of category</b>";
                        }
                        else
                        {
                            include('connection.php');
                            $input="INSERT INTO category(name, status) VALUES ('$categoryname', '$status')";
                            $qry=mysqli_query($conn, $input) or die(mysqli_error());
                            if($qry)
                            {
                                echo "category added";
                            }
                            else
                            {
                                echo "Something Wrong";
                            }
                        }
                    }
                ?>
                <form method="post" name="addcategory" action="">
                    <fieldset>
                        <legend>Add category</legend>
                        Name:<input type="text" name="categoryname" placeholder="category name">
                        Status: <input type="radio" name="status" value=1>active
                                <input type="radio" name="status" value=0>deactive<br/>
                        <input type="submit" name="submit" value="submit">
                        <button><a href="allcategories.php">View Category</a></button>
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
