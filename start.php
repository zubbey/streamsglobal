<?php
require_once ('./controllers/authController.php');

if (!isset($_SESSION['usersid'])) {
  header('location: login');
}

if (isset($_GET['reference'])) {
  $reference = $_GET['reference'];

  if(isset($_GET['success']) AND $_GET["success"] == 'entryverified' AND $_GET["reference"] == $reference) {
    createreferralID();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Start | Streamsglobal</title>
  <meta content="Start" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>

<body class="body">
  <?php
  if (isset($_SESSION['usersid'])) {
    require ('./component/menu.home.php');
  }
  else {
    require ('./component/menu.php');
  }
  ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <?php

        if(isset($_SESSION['successaccount'])){
          echo '
          <div id="alert" class="alert alert-success alert-dismissable flyover flyover-centered" role="alert">
          <h4 class="alert-heading">Congrats! '.ucwords($_SESSION['usersfname']).'</h4>
          <p>'. $_SESSION['successaccount'] .'</p>
          <hr>
          <p class="mb-0">Select a plan to start your saving.</p>
          </div>
          ';
          unset($_SESSION['successaccount']);
        }
        if(isset($_SESSION['successlogin'])){
          echo '
          <div id="alert" class="alert alert-success alert-dismissable flyover flyover-centered" role="alert">
          <h4 class="alert-heading">Welcome back '.ucwords($_SESSION['usersfname']).'</h4>
          <p>'. $_SESSION['successlogin'] .'</p>
          </div>
          ';
          unset($_SESSION['successlogin']);
        }
        // if(isset($_SESSION['payment'])){
        //   echo '<div class="alert '.$_SESSION['warning-message'].'"><div>'. $_SESSION['payment'] .'</div></div>';
        //   unset($_SESSION['payment']);
        //   unset($_SESSION['warning-message']);
        // }

        ?>
      </div>
    </div>

    <div class="row text-center mt-5 mx-auto d-flex justify-content-center">
      <div class="col-sm-7">
        <h1 class="display-4 font-weight-bold">Select Your Savings Plan.</h1>
        <p class="lead">A Steams Global account brings you a step closer to financial discipline. We make it easy to achieve your personal saving goals. Choose how you save.</p>
        <hr class="my-4">
      </div>
    </div>

    <div class="container">
      <div class="row py-5">
        <div class="col text-center">
          <div class="card product">
            <div class="card-body p-0">
              <img src="images/piggy.jpg" alt="Piggy Wallet image" class="image span">
              <h1 class="h4 p-2">Piggy Wallet</h1>
              <hr class='my-2'>
              <p class="px-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            </div>
          </div>
        </div>

        <div class="col text-center">
          <div class="card product">
            <div class="card-body p-0">
              <img src="images/saap.jpg" alt="" class="image span">
              <h1 class="h4 p-2">SAAP</h1>
              <hr class='my-2'>
              <p class="px-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            </div>
          </div>
        </div>

        <div class="col text-center">
          <div class="card product">
            <div class="card-body p-0">
              <img src="images/fixed.jpg" alt="" class="image span">
              <h1 class="h4 p-2">Fixed Savings</h1>
              <hr class='my-2'>
              <p class="px-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php
  require ('./component/footer.php');
  ?>
