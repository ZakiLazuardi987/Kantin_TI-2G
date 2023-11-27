<?php
include "koneksi.php";

if (isset($_POST['register'])) {
    $nama_user = $_POST['nama_user'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    $level = $_POST['level'];

    $sql = "INSERT INTO user (nama_user, jenis_kelamin, alamat, no_telp)
            VALUES ('$nama_user', '$jenis_kelamin', '$alamat', '$no_telp');";
    $sql2 = "INSERT INTO akun (username, password, level)
            VALUES ('$username','$password','$level');";
    
    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
        echo "<script>alert('Anggota Berhasil Ditambahkan'); window.location='pegawai.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
}

$conn->close();
?>