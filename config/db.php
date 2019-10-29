<?php

//require ('constants.php');
require ('jawsdb.php');

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
	die('Database error: ' . $conn->connect_error);
}
