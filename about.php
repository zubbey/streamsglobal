<?php require_once ('./controllers/authController.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>About</title>
  <meta content="About" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <link href="css/team.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/loader.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>
<body class="body">
  <body class="body">
    <div class="loader-body" id="loader">
  	<div class="loader"></div>
  </div>
    <?php
    if (isset($_SESSION['usersid'])) {
      require ('./component/menu.home.php');
    }
    else {
      require ('./component/menu.php');
    }
    ?>
  <div class="header-section span abtCover text-center d-flex justify-content-center">
    <h2 class="team_h1 my-5"><strong>It's good to have you on board!</strong></h2>
  </div>

  <main class="container">
    <div class="row text-center d-flex justify-content-center">
      <div class="col">
        <ul class="team_ul">
          <li class="team_li"><img class="team_img rounded-circle" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo01.jpg"></li>
          <li class="team_li"><img class="team_img rounded-circle" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo02.jpg"></li>
          <li class="team_li smlist"><img class="team_img rounded-circle sm" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo03.jpg"></li>
          <li class="team_li"><img class="team_img rounded-circle" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo04.jpg"></li>
          <li class="team_li"><img class="team_img rounded-circle" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo05.jpg"></li>
          <li class="team_li smlist"><img class="team_img rounded-circle sm" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo06.jpg"></li>
          <li class="team_li"><img class="team_img rounded-circle" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo07.jpg"></li>
          <li class="team_li"><img class="team_img rounded-circle" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo08.jpg"></li>
          <li class="team_li smlist"><img class="team_img rounded-circle sm" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo09.jpg"></li>
          <li class="team_li"><img class="team_img rounded-circle" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo10.jpg"></li>
          <li class="team_li"><img class="team_img rounded-circle" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo11.jpg"></li>
          <li class="team_li smlist"><img class="team_img rounded-circle sm" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/10558/photo12.jpg"></li>
        </ul>
      </div>


    </div>
    <hr>

    <div class="row text-center d-flex justify-content-center my-5">
      <div class="col col-md-8">
        <h3><strong>About Streamsglobal Cooperatives</strong></h3>
        <div>
          <p>Cooperatives is all about the growth and development of members. We at streams global ensure we do that practically by ensuring that thrift, property acquisition and investment is effortless, rewarding  and exciting for members.</p>
        </div>
      </div>
    </div>
    <hr>

    <div class="row text-center d-flex justify-content-center my-5">
      <div class="col col-md-8">
        <div>
          <p class="paragraph-8">Mission Statment</p>
          <p>Accelerating  dreams and goals to reality using the power  of optimism, collectiveness, set time and effortless thrift investment and agriculture.</p>
        </div>
      </div>
      <div class="col col-md-8">
        <div>
          <p class="paragraph-8">Vision</p>
          <p>Becoming a cooperative that is evident in all homes and bridging the deficit in agriculture and agric business investment.</p>
        </div>
      </div>
    </div>
</main>

    <div class="container-fluid p-5" style="background-color: #f4f8fd;">
      <div class="row text-center d-flex justify-content-center">
        <div class="col col-md-8">
          <h3><strong>Better way of savings best way of acquiring</strong></h3>
          <p>You can acquire that your dream household, property by saving stipends daily, weekly and monthly without stress. You can also save with the cooperative and pick it monthly like the normal Ajor, Akawo or Esusu. You can also make as huge as 3 —100% when you save between 90days to 1,825 days. What are you waiting for? Savings can never be better.</p>
        </div>
      </div>
    </div>

    <div class="container">
    <div class="row text-center d-flex justify-content-center my-5">
      <div class="col col-md-8">
        <h3><strong>Our Physical Offices</strong></h3>
        <div>
          <p class="paragraph-8">Port Harcourt Head Office:</p>
          <hr>
          <p>11 Ogoloma Street, Off Emekuku  Dline, Port Harcourt, Rivers State, Nigeria.</p>
          <p class="paragraph-8">Lagos office:</p>
          <hr>
          <p>Providence House, No 1 Babatunde Ladiga Street Omole.</p>
          <p class="paragraph-8">Aba office:</p>
          <hr>
          <p>No 2 free Zone Road Ariaria, Beside AKTC park, Aba, Abia State.</p>
          <p class="paragraph-8">REG NUMBER</p>
          <hr>
          <p>RS30366 | RS31904 | AK23813 | AB16307</p>
        </div>
      </div>
    </div>
</div>
  <?php
  require ('./component/footer.php');
  ?>
