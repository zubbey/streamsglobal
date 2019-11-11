<?php
ini_set('error_reporting', E_ALL);
session_start();
$_SESSION['planCode']=array();

require ('../config/db.php');
require_once ('../controllers/emailControl.php');
date_default_timezone_set("Africa/Lagos");

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

				$_SESSION['updatedprofileimage']= "you updated your profile image.";
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

	$sql_check = mysqli_query($conn, "SELECT `*` FROM `users` WHERE `id` = '$id' LIMIT 1");
	$result = mysqli_num_rows($sql_check);
	if($result > 0){
		$update = "UPDATE `users` SET `fname`= '$firstname', `lname`= '$lastname', `phone`= '$phone', `gender`= '$gender',
		`DOB`= '$DOB', `address`= '$address', `city`= '$city', `state`= '$state', `LGA`= '$LGA', `occupation`= '$occupation', `nationality`= '$nationality' WHERE `id` = '$id'";
		if (mysqli_query($conn, $update)){

			$_SESSION['usersfname'] = $_POST['fname'];
			$_SESSION['userslname'] = $_POST['lname'];
			$_SESSION['usersphone'] = $_POST['phone'];
			$_SESSION['gender'] = $_POST['gender'];
			$_SESSION['address'] = $_POST['address'];
			$_SESSION['city'] = $_POST['city'];
			$_SESSION['state'] = $_POST['state'];
			$_SESSION['DOB'] = $_POST['dob'];
			$_SESSION['LGA'] = $_POST['lga'];
			$_SESSION['occupation'] = $_POST['occupation'];
			$_SESSION['nationality'] = $_POST['nationality'];

			$_SESSION['updatedinfo']= "you updated your information.";
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

// CHANGE EMAIL
if (isset($_POST['change-email'])){

	$id = $_SESSION['usersid'];

	$email = mysqli_real_escape_string($conn, $_POST['email']);

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header('location: settings?error=invalidemail&email='.$email);
		exit();
	}

	$emailQuery = "SELECT `*` FROM `users` WHERE `email` = '$email' LIMIT 1";
	$emailResult = mysqli_query($conn, $emailQuery);

	if (mysqli_num_rows($emailResult) == 0) {
		$row = mysqli_fetch_assoc($emailResult);
		$token = $row['token'];

		$update = mysqli_query($conn, "UPDATE `users` SET `verified`= 0, `email`= '$email' WHERE `id` = '$id'");

		if($update){
			sendemailUpdate($email, $token);

			$_SESSION['usersemail'] = $email;
			$_SESSION['updatedemail']= "you changed your email address.";
			header('location: settings?success=emailchanged&email='.$email);
			exit();
		}
	} else if (mysqli_num_rows($emailResult) > 0) {
		header('location: settings?error=emailexist&email='.$email);
		exit();
	} else {

		die("there was an error" .mysqli_connect_error());
	}
}

// CHANGE EMAIL
if (isset($_POST['change-password'])){

	$email = $_SESSION['usersemail'];

	$current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
	$new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
	$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

	if (strlen($new_password) < 6) {
		header('location: settings?error=passwordmustbelong');
		exit();
	}

	if ($new_password === $confirm_password) {

		$new_password = password_hash($new_password, PASSWORD_DEFAULT);
		//$current_password = password_hash($new_password, PASSWORD_DEFAULT);

		$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		$user = mysqli_fetch_array($result);
		//echo $row["password"].' '.$current_password;
		if (password_verify($current_password, $user['password'])) {
			$updatepassword = mysqli_query($conn, "UPDATE users set password='$new_password' WHERE email='$email'");
			if ($updatepassword) {
				$_SESSION['updatedpassword']= "you changed your password.";
				header('location: settings?success=passwordchanged');
				exit();
			}
		} else {
			header('location: settings?error=nouserpasswordfound');
			exit();
		}
	} else {
		header('location: settings?error=passwordnotmatch');
		exit();
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
