<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../../Notifications/config/koneksi.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["username"] = $row["username"];
        $_SESSION["level"] = $row["level"];

        // Setelah berhasil login, arahkan pengguna ke halaman sesuai level
        if ($row["level"] == 'admin') {
            header("Location: ../admin/index_admin.php");
        } elseif ($row["level"] == 'pegawai') {
            header("Location: ../pegawai/index_pegawai.php");
        }
    } else {
        $error_message = "Username atau Password salah.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php
    if (isset($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>

    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
