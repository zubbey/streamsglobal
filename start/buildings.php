<?php
session_start();
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Mar 31 2019 17:13:26 GMT+0000 (UTC)  -->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Buildings</title>
	<meta content="Buildings" property="og:title">
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
				<p class="plan-paragragh">LAND: This is for cooperators that wants to buy land in their choice location or save for streams coop Estate Lekki, Lagos, Abuja, Port Harcourt coming soon.they are to save a minimum of 2,000 daily for the land in our estate coming soon or they take money back and buy at their choice location. savings period is 6 or 12 months interest 6.5% and 14%.</p>
				<div class="columns-2 w-row">
					<div data-w-id="3372ed22-2729-3e78-650a-2a1f57162673" class="col col-plan w-col w-col-6">
						<h1 class="heading-2"><strong>BUILDING SAVINGS</strong></h1>
						<p class="paragraph-2">Here cooperators saves a minimum of 5,000 daily for 12 month or more. The cooperative gives the cooperator 14% per annum and 30 bags of cement delivered to the choice location.</p>
					</div>
					<div data-w-id="3372ed22-2729-3e78-650a-2a1f57162679" class="col w-col w-col-6">
						<h1 class="heading-2"><strong>HOUSE PURCHASE SAVINGS</strong></h1>
						<p class="paragraph-2">here the cooperator saves for the purchase of an assured built house.Minimum daily saving is 50,000 the cooperative gives the cooperator 20% on this savings and the minimum duration is 12 months. Minimum monthly savings here is 1,500,000.</p>
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