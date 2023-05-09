<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','db_connect');

// get the post records
if(isset($_POST['name']))
{
	$name = $_POST['name'];
}
if(isset($_POST['email']))
{
	$email = $_POST['email'];
}
if(isset($_POST['password']))
{
	$password = $_POST['password'];
}

if(!empty($name)){
   $sql = "INSERT INTO `tbl_registration` (`id`, `name`, `email`, `password`) VALUES ('0', '$name', '$email', '$password')";
 
}

// database insert SQL code

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Дякуємо! Вашу сукню заброньовано.";
}

?>