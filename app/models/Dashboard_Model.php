<?php

class Dashboard_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTotalProducts()
    {
        $query = "SELECT COUNT(id_produk) AS jumlah_produk FROM produk";
        $this->db->query($query);
        return $this->db->single();
    }

    public function getTotalStock()
    {
        $query = "SELECT SUM(stok) AS jumlah_stok FROM produk";
        $this->db->query($query);
        return $this->db->single();
    }

    public function getLastSales()
    {
        $query = "SELECT total_sales FROM total";
        $this->db->query($query);
        return $this->db->single();
    }

    public function getTodayTransactions()
    {
        $query = "SELECT COUNT(id_transaksi) AS jumlah_transaksi FROM transaksi WHERE tgl_order = CURDATE()";
        $this->db->query($query);
        return $this->db->single();
    }

    public function getNotif(){
        $query = "SELECT COUNT(id_pengajuan) AS jumlah_notif FROM pengajuan WHERE status_pengajuan = 'On Process'";
        $this->db->query($query);
        return $this->db->single(); // Menggunakan single() karena hanya satu nilai yang diharapkan
    }
}
