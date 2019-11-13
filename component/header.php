<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Streams Global | Home</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/loader.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});
  </script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>

<body class="body">
  <div class="loader-body" id="loader">
	<div class="loader"></div>
</div>

<?php
  if (isset($_SESSION['usersid'])) {
    require ('menu.home.php');
  }
  else {
    require ('menu.php');
  }

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
          echo "<div class='container carousel-caption'>";
          echo "<div class='row'>";
            echo "<div class='col-sm-7'>";
            echo "<h5 class='display-4 font-weight-bold text-uppercase'>".$imgRow ['heading']."</h5>";
            echo "<p class='lead'>".$imgRow ['body']."</p>";
            if (isset($_SESSION['usersid'])) {
              echo "<a class='btn bg-white text-dark p-2' href='start'>GET STARTED</a>";
            }
            else {
              echo "<a class='btn btn-primary text-white p-2' href='sign-up'>JOIN US TODAY</a>";
            }
            echo "</div>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      }
      ?>
    </div>

<!-- <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a> -->
</div>
</div>
