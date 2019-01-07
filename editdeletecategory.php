<?php
include('inc_session.php');
include('function.php');

if (isset($_POST['update'])) {
	$uid=$_POST['uid'];
	$uname=$_POST['uname'];
	$ustatus=$_POST['ustatus'];
	updateCategory($uid, $uname, $ustatus);
}


if (isset($_GET['id']) && isset($_GET['action'])) {
	$id = $_GET['id'];
	$action = $_GET['action'];
	if ($action =='edit') 
	{
		editCategory($id);
	}
	elseif ($action =='delete') 
	{
		$res = deleteCategory($id);
		if ($res = 1) {
			header("Location: allcategories.php?message='Delete Success'");
		}
		else{
			header("Location: allcategories.php?message='Delete failed'");
		}
	}
	else{
		header("Location: allcategories.php");
	}

}
else {
	header("Location: allcategories.php");
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