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
<style type="text/css">
    .sidenav a, .dropdown-btn {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: .875rem;
      font-weight: 500;
      color: #333;
      display: block;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
      outline: none;
    }
    .emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
    }

    .profile-head h5{
        color: #333;
    }
    .profile-head h6{
        color: #0062cc;
    }

    .profile-work{
        padding: 14%;
        margin-top: -15%;
    }
    .profile-work p{
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }
    .profile-work a{
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }
    .profile-work ul{
        list-style: none;
    }
    .profile-tab label{
        font-weight: 600;
    }
    .profile-tab p{
        font-weight: 600;
        color: #0062cc;
    }
    .fa-caret-down {
    float: right;
    padding-right: 8px;
    }
    .dropdown-container {
        display: none;
        background-color: rgba(0, 0, 0, .25);
        padding-left: 8px;
    }


.feather {
  width: 16px;
  height: 16px;
  vertical-align: text-bottom;
}

/*
 * Sidebar
 */

.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
  }
}

.sidebar .nav-link {
  font-weight: 500;
  color: #333;
}

.sidebar .nav-link .feather {
  margin-right: 4px;
  color: #999;
}

.sidebar .nav-link.active {
  color: #007bff;
}

.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
  color: inherit;
}

.sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
}

/*
 * Content
 */

[role="main"] {
  padding-top: 48px; /* Space for fixed navbar */
}

/*
 * Navbar
 */

.navbar .form-control {
  padding: .75rem 1rem;
  border-width: 0;
  border-radius: 0;
}

.form-control-dark {
  color: #fff;
  background-color: rgba(255, 255, 255, .1);
  border-color: rgba(255, 255, 255, .1);
}

.form-control-dark:focus {
  border-color: transparent;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
}
  </style>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid" style="background-color: #78a890;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="font-family: 'Merienda'; font-size: 38px;color: white;"><b>INPATCare</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php" style="color: white;"><b>Logout</b></a></li>
            <li><a href="cart.php" style="color: white;"><b>Cart</b></a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search for the products...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid" >
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky" >
          <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="user_home.php"><span data-feather="home"></span><b>Home</b></a></li>
            <li class="nav-item"><a class="nav-link " href="user_myaccount.php"><span data-feather="calendar"></span><b>My account</b></a></li>
            <li><a  class="nav-link" href="user_history.php"><span data-feather="clock"></span><b>History</b></a></li>
          </ul>
		  </div>
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
	<!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
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