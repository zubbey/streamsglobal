<?php
require "header.php";
?>

<main>

  <div class="plan-content-section">
    <div class="div_content">
      <h1 class="heading-2 h1">Different Ways To Save.</h1>
      <p class="paragraph-2 p1 p_div">A Steams Global account brings you a step closer to financial discipline. We make it easy to achieve your personal saving goals. Choose how you save.</p>
    </div>
  </div>

  <div class="plan-section">
    <div class="div_content">
      <div class="row w-row">
        <div class="col w-col w-col-4">
          <img src="images/piggy_bg.png" width="472" height="auto" alt="Piggy Wallet image" class="image span">
          <h1 class="heading-3">Piggy Wallet</h1>
          <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
          <div class="divider"></div>
          <?php 
          if (isset($_SESSION['usersid'])) {
            echo "<a href='start/piggy-wallet.php' class='link'>Get Started</a>";
          }
          else {
            echo "<a href='login.php' class='link'>Get Started</a>";
          }
          ?>
        </div>

        <div class="col w-col w-col-4">
          <img src="images/SAAP.png" width="472" height="auto" alt="" class="image span">
          <h1 class="heading-3">SAAP</h1>
          <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
          <div class="divider"></div>
          <?php 
          if (isset($_SESSION['usersid'])) {
            echo "<a href='start/saap.php' class='link'>Get Started</a>";
          }
          else {
            echo "<a href='login.php' class='link'>Get Started</a>";
          }
          ?>
        </div>

        <div class="col w-col w-col-4">
          <img src="images/fixed_bg.png" width="472" height="auto" alt="" class="image span">
          <h1 class="heading-3">Fixed Savings</h1>
          <p class="paragraph-3">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
          <div class="divider"></div>
          <?php 
          if (isset($_SESSION['usersid'])) {
            echo "<a href='start/fixed-savings.php' class='link'>Get Started</a>";
          }
          else {
            echo "<a href='login.php' class='link'>Get Started</a>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div id="Ads-Section" class="ads-section">
    <div class="secure-img">
      <div class="div_content3">
        <h1 class="heading-4">How secured<br>is my money?</h1>
        <p class="paragraph-4">Lorem ipsum dolor, sit<br>amet, sed diam .</p>
        <p class="paragraph-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet.</p>
      </div>
    </div>
  </div>
  
  <div class="Partners-Section">
    <h1 class="heading-2 h1">Our Trusted Partners</h1>
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
  
</main>

<?php
require "footer.php";
?>
