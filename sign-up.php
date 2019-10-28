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
  <title>Sign up | Streamsglobal</title>
  <meta content="Register an account to start saving" property="og:title">
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
<body>
  <div class="header-section sign-section">
    <?php
    //require ('./component/menu.php');
    ?>
    <div class="div_grid">
      <div class="form-block w-form">

        <form action="sign-up.php" method="post" name="registration" class="form">
          <h1 class="heading-6">Create New Account</h1>
          <p class="paragraph-11">Please Continue From Where You Left Off</p>

          <!-- messages displays here -->
          <?php  if(count($errors) > 0): ?>
            <div class="error">
              <?php foreach ($errors as $error): ?>
                <div><?php echo $error; ?></div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <div class="row">
            <div class="col">
              <label for="fname">First Name</label>
              <input type="text" name="fname" value="<?php echo $firstname;?>" class="text-field w-input">
            </div>
            <div class="col">
              <label for="Lname">Last Name</label>
              <input type="text" name="lname" value="<?php echo $lastname;?>" class="text-field w-input">
            </div>
          </div>
          <label for="email">Email Address</label>
          <input type="text" name="email" value="<?php echo $email;?>" class="text-field w-input">
          <label for="phone">Phone Number</label>
          <input type="text" name="phone" value="<?php echo $phone;?>" class="text-field w-input">
          <label for="phone">Referral Code (Optional)</label>
          <input type="text" name="referralcode" value="<?php echo $referralcode;?>" class="text-field w-input">
          <label for="password">Password</label>
          <input type="password" name="password" class="text-field-2 w-input">
          <label for="password">Confirm Password</label>
          <input type="password" name="passwordConfirm" class="text-field-2 w-input">
          <button type="submit" name="signup-btn" data-wait="please wait..." class="btn btn-primary">
            Continue
            <i class="fas fa-long-arrow-alt-right"></i>
          </button>
        </form>
      </div>

      <div class="form-option">
        <p>Already Registered? <a href="login.php" class="form-link">Login</a></p>
        <p class="paragraph-12">By clicking on continue, you agree to our <a href="terms.php" target="_blank" class="form-footer">terms &amp; service</a> and <a href="privacy.php" target="_blank" class="form-footer">privacy policy</a></p>
      </div>
    </div>
  </div>

  <?php
  require ('./component/mini-footer.php');
  ?>
