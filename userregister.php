<?php
//checking the form is submitted or not
if(isset($_POST['submit']))
{
    if (empty($username)) {
        echo "Please Enter Username";
    }
    if (empty($password)) {
        echo "Please Enter Password";
    }
    if (empty($email)) {
        echo "Please Enter Email address";
    }
    //getting the data from form
    else{
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $email=$_POST['email'];
        $role=$_POST['role'];

        //making statement
        $stmt="INSERT INTO  users(username, password, email, role, status) VALUES ('$username', '$password', '$email', $role, 0)";
        //making connection
        include('connection.php');
        //making query
        $qry=mysqli_query($conn, $stmt) or die(mysqli_error());
        //giving the message
        if($qry)
        { echo "User Registered";}
        else {echo "Somthing wrong while register the user";}
    }
}
   
?>
<?php
include('inc_session.php');?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title> UserRegister</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <?php include('inc_headsection.php');?>
    <link href="datatable/jquery.dataTables.min.css" type="text/css" rel="stylesheet"> 
</head>

<body>

    <div id="wrapper">

     <?php include('inc_navbar.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form method="post" action="" name="frmRegister" enctype="multipart/form-data">
                    <input type="text" name="username" placeholder="Username"><br/>
                    <input type="password" name="password" placeholder="Password"><br/>
                    <input type="email" name="email" placeholder="you@example.com"><br/>
                    <input type="radio" name="role" value="1"> Admin
                    <input type="radio" name="role" value="2" checked=""> User<br/>
                    <input type="submit" name="submit" value="Register"><br/>
                </form>
                <button><a href="allusers.php">All Users</a></button>
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