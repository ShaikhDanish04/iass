<?php
$servername = "localhost";
$username = "u964064311_sattamatka";
$password = "root1234";
$dbname = "u964064311_sattamatka";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Kolkata');

session_start();
ob_start();

$admin_access = 0;
if (!empty($_SESSION)) {
    $user = $_SESSION['username'];
    $user_in = $conn->query("SELECT username,admin_access FROM `user_login` WHERE username = '$user'")->fetch_assoc();
    $admin_access = $user_in['admin_access'];
}
