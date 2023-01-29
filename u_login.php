<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sign-in User</title>

    <!-- Bootstrap -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.1/examples/cover/cover.css" rel="stylesheet">
  <style type="text/css">
     .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin .checkbox {
        font-weight: normal;
      }
      .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }

      .form-signin input[type="email"] {
        margin-bottom: 10px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
  </style>
  <link rel="icon" href="cp2.png">
  </head>

  <body class="text-center">

   <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" style='background-color: #7c917f;max-width: 80em;'>
      <header class="masthead mb-60">
        <h3 class="masthead-brand" style="font-family: 'Merienda'; font-size: 38px;"><b>INPAT</b></h3>
        <div class="inner">
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="nav_home.php">Home</a>
            <a class="nav-link" href="u_login.php" id="login">Login</a>
            <a class="nav-link" href="user_signup.php" id="reg">Register</a>
            <a class="nav-link" href="contact2.php" id="contact">Contact Us</a>
          </nav>
        </div>
		<br>
		<!--img src="cp2.png" style="max-width: 36%;height: auto;"-->
      </header>
    
      <main role="main" class="inner cover" id="Main">
        <div id="display">
            <form class="form-signin" method="post" action="">
              <img src="">


              <h1 class="h4 mb-4 font-weight-normal">Sign in to <b>INPAT</b></h1>
              <input type="radio" name="usertype" id="Nursing_Station" value=1 />
              <label for="Nursing_Station">Nursing Station</label>

              <input type="radio" name="usertype" id="Patient" value=2 />
              <label for="Patient">Patient</label>

              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
            </form>			
			<div class="mastfoot mt-auto">
          <p>New User?</a> <a href="user_signup.php">Create an account</a></p>
        </div>
        </div>
      </main>
    </div>
  </body>
</html>

<?php
include "sql_access.php";

IF(ISSET($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];

echo "<script>console.log('hello nurse');</script>";
IF($_POST['usertype']==1){
  // echo "<script>console.log('hello outside');</script>";
  $cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM nursing_station WHERE nurse_user_id='$email' AND nurse_password='$password'"));
  $data = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM nursing_station WHERE nurse_user_id='$email' AND nurse_password='$password'"));
  IF($cek > 0)
  {
    session_start();
    $_SESSION['nurse_user_id']=$data['nurse_user_id'];
    
    echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='user_home.php';</script>";
    
  }else{
    echo "<script language=\"javascript\">alert(\"Invalid username or password\");document.location.href='u_login.php';</script>";
  }
}
else{
  // echo "<script>console.log('hello patient');</script>";
  $cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM patient WHERE patient_user_id='$email' AND patient_password='$password'"));
  $data = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM patient WHERE patient_user_id='$email' AND patient_password='$password'"));
  IF($cek > 0)
  {
    session_start();
    $_SESSION['patient_id'] = $data['patient_id'];
    $_SESSION['name'] = $data['patient_name'];
    $_SESSION['patient_user_id']=$data['patient_user_id'];

    echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='user_home.php';</script>";
    
  }else{
    echo "<script language=\"javascript\">alert(\"Invalid username or password\");document.location.href='u_login.php';</script>";
  }
}
}
?>