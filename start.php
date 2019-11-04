<?php
require_once ('./controllers/authController.php');

// if (!isset($_SESSION['usersid'])) {
//   header('location: login.php');
// }

// if (isset($_GET['entryverified'])) {
//   $token = $_GET['entryverified'];
//   verifyUser($token);
// }

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

  <style>

  </style>

  <div data-w-id="54b3b754-1c54-b11b-7e2d-95377a4d5c7b" class="preloader">
    <img src="images/Preloader.svg" width="120" alt="Loading...">
  </div>

  <div class="header-section start-section">


    <?php
    if (isset($_SESSION['usersid'])) {
      require ('./component/menu.home.php');
    }
    else {
      require ('./component/menu.php');
    }

    if(isset($_GET['success']) AND $_GET["success"]=='entryverified') {

      $referralid = bin2hex(random_bytes(3));
      $id = $_SESSION['usersid'];
      //echo $referralid;
      $sql = "SELECT `*` FROM `users` WHERE `userid`='$id';";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      if (mysqli_num_rows($result) > 0) {

        $sql = "UPDATE `users` SET `referralid` = '$referralid' WHERE `userid` = '$id';";
        $result = mysqli_query($conn, $sql);

        if($result){
          echo "<script>alert('Referralid created.')</script>";
        } else{
          echo "<script>alert('Could not create Referralid.')</script>";
        }
        mysql_close($conn);
      }

      ?>


      <div class="container">
        <?php

        if(isset($_SESSION['successaccount'])){
          echo '<div class="alert '.$_SESSION['success-message'].'"><div>'. $_SESSION['successaccount'] .'</div></div>';
          unset($_SESSION['successaccount']);
          unset($_SESSION['success-message']);
        }
        if(isset($_SESSION['successlogin'])){
          echo '<div class="alert '.$_SESSION['success-message'].'"><div>'. $_SESSION['successlogin'] .'</div></div>';
          unset($_SESSION['successlogin']);
          unset($_SESSION['success-message']);
        }
        if(isset($_SESSION['payment'])){
          echo '<div class="alert '.$_SESSION['warning-message'].'"><div>'. $_SESSION['payment'] .'</div></div>';
          unset($_SESSION['payment']);
          unset($_SESSION['warning-message']);
        }

        ?>
        <div class="start-heading">
          <?php
          if (isset($_SESSION['usersid'])) {
            echo '<h1 class="heading-2 h1 h-start">Welcome Back '. ucwords($_SESSION['usersfname']) .'</h1>';
            echo '<h1 class="heading-2 h1 h3">Select Your Savings Plan.</h1>';
          }
          else {
            echo '<h1 class="heading-2 h1 h-start">You are not logged in.</h1>';
            echo '<h1 class="heading-2 h1 h3">Login to start Saving today.</h1>';
          }


          ?>
          <p class="paragraph-2 plan-paragragh">A Steams Global account brings you a step closer to financial discipline. We make it easy to achieve your personal saving goals. Choose how you save.</p>

        </div>
        <div class="row w-row">
          <div class="col w-col w-col-4">
            <img src="images/piggy_bg.png" width="472" height="121" alt="" class="image span">
            <h1 class="heading-3">Piggy Wallet</h1>
            <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <a href="start/piggy-wallet.php" class="link">Get Started</a>
          </div>
          <div class="col w-col w-col-4">
            <img src="images/SAAP.png" width="472" height="121" alt="" class="image span">
            <h1 class="heading-3">SAAP</h1>
            <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <a href="start/saap.php" class="link">Get Started</a>
          </div>
          <div class="col w-col w-col-4">
            <img src="images/fixed_bg.png" width="472" height="121" alt="" class="image span">
            <h1 class="heading-3">Fixed Savings</h1>
            <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <a href="start/fixed-savings.php" class="link">Get Started</a>
          </div>
        </div>

        <div class="row w-row">
          <div class="col w-col w-col-4">
            <img src="images/Loan.png" width="472" height="121" srcset="images/Loan-p-500.png 500w, images/Loan.png 706w" sizes="(max-width: 479px) 14vw, (max-width: 767px) 16vw, (max-width: 991px) 23vw, 27vw" alt="" class="image span">
            <h1 class="heading-3">Loans</h1>
            <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <a href="start/loans.php" class="link">Get Started</a>
          </div>
          <div class="col w-col w-col-4">
            <img src="images/School.png" width="472" height="121" alt="" class="image span">
            <h1 class="heading-3">90Days School Fees Thrift</h1>
            <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <a href="start/school-fees.php" class="link">Get Started</a>
          </div>
          <div class="col w-col w-col-4">
            <img src="images/Rent.png" width="472" height="121" srcset="images/Rent-p-500.png 500w, images/Rent.png 706w" sizes="(max-width: 479px) 14vw, (max-width: 767px) 16vw, (max-width: 991px) 23vw, 27vw" alt="" class="image span">
            <h1 class="heading-3">Rent Savings</h1>
            <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <a href="start/rents.php" class="link">Get Started</a>
          </div>
        </div>

        <div class="row w-row">
          <div class="col w-col w-col-4">
            <img src="images/Building.png" width="472" height="121" alt="" class="image span">
            <h1 class="heading-3">Land,House &amp; Building Savings</h1>
            <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <a href="start/buildings.php" class="link">Get Started</a>
          </div>
          <div class="col w-col w-col-4">
            <img src="images/Cooperator.png" width="472" height="121" srcset="images/Cooperator-p-500.png 500w, images/Cooperator.png 706w" sizes="(max-width: 479px) 14vw, (max-width: 767px) 16vw, (max-width: 991px) 23vw, 27vw" alt="" class="image span">
            <h1 class="heading-3">Cooperators Bank</h1>
            <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <a href="start/Cooperators.php" class="link">Get Started</a>
          </div>
          <div class="col w-col w-col-4">
            <img src="images/Diaspora.png" width="472" height="121" alt="" class="image span">
            <h1 class="heading-3">Diaspora Safe</h1>
            <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <a href="start/diaspora-safe.php" class="link">Get Started</a>
          </div>
        </div>

      </div>
    </div>

    <?php
    require ('./component/footer.php');
    ?>
