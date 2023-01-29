
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

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cart.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
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
          <!--
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        -->
        </div>

        <!-- Content div in user home -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Cart</h2><hr>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product Name</th>
                  <th>No of products</th>
                  <th>Price of each product</th>
                  <th>Discount</th>
                  <th>Total price</th>
                  <th>Delete Product</th>
                </tr>
              </thead>
<tbody>

<?php
include "sql_access.php";
$q = "SELECT p.product_id as id,p.product_name as name, c.no_products as no, p.product_price as p, p.product_offer as offer from cart c inner join product p where p.product_id=c.product_id";
$result = mysqli_query($connect,$q);
$no_rows = mysqli_num_rows($result);
$i=0;
if ($no_rows > 0) {
$i=1;
  while($row = mysqli_fetch_assoc($result)) {
    $pid=$row['id'];
     echo "<tr>";
     echo "<td>".$i."</td>";
     echo "<td>".$row['name']."</td>";
     echo "<td>".$row["no"]."</td>";
     echo "<td>".$row["p"]."</td>";
     echo "<td>".$row["offer"]."</td>";
     echo "<td>".($row["p"]-($row["offer"]*0.01))*$row["no"]."</td>";
     
     //echo "<td>";
     echo "<td><a href=\"delete.php?id=".$row['id']."\">Delete</a></td>";

$i=$i+1;
}
}
 ?>
              </tbody>
            </table>
          </div>
<a href="transaction.php">
   <button  type="button" class="btn btn-lg btn-primary">Proceed >></button>
</a>

          
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