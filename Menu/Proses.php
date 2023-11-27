<?php
session_start();
include_once '../Database.php';
include_once 'Menu.php';

$database = new Database();
$db = $database->getConnection();

$menu = new Menu($db);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {
            $id_kategori = $_POST['kategori'];
            $nama_produk = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $gambar_produk = $_FILES['gambar_produk']['name'];
            $nama_gambar_baru = ''; // Variabel untuk menyimpan nama gambar baru
            if (!empty($_FILES['gambar_produk']['name'])) {
                $gambar_produk = $_FILES['gambar_produk'];
                $nama_gambar_baru = generateRandomName($gambar_produk['name']); // Mendapatkan nama acak untuk gambar baru

                $uploadDir = 'gambar_produk/';
                $uploadFile = $uploadDir . $nama_gambar_baru;

                if (move_uploaded_file($gambar_produk['tmp_name'], $uploadFile)) {
                    // Jika upload berhasil, lanjutkan dengan operasi di database
                    if ($menu->addProduct($id_kategori, $nama_produk, $harga, $stok, $nama_gambar_baru)) {
                        $_SESSION['message'] = "Menu berhasil ditambahkan!";
                    } else {
                        $_SESSION['message'] = "Gagal menambahkan menu.";
                    }
                } else {
                    $_SESSION['message'] = "Gagal mengunggah gambar.";
                }
            } else {
            $_SESSION['message'] = "Harap pilih gambar.";
            }
            header("Location: index.php");
            exit();

        } else if(isset($_POST['update'])){
            $id_produk = $_POST['id_produk'];
            $id_kategori = $_POST['kategori'];
            $nama_produk = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $gambar_produk = $_FILES['gambar_produk']['name'];
            $nama_gambar_baru = ''; // Variabel untuk menyimpan nama gambar baru
            if (!empty($_FILES['gambar_produk']['name'])) {
                $gambar_produk = $_FILES['gambar_produk'];
                $nama_gambar_baru = generateRandomName($gambar_produk['name']); // Mendapatkan nama acak untuk gambar baru

                $uploadDir = 'gambar_produk/';
                $uploadFile = $uploadDir . $nama_gambar_baru;

                if($menu->updateProduct($id_produk, $id_kategori, $nama_produk, $harga, $stok, $nama_gambar_baru)){
                    $_SESSION['message'] = "Menu berhasil diedit!";
                } else {
                    $_SESSION['message'] = "Gagal mengedit menu.";
                }
            } else{
                if($menu->updateNoPict($id_produk, $id_kategori, $nama_produk, $harga, $stok)){
                    $_SESSION['message'] = "Menu berhasil diedit!";
                } else {
                    $_SESSION['message'] = "Gagal mengedit menu.";
                }
            }

            

            header("Location: index.php");
            exit();
        }

        
    }

    if(isset($_GET['action']) && $_GET['action'] === 'delete'){
        $id_produk = $_GET['id_produk'];
        
        if($menu->deleteProduct($id_produk)){
            $_SESSION['message'] = "Menu berhasil dihapus!";
        } else {
            $_SESSION['message'] = "Gagal menghapus menu.";
        }

        header("Location: index.php");
        exit();
    }

    function generateRandomName($fileName)
{
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    return uniqid() . '.' . $ext; // Menghasilkan nama acak untuk gambar baru
}
?>
