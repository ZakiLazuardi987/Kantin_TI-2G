<?php

class History_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database; // Assuming you have a Database class to handle database connections
    }

    public function getHistoryById($id_transaksi)
    {
        $query = "SELECT 
        t.id_transaksi,
        t.tgl_order,
        p.nama_produk,
        k.qty,
        k.qty * p.harga AS subtotal,
        t.total_qty,
        t.total_bayar,
        d.nominal_bayar,
        d.kembalian
    FROM detail_transaksi d
    JOIN transaksi t ON t.id_transaksi = d.id_transaksi
    JOIN keranjang k ON k.id_keranjang = d.id_keranjang
    JOIN produk p ON k.id_produk = p.id_produk
    WHERE t.id_transaksi = :id_transaksi;
    ";

        $this->db->query($query);
        $this->db->bind(':id_transaksi', $id_transaksi);

        $this->db->execute();

        return $this->db->resultSet();
    }
}
?>
