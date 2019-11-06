<main>

  <div class="container-fluid plan-content-section py-5">
    <div class="">
      <h1 class="heading-2 h1">Different Ways To Save.</h1>
      <p class="paragraph-2 p1 p_div">A Steams Global account brings you a step closer to financial discipline. We make it easy to achieve your personal saving goals. Choose how you save.</p>
    </div>
  </div>

  <div class="container">
    <div class="row py-5">
      <div class="col text-center">
        <div class="card">
          <div class="card-body p-0">
            <img src="images/piggy.jpg" alt="Piggy Wallet image" class="image span">
            <h1 class="h4 p-2">Piggy Wallet</h1>
            <p class="px-3 mb-0">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <hr class='my-2'>
            <div class="py-2">
            <?php
            if (isset($_SESSION['usersid'])) {
              echo "<a href='start/piggy' class='card-link'>Get Started</a>";
            }
            else {
              echo "<a href='login' class='card-link'>Get Started</a>";
            }
            ?>
          </div>
          </div>
        </div>
      </div>

      <div class="col text-center">
        <div class="card">
          <div class="card-body p-0">
            <img src="images/saap.jpg" alt="" class="image span">
            <h1 class="h4 p-2">SAAP</h1>
            <p class="px-3 mb-0">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <hr class='my-2'>
            <div class="py-2">
            <?php
            if (isset($_SESSION['usersid'])) {
              echo "<a href='start/saap' class='card-link'>Get Started</a>";
            }
            else {
              echo "<a href='login' class='card-link'>Get Started</a>";
            }
            ?>
          </div>
          </div>
        </div>
      </div>

      <div class="col text-center">
        <div class="card">
          <div class="card-body p-0">
            <img src="images/fixed.jpg" alt="" class="image span">
            <h1 class="h4 p-2">Fixed Savings</h1>
            <p class="px-3 mb-0">Automatically save an amount at regular intervals and earn 10% interest rate per annum</p>
            <hr class='my-2'>
            <div class="py-2">
            <?php
            if (isset($_SESSION['usersid'])) {
              echo "<a href='start/fixed' class='card-link'>Get Started</a>";
            }
            else {
              echo "<a href='login' class='card-link'>Get Started</a>";
            }
            ?>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="Ads-Section" class="ads-section">
    <div class="container secure-img py-5">
      <h1 class="display-4 font-weight-bold">How secured<br>is my money?</h1>
      <p class="paragraph-4">Lorem ipsum dolor, sit<br>amet, sed diam .</p>
      <p class="paragraph-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet.</p>
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
