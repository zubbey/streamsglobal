<?php
session_start();
require ('../config/db.php');
require_once ('../controllers/emailControl.php');
//require('../controllers/counter.php');
date_default_timezone_set("Africa/Lagos");

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {

    $id = $_SESSION['usersid'];
    $time = time();
    $updateQuery = mysqli_query($conn,"UPDATE `users` SET lastAction = '$time' WHERE lastAction = NOW() - 900");
// last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    ### LOGOUT ADMIN
    $_SESSION['admin-session'] = FALSE;
    unset($_SESSION['username']);
    unset($_SESSION['role']);
    unset($_SESSION['id']);

    ### LOGOUT USERS
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

    header("Location: ../login?warning=inactive".date('h:i a'));
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

//DECLARE ERROR FOR USERS QUERY
$errors =  array();
$userfname = "";
$userlname = "";
$useremail = "";
$userphone = "";

//ADMIN DECLARED VARIABLES
$username = "";
$role = "";

$_SESSION['planCode']=array();

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



// Admin Create Ads

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $creator = $_SESSION['username'];

    // image file directory
    $target = "../images/".basename($image);

    $sql = "INSERT into `adminAds` (image, heading, body, creator) VALUES ('$image', '$heading', '$body', '$creator')";
    // execute query
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        header('location: ?success=adcreated');
    }else{
        header('location: ?error=notcreated');
    }
}

// Admin Delete Ads

if (isset($_GET['del_id'])){
    $sql = "DELETE FROM `adminAds` WHERE `id` = '".$_GET['del_id']."'";
    if (mysqli_query($conn, $sql)){
        mysqli_query($conn,"ALTER TABLE `adminAds` AUTO_INCREMENT = 1");
        header('location: ?warning=deleted');
        exit();
    } else {
        header('location: ?error=notdeleted');
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
            header('location: ?success=adupdated');
        }
    } else{
        header('location: ?error=notupdated');
    };

}
############### ADMIN CREATE NEW USER FUNCTION ###############
if (isset($_POST['create-user-btn'])) {
    $userfname = stripslashes($_REQUEST['fname']);
    $userfname = mysqli_real_escape_string($conn, $_POST['fname']);
    $userlname = stripslashes($_REQUEST['lname']);
    $userlname = mysqli_real_escape_string($conn, $_POST['lname']);
    $useremail = stripslashes($_REQUEST['email']);
    $useremail = mysqli_real_escape_string($conn, $_POST['email']);
    $userphone = stripslashes($_REQUEST['phone']);
    $userphone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordConfirm = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if (empty($userfname) || empty($userlname) || empty($useremail) || empty($userphone)) {
        header("Location: ?error=empty");
    }else if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ?error=invalidemail");
    }else if (!preg_match('/^[0-9]{11}+$/', $userphone)) {
        header("Location: ?error=invalidphone");
    }else if (strlen($password) < 6) {
        header("Location: ?error=passwordshort");
    }else if ($password !== $passwordConfirm) {
        header("Location: ?error=passwordconfirm");
    }

    //CHECK IF EMAIL IS IN THE DATABASE
    $emailQuery = "SELECT `*` FROM `users` WHERE `email` = ? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $useremail);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        header("Location: ?error=emailexist");
    }

    if (!empty($userfname) && !empty($userlname) && !empty($useremail) && !empty($userphone) && !empty($password)) {
        // If form submitted, insert values into the database.

        $dateReg = date("Y-m-d");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $verified = 0;
        $token = bin2hex(random_bytes(30));
        $time = time();

        $query = "INSERT into `users` (fname, lname, phone, email, password, verified, token, dateReg, lastAction) VALUES ('$userfname', '$userlname', '$userphone', '$useremail', '$password', '$verified', '$token', '$dateReg', '$time')";
        $result = mysqli_query($conn, $query);

        if($result){
            //SEND VERIFICATION EMAIL
            sendVerificationEmail($useremail, $token);

            //INSERT INTO PROFILE IMAGE
            $sql = "SELECT `*` FROM `users` WHERE `email` = '$useremail' LIMIT 1";
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
                header("Location: ?error=cantstoreimg");
            }
            header('location: ?success=newusercreated');
            exit();
        } else{
            header('location: ?error=cantcreateuser');
            exit();
        }
    }
}
############### ADMIN CREATE NEW USER FUNCTION ###############

