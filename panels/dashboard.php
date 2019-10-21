<?php
session_start();

if ($_SESSION['verified'] == false) {
  header("Location: ../login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta content="Dashboard" property="og:title">

  <title>Dashboard | Streams Global</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="../images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="../images/ms-icon-256x256.png" rel="apple-touch-icon">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="../index.php"><img src="../images/H-Logo_White_icon.png" width="10" alt="Streams Global" class="image mobile">Streams Global</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="savings.php">
          <i class="fas fa-piggy-bank"></i>
          <span>My Savings</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="properties.php">
            <i class="fas fa-fw fa-table"></i>
            <span>My Properties</span></a>
          </li>

          <div class="dropdown-divider"></div>

          <li class="nav-item">
            <a class="nav-link" href="settings.php">
              <i class="fas fa-user-circle"></i>
              <span>Settings</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../faqs.php">
                <i class="fas fa-question-circle"></i>
                <span>FAQS</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../start.php?logout=1">
                  <i class="fas fa-sign-out-alt"></i>
                  <span>Logout</span></a>
                </li>


              </ul>

              <div id="content-wrapper">
                <div class="container-fluid">

                  <!-- Breadcrumbs-->
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                  </ol>

                  <!-- Icon Cards-->
                  <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fas fa-credit-card"></i>
                          </div>
                          <div class="mr-5 h1">SAVED</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="savings.php">
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
                            <i class="fas fa-chart-line"></i>
                          </div>
                          <div class="mr-5 h1">EQUIPPED PROPERTIES</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="properties.php">
                          <span class="float-left">View Details</span>
                          <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                  </div>

                  <!-- /.container-fluid -->

                  <!-- Sticky Footer -->
                  <footer class="sticky-footer">
                    <div class="container my-auto">
                      <div class="copyright text-center my-auto">
                        <span>© 2019 streams Global Cooperative, All Rights Reserved</span>
                      </div>
                    </div>
                  </footer>

                </div>
                <!-- /.content-wrapper -->
              </div>
              <!-- /#wrapper -->

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
