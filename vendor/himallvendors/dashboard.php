<?php
$con = mysqli_connect("localhost","root","","himall");
session_start();
$user=$_SESSION['uid'];
$sql= "SELECT * FROM purchases WHERE user_id='$user' GROUP BY date_of_purchase";
$res = $con->query($sql) ;

// $results = mysqli_query($con,"SELECT * FROM products");
// $eresults = mysqli_query($con,"SELECT * FROM vendor");

// $num_rows = mysql_num_rows($results);
// $query ="SELECT User_gender, count(*) as number FROM register GROUP BY User_gender";
// $result = mysqli_query($con, $query);

// Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }else{
//     echo "this is it";
//   }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vendors - Dashboard</title>

   <link rel="shortcut icon" href="https://www.himall.africa/favicon.ico" />

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
       var data = google.visualization.arrayToDataTable([
          ['Purchases', 'Sales per month'],
         <?php
          while($row = $res->fetch_assoc())
          {
            echo "['".$row['purchase_price']."',".$row['date_of_purchase']."],";
          }
         ?>
        ]);

        var options = {
          title: 'Purchases Monthly',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand  static-top">

    <div style="margin-left: 3px" class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.html" class="js-logo-clone">
                <img src="https://www.himall.africa/logo.png" alt="logo" loading="lazy">
              </a>
            </div>
          </div>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i style="color:black" class="fas fa-bars"></i>
    </button>
    <div>
       Welcome <?php echo $_SESSION["email"];?>
      </div>

    <!-- Navbar Search -->
    <!--  -->

      <div style="margin-left: 500px;">
      
        <a  href="logout.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
      </div>
      

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul style="color:white" class="sidebar navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="loginform.php">Login</a>
          <a class="dropdown-item" href="registration/index.html">Register</a>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Himall</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <?php
require('connect.php');
// session_start();
// include('login.php'); // Includes Login Script

$user=$_SESSION['uid'];

  $result = mysqli_query($con,"SELECT * FROM purchases WHERE user_id='$user'");

            $numb=mysqli_num_rows($result);
            
            echo "$numb Sales \n" ;
            ?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="review.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">
                    <?php
require('connect.php');
// session_start();
// include('login.php'); // Includes Login Script

// if(isset($_SESSION['vendor_id'])){

// $id=$_SESSION["vendor_id"];
// if ($result = $con->query("SELECT  from products ")) {

    /* determine number of rows result set */
    $user=$_SESSION['uid'];

  $results = mysqli_query($con,"SELECT * FROM products WHERE vendor_id='$user'");

            $numb=mysqli_num_rows($results);
            
            echo "$numb Products \n" ;
            


?> 
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><?php
require('connect.php');
// session_start();
// include('login.php'); // Includes Login Script

// if(isset($_SESSION['vendor_id'])){

// $id=$_SESSION["vendor_id"];
$user=$_SESSION['uid'];

  $result = mysqli_query($con,"SELECT * FROM product_ratings WHERE vendor_id='$user'");

            $numb=mysqli_num_rows($result);
            
            echo "$numb Ratings \n" ;
            ?>
</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">
                  View details
                </span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"><?php
require('connect.php');
// session_start();
// include('login.php'); // Includes Login Script

// if(isset($_SESSION['vendor_id'])){

// $id=$_SESSION["vendor_id"];

  $user=$_SESSION['uid'];

  $sresult = mysqli_query($con,"SELECT sum( product_price ) AS value_sum  FROM `purchases` WHERE user_id='$user'");
$row = mysqli_fetch_assoc($sresult); 

$sum = $row['value_sum'];

echo ("$sum");
            ?> Total amount in Ksh
          </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div>
          <div class="card-body">
            <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <div class="col-md-12">
        <h4>Produts Table</h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                
                   
                   <thead>
                   
                  
                   <th>Product Name</th>
                    <th>Product Description</th>
                     <th>Product Price</th>
                     <th>Product Quantity</th>
                     <!-- <th>Product Category</th> -->
                      <th>Edit</th>
                      
                       <th>Delete</th>
                   </thead>
                   <tbody>
                     <?php

                     $con = mysqli_connect("localhost","root","","himall");
                     // if(isset($_SESSION['vendor_id'])){

                     // $id=$_SESSION["vendor_id"];
                     // session_start();
  // $Category=$_POST['category'];

                 $user=$_SESSION['uid'];
                $sql = "SELECT * FROM products WHERE vendor_id='$user'";
               if($result = mysqli_query($con, $sql)){
                 while($row = mysqli_fetch_array($result)){
            echo "<tr>";

                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_description'] . "</td>";
                echo "<td>" . $row['product_price'] . "</td>";
                echo "<td>" . $row['product_quantity'] . "</td>";
                echo "<td><a href='#'>Edit</a></td>";
               echo "<td><a href='delete.php?id=".$row['product_id']."'>Delete</a></td>";

            echo "</tr>";

        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
//       } if else{
//         echo "No records matching your query were found.";
//     }else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
// }
 }
   // }
// Close connection
mysqli_close($con);
?>
                 </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
