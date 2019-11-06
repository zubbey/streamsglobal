<?php
if (isset($_SESSION['usersid'])) {
  if (($_SESSION['verified'] == false)){
    echo '
    <div style="width: 100%; height: auto; text-align: center; font-size: 15px; padding: 5px;" class="warning">
    <p>We sent a verification link to your email <b>'. $_SESSION['usersemail'] .'</b>, verify your account to continue.</p>
    </div>

    <style>
    .menu{position: relative;}
    </style>';
  }
}
?>
<div class="menu">

  <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav">
    <div class="nav_container w-container">
      <a href="../index.php" class="w-nav-brand">
        <img src="../images/H-Logo_White.png" width="255" alt="Streams Global" class="image mobile">
      </a>
      <nav role="navigation" class="nav-menu w-nav-menu">
        <a href="../index.php" class="nav w-nav-link">HOME</a>
        <div data-hover="1" data-delay="0" class="w-dropdown">
          <div class="dropdown-toggle w-dropdown-toggle">
            <div class="icon w-icon-dropdown-toggle"></div>
            <div class="text-block">FEATURES</div>
          </div>
          <nav class="dropdown-list w-dropdown-list">
            <a href="../start/saap.php" class="dropdown-link w-dropdown-link">SAVE AND ACQUIRE PROPERTIES (SAAP)</a>
            <a href="../start/piggy-wallet.php" class="dropdown-link w-dropdown-link">PIGGY WALLET MONTHLY</a>
            <a href="../start/fixed-savings.php" class="dropdown-link w-dropdown-link">FIXED AND TARGETED SAVINGS</a>
            <a href="../start/loans.php" class="dropdown-link w-dropdown-link">LOANS</a>
            <a href="../start/school-fees.php" class="dropdown-link w-dropdown-link">90 DAYS SCHOOL FEES THRIFT</a>
            <a href="../start/rents.php" class="dropdown-link w-dropdown-link">RENT SAVINGS</a>
            <a href="../start/buildings.php" class="dropdown-link w-dropdown-link">LAND, HOUSE &amp; BUILDING SAVINGS</a>
            <a href="../start/cooperators.php" class="dropdown-link w-dropdown-link">COOPERATORS BANK</a>
            <a href="../start/diaspora-safe.php" class="dropdown-link w-dropdown-link">DIASPORA SAFE</a>
          </nav>
        </div>
        <a href="../faqs.php" class="nav w-nav-link">FAQS</a>
        <a href="../about.php" class="nav w-nav-link">ABOUT</a>

        <div data-delay="0" class="user-dropdown w-dropdown">
          <div class="dropdown-toggle-2 w-dropdown-toggle">
            <div class="user-img-container start-user">
              <div class="user-img">
                <img src="../images/uploads/profiledefault.jpg" ait="Profile Avatar" style="border-radius: 50%;">
              </div>
              <div class="start-username"><?php echo ucwords($_SESSION['usersfname']); ?></div>
            </div>
            <div class="icon w-icon-dropdown-toggle"></div>
          </div>
          <nav class="dropdown-list w-dropdown-list user-dropdown-list">

            <?php 
            //Hide if account not verified

            if (($_SESSION['verified'] == false)) {
              echo '<a style="display:none;" href="#" class="user-dropdown-link w-dropdown-link">Dashboard</a>
              <a style="display:none;" href="#" class="user-dropdown-link w-dropdown-link">Settings</a>';
            }else {
              echo '<a href="../panels/dashboard.php" class="user-dropdown-link w-dropdown-link">Dashboard</a>
              <a  href="../panels/settings.php" class="user-dropdown-link w-dropdown-link">Account Settings</a>';
            }
            ?>
              <a href="start.php?logout=1" class="user-dropdown-link w-dropdown-link">Logout</a>
          </nav>
        </div>
      </nav>
      <div class="menu-button w-nav-button">
        <div class="icon-2 w-icon-nav-menu"></div>
      </div>
    </div>
  </div>

</div>