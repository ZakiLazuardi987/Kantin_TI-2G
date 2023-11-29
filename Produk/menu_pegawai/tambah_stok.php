<?php
include_once(__DIR__ . '/../../Database.php');
include_once (__DIR__ . '/../menu/Menu.php'); 
$database = new Database();
$db = $database->getConnection();

$menu = new Menu($db);
$id_produk = $_GET['id_produk'];
$row = $menu->getProductById($id_produk);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Stok</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Stok</h1>
        <form method="post" action="../menu/Proses.php">
            <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
            <table class="table">
                <tr>
                    <th>Kategori:</th>
                    <td><?php echo $row['nama_kategori']; ?></td>
                </tr>
                <tr>
                    <th>Nama Produk:</th>
                    <td><?php echo $row['nama_produk']; ?></td>
                </tr>
                <tr>
                    <th>Harga:</th>
                    <td><?php echo $row['harga']; ?></td>
                </tr>
                <tr>
                    <th>Stok:</th>
                    <td><?php echo $row['stok']; ?></td>
                </tr>
                <tr>
                    <th>Tambah Stok:</th>
                    <td><input name="qty" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="addStok" value="Tambah" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
