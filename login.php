<?php
require_once ('./controllers/authController.php');

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
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>
<body class="body bg-light">
  <div class="container">

    <div class="row justify-content-center mt-5">
      <div class="col-md-5 bg-white p-4 shadow-sm p-3 mb-1 bg-white rounded">
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
          <input type="text" name="emailPhone" value="<?php echo $emailPhone;?>" class="text-field w-input" autocomplete="on">
          <label for="password">Password</label>
          <input type="password" name="password" class="text-field-2 w-input" autocomplete="off">
          <div class="form-group">
            <button type="submit" name="login-btn" data-wait="please wait..." class="btn btn-primary btn-block">
              Secured Login  <i class="fas fa-lock"></i>
            </button>
          </div>
        </form>


      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-5 text-center">
        <ul class="list-group list-group-flush">
          <li class="list-group-item bg-transparent">Not a Member?  <a href="sign-up.php" class="form-link"> Create new account</a></li>
          <li class="list-group-item bg-transparent"><a href="forgotten-password.php" class="form-link">Forgot Password?</a></li>
          <li class="list-group-item bg-transparent">By clicking on Log In, you agree to our <a href="terms.php" target="_blank" class="form-footer">terms &amp; service</a> and <a href="privacy.php" target="_blank" class="form-footer">privacy policy</a></li>
        </ul>
      </div>
    </div>
  </div>

  <?php
  require ('component/mini-footer.php');
  ?>
</body>
</html>
