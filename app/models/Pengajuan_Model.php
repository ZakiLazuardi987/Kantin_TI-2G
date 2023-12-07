<?php

class Pengajuan_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($data)
    {
        $query = "INSERT INTO pengajuan (id_pengajuan, nama_produk, harga, gambar_produk, status_pengajuan) VALUES(:id_pengajuan, :nama_produk, :harga, :gambar_produk, :status_pengajuan)";

        $this->db->query($query);
        $this->db->bind('id_pengajuan', $data['id_pengajuan']);
        $this->db->bind('nama_produk', $data['nama_produk']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar_produk', $data['gambar_produk']);
        $this->db->bind('status_pengajuan', $data['status_pengajuan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllPengajuan()
    {
        $this->db->query("SELECT * FROM pengajuan ORDER BY id_pengajuan DESC");
        return $this->db->resultSet();
    }

    public function getPengajuanById($id_pengajuan)
    {
        $query = "SELECT * FROM pengajuan WHERE id_pengajuan = :id_pengajuan";

        $this->db->query($query);
        $this->db->bind('id_pengajuan', $id_pengajuan);

        $this->db->execute();

        return $this->db->resultSet();
    }

    public function update($data)
    {
        $query = "UPDATE pengajuan SET id_pengajuan = :id_pengajuan, nama_produk = :nama_produk, harga = :harga, gambar_produk = :gambar_produk, status_pengajuan = :status_pengajuan WHERE id_pengajuan = :id_pengajuan";

        $this->db->query($query);
        $this->db->bind('id_pengajuan', $data['id_pengajuan']);
        $this->db->bind('nama_produk', $data['nama_produk']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar_produk', $data['gambar_produk']);
        $this->db->bind('status_pengajuan', $data['status_pengajuan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id_pengajuan)
    {
        $query = "DELETE FROM pengajuan WHERE id_pengajuan =:id_pengajuan";

        $this->db->query($query);
        $this->db->bind('id_pengajuan', $id_pengajuan);

        $this->db->execute();
        return $this->db->rowCount();
    }
}