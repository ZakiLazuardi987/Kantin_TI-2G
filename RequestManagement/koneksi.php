<?php
// File: koneksi.php

$servername = "localhost";
$username = "username";
$password = "password";
$database = "database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
