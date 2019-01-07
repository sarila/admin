<?php
include('inc_session.php');
include('function.php');

if (isset($_POST['update'])) {
	$uid=$_POST['uid'];
	$uname=$_POST['uname'];
	$upassword=$_POST['upassword'];
	$uemail=$_POST['uemail'];
	$urole=$_POST['urole'];
	$ustatus=$_POST['ustatus'];
	$repassword=$_POST['repassword'];
	if ($upassword == $repassword) {
		updateUser($uid, $uname, $upassword, $uemail, $urole, $ustatus);
	}
	else{
		echo "Password didnot matched";
	}
	
}


if (isset($_GET['id']) && isset($_GET['action'])) {
	$id = $_GET['id'];
	$action = $_GET['action'];
	if ($action =='edit') 
	{
		editUser($id);
	}
	elseif ($action =='delete') 
	{
		$res = deleteUser($id);
		if ($res = 1) {
			header("Location: allusers.php?message='Delete Success'");
		}
		else{
			header("Location: allusers.php?message='Delete failed'");
		}
	}
	else{
		header("Location: allusers.php");
	}

}
else {
	header("Location: allusers.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit or Delete</title>
</head>
<body>

</body>
</html>