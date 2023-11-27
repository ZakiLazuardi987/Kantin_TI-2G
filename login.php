<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "koneksi.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM akun WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // verif password
        if (password_verify($password, $row['password'])) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["level"] = $row["level"];

            // Setelah berhasil login, arahkan pengguna ke halaman sesuai level
            if ($row["level"] == 'admin') {
                header("Location: index_admin.php");
            } elseif ($row["level"] == 'user') {
                header("Location: index_user.php");
            }
        } else {
            $error_message = "Username atau Password Salah.";
        }
        
    } else {
        $error_message = "Username atau Password Salah.";
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

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #2D8F95;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            width: 400px;
            padding: 20px;
            background: linear-gradient(180deg, #1BBDA0 0%, rgba(181.42, 161.91, 236.94, 0.15) 100%, rgba(181.42, 161.91, 236.94, 0) 100%); box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #052157;
        }
        .input-field {
            width: 85%;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .login-btn {
            width: 85%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #052157;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
        .login-btn:hover {
            background: #1BBDA0;
        }
        .copyright {
            margin-top: 20px;
            font-size: 12px;
            color: #fff;
        }
    </style>
</head>
<body>    
    <?php
    if (isset($error_message)) {
        echo "<script>alert('$error_message');</script>";
    }
    ?>

    <form action="login.php" method="post">
        <div class="login-container">
            <h2>Selamat Datang di Kantin JTI Polinema!</h2>
            <input type="text" name="username" class="input-field" placeholder="Username" required>
            <input type="password" name="password" class="input-field" placeholder="Password" required>
            <button class="login-btn">Login</button>
            <p class="copyright">© Kantin JTI Polinema 2023</p>
        </div>
    </form>
</body>
</html>
