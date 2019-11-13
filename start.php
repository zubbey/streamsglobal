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

if (isset($_GET['token'])) {
  $token = $_GET['token'];
  verifyusernewEmail($token);
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/loader.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>

<body class="body">
  <body class="body">
    <div class="loader-body" id="loader">
  	<div class="loader"></div>
  </div>
  <?php
  if (isset($_SESSION['usersid'])) {
    require ('./component/menu.home.php');
  }
  else {
    require ('./component/menu.php');
  }
  ?>
  <div class="container">

    <div id="alert" class="alert alert-warning alert-dismissable flyover flyover-centered verifyMsg" role="alert">
      <div class="justify-content-between d-flex">
      <h3>Complete your signup</h3>
      <span><i class="fas fa-exclamation-triangle"></i></span>
    </div>
      <p class="mb-0">You are not a member yet, Please verify your account<br> and pay a membership fee to complete your <br> registration and start saving.</p>
    </div>

    <div class="row">
      <div class="col">
        <?php

        if(isset($_SESSION['successaccount'])){
          echo '
          <div id="alert" class="alert alert-success alert-dismissable flyover flyover-centered" role="alert">
          <h5 class="alert-heading">Congrats! '.ucwords($_SESSION['usersfname']).'</h5>
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
          <h5 class="alert-heading">Welcome back '.ucwords($_SESSION['usersfname']).'</h5>
          <p>'. $_SESSION['successlogin'] .'</p>
          </div>
          ';
          unset($_SESSION['successlogin']);
        }
        if(isset($_SESSION['emailverified'])){
          echo '
          <div id="alert" class="alert alert-success alert-dismissable flyover flyover-centered" role="alert">
          <h5 class="alert-heading">Welcome back '.ucwords($_SESSION['usersfname']).'</h5>
          <p>'. $_SESSION['emailverified'] .'</p>
          </div>
          ';
          unset($_SESSION['emailverified']);
        }
        if(isset($_SESSION['successverified'])){
          echo '
          <div id="alert" class="alert alert-success alert-dismissable flyover flyover-centered" role="alert">
          <h5 class="alert-heading">Congrats '.ucwords($_SESSION['usersfname']).' you account sign up it complete</h5>
          <p>'. $_SESSION['successverified'] .'</p>
          </div>
          ';
          unset($_SESSION['successverified']);
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

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
          <?php
          if ($_SESSION['verified'] == 0 || strlen($_SESSION['referralcode']) > 0) {
            echo '<a onclick="verifyaccountMsg()" href="#" class="after-loop-item card border-0 rounded-lg piggy-themes shadow-lg">';
          } else {
            echo '<a href="user/piggy" class="after-loop-item card border-0 rounded-lg piggy-themes shadow-lg">';
          }
          ?>
            <div class="card-body d-flex align-items-end flex-column text-right">
              <h4>Piggy Wallet</h4>
              <p class="w-75">Automatically save an amount at regular ...</p>
              <i class="fas fa-piggy-bank"></i>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
          <?php
          if ($_SESSION['verified'] == 0 || strlen($_SESSION['referralcode']) > 0) {
            echo '<a onclick="verifyaccountMsg()" href="#" class="after-loop-item card border-0 rounded-lg saap-themes shadow-lg">';
          } else {
            echo '<a href="user/saap" class="after-loop-item card border-0 rounded-lg saap-themes shadow-lg">';
          }
          ?>
            <div class="card-body d-flex align-items-end flex-column text-right">
              <h4>SAAP</h4>
              <p class="w-75">Automatically save an amount at regular ...</p>
              <i class="fas fa-cart-arrow-down"></i>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-8 mx-auto">
          <?php
          if ($_SESSION['verified'] == 0 || strlen($_SESSION['referralcode']) > 0) {
            echo '<a onclick="verifyaccountMsg()" href="#" class="after-loop-item card border-0 rounded-lg fixed-themes shadow-lg">';
          } else {
            echo '<a href="user/fixed" class="after-loop-item card border-0 rounded-lg fixed-themes shadow-lg">';
          }
          ?>
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
          <?php
          if ($_SESSION['verified'] == 0 || strlen($_SESSION['referralcode']) > 0) {
            echo '<a onclick="verifyaccountMsg()" href="#" class="after-loop-item card border-0 rounded-lg land-themes shadow-lg">';
          } else {
            echo '<a href="user/land" class="after-loop-item card border-0 rounded-lg land-themes shadow-lg">';
          }
          ?>
            <div class="card-body d-flex align-items-end flex-column text-right">
              <h4>Land & Building Savings</h4>
              <p class="w-75">Automatically save an amount at regular ...</p>
              <i class="fas fa-home"></i>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
          <?php
          if ($_SESSION['verified'] == 0 || strlen($_SESSION['referralcode']) > 0) {
            echo '<a onclick="verifyaccountMsg()" href="#" class="after-loop-item card border-0 rounded-lg cooperators-themes shadow-lg">';
          } else {
            echo '<a href="user/cooperators" class="after-loop-item card border-0 rounded-lg cooperators-themes shadow-lg">';
          }
          ?>
            <div class="card-body d-flex align-items-end flex-column text-right">
              <h4>Cooperators Bank</h4>
              <p class="w-75">Automatically save an amount at regular ...</p>
              <i class="fas fa-handshake"></i>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-8 mx-auto">
          <?php
          if ($_SESSION['verified'] == 0 || strlen($_SESSION['referralcode']) > 0) {
            echo '<a onclick="verifyaccountMsg()" href="#" class="after-loop-item card border-0 rounded-lg diaspora-themes shadow-lg">';
          } else {
            echo '<a href="user/diaspora" class="after-loop-item card border-0 rounded-lg diaspora-themes shadow-lg">';
          }
          ?>
            <div class="card-body d-flex align-items-end flex-column text-right">
              <h4>Diaspora Safe</h4>
              <p class="w-75">Automatically save an amount at regular ...</p>
              <i class="fab fa-diaspora"></i>
            </div>
          </a>
        </div>
      </div>
    </div>

  </div>

  <?php
  require ('./component/footer.php');
  ?>
