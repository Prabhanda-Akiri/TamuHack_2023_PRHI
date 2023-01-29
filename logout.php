<?php 
	
session_start();
  if(session_unset())
  {
  echo "hi";
  session_destroy(); //destroy the session
  header("location:nav_home.php"); //to redirect back to "index.php" after logging out
  exit();
}
echo "hi";


?>