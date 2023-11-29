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
        <title>Menu Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    </head>

    <body>
        <div class="container mt-5">
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahModal">Tambah</button>
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
                    include_once '../Database.php';
                    include_once 'menu/Menu.php';

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
                        echo "<td><img style='width: 50px;' src='gambar_produk/" . $row['gambar_produk'] . "'></td>";
                        echo "<td>";
                        echo "<a href='Edit.php?id_produk=" . $row['id_produk'] . "' class='btn btn-primary btn-sm'>Edit</a> ";
                        echo "<a href='menu/Proses.php?action=delete&id_produk=" . $row['id_produk'] . "' class='btn btn-danger btn-sm'>Delete</a> ";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" arial-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>
                    <div class="modal-body">
                    <form action="menu/Proses.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="kategori">Pilih Kategori:</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option></option>
                    <?php
                    include_once '../Database.php';
                    include_once 'menu/Kategori.php';

                    $database = new Database();
                    $db = $database->getConnection();

                    $category = new Kategori($db);
                    $result = $category->getAllCategories();

                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='" . $row['id_kategori'] . "'>" . $row['nama_kategori'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" name="harga" id="harga" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="text" name="stok" id="stok" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gambar_produk">Gambar Produk:</label>
                <input type="file" name="gambar_produk" id="gambar_produk" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Menu</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>