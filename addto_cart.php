<?php
include "sql_access.php";

$id = $_GET['id']; // $id is now defined
//mysqli_query($connect,"DELETE FROM cart WHERE product_id='".$id."'");
//check if already present in cart
$result=mysqli_query($connect,"SELECT from cart where product_id='".$id."'");
$no_rows = mysqli_num_rows($result);
if(no_rows>0){
$result2=mysqli_query($connect,"SELECT no_products from cart where product_id='".$id."'");
$row = mysqli_fetch_assoc($result2);
$no=$row[no_products]+1;
mysqli_query($connect,"INSERT INTO cart(no_products) values('$no') where product_id='".$id."'");
}
else{

mysqli_query($connect,"INSERT INTO cart values('$id','$no')";
}
//mysqli_query($connect,"INSERT INTO cart values('".$id."'",);
//mysqli_close($connect);

header("Location: cart.php");
?> 