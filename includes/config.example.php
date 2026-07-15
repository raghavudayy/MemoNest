<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database Credentials
$host = "your_host";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create Connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check Connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>