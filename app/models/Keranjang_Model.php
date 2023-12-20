<?php
class Keranjang_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addToCart($data)
{
    // $this->db->query("SELECT * FROM keranjang WHERE id_produk = :id_produk");
    // $this->db->bind('id_produk', $data['id_produk']); // Menggunakan $data['id_produk']
    // $this->db->execute();
    // $result = $this->db->single();

    // if ($result) {
    //     // Mengambil nilai qty yang ada dan menambahkan dengan qty yang baru
    //     $qty = $result['qty'] + $data['qty']; // Menambahkan qty yang baru
    //     $this->db->query("UPDATE keranjang SET qty = :qty WHERE id_produk = :id_produk");
    //     $this->db->bind('id_produk', $data['id_produk']);
    //     $this->db->bind('qty', $qty);
    //     $this->db->execute();
    //     return $this->db->rowCount();
    // }

    $query = "INSERT INTO keranjang (id_produk, tgl_order, qty) VALUES (:id_produk, :tgl_order, :qty)";
    $this->db->query($query);
    $this->db->bind('id_produk', $data['id_produk']);
    $this->db->bind('tgl_order', $data['tgl_order']);
    $this->db->bind('qty', $data['qty']);
    $this->db->execute();

    return $this->db->rowCount();
}



    // public function addToCart(array $produk): void
    // {
    //     // ambil id akun dari session
    //     //$id_akun = $produk['id_akun'];
    //     $tgl_order = $produk['tgl_order'];
    //     $id_produk = $produk['id_produk'];
    //     $qty = $produk['qty'];
    //     // check if product already in cart
    //     $this->db->query("SELECT * FROM keranjang WHERE id_produk = :id_produk");
    //     $this->db->bind('id_produk', $id_produk);
    //     $this->db->execute();
    //     $result = $this->db->single();
    //     if ($result) {
    //         // update qty
    //         $this->db->query("UPDATE keranjang SET qty = qty + :qty WHERE id_produk = :id_produk");
    //         $this->db->bind('id_produk', $id_produk);
    //         $this->db->bind('qty', $qty);
    //         $this->db->execute();
    //         return;
    //     }
    //     // insert new product to cart
    //     $this->db->query("INSERT INTO keranjang (id_produk, tgl_order, qty) VALUES (:id_produk, :tgl_order, :qty)");
    //     $this->db->bind('id_produk', $id_produk);
    //     //$this->db->bind('id_akun', $id_akun);
    //     $this->db->bind('tgl_order', $tgl_order);
    //     $this->db->bind('qty', $qty);
    //     $this->db->execute();
    // }

    public function getAllKeranjang(): array
    {
        // query inner join with products table
        $this->db->query("SELECT * FROM keranjang INNER JOIN produk ON keranjang.id_produk = produk.id_produk WHERE NOT EXISTS (
            SELECT d.id_keranjang
            FROM detail_transaksi d
            WHERE d.id_keranjang = keranjang.id_keranjang
        );");
        return $this->db->resultSet();
    }

    public function deleteCart(string $id_keranjang): void
    {
        $this->db->query("DELETE FROM keranjang WHERE id_keranjang = :id_keranjang");
        $this->db->bind('id_keranjang', $id_keranjang);
        $this->db->execute();
    }

    public function resetView(){
        $this->db->query("DELETE FROM keranjang");
        $this->db->execute();
    }
}
