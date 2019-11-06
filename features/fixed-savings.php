<?php
session_start();
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Mar 31 2019 17:13:26 GMT+0000 (UTC)  -->
<html lang="en">
<head>
<meta charset="utf-8">
<title>Fixed savings</title>
<meta content="Fixed savings" property="og:title">
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

<?php
require "lite.menu.start.php";
?>

<main>
  <div class="header-section feature-section">
    <div class="div_content plan">
      <h1 class="plan-heading">FIXED AND TARGETED SAVINGS</h1>
      <div class="columns-2 w-row">
        <div data-w-id="1626b738-bfdf-2fee-904c-d740c7288f0d" style="background-color:rgb(255,255,255);color:rgb(0,0,0)" class="col col-plan w-col w-col-6">
          <h1 class="heading-2"><strong>FIXED SAVINGS</strong></h1>
          <p class="paragraph-2">Here you deposit your choice amount once bulk deposit minimum amount is 100,00 this money is kept for one year without withdrawal of the cooperator gets 30% of the total sum fixed in one year</p>
        </div>
        <div data-w-id="1626b738-bfdf-2fee-904c-d740c7288f0e" style="background-color:rgb(255,255,255);color:rgb(0,0,0)" class="col w-col w-col-6">
          <h1 class="heading-2"><strong>TARGETED SAVINGS.</strong></h1>
          <p class="paragraph-2">targeted savings. This is a monthly saving plan for 12 months. The cooperators saves a minimum of 30,000 monthly for one year, no withdrawal to the set time. the cooperator gets 15% of the total sum saved TNC applies</p>
        </div>
      </div>
      <div class="plan-btn">
        <a href="../start.php" class="button plan-btn back w-inline-block">
          <div class="text-block-7 arrow back"><em class="italic-text-10"></em></div>
          <div class="div-block">
            <div>Go Back</div>
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
  </div>
</main>

<?php
require "footer.start.php";
?>