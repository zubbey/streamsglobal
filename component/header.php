<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Streams Global | Home</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link href="css/fontawesome.css" rel="stylesheet" type="text/css">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});
  </script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>

<body class="body">

<?php
  if (isset($_SESSION['usersid'])) {
    require ('menu.home.php');
  }
  else {
    require ('menu.php');
  }


      // if (isset($_SESSION['usersid'])) {
      //   echo "<a href='start.php' class='button w-button'>START SAVING <i class='fas fa-angle-right'></i></a>";
      // }
      // else {
      //   echo "<a href='login.php' class='button w-button'>START SAVING <i class='fas fa-angle-right'></i></a>";
      // }
?>
<div class='bd-example'>
  <div id='carouselExampleCaptions' class='carousel slide' data-ride='carousel'>
    <div class='carousel-inner'>
      <?php
      $sqlImg = "SELECT `*` FROM `adminAds`;";
      $resultImg = mysqli_query($conn, $sqlImg);
      while ($imgRow = mysqli_fetch_assoc($resultImg)) {
        echo "<div class='carousel-item'>";
          echo "<img src='images/".$imgRow ['image']."' class='d-block w-100' alt='Streamsglobal adverts images'>";
          echo "<div class='carousel-caption d-md-block'>";
            echo "<h5>".$imgRow ['heading']."</h5>";
            echo "<p>".$imgRow ['body']."</p>";
          echo "</div>";
        echo "</div>";
      }
      ?>
    </div>

<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</div>
