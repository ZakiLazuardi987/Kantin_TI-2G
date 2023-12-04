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
        $this->db->query("SELECT * FROM produk ORDER BY id_produk DESC");
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
}