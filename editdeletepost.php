<?php
include('inc_session.php');
include('function.php');

if (isset($_POST['update'])) {
	$uid=$_POST['uid'];
	$utitle=$_POST['utitle'];
	$ukeyword=$_POST['ukeyword'];
	$udescription=$_POST['udescription'];
	$uheading=$_POST['uheading'];
	$ushortstory=$_POST['ushortstory'];
	$ufullstory=$_POST['ufullstory'];
	$urole=$_POST['urole'];
	$ustatus=$_POST['ustatus'];
	updatePost($uid, $utitle, $ukeyword, $udescription, $uheading, $ushortstory, $ufullstory, $urole, $ustatus);
}


if (isset($_GET['id']) && isset($_GET['action'])) {
	$id = $_GET['id'];
	$action = $_GET['action'];
	if ($action =='edit') 
	{
		editPost($id);
	}
	elseif ($action =='delete') 
	{
		$res = deletePost($id);
		if ($res = 1) {
			header("Location: viewpost.php?message='Delete Success'");
		}
		else{
			header("Location: viewpost.php?message='Delete failed'");
		}
	}
	else{
		header("Location: viewpost.php");
	}

}
else {
	header("Location: viewpost.php");
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