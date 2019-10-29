<?php

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['z12itfj4c1vgopf8.cbetxkdyhwsb.us-east-1.rds.amazonaws.com'];
$username = $dbparts['p4gmndxgwunibq9f'];
$password = $dbparts['las0bz6giq48d600'];
$database = ltrim($dbparts['cxqipnmqiw23zt83'],'/');
