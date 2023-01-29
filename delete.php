<?php
include "sql_access.php";

$id = $_GET['id']; // $id is now defined
mysqli_query($connect,"DELETE FROM cart WHERE product_id='".$id."'");
//mysqli_close($connect);

header("Location: cart.php");
?> 