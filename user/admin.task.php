<?php
// Connect database admin php
require_once ('../controllers/userController.php');

if (isset($_SESSION['usersid']) && $_SESSION['usertype'] == 0) {
  header('location: login');
}
// you are Admin
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Dashboard | Streams Global</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="../css/custom.css" rel="stylesheet" type="text/css">
  <link href="../css/users.css" rel="stylesheet" type="text/css">
  <link href="../css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/loader.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});
  </script>
  <link href="../images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="../images/ms-icon-256x256.png" rel="apple-touch-icon">
  <style>
  .nav-link.active{
    font-weight: bold;
  }
  </style>
</head>

<body class="bg-light">
  <body class="body">
    <div class="loader-body" id="loader">
      <div class="loader"></div>
    </div>
    <div class="d-flex" id="wrapper">

      <!-- Sidebar -->
      <div class="bg-white shadow-lg" id="sidebar-wrapper">
        <!-- <div class="">Start Bootstrap </div> -->
        <a id="logo" href="../index" ><img src="../images/H-Logo_Color.png" width="100%" class="sidebar-heading img-responsive" alt="Streamsglobal"></a>
        <div class="list-group list-group-flush">
          <a href="dashboard" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-th-large mr-1"></i>Dashboard</a>
          <a href="savings" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-wallet mr-1"></i>Savings</a>
          <hr class="my-2">
          <a href="task" class="list-group-item list-group-item-action shadow-sm active"><i class="fas fa-user-cog mr-1"></i>Tasks</a>
          <hr class="my-2">
          <a href="../start?logout=1" id="logout" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-sign-out-alt mr-1"></i>Sign Out</a>
          <a href="../faqs" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-question-circle mr-1"></i>FAQs</a>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
          <span id="menu-toggle" class="p-3"><i class="fas fa-compress"></i></span>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php

                  $sql = "SELECT `*` FROM `users` LIMIT 1;";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    if ($user = mysqli_fetch_assoc($result)) {
                      $id = $_SESSION['usersid'];

                      $sqlImg = "SELECT `*` FROM `profileimg` WHERE `userid` = '$id' LIMIT 1;";
                      $resultImg = mysqli_query($conn, $sqlImg);
                      while ($imgRow = mysqli_fetch_assoc($resultImg)){

                        if ($imgRow['status'] == 0 ) {
                          echo '<img src="../images/uploads/profile'.$_SESSION['usersid'].'.jpg?'.mt_rand().'" ait="Profile Avatar" class="img-icon img-thumbnail rounded-circle">';
                        } else {
                          echo '<img src="https://i.imgur.com/gaJNXRO.png" ait="Profile Avatar" class="img-icon img-thumbnail rounded-circle">';
                        }
                      }
                    }
                  }

                  ?>
                  <span class="text-uppercase">
                    <?php echo ucwords($_SESSION['usersfname']); ?>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="task">Task</a>
                  <a class="dropdown-item" href="../start?logout=1">Sign out</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8 order-lg-2">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link text-muted active" id="createAds-tab" data-toggle="tab" href="#createAds" role="tab" aria-controls="createAds" aria-selected="true">Create Ads</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-muted" id="editpages-info-tab" data-toggle="tab" href="#editpages-info" role="tab" aria-controls="editpages-info" aria-selected="true">Edit Pages</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-muted" id="createusers-tab" data-toggle="tab" href="#createusers" role="tab" aria-controls="createusers" aria-selected="true">Create Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-muted" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="true">Other</a>
                </li>
              </ul>



              <div class="tab-content py-4" id="myTabContent">

                <div class="tab-pane fade show active" id="createAds" role="tabpanel" aria-labelledby="createAds-tab">
                  <h4 class="mb-3">Create new adverts</h4>
                </div>

                <!-- CHANGE TAB ####################################### -->
                <div class="tab-pane fade" id="editpages-info" role="tabpanel" aria-labelledby="editpages-info-tab">
                  <h4 class="mb-3">Edit pages</h4>
                </div>

                <!-- CHANGE EMAIL TAB ####################################### -->

                <div class="tab-pane fade" id="createusers" role="tabpanel" aria-labelledby="createusers-tab">
                  <h4 class="mb-3">Create new users</h4>
                </div>

                <!-- CHANGE PASSWORD TAB ####################################### -->

                <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                  <h4 class="mb-3">Coming soon</h4>
                </div>

              </div>
            </div>
          </div>
          <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../js/loader.js"></script>

        <!-- Menu Toggle Script -->
        <script>
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });

        $('document').ready(function (){

          // AUTO DISAPPEAR ALERT
          $("#alert").toggleClass('in');
          window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
              $(this).remove();
            });
          }, 8000);

          $("#file").change(function(e) {
            $("#upload-img")[0].click();
          });

          $("#menu-toggle").click(function() {
            $("#logo").toggle("slow", function(){
              if($(this).is(':visible'))
              $("#logo").html("<img src='../images/H-Logo_Color.png' width='100%' class='sidebar-heading img-responsive' alt='Streamsglobal'>")
              else
              $("#logo").html("<img src='../images/ms-icon-256x256.png' width='100px' class='sidebar-heading img-responsive' alt='Streamsglobal'>")
            });
          });

        });
        var dropdown = $(".dropdown-toggle");

        dropdown.on("click", function() {
          setTimeout(function(){           //loses focus after 0 milliseconds
            dropdown.blur();
          }, 0);
        });

        //################# CHECK URL PARAM FUNCTION ##################
        function queryParameters () {
          var result = {};

          var params = window.location.search.split(/\?|\&/);

          params.forEach( function(it) {
            if (it) {
              var param = it.split("=");
              result[param[0]] = param[1];
            }
          });

          return result;
        }
        if (queryParameters().error == "invalidphone"){
          $("#editpages-info-tab")[0].click();
        } else if (queryParameters().error == "invalidemail" || queryParameters().error == "emailexist"){
          $("#email-tab")[0].click();
        } else if (queryParameters().error == "nouserpasswordfound" || queryParameters().error == "passwordmustbelong" || queryParameters().error == "passwordnotmatch"){
          $("#password-tab")[0].click();
        } else if (queryParameters().success == "emailchanged"){
          $("#modalbtn")[0].click();
        } else if (queryParameters().success == "passwordchanged"){
          $("#logout")[0].click(); //logout the user if password changed
        }

        </script>

      </body>

      </html>
