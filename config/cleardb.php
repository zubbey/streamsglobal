<?php

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$host        = $cleardb_url["us-cdbr-iron-east-05.cleardb.net"];
$user        = $cleardb_url["b5456b157a2fb3"];
$password    = $cleardb_url["ac565cd3"];
$database    = substr($cleardb_url["heroku_8fb2f96e9786de5"],1);
