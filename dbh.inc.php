<?php

$dbhost = "fdb1030.awardspace.net";
$dbUsername = "4246248_customerinfo";
$dbPassword = "3254019jw";
$dbname = "4246248_customerinfo";

$conn = mysqli_connect($dbhost, $dbUsername, $dbPassword, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
