<?php
ini_set('error_reporting', E_ALL);
session_start();

require ('./config/db.php');
require_once ('./controllers/emailControl.php');

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
	//"SELECT * FROM users WHERE email=? LIMIT 1"
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

	if (count($errors) === 0) {
		// If form submitted, insert values into the database.

		$dateReg = date("Y-m-d H:i:s");
		$password = password_hash($password, PASSWORD_DEFAULT);
		$verified = 0;
		$token = bin2hex(random_bytes(30));
		$usertype = 0;

		$query = "INSERT into `users` (fname, lname, email, password, phone, verified, token, usertype, dateReg) VALUES ('$firstname', '$lastname', '$email', '$password', '$phone', '$verified', '$token', '$usertype', '$dateReg')";
		$result = mysqli_query($conn,$query);
		if($result){

			sendVerificationEmail($email, $token);

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

			//sendVerificationEmail($email, $token);

			// flash messages
			$_SESSION['successaccount']= "your account was created successfully and your entry payment was successfully.";
			$_SESSION['success-message'] = "success";

			header('location: sign-up.php?success=step2');
			exit();

		} else {
			$errors['db_error'] = "Ops! Database error : failed to register";
		}
	}
}

// CODE TO RESEND EMAIL
if (isset($_POST['resendemail'])){

	sendVerificationEmail($email, $token);

	$msg = "
	<div class='col col-md-8 mx-auto'>
	<div class='alert alert-success alert-dismissible fade show' role='alert'>
	<strong>Email Sent!</strong> please check your spam if you can't find the sent mail.
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	<span aria-hidden='true'>&times;</span>
	</button>
	</div>
	</div>
	";
	header('location: sign-up.php?success=step2');
	exit();
}


// CODE TO CREATE REFERRAL ID
function createreferralID(){

	global $conn;

	$referralid = bin2hex(random_bytes(3));
	$id = $_SESSION['usersid'];
	//echo $referralid;

	$sql = "UPDATE users SET referralid='$referralid' WHERE id='$id'";
	$conn->query($sql);
	// if ($conn->query($sql) === TRUE) {
	// 	echo "Referralid updated successfully.";
	// } else {
	// 	echo "Error updating record: " . $conn->error;
	// }

	$conn->close();

}

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

			// flash messages
			$_SESSION['successlogin']= "you're logged in.";
			$_SESSION['success-message'] = "success";

			header('location: start.php');
			exit();

		} else {
			$errors['email'] = "Ops! no registered user found with this credentials.";
		}
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

	header('location: index.php');
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

			// flash messages
			$_SESSION['successverified'] = "Yay! Your account has been verified successfully.";
			$_SESSION['success-message'] = "success";

			header('location: sign-up.php?success=step3');
			exit();
		}
	} else{
		$errors['onuser'] = "Ops! no user found.";
	}

}


//if click on upload images in profile settings

if (isset($_POST['upload-img-submit'])) {
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
				header("Location: ../panels/settings.php?success=uploaded");
				exit();
			} else {
				header("Location: ../panels/settings.php?error=sizeerror");
				exit();
			}
		} else {
			header("Location: ../panels/settings.php?error=errorupload");
			exit();
		}
	} else {
		header("Location: ../panels/settings.php?error=filenotallowed");
		exit();
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
		header('location: admin.php?success=adcreated');
	}else{
		header('location: admin.php?error=notcreated');
	}
}

// Admin Delete Ads

if (isset($_GET['del_id'])){
	$sql = "DELETE FROM `adminAds` WHERE `id` = '".$_GET['del_id']."'";
	if (mysqli_query($conn, $sql)){
		header('location: admin.php?warning=deleted');
	} else {
		header('location: admin.php?error=notdeleted');
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
			header('location: admin.php?success=adupdated');
		}
	} else{
		header('location: admin.php?error=notupdated');
	};

}
