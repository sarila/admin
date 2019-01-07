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
                    <h1 class="page-header">ALL POST</h1>
                    <?php
						if (isset($_GET['message'])) {
							echo "<h2><span class = 'alertalert-success'>". $_GET['message']."</span><h2>";
						}
					?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               <div class="col-md-12" >
				<table class="table" id="myTable">
					<thead>
						<tr>
							<td>ID</td>
							<td>Title</td>
							<td>Heading</td>
							<td>Keywords</td>
							<td>Description</td>
							<td>Shortstory</td>
							<td>Fullstory</td>
							<td>Category Id</td>
							<td>UserId</td>
							<td>Image</td>
							<td>Role</td>
							<td>PostDate</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						$stm = "SELECT * FROM post";
						include('connection.php');
						$qry =mysqli_query($conn,$stm);
						while ($row =mysqli_fetch_array($qry)) {
							echo "<tr>";
						 	echo "<td>" . $row['id']."</td>";
						 	echo "<td>" . $row['title']."</td>";
						 	echo "<td>" . $row['heading']."</td>";						 	
						 	echo "<td>" . $row['keyword']."</td>";
						 	echo "<td>" . $row['description']."</td>";
						 	echo "<td>" . $row['shortstory']."</td>";
						 	echo "<td>" . $row['fullstory']."</td>";
						 	echo "<td>" . $row['category_id']."</td>";
						 	echo "<td>" . $row['user_id']."</td>";
						 	echo "<td>" . $row['image']."</td>";
						 	echo "<td>" . $row['role']."</td>";
						 	echo "<td>" . $row['postdate']."</td>";
						 	echo "<td>" . $row['status']."</td>";
						 	echo "<td> <a href= editdeletepost.php?id=". $row['id']."&action=edit>EDIT </a> |<a href= editdeletepost.php?id=". $row['id']."&action=delete>DELETE</a></td>";
						 	echo "</tr>";
						 } 
						?>
					</tbody>
					<tr>
						<td><button><a href="addpost.php">Add Post</a></button></td>
					</tr>
				</table>
			</div>

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