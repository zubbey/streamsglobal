<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Loans</title>
<meta content="Loans" property="og:title">
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

<div class="header-section feature-section loan">
  <main>
    <div class="div_content plan">
      <h1 class="plan-heading"><strong>LOANS</strong></h1>
      <p class="plan-paragragh">Loans are given to eligible members that has been saving for atlist 90 days process. Terms and Conditions applies.</p>
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
  </main>
</div>

<?php
require "footer.start.php";
?>