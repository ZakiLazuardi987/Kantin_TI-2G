<?php
session_start();

// Fungsi untuk menampilkan pesan selamat datang dan tautan logout
function displayWelcomeMessage() {
    if (isset($_SESSION['username'])) {
        $welcome_message = "Selamat datang, " . $_SESSION['username'] . "!";
        $level_message = "(Level: " . $_SESSION['level'] . ")";
        $logout_link = "<a href='../public/logout.php'>Logout</a>";
        return "<p>$welcome_message $level_message $logout_link</p>";
    } else {
        return "";
    }
}

// Fungsi untuk menampilkan form pengajuan pegawai atau menu sesuai level
function displayPengajuanForm() {
    if (isset($_SESSION['level']) && $_SESSION['level'] == 'pegawai') {
        return "<p><a href='form_pengajuan.php'>Isi Form Pengajuan Pegawai</a> | <a href='form_menu_pengajuan.php'>Isi Form Pengajuan Menu</a></p>";
    } else {
        return "";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pegawai</title>
</head>
<body>
    <h2>Dashboard Pegawai</h2>

    <?php
    echo displayWelcomeMessage();
    echo displayPengajuanForm();
    ?>

</body>
</html>
