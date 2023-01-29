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
    <link rel="icon" href="../../favicon.ico">

    <title>User Home</title>

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
    <link href="user_home.css" rel="stylesheet">

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
            <li><a href="user_home.php">Home</a></li>
            <li><a href="user_myaccount.php">My account</a></li>
            <li class="active"><a href="#">History<span class="sr-only">(current)</span></a></li>
          </ul>
        </div>

        <!-- Content div in user home -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Your History</h2><hr>
          <div class="table-responsive">
            <table class="table table-striped">

              <?php

                include "sql_access.php";

                $customer_id=$_SESSION['customer_id'];

                $sql="select p.product_name,h.no_of_views, p.product_offer, p.product_price from product p inner join history h on p.product_id=h.product_id where h.customer_id='$customer_id' and p.product_status='accepted'";

                $result=mysqli_query($connect,$sql);
                $chck=mysqli_num_rows($result);

                if($chck>0)
                {
                  echo '
                     <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Offer</th>
                        <th>Number of times viewed</th>
                      </tr>
                    </thead>
                    <tbody>
                  ';
                  $looping=0;
                  while ($data=mysqli_fetch_array($result))
                  {
                    echo '<tr>';
                    echo '<td>'.$data['product_name'].'</td>';
                    echo '<td>'.$data['product_price'].'</td>';
                    echo '<td>'.$data['product_offer'].'</td>';
                    echo '<td>'.$data['no_of_views'].'</td>';
                    //echo $looping;
                    echo '</tr>';
                    $looping++;
                  }
                    echo '</tbody>
                    </table>';
                }

                else
                {
                    echo '<th>No Recommendations yet</th>';
                }
              ?>
            
          </div>


        </div>
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

