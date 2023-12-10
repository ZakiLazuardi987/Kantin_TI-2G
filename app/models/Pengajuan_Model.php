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
        $query = "INSERT INTO pengajuan (id_kategori, nama_produk, harga, gambar_produk, status_pengajuan) VALUES(:id_kategori, :nama_produk, :harga, :gambar_produk, :status_pengajuan)";

        $this->db->query($query);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('nama_produk', $data['nama_produk']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar_produk', $data['gambar_produk']);
        $this->db->bind('status_pengajuan', $data['status_pengajuan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllPengajuan()
    {
        $this->db->query("SELECT p.id_pengajuan, k.nama_kategori, p.nama_produk, p.harga, p.gambar_produk, p.status_pengajuan FROM pengajuan p INNER JOIN kategori k ON p.id_kategori = k.id_kategori ORDER BY p.id_pengajuan DESC");
        return $this->db->resultSet();
    }

    public function getAllCategories()
    {
        $this->db->query("SELECT * FROM kategori");
        return $this->db->resultSet();
    }

    public function getPengajuanById($id_pengajuan)
    {
        $query = "SELECT * FROM pengajuan p, kategori k WHERE p.id_kategori = k.id_kategori AND p.id_pengajuan = :id_pengajuan";

        $this->db->query($query);
        $this->db->bind('id_pengajuan', $id_pengajuan);

        $this->db->execute();

        return $this->db->resultSet();
    }

    public function update($data)
    {
        $query = "UPDATE pengajuan SET id_kategori = :id_kategori, nama_produk = :nama_produk, harga = :harga, gambar_produk = :gambar_produk, status_pengajuan = :status_pengajuan WHERE id_pengajuan = :id_pengajuan";

        $this->db->query($query);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('nama_produk', $data['nama_produk']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('gambar_produk', $data['gambar_produk']);
        $this->db->bind('status_pengajuan', $data['status_pengajuan']);
        $this->db->bind('id_pengajuan', $data['id_pengajuan']);

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