<?php
require_once ('../controllers/userController.php');
require_once ('../controllers/paymentController.php');

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
<script src="https://js.paystack.co/v1/inline.js"></script>
  <!-- <button type="button" onclick="payWithPaystack()"> Pay </button>  -->
<body class="bg-light">
  <?php
  if (isset($_GET['planCode']) && isset($_GET['cusCode'])) {
    $planCode = $_GET['planCode'];
    $cusCode = $_GET['cusCode'];
    echo "<button id='subBtn' class='d-none' type='button' onclick='payWithPaystack()'> Pay </button> ";
  }

  ?>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white shadow-lg" id="sidebar-wrapper">
      <!-- <div class="">Start Bootstrap </div> -->
      <a id="logo" href="../index" ><img src="../images/H-Logo_Color.png" width="100%" class="sidebar-heading img-responsive" alt="Streamsglobal"></a>
      <div class="list-group list-group-flush">
        <a href="dashboard" class="list-group-item list-group-item-action shadow-sm active"><i class="fas fa-th-large mr-1"></i>Dashboard</a>
        <a href="savings" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-wallet mr-1"></i>Savings</a>
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
        <h3 class="mt-4">Piggy Wallet Plan</h3>
        <div class="row">
          <div class="col col-md-8 mb-4">
            <h6>This is a modernized online Esusu, Ajor, Akawor that can be collected in 30 days, 90 days, 185 and 365 days with interest.</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4 h-100">
            <div class="card border-0 shadow-sm rounded-lg h-100">
              <div class="piggy-themes plan-color">
                <h5 class="p-4 text-white">Piggy Wallet One</h5>
                <i class="fas fa-piggy-bank plan-icon"></i>
              </div>
              <div class="card-body">
                <p class="card-text">30 days saver this (works like Ajor, Akawo or Esusu, here you choose the amount you want to be saving daily, at the end of the month you get your total money back, paid directly to your bank account.
                  The minimum savings daily is N1,000.<hr class="mb-2">
                  Minimum no of days to save is 30 days, excluding February.
                  No withdrawals until 31 days for months that has 30 days and 32 days for months of 31 days. Meaning you get your daily savings of Ajor, Akawoor Esusu 24 working hours from the end of the month.
                  Those that couldn't save for 30 or 31 days gets whatever they have saved the same time others are getting.
                </p>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                <div class="form-group px-3">
                  <input name="amount1" type="text" class="form-control form-control-lg" id="formGroupExampleInput" placeholder="Enter amount">
                </div>
                <div class="m-3">
                <button type="submit" class="btn btn-primary btn-block" name="piggy1btn">Save</button>
              </div>
              </form>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4 h-100">
            <div class="card border-0 shadow-sm rounded-lg h-100">
              <div class="piggy-themes plan-color">
                <h5 class="p-4 text-white">Piggy Wallet Two</h5>
                <i class="fas fa-piggy-bank plan-icon"></i>
              </div>
              <div class="card-body">
                <p class="card-text">90 days daily savings with interest
                  Here you save your choice amount daily for 90 days, minimum savings is N1,000, no withdrawal until 90 days. The cooperative gives you 3.0 % for your total saving with us after 90 days all percentages are calculated daily for every month.
                </p>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                <div class="form-group px-3">
                  <input name="amount2" type="text" class="form-control form-control-lg" id="formGroupExampleInput" placeholder="Enter amount">
                </div>
                <div class="m-3">
                <button type="submit" class="btn btn-primary btn-block" name="piggy2btn">Save</button>
              </div>
              </form>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4 h-100">
            <div class="card border-0 shadow-sm rounded-lg h-100">
              <div class="piggy-themes plan-color">
                <h5 class="p-4 text-white">Piggy Wallet Three</h5>
                <i class="fas fa-piggy-bank plan-icon"></i>
              </div>
              <div class="card-body">
                <p class="card-text">6 Months Daily Saving
                  Here you choose your choice amount, the co-operative gives you 6.5% interest on your total savings, All terms & conditions of piggy wallet applies. All percentages are calculated daily for every month.
                </p>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                <div class="form-group px-3">
                  <input type="text" class="form-control form-control-lg" id="formGroupExampleInput" placeholder="Enter amount">
                </div>
                <div class="m-3">
                <button type="submit" class="btn btn-primary btn-block" name="piggy3btn">Save</button>
              </div>
              </form>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4 h-100">
            <div class="card border-0 shadow-sm rounded-lg h-100">
              <div class="piggy-themes plan-color">
                <h5 class="p-4 text-white">Piggy Wallet Four</h5>
                <i class="fas fa-piggy-bank plan-icon"></i>
              </div>
              <div class="card-body">
                <p class="card-text">365 days daily saving (12 Months)
                  Here you choose your choice amount the cooperative gives you 14% for saving with us daily for 365 days. All terms and conditions of piggy wallet applies .All % percentages are calculated daily for every month.
                </p>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                <div class="form-group px-3">
                  <input type="text" class="form-control form-control-lg" id="formGroupExampleInput" placeholder="Enter amount">
                </div>
                <div class="m-3">
                <button type="submit" class="btn btn-primary btn-block" name="piggy4btn">Save</button>
              </div>
              </form>
            </div>
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

    function payWithPaystack(){
      var handler = PaystackPop.setup({
        key: 'pk_test_02a7ea9bf16da92e8bfd82243e847b36c28a919a',
        email: '<?php echo $_SESSION['usersemail'];?>',
        plan: "<?php echo $planCode;?>",
        customer: "<?php echo $cusCode;?>",
        ref: '<?php echo $_SESSION["usersfname"].'_'; ?>'+Math.floor((Math.random() * 1000000000) + 1),
        metadata: {
           custom_fields: [
             {
               display_name: "Customer ReferralCode",
               variable_name: "referral_code",
               value: "<?php echo $_SESSION['referralcode']; ?>"
             }
           ]
        },
        callback: function(response){
            //alert('successfully subscribed. transaction ref is ' + response.reference);
            var planCode = "<?php echo $planCode;?>";
            var cusCode = "<?php echo $cusCode;?>";
            window.location.assign("http://streamsglobal.com/user/savings?success=subCreated&reference="+response.reference+"&planCode="+planCode+"&cusCode="+cusCode);
        },
        onClose: function(){
            location.reload();
        }
      });
      handler.openIframe();
    }



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
    if (queryParameters().success == "plancreated"){
      $("#subBtn")[0].click();
    }
  </script>

</body>

</html>
