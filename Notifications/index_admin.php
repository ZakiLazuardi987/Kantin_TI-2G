<?php
session_start();

include "koneksi.php";

// Fungsi untuk menampilkan pesan selamat datang dan tautan logout
function displayWelcomeMessage() {
    if (isset($_SESSION['username'])) {
        $welcome_message = "Selamat datang, " . $_SESSION['username'] . "!";
        $level_message = isset($_SESSION['LEVEL']) ? "(Level: " . $_SESSION['level'] . ")" : "";
        $logout_link = "<a href='logout.php'>Logout</a>";
        return "<p>$welcome_message $level_message $logout_link</p>";
    } else {
        return "";
    }
}

// Fungsi untuk menampilkan inbox pesan jika level adalah admin
function displayInboxPesan() {
    global $conn;

    if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
        // Jika login sebagai admin, tampilkan pengajuan
        $sql = "SELECT * FROM pengajuan ORDER BY tanggal DESC";
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
                        <th>Level</th>
                        <th>Alasan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                // Memastikan kunci "level" dan "status" sudah di-set sebelum mengaksesnya
                $level = isset($row['LEVEL']) ? $row['LEVEL'] : "";
                $status = isset($row['STATUS']) ? $row['STATUS'] : "";
                $actionText = ($status == 'Dibaca') ? 'Dibaca' : (($status == 'Disetujui' || $status == 'Tidak Disetujui') ? $status : "<a href='proses_inbox.php?id={$row['id']}&action=setuju'>Setuju</a> | <a href='proses_inbox.php?id={$row['id']}&action=tidak_setuju'>Tidak Setuju</a>");

                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$level}</td>
                        <td>{$row['alasan']}</td>
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
    echo displayInboxPesan();

    // Tutup koneksi setelah menggunakan di dalam fungsi
    $conn->close();
    ?>

</body>
</html>
