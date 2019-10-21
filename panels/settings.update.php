<?php
require_once 'controllers/authController.php';
require_once 'controllers/updateController.php';

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

  <title>Update | Streams Global</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/sb-style.css" rel="stylesheet">
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
      <li class="nav-item">
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
            <a class="nav-link active" href="settings.php">
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
                    <li class="breadcrumb-item active">Update info</li>
                  </ol>

                  <!-- Icon Cards-->
                  <div class="container">
                    <div class="panel-heading mb-5">  <h4 >Update your Data</h4></div>

                    <form action="settings.update.php" method="POST">
                      <label for="exampleInputEmail1"> <h5>Gender : </h5></label>
                      <div class="form-row align-items-center">

                        <div class="col-7">

                          <select  name="gender" value="<?php echo $_SESSION['gender']; ?>" class="form-control mb-2" id="exampleFormControlSelect1">
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                      </div>

                      <label for="inlineFormInputGroup"><h5>Date of Birth : </h5></label>
                      <div class="form-row align-items-center">
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Month</div>
                            </div>
                            <select name="month" class="form-control mb-2" id="exampleFormControlSelect1">
                              <option>January</option>
                              <option>February</option>
                              <option>March</option>
                              <option>April</option>
                              <option>May</option>
                              <option>June</option>
                              <option>July</option>
                              <option>August</option>
                              <option>September</option>
                              <option>October</option>
                              <option>November</option>
                              <option>December</option>
                            </select>
                          </div>
                        </div>
                        <div class="col">
                          <input type="text" name="day" class="form-control mb-2" id="inlineFormInput" placeholder="Day">
                        </div>
                        <div class="col">
                          <input type="text" name="year" class="form-control mb-2" id="inlineFormInput" placeholder="Year">
                        </div>
                      </div>

                      <label for="inlineFormInputGroup"><h5>Resident Address : </h5></label>
                      <div class="form-row align-items-center">

                        <div class="col-7">
                          <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>" class="form-control mb-2" placeholder="Home Address">
                        </div>
                        <div class="col">
                          <input type="text" name="city" value="<?php echo $_SESSION['city']; ?>" class="form-control mb-2" placeholder="City">
                        </div>
                        <div class="col">
                          <input type="text" name="state" value="<?php echo $_SESSION['state']; ?>" class="form-control mb-2" placeholder="State">
                        </div>
                      </div>

                      <label for="inlineFormInputGroup"><h5>Local Government : </h5></label>
                      <div class="form-row align-items-center">

                        <div class="col">
                          <input type="text" name="LGA" value="<?php echo $_SESSION['LGA']; ?>" class="form-control mb-2" placeholder="LGA">
                        </div>
                      </div>

                      <label for="inlineFormInputGroup"><h5>Occupation : </h5></label>
                      <div class="form-row align-items-center">
                        <div class="col">
                          <input type="text" name="occupation" value="<?php echo $_SESSION['occupation']; ?>" class="form-control mb-2" placeholder="Occupation">
                        </div>
                      </div>

                      <label for="inlineFormInputGroup"><h5>Nationality : </h5></label>
                      <div class="form-row align-items-center">                    
                        <div class="col">
                          <input type="text" name="nationality" value="<?php echo $_SESSION['nationality']; ?>" class="form-control mb-2" placeholder="Country">
                        </div>
                      </div>
                      
                      <button type="submit" name="save-data-button" class="btn btn-info btn-lg">Save</button>

                    </form>

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
