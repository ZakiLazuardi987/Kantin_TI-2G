<?php

require_once 'Database.php';

//use classes\

class Transaction {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Getter agar $db dapat digunakan di file lain
    public function getInsertId() {
        return $this->db->conn->insert_id;
    }

    public function transaksi($userId, $productId, $qty) {
        // Input pembelian
        $sqlOrder = "INSERT INTO pesanan (id_akun, tgl_order) VALUES ('$userId', NOW())";
        $this->db->conn->query($sqlOrder);

        // Ambil $orderId
        $orderId = $this->getInsertId();

        // Input barang terbeli ke pembelian
        $sqlDetail = "INSERT INTO detail_pesanan (id_produk, id_pesanan, qty, harga) 
                      VALUES ('$productId', '$orderId', '$qty', (SELECT harga FROM produk WHERE id_produk = '$productId'))";
        $this->db->conn->query($sqlDetail);

        // Update stok produk
        $sqlUpdateStock = "UPDATE produk SET stok = stok - '$qty' WHERE id_produk = '$productId'";
        $this->db->conn->query($sqlUpdateStock);
    }

    public function receipt($orderId) {
        // Ambil detail pembelian untuk struk
        $sql =
            "SELECT pesanan.id_pesanan, pesanan.tgl_order, user.nama_user, produk.nama_produk, detail_pesanan.qty, detail_pesanan.harga
            FROM pesanan
            JOIN akun ON pesanan.id_akun = akun.id_akun
            JOIN user ON akun.id_user = user.id_user
            JOIN detail_pesanan ON pesanan.id_pesanan = detail_pesanan.id_pesanan
            JOIN produk ON detail_pesanan.id_produk = produk.id_produk
            WHERE pesanan.id_pesanan = '$orderId'";
        $result = $this->db->conn->query($sql);

        // Format data struk
        $receiptData = [];
        while ($row = $result->fetch_assoc()) {
            $receiptData[] = $row;
        }

        // Return formatted data struk
        return $receiptData;
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM produk";
        $result = $this->db->conn->query($sql);

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        return $products;
    }
}

// Using Transaction class
// $transaction = new Transaction();
// $transaction->transaksi($userId, $productId, $qty);
// $struk = $transaction->receipt($orderId);
// echo json_encode($struk);