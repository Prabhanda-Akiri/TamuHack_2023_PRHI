<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sign-in Admin</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container" id=#c>

      <form class="form-signin" method="POST" action="">
        <h2 class="form-signin-heading">Please Sign In:</h2>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
      </form>
    </div>
  </body>
</html>
<?php
include "../sql_access.php";
IF(ISSET($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];
$cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'"));
$data = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'"));
IF($cek > 0)
{
 session_start();
 $_SESSION['name'] = $data['admin_name'];
 echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='admin_home.php';</script>";
}else{
 echo "<script language=\"javascript\">alert(\"Invalid username or password\");document.location.href='a_login.php';</script>";
}
}
?>

