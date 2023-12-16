<?php
class Keranjang_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addToCart(array $produk): void
    {
        // ambil id akun dari session
        $id_akun = 11;
        $id_produk = $produk['id_produk'];
        $qty = $produk['qty'];
        // check if product already in cart
        $this->db->query("SELECT * FROM keranjang WHERE id_produk = :id_produk");
        $this->db->bind('id_produk', $id_produk);
        $this->db->execute();
        $result = $this->db->single();
        if ($result) {
            // update qty
            $this->db->query("UPDATE keranjang SET qty = qty + :qty WHERE id_produk = :id_produk");
            $this->db->bind('id_produk', $id_produk);
            $this->db->bind('qty', $qty);
            $this->db->execute();
            return;
        }
        // insert new product to cart
        $this->db->query("INSERT INTO keranjang (id_akun, id_produk, qty) VALUES (:id_akun, :id_produk, :qty)");
        $this->db->bind('id_produk', $id_produk);
        $this->db->bind('id_akun', $id_akun);
        $this->db->bind('qty', $qty);
        $this->db->execute();
    }

    public function getAllKeranjang(): array
    {
        // query inner join with products table
        $this->db->query("SELECT * FROM keranjang INNER JOIN produk ON keranjang.id_produk = produk.id_produk");
        return $this->db->resultSet();
    }

    public function deleteCart(string $id_produk): void
    {
        $this->db->query("DELETE FROM keranjang WHERE id_produk = :id_produk");
        $this->db->bind('id_produk', $id_produk);
        $this->db->execute();
    }
}
