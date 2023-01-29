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

    <title>Nurse Home</title>

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
          <a class="navbar-brand" href="#" style="font-family: 'Merienda'; font-size: 38px;color: white"><b>INPATCare</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php" style="color: white;"><b>Logout</b></a></li>
            <!-- <li><a href="cart.php" style="color: white;"><b>Cart</b></a></li> -->
            
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search for the products...">
          </form> -->
        </div>
      </div>
    </nav>

    <div class="container-fluid" >
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky" >
          <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link active" href="#"><span data-feather="home"></span><b>Home</b><span class="sr-only">(current)</span></a></li>
            <!-- <li><a class="nav-link" href="user_myaccount.php"><span data-feather="calendar"></span><b>My account</b></a></li>
            <li><a  class="nav-link" href="user_history.php"><span data-feather="clock"></span><b>History</b></a></li> -->
          </ul>
		  </div>
        </div>

        <!-- Content div in user home -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="cover-heading">Medicines To Deliver</h2><hr>
          <div class="table-responsive">
            <table class="table table-striped">

              <?php

                include "sql_access.php";
                date_default_timezone_set('America/Chicago');
                $curr_time = date('H:i:s');
                echo $curr_time;

                $sql1="((select pt.patient_name, pt.patient_room_no, m.medicine_name, p.dosage_quantity, mt.medicine_type_measure, p.dosage_time as dosage_time, p.prescription_id as prescription_id1 from prescription p inner join prescription_activity a on p.prescription_id = a.prescription_id inner join medicine m on p.medicine_id = m.medicine_id inner join medicine_types mt on m.medicine_type_id = mt.medicine_type_id inner join patient pt on pt.patient_id = p.patient_id where a.prescription_status = 'IDLE') UNION (select pt.patient_name, pt.patient_room_no, m.medicine_name, pr.dosage_quantity, mt.medicine_type_measure, pr.dosage_time as dosage_time, pr.prescription_id as prescription_id1 from prescription pr inner join medicine m on pr.medicine_id = m.medicine_id inner join medicine_types mt on m.medicine_type_id = mt.medicine_type_id inner join patient pt on pt.patient_id = pr.patient_id where pr.dosage_time > '$curr_time' and prescription_id NOT IN (select p1.prescription_id as prescription_id from prescription p1 inner join prescription_activity a1 on p1.prescription_id = a1.prescription_id inner join medicine m1 on p1.medicine_id = m1.medicine_id inner join medicine_types mt1 on m1.medicine_type_id = mt1.medicine_type_id inner join patient pt1 on pt1.patient_id = p1.patient_id where a1.prescription_status in ('PICKED-UP', 'DELIVERED', 'ADMINISTERED')))) order by dosage_time asc";
                
                $result1=mysqli_query($connect,$sql1);

                $chck1=mysqli_num_rows($result1);

                if($chck1>0)
                {
                  echo '
                     <thead>
                      <tr>
                      <th>Patient Name</th>
                      <th>Room #</th>
                      <th>Medicine</th>
                      <th>Dosage</th>
                      <th>Prescription Time</th>
                      </tr>
                    </thead>
                    <tbody>
                  ';
                  $looping=0;
                  while ($data1=mysqli_fetch_array($result1))
                  {
                    echo '<tr>';
                    echo '<td>'.$data1['patient_name'].'</td>';
                    echo '<td>'.$data1['patient_room_no'].'</td>';
                    echo '<td><form method="post"><input type="hidden" name="prescription_id" value='.$data1['prescription_id1'].'>'.$data1['medicine_name'].'</td>';
                    echo '<td>'.$data1['dosage_quantity'].' '.$data1['medicine_type_measure'].'</td>';
                    echo '<td>'.$data1['dosage_time'].'</td>';
                    echo '<td><input type="submit" class="btn btn-primary" name= "button_received" value="Deliver"></form></td>';
                    //echo $looping;
                    echo '</tr>';
                    $looping++;
                  }
                    echo '</tbody>
                    </table>';
                }

                else
                {
                    echo '<th>No Medications to give now</th>';
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
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    
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
IF(ISSET($_POST['button_received'])){
  $prs_id = $_POST['prescription_id'];
  
  $curr_date = date("Y-m-d");
  $sql = "SELECT * FROM prescription_activity WHERE prescription_id = '$prs_id' and prescription_date >= $curr_date";
  $result = mysqli_query($connect,$sql);
  $chck = mysqli_num_rows($result);

  if($chck>0) {
    $sql1 = "UPDATE prescription_activity SET prescription_status='PICKED-UP' WHERE prescription_id = '$prs_id'";
    $result1 = mysqli_query($connect,$sql1);  
  } else {
    $sql2 = "INSERT INTO prescription_activity(prescription_id, prescription_date, prescription_status) VALUES ('$prs_id','$curr_date','PICKED-UP')";
    $result2 = mysqli_query($connect,$sql2); 
  }

  echo "<meta http-equiv='refresh' content='0'>";
  echo "<script language=\"javascript\">alert(\"Go to the assigned patient's room with the assigned medication. \");document.location.href='nurse_home.php';</script>";

  };
?>
