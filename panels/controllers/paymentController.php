<?php
// IF CLICK ON CONTINUE newt_button
session_start();
if (isset($_POST['continue-payment-button'])) {

    $_SESSION['payment'] = "Ops! Payment System is not avaiable yet.";
    $_SESSION['warning-message'] = "warning";

    header("Location: ../start.php?error=paymentnotavaiable");
    exit();
	
}