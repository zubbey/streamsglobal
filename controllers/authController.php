<?php
ini_set('error_reporting', E_ALL);
session_start();

require ('./config/db.php');
require_once ('./controllers/emailControl.php');
date_default_timezone_set("Africa/Lagos");

// initializing variables
$errors =  array();
$firstname = "";
$lastname = "";
$email = "";
$phone = "";
$referralcode = "";

// veriable for login
$emailPhone = "";

// message to reuse
$msg = "";
// CODE IF CLICKED ON REGISTER

if (isset($_POST['signup-btn'])) {

	$firstname = stripslashes($_REQUEST['fname']);
	$firstname = mysqli_real_escape_string($conn,$firstname);
	$lastname = stripslashes($_REQUEST['lname']);
	$lastname = mysqli_real_escape_string($conn,$lastname);
	$phone = stripslashes($_REQUEST['phone']);
	$phone = mysqli_real_escape_string($conn,$phone);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	$passwordConfirm = stripslashes($_REQUEST['passwordConfirm']);
	$referralcode = stripslashes($_REQUEST['referralcode']);
	$referralcode = mysqli_real_escape_string($conn,$referralcode);
	$referralid = '';
	$gender = '';
	$DOB = '';
	$address = '';
	$city = '';
	$state = '';
	$LGA = '';
	$occupation = '';
	$nationality = '';

	if (empty($firstname)) {
		$errors['fname'] = "Ops! Firstname is required.";
	}
	if (empty($lastname)) {
		$errors['lname'] = "Ops! Lastname is required.";
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = "Ops! Your Email address is invailed.";
	}
	if (empty($email)) {
		$errors['email'] = "Ops! Email address is required.";
	}
	if (empty($phone)) {
		$errors['phone'] = "Ops! Phone number is required.";
	}
	if (!preg_match('/^[0-9]{11}+$/', $phone)) {
		$errors['phone'] = "Ops! Your Phone number is invailed.";
	}
	if (strlen($password) < 6) {
		$errors['password'] = "Ops! Passwords must be at least 6 characters long.";
	}
	if ($password !== $passwordConfirm) {
		$errors['password'] = "Ops! Your password did not match.";
	}
	//CHECK IF EMAIL IS IN THE DATABASE
	$emailQuery = "SELECT `*` FROM `users` WHERE `email` = ? LIMIT 1";
	$stmt = $conn->prepare($emailQuery);
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$userCount = $result->num_rows;
	$stmt->close();

	if ($userCount > 0) {
		$errors['email'] = "Ops! Email already exists";
	}

	//CHECK IF RERERRALCODE BELONGS TO A USER IN THE DATABASE
	$sql = "SELECT `*` FROM `users` WHERE `referralid` = ? LIMIT 1";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s', $referralcode);
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_assoc();
	$stmt->close();

	if ($user['referralid']){
		$userdata = array(
			'referraluserid' => $user['id'],
			'referralfname' => $user['fname'],
			'referrallname' => $user['lname'],
			'referralemail' => $user['email'],
			'referralcode' => $user['referralid'],
			'userfname' => $firstname,
			'userlname' => $lastname,
			'datereferred' => date("Y-m-d")
		);
	} else if(empty($referralcode)){
		$errors['noreferralcode'] === "";
	} else {
		$errors['noreferralcode'] = "Ops! No user with this (".$referralcode.") Referral Code, Referral Code must be 6 characters.";
	}

	if (count($errors) === 0) {
		// If form submitted, insert values into the database.

		$dateReg = date("Y-m-d");
		$password = password_hash($password, PASSWORD_DEFAULT);
		$verified = 0;
		$token = bin2hex(random_bytes(30));
		$usertype = 0;

		$query = "INSERT into `users` (fname, lname, email, password, phone, verified, token, usertype, dateReg) VALUES ('$firstname', '$lastname', '$email', '$password', '$phone', '$verified', '$token', '$usertype', '$dateReg')";
		$result = mysqli_query($conn,$query);
		if($result){

			sendVerificationEmail($email, $token);
			if(!empty($referralcode)){
				sendreferralEmail($userdata);
			}

			//INSERT INTO PROFILE IMAGE
			$sql = "SELECT `*` FROM `users` WHERE `email` = '$email' LIMIT 1";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				while ($user = mysqli_fetch_assoc($result)){
					$id = $user['id'];
					$status = 1;
					$sql = "INSERT INTO `profileimg` (userid, status) VALUES (?, ?)";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param('ii', $id, $status);
					$stmt->execute();
				}
			} else {
				$errors['userimg'] = "Ops! no user : cant store image.";
			}

			// login the user
			$user_id = $conn->insert_id;
			$_SESSION['usersid'] = $user_id;
			$_SESSION['usersfname'] = $firstname;
			$_SESSION['userslname'] = $lastname;
			$_SESSION['usersphone'] = $phone;
			$_SESSION['usersemail'] = $email;
			$_SESSION['verified'] = $verified;
			$_SESSION['usertype'] = $usertype;

			//SESSION VARIABLE WITH NULL VALUE
			$_SESSION['gender'] = $gender;
			$_SESSION['DOB'] = $DOB;
			$_SESSION['address'] = $address;
			$_SESSION['city'] = $city;
			$_SESSION['state'] = $state;
			$_SESSION['LGA'] = $LGA;
			$_SESSION['occupation'] = $occupation;
			$_SESSION['nationality'] = $nationality;
			$_SESSION['referralcode'] = $referralid;

			//sendVerificationEmail($email, $token);

			// flash messages
			$_SESSION['newmember'] = "your created you account at ".date("M d, Y h:i a");
			$_SESSION['sucessaccount']= "your account was created successfully and your entry payment was successfully.";
			$_SESSION['success-message'] = "success";

			header('location: sign-up?success=step2');
			exit();

		} else {
			$errors['db_error'] = "Ops! Database error : failed to register";
		}
	}
}

