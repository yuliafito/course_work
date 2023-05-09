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
if(isset($_POST['phone']))
{
	$phone = $_POST['phone'];
}
if(isset($_POST['dress']))
{
	$dress = $_POST['dress'];
}
if(isset($_POST['date']))
{
	$date = $_POST['date'];
}
if(isset($_POST['message']))
{
	$message = $_POST['message'];
}



// database insert SQL code
$sql = "INSERT INTO `tbl_booking` (`id`, `name`, `email`, `phone`, `dress`, `date`, `message`) VALUES ('0', '$name', '$email', '$phone', '$dress', '$date', '$message')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Дякуємо! Вашу сукню заброньовано.";
}

?>