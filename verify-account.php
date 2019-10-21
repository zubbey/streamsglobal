<?php
session_start();
?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Mar 31 2019 17:13:26 GMT+0000 (UTC)  -->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Verify account</title>
  <meta content="Verify account" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>
<body class="body">
	<div class="header-section">

		<?php
		require "menu.php";
		?>

			<div class="div_grid">
				<div id="w-node-af82d39c6fee-a9055c53" class="form-block w-form">
					<form id="wf-form-Login-Form" name="wf-form-Login-Form" data-name="Login Form" method="post" class="form">
						<h1 class="heading-6">Account Verification</h1>
						<p class="paragraph-11">Please Verify to Continue</p>
						<label for="verify">Enter Verification Code</label>
						<input type="text" id="email" name="email" data-name="email" maxlength="256" required="" class="text-field w-input">
						<input type="submit" value="Verify" data-wait="please wait..." class="submit-button w-button"></form>
						<div class="w-form-fail">
							<div>Oops! Something went wrong while submitting the form.</div>
						</div>
						<div class="form-option"><a href="#" class="form-link">Resend Code</a>
							<p class="paragraph-12">By clicking on Log In, you agree to our <a href="https://www.cowrywise.com/terms/" class="form-footer">terms &amp; service</a> and <a href="https://www.cowrywise.com/privacy/" class="form-footer">privacy policy</a></p>
						</div>
					</div>
					<div id="w-node-b262f1c29c25-a9055c53" class="form-content">
						<h1 class="heading-7">You are one step closer.</h1>
						<p class="paragraph-13">What are you still waiting for?<br>Savings can never be any better.</p>
					</div>
				</div>
		</div>

<?php
require "footer.php";
?>