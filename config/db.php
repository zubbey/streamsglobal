<?php
require ('constants.php');
//require ('cleardb.php');

//$conn = new mysqli($host, $user, $password, $database);
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
