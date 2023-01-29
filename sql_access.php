<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "tamuhack";

$connect=mysqli_connect($hostname,$username,$password) or die ("connection failed");
mysqli_select_db($connect,$database) or die ("error connect database");
?>