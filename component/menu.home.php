<?php
if (isset($_SESSION['usersid']) && isset($_SESSION['verified']) && $_SESSION['verified'] == 0) {
    echo '
    <div style="width: 100%; height: auto; text-align: center; font-size: 15px; padding: 5px;" class="alert-warning alert-dismissible"  role="alert">
    <p>We sent a verification link to your email <b>'. $_SESSION['usersemail'] .'</b>, Didnt get the email? <a href="sign-up?success=step2&resendemail=1">Resend Email</a>.</p>
    </div>

    <style>
    .menu{position: relative;}
    </style>
    ';
}
?>

<div class ="bg-white w-100">
  <nav class="container navbar navbar-expand-lg navbar-light py-2">
    <a class="navbar-brand" href="index">
      <img src="images/H-Logo_Color.png" width="100%" class="d-inline-block align-top img-responsive" alt="Streamsglobal">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="#navbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="start">PLANS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="faqs">FAQS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about">ABOUT</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                  echo '<img src="images/uploads/profile'.$_SESSION['usersid'].'.jpg?'.mt_rand().'" ait="Profile Avatar" class="img-icon img-thumbnail rounded-circle">';
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
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <?php
            //Hide if account not verified
          if ($_SESSION['verified'] == 1 && strlen($_SESSION['referralcode']) > 0) {
            echo '
            <a class="dropdown-item" href="user/dashboard">Dashboard</a>
            <a class="dropdown-item" href="user/settings">Account Settings</a>
            ';
          }
          ?>

          <a class="dropdown-item" href="start.php?logout=1">Sign out</a>
        </div>
      </li>
    </ul>
  </div>
  </nav>
</div>
