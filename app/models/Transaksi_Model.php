<?php
class Transaksi_Model{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProductByName(){
        $this->db->query("SELECT nama_produk FROM produk");
        return $this->db->resultSet();
    }
    public function getHargaProduk(){
        $this->db->query("SELECT nama_produk, harga FROM produk");
        $result = $this->db->resultSet(); // Simpan hasil query ke dalam variabel $result
    
        $data_produk = array(); // Inisialisasi array untuk menyimpan data produk
    
        // Cek jika hasil query mengembalikan baris data
        if ($result) {
            foreach ($result as $row) {
                $data_produk[] = $row;
            }
        }
    
        return $data_produk; // Mengembalikan data produk sebagai array
    }
} 
?>