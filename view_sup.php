<?php
include "../sql_access.php";
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Home Page|View Suppliers</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css" rel="stylesheet">
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
  </style>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
           <form  action="a_login.php" method="POST">
          <button class="btn btn-block" href="a_login.php" name="out">Sign out</button>
          <?php
            IF(ISSET($_POST['out'])){unset($_SESSION['name']);
            session_destroy();
          }?>
        </form>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="admin_home.php">
                    <span data-feather="home"></span>
                  About Me <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <div class="sidenav">
                   <button class="dropdown-btn"><span data-feather="file"></span>&nbsp;  
                     View Suppliers 
                      <i class="fa fa-caret-down"></i>
                    </button>
                  <div class="dropdown-container">
                    <?php
                    $chek = mysqli_num_rows(mysqli_query($connect,"SELECT s_name FROM supplier"));
                    $data = mysqli_query($connect,"SELECT s_name,s_id FROM supplier");

                    if ($chek>0)
                      {
                        while($row = mysqli_fetch_assoc($data)){ 
                          echo  '<a href="view_sup.php?var='.$row['s_name'].'&sid='.$row['s_id'].'">'.$row['s_name'].'</a>';
                      }}
                      else
                      die('Error: ' . mysqli_error("Could not fetch the query."));
                        ?>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="update_pro.php">
                  <span data-feather="shopping-cart"></span>
                  Update Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="view_all.php">
                  <span data-feather="shopping-cart"></span>
                  View All Products
                </a>
              </li>

            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <?php 
            $value=$_GET['var'];
            $id=$_GET['sid'];
            echo '<h1 class="h2">'.$value.'</h1>';
            ?>
          </div>


          <h2>Products:</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Offer</th>
                  <th>Description</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM product where supplier_id=$id"));
                    $data = mysqli_query(
                    $connect,"SELECT * FROM product where supplier_id=$id");
                if ($cek>0)
                {     
                  while($row = mysqli_fetch_assoc($data))       
                    echo '<tr>
                      <td>'.$row['product_id'].'</td>
                      <td>'.$row['product_name'].'</td>
                      <td>'.$row['product_category'].'</td>
                      <td>'.$row['product_price'].'</td>
                      <td>'.$row['product_offer'].'</td>
                      <td>'.$row['product_description'].'</td>
                      <td>'.$row['product_status'].'</td>
                    </tr>';
                     }
                else
                die('Error: ' . mysqli_error("Could not fetch the query."));
                  ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>
</html>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>