<?php
session_start();
include "koneksi.php";

if ($_SESSION['level'] == 'admin' && isset($_GET['id']) && isset($_GET['action'])) {
    $id_pengajuan = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'setuju') {
        $sql_setuju = "INSERT INTO users (username, password, level) SELECT username, password, level FROM pengajuan WHERE id = $id_pengajuan";
        $conn->query($sql_setuju);

        // Perbarui status menjadi 'Disetujui'
        $sql_update = "UPDATE pengajuan SET STATUS='Disetujui' WHERE id = $id_pengajuan";
        $conn->query($sql_update);
    } elseif ($action == 'tidak_setuju') {
        // Perbarui status menjadi 'Tidak Disetujui'
        $sql_update = "UPDATE pengajuan SET STATUS='Tidak Disetujui' WHERE id = $id_pengajuan";
        $conn->query($sql_tidak_setuju);
        $conn->query($sql_update);
    }
}

$conn->close();
header("Location: inbox_pesan.php");
?>