// CODE TO RESEND EMAIL
if (isset($_GET['resendemail'])){

	$id = $_SESSION['usersid'];

	$sql = "SELECT `*` FROM `users` WHERE `id` = '$id'";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$token = $row['token'];
		$email = $row['email'];
	}

	sendVerificationEmail($email, $token);

	$msg = "
	<div class='col col-md-8 mx-auto'>
	<div id='alert' class='alert alert-success alert-dismissible fade show' role='alert'>
	<strong>Email Sent!</strong> please check your spam if you can't find the sent mail.
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	<span aria-hidden='true'>&times;</span>
	</button>
	</div>
	</div>
	";
}


// CODE TO CREATE REFERRAL ID
function createreferralID(){

	global $conn;

	$referralid = bin2hex(random_bytes(3));
	$id = $_SESSION['usersid'];

	$sql = "UPDATE users SET referralid='$referralid' WHERE id='$id'";
	if($conn->query($sql)){

		$_SESSION['verifiedlog'] = "you verifed your account, your referralID is: ".$referralid;
		$_SESSION['successverified'] = "Your Membership fee was successful and account verified.";
		$_SESSION['success-message'] = "success";

		$_SESSION['newmember'] = "your created you account at ".date("M d, Y h:i a");
		$_SESSION['sucessaccount']= "your account was created successfully and your entry payment was successfully.";
		header('location: start?success=paymentsuccessful');
		exit();
	}
	$conn->close();

}

########### FOR EVERYTIME A USER LOGIN ##################

// CODE IF CLICKED ON LOGIN

if (isset($_POST['login-btn'])) {

	$emailPhone = $_POST['emailPhone'];
	$password = $_POST['password'];

	if (empty($emailPhone)) {
		$errors['emailPhone'] = "Ops! Email address is required.";
	}
	if (empty($password)) {
		$errors['password'] = "Ops! Password is required.";
	}

	if (count($errors) === 0) {
		$sql = "SELECT `*` FROM `users` WHERE `email` = ? OR `phone` = ? LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ss', $emailPhone, $emailPhone);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();
		$stmt->close();

		if (password_verify($password, $user['password'])) {

			// login successfully
			// before login Check if user has a Subcription Plan
			//$userid = $user['id'];
			// $useremail = $user['email'];
			//
			// $ch = curl_init();
			//
			// curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/customer/'.$useremail);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			//
			//
			// $headers = array();
			// $headers[] = 'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56';
			// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			//
			// $result = curl_exec($ch);
			// if($result){
			//
			// 	$cusdata = json_decode($result, true);
			// 	$sub_code = $cusdata['data']['subscriptions'][0]['subscription_code'];
			// 	//print $sub_code."<br>";
			//
			// 	#################### FETCH SUBSCRIPTION ################
			//
			// 	$ch = curl_init();
			//
			// 	curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/subscription/'.$sub_code);
			// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			//
			//
			// 	$headers = array();
			// 	$headers[] = 'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56';
			// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			//
			// 	$result = curl_exec($ch);
			// 	if($result){
			// 		$subdata = json_decode($result, true);
			//
			// 		if(!empty($subdata)){
			// 			//$plan_code = $subdata['data']['customer']['first_name'];
			// 			$userplan = $subdata;
			// 			$amount = $subdata['data']['plan']['amount'];
			// 			$planname = $subdata['data']['plan']['name'];
			// 			$interval = $subdata['data']['plan']['interval'];
			// 			$createdAt = $subdata['data']['plan']['createdAt'];
			// 			//print $plan_code;
			// 			//$_SESSION['plandata'] = $userplan;
			// 		}
			// 		//var_dump($plan_code);
			// 	}
			// }
			// if (curl_errno($ch)) {
			// 	echo 'Error:' . curl_error($ch);
			// }
			//curl_close($ch);

			$_SESSION['usersid'] = $user['id'];
			$_SESSION['usersfname'] = $user['fname'];
			$_SESSION['userslname'] = $user['lname'];
			$_SESSION['usersphone'] = $user['phone'];
			$_SESSION['usersemail'] = $user['email'];
			$_SESSION['verified'] = $user['verified'];
			$_SESSION['usertype'] = $user['usertype'];

			//SESSION VARIABLE WITH NULL VALUE
			$_SESSION['gender'] = $user['gender'];
			$_SESSION['DOB'] = $user['DOB'];
			$_SESSION['address'] = $user['address'];
			$_SESSION['city'] = $user['city'];
			$_SESSION['state'] = $user['state'];
			$_SESSION['LGA'] = $user['LGA'];
			$_SESSION['occupation'] = $user['occupation'];
			$_SESSION['nationality'] = $user['nationality'];
			$_SESSION['referralcode'] = $user['referralid'];

			// flash messages
			$_SESSION['successlogin']= "you're logged in.";
			$_SESSION['loginlog']= "you logged in at ". date("h:i a");
			$_SESSION['success-message'] = "success";

			if($user['verified'] > 0 || $user['referralid'] > 0){
				header('location: user/dashboard?amount='.$amount.'&planname='.$planname.'&interval='.$interval.'&createdAt='.$createdAt);
				exit();
			} else {
				header('location: start');
				exit();
			}
		} else {
			$errors['email'] = "Ops! no registered user found with this credentials.";
		}
	}

}

