<?php
require_once 'Transaction.php';

class Receipt {
    private $transaksi;

    public function __construct() {
        $this->transaksi = new Transaction();
    }

    public function formSubmission() {
        if (isset($_POST['product_id'], $_POST['qty_input'])) {
            $productId = $_POST['product_id'];
            $qty = $_POST['qty_input'];

            // Proses struk pembelian
            $transaction = new Transaction();
            $receiptData = $transaction->receipt($productId, $qty);

            // Masukkan data ke dalam database
            $transaction->transaksi($userId, $productId, $qty);

            // Proses struk pembelian, misalnya menggunakan kelas Receipt
            $receipt = new Receipt();
            $receipt->tampilkanStruk($productId, $qty);
        } else {
            echo "Data tidak lengkap";
        }
    }

    public function tampilkanStruk($product_id, $qty) {
        // Memanggil fungsi receipt untuk membuat transaksi
        $transactionData = $this->transaksi->receipt($product_id, $qty);

        if ($transactionData) {
            // Menampilkan data struk
            echo "<h2>Struk Pembelian</h2>";
            echo "<p><strong>ID Pesanan:</strong> " . $transactionData['id_pesanan'] . "</p>";
            echo "<p><strong>Tanggal:</strong> " . $transactionData['tgl_order'] . "</p>";
            echo "<p><strong>Pelanggan:</strong> " . $transactionData['nama_user'] . "</p>";
            echo "<table border='1'>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>";

            $total = 0;

            // Menampilkan detail produk dalam struk
            echo "<tr>
                    <td>" . $transactionData['detail_pesanan']['nama_produk'] . "</td>
                    <td>" . $transactionData['detail_pesanan']['qty'] . "</td>
                    <td>" . $transactionData['detail_pesanan']['harga'] . "</td>
                    <td>" . ($transactionData['detail_pesanan']['harga'] * $transactionData['detail_pesanan']['qty']) . "</td>
                </tr>";

            $total += $transactionData['detail_pesanan']['harga'] * $transactionData['detail_pesanan']['qty'];

            echo "<tr>
                    <td colspan='3'><strong>Total:</strong></td>
                    <td><strong>" . $total . "</strong></td>
                </tr>";

            echo "</table>";
        } else {
            echo "Produk tidak ditemukan. Struk tidak dapat ditampilkan.";
        }
    }
}

// Contoh penggunaan
$receipt = new Receipt();
$receipt->formSubmission();
?>
