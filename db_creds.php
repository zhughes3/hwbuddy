<?php

$host = "mysql.zacharyhughes.com";
$dbuser = "danche";
$pass = "brightwolf1";
$dbname = "hwbuddy";

$mysqli = new mysqli($host, $dbuser, $pass, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>