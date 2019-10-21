<?php
if (isset($_POST['save-data-button'])){
    require 'config/db.php';

    $id = $_SESSION['usersid'];

    $gender = $_POST['gender'];
    $DOBdata = array($_POST['month'], $_POST['day'], $_POST['year']);
    $DOB = implode(", ", $DOBdata);
    $Address = $_POST['address'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $LGA = $_POST['LGA'];
    $Occupation = $_POST['occupation'];
    $Nationality = $_POST['nationality'];

    $sql = "SELECT * FROM users WHERE id='$id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {

        $sql = "UPDATE users SET gender = '$gender', DOB = '$DOB', address = '$Address', city = '$City', state = '$State', LGA = '$LGA', occupation = '$Occupation', nationality = '$Nationality' WHERE id = '$id';";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            //session variable for NULL data
            $_SESSION['gender'] = $row ['gender'];
            $_SESSION['DOB'] = $row ['DOB'];
            $_SESSION['LGA'] = $row ['LGA'];
            $_SESSION['occupation'] = $row ['occupation'];
            $_SESSION['address'] = $row ['address'];
            $_SESSION['city'] = $row ['city'];
            $_SESSION['state'] = $row ['state'];
            $_SESSION['nationality'] = $row ['nationality'];

            $url = "settings.php?success-update=updated";
            echo '<script>window.location = "'.$url.'";</script>';
            // header("Location: panels/settings.php?success-update=updated");
            exit();
        } 
        else {
            header("Location: settings.update.php?error=couldnotupdate");
            exit();
        }
        mysql_close($conn);
    }

}