// CODE TO SEND RESET LINK
if (isset($_POST['reset-btn'])) {

	$email = mysqli_real_escape_string($conn,$_POST['email']);

	if (empty($email)) {
		$errors['emailempty'] = "Ops! Email address is required.";
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['notemail'] = "Ops! Your Email address is invailed.";
	}

	$emailresult = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	if (mysqli_num_rows($emailresult) > 0){
		$user = mysqli_fetch_array($emailresult);
		$token = $user['token'];
		if(sendresetpasswordLink($email, $token)){
			$_SESSION['resetpasswordlog'] = "you have resetted your password";
			header('location: ?success=sent&email='.$email);
			exit();
		}
	} else {
		$errors['emailnotexist'] = "Their's no user with this email address.";
	}
}

// CODE TO LOGOUT A USER
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['usersid']);
	unset($_SESSION['usersfname']);
	unset($_SESSION['userslname']);
	unset($_SESSION['usersphone']);
	unset($_SESSION['usersemail']);
	unset($_SESSION['verified']);

	// UNSET SESSION VAIRABLE WITH NULL
	unset($_SESSION['gender']);
	unset($_SESSION['DOB']);
	unset($_SESSION['address']);
	unset($_SESSION['city']);
	unset($_SESSION['state']);
	unset($_SESSION['LGA']);
	unset($_SESSION['occupation']);
	unset($_SESSION['nationality']);
	unset($_SESSION['referralcode']);

	header('location: index');
	exit();
}

// verify user email address
function verifyUser($token)
{
	global $conn;

	$sql = "SELECT `*` FROM `users` WHERE `token` = '$token' LIMIT 1";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$user = mysqli_fetch_assoc($result);
		$update_query = "UPDATE `users` SET `verified` = 1 WHERE `token` = '$token'";

		if (mysqli_query($conn, $update_query)) {
			//login user
			$_SESSION['usersid'] = $user['id'];
			$_SESSION['usersfname'] = $user['fname'];
			$_SESSION['userslname'] = $user['lname'];
			$_SESSION['usersphone'] = $user['phone'];
			$_SESSION['usersemail'] = $user['email'];
			$_SESSION['verified'] = 1;

			//SESSION VARIABLE WITH NULL VALUE
			$_SESSION['gender'] = $user['gender'];
			$_SESSION['DOB'] = $user['DOB'];
			$_SESSION['address'] = $user['address'];
			$_SESSION['city'] = $user['city'];
			$_SESSION['state'] = $user['state'];
			$_SESSION['LGA'] = $user['LGA'];
			$_SESSION['occupation'] = $user['occupation'];
			$_SESSION['nationality'] = $user['nationality'];
			$_SESSION['referralcode'] = $user['referralid'];

			// flash messages
			$_SESSION['successverified'] = "Yay! Your account has been verified successfully.";
			$_SESSION['success-message'] = "success";

			header('location: sign-up?success=step3');
			exit();
		}
	} else{
		$errors['onuser'] = "Ops! no user found.";
	}
}

