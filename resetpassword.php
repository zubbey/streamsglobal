<?php
require_once ('./controllers/authController.php');

if (isset($_SESSION['usersid'])) {
  header('location: start.php');
}

if (isset($_GET['token'])) {
  $usertoken = $_GET['token'];
  createnewPassword($usertoken);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Reset Password | Streamsglobal</title>
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form">
          <h1 class="heading-6">Create new password</h1>
          <p class="paragraph-11">Enter a new password you can remember</p>

          <!-- messages displays here -->
          <?php
          if(count($errors) > 0){
            echo "<div class='alert alert-danger' role='alert'>";
            foreach ($errors as $error){
              echo "<p>". $error ."</p>";
            }
            echo "</div>";
          }
          ?>

          <label for="password">New Password</label>
          <input type="password" name="new_password" class="text-field-2 w-input" autocomplete="off">
          <label for="password">Confirm Password</label>
          <input type="password" name="confirm_password" class="text-field-2 w-input" autocomplete="off">
          <div class="form-group">
            <button type="submit" name="create-new_password-btn" data-wait="please wait..." class="btn btn-primary btn-block">
              Create Password  <i class="fas fa-lock"></i>
            </button>
          </div>
        </form>


      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-5 text-center">
        <ul class="list-group list-group-flush">
          <li class="list-group-item bg-transparent">By clicking on Log In, you agree to our <a href="terms" target="_blank" class="form-footer">terms &amp; service</a> and <a href="privacy" target="_blank" class="form-footer">privacy policy</a></li>
        </ul>
      </div>
    </div>
  </div>

  <?php
  require ('component/mini-footer.php');
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
  $("#footer").css('bottom', '0');
  </script>
</body>
</html>
