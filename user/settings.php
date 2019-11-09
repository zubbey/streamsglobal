<?php require_once ('../controllers/userController.php');
if (isset($_SESSION['usersid']) && $_SESSION['verified'] == 0) {
  header("Location: ../login");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Dashboard | Streams Global</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="../css/custom.css" rel="stylesheet" type="text/css">
  <link href="../css/users.css" rel="stylesheet" type="text/css">
  <link href="../css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});
  </script>
  <link href="../images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="../images/ms-icon-256x256.png" rel="apple-touch-icon">
  <style>
  .nav-link.active{
    font-weight: bold;
  }
  </style>
</head>

<body class="bg-light">
<?php

if(isset($_GET['success']) AND $_GET["success"]=='emailchanged'){

  echo "
  <button type='button' id='modalbtn' data-toggle='modal' data-target='#exampleModalCenter'>
</button>
  <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
  <div class='modal-content'>
  <div class='modal-header'>
  <h5 class='modal-title' id='exampleModalCenterTitle'>Verify your email address</h5>
  <button onclick=\"javascript:location.href='?close=1'\" type='button' class='close' data-dismiss='modal' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>
  <div class='modal-body'>

  <div class='row justify-content-center'>
    <div class='col p-4 shadow-sm p-3 mb-1 bg-white rounded text-center'>
      <p>We sent a verification link to your email <strong>". $_SESSION['usersemail'] ."</strong>, check your email address to continue.</p>
      <ul class='list-group list-group-flush'>
        <li class='list-group-item bg-transparent'>Didn't get the email?
          <a href='?resendemail=1' class='form-link'>Resend email</a>
        </li>
      </ul>
    </div>
  </div>

  </div>
  </div>
  </div>
  </div>
  ";

  $email = $_GET['email'];
  $Eclasstype = "is-invalid";
  $EclassFeedback = "invalid-feedback";
  $EmsgFeedback = "This Email address (".$email.") is not verified.";
}
?>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-white shadow-lg" id="sidebar-wrapper">
      <!-- <div class="">Start Bootstrap </div> -->
      <a id="logo" href="../index" ><img src="../images/H-Logo_Color.png" width="100%" class="sidebar-heading img-responsive" alt="Streamsglobal"></a>
      <div class="list-group list-group-flush">
        <a href="dashboard" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-th-large mr-1"></i>Dashboard</a>
        <a href="withdraw" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-wallet mr-1"></i>Withdraw</a>
        <hr class="my-2">
        <a href="settings" class="list-group-item list-group-item-action shadow-sm active"><i class="fas fa-user-cog mr-1"></i>Account Settings</a>
        <hr class="my-2">
        <a href="../start?logout=1" id="logout" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-sign-out-alt mr-1"></i>Sign Out</a>
        <a href="../faqs" class="list-group-item list-group-item-action shadow-sm"><i class="fas fa-question-circle mr-1"></i>FAQs</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <span id="menu-toggle" class="p-3"><i class="fas fa-compress"></i></span>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php

                $sql = "SELECT `*` FROM `users` LIMIT 1;";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  if ($user = mysqli_fetch_assoc($result)) {
                    $id = $_SESSION['usersid'];

                    $sqlImg = "SELECT `*` FROM `profileimg` WHERE `userid` = '$id' LIMIT 1;";
                    $resultImg = mysqli_query($conn, $sqlImg);
                    while ($imgRow = mysqli_fetch_assoc($resultImg)){

                      if ($imgRow['status'] == 0 ) {
                        echo '<img src="../images/uploads/profile'.$_SESSION['usersid'].'.jpg?'.mt_rand().'" ait="Profile Avatar" class="img-icon img-thumbnail rounded-circle">';
                      } else {
                        echo '<img src="https://i.imgur.com/gaJNXRO.png" ait="Profile Avatar" class="img-icon img-thumbnail rounded-circle">';
                      }
                    }
                  }
                }

                ?>
                <span class="text-uppercase">
                  <?php echo ucwords($_SESSION['usersfname']); ?>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="settings">Profile</a>
                <a class="dropdown-item" href="../start?logout=1">Sign out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <?php

        if(isset($_GET['error']) AND $_GET["error"]=='invalidphone'){
          $phone = $_GET['phone'];
          $Pclasstype = "is-invalid";
          $PclassFeedback = "invalid-feedback";
          $PmsgFeedback = "This Phone number (".$phone.") is invalid.";

        } else if(isset($_GET['error']) AND $_GET["error"]=='invalidemail'){
          $email = $_GET['email'];
          $Eclasstype = "is-invalid";
          $EclassFeedback = "invalid-feedback";
          $EmsgFeedback = "This Email address (".$email.") is invalid.";

        } else if(isset($_GET['error']) AND $_GET["error"]=='emailexist'){
          $email = $_GET['email'];
          $Eclasstype = "is-invalid";
          $EclassFeedback = "invalid-feedback";
          $EmsgFeedback = "This Email address (".$email.") is already in use.";

        } else if(isset($_GET['error']) AND $_GET["error"]=='nouserpasswordfound'){
          $PWnouserclasstype = "is-invalid";
          $PWnouserclassFeedback = "invalid-feedback";
          $PWnousermsgFeedback = "Your current password is incorrect.";

        } else if(isset($_GET['error']) AND $_GET["error"]=='passwordmustbelong'){
          $PWclasstype = "is-invalid";
          $PWclassFeedback = "invalid-feedback";
          $PWmsgFeedback = "Passwords must be at least 6 characters long.";

        } else if(isset($_GET['error']) AND $_GET["error"]=='passwordnotmatch'){
          $CPWclasstype = "is-invalid";
          $CPWclassFeedback = "invalid-feedback";
          $CPWmsgFeedback = "Passwords did not match.";

        }

        if (isset($_GET['error'])) {
          if ($_GET['error'] == "sizeerror") {
            echo '<div class="container">
            <div id="alert" class="alert alert-danger alert-dismissable flyover flyover-centered" role="alert">
            Oops! file too Large, image must be 50mb or Less.
            </div>
            </div>';
          }
          else if ($_GET['error'] == "errorupload") {
            echo '<div class="container">
            <div id="alert" class="alert alert-danger alert-dismissable flyover flyover-centered" role="alert">
            Oops! image could not be uploaded.
            </div>
            </div>';
          }
          else if ($_GET['error'] == "filenotallowed") {
            echo '<div class="container">
            <div id="alert" class="alert alert-danger alert-dismissable flyover flyover-centered" role="alert">
            Oops! Only JPG Image accepted.
            </div>
            </div>';
          }
          else if ($_GET['error'] == "sqlerror") {
            echo '<div class="container">
            <div id="alert" class="alert alert-danger alert-dismissable flyover flyover-centered" role="alert">
            Oops! Connection was not successful.
            </div>
            </div>';
          }
          else if ($_GET['error'] == "couldnotupdate") {
            echo '<div class="container">
            <div id="alert" class="alert alert-danger alert-dismissable flyover flyover-centered" role="alert">
            Oops! Could not Update.
            </div>
            </div>';
          }
        } else if (isset($_GET['success'])) {
          echo '<div class="container">
          <div id="alert" class="alert alert-success alert-dismissable flyover flyover-centered" role="alert">
          Yay! Profile Updated Successfully.
          </div>
          </div>';
        }
        ?>
        <div class="row">
          <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link text-muted active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-muted" id="personal-info-tab" data-toggle="tab" href="#personal-info" role="tab" aria-controls="personal-info" aria-selected="true">Personal Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-muted" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="true">Change Email</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-muted" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="true">Change Password</a>
              </li>
            </ul>
            <div class="tab-content py-4" id="myTabContent">
              <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!-- <div class="tab-pane active" id="profile"> -->
                <h5 class="mb-3">User Profile</h5>
                <div class="row">
                  <div class="col-md-6 text-muted">
                    <address>
                      <strong>Full Name</strong><br>
                      <p><?php echo $_SESSION['usersfname'].' '.$_SESSION['userslname'];?></p>
                    </address>
                    <address>
                      <strong>Email Address</strong><br>
                      <p><?php echo $_SESSION['usersemail'];?></p>
                    </address>
                    <address>
                      <strong>Phone Number</strong><br>
                      <p><?php echo $_SESSION['usersphone'];?></p>
                    </address>
                    <address>
                      <strong>Address</strong><br>
                      <?php echo $_SESSION['address'].' '.$_SESSION['city'].' '.$_SESSION['state'];?><br>
                    </address>
                    <address>
                      <strong>Gender</strong><br>
                      <?php echo $_SESSION['gender'];?><br>
                    </address>
                    <address>
                      <strong>Date of Birth</strong><br>
                      <?php echo $_SESSION['DOB'];?><br>
                    </address>
                    <address>
                      <strong>Local Government</strong><br>
                      <?php echo $_SESSION['LGA'];?><br>
                    </address>
                    <address>
                      <strong>Occupation</strong><br>
                      <?php echo $_SESSION['occupation'];?><br>
                    </address>
                    <address>
                      <strong>nationality</strong><br>
                      <?php echo $_SESSION['nationality'];?><br>
                    </address>
                  </div>
                  <div class="col-md-6">
                    <h6>Referral Code</h6>
                    <h2 class="badge badge-dark" style="font-size: 2rem;"><?php echo $_SESSION['referralcode'];?></h2>
                    <hr>
                    <span class="badge badge-primary"><i class="fa fa-user"></i> 1 Referred</span>
                    <span class="badge badge-danger"><i class="fa fa-cog"></i> 0 Active Plan</span>
                    <span class="badge badge-success"><i class="fa fa-eye"></i> Membership Verified</span>
                  </div>

                </div>
                <!--/row-->
              </div>

              <!-- EDIT / UPDATE ACCOUNT -->
              <div class="tab-pane fade" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                <!-- <div class="tab-pane" id="settings"> -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                  <h4 class="mb-3">Personal information</h4>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                    <div class="col-lg-9">
                      <input name="fname" class="form-control" type="text" value="<?php echo $_SESSION['usersfname'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                    <div class="col-lg-9">
                      <input name="lname" class="form-control" type="text" value="<?php echo $_SESSION['userslname'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
                    <div class="col-lg-9">
                      <input name="phone" class="form-control <?php echo $Pclasstype;?>" type="text" value="<?php echo $_SESSION['usersphone'];?>">
                      <div class="<?php echo $PclassFeedback;?>">
                        <?php echo $PmsgFeedback;?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                    <div class="col-lg-9">
                      <select name="gender" id="user_state" class="form-control" size="0">
                        <option selected><?php echo $_SESSION['gender'];?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                    <div class="col-lg-9">
                      <input name="address" class="form-control" type="text" value="<?php echo $_SESSION['address'];?>" placeholder="Street">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-6">
                      <input name="city" class="form-control" type="text" value="<?php echo $_SESSION['city'];?>" placeholder="City">
                    </div>
                    <div class="col-lg-3">
                      <select name="state" id="user_state" class="form-control" size="0">
                        <option selected="selected"><?php echo $_SESSION['state'];?></option>
                        <option value="Abia">Abia</option>
                        <option value="Adamawa">Adamawa</option>
                        <option value="Akwa Ibom">Akwa Ibom</option>
                        <option value="Anambra">Anambra</option>
                        <option value="Bauchi">Bauchi</option>
                        <option value="Bayelsa">Bayelsa</option>
                        <option value="Benue">Benue</option>
                        <option value="Borno">Borno</option>
                        <option value="Cross River">Cross River</option>
                        <option value="Delta">Delta</option>
                        <option value="Ebonyi">Ebonyi</option>
                        <option value="Edo">Edo</option>
                        <option value="Ekiti">Ekiti</option>
                        <option value="Enugu">Enugu</option>
                        <option value="Gombe">Gombe</option>
                        <option value="Imo">Imo</option>
                        <option value="Jigawa">Jigawa</option>
                        <option value="Kaduna">Kaduna</option>
                        <option value="Kano">Kano</option>
                        <option value="Katsina">Katsina</option>
                        <option value="Kebbi">Kebbi</option>
                        <option value="Kogi">Kogi</option>
                        <option value="Kwara">Kwara</option>
                        <option value="Lagos">Lagos</option>
                        <option value="Nasarawa">Nasarawa</option>
                        <option value="Niger">Niger</option>
                        <option value="Ogun">Ogun</option>
                        <option value="Ondo">Ondo</option>
                        <option value="Osun">Osun</option>
                        <option value="Oyo">Oyo</option>
                        <option value="Plateau">Plateau</option>
                        <option value="Rivers">Rivers</option>
                        <option value="Sokoto">Sokoto</option>
                        <option value="Taraba">Taraba</option>
                        <option value="Yobe">Yobe</option>
                        <option value="Zamfara">Zamfara</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Date of Birth</label>
                    <div class="col-lg-9">
                      <input name="dob" class="form-control" type="text" value="<?php echo $_SESSION['DOB'];?>" placeholder="Nov 12, 1990">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Local Government</label>
                    <div class="col-lg-9">
                      <input name="lga" class="form-control" type="text" value="<?php echo $_SESSION['LGA'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Occupation</label>
                    <div class="col-lg-9">
                      <input name="occupation" class="form-control" type="text" value="<?php echo $_SESSION['occupation'];?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Nationality</label>
                    <div class="col-lg-9">
                      <input name="nationality" class="form-control" type="text" value="<?php echo $_SESSION['nationality'];?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                      <input name="save-changes" type="submit" class="btn btn-primary" value="Save Changes">
                    </div>
                  </div>
                </form>
              </div>

              <!-- CHANGE EMAIL TAB ####################################### -->

              <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                <!-- <div class="tab-pane" id="settings"> -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                  <h4 class="mb-3">Personal information</h4>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9">
                      <input name="email" class="form-control <?php echo $Eclasstype; ?>" type="text" value="<?php echo $_SESSION['usersemail'];?>">
                      <div class="<?php echo $EclassFeedback; ?>">
                        <?php echo $EmsgFeedback;?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                      <input name="change-email" type="submit" class="btn btn-primary" value="Change-email">
                    </div>
                  </div>
                </form>
              </div>

              <!-- CHANGE PASSWORD TAB ####################################### -->

              <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                <!-- <div class="tab-pane" id="settings"> -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                  <h4 class="mt-5">Change Password</h4>
                  <hr>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Current Password</label>
                    <div class="col-lg-9">
                      <input name="current_password" class="form-control <?php echo $PWnouserclasstype; ?>" type="password" value="" placeholder="***************************">
                      <div class="<?php echo $PWnouserclassFeedback; ?>">
                        <?php echo $PWnousermsgFeedback;?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                    <div class="col-lg-9">
                      <input name="new_password" class="form-control <?php echo $PWclasstype; ?>" type="password" value="">
                      <div class="<?php echo $PWclassFeedback; ?>">
                        <?php echo $PWmsgFeedback;?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Confirm Password</label>
                    <div class="col-lg-9">
                      <input name="confirm_password" class="form-control <?php echo $CPWclasstype; ?>" type="password" value="">
                      <div class="<?php echo $CPWclassFeedback; ?>">
                        <?php echo $CPWmsgFeedback;?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                      <input name="change-password" type="submit" class="btn btn-primary" value="Save-password">
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
          <div class="col-lg-3 order-lg-1 text-center py-5">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
              <?php

              $sql = "SELECT * FROM users LIMIT 1;";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                if ($user = mysqli_fetch_assoc($result)) {
                  $id = $_SESSION['usersid'];

                  $sqlImg = "SELECT * FROM profileimg WHERE userid='$id' LIMIT 1;";
                  $resultImg = mysqli_query($conn, $sqlImg);
                  while ($imgRow = mysqli_fetch_assoc($resultImg)){

                    if ($imgRow['status'] == 0 ) {
                      echo '<img src="../images/uploads/profile'.$_SESSION['usersid'].'.jpg?'.mt_rand().'" id="profile-image1" width="339" class="mx-auto img-fluid img-circle d-block rounded-circle img-thumbnail" alt="Profile Image">';
                    } else {
                      echo '<img src="https://i.imgur.com/gaJNXRO.png" class="mx-auto img-fluid img-circle d-block rounded-circle" alt="Profile Image">';
                    }
                  }
                }
              }

              ?>
              <h4 class="mt-2"><?php echo $_SESSION['usersfname'].' '.$_SESSION['userslname'];?></h4>
              <label class="custom-file">
                <input type="file" id="file" name="file" class="custom-file-input d-none">
                <span class="btn custom-file-control shadow-sm">Change image</span>
                <button type="submit" id="upload-img" name="upload-img" class="d-none"></button>
              </label>
            </form>
          </div>
        </div>
      </div>
      <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $('document').ready(function (){

      // AUTO DISAPPEAR ALERT
      $("#alert").toggleClass('in');
      window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
          $(this).remove();
        });
      }, 8000);

      $("#file").change(function(e) {
        $("#upload-img")[0].click();
      });

      $("#menu-toggle").click(function() {
        $("#logo").toggle("slow", function(){
          if($(this).is(':visible'))
          $("#logo").html("<img src='../images/H-Logo_Color.png' width='100%' class='sidebar-heading img-responsive' alt='Streamsglobal'>")
          else
          $("#logo").html("<img src='../images/ms-icon-256x256.png' width='100px' class='sidebar-heading img-responsive' alt='Streamsglobal'>")
        });
      });

    });
    var dropdown = $(".dropdown-toggle");

    dropdown.on("click", function() {
      setTimeout(function(){           //loses focus after 0 milliseconds
        dropdown.blur();
      }, 0);
    });

    //################# CHECK URL PARAM FUNCTION ##################
    function queryParameters () {
      var result = {};

      var params = window.location.search.split(/\?|\&/);

      params.forEach( function(it) {
        if (it) {
          var param = it.split("=");
          result[param[0]] = param[1];
        }
      });

      return result;
    }
    if (queryParameters().error == "invalidphone"){
      $("#personal-info-tab")[0].click();
    } else if (queryParameters().error == "invalidemail" || queryParameters().error == "emailexist"){
      $("#email-tab")[0].click();
    } else if (queryParameters().error == "nouserpasswordfound" || queryParameters().error == "passwordmustbelong" || queryParameters().error == "passwordnotmatch"){
      $("#password-tab")[0].click();
    } else if (queryParameters().success == "emailchanged"){
      $("#modalbtn")[0].click();
    } else if (queryParameters().success == "passwordchanged"){
      $("#logout")[0].click(); //logout the user if password changed
    }

    </script>

  </body>

  </html>
