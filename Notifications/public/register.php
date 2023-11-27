<?php
include "../../Notifications/config/koneksi.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    $level = $_POST['level'];

    $sql = "INSERT INTO users (username, password, level) VALUES ('$username', '$password', '$level')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="post">
    <div class="form-container">
        <div class="section-title">Tambah Pengguna!</div>
        <div class="input-container">
            <label for="nama">Nama</label>
            <input type="text" id="nama" class="input-field" placeholder="Masukkan nama..." required>
        </div>
        <div class="input-container">
            <label for="username">Username</label>
            <input type="text" id="username" class="input-field" placeholder="Masukkan username..." required>
        </div>
        <div class="input-container">
            <label for="password">Password</label>
            <input type="password" id="password" class="input-field" placeholder="Masukkan password..." required>
        </div>
        <div class="input-container">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" class="input-field" placeholder="Masukkan alamat..." required>
        </div>
        <div class="input-container">
            <label for="notelp">No. Telp</label>
            <input type="text" id="notelp" class="input-field" placeholder="Masukkan no. telp..." required>
        </div>
        <div class="input-container">
            <label>Jenis Kelamin</label>
            <div class="radio-group">
                <input type="radio" id="laki" name="gender" class="radio-input">
                <label for="laki" class="radio-label">Laki-Laki</label>
                <input type="radio" id="perempuan" name="gender" class="radio-input">
                <label for="perempuan" class="radio-label">Perempuan</label>
            </div>
        </div>
        <button class="submit-btn">Tambahkan</button>
        <div class="checkbox-container">
            <input type="checkbox" id="data-check" class="checkbox-input" require>
            <label for="data-check" class="checkbox-label" required>Pastikan data yang Anda masukkan sudah benar.</label>
        </div>
        <div class="copyright">
            <p>© Kantin JTI Polinema 2023</p>
        </div>
    </div>
<!-- 
        <label for="nama">Nama</label>
        <input type="text" id="nama" class="input-field" placeholder="Masukkan nama...">

        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="level">Level (pegawai/admin):</label>
        <input type="text" name="level" required><br>

        <button type="submit" name="register">Register</button>
    </form> -->
</body>
</html>
