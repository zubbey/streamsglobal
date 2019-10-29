<?php
// **********************************************
// START Database connection and Configuration
// **********************************************
// set a default environment
$WEBSITE_ENVIRONMENT = "Development";
// detect the URL to determine if it's development or production
if(stristr($_SERVER['HTTP_HOST'], 'localhost') === FALSE) $WEBSITE_ENVIRONMENT = "Production";
// value of variables will change depending on if Development vs Production
if ($WEBSITE_ENVIRONMENT =="Development") {

	$host 		= "localhost";
	$user 		= "root";
	$password 	= "Inno070687";
	$database 	= "streamsSystem";

	define("APP_ENVIRONMENT", "Development");
	define("APP_BASE_URL", "http://localhost~/zubbey/streamsglobal");
	error_reporting(E_ALL ^ E_NOTICE); // turn ON showing errors
} else {

	// $cleardb_url 		= parse_url(getenv("CLEARDB_DATABASE_URL"));
	// $host				= $cleardb_url["us-cdbr-iron-east-05.cleardb.net"];
	// $user 				= $cleardb_url["b5456b157a2fb3"];
	// $password			= $cleardb_url["ac565cd3"];
	// $database 			= substr($cleardb_url["heroku_8fb2f96e9786de5"],1);

	$host 		= "us-cdbr-iron-east-05.cleardb.net";
	$user 		= "b5456b157a2fb3";
	$password 	= "ac565cd3";
	$database 	= "heroku_8fb2f96e9786de5";

	define("APP_ENVIRONMENT", "Production");
	define("APP_BASE_URL", "http://www.streamsglobal.com");
	#error_reporting(0); // turn OFF showing errors
	error_reporting(E_ALL ^ E_NOTICE); // turn ON showing errors
}
// connect to the database server
$conn = mysqli_connect($host, $user, $password) or die("Could not connect to database");
// select the right database
mysqli_select_db($conn, $database);
// **********************************************
// END Database connection and Configuration
// **********************************************
?>
