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

    <title>Supplier Home</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="supplier_menu.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>
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

             <li>
          <form action="s_login.php" method="POST">
             <button type="submit" class="btn btn-lg btn-primary btn-block" name="logout">Logout</button>
          </form>
          <?php
          include "../sql_access.php";

          IF(ISSET($_POST['logout'])){
            unset($_SESSION['supplier_id']);
            session_destroy();
          }
                     
?>
            

            <!--  <a href="s_login.php">Logout</a> -->
            </li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="supplier_menu.php">Home</a></li>
            <li class="active"><a href="add_product.php">Add Product <span class="sr-only">(current)</span></a></li>
            <li><a href="supplier_products.php">All Products</a></li>
          </ul>
        </div>

        <!-- Content div in user home -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Add Your Products Here:</h2><hr>
          <p><a class="btn btn-primary btn-lg" href="add_product.php" role="button"> &plus; Add Product </a></p>



            <form class="add_pro" method="POST" action="">
        <h3 >Please enter the product details:</h3>
  
        <label>Product Name</label>
        <input type="name" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" required autofocus>
        <br>

        <label>Select category:</label>
        <input list="categories" name="product_category">
        <datalist id="categories">
          <option value="soap">soap</option>
          <option value="pen">pen</option>
        </datalist>
        <br>


        <label>Product Price</label>
        <input type="number" id="product_price" class="form-control" placeholder="Enter product price" name="product_price" required>
        <br>

        <label>Product Offer</label>
        <input type="number" id="product_offer" class="form-control" placeholder="Enter offer on product" name="product_offer" required>
        <br>

        <label>Product Description</label>
        <input type="text" id="product_descriptionn" class="form-control" placeholder="Write description about the product" name="product_descriptionn">
        <br>
        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Done</button>
      </form>

      <?php
            include "../sql_access.php";

          
            IF(ISSET($_POST['add']))
            {

            $retval='SELECT s_id FROM supplier';
            $suppid=mysqli_query($connect,$retval);
            $row = mysqli_fetch_assoc($suppid);

            $sup_id=$row["s_id"];
            echo "$sup_id";
            $sql="INSERT INTO product(product_name,product_category,product_price,supplier_offer,product_descriptionn,supplier_id)
            VALUES

            ('$_POST[product_name]','$_POST[product_category]','$_POST[product_price]','$_POST[product_offer]','$_POST[product_descriptionn]',$sup_id)";


            if (!mysqli_query($connect,$sql))

              {

              die('Error: ' . mysqli_error($connect));

              }

            echo " Added";
            }


            ?>




</div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</div>
</body>
</html>



