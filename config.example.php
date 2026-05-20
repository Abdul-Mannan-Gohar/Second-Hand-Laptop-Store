<?php
// Copy this file to config.php and fill in your database details
// cp config.example.php config.php

$host = "localhost";
$user = "YOUR_DB_USERNAME";   // usually 'root' on localhost
$pass = "YOUR_DB_PASSWORD";   // blank on default XAMPP
$db   = "laptopsdb";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
