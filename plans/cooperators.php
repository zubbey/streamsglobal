<?php
session_start();
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Mar 31 2019 17:13:26 GMT+0000 (UTC)  -->
<html lang="en">
<head>
<meta charset="utf-8">
<title>Cooperators</title>
<meta content="Cooperators" property="og:title">
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
  <div class="header-section feature-section loan">
    <div class="div_content plan">
      <h1 class="plan-heading"><strong>RENT SAVINGS </strong></h1>
      <p class="plan-paragragh">Cooperators bank is a long terms savings programme. It is of two categories<br>1. 3 years Coop Banking<br>2. 5 years Coop Banking<br>3 Years Coop Banking:<br>Here you save a minimum of 1,000 daily,30,000 monthly, the cooperator gets 20% of the total amount saved yearly for 3 years at the end of the 3 years circle, you get your total money saved back, by then you must have earned 60% which was divided into 20% yearly. 5 Years Cooperative banking: Here you save a minimum of 1,000 daily 30,000 monthly for 5 years. Here your savings and interest care paid at the end of the five years and you get 100% of your saving.You also earn profit from supplies declared every year for five years.</p>
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