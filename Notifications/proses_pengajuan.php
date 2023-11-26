<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $alasan = $_POST['alasan'];

    $sql = "INSERT INTO pengajuan (username, password, level, alasan) VALUES ('$username', '$password', '$level', '$alasan')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Pengajuan berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
