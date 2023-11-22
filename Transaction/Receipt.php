<?php
require_once 'Transaction.php';

$transaction = new Transaction();

// Contoh transaksi pembelian
$userId = 1;
$productId = 2;
$quantity = 3;

// Lakukan transaksi pembelian
$transaction->transaksi($userId, $productId, $quantity);

// Mengambil ID pesanan terakhir
$lastOrderId = $transaction->getInsertId();

// Mengambil data struk
$receiptData = $transaction->receipt($lastOrderId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            width: 300px;
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="receipt">
    <h2>Receipt</h2>
    <p>Date: <?php echo date('Y-m-d H:i:s'); ?></p>
    <p>Order ID: <?php echo $lastOrderId; ?></p>
    <p>Customer: <?php echo $receiptData[0]['nama_user']; ?></p>

    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php foreach ($receiptData as $item) : ?>
            <tr>
                <td><?php echo $item['nama_produk']; ?></td>
                <td><?php echo $item['qty']; ?></td>
                <td><?php echo number_format($item['harga'] * $item['qty'], 2); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p>Total Amount: <?php echo number_format(array_sum(array_column($receiptData, 'harga')), 2); ?></p>
</div>

<script>
    // JavaScript untuk memicu pencetakan
    window.onload = function() {
        window.print();
    }
</script>

</body>
</html>
