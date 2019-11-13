<?php
require_once ('../controllers/userController.php');
require_once ('../controllers/paymentController.php');

if (isset($_SESSION['usersid']) && $_SESSION['verified'] == 0) {
  header("Location: ../login");
  exit();
}

// CALL THE FETCH CUSTOMER DATA FROM API
if (isset($_GET['planCode']) && isset($_GET['cusCode'])) {

  $_SESSION['createnewplan']= "You successfully created a new subscription plan.";

  $planCode = $_GET['planCode'];
  $cusCode = $_GET['cusCode'];
  getcustomerplanData($planCode, $cusCode);
}
//print_r($_SESSION['plan']);
if (isset($_GET['success']) AND $_GET["success"]=='newplancreated') {
  echo '<div class="container">
  <div id="alert" class="alert alert-success alert-dismissable flyover flyover-centered" role="alert">
  <h5 class="alert-heading">Congrats! '.ucwords($_SESSION['usersfname']).'</h5>
  <p>'. $_SESSION['createnewplan'] .'</p>
  <hr>
  </div>
  </div>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Savings | Streams Global</title>
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
</head>
<script src="https://js.paystack.co/v1/inline.js"></script>
<!-- <button type="button" onclick="payWithPaystack()"> Pay </button>  -->
<body class="bg-light">
  <body class="body">
    <div class="loader-body" id="loader">
  	<div class="loader"></div>
  </div>
  <button type='button' id='modalbtn' data-toggle='modal' class="d-none" data-target='#exampleModalCenter'>
  </button>

  <?php
  // echo "<h3> PHP List All Session Variables</h3>";
  //     foreach ($_SESSION as $key=>$val)
  //     echo $key." ".$val."<br/>";
  // //
  ?>

  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white shadow-lg" id="sidebar-wrapper">
      <!-- <div class="">Start Bootstrap </div> -->
      <a id="logo" href="../index" ><img src="../images/H-Logo_Color.png" width="100%" class="sidebar-heading img-responsive" alt="Streamsglobal"></a>
      <div class="list-group list-group-flush">
        <a href="dashboard" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-th-large mr-1"></i>Dashboard</a>
        <a href="savings" class="list-group-item list-group-item-action shadow-sm active"><i class="fas fa-wallet mr-1"></i>Savings</a>
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
        <?php
        $id = $_SESSION['usersid'];

        $cus_coderesult = mysqli_query($conn, "SELECT `*` FROM `savingsData` WHERE usersid='$id'");
        if (mysqli_num_rows($cus_coderesult) > 0){
          $user = mysqli_fetch_array($cus_coderesult);
          $cus_code = $user['cus_code'];
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/customer/'.$cus_code);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if($result){
          $data = json_decode($result, true);

          $all_sub = $data['data']['subscriptions'];
          $all = $data;
          $sessiondata = $_SESSION['plandata'];

          $amount = $data['data']['subscriptions'][$i]['amount'];


          // FETCH PLAN
          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/plan');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


          $headers = array();
          $headers[] = 'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56';
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

          $result = curl_exec($ch);
          if ($result){
            $plandata = json_decode($result, true);
            $all_plan = $plandata['data'][0];

            //$name = $plandata['data'][0]['subscriptions'][0]['subscription_code'];

            // $name = $plandata['data'][0]['plan_code'];
            // print_r($name);

          }
          if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
          }

          // echo "<pre>";
          // var_dump($all_plan);
          // echo "</pre>";
        }
        if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);


        echo "<h3 class='mt-4'>You Have ".count($all_sub)." Active Savings</h3>";
        echo "<div class='row'>";
        for ($x = 0; $x < count($all_sub); $x++){


          // $amount = "amount_".$x;
          // $topup_x = "topup".$x;

          echo "<div class='col-lg-4 col-md-4 col-sm-6 mb-4 h-100'>";
          echo "<div class='card border-0 shadow-sm rounded-lg h-100'>";
          echo "<div class='fixed-themes plan-color d-flex justify-content-between'>";
          echo "<h2 class='p-4 text-white'>&#8358;". number_format(substr($data['data']['subscriptions'][$x]['amount'], 0, 4)) ."</h2>";
          echo "<i class='fas fa-money-check mr-5 mt-3'></i>";
          echo "<span name='status' id='status_".$x."' onclick='planCompleted(".$x.")' style='height:2vw;' class='d-flex align-items-center rounded p-2 m-4 float-right bg-white text-success'>". $data['data']['subscriptions'][$x]['status'] ."</span>";
          echo "</div>";
          echo "<div class='card-body'>";
          echo "<address>";
          echo "<label class='text-muted'>Subscription Name</label><br>";
          echo "<p>". $plandata['data'][$x]['name'] ."</p>";
          echo "</address>";
          echo "<address>";
          echo "<label class='text-muted'>interval</label><br>";
          echo "<p>". $plandata['data'][$x]['interval'] ."</p>";
          echo "</address>";
          echo "<address>";
          echo "<label class='text-muted'>Data Created</label><br>";
          echo "<p>". $data['data']['subscriptions'][$x]['createdAt'] ."</p>";
          echo "</address>";
          echo "<hr>";

          echo "<div class='form-group d-flex justify-content-between'>";
          echo "<button onclick='showtopModal(".$x.")' class='btn btn-secondary btn-sm text-white' type='button'> Top up <i class='fas fa-plus'></i></button>";
          echo "<button name='withdrawal_".$x."' class='btn btn-primary btn-sm text-white d-none' type='submit'> Request withdrawal <i class='fas fa-paper-plane'></i></button>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";


          echo "
          <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered' role='document'>
          <div class='modal-content'>
          <div class='modal-header'>
          <h5 class='modal-title text-center' id='exampleModalCenterTitle'>How much do you want to top up</h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
          </div>
          <div class='modal-body'>
          <div class='row justify-content-center'>
          <div class='col rounded'>
          <p id='topupname'></p>
          <form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='GET' role='form'>
          <div class='form-group'>
          <input name='"."amount_".$x."' type='text' class='form-control form-control-lg' id='formGroupExampleInput' placeholder='Enter amount'>
          </div>
          <button type='submit' onclick='javascript:location.href=\"\"' class='btn btn-primary btn-block' name='"."topup_".$x."'>Top up <i class='fas fa-plus'></i></button>
          </form>
          </div>
          </div>

          </div>
          </div>
          </div>
          </div>
          ";


          #################### TO TOPUP PLAN ########################
          if (isset($_GET["x"])) {
            $xx = $_GET["x"];
          }

          if (isset($_GET["amount_".$x])) {

            //echo $xx;
            //$amount = $_GET[$mount];
            //echo $_GET["amount_".$x];
            $amount = $_GET["amount_".$x];
            $x_planCode = $plandata['data'][$x]['plan_code'];

            $result = array();
            //Set other parameters as keys in the $postdata array
            $postdata =  array(
              'email' => $_SESSION['usersemail'],
              'amount' => $amount,
              'reference' => '7PVGX8MEk85tgeEpVDtD',
              'plan' => $x_planCode,
            );
            $url = "https://api.paystack.co/transaction/initialize";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata));  //Post Fields
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $headers = [
              'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56',
              'Content-Type: application/json',

            ];
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $request = curl_exec ($ch);

            curl_close ($ch);

            if ($request) {
              $result = json_decode($request, true);
            }

          }
        }
        ?>
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
  if (queryParameters().success == "plancreated"){
    $("#subBtn")[0].click();
  }

  $("body").on('DOMSubtreeModified', "span[name*='status']", function() {
    $("span[name*='status']")[0].click();
  });

  function planCompleted(e){
    var status = $("#status_"+e);
    // alert('called plan: '+e);
    if(status.text().indexOf("complete") >-1) {
      $("button[name='withdrawal_"+e+"']").removeClass("d-none");
    }
  }

  function showtopModal(en){
    var topupname = $("#topupname");
    topupname.text(en);
    $("#modalbtn")[0].click();
    getX(en);
  }

  function getX(x){
    window.location.hash='?x='+x+'';
    return true;
  }
  // function editAds(editid){
  //   window.location.href='admin.php?edit_id=' +editid+'';
  //   return true;
  // }



  </script>

</body>

</html>
