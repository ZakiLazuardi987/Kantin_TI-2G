<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Produk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            max-width: 400px;
        }
    </style>
</head>
<body>

<h2>Pembelian Produk</h2>

<!-- Table of Products -->
<table>
    <thead>
        <tr>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Jumlah Beli</th>
        </tr>
    </thead>
    <tbody>
        <!-- Fetch and display products from the database -->
        <?php
        // Replace with your database connection code
        $conn = new mysqli("localhost", "root", "", "dbpercobaan");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM produk";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_produk']}</td>
                        <td>{$row['nama_produk']}</td>
                        <td>{$row['harga']}</td>
                        <td>{$row['stok']}</td>
                        <td>
                        <form id='buyForm' action='Receipt.php' method='post'>
                                <input type='hidden' name='product_id' value='{$row['id_produk']}'>
                                <input type='hidden' name='qty' value=''> <!-- Add an empty hidden input for quantity -->
                                <label for='qty'>Jumlah:</label>
                                <input type='number' name='qty_input' id='qty' min='1' max='{$row['stok']}' required>
                            </form>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No products available</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan='5'>
                <input type='submit' value='Buy' onclick='submitForm()'>
            </td>
        </tr>
    </tfoot>
</table>
</form>
<script>
    function submitForm() {
        document.getElementById('buyForm').submit();
    }
</script>
</body>
</html>
