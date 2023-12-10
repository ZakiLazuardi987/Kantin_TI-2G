<?php
// Stok_Model.php (Model)

class Stok_Model {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    
    public function tambahStok($id_produk, $stok_Tambah)
    {
        $query = "UPDATE produk SET stok = stok + :jumlah_stok_masuk WHERE id_produk = :id_produk";
    
        $this->db->query($query);
        $this->db->bind(':jumlah_stok_masuk', $stok_Tambah);
        $this->db->bind(':id_produk', $id_produk);
    
        return $this->db->execute(); // Return true if successful, false if failed
    }
    
    

    public function kurangiStok($id_produk, $stok_Kurang)
    {
        $query = "UPDATE produk SET stok = stok - :jumlah_stok_keluar WHERE id_produk = :id_produk";

        $this->db->query($query);
        $this->db->bind(':jumlah_stok_keluar', $stok_Kurang);
        $this->db->bind(':id_produk', $id_produk);

        return $this->db->execute(); // Mengembalikan true jika berhasil, false jika gagal
    }

    // Metode lainnya jika diperlukan
}
