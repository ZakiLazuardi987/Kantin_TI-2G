<?php
session_start();

include "../../Notifications/config/koneksi.php";

// Fungsi untuk menampilkan pesan selamat datang dan tautan logout
function displayWelcomeMessage() {
    if (isset($_SESSION['username'])) {
        $welcome_message = "Selamat datang, " . $_SESSION['username'] . "!";
        $level_message = isset($_SESSION['LEVEL']) ? "(Level: " . $_SESSION['level'] . ")" : "";
        $logout_link = "<a href='../public/logout.php'>Logout</a>";
        return "<p>$welcome_message $level_message $logout_link</p>";
    } else {
        return "";
    }
}

// Fungsi untuk menampilkan inbox pesan berdasarkan opsi yang dipilih
function displayInboxPesan() {
    global $conn;

    if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
        // Ambil opsi dari query parameter
        $option = isset($_GET['option']) ? $_GET['option'] : 'pegawai';

        // Tentukan tabel dan kolom yang sesuai dengan opsi
        $table = ($option == 'pegawai') ? 'pengajuan' : 'menu_pengajuan';
        $columnLevel = ($option == 'pegawai') ? 'LEVEL' : 'LEVEL_MENU';
        $columnStatus = ($option == 'pegawai') ? 'STATUS' : 'STATUS_MENU';

        // Kolom tambahan untuk pengajuan menu
        $extraColumns = ($option == 'menu') ? "<th>ID Kategori</th>
                                              <th>Nama Menu</th>
                                              <th>Harga</th>
                                              <th>Stok</th>
                                              <th>Gambar Menu</th>" : "";

        // Jika login sebagai admin, tampilkan pengajuan
        $sql = "SELECT * FROM $table ORDER BY tanggal DESC";
        $result = $conn->query($sql);

        if ($result === false) {
            // Tampilkan pesan kesalahan jika query gagal
            echo "Error executing query: " . $conn->error;
            return;
        }

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Level</th>";

            // Tampilkan kolom tambahan hanya jika opsi = 'menu'
            if ($option == 'menu') {
                echo "<th>ID Kategori</th>
                      <th>Nama Menu</th>
                      <th>Harga</th>
                      <th>Stok</th>
                      <th>Gambar Menu</th>";
            }

            echo "<th>Alasan</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                // Memastikan kunci "id", "level", dan "status" sudah di-set sebelum mengaksesnya
                $id = isset($row['id']) ? $row['id'] : "";
                $level = isset($row[$columnLevel]) ? $row[$columnLevel] : "";
                $status = isset($row[$columnStatus]) ? $row[$columnStatus] : "";
                $actionText = ($status == 'Dibaca') ? 'Dibaca' : (($status == 'Disetujui' || $status == 'Tidak Disetujui') ? $status : "<a href='proses_inbox.php?id={$id}&action=setuju&option={$option}'>Setuju</a> | <a href='proses_inbox.php?id={$id}&action=tidak_setuju&option={$option}'>Tidak Setuju</a>");

                echo "<tr>
                        <td>{$id}</td>
                        <td>{$row['username']}</td>
                        <td>{$level}</td>";

                // Tampilkan kolom tambahan hanya jika opsi = 'menu'
                if ($option == 'menu') {
                    echo "<td>{$row['id_kategori']}</td>
                          <td>{$row['nama_menu']}</td>
                          <td>{$row['harga']}</td>
                          <td>{$row['stok']}</td>
                          <td>{$row['gambar_menu']}</td>";
                }

                echo "<td>{$row['alasan']}</td>
                      <td>{$row['tanggal']}</td>
                      <td>{$status}</td>
                      <td>{$actionText}</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "Tidak ada pengajuan.";
        }
    } else {
        echo "<p>Anda belum login atau tidak memiliki hak akses.</p>";
    }
}

// Tidak perlu menutup koneksi di sini

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
    <h2>Dashboard Admin</h2>

    <?php
    echo displayWelcomeMessage();
    echo "<p><a href='index_admin.php?option=pegawai'>Pegawai</a> | <a href='index_admin.php?option=menu'>Menu</a></p>";
    echo displayInboxPesan();

    // Tutup koneksi setelah menggunakan di dalam fungsi
    $conn->close();
    ?>

</body>
</html>
