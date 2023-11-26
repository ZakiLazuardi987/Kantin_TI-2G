<?php
session_start();
include "koneksi.php";

if ($_SESSION['level'] == 'admin' && isset($_GET['id']) && isset($_GET['action'])) {
    $id_pengajuan = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'setuju') {
        $sql_setuju = "INSERT INTO pegawai (username, password, level) SELECT username, password, level FROM pengajuan WHERE id = $id_pengajuan";
        $conn->query($sql_setuju);
    } elseif ($action == 'tidak_setuju') {
        // Tidak melakukan apa-apa jika tidak disetujui
    }

    // Set pengajuan sebagai dibaca
    $sql_update = "UPDATE pengajuan SET status='dibaca' WHERE id = $id_pengajuan";
    $conn->query($sql_update);
}

$conn->close();
header("Location: inbox_pesan.php");
?>
