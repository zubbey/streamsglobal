<?php require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Streams Global | Home</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link rel="stylesheet" href="css/flickity.min.css">
  <link href="css/fontawesome.css" rel="stylesheet" type="text/css">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});
  </script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);
  </script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>

<body class="body">
  <div data-w-id="54b3b754-1c54-b11b-7e2d-95377a4d5c7b" class="preloader"><img src="images/Preloader.svg" width="120" alt="Loading...">
  </div>

  <div class="header-section">

<?php 
  if (isset($_SESSION['usersid'])) {
    require "menu.home.php";
  }
  else {
    require "menu.php";
  }
?>

<div data-delay="5000" data-animation="slide" data-autoplay="1" data-hide-arrows="1" data-duration="500" data-infinite="1" class="slider3 w-slider">
      
      <div id="content" class="mask w-slider-mask">

        <div class="slide1 w-slide">
          <div class="div_contain0">
            <h1 class="heading">SAVE AND INVEST,<br>THE SMART WAY.</h1>
            <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros </p>
            <?php 
            if (isset($_SESSION['usersid'])) {
              echo "<a href='start.php' class='button w-button'>START SAVING <i class='fas fa-angle-right'></i></a>";
            }
            else {
              echo "<a href='login.php' class='button w-button'>START SAVING <i class='fas fa-angle-right'></i></a>";
            }

            ?>
            
          </div>      
        </div>

        <div class="slide2 w-slide">

          <div class="div_contain0">
            <h1 class="heading">START INVESTING,<br>FOR A BETTER FUTURE.</h1>
            <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, </p>
            <?php 
            if (isset($_SESSION['usersid'])) {
              echo "<a href='start.php' class='button w-button'>START SAVING <i class='fas fa-angle-right'></i></a>";
            }
            else {
              echo "<a href='login.php' class='button w-button'>START SAVING <i class='fas fa-angle-right'></i></a>";
            }

            ?>
          </div>
        </div>

        <div class="slide3 w-slide">

          <div class="div_contain0">
            <h1 class="heading">LET&#x27;S HELP YOU<br>STAY IN BUSINESS.</h1>
            <p class="paragraph p-span">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, </p>
            <?php 
            if (isset($_SESSION['usersid'])) {
              echo "<a href='start.php' class='button w-button'>START SAVING <i class='fas fa-angle-right'></i></a>";
            }
            else {
              echo "<a href='login.php' class='button w-button'>START SAVING <i class='fas fa-angle-right'></i></a>";
            }

            ?>
          </div>
        </div>

      </div>
      
      <div class="left-arrow w-slider-arrow-left">
        <div class="icon-3 w-icon-slider-left"></div>
      </div>
      <div class="right-arrow w-slider-arrow-right">
        <div class="w-icon-slider-right"></div>
      </div>
    </div>
  </div>