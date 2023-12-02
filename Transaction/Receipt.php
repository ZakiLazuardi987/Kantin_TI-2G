<?php
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

    public function displayReceipt() {
        $productId = $_POST['product_id'];
        $qty = $_POST['qty_input'];

        // Generate receipt data
        $transactionData = $this->transaksi->receipt($productId, $qty);

        if ($transactionData) {
            // Display receipt data (HTML format)
            echo "<h2>Receipt</h2>";
            echo "<p><strong>Order ID:</strong> " . $transactionData['id_pesanan'] . "</p>";
            echo "<p><strong>Date:</strong> " . $transactionData['tgl_order'] . "</p>";
            echo "<p><strong>Customer:</strong> " . $transactionData['nama_user'] . "</p>";
            echo "<table border='1'>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>";

            $total = 0;

            // Display product details in the receipt
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
            echo "Product not found. Receipt cannot be displayed.";
        }
    }
}