<?php require_once ('../controllers/userController.php');
if (isset($_SESSION['id']) && $_SESSION['verified'] == 0) {
  header("Location: ../login");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Dashboard | Streams Global</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="../css/custom.css" rel="stylesheet" type="text/css">
  <link href="../css/users.css" rel="stylesheet" type="text/css">
  <link href="../css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});
  </script>
  <link href="../images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="../images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>

<body class="bg-light">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-white shadow-lg" id="sidebar-wrapper">
      <!-- <div class="">Start Bootstrap </div> -->
      <a id="logo" href="../index" ><img src="../images/H-Logo_Color.png" width="100%" class="sidebar-heading img-responsive" alt="Streamsglobal"></a>
      <div class="list-group list-group-flush">
        <a href="dashboard" class="list-group-item list-group-item-action shadow-sm active"><i class="fas fa-th-large mr-1"></i>Dashboard</a>
        <a href="withdraw" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-wallet mr-1"></i>Withdraw</a>
        <hr class="my-2">
        <a href="settings" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-user-cog mr-1"></i>Account Settings</a>
        <hr class="my-2">
        <a href="../start?logout=1" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-sign-out-alt mr-1"></i>Sign Out</a>
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
                <a class="dropdown-item" href="settings">Profile</a>
                <a class="dropdown-item" href="../start?logout=1">Sign out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h3 class="mt-4">Savings Plans</h3>
        <div class="row">
          <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
            <a href="piggy" class="after-loop-item card border-0 rounded-lg piggy-themes shadow-lg">
              <div class="card-body d-flex align-items-end flex-column text-right">
                <h4>Piggy Wallet</h4>
                <p class="w-75">Automatically save an amount at regular ...</p>
                <i class="fas fa-piggy-bank"></i>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
            <a href="saap" class="after-loop-item card border-0 rounded-lg saap-themes shadow-lg">
              <div class="card-body d-flex align-items-end flex-column text-right">
                <h4>SAAP</h4>
                <p class="w-75">Automatically save an amount at regular ...</p>
                <i class="fas fa-cart-arrow-down"></i>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-8 mx-auto">
            <a href="fixed" class="after-loop-item card border-0 rounded-lg fixed-themes shadow-lg">
              <div class="card-body d-flex align-items-end flex-column text-right">
                <h4>Fixed Savings</h4>
                <p class="w-75">Automatically save an amount at regular ...</p>
                <i class="fas fa-unlock-alt"></i>
              </div>
            </a>
          </div>
        </div>
        <!-- SECOND ROW     -->
        <div class="row my-4">
          <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
            <a href="land" class="after-loop-item card border-0 rounded-lg land-themes shadow-lg">
              <div class="card-body d-flex align-items-end flex-column text-right">
                <h4>Land & Building Savings</h4>
                <p class="w-75">Automatically save an amount at regular ...</p>
                <i class="fas fa-home"></i>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
            <a href="cooperators" class="after-loop-item card border-0 rounded-lg cooperators-themes shadow-lg">
              <div class="card-body d-flex align-items-end flex-column text-right">
                <h4>Cooperators Bank</h4>
                <p class="w-75">Automatically save an amount at regular ...</p>
                <i class="fas fa-handshake"></i>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-8 mx-auto">
            <a href="diaspora" class="after-loop-item card border-0 rounded-lg diaspora-themes shadow-lg">
              <div class="card-body d-flex align-items-end flex-column text-right">
                <h4>Diaspora Safe</h4>
                <p class="w-75">Automatically save an amount at regular ...</p>
                <i class="fab fa-diaspora"></i>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-12">
          <hr class="mt-5">
          <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
          <table class="table table-sm table-hover table-striped">
            <tbody class="text-muted">
              <tr>
                <td class="p-3">
                  Abby joined ACME Project Team in `Collaboration`
                </td>
              </tr>
              <tr>
                <td class="p-3">
                  Gary deleted My Board1 in `Discussions`
                </td>
              </tr>
              <tr>
                <td class="p-3">
                  Kensington deleted MyBoard3 in `Discussions`
                </td>
              </tr>
              <tr>
                <td class="p-3">
                  John deleted My Board1 in `Discussions`
                </td>
              </tr>
              <tr>
                <td class="p-3">
                  Skell deleted his post Look at Why this is.. in `Discussions`
                </td>
              </tr>
            </tbody>
          </table>
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

  </script>

</body>

</html>
