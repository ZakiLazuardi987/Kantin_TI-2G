<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kantin JTI Polinema</title>
    <link href="<?= BASEURL?>/assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('https://siprokmrk.polinema.ac.id/assets/img/gedung-sipil.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            font-family: 'Open Sans', sans-serif;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.75);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .overlay-info {
            text-align: center;
            border: 2px solid;
            padding: 40px;
            border-radius: 20px;
            background-color: #3e3e3e;
            color: #fff;
            max-width: 600px;
        }
        .btn-login,
        .btn-about,
        .btn-back {
            color: #fff !important;
            margin-top: 20px;
            transition: transform 0.3s ease-in-out;
        }
        .btn-login {
            background-color: #28a745 !important;
            margin-right: 5px;
        }
        .btn-about {
            background-color: #17a2b8 !important; 
            margin-left: 5px;
        }
        .btn-back {
            background-color: #DC143C !important; 
            margin-left: 5px;
        }
        .btn-login:hover,
        .btn-about:hover,
        .btn-back:hover {
            transform: scale(1.2);
        }
    </style>
  </head>
  <body> <script src="<?= BASEURL?>/assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
    <!-- Overlay -->
    <div class="overlay" id="welcome">
        <div class="overlay-info">
            <h1 class="display-4">Welcome to</h1>
            <h1 class="display-4">Kantin JTI Polinema</h1>
            <!-- Button -->
            <a href="<?= BASEURL?>/Login" class="btn btn-success btn-lg btn-login">Login</a>
            <a href="#about-us" class="btn btn-info btn-lg btn-about">About Us</a>
        </div>
    </div>
    <!-- About Us Section -->
    <div id="about-us" class="overlay">
        <div class="overlay-info">
            <h1 class="display-4">About Us</h1>
            <p><br>
                Selamat datang di Kantin Teknologi Informasi Politeknik Negeri Malang! 
                Kami adalah tempat yang menghadirkan beragam pilihan makanan dan minuman 
                untuk mendukung energi dan kreativitas mahasiswa Jurusan Teknologi Informasi. 
                Dengan suasana yang hangat dan ramah, kami berkomitmen untuk 
                menyajikan hidangan berkualitas tinggi yang memenuhi selera dan kebutuhan nutrisi Anda. 
                Segera kunjungi kami dan nikmati pengalaman kuliner yang tak terlupakan 
                di tengah kesibukan perkuliahan dan aktivitas kampus. 
                <br><br>
            </p>
            <p>Terima kasih atas dukungan dan kepercayaan Anda kepada kami.</p>
            <p>Kantin JTI POLINEMA, tempat di mana rasa dan teknologi bersatu!</p>
            <!-- Back button -->
            <a href="#welcome" class="btn btn-secondary btn-lg btn-back">Kembali</a>
        </div>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>