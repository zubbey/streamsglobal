<main>

  <div class="container-fluid plan-content-section py-5">
    <div class="">
      <h1 class="heading-2 h1">Different Ways To Save.</h1>
      <p class="paragraph-2 p1 p_div">A Steams Global account brings you a step closer to financial discipline. We make it easy to achieve your personal saving goals. Choose how you save.</p>
    </div>
  </div>

  <div class="container">
      <div class="row my-5">
        <div class="col-lg-4 col-md-8 mb-5 mb-lg-0 mx-auto">
          <?php
          if (isset($_SESSION['usersid'])) {
            echo '<a href="user/dashboard" class="after-loop-item card border-0 rounded-lg piggy-themes shadow-lg">';
          } else {
            echo '<a href="login" class="after-loop-item card border-0 rounded-lg piggy-themes shadow-lg">';
          }?>
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
            echo '<a href="user/dashboard" class="after-loop-item card border-0 rounded-lg saap-themes shadow-lg">';
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
            echo '<a href="user/dashboard" class="after-loop-item card border-0 rounded-lg fixed-themes shadow-lg">';
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
