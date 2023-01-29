<?php
include "../sql_access.php";
session_start();

$accept=$_GET['acc'];
$id=$_GET['prod'];
if($accept)
	$sql = "UPDATE product SET product_status='accepted' where product_id=$id";
else
	$sql = "UPDATE product SET product_status='rejected' where product_id=$id";

if (!mysqli_query($connect,$sql))
  {
  die('Error: ' . mysqli_error("Could not execute the Query."));
  }
else
	header('Location: update_pro.php'); 

?>
