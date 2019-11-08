<?php
ini_set('error_reporting', E_ALL);
session_start();

require ('../config/db.php');
require_once ('../controllers/emailControl.php');

if(!isset($email)){
	$Eclasstype = "is-valid";
	$EclassFeedback = "valid-feedback";
	$EmsgFeedback = "Verified";
}
//if click on upload images in profile settings

if (isset($_POST['upload-img'])) {
	$id = $_SESSION['usersid'];
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize > 5000) {
				$fileNameNew = "profile".$id.".".$fileActualExt;
				$fileDestination = '../images/uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);

				$sql = "UPDATE `profileimg` SET `status` = 0 WHERE `userid` = '$id';";
				$result = mysqli_query($conn, $sql);
				header("Location: ../user/settings?success=uploaded");
				exit();
			} else {
				header("Location: ../user/settings?error=sizeerror");
				exit();
			}
		} else {
			header("Location: ../user/settings?error=errorupload");
			exit();
		}
	} else {
		header("Location: ../user/settings?error=filenotallowed");
		exit();
	}

}


//UPDATE ACCOUNT information
if (isset($_POST['save-changes'])){

	$id = $_SESSION['usersid'];

	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$DOB = mysqli_real_escape_string($conn, $_POST['dob']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$LGA = mysqli_real_escape_string($conn, $_POST['lga']);
	$occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
	$nationality = mysqli_real_escape_string($conn, $_POST['nationality']);

	if (!preg_match('/^[0-9]{11}+$/', $phone)) {
		header('location: settings?error=invalidphone&phone='.$phone);
		exit();
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header('location: settings?error=invalidemail&email='.$email);
		exit();
	}

	$emailQuery = mysqli_query($conn, "SELECT `*` FROM `users` WHERE `email` = '$email' LIMIT 1");
	$emailResult = mysqli_num_rows($emailQuery);

	if ($emailResult == 0) {
			$row = mysqli_fetch_assoc($emailResult);
			sendemailUpdate($email, $row['token']);

			$update = mysqli_query($conn, "UPDATE `users` SET `verified`= 0 WHERE `id` = '$id'");
			header('location: settings?success=emailchanged&email='.$email);
			exit();
	}

		$sql_check = mysqli_query($conn, "SELECT `*` FROM `users` WHERE `id` = '$id' LIMIT 1");
		$result = mysqli_num_rows($sql_check);
		if($result > 0){
			$update = "UPDATE `users` SET `fname`= '$firstname', `lname`= '$lastname', `phone`= '$phone', `email`= '$email', `gender`= '$gender',
			`DOB`= '$DOB', `address`= '$address', `city`= '$city', `state`= '$state', `LGA`= '$LGA', `occupation`= '$occupation', `nationality`= '$nationality' WHERE `id` = '$id'";
			if (mysqli_query($conn, $update)){

				$_SESSION['usersfname'] = $_POST['fname'];
				$_SESSION['userslname'] = $_POST['lname'];
				$_SESSION['usersemail'] = $_POST['email'];
				$_SESSION['usersphone'] = $_POST['phone'];
				$_SESSION['gender'] = $_POST['gender'];
				$_SESSION['address'] = $_POST['address'];
				$_SESSION['city'] = $_POST['city'];
				$_SESSION['state'] = $_POST['state'];
				$_SESSION['DOB'] = $_POST['dob'];
				$_SESSION['LGA'] = $_POST['lga'];
				$_SESSION['occupation'] = $_POST['occupation'];
				$_SESSION['nationality'] = $_POST['nationality'];

				header('location: settings?success=infoupdated');
				exit();
			} else{
				header('location: settings?error=couldnotupdated');
				exit();
			}
		} else {
			die("there was an error" .mysqli_connect_error());
		}
}

########## if user clicks the close dialog button on email verified popup ###########
if (isset($_GET['close'])){
	$_SESSION['verified'] = 0;
}

########## if user clicks Resend Email Button ###########
// CODE TO RESEND EMAIL
if (isset($_GET['resendemail'])){

	$id = $_SESSION['usersid'];

	$sql = "SELECT `*` FROM `users` WHERE `id` = '$id'";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$token = $row['token'];
		$email = $row['email'];
	}

	sendemailUpdate($email, $token);

}
