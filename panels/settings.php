<?php
require_once 'controllers/authController.php';

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

  <title>Settings | Streams Global</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



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
                    <li class="breadcrumb-item active">Settings</li>
                  </ol>
                  <?php

                  if (isset($_GET['error'])) {
                    if ($_GET['error'] == "sizeerror") {
                      echo '<div class="container">
                      <div class="alert alert-danger" role="alert">
                      Oops! file too Large, image must be 50mb or Less.
                      </div>
                      </div>';
                    }
                    else if ($_GET['error'] == "errorupload") {
                      echo '<div class="container">
                      <div class="alert alert-danger" role="alert">
                      Oops! image could not be uploaded.
                      </div>
                      </div>';
                    }
                    else if ($_GET['error'] == "filenotallowed") {
                      echo '<div class="container">
                      <div class="alert alert-danger" role="alert">
                      Oops! Only JPG Image accepted.
                      </div>
                      </div>';
                    }
                    else if ($_GET['error'] == "sqlerror") {
                      echo '<div class="container">
                      <div class="alert alert-danger" role="alert">
                      Oops! Connection was not successful.
                      </div>
                      </div>';
                    }
                    else if ($_GET['error'] == "couldnotupdate") {
                      echo '<div class="container">
                      <div class="alert alert-danger" role="alert">
                      Oops! Could not Update.
                      </div>
                      </div>';
                    }
                  } elseif (isset($_GET['success'])) {
                    echo '<div class="container">
                    <div class="alert alert-success" role="alert">
                    Yay! Profile Updated Successfully.
                    </div>
                    </div>';            
                  }elseif (isset($_GET['success-update'])) {
                    echo '<div class="container">
                    <div class="alert alert-success" role="alert">
                    Yay! Updated.
                    <p>Update will be available on next login</p>
                    </div>
                    </div>';            
                  }
                  ?>
                  <div class="container">
                    <div class="row">
                      <div style="padding-bottom: 50px;" class="col-xl-3 col-sm-6 mb-3">
                        <div class="panel-heading">  <h4 >My Profile</h4></div>

                        <?php

                        $sql = "SELECT * FROM users LIMIT 1;";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                          if ($user = mysqli_fetch_assoc($result)) {
                           $id = $_SESSION['usersid'];

                           $sqlImg = "SELECT * FROM profileimg WHERE userid='$id' LIMIT 1;";
                           $resultImg = mysqli_query($conn, $sqlImg);
                           while ($imgRow = mysqli_fetch_assoc($resultImg)){

                            if ($imgRow['status'] == 0 ) {
                              echo '<img alt="User Pic" src="../images/uploads/profile'.$_SESSION['usersid'].'.jpg?'.mt_rand().'" id="profile-image1" class="img-circle img-responsive">';
                            } else {                       
                              echo '<img alt="User Pic" src="../images/uploads/profiledefault.jpg" id="profile-image1" class="img-circle img-responsive">';
                            }
                          }
                        }
                      }

                      ?>

                      <form action="settings.php" method="POST" enctype="multipart/form-data">

                        <label for="exampleFormControlFile1"><h5>Change Profile Picture</h5></label> 
                        <div class="form-row">

                          <div class="col-lg-auto">
                            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                          </div>
                          <div class="col">
                            <button class="btn btn-success" type="submit" name="upload-img-submit">Upload</button> 
                          </div>

                        </div>
                      </form>
                    </div>



                    <div style="padding-bottom: 50px;" class="col-xl-3 col-sm-6 mb-3">
                      <h2><?php echo ucwords($_SESSION['usersfname']).' '.ucwords($_SESSION['userslname']); ?></h2>
                      <div style="margin: 2% 0" class="dropdown-divider"></div>                      
                      <p>Email Address: <b><?php echo $_SESSION['usersemail'];?></b></p>
                      <p>Phone Number: <b><?php echo $_SESSION['usersphone'];?></b></p>
                      <p>Gender: <b><?php echo $_SESSION['gender'];?></b></p>
                      <p>Date of Birth: <b><?php echo $_SESSION['DOB'];?></b></p>
                      <p>LGA: <b><?php echo $_SESSION['LGA'];?></b></p>
                      <p>Occupation: <b><?php echo $_SESSION['occupation'];?></b></p>
                      <p>Resident Address: <b><?php echo $_SESSION['address'];?></b></p>
                      <p>City: <b><?php echo $_SESSION['city'];?></b></p>
                      <p>State: <b><?php echo $_SESSION['state'];?></b></p>
                      <p>Nationality: <b><?php echo $_SESSION['nationality'];?></b></p>

                      <div style="margin: 2% 0" class="dropdown-divider"></div>

                      <form method="GET" action="settings.update.php">
                        <button type="submit" class="btn btn-info">Add Info</button>
                        <form> 

                        </div>
                      </div>        
                    </div>
                    <!-- Sticky Footer -->
                    <footer class="sticky-footer">
                      <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                          <span>© 2019 streams Global Cooperative, All Rights Reserved</span>
                        </div>
                      </div>
                    </footer>

                  </div><!-- /.content-wrapper -->
                </div><!-- /#wrapper -->


                <!-- Bootstrap core JavaScript-->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
              </body>
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
