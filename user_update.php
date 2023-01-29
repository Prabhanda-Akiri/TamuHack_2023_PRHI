<?php
    session_start();
  ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Images/icon2.png">

    <title>User Update Details</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="../bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="user_myaccount.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrap/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Flipkart</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
            <li><a href="cart.php">Cart</a></li>
            
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search for the products...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li ><a href="user_home.php">Home</a></li>
            <li class="active"><a href="#">My account<span class="sr-only">(current)</span></a></li>
            <li><a href="user_history.php">History</a></li>
          </ul>

        </div>

      <?php
        include "sql_access.php";

        $customer_id=$_SESSION['customer_id'];

        $data = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM customer WHERE customer_id=$customer_id"));
        $name = htmlspecialchars($data['customer_name'],ENT_QUOTES);
        $phone = htmlspecialchars($data['customer_ph_no'],ENT_QUOTES);
        $address = htmlspecialchars($data['customer_address'],ENT_QUOTES);
        $state = htmlspecialchars($data['customer_state'],ENT_QUOTES);
        $email = htmlspecialchars($data['customer_email'],ENT_QUOTES);


        echo '<div class="container">

          
            <form class="form-signin" method="post">
              <h2 class="form-signin-heading">Edit Details</h2><br>
              <!--<label for="inputPassword" class="sr-only">Password</label>-->
              <label>Name :</label>
              <input type="text" class="form-control" name="name" value='.$name.' ><br>
              <label>Phone number :</label>
              <input type="text" class="form-control" name="phone" value='.$phone.'><br>
              <!--<label for="inputPassword" class="sr-only">Password</label>-->
              <label>Address:</label>
              <input type="text" class="form-control" name="address" value='.$address.'><br>
              <label>State:</label>
              <input type="text" class="form-control" name="state" value='.$state.'><br>
              <!--<label for="inputPassword" class="sr-only">Email address</label>-->
              <label>Email address</label>
              <input type="email" class="form-control" name="email" value='.$email.'><br>
              <!--<label for="inputPassword" class="sr-only">Password</label>-->
              
              <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Update Details</button>
            </form>
            </div> <!-- /container -->';

        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $state=$_POST['state'];
            $email=$_POST['email'];
            $customer_id=$_SESSION['customer_id'];

            $sql="update customer set customer_name='$name', customer_ph_no=$phone, customer_address='$address', customer_state='$state', customer_email='$email' where customer_id=$customer_id";

            $retval=mysqli_query($connect,$sql);

            if(! $retval ) {
               die('Could not update data: ' . mysqli_error($connect));
            }
            echo "Updated data successfully\n";

            echo "<script> location.href='user_myaccount.php'; </script>";
            exit;
        }

    ?>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>