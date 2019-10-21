<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>reset password | Streams Global</title>
  <meta content="rest password" property="og:title">
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
      <div id="w-node-af82d39c6fee-a19496d5" class="form-block w-form">

        <form action="" id="wf-form-Login-Form" name="wf-form-Login-Form" data-name="Login Form" method="post" class="form">

          <h1 class="heading-6">Forgot Your Password?</h1>
          <p class="paragraph-11">Enter your email address below to reset your password</p>
          <label for="new-password">New Password</label>
          <input type="password" id="new-password" name="pwd" data-name="new-password" maxlength="256" autocomplete="off" class="text-field w-input">
          <label for="new-password-3">Comfirm Password</label>
          <input type="password" id="comfirm-password" name="pwd-repeat" data-name="New Password 2" maxlength="256" autocomplete="off" class="text-field w-input">
          <input type="submit" name="reset-password-submit" value="Change Password" data-wait="please wait..." class="submit-button w-button">
        </form>

        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form.</div>
        </div>
        <div class="form-option">
          <p class="paragraph-12">By clicking on Log In, you agree to our <a href="terms.php" class="form-footer">terms &amp; service</a> and <a href="privacy.php" class="form-footer">privacy policy</a></p>
        </div>
      </div>
      <div id="w-node-b262f1c29c25-a19496d5" class="form-content">
        <h1 class="heading-7">Recover your Account.</h1>
        <p class="paragraph-13">What are you still waiting for?<br>Savings can never be any better.</p>
      </div>
    </div>
  </div>

</body>
</html>