// verify your new user email address ####################################################
function verifyusernewEmail($token)
{
	global $conn;

	$sql = "SELECT `*` FROM `users` WHERE `token` = '$token' LIMIT 1";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$user = mysqli_fetch_assoc($result);
		$update_query = "UPDATE `users` SET `verified` = 1 WHERE `token` = '$token'";

		if (mysqli_query($conn, $update_query)) {
			//login user
			$_SESSION['usersid'] = $user['id'];
			$_SESSION['usersfname'] = $user['fname'];
			$_SESSION['userslname'] = $user['lname'];
			$_SESSION['usersphone'] = $user['phone'];
			$_SESSION['usersemail'] = $user['email'];
			$_SESSION['verified'] = 1;

			//SESSION VARIABLE WITH NULL VALUE
			$_SESSION['gender'] = $user['gender'];
			$_SESSION['DOB'] = $user['DOB'];
			$_SESSION['address'] = $user['address'];
			$_SESSION['city'] = $user['city'];
			$_SESSION['state'] = $user['state'];
			$_SESSION['LGA'] = $user['LGA'];
			$_SESSION['occupation'] = $user['occupation'];
			$_SESSION['nationality'] = $user['nationality'];
			$_SESSION['referralcode'] = $user['referralid'];

			// flash messages
			$_SESSION['emailverified'] = "Your new email address has been verified successfully.";
			$_SESSION['success-message'] = "success";

			header('location: ./user/settings?success=infoupdated');
			exit();
		}
	} else{
		$errors['onuser'] = "Ops! no user found.";
	}
}

// VERIFY USER TOKEN FOR PASSWORD RESET
function createnewPassword($token){
	global $conn;

	$sql = "SELECT `*` FROM `users` WHERE `token` = '$token' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);
	$_SESSION['usersemail'] = $user['email'];

	header('location: ?resetpassword=ready');
}


// CREATE NEW PASSWORD FROM RESET PASSWORD LINK
if(isset($_POST['create-new_password-btn'])){

	$new_password = mysqli_real_escape_string($conn,$_POST['new_password']);
	$confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);

	if (empty($new_password )) {
		$errors['emptypassword'] = "Please enter a new password.";
	}
	if (strlen($new_password ) < 6) {
		$errors['passwordtooshort'] = "Ops! Passwords must be at least 6 characters long.";
	}
	if ($new_password !== $confirm_password) {
		$errors['passwordnotmatch'] = "Ops! Your password did not match.";
	}

	if (count($errors) == 0){

		$new_password = password_hash($new_password, PASSWORD_DEFAULT);
		$email = $_SESSION['usersemail'];

		$sql = "UPDATE users set password='$new_password' WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if($result){
			header('location: login');
			exit();
		}
	}
}


// Admin Create Ads

// If upload button is clicked ...
if (isset($_POST['upload'])) {
	// Get image name
	$image = $_FILES['image']['name'];
	// Get text
	$heading = mysqli_real_escape_string($conn, $_POST['heading']);
	$body = mysqli_real_escape_string($conn, $_POST['body']);
	$creator = $_SESSION['usersfname'].' '.$_SESSION['userslname'];

	// image file directory
	$target = "images/".basename($image);

	$sql = "INSERT into `adminAds` (image, heading, body, creator) VALUES ('$image', '$heading', '$body', '$creator')";
	// execute query
	mysqli_query($conn, $sql);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		header('location: admin?success=adcreated');
	}else{
		header('location: admin?error=notcreated');
	}
}

// Admin Delete Ads

if (isset($_GET['del_id'])){
	$sql = "DELETE FROM `adminAds` WHERE `id` = '".$_GET['del_id']."'";
	if (mysqli_query($conn, $sql)){
		header('location: admin?warning=deleted');
	} else {
		header('location: admin?error=notdeleted');
		die($sql);
	};
}

// Admin Edit/Update Ads

if (isset($_GET['edit_id'])){
	$sql = "SELECT `*` FROM `adminAds` WHERE `id` = '".$_GET['edit_id']."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
}
// Update information
if(isset($_POST['update_advert'])){
	$heading = mysqli_real_escape_string($conn, $_POST['edit-heading']);
	$body = mysqli_real_escape_string($conn, $_POST['edit-body']);

	$update = "UPDATE `adminAds` SET `heading`= '$heading', `body`= '$body' WHERE `id` = '".$_GET['edit_id']."'";
	if (mysqli_query($conn, $update)){
		if (!isset($sql)) {
			die("there was an error" .mysqli_connect_error());
		} else {
			header('location: admin?success=adupdated');
		}
	} else{
		header('location: admin?error=notupdated');
	};

}
