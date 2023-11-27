<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

        .form-container {
            width: 400px;
            background: linear-gradient(180deg, #1BBDA0 0%, rgba(181.42, 161.91, 236.94, 0.15) 100%, rgba(181.42, 161.91, 236.94, 0) 100%); box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            box-sizing: border-box;
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: #052157;
            margin-bottom: 20px;
            text-align: center;
        }

        .input-container {
            margin-bottom: 20px;
        }

        .input-container label {
            display: block;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease-in-out;
        }

        .input-field::placeholder {
            color: #999;
        }

        .input-field:focus {
            outline: none;
            border-color: #1BBDA0;
        }

        .radio-group {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .radio-label {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-right: 15px;
        }

        .radio-input {
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #052157;
            outline: none;
            cursor: pointer;
            transition: border-color 0.3s ease-in-out;
            margin-right: 10px;
        }

        .radio-input:checked {
            background-color: #1BBDA0;
            border-color: #1BBDA0;
        }

        .radio-input:checked::after {
            content: '';
            display: block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #fff;
            margin: 3px;
        }

        .submit-btn {
            background-color: #052157;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 0;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s ease-in-out;
        }

        .submit-btn:hover {
            background-color: #1BBDA0;
        }

        .note {
            font-size: 14px;
            color: #777;
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .copyright {
            margin-top: 20px;
            font-size: 12px;
            color: #fff;
            text-align: center;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .checkbox-label {
            font-size: 14px;
            color: #fff;
            margin-left: 8px;
        }

        .checkbox-input {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            outline: none;
            cursor: pointer;
            transition: border-color 0.3s ease-in-out;
        }

        .checkbox-input:checked {
            border-color: #1BBDA0;
            background-color: #1BBDA0;
        }

        .checkbox-input:checked::after {
            content: '\2714'; /* Checkmark icon */
            display: block;
            text-align: center;
            line-height: 20px;
            color: #fff;
        }
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease-in-out;
            appearance: none; /* Menghilangkan default arrow pada select */
            background-image: url('data:image/svg+xml;utf8,<svg fill="#333" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px"><path d="M7 10l5 5 5-5H7z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); /* Menambahkan custom arrow */
            background-repeat: no-repeat;
            background-position: right 10px center;
        }

        /* Menyesuaikan warna background saat select terfokus */
        select:focus {
            outline: none;
            border-color: #1BBDA0;
        }
    </style>
    
</head>
<body>
    <form action="proses_register.php" method="post">
        <div class="form-container">
            <div class="section-title">Tambah Pegawai!</div>
            <div class="input-container">
                <label for="nama_user">Nama</label>
                <input type="text" id="nama_user" name="nama_user" class="input-field" placeholder="Masukkan nama..." required>
            </div>
            <div class="input-container">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="input-field" placeholder="Masukkan username..." required>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="input-field" placeholder="Masukkan password..." required>
            </div>
            <div class="input-container">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="input-field" placeholder="Masukkan alamat..." required>
            </div>
            <div class="input-container">
                <label for="no_telp">No. Telp</label>
                <input type="text" id="no_telp" name="no_telp" class="input-field" placeholder="Masukkan no. telp..." required>
            </div>
            <div class="input-container">
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <input type="radio" id="laki" name="jenis_kelamin" class="radio-input" value="L">
                    <label for="laki" class="radio-label">Laki-Laki</label>
                    <input type="radio" id="perempuan" name="jenis_kelamin" class="radio-input" value="P">
                    <label for="perempuan" class="radio-label">Perempuan</label>
                </div>
            </div>
            <div class="input-container">
                <label for="level">Level</label>
                <select name="level" required>
                    <option selected>Pilih Level</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div>
                <button class="submit-btn" name="register">Tambahkan</button>
                <div class="checkbox-container">
                    <input type="checkbox" id="data-check" class="checkbox-input" required>
                    <label for="data-check" class="checkbox-label">Pastikan data yang Anda masukkan sudah benar.</label>
                </div>
                <div class="copyright">
                    <p>© Kantin JTI Polinema 2023</p>
            </div>
    </form>
</body>
</html>
