<?php
class Transaksi_Model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProductByName()
    {
        $this->db->query("SELECT nama_produk FROM produk");
        return $this->db->resultSet();
    }
    public function getHargaProduk()
    {
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

    public function bayar(string $id_akun, string $tgl_order): void
    {
        $this->db->query("SELECT * FROM keranjang INNER JOIN produk ON keranjang.id_produk = produk.id_produk");
        $result = $this->db->resultSet();
        $total = 0;
        foreach ($result as $item) {
            $total += $item['qty'] * $item['harga'];
        }
        $this->db->query("INSERT INTO pesanan (id_akun,tgl_order) VALUES (:id_akun, :tgl_order)");
        $this->db->bind('id_akun', $id_akun);
        $this->db->bind('tgl_order', $tgl_order);
        $this->db->execute();
        // get id pesanan
        $this->db->query("SELECT id_pesanan FROM pesanan WHERE id_akun = :id_akun AND tgl_order = :tgl_order ORDER BY id_pesanan DESC LIMIT 1");
        $this->db->bind('id_akun', $id_akun);
        $this->db->bind('tgl_order', $tgl_order);
        $this->db->execute();
        $id_pesanan = $this->db->single()['id_pesanan'];
        // lakukan perulangan untuk insert ke tabel detail_pesanan
        foreach ($result as $item) {
            $this->db->query("INSERT INTO detail_pesanan (id_pesanan, id_produk, qty, harga) VALUES (:id_pesanan, :id_produk, :qty, :harga)");
            $this->db->bind('id_pesanan', $id_pesanan);
            $this->db->bind('id_produk', $item['id_produk']);
            $this->db->bind('qty', $item['qty']);
            $this->db->bind('harga', $item['harga']);
            $this->db->execute();
        }
        // update stok produk
        foreach ($result as $item) {
            $this->db->query("UPDATE produk SET stok = stok - :qty WHERE id_produk = :id_produk");
            $this->db->bind('id_produk', $item['id_produk']);
            $this->db->bind('qty', $item['qty']);
            $this->db->execute();
        }
        $this->db->query("DELETE FROM keranjang WHERE id_akun = :id_akun");
        $this->db->bind('id_akun', $id_akun);
        $this->db->execute();
    }
}
