<?php
session_start(); // Mulai session

// Tampilkan pesan 
if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan
}
if (isset($_SESSION['error_message'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
    unset($_SESSION['error_message']); // Hapus pesan setelah ditampilkan
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu Pegawai</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    </head>

    <body>
        <div class="container mt-5">
            
            <table class="table">
            <thead>
                    <tr>
                        
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include_once(__DIR__ . '/../../Database.php');
                    include_once (__DIR__ . '/../menu/Menu.php'); 

                    $database = new Database();
                    $db = $database->getConnection();

                    $product = new Menu($db);
                    $result = $product->getAllProducts();

                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        //echo "<td>" . $row['nama_kategori'] . "</td>";
                        echo "<td>" . $row['nama_produk'] . "</td>";
                        echo "<td>Rp " . number_format($row['harga'],0,',','.') . "</td>";
                        echo "<td>" . $row['stok'] . "</td>";
                        echo "<td><img style='width: 50px;' src='../gambar_produk/" . $row['gambar_produk'] . "'></td>";
                        echo "<td>";
                        echo "<a href='tambah_stok.php?id_produk=" . $row['id_produk'] . "' class='btn btn-primary btn-sm'>Tambah Stok</a> ";
                        //echo "<a href='../menu/Proses.php?action=delete&id_produk=" . $row['id_produk'] . "' class='btn btn-danger btn-sm'>Delete</a> ";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
        

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>