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
            <li class="active"><a href="user_home.php">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="user_myaccount.php">My account</a></li>
            <li><a href="user_history.php">History</a></li>
          </ul>
        </div>

        <!-- Content div in user home -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <div class="inner cover">

            <?php

              include "sql_access.php";
              $id=$_GET['product_id'];

              $sql="select * from product where product_id=$id and product_status='accepted'";

              $result=mysqli_fetch_array(mysqli_query($connect,$sql));
  
              echo '

            <h1 class="cover-heading">'.$result['product_name'].'</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>

            <div class="table-responsive">
            <table class="table table-striped">

              <tr>
                <td><label>Product: </label><br></td>
                <td>'.$result['product_name'].'</td>
              </tr>
              <tr>
                <td><label>Product Category: </label><br></td>
                <td>'.$result['product_category'].'</td>
              </tr>
              <tr>
                <td><label>Description: </label><br></td>
                <td>'.$result['product_description'].'</td>
              </tr>
              <tr>
                <td><label>Price: </label><br></td>
                <td>'.$result['product_price'].'</td>
              </tr>
              <tr>
                <td><label>Offer: </label><br></td>
                <td>'.$result['product_offer'].'</td>
              </tr>';

              ?>
            </table>
          </div>
              <form method="post">
               <button type="submit" class="btn btn-lg btn-warning" name="submit">Add to cart</button>
              </form>

              <?php

              include "sql_access.php";

              $product_id=$_GET['product_id'];

              if(isset($_POST['submit']))
              {
                try{
                    $sql="insert into cart(product_id) values($product_id)";
                    $retval=mysqli_query($connect,$sql);
                  }
                catch(exception $e){ }

                $sql="select no_products from cart where product_id=$product_id ";
                $data=mysqli_fetch_array(mysqli_query($connect,$sql));

                $val=$data['no_products'];

                $val++;

                $sql="update cart set no_products=$val where product_id=$product_id";
                $retval=mysqli_query($connect,$sql);

                if(! $retval ) {
                   die('Could not update data: ' . mysqli_error($connect));
                }

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

<?php

  include "sql_access.php";

  $product_id=$_GET['product_id'];
  $customer_id=$_SESSION['customer_id'];


    $sql="select * from history where product_id=$product_id and customer_id=$customer_id";
    $data=mysqli_fetch_array(mysqli_query($connect,$sql));
    $chk=mysqli_num_rows(mysqli_query($connect,$sql));

    if($chk>0)
    {
    $val=$data['no_of_views'];

    $val++;

    $sql="update history set no_of_views=$val where product_id=$product_id and customer_id=$customer_id";
    $retval=mysqli_query($connect,$sql);

    if(! $retval ) {
       die('Could not update data: ' . mysqli_error($connect));
    }
    }
    else
    {
      $sql="insert into history(customer_id,product_id,no_of_views) values($customer_id,$product_id,1)";
      $retval=mysqli_query($connect,$sql);
    }

?>