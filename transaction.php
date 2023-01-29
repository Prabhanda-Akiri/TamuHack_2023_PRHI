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
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="transaction.css" rel="stylesheet">
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
            <li class="active"><a href="user_home">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="user_myaccount.php">My account</a></li>
            <li><a href="history.php">History</a></li>
          </ul>
          
        </div>
        <!---transaction page-->
        <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Proceed to pay</h2>
        <label for="inputcardno" class="sr-only" >Card no</label>
        <input type="cardno" id="inputcardno" class="form-control" placeholder="Card no" required autofocus>
        <label for="inputexpirydate" class="sr-only">Expiry date</label>
        <input type="Expiry date" id="inputexpirydate" class="form-control" placeholder="Expiry date" required>
        <label for="inputotp" class="sr-only">CVV</label>
        <input type="otp" id="inputotp" class="form-control" placeholder="Enter CVV" required>
        <h4>Total price</h4>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item name</th>
                  <th>No of items</th>
                  <th>Tax</th>
                  <th>Total price</th>    
                </tr>
              </thead>
              <tbody>
                <?php
include "sql_access.php";
$up_cart='UPDATE cart c inner join product p on p.product_id=c.product_id
set c.final_cost=(p.product_price+
(p.product_price*
0.01*
(
(select s.tax from shipping_tax as s,customer as cu where cu.customer_state=s.state)+
(select cat.tax from tax cat where cat.product_category=p.product_category)-
p.product_offer
)
)
)*c.no_of_items';

$result = mysqli_query($connect,$up_cart);

//$q = "SELECT p.product_name as name, c.no_products as no, p.product_price as p, p.product_offer as offer, c.final_cost as fc from cart c inner join product p where p.product_id=c.product_id";
$q = "CREATE view view1 as SELECT p.product_name as name, c.no_products as no, p.product_price as p, p.product_offer as offer, c.final_cost as fc from cart c inner join product p where p.product_id=c.product_id";

$q2="SELECT tax from shipping_tax where state='karnataka'";
$result2 = mysqli_query($connect,$q2);
$row2 = mysqli_fetch_assoc($result2);

$result = mysqli_query($connect,$q);
$q1="SELECT * from view1";
$result1 = mysqli_query($connect,$q1);
$no_rows = mysqli_num_rows($result1);
$i=0;
if ($no_rows > 0) {
$i=1;
$sum=0;
  while($row = mysqli_fetch_assoc($result1)) {
     echo "<tr>";
     echo "<td>".$i."</td>";
     echo "<td>".$row['name']."</td>";
     echo "<td>".$row["no"]."</td>";
      echo "<td>".$row2["tax"]."</td>";
      $sum=$sum+$row["fc"];
     echo "<td>".$row["fc"]."</td>";
     $i=$i+1;
   }}
?>   
<tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><?php echo "$sum" ?></td>
                </tr>
              </tbody>
            </table>
          </div>      
        <a href="paid.php">
   <button  type="button" class="btn btn-lg btn-primary">PAY >></button>
</a>
      </form>

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

