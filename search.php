<?php include "sql_access.php";
  session_start();
  $string=$_GET['myInput'];
  //echo "$string";
  $len=str_word_count($string);
  //echo "$len";
$pieces = explode(" ", $string);
//echo $pieces[0]; // piece1
//echo $pieces[1]; // piece2

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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
</head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Dashboard Template for Bootstrap</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="cart.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
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
          <form class="navbar-form navbar-right" method="get" action="home.php">
            <input type="text" class="form-control" placeholder="Search for the products..." id="myInput" name="myInput">
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
            <li><a href="history.php">History</a></li>
          </ul>
        </div>
        
<?php
//complex search
if($len==1){
//if it is company
$q="SELECT s.s_id as id from supplier s inner join product p on s.s_id=p.supplier_id where s.s_name='".$pieces[0]."' and p.product_status='accepted'";

$result = mysqli_query($connect,$q);
if (mysqli_num_rows($result)!=0) {
  // company
  $row = mysqli_fetch_assoc($result);
  $id=$row['id'];
//no_views_+offer
  $q1 = "SELECT p.product_id as id,p.product_name as name, p.product_price as price, p.product_offer as offer 
  from product p inner join history h 
  on h.product_id=p.product_id
   where p.product_id in(select product_id from product where p.supplier_id = '".$id."') 
   and p.product_status='accepted' order by  h.no_of_views desc, p.product_offer desc";

//price+offer
   $q2 = "SELECT p.product_id as id, p.product_name as name, p.product_price as price, p.product_offer as offer from product p inner join supplier h on h.s_id=p.supplier_id where s_name='".$pieces[0]."' and p.product_status='accepted' order by  p.product_price desc, p.product_offer desc";

}

else{
  $q1 = "SELECT p.product_id as id, p.product_name as name, p.product_price as price, p.product_offer as offer from product p inner join history h on h.product_id=p.product_id where p.product_id in( select product_id from product where product_category ='".$pieces[0]."') and p.product_status='accepted' order by  h.no_of_views desc, p.product_offer desc";

   // $q2 = "SELECT p.product_id as id,p.product_name as name, c.no_products as no, p.product_price as p, p.product_offer as offer from product p where product_status="accepted" and product_category LIKE "%'".$string."'%" order by p.product_price desc ,p.product_offer desc";
    $q2 = "SELECT p.product_id as id, p.product_name as name, p.product_price as price, p.product_offer as offer from product p where p.product_status='accepted' and p.product_category = '".$pieces[0]."' order by p.product_price desc ,p.product_offer desc";
}
}

else
{
//len==2
//echo $pieces[0];
//echo $pieces[1];
$q="SELECT s_id from supplier inner join product on s_id=supplier_id where s_name='".$pieces[0]."' and product_status='accepted'";
$result = mysqli_query($connect,$q);
if (mysqli_num_rows($result)==0) {
  //means 0 is category and 1 is company
  $ca=$pieces[0];
  $co=$pieces[1];
}
else{
  //means 1 is category and 0is company
  $ca=$pieces[1];
  $co=$pieces[0];
}

$q1="SELECT p1.product_id as id ,p1.product_name as name, p1.product_price as price, p1.product_offer as offer
from history h inner join product p1 
on p1.product_id=h.product_id 
where 
p1.product_id in 
(select p.product_id
from product p inner join supplier s on p.supplier_id=s.s_id 
where 
p.supplier_id=(select s1.s_id from supplier s1 where s1.s_name='".$co."') and 
p.product_status='accepted' and 
p.product_category='".$ca."' 
) 
group by h.product_id 
order by h.no_of_views desc, p1.product_offer desc";

//price+offer
$q2 = "SELECT p.product_id as id, p.product_name as name, p.product_price as price, p.product_offer as offer from product p inner join supplier s on s.s_id=p.supplier_id where s_name='".$co."' and p.product_status='accepted' and p.product_category = '".$ca."' order by p.product_price desc ,p.product_offer desc";
}


?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Search results1</h2><hr>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>    
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Add to cart</th>
                </tr>
              </thead>
<tbody>

<?php

//$q = 'SELECT p.product_id as id,p.product_name as name, c.no_products as no, p.product_price as p, p.product_offer as offer from cart c inner join product p where p.product_id=c.product_id';

$result1 = mysqli_query($connect,$q1);
$no_rows = mysqli_num_rows($result1);
$i=0;
if ($no_rows > 0) {
$i=1;
  while($row = mysqli_fetch_assoc($result1)) {
    $pid=$row['id'];
     echo "<tr>";
     //echo "<td>".$i."</td>";
     echo "<td>".$row['name']."</td>";
     echo "<td>".$row["price"]."</td>";
     echo "<td>".$row["offer"]."</td>";
     //echo "<td>";
     echo "<td><a href=\"addto_cart.php?id=".$row['id']."\">Delete</a></td>";

$i=$i+1;
}
}
 ?>
              </tbody>
            </table>
          </div>
        </div>
  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Search results2</h2><hr>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>    
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Add to cart</th>
                </tr>
              </thead>
<tbody>
<?php
$result2 = mysqli_query($connect,$q2);
$no_rows = mysqli_num_rows($result2);
$i=0;
if ($no_rows > 0) {
$i=1;
  while($row = mysqli_fetch_assoc($result2)) {
    $pid=$row['id'];
     echo "<tr>";
     //echo "<td>".$i."</td>";
     echo "<td>".$row['name']."</td>";
     echo "<td>".$row["price"]."</td>";
     echo "<td>".$row["offer"]."</td>";
     //echo "<td>";
     echo "<td><a href=\"addto_cart.php?id=".$row['id']."\">Delete</a></td>";

$i=$i+1;
}
}
 ?>
              </tbody>
            </table>
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

