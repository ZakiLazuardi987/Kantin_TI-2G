<?php
session_start();

include "koneksi.php";

// Fungsi untuk menampilkan pesan selamat datang dan tautan logout
function displayWelcomeMessage() {
    if (isset($_SESSION['username'])) {
        $welcome_message = "Selamat datang, " . $_SESSION['username'] . "!";
        $level_message = "(Level: " . $_SESSION['level'] . ")";
        $logout_link = "<a href='logout.php'>Logout</a>";
        return "<p>$welcome_message $level_message $logout_link</p>";
    } else {
        return "";
    }
}

// Fungsi untuk menampilkan form pengajuan pegawai jika level adalah pegawai
function displayPengajuanForm() {
    if (isset($_SESSION['level']) && $_SESSION['level'] == 'pegawai') {
        return "<p><a href='form_pengajuan.php'>Isi Form Pengajuan Pegawai</a></p>";
    } else {
        return "";
    }
}

// Fungsi untuk menampilkan inbox pesan jika level adalah admin
function displayInboxPesan() {
    global $conn; // Tambahkan ini untuk menggunakan variabel $conn di dalam fungsi

    if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
        // Jika login sebagai admin, tampilkan pengajuan
        $sql = "SELECT * FROM pengajuan ORDER BY tanggal DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Alasan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['level']}</td>
                        <td>{$row['alasan']}</td>
                        <td>{$row['tanggal']}</td>
                        <td>{$row['status']}</td>
                        <td><a href='proses_inbox.php?id={$row['id']}&action=setuju'>Setuju</a> | <a href='proses_inbox.php?id={$row['id']}&action=tidak_setuju'>Tidak Setuju</a></td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "Tidak ada pengajuan.";
        }
    } else {
        // Jika belum login atau login sebagai pegawai, beri tahu bahwa halaman ini hanya untuk admin atau tampilkan form pengajuan pegawai
        echo "<p>Anda belum login atau tidak memiliki hak akses.</p>";
    }
}

$conn->close();
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

    <?php
    echo displayWelcomeMessage();
    echo displayPengajuanForm();
    echo displayInboxPesan();
    ?>

</body>
</html>