############### ADMIN DASHBOARD FUNCTION ###############
//COUNT ALL USERS IN THE SYSTEM
if (isset($_POST['create-admin-btn'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $role = stripslashes($_REQUEST['role']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordConfirm = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if (empty($username) || empty($role) || empty($password)) {
        header("Location: ?error=adminempty");
    }else if (strlen($password) < 8) {
        header("Location: ?error=adminpasswordshort");
    }else if ($password !== $passwordConfirm) {
        header("Location: ?error=adminpasswordconfirm");
    }

    //CHECK IF EMAIL IS IN THE DATABASE
    $usernameQuery = "SELECT `*` FROM `admin` WHERE `username` = ? LIMIT 1";
    $stmt = $conn->prepare($usernameQuery);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        header("Location: ?error=usernameexist");
    }

    if (!empty($username) && !empty($role) && !empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $dateReg = date("Y-m-d");
        $avatar = 0;
        $query = "INSERT into `admin` (username, password, role, avatar, datecreated) VALUES ('$username', '$password', '$role', '$avatar', '$dateReg')";
        $result = mysqli_query($conn, $query);

        if ($result){
            header('location: ?success=admincreated&role='.$role);
            exit();
        } else{
            header('location: ?error=adminnotcreated');
            exit();
        }
    }
}


############ DASHBOARD VALUE ############
function allusers()
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM users";
    if ($result=mysqli_query($conn, $sql)){
        $row= mysqli_fetch_array($result);
        $rowcount = $row[0];
        mysqli_free_result($result);
    }
    return $rowcount;
}

function activeSession()
{
    global $conn;
//    $sql = "SELECT COUNT(*) FROM users WHERE lastAction > (NOW() - 60*5)";
    $sql = "SELECT COUNT(*) FROM users WHERE lastAction > 0";
    if ($result=mysqli_query($conn, $sql)){
        $row= mysqli_fetch_array($result);
        $rowcount = $row[0];
        mysqli_free_result($result);
    }
    return $rowcount;
}

function pendingRequest()
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM users WHERE verified = 0";
    if ($result=mysqli_query($conn, $sql)){
        $row= mysqli_fetch_array($result);
        $rowcount = $row[0];
        mysqli_free_result($result);
    }
    return $rowcount;
}

//UPDATE PAGES CONTENTS

if (isset($_GET['content_id'])){
    $sql = "SELECT `*` FROM `pageContent` WHERE `id` = '".$_GET['content_id']."'";
    $result = mysqli_query($conn, $sql);
    $contentRow = mysqli_fetch_array($result);
}
// Update information on update button click
if(isset($_POST['update_content1'])){
    $heading = mysqli_real_escape_string($conn, $_POST['edit-heading']);
    $body = mysqli_real_escape_string($conn, $_POST['edit-body']);

    $update = "UPDATE `pageContent` SET `heading`= '$heading', `body`= '$body', `dateCreated`= NOW() WHERE `id` = '".$_GET['content_id']."'";
    if (mysqli_query($conn, $update)){
        if (!isset($sql)) {
            die("there was an error" .mysqli_connect_error());
        } else {
            header('location: ?success=contentupdated');
        }
    } else{
        header('location: ?error=notupdated');
    };

}

//EDIT ADMIN USER
if (isset($_GET['admin_id'])){
    $sql = "SELECT `*` FROM `admin` WHERE `id` = '".$_GET['admin_id']."'";
    $result = mysqli_query($conn, $sql);
    $adminRow = mysqli_fetch_array($result);
    $_SESSION['adminusername'] = $adminRow['username'];
    $_SESSION['adminrole'] = $adminRow['role'];
    $_SESSION['adminpassword'] = $adminRow['password'];
}
// Update information on update button click
if(isset($_POST['update_admin'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username) || empty($role) || empty($password)) {
        header("Location: ?error=adminempty");
        exit();
    } else if (strlen($password) < 8) {
        header("Location: ?error=adminpasswordshort");
        exit();
    }
    if (!empty($username) || !empty($role) || !empty($password)){

        $password = password_hash($password, PASSWORD_DEFAULT);

        $update = "UPDATE `admin` SET `username`= '$username', `role`= '$role', `password`= '$password' WHERE `id` = '".$_GET['admin_id']."'";
        if (mysqli_query($conn, $update)){
            if (!isset($sql)) {
                die("there was an error" .mysqli_connect_error());
            } else {
                header('location: ?success=adminupdated');
            }
        } else{
            header('location: ?error=notupdated');
        }
    }
}
//DELETE ADMIN
if (isset($_GET['deladmin_id'])){
    $sql = "DELETE FROM `admin` WHERE `id` = '".$_GET['deladmin_id']."'";
    if (mysqli_query($conn, $sql)){
        mysqli_query($conn,"ALTER TABLE `admin` AUTO_INCREMENT = 0");
        header('location: ?warning=deleted');
        exit();
    } else {
        header('location: ?error=notdeleted');
        die($sql);
    };
}

//ADD ADMIN EMAIL ADDRESS
if (isset($_GET['addemail'])){
    $email = $_GET['addemail'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ?error=invalidaddemail");
    } else{
        $update = mysqli_query($conn,"UPDATE `admin` SET `email`= '$email' WHERE `id` = '".$_SESSION['id']."'");
        if (!$update){
            header('location: ?error=notupdated');
            exit();
        } else{
            $_SESSION["adminemail"] = $email;
        }
    }
}

if (isset($_POST['upload-admin-img'])) {
    $id = $_SESSION['id'];
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
                $fileNameNew = "admin".$id.".".$fileActualExt;
                $fileDestination = '../images/uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "UPDATE `admin` SET `avatar` = 1 WHERE `id` = '$id';";
                $result = mysqli_query($conn, $sql);

                $_SESSION['updatedprofileimage']= "you updated your profile image.";
                header("Location: ?success=uploaded");
                exit();
            } else {
                header("Location: ?error=sizeerror");
                exit();
            }
        } else {
            header("Location: ?error=errorupload");
            exit();
        }
    } else {
        header("Location: ../user/settings?error=filenotallowed");
        exit();
    }

}
######### LOGOUT ADMIN
if (isset($_GET['logout'])) {

    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    ### LOGOUT ADMIN
    $_SESSION['admin-session'] = FALSE;
    unset($_SESSION['username']);
    unset($_SESSION['role']);
    unset($_SESSION['id']);

    header('location: ../admin');
    exit();
}