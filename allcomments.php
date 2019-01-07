<?php
include('inc_session.php');
include('function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Add comment</title>

    <?php include('inc_headsection.php');?>

</head>

<body>

    <div id="wrapper">

     <?php include('inc_navbar.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Comments</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-md-12" >
            <table class="table" id="myTable">
                <thead>
                    <tr>ID</tr>
                    <br>
                    <tr>Message</tr>
                </thead>
                <tbody>
                    <?php 
                    $stm = "SELECT * FROM comment";
                    include('connection.php');
                    $qry =mysqli_query($conn,$stm);
                    while ($row =mysqli_fetch_array($qry)) {
                        echo "<tr>";
                        echo  $row['id'];
                        echo $row['postdate'];
                        echo  $row['message'];
                        echo "<td> <a href= editdeletecomment.php?id=". $row['id']."&action=edit>EDIT </a> |<a href= editdeletecomment.php?id=". $row['id']."&action=delete>DELETE</a></td>";
                        echo "</tr>";
                     } 
                    ?>
                </tbody>
                <?php
                    if(isset($_POST['submit']))
                    {
                        $username=$_POST['username'];
                        $comment=$_POST['comment'];
                        $status = $_POST['status'];
                        $user_id = userid($id); 
                        $postdate = date('Y-m-d');    
                        $post_id = get_postid($id);  
                        if(empty($comment))
                        {
                            echo "<b>Enter Message You want to send</b>";
                        }
                        else
                        {
                            include('connection.php');
                            $input="INSERT INTO comments(post_id, user_id, comment, postdate,status) VALUES ('$post_id', '$user_id' , '$comment','$postdate', '$status')";
                            $qry=mysqli_query($conn, $input) or die(mysqli_error());
                            if($qry)
                            {
                                echo "comment added";
                            }
                            else
                            {
                                echo "Something Wrong";
                            }
                        }
                    }
                ?>
                <form method="post" name="addcomment" action="">
                    <fieldset>
                        <legend>Comment</legend>
                        Name:<br><input type="text" name="username"><br>
                        Message:<br><textarea type="text" name="comment" placeholder="Write your message here.."></textarea><br>
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
