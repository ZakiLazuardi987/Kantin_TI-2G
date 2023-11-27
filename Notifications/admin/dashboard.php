<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "../../Notifications/config/koneksi.php";

// Menampilkan pengajuan
$sql = "SELECT * FROM pengajuan ORDER BY tanggal DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengajuan Pegawai</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>Dashboard Pengajuan Pegawai</h2>
    <p>Selamat datang, <?php echo $_SESSION['username']; ?>! (Level: <?php echo $_SESSION['level']; ?>)</p>
    <a href="logout.php">Logout</a>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Alasan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['level']}</td>
                    <td>{$row['alasan']}</td>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['status']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada pengajuan.";
    }

    $conn->close();
    ?>
</body>
</html>
