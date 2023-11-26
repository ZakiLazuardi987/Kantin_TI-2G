<?php
session_start();
include "koneksi.php";

if (isset($_POST['submit_pengajuan'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $level = $_SESSION['level'];
    $alasan = $_POST['alasan'];

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
        <label for="alasan">Alasan:</label>
        <textarea name="alasan" required></textarea><br>

        <button type="submit" name="submit_pengajuan">Submit Pengajuan</button>
    </form>
</body>
</html>
