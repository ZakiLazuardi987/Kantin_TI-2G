<?php
session_start();
include "../../Notifications/config/koneksi.php";

if (isset($_POST['submit_menu_pengajuan'])) {
    // Mengambil data dari formulir
    $id_kategori = $_POST['id_kategori'];
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Mendapatkan informasi file gambar
    $gambar_menu = $_FILES['gambar_menu']['name'];
    $gambar_menu_temp = $_FILES['gambar_menu']['tmp_name'];
    $gambar_menu_folder = "../../Notifications/gambar/"; // Folder tempat menyimpan gambar

    $alasan = $_POST['alasan'];

    // Pindahkan file gambar ke folder yang ditentukan
    move_uploaded_file($gambar_menu_temp, $gambar_menu_folder . $gambar_menu);

    $sql_menu_pengajuan = "INSERT INTO menu_pengajuan (id_kategori, nama_menu, harga, stok, gambar_menu, alasan) VALUES ('$id_kategori', '$nama_menu', '$harga', '$stok', '$gambar_menu', '$alasan')";
    
    if ($conn->query($sql_menu_pengajuan) === TRUE) {
        echo "Pengajuan menu berhasil disimpan!";
    } else {
        echo "Error: " . $sql_menu_pengajuan . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Menu</title>
</head>
<body>
    <h2>Form Pengajuan Menu</h2>
    <form action="form_menu_pengajuan.php" method="post" enctype="multipart/form-data">
        <!-- Menambahkan input untuk kategori, nama_menu, harga, stok, gambar_menu, dan alasan -->
        <label for="id_kategori">ID Kategori:</label>
        <input type="text" name="id_kategori" required><br>

        <label for="nama_menu">Nama Menu:</label>
        <input type="text" name="nama_menu" required><br>

        <label for="harga">Harga:</label>
        <input type="text" name="harga" required><br>

        <label for="stok">Stok:</label>
        <input type="text" name="stok" required><br>

        <label for="gambar_menu">Gambar Menu:</label>
        <input type="file" name="gambar_menu" accept="image/*" required><br>

        <label for="alasan">Alasan:</label>
        <textarea name="alasan" required></textarea><br>

        <button type="submit" name="submit_menu_pengajuan">Submit Pengajuan Menu</button>
    </form>
</body>
</html>
