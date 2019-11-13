<?php
  // Connect database admin php
  require_once ('./controllers/authController.php');

  if (isset($_SESSION['usersid']) && $_SESSION['usertype'] == 0) {
      header('location: login');
  }
    // you are Admin
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Streams Global | Admin</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link href="css/fontawesome.css" rel="stylesheet" type="text/css">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- <link href="css/webflow.css" rel="stylesheet" type="text/css"> -->
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <!-- <link href="css/streams-project.webflow.css" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="css/loader.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});
  </script>
  <link href="images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/ms-icon-256x256.png" rel="apple-touch-icon">
</head>
<body>
  <body class="body">
    <div class="loader-body" id="loader">
  	<div class="loader"></div>
  </div>
<div class="container">
<div class="row">
  <div class="col">
      <h2 id="availableAds" class="my-3"></h2>
  <?php
  //Check if ads is Deleted
  if(isset($_GET['warning']) == 'deleted')
  {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
    echo "<strong>Deleted!</strong> You have deleted this advert from the Database.";
    echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
      echo "<span aria-hidden='true'>&times;</span>";
    echo "</button>";
    echo "</div>";
  } else if(isset($_GET['error']) == 'notdeleted')
  {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
    echo "<strong>Error!</strong> You can not delete this advert.";
    echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
      echo "<span aria-hidden='true'>&times;</span>";
    echo "</button>";
    echo "</div>";
  };
  //Check if ads is Created
  if(isset($_GET['success']) AND $_GET["success"]=='adcreated')
  {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
    echo "<strong>Success!</strong> your advert is Visible now.";
    echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
      echo "<span aria-hidden='true'>&times;</span>";
    echo "</button>";
    echo "</div>";
  }else if(isset($_GET['error']) AND $_GET["error"]== 'notcreated')
  {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
    echo "<strong>Opps!</strong> Your Advert was not created.";
    echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
      echo "<span aria-hidden='true'>&times;</span>";
    echo "</button>";
    echo "</div>";
  };
  //Check if ads is Created
  if(isset($_GET['success']) AND $_GET["success"]== 'adupdated')
  {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
    echo "<strong>Success!</strong> your advert was updated.";
    echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
      echo "<span aria-hidden='true'>&times;</span>";
    echo "</button>";
    echo "</div>";
  }else if(isset($_GET['error']) AND $_GET["error"]== 'notupdated')
  {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
    echo "<strong>Opps!</strong> you can't update this Advert.";
    echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
      echo "<span aria-hidden='true'>&times;</span>";
    echo "</button>";
    echo "</div>";
  };
  ?>
  </div>
</div>
<div class="row ">   <!-- this row display the Ads created -->
  <?php

  $sqlImg = "SELECT `*` FROM `adminAds`;";
  $resultImg = mysqli_query($conn, $sqlImg);
  while ($imgRow = mysqli_fetch_assoc($resultImg)) {

      echo "<div id='Ads' class='col-sm'>";
      echo "<div class='card p-3'>";
      	echo "<img class='card-img-top' src='images/".$imgRow ['image']."' >";
      	echo "<h5 class='card-title pt-3'>".$imgRow ['heading']."</h5>";
        echo "<hr class='my-2'>";
        echo "<p class='blockquote'>".$imgRow ['body']."</p>";
        echo "<blockquote class='blockquote-footer'> Created by <cite title='Source Title'>".$imgRow ['creator']."</cite></blockquote>";

        echo "<div class='row'>";
        echo "<div class='col'>";
        echo "<button class='btn btn-info mr-2' type='button' name='edit' onClick='editAds(".$imgRow ['id'].")'>edit</button>";
        echo "<button class='btn btn-danger mr-2' type='button' name='delete' onClick='deleteAds(".$imgRow ['id'].")'>Delete</button>";
        echo "</div>";
        echo "</div>";
      echo "</div>";
      echo "</div>";

    }
  ?>
</div>

<div class="modal hide fade" id="myModal">
  <div class="modal-dialog modal-dialog" role="document">
    <form method="post">
    <div class="form-group">
    <div class="modal-content px-3">
      <div class="modal-header">
        <label for="exampleInputEmail1">Edit Headings</label>
        <button onclick="javascript:location.href='admin.php'" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input
        class="form-control"
        name="edit-heading"
        value="<?php echo $row ['heading']; ?>">
      <label for="exampleInputEmail1" class="p-3">Edit paragragh / Body</label>
      <textarea
        class="form-control"
      	name="edit-body"
        rows="3">
        <?php echo $row ['body']; ?>
      </textarea>
      <div class="modal-footer">
        <button onclick="javascript:location.href='admin.php'" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="update_advert">Update</button>
      </div>
    </div>
  </div>
  </form>
  </div>
</div>

<div class="row  mt-5">
  <div class="col">
    <h1 class="display-4">Create new Ads</h1>
    <p id="adsInfo" class="lead"></p>
    <hr class="my-2">
  </div>
</div>
  <div class="row"> <!-- this row Creates the Ads-->
  <div class="col">
  <form method="POST" action="admin.php" enctype="multipart/form-data">
    <div class="form-group">
  	<input type="hidden" name="size" value="1000000">
    <label for="exampleInputEmail1">Upload your Banner</label>
  	<div>
  	  <input type="file" name="image" class="form-control-file">
      <small id="emailHelp" class="form-text text-muted">Only Images with 1022 × 350 Dimension are allowed.</small>
  </div>
  	</div>

  	<div class="form-group">
      <label for="exampleInputEmail1">Enter Your Headings</label>
      <textarea
        class="form-control"
      	id="exampleFormControlTextarea1"
      	rows="1"
      	name="heading"
      	placeholder="Say something about this image...">
      </textarea>
      <label for="exampleInputEmail1">Enter the paragragh / Body</label>
      <textarea
        class="form-control"
      	id="exampleFormControlTextarea1"
      	rows="3"
      	name="body"
      	placeholder="Say something about this image...">
      </textarea>
  	</div>
  	<div>
  		<button class="btn btn-primary" type="submit" name="upload" >CREATE ADVERT</button>
  	</div>
  </div>
  </form>
</div>
</div>
</div>
<footer class="card-footer text-muted mt-5">
  <p class='text-muted'>&copy; Copyright 2019 <script>new Date().getFullYear()>2017&&document.write('|'+new Date().getFullYear());</script> <a href='index' class='text-muted'> Streams Global Cooperative</a>, All Rights Reserved</p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/loader.js"></script>
<script language='javascript'>

function editAds(editid){
  window.location.href='admin.php?edit_id=' +editid+'';
  return true;
}

function deleteAds(delid){
  if(confirm("Do you want to delete this Advert")){
    window.location.href='admin.php?del_id=' +delid+'';
    return true;
  }
}
var Ads = document.getElementById("Ads");
var availableAds = document.getElementById('availableAds');
var adsInfo = document.getElementById('adsInfo');
  if(Ads){
    availableAds.innerHTML = 'Available Ads';
    adsInfo.innerHTML = "This Adverts will display at your landing page <a href='http://www.streamsglobal.com/' target='_blank' class='stretched-link'>Veiw Ads here</a>";
  } else {
    availableAds.innerHTML = 'You have 0 Ads';
    adsInfo.innerHTML = "Create your first Advert, this Ads will be displayed on you landing page.";
  }

  if (window.location.search.indexOf('edit_id') > -1) {
    $('#myModal').modal('show');
  }
</script>

</body>
</html>
