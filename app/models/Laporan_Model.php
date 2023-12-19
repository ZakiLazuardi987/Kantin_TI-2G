<?php

class Laporan_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database; // Assuming you have a Database class to handle database connections
    }

    public function getAllReport()
    {
        $query = "SELECT * FROM laporan";
        $this->db->query($query);

        return $this->db->resultSet();
    }

    public function getLaporanData($tanggal = null)
    {
        $query = "SELECT * FROM laporan";

        if ($tanggal) {
            $query .= " WHERE Tanggal = :tanggal";
        }

        $this->db->query($query);

        if ($tanggal) {
            $this->db->bind(':tanggal', $tanggal);
        }

        return $this->db->resultSet();
    }

    public function getTransactionDetails($tanggal)
    {
        $query = "SELECT id_transaksi, total_qty, total_bayar FROM transaksi WHERE tgl_order = :tanggal LIMIT 1";
        $this->db->query($query);
        $this->db->bind(':tanggal', $tanggal);
    
        return $this->db->rowCount();
    }
    
}
?>
