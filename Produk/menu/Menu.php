<?php
class Menu {
    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function addProduct($id_kategori, $nama_produk, $harga, $stok, $gambar_produk){
        $query = "INSERT INTO produk (id_kategori, nama_produk, harga, stok, gambar_produk) VALUES ('$id_kategori', '$nama_produk', '$harga', '$stok', '$gambar_produk')";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return true;
        }
        return false;
    }

    public function getAllProducts(){
        $query = "SELECT * FROM produk";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function getProductById($id_produk){
        $query = "SELECT * FROM produk p, kategori k WHERE p.id_kategori = k.id_kategori AND p.id_produk = '$id_produk'";
        $result = mysqli_query($this->conn, $query);
        if($result->num_rows == 1){
            return $result->fetch_assoc();
        } else{
            return null;
        }
    }

    public function deleteProduct($id_produk){
        $query = "DELETE FROM produk WHERE id_produk = '$id_produk'";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    public function updateProduct($id_produk, $id_kategori, $nama_produk, $harga, $stok, $gambar_produk){
        $query = "UPDATE produk SET id_kategori = '$id_kategori', nama_produk = '$nama_produk', harga = '$harga', stok = '$stok', gambar_produk = '$gambar_produk' WHERE id_produk = '$id_produk'";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    public function updateNoPict($id_produk, $id_kategori, $nama_produk, $harga, $stok){
        $query = "UPDATE produk SET id_kategori = '$id_kategori', nama_produk = '$nama_produk', harga = '$harga', stok = '$stok' WHERE id_produk = '$id_produk'";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    public function addStok($id_produk, $qty){
        $query = "UPDATE produk SET stok = stok + '$qty' WHERE id_produk = '$id_produk'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}
?>
