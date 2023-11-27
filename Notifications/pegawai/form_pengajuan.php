<?php
session_start();
include "../../Notifications/config/koneksi.php";

if (isset($_POST['submit_pengajuan'])) {
    // Mengambil data dari formulir
    $username = $_POST['username']; // Menambahkan input username
    $password = $_POST['password']; // Menambahkan input password
    $level = $_POST['level'];       // Menambahkan input level
    $alasan = $_POST['alasan'];

    // Perhatikan bahwa disini kita mengambil username, password, dan level dari formulir,
    // bukan dari session seperti sebelumnya.

    $sql_pengajuan = "INSERT INTO pengajuan (username, password, level, alasan) VALUES ('$username', '$password', '$level', '$alasan')";
    
    if ($conn->query($sql_pengajuan) === TRUE) {
        echo "Pengajuan berhasil disimpan!";
    } else {
        echo "Error: " . $sql_pengajuan . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Pegawai</title>
</head>
<body>
    <h2>Form Pengajuan Pegawai</h2>
    <form action="form_pengajuan.php" method="post">
        <!-- Menambahkan input untuk username, password, dan level -->
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="level">Level:</label>
        <input type="text" name="level" required><br>

        <label for="alasan">Alasan:</label>
        <textarea name="alasan" required></textarea><br>

        <button type="submit" name="submit_pengajuan">Submit Pengajuan</button>
    </form>
</body>
</html>
