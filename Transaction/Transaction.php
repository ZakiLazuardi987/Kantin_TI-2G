<?php

require_once '../Database.php';

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

    public function receipt($product_id, $qty) {
        // Misalnya, struktur tabel dan query untuk mendapatkan informasi produk
        $productQuery = "SELECT * FROM produk WHERE id_produk = $product_id";
        $productResult = $this->db->conn->query($productQuery);

        if ($productResult->num_rows > 0) {
            $productData = $productResult->fetch_assoc();

            // Misalnya, struktur tabel dan query untuk membuat transaksi/pesanan
            $orderInsertQuery = "INSERT INTO pesanan (tgl_order, id_user) VALUES (NOW(), 1)";
            $this->db->conn->query($orderInsertQuery);
            $order_id = $this->db->conn->insert_id;

            // Misalnya, struktur tabel dan query untuk menambahkan produk ke dalam pesanan
            $detailInsertQuery = "INSERT INTO detail_pesanan (id_pesanan, id_produk, qty, harga) VALUES ($order_id, $product_id, $quantity, {$productData['harga']})";
            $this->db->conn->query($detailInsertQuery);

            // Return data transaksi untuk struk
            $transactionData = [
                'id_pesanan' => $order_id,
                'tgl_order' => date('Y-m-d H:i:s'),
                'nama_user' => 'Nama Pengguna',  // Gantilah dengan data pengguna sesuai aplikasi Anda
                'detail_pesanan' => [
                    'id_produk' => $productData['id_produk'],
                    'nama_produk' => $productData['nama_produk'],
                    'qty' => $qty,
                    'harga' => $productData['harga'],
                ]
            ];

            return $transactionData;
        } else {
            return false; // Produk tidak ditemukan
        }
    }
}

// Using Transaction class
// $transaction = new Transaction();
// $transaction->transaksi($userId, $productId, $qty);
// $struk = $transaction->receipt($orderId);
// echo json_encode($struk);