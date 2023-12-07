<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Disini</title>
    <!-- Sertakan file Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    body {
        background-color: #e3f2fd;
        color: #333;
        text-align: center;
        padding: 50px;
    }

    .login-container {
        background-color: #00FFCC;
        max-width: 400px;
        margin: auto;
        margin-top: 100px;

    }

    label {
        display: block;
        margin-bottom: 5px;
        color: black;
    }


    .login-form .btn {
        background-color: #000;
        color: #fff;
        text-align: white;
    }

    .bg {
        background-color: #000066;
        color: white;

    }

    .banner {
        background-clip: content-box;
    }

    .form-group {
        background-color: #C9E3E3;
        text-align: left;
        color: white;
        font-weight: bold;
    }

    .card-body {
        background-color: #C9E3E3;
    }

    .my-button {
        background-color: #000066;
        font-weight: bold;
        color: #fff;
    }

    .text-center {
        color: white;
        font-weight: bold;
    }

    .card {
        border-radius: 100px; /* Mengatur radius sudut */
        overflow: hidden; /* Memastikan konten di dalam card mengikuti tepi yang melengkung */
    }
</style>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card rounded">
                    <div class="bg">
                        <from>
                            <div class="text-center mt-2">
                                <p style="font-weight: bold;">Login Disini!</p>
</div>
                        </from>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="">Username</p></label>
                                <input type="text" name="Username" class="form-control" placeholder="Masukkan Username">
                            </div>
                            <div class="form-group">
                                <label for="">Password</p></label>
                                <input type="password" name="Password" class="form-control" placeholder="Masukkan Password">
                            </div>

                            <button type="submit" class="my-button">Login</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="#">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= BASEURL?>/Home">Home</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <br>
        <br>
        
        <p> &copy;<strong>Kantin JTI Polinema 2023</strong></p>
    </footer>



    <!-- Sertakan file Bootstrap JS dan Popper.js (diperlukan untuk beberapa fungsi Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>