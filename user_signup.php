
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Images/icon2.png">
    

    <title>User Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
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
      .form-signin input[type="name"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
      .form-signin input[type="text"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }

      .form-signin input[type="number"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>
    
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
      </header>

      <main role="main" class="inner cover" id="Main">
        <div id="display">
            <form class="form-signin" action="" method="POST">
              <h1 class="h4 mb-4 font-weight-normal">Let's get started!<br>Sign up below</h1>
              <label for="Name" class="sr-only"> Name</label>
              <input type="name" id="name" class="form-control" name="name" placeholder="Full Name " required autofocus>

              <label for="inputEmail" class="sr-only">Email address</label>
              <input type="email" id="inputEmail" class="form-control" name="mail" placeholder="Email ID" required autofocus>

              <label for="roomno" class="sr-only">Room No.</label>
              <input type="number" id="roomno" class="form-control" name="roomno" placeholder="Room Number" required autofocus>
			
			<!--
              <label for="address" class="sr-only">Address</label>
              <input type="text" id="address" class="form-control" name="address" placeholder="Enter Address" required autofocus>

              <label for="state" class="sr-only">Home State</label>
              <input type="name" id="state" class="form-control" name="state" placeholder="Enter your State" required autofocus>-->

              <label for="password" class="sr-only">Password</label>
              <input type="password" id="passwd" class="form-control" name="passwd" placeholder="Enter your Password" required>
			  
			  <label for="password" class="sr-only">Password</label>
              <input type="password" id="passwd" class="form-control" name="passwd" placeholder="Confirm your Password" required>
   
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="sup">Sign up</button>
         
            </form>
			<div class="mastfoot mt-auto">
          <p>Already Have an account?</a> <a href="u_login.php">Sign in here</a></p>
        </div>
          </div>
        </main>
		<footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Sign Up page for INPAT</a>
          <!-- , by  <a href="https://www.linkedin.com/in/sahithi-akiri-901116147/" target="_blank">Sahithi Akiri</a>. -->
          </p>
        </div>
      </footer>
    </div>
  </body>
</html>

<?php
include "sql_access.php";

IF(ISSET($_POST['sup'])){
$sql="INSERT INTO patient(patient_name,patient_password,patient_user_id,patient_room_no) VALUES

('$_POST[name]','$_POST[passwd]','$_POST[mail]','$_POST[roomno]')";

if (!mysqli_query($connect,$sql))
  {
  die('Error: ' . mysqli_error("could not sign in"));
  }
else
  echo "<script language=\"javascript\">alert(\"Successfully signed up\");document.location.href='u_login.php';</script>";

//mysqli_close($connect)
}
?>



