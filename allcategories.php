<?php
include('inc_session.php');?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>All Categories</title>

    <?php include('inc_headsection.php');?>
    <link href="datatable/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

     <?php include('inc_navbar.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Categories</h1>
                     <?php
                        if (isset($_GET['message'])) {
                            echo "<span class = 'alertalert-success'>". $_GET['message']."</span>";
                        }
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="col-md-12" >
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Category Name</td>
                            <td>status</td>
                            <td>functions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //selecting all users
                        $stm = "SELECT * FROM category";
                        //making connection
                        include('connection.php');
                        //query
                        $qry =mysqli_query($conn,$stm);
                        //fetching and printing data
                        while ($row =mysqli_fetch_array($qry)) {
                            echo "<tr>";
                            echo "<td>" . $row['id']."</td>";
                            echo "<td>" . $row['Name']."</td>";
                            echo "<td>" . $row['status']."</td>";
                            echo "<td> <a href= editdeletecategory.php?id=". $row['id']."&action=edit>EDIT </a> |<a href= editdeletecategory.php?id=". $row['id']."&action=delete>DELETE</a></td>";
                            echo "</tr>";
                         } 
                        ?>
                    </tbody>
                    <tr>
                        <td><button><a href="addcategory.php">Add categories</a></button></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include('inc_footerscript.php');?>

</body>

</html>
