<?php
session_start();
include "koneksi.php";

if ($_SESSION['level'] == 'admin') {
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
                    <td>{$row['LEVEL']}</td>
                    <td>{$row['alasan']}</td>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['STATUS']}</td>
                    <td><a href='proses_inbox.php?id={$row['id']}&action=setuju'>Setuju</a> | <a href='proses_inbox.php?id={$row['id']}&action=tidak_setuju'>Tidak Setuju</a></td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada pengajuan.";
    }
} else {
    // Jika login sebagai pegawai, beri tahu bahwa halaman ini hanya untuk admin
    echo "Halaman ini hanya dapat diakses oleh admin.";
}

$conn->close();
?>
