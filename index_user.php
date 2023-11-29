<?php include('Database.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <!-- Your CSS styles here -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            height: 100vh;
        }
        header {
            padding: 10px;
            background-color: #2D8F95;
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
        }
        menu {
            margin: 0;
            padding: 10px;
            background: linear-gradient(180deg, #06594A 0%, rgba(181.42, 161.91, 236.94, 0.15) 100%, rgba(255, 255, 255, 0.90) 100%), linear-gradient(0deg, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.75) 100%);
            height: 100vh;
            width: 200px;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2{
            margin: 25px;
            position: relative;
            padding-left: 225px;
        }
        h3{
            margin: 25px;
            position: relative;
        }
        h1{
            margin-top: 10px;
            margin-left: 100px;
            margin-right: 100px;
            position: relative;
        }
        .menu-btn{
            margin-top:5px;
            margin-bottom:5px;
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #052157;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            position: relative;
        }
        .logout-btn {
            margin-top:5px;
            margin-bottom:5px;
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #052157;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            position: relative;
        }
        .logout-btn:hover {
            background: grey;
        }
        .menu-btn:hover {
            background: grey;
        }
        table{
            border: 1px solid #dedbea;
            border-collapse: collapse;
            border-spacing: 0;
            width 70%;
            margin: 10px auto 10px auto;
        }
        table, thead, th{
            background-color: #ddefef;
            border: 1px solid #dedbea;
            color: #336b66;
            text-align: center;
            text-shadow: 1px 1px 1px #fff;
        }
        table, tbody, td{
            border: 1px solid #dedbea;
            color: #333;
            padding:25px;
        }
        a{
            background-color: #052157;
            color: #fff;
            padding: 10px;
            font-size:12px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h2>KANTIN JTI POLINEMA</h2>
        <h3>Welcome, User!</h3>        
    </header>
    <br>
    <menu>
        <h1>Menu</h1>
        <form action="transaksi.php" method="post">
            <button type="submit" class="menu-btn">Transaksi</button>
        </form>
        <form action="Produk/menu_pegawai/index.php" method="post">
            <button type="submit" class="menu-btn">Tambah Stok</button>
        </form>
        <form action="pengajuan_produk.php" method="post">
            <button type="submit" class="menu-btn">Pengajuan Produk</button>
        </form>
        <form action="logout.php" method="post">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </menu>
    <br>
    <br><br>
    <center><h1>Data Produk</h1></center>
    <br>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM produk ORDER BY id_produk ASC";
                $result = mysqli_query($conn, $query);

                if(!$result){
                    die("QUERY ERROR: ".mysqli_connect_errno($conn)." - ".mysqli_connect_error($conn));
                }
                $no =1;
                while($row =mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $row['nama_produk']?></td>
                <td>Rp <?php echo number_format($row['harga'],0,',','.');?></td>
                <td><?php echo $row['stok']?></td>
                <td><img src="gambar/" <?php echo $row['gambar_produk']?>></td>
            </tr>
            <?php
                $no++; 
                }
            ?>
        </tbody>
    </table>
</body>
</html>
