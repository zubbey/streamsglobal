<?php
require_once ('./controllers/authController.php');

// if (isset($_SESSION['usersid'])) {
//   header('location: start.php');
// }
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
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
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <div class="container">
    <!-- Horizontal Steppers -->
    <div class="row">
      <div class="col col-md-8 mx-auto">
        <div class="wrapper-progressBar">
          <ul class="progressBar">
            <li class="active"><span class="text-muted">Register account</span></li>
            <li class=""><span class="text-muted">Verify account</span></li>
            <li class=""><span class="text-muted">Entry payment</span></li>
          </ul>
        </div>
      </div>
    </div>

    <div id="emailMsg" class="row mt-3">
      <?php echo $msg; ?>
    </div>

    <?php
    // Verify Token form email

    if (isset($_GET['token'])) {
      $token = $_GET['token'];
      verifyUser($token);
    }

    if(isset($_GET['success']) AND $_GET["success"]=='step2')
    {
      echo "<div class='row justify-content-center mt-5'>";
      echo "<div class='col-md-5 bg-white p-4 shadow-sm p-3 mb-1 bg-white rounded text-center'>";
      echo "<h1 class='heading-6'>Verify your account</h1>";
      echo "<p>We sent a verification link to your email <strong>". $_SESSION['usersemail'] ."</strong>, check your email address to continue.</p>";
      echo "<ul class='list-group list-group-flush'>";
      echo "<li class='list-group-item bg-transparent'>Didn't get the email?
      <form action='sign-up.php' method='post'>
      <button type='submit' name='resendemail' class='form-link'>Resend email</button>
      </form>";
      echo "</ul>";
      echo "</div>";
      echo "</div>";
    } else if(isset($_GET['success']) AND $_GET["success"]== 'step3')
    {
      echo "<div class='row justify-content-center mt-5'>";
      echo "<div class='col-md-5 bg-white p-4 shadow-sm p-3 mb-1 bg-white rounded text-center'>";
      echo "<h1 class='heading-6'>Make your entry payment</h1>";
      echo "<p>Hello ". ucwords($_SESSION['usersfname']) .", you have to pay a membership fee of <strong>&#8358;1,000 </strong>to activate your account</p>";
      echo "<ul class='list-group list-group-flush'>";
      echo "<li class='list-group-item bg-transparent'><button type='button' onclick='payWithPaystack()' name='entrypayment-btn' data-wait='please wait...' class='btn btn-primary btn-block'>Complete <i class='fas fa-check'></i></button></li>";
      echo "</ul>";
      echo "</div>";
      echo "</div>";
    }else{
      echo "<div class='row justify-content-center mt-5'>";
      echo "<div class='col-md-5 bg-white p-4 shadow-sm p-3 mb-1 bg-white rounded'>";

      echo "<form action='sign-up.php' method='post' name='registration' class='form'>";
      echo "<h1 class='heading-6'>Create New Account</h1>";
      echo "<p class='paragraph-11'>Please Continue From Where You Left Off</p>";

      //messages displays here
      if(count($errors) > 0){
        echo "<div class='error'>";
        foreach ($errors as $error){
          echo "<div>". $error ."</div>";
        }
        echo "</div>";
      }

      echo "<div class='row'>";
      echo "<div class='col'>";
      echo "<label for='fname'>First Name</label>";
      echo "<input type='text' name='fname' value='". $firstname ."' class='text-field w-input'> ";
      echo "</div>";
      echo "<div class='col'>";
      echo "<label for='Lname'>Last Name</label>";
      echo "<input type='text' name='lname' value='". $lastname ."' class='text-field w-input'>";
      echo "</div>";
      echo "</div>";
      echo "<label for='email'>Email Address</label>";
      echo "<input type='text' name='email' value='". $email ."' class='text-field w-input'>";
      echo "<label for='phone'>Phone Number</label>";
      echo "<input type='text' name='phone' value='". $phone ."' class='text-field w-input'>";
      echo "<label for='phone'>Referral Code (Optional)</label>";
      echo "<input type='text' name='referralcode' value='". $referralcode ."' class='text-field w-input'>";
      echo "<label for='password'>Password</label>";
      echo "<input type='password' name='password' class='text-field-2 w-input'>";
      echo "<label for='password'>Confirm Password</label>";
      echo "<input type='password' name='passwordConfirm' class='text-field-2 w-input'>";
      echo "<button type='submit' name='signup-btn' data-wait='please wait...' class='btn btn-primary btn-block'>Continue  <i class='fas fa-arrow-right'></i></button>";
      echo "</form>";
      echo "</div>";
      echo "</div>";

      echo "<div class='row justify-content-center'>";
      echo "<div class='col-md-5 text-center'>";
      echo "<ul class='list-group list-group-flush'>";
      echo "<li class='list-group-item bg-transparent'>Already Registered? <a href='login.php' class='form-link'>Login</a></li>";
      echo "<li class='list-group-item bg-transparent py-5'>By clicking on Continue, you agree to our <a href='terms.php' target='_blank' class='form-footer'>terms &amp; service</a> and <a href='privacy.php' target='_blank' class='form-footer'>privacy policy</a></li>";
      echo "</ul>";
      echo "</div>";
      echo "</div>";
    }
    ?>
  </div>
  <?php
  require ('./component/mini-footer.php');
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
  if (window.location.search.indexOf('step2') > -1) {
    $("ul li:nth-child(2)").addClass('active');
    $("#footer").css('bottom', '0');
  } else if(window.location.search.indexOf('step3') > -1){
    $("ul li:nth-child(3)").addClass('active');
    $("ul li:nth-child(2)").addClass('active');
    $("#footer").css('bottom', '0');
  }
  if(window.location.search.indexOf('closepayment') > -1){
    $(".heading-6").html('Please try again to complete your registration');
    $(".col-md-5").addClass('close-callback');
  }

  function updatereferral(){
    document.write(' <?php createreferralID(); ?> ');
  }

  //PAYSTACK INTEGRATION
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_02a7ea9bf16da92e8bfd82243e847b36c28a919a',
      email: '<?php echo $_SESSION["usersemail"]; ?>',
      amount: 100000,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
        custom_fields: [
          {
            display_name: "<?php echo $_SESSION['usersfname'].' '.$_SESSION['userslname']; ?>",
            variable_name: "<?php echo $_SESSION['usersfname']; ?>",
            value: "<?php echo $_SESSION['usersphone']; ?>"
          }
        ]
      },
      callback: function(response){
        updatereferral();
        //window.location.assign("http://streamsglobal.com/start.php?success="+response.reference);
        //alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
        window.location.assign("http://streamsglobal.com/sign-up.php?success=step3&error=closepayment");
      }
    });
    handler.openIframe();
  }
  </script>
  </body>
  </html>
