<?php include('Database.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Your CSS styles here -->
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            height: 100vh;
        }
        header {
            padding: 10px;
            background-color: #2D8F95;
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
        }
        menu {
            margin: 0;
            padding: 10px;
            background: linear-gradient(180deg, #06594A 0%, rgba(181.42, 161.91, 236.94, 0.15) 100%, rgba(255, 255, 255, 0.90) 100%), linear-gradient(0deg, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.75) 100%);
            height: 100vh;
            width: 200px;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2{
            margin: 25px;
            position: relative;
            padding-left: 225px;
        }
        h3{
            margin: 25px;
            position: relative;
        }
        h1{
            margin-top: 10px;
            margin-left: 100px;
            margin-right: 100px;
            position: relative;
        }
        .menu-btn{
            margin-top:5px;
            margin-bottom:5px;
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #052157;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            position: relative;
        }
        .logout-btn {
            margin-top:5px;
            margin-bottom:5px;
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #052157;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            position: relative;
        }
        .logout-btn:hover {
            background: grey;
        }
        .menu-btn:hover {
            background: grey;
        }
    </style>
</head>
<body>
    <header>
        <h2>KANTIN JTI POLINEMA</h2>
        <h3>Welcome, Admin!</h3>        
    </header>
    <br>
    <menu>
        <h1>Menu</h1>
        <form action="produk.php" method="post">
            <button type="submit" class="menu-btn">Produk</button>
        </form>
        <form action="register.php" method="post">
            <button type="submit" class="menu-btn">Pegawai</button>
        </form>
        <form action="logout.php" method="post">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </menu>
</body>
</html>
