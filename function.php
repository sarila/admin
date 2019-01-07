<?php 
function deleteCategory($id)
{
	$stmt = "DELETE FROM category WHERE id=$id";
	include ('connection.php');
	$qry= mysqli_query($conn, $stmt);
	if ($qry) {
		return 1;
	}
	else{
		return 0;
	}
	mysqli_free_result();
	mysqli_close($conn);
}

function editCategory($id)
{
	$stmt = "SELECT * FROM category WHERE id=$id";
	include ('connection.php');
	$qry= mysqli_query($conn, $stmt);
	while ($row=mysqli_fetch_assoc($qry)) {
		$uid=$row['id'];
		$uname=$row['name'];
		$ustatus=$row['status'];
	}
	echo "<form method='post' name= 'editCategory' action='' enctype='multipart/form-data'>
		<fieldset>
			<legend>EDIT</legend>
			<input type='hidden' name='uid' value='$uid'><br/>
			<input type='text' name='uname' value='$uname'><br/>
			<input type='text' name='ustatus' value='$ustatus'><br/>
			<input type='submit' name='update' value='UPDATE'>
		</fieldset>
	</form>
	";

	mysqli_free_result($qry);
	mysqli_close($conn);
}

function updateCategory($uid, $uname, $ustatus){

	$stmt = "UPDATE category SET name='$uname', status='$ustatus' WHERE id=$uid ";
	include ('connection.php');
	$qry= mysqli_query($conn, $stmt);
	if ($qry) {
		header("location:allcategories.php?message='Update Success'");
	}
	else{
		header("location:allcategories.php?message='Update Error'");

	}
	mysqli_free_result();
	mysqli_close($conn);
}

function deletePost($id){
	$stmt = "DELETE FROM post WHERE id=$id";
	include ('connection.php');
	$qry= mysqli_query($conn, $stmt);
	if ($qry) {
		return 1;
	}
	else{
		return 0;
	}
	mysqli_free_result();
	mysqli_close($conn);
}

function editPost($id)
{
	$stmt = "SELECT * FROM post WHERE id=$id";
	include ('connection.php');
	$qry= mysqli_query($conn, $stmt);
	while ($row=mysqli_fetch_assoc($qry)) {
		$uid=$row['id'];
		$utitle=$row['title'];
		$ukeyword=$row['keyword'];
		$udescription=$row['description'];
		$uheading=$row['heading'];
		$ushortstory=$row['shortstory'];
		$ufullstory=$row['fullstory'];
		$ucategory_id=$row['category_id'];
		$uuser_id=$row['user_id'];
		$uimage=$row['image'];
		$urole=$row['role'];
		$upostdate=$row['postdate'];
		$ustatus=$row['status'];
	}
	echo "<form method='post' name= 'editCategory' action='' enctype='multipart/form-data'>
		<fieldset>
			<legend>EDIT</legend>
			id:<input type='hidden' name='uid' value='$uid'><br/>
			Title:<textarea type='text' name='utitle'>$utitle</textarea><br/>
			Keyword:<textarea row=3 cols=50 type='text' name='ukeyword'>$ukeyword</textarea><br/>
			description:<textarea row=3 cols=50 type='text' name='udescription'>$udescription</textarea><br/>
			heading:<textarea row=3 cols=50 type='text' name='uheading' value='$'>$uheading</textarea><br/>
			shortstory:<textarea row=10 cols=50 type='text' name='ushortstory'>$ushortstory</textarea><br/>
			fullstory'<textarea row=20 cols=50 type='text' name='ufullstory'>$ufullstory</textarea><br/>
			role:<input type='text' name='urole' value='$urole'><br/>
			status:<input type='text' name='ustatus' value='$ustatus'><br/>
			<input type='submit' name='update' value='UPDATE'>
		</fieldset>
	</form>
	";

	mysqli_free_result($qry);
	mysqli_close($conn);
}

function updatePost($uid, $utitle, $ukeyword, $udescription, $uheading, $ushortstory, $ufullstory, $urole, $ustatus){

	$stmt = "UPDATE post SET title='$utitle', keyword='$ukeyword', description='$udescription', heading='$uheading', shortstory='$ushortstory', fullstory='$ufullstory', role='$urole', status='$ustatus' WHERE id=$uid ";
	include ('connection.php');
	$qry= mysqli_query($conn, $stmt);
	if ($qry) {
		header("location:viewpost.php?message='Update Success'");
	}
	else{
		header("location:viewpost.php?message='Update Error'");

	}
	mysqli_free_result($qry);
	mysqli_close($conn);
}

function userid($id)
{
	$stmt = "SELECT * from users WHERE id=$id";
	include('connection.php');
	$qry= mysqli_query($conn, $stmt);
	while ($row =mysqli_fetch_array($qry)) {
		$uid= $row['id'];
	 }
	
	if ($qry) {
		return $uid;
	}
	else{
		return 0;
	}
	mysqli_free_result($qry);
	mysqli_close($conn);
}

function get_postid($id)
{  
	$stm = "SELECT * FROM post";
	include('connection.php');
	$qry =mysqli_query($conn,$stm);
	while ($row =mysqli_fetch_array($qry)) {
		$pid= $row['id'];
	 }
	if ($qry) {
		return $pid;
	}
	else{
		return 0;
	}
	mysqli_free_result($qry);
	mysqli_close($conn);
}

function deleteUser($id)
{
	$stmt = "DELETE FROM users WHERE id=$id";
	include ('connection.php');
	$qry= mysqli_query($conn, $stmt);
	if ($qry) {
		return 1;
	}
	else{
		return 0;
	}
	mysqli_free_result();
	mysqli_close($conn);
}

function editUser($id)
{
	$stmt = "SELECT * FROM users WHERE id=$id";
	include ('connection.php');
	$qry= mysqli_query($conn, $stmt);
	while ($row=mysqli_fetch_assoc($qry)) {
		$uid=$row['id'];
		$uname=$row['username'];
		$upassword=$row['password'];
		$uemail=$row['email'];
		$urole=$row['role'];
		$ustatus=$row['status'];
	}
	echo "<form method='post' name= 'editUser' action='' enctype='multipart/form-data'>
		<fieldset>
			<legend>EDIT</legend>
			<input type='hidden' name='uid' value='$uid'><br/>
			Username:<br><input type='text' name='uname' value='$uname'><br/>
			Password:<br><input type='password' name='upassword' value='$upassword'><br/>
			Re-type Password:<br><input type='password' name='repassword' value='$upassword'><br/> 
			E-mail:<br><input type='text' name='uemail' value='$uemail'><br/> 
			Role:<br/><input type='text' name='urole' value='$urole'><br/>
			status:<br/><input type='text' name='ustatus' value='$ustatus'><br/>
			<input type='submit' name='update' value='UPDATE'>
		</fieldset>
	</form>
	";

	mysqli_free_result($qry);
	mysqli_close($conn);
}

function updateUser($uid, $uname,$upassword,$uemail,$urole, $ustatus){

	$stmt = "UPDATE users SET username='$uname', password='$upassword', email='$uemail', role='$urole', status='$ustatus' WHERE id=$uid ";
	include ('connection.php');
	$qry= mysqli_query($conn, $stmt);
	if ($qry) {
		header("location:allusers.php?message='Update Success'");
	}
	else{
		header("location:allusers.php?message='Update Error'");

	}
	mysqli_free_result();
	mysqli_close($conn);
}
?>