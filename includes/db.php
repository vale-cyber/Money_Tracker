<?php

// params to connect to database
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "spendingtracker";

// connection to db
$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($mysqli === false) {
    die("ERROR: Database connection failed." . $mysqli->connect_error);
}
?>