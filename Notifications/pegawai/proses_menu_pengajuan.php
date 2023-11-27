<?php
include "../../Notifications/config/koneksi.php";

if (isset($_POST['submit_menu'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Mendapatkan informasi file gambar
    $gambar_menu = $_FILES['gambar_menu']['name'];
    $gambar_menu_temp = $_FILES['gambar_menu']['tmp_name'];
    $gambar_menu_folder = "../../Notifications/gambar/"; // Folder tempat menyimpan gambar

    // Pindahkan file gambar ke folder yang ditentukan
    move_uploaded_file($gambar_menu_temp, $gambar_menu_folder . $gambar_menu);

    $alasan = $_POST['alasan'];

    $sql_menu_pengajuan = "INSERT INTO menu_pengajuan (id_kategori, nama_menu, harga, stok, gambar_menu, alasan) VALUES ('$id_kategori', '$nama_menu', '$harga', '$stok', '$gambar_menu', '$alasan')";
    
    if ($conn->query($sql_menu_pengajuan) === TRUE) {
        echo "Pengajuan menu berhasil disimpan!";
    } else {
        echo "Error: " . $sql_menu_pengajuan . "<br>" . $conn->error;
    }
}

$conn->close();
?>
