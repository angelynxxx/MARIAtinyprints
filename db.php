<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "maria_tiny_prints";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Run this once in PHP
$admin_pass = password_hash("admin123", PASSWORD_DEFAULT);
echo $admin_pass;

?>