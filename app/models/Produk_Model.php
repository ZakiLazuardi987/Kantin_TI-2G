<?php

class Produk_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($data)
    {
        $query = "INSERT INTO produk (id_kategori, nama_produk, harga, stok, gambar_produk) VALUES(:id_kategori, :nama_produk, :harga, 0, :gambar_produk)";

        $this->db->query($query);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('nama_produk', $data['nama_produk']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar_produk', $data['gambar_produk']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllProducts()
    {
        // kueri left join dengan tabel keranjang dan kurangkan stok dengan qty di keranjang
        $this->db->query("SELECT * FROM produk ORDER BY id_produk DESC");
        return $this->db->resultSet();
    }


    public function getAllProductsNotStock()
    {
        // kueri left join dengan tabel keranjang dan kurangkan stok dengan qty di keranjang
        $this->db->query("SELECT * FROM produk WHERE stok > 0 ORDER BY id_produk DESC");
        return $this->db->resultSet();
    }

    public function getBestSellingProducts()
{
    $query = "SELECT p.nama_produk, p.harga, p.gambar_produk, COUNT(k.id_produk) AS total_penjualan
    FROM keranjang k
    JOIN produk p ON k.id_produk = p.id_produk
    GROUP BY p.nama_produk, p.harga, p.gambar_produk
    ORDER BY total_penjualan DESC
    LIMIT 5
    ";

    $this->db->query($query);
    return $this->db->resultSet();
}


    public function getAllCategories()
    {
        $this->db->query("SELECT * FROM kategori");
        return $this->db->resultSet();
    }

    public function getProductById($id_produk)
    {
        $query = "SELECT * FROM produk p, kategori k WHERE p.id_kategori = k.id_kategori AND p.id_produk = :id_produk";

        $this->db->query($query);
        $this->db->bind('id_produk', $id_produk);

        $this->db->execute();

        return $this->db->resultSet();
    }

    public function getProductByCategory($id_kategori)
    {
        $query = "SELECT * FROM produk WHERE id_kategori = :id_kategori";

        $this->db->query($query);
        $this->db->bind('id_kategori', $id_kategori);

        $this->db->execute();

        return $this->db->resultSet();
    }

    public function update($data)
    {
        $query = "UPDATE produk SET id_kategori = :id_kategori, nama_produk = :nama_produk, harga = :harga, stok = 0, gambar_produk = :gambar_produk WHERE id_produk = :id_produk";

        $this->db->query($query);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('nama_produk', $data['nama_produk']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar_produk', $data['gambar_produk']);
        $this->db->bind('id_produk', $data['id_produk']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id_produk)
    {
        $query = "DELETE FROM produk WHERE id_produk =:id_produk";

        $this->db->query($query);
        $this->db->bind('id_produk', $id_produk);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function dataSearching()
    {
        $keyword = $_POST['search'];
        $query = "SELECT * FROM produk WHERE nama_produk LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }

    public function insertFromPengajuan($idPengajuan){
        $this->db->query("INSERT INTO produk (id_kategori, nama_produk, harga, stok, gambar_produk) 
                          SELECT id_kategori, nama_produk, harga, stok, gambar_produk 
                          FROM pengajuan 
                          WHERE id_pengajuan = :idPengajuan");
        $this->db->bind('idPengajuan', $idPengajuan);
        return $this->db->execute(); // Eksekusi query tanpa mengembalikan hasil (execute() digunakan karena ini adalah operasi INSERT)
    }

    public function accPengajuan($idPengajuan) {
        $this->db->query("UPDATE pengajuan SET status_pengajuan = 'Disetujui' WHERE id_pengajuan = :idPengajuan");
        $this->db->bind('idPengajuan', $idPengajuan);
        return $this->db->execute();        
    }

    public function tolakPengajuan($idPengajuan) {
        $this->db->query("UPDATE pengajuan SET status_pengajuan = 'Ditolak' WHERE id_pengajuan = :idPengajuan");
        $this->db->bind('idPengajuan', $idPengajuan);
        return $this->db->execute();
    }

    public function updateStokProduk($id_produk, $qty)
    {
        // Ambil stok produk saat ini
        $currentStok = $this->getStokProdukById($id_produk);

        // Kurangi stok produk dengan jumlah yang dibeli
        $newStok = $currentStok - $qty;

        // Update stok produk dalam database
        $query = "UPDATE produk SET stok = :stok WHERE id_produk = :id_produk";
        $this->db->query($query);
        $this->db->bind(':stok', $newStok);
        $this->db->bind(':id_produk', $id_produk);

        // Eksekusi query
        return $this->db->execute();
    }

    // Fungsi untuk mendapatkan stok produk berdasarkan id_produk
    public function getStokProdukById($id_produk)
    {
        $query = "SELECT stok FROM produk WHERE id_produk = :id_produk";
        $this->db->query($query);
        $this->db->bind(':id_produk', $id_produk);

        // Eksekusi query dan ambil hasilnya
        $result = $this->db->single();

        // Kembalikan stok produk
        return $result['stok'];
    }
}
