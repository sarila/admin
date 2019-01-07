<?php
$stmt="CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL ,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    role TINYINT(2) NOT NULL,
    status TINYINT(1) NOT NULL,
    UNIQUE (username),
    UNIQUE (email)    
)";
include('connection.php');
$qry=mysqli_query($conn, $stmt) or die(mysqli_error());
if($qry)
{	
	echo " User Table Created Successfully";
}
else {
	echo "Error Creating table or might be exist";
}
mysqli_close($conn);
?>

<?php
include('connection.php');
$stmt="CREATE TABLE IF NOT EXISTS category(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
status TINYINT(1) NOT NULL,
UNIQUE (name)
)";
$qry=mysqli_query($conn,$stmt) or die(mysqli_error());
if($qry)
{
	echo "Table Created Successfully for category";
}
else
{
	echo "Error Creating table or might exist";
}
mysqli_close($conn);
?>

<?php
include('connection.php');
$stmt="CREATE TABLE IF NOT EXISTS post(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL ,
    keyword VARCHAR(250) NOT NULL,
    description VARCHAR(250) NOT NULL,
    heading VARCHAR(150) NOT NULL,
    shortstory VARCHAR(250) NOT NULL,
    fullstory VARCHAR(500) NOT NULL,
    category_id TINYINT(4) NOT NULL,
    user_id TINYINT(4) NOT NULL,
    image VARCHAR(100) NOT NULL,
    role TINYINT(2) NOT NULL,
    postdate VARCHAR(50) NOT NULL,
    status TINYINT(1) NOT NULL,
    UNIQUE (heading)   
)";
$qry=mysqli_query($conn, $stmt) or die(mysqli_error());
if($qry)
{	echo "Post table Created Successfully";}
else {
    echo "Error Creating table or might be exist";
}
mysqli_close($conn); 
?>


<?php
$stmt="CREATE TABLE IF NOT EXISTS comments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id TINYINT(4) NOT NULL ,
    user_id TINYINT(4) NOT NULL,
    comment VARCHAR(50) NOT NULL,
    postdate VARCHAR(50) NOT NULL,
    status TINYINT(1) NOT NULL  
)";
include('connection.php');
$qry=mysqli_query($conn, $stmt) or die(mysqli_error());
if($qry)
{	echo "Comment Table Created Successfully";}
else {echo "Error Creating table or might be exist";
}
mysqli_close($conn);
?>

<?php
$stmt="CREATE TABLE IF NOT EXISTS gallery(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250) NOT NULL ,
    description VARCHAR(250) NOT NULL,
    image VARCHAR(250) NOT NULL,
    type TINYINT(2) NOT NULL,
    post_id TINYINT(4) NOT NULL ,
    user_id TINYINT(4) NOT NULL,
    status TINYINT(1) NOT NULL  
)";
include('connection.php');
$qry=mysqli_query($conn, $stmt) or die(mysqli_error());
if($qry)
{   echo "Gallery Table Created Successfully";}
else {echo "Error Creating table or might be exist";
}
mysqli_close($conn);
?>
