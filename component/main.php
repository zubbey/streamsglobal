<main>

  <div class="container-fluid py-5">
    <div class="row justify-content-md-center">
    <div class="col col-md-8 text-center">
        <?php
        $sql = "SELECT `*` FROM `pageContent` WHERE `id` = 1;";
        $result = mysqli_query($conn, $sql);
        while ($contentRow = mysqli_fetch_assoc($result)) {
            echo "<h1 class='display-4 font-weight-bold'>".$contentRow['heading']."</h1>";
            echo "<p class='lead'>".$contentRow['body']."</p>";
        }
        ?>
    </div>
  </div>
  </div>

  <div class="container">

    <div class="row my-5">
      <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
        <?php
        if (isset($_SESSION['usersid'])) {
            if ($_SESSION['verified'] == 0 || strlen($_SESSION['referralcode']) <= 0){
            echo '<a href="#" onclick="verifyaccountMsg()" class="after-loop-item card border-0 rounded-lg piggy-themes shadow-lg">';
          } else{
            echo '<a href="user/piggy" class="after-loop-item card border-0 rounded-lg piggy-themes shadow-lg">';
          }
        } else {
          echo '<a href="login" class="after-loop-item card border-0 rounded-lg piggy-themes shadow-lg">';
        }
        ?>
        <div class="card-body d-flex align-items-end flex-column text-right">
          <h4>Piggy Wallet</h4>
          <p class="w-75">Automatically save an amount at regular ...</p>
          <i class="fas fa-piggy-bank"></i>
        </div>
      </a>
    </div>
    <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
      <?php
      if (isset($_SESSION['usersid'])) {
          if ($_SESSION['verified'] == 0 || strlen($_SESSION['referralcode']) <= 0){
          echo '<a href="#" onclick="verifyaccountMsg()" class="after-loop-item card border-0 rounded-lg saap-themes shadow-lg">';
        } else{
          echo '<a href="user/saap" class="after-loop-item card border-0 rounded-lg saap-themes shadow-lg">';
        }
      } else {
        echo '<a href="login" class="after-loop-item card border-0 rounded-lg saap-themes shadow-lg">';
      }?>
      <div class="card-body d-flex align-items-end flex-column text-right">
        <h4>SAAP</h4>
        <p class="w-75">Automatically save an amount at regular ...</p>
        <i class="fas fa-cart-arrow-down"></i>
      </div>
    </a>
  </div>
  <div class="col-lg-4 col-md-8 mx-auto">
    <?php
    if (isset($_SESSION['usersid'])) {
        if ($_SESSION['verified'] == 0 || strlen($_SESSION['referralcode']) <= 0){
        echo '<a href="#" onclick="verifyaccountMsg()" class="after-loop-item card border-0 rounded-lg fixed-themes shadow-lg">';
      } else{
        echo '<a href="user/fixed" class="after-loop-item card border-0 rounded-lg fixed-themes shadow-lg">';
      }
    } else {
      echo '<a href="login" class="after-loop-item card border-0 rounded-lg fixed-themes shadow-lg">';
    }?>
    <div class="card-body d-flex align-items-end flex-column text-right">
      <h4>Fixed Savings</h4>
      <p class="w-75">Automatically save an amount at regular ...</p>
      <i class="fas fa-unlock-alt"></i>
    </div>
  </a>
</div>
</div>

</div>
</div>
<!-- <div id="Ads-Section" class="ads-section">
<div class="container cover-img py-5">
<h1 class="display-4 font-weight-bold">How secured<br>is my money?</h1>
<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet.</p>
</div>
</div> -->
<div class="container-fluid cover-img">
  <div class="container p-5">
    <div class="row">
      <div class="col col-md-8">
          <?php
          $sql = "SELECT `*` FROM `pageContent` WHERE `id` = 2;";
          $result = mysqli_query($conn, $sql);
          while ($contentRow = mysqli_fetch_assoc($result)) {
              echo "<h1 style='color: #408aa2;' class='display-4 font-weight-bold'>".$contentRow['heading']."</h1>";
              echo "<p class='lead'>".$contentRow['body']."</p>";
          }
          ?>
        <a href="faqs" class="">Find out more ...</a>
      </div>
    </div>
  </div>
</div>

<div class="Partners-Section">
  <div class="container-fluid">
    <h1 class="heading-2 h1 py-3">Our Trusted Partners</h1>
    <!-- Flickity HTML init -->
    <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": true }'>
      <div id="cell1" class="carousel-cell">
      </div>
      <div id="cell2" class="carousel-cell">
      </div>
      <div id="cell3" class="carousel-cell">
      </div>
      <div id="cell4" class="carousel-cell">
      </div>
      <div id="cell5" class="carousel-cell">
      </div>
      <div id="cell6" class="carousel-cell">
      </div>
      <div id="cell7" class="carousel-cell">
      </div>
    </div>
  </div>
</div>

</main>
