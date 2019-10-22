<?php
if (isset($_SESSION['usersid'])) {
  header('location: start.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login | Streamsglobal</title>
  <meta content="Log into your Streamsglobal Account" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});</script>
  [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>
<body class="body">
  <div class="header-section login-section">
    <?php
    require ('./menu.php');
    ?>
    <div class="div_grid">
      <div class="form-block w-form">
        <form action="login.php" method="post" class="form">
          <h1 class="heading-6">Secure Login</h1>
          <p class="paragraph-11">Please Continue From Where You Left Off</p>

          <!-- messages displays here -->
          <?php  if(count($errors) > 0): ?>
            <div class="error">
              <?php foreach ($errors as $error): ?>
                <div><?php echo $error; ?></div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <div class="success-message w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div>

          <label for="email">Email or Phone Number</label>
          <input type="text" name="emailPhone" value="<?php echo $emailPhone;?>" class="text-field w-input">
          <label for="password">Password</label>
          <input type="password" name="password" class="text-field-2 w-input" autocomplete="off">
          <input type="submit" name="login-btn" value="Secured Login" data-wait="please wait..." class="submit-button w-button">
        </form>


      </div>
    </div>
    <div class="form-option">
      <a href="sign-up.php" class="form-link">Create new Account</a>
      <a href="forgotten-password.php" class="form-link">Forgot Password?</a>
      <p class="paragraph-12">By clicking on Log In, you agree to our <a href="terms.php" class="form-footer">terms &amp; service</a> and <a href="privacy.php" class="form-footer">privacy policy</a></p>
    </div>
  </div>

  <?php
  require ('./component/footer.php');
  ?>
