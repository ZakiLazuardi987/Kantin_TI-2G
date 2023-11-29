<?php
include_once '../Database.php';
include_once 'Menu.php';
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
        <title>Edit Menu</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <h2>Edit Menu</h2>
            <form method="post" action="Proses.php" enctype="multipart/form-data">
                <div class="form-group">
                <label for="kategori">Pilih Kategori:</label>
                <select name="kategori" id="kategori" class="form-control">
                    
                    <?php
                    
                    include_once '../Database.php';
                    include_once 'Kategori.php';
            
                    $database = new Database();
                    $db = $database->getConnection();

                    $category = new Kategori($db);

                    $result1 = $category->getAllCategories();
                    while($row2 = mysqli_fetch_assoc($result1)){
                        ?>
                        <option value="<?= $row2['id_kategori'] ?>" <?= ($row['id_kategori'] == $row2['id_kategori']) ? 'selected' : '' ?>><?= $row2['nama_kategori'] ?></option>
                    <?php
                    }
                    ?>
                </select>

                </div>
                
                <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
                <div class="form-group">
                    <label for="nama_produk">Nama Produk:</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?php echo $row['nama_produk']; ?>" required>

                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $row['harga']; ?>" required>

                </div>
                <div class="form-group">
                    <label for="stok">Stok:</label>
                    <input type="text" name="stok" id="stok" class="form-control" value="<?php echo $row['stok']; ?>" required>

                </div>
                <div class="form-group">
                    <label for="gambar_produk">Gambar Produk:</label>
                    <img style="width: 50px;" src="">
                    <input type="file" name="gambar_produk" id="gambar_produk" class="form-control">

                </div>
                
                <button type="submit" name="update" class="btn btn-primary">Update</button>

            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
