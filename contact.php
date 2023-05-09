<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','db_connect');

// get the post records
$name = $_POST['name'];
$phone = $_POST['phone'];


// database insert SQL code
$sql = "INSERT INTO `tbl_connect` (`id`, `name`, `phone`) VALUES ('0', '$name', '$phone')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Дякуємо! Ваші дані отримано. Скоро наш адміністратор зв'яжеться з Вами.";
}

?>