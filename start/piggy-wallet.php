<?php
session_start();
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Mar 31 2019 17:13:26 GMT+0000 (UTC)  -->
<html lang="en">
<head>
<meta charset="utf-8">
<title>Piggy Wallet</title>
<meta content="Piggy Wallet" property="og:title">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="Webflow" name="generator">
<link href="../css/normalize.css" rel="stylesheet" type="text/css">
<link href="../css/webflow.css" rel="stylesheet" type="text/css">
<link href="../css/streams-project.webflow.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
<script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});</script>
<!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
<script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
<link href="../images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
<link href="../images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>
<body>
<div class="header-section feature-section">

  <?php
  require "lite.menu.start.php";
  ?>
  <main>
    <div class="div_content plan">
      <h1 class="plan-heading">PIGGY WALLET</h1>
      <div class="columns-2 w-row">
        <div data-w-id="1626b738-bfdf-2fee-904c-d740c7288f0d" style="background-color:rgb(255,255,255);color:rgb(0,0,0)" class="col col-plan w-col w-col-3 w-col-medium-6">
          <h1 class="heading-2">Piggy Wallet 1</h1>
          <p class="paragraph-2">30 days saver this (works like AJOF, Akawo or Esusu, here you choose the amount you want to be saving daily at the end of the month you get your total money back, paid directly to your bank account.<br>The minimum savings daily is 1,000 minimum no of days to save is 30 days, excluding February. <br>No withdrawals until 31 days for months that has 30 days and 32 days for months of 31 days meaning you get your daily savings of Ajor, Akawoor Esusu 24 working hours from the end of the month.<br>Those that couldn&#x27;t save for 30 or 31 days gets whatever theyhave saved the same time others are getting.</p>
        </div>
        <div data-w-id="1626b738-bfdf-2fee-904c-d740c7288f0e" style="background-color:rgb(255,255,255);color:rgb(0,0,0)" class="col w-col w-col-3 w-col-medium-6">
          <h1 class="heading-2">Piggy Wallet 2</h1>
          <p class="paragraph-2">90 days daily savings with interest here you save your choice amount daily for 90 days, minimum savings is 1,000, no withdrawal until 90 days cooperators that couldn&#x27;t meet up the payments get their money when others will be getting there in 90 days, 1000 minimum savings.here the cooperative gives you 3.0 % for your total saving with us after 90 days all percentages are calculated daily for every month.</p>
        </div>
        <div data-w-id="a316a1b3-9014-8f17-9a70-899583a7a75d" style="background-color:rgb(255,255,255);color:rgb(0,0,0)" class="col w-col w-col-3 w-col-medium-6">
          <h1 class="heading-2">Piggy Wallet 3</h1>
          <p class="paragraph-2">6 Months Daily Saver, here you choose your savings amount.The co-operative gives you 6.5% interest on your total savings, All terms &amp;conditions of piggy wallet applies. All percentages are calculated daily for every month.</p>
        </div>
        <div data-w-id="a316a1b3-9014-8f17-9a70-899583a7a75e" style="background-color:rgb(255,255,255);color:rgb(0,0,0)" class="col w-col w-col-3 w-col-medium-6">
          <h1 class="heading-2">Piggy Wallet 4</h1>
          <p class="paragraph-2">356 days daily saver, here the cooperative gives you 14%for savings with us daily. All terms and conditions of piggy wallet applies.All % percentages are calculated daily for every month.</p>
        </div>
      </div>
      <div class="plan-btn">
        <a href="../start.php" class="button plan-btn back w-inline-block">
          <div class="text-block-7 arrow back"><em class="italic-text-10"></em></div>
          <div class="div-block">
            <div class="text-block-11">Go Back</div>
          </div>
        </a>
        <form action="../controllers/paymentController.php" method="POST">
          <button type="submit" class="button plan-btn w-inline-block" name="continue-payment-button">
            <div class="div-block">
              <div>Continue</div>
            </div>
            <div class="text-block-7 arrow"><em class="italic-text-10"></em></div>
          </button>
        </form>
      </div>
    </div>
  </main>
</div>

<?php
require "footer.start.php";
?>