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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="user_home.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>
<style type="text/css">
  .dropbtn {
      background-color: grey;
      color: black;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      margin-left:850px;
     
  }

  .dropbtn:hover, .dropbtn:focus {
      background-color: grey;
  }

  #myInput {
      border-box: box-sizing;
      background-image: url('searchicon.png');
      background-position: 14px 12px;
      background-repeat: no-repeat;
      font-size: 16px;
      padding: 14px 20px 12px 45px;
      border: none;
      border-bottom: 1px solid #ddd;
  }
  #myInput:focus {outline: 3px solid #ddd;}
  .dropdown {
    
      position: relative;
      display: inline-block;
  }

  .dropdown-content {
  margin-left:850px;
      display: none;
      position: absolute;
      background-color: #f6f6f6;
      min-width: 230px;
      overflow: auto;
      border: 1px solid #ddd;
      z-index: 1;


  }

  .dropdown-content a {

      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
  }

  .dropdown a:hover {background-color: grey;}

  .show {display: block;}
</style>
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
       <!---  <div class="dropdown">
          <button class="dropbtn"  onclick="myFunction()">Dropdown</button>

          <div id="myDropdown" class="dropdown-content">
           <form method="get" action="home.php">
              <input type="text" class="form" placeholder="Search..." id="myInput" name="myInput">
             <button class="btn" type="submit" >Go</button>
            </form>
            <a href="#?price=true">Price</a>
            <a href="#Trending?trend=true" >Trending</a>
            <a href="#Category?cat=true">Category</a>
            <a href="#Offer?offer=true">Offer</a>
          </div>
        </div>-->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
            <li><a href="cart.php">Cart</a></li>            
          </ul>
          <form class="navbar-form navbar-right" method="get" action="home.php">
            <input type="text" class="form-control" placeholder="Search for the products..." id="myInput" name="myInput">
          </form>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="user_myaccount.php">My account</a></li>
            <li><a href="user_history.php">History</a></li>
          </ul>
        </div>

        <!-- Content div in user home -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Your Recommendations</h2><hr>
          <div class="table-responsive">
            <table class="table table-striped">

              <?php

                include "sql_access.php";

                $customer_id=$_SESSION['customer_id'];

                $sql="select p.product_name,p.product_id, p.product_offer, p.product_price from product p inner join history h on p.product_id=h.product_id where h.customer_id='$customer_id' and p.product_status='accepted' order by h.no_of_views desc limit 10";

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
                    echo '<td><a href="product_description.php?product_id='.$data['product_id'].'"><button type="button" class="btn btn-primary">View Product</button></a></td>';
                    //echo $looping;
                    echo '</tr>';
                    $looping++;
                  }
                    echo '</tbody>
                    </table>';
                }

                else
                {
                    echo '<th>No Recommendations yet</th></table>';
                }
              ?>
            
          </div>

          <h2 class="sub-header">Hot Picks for you</h2><hr>
          <div class="table-responsive">
            <table class="table table-striped">
              <?php

                include "sql_access.php";

                $customer_id=$_SESSION['customer_id'];

                $sql="select p.product_name,p.product_id,p.product_offer, p.product_price from product p inner join history h on p.product_id=h.product_id and p.product_status='accepted' group by h.product_id order by h.no_of_views desc limit 10";

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
                      </tr>
                    </thead>
                    <tbody>
                  ';

                  while ($data=mysqli_fetch_array($result))
                  {
                    echo '<tr>';
                    echo '<td>'.$data['product_name'].'</td>';
                    echo '<td>'.$data['product_price'].'</td>';
                    echo '<td>'.$data['product_offer'].'</td>';
                    echo '<td><a href="product_description.php?product_id='.$data['product_id'].'"><button type="button" class="btn btn-primary">View Product</button></a></td>';
                    echo '</tr>';
                    
                  }
                    echo '</tbody>
                    </table>';
                }

                else
                {
                    echo '<th>No Hot picks yet</th>';
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
/*  
    $sql="select p.product_id from product p";

    $result=mysqli_query($connect,$sql);

    if($_GET)
    {
    while($data=mysqli_fetch_array($result))
    {
      if(isset($_GET[$data['product_id']]))
      {
        $_SESSION['product_id']=$data['product_id'];
        echo "<script> location.href='product_description.php'; </script>";
        exit;
      }
    }
    }
*/
?>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */



function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
        } 
    }
}
</script>
