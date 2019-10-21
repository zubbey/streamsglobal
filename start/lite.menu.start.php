<?php
if (isset($_SESSION['usersid'])) {
	if (($_SESSION['verified'] == false)){
		echo '
		<div style="width: 100%; height: auto; text-align: center; font-size: 15px; padding: 5px;" class="warning">
		<p>We sent a verification link to your email, verify your account to continue.</p>
		</div>

		<style>
		.menu{position: relative;}
		</style>';
	}
}

?>
<div data-collapse="medium" data-animation="default" data-duration="400" class="navbar plan-nav w-nav">
	<div class="nav_container plan-container w-container">
		<a href="../index.php" class="brand w-nav-brand">
			<img src="../images/H-Logo_White.png" width="200" alt="" class="image mobile">
		</a>
	</div>
</div>