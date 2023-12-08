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
        background-image: url("<?= BASEURL?>/img/login/login7.png");
        background-size: cover;
        background-position: center;
        color: #EEF0EF;
        text-align: center;
        padding: 50px;
        margin: 0;
        font-family: 'Open Sans', sans-serif;
    }

    .login-container {
        background-color: #333F57;
        max-width: 400px;
        margin: auto;
        margin-top: 100px;
        border-radius: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #1A2A46;
    }

    .login-form .btn {
        background-color: #F4A623;
        color: #EEF0EF;
        text-align: white;
    }

    .bg {
        background-color: #333F57;
        color: #8B929C;
        padding: 10px;
    }

    .banner {
        background-clip: content-box;
    }

    .form-group {
        background-color: #F4A623;
        text-align: left;
        color: #EEF0EF;
        font-weight: bold;
        border-radius: 10px 10px 10px 10px;
        padding: 15px;
        margin-top: -1px;
    }

    .card-body {
        background-color: #343539;
    }

    .btn-login {
        background-color: #8B929C;
        font-weight: bold;
        color: #EEF0EF;
        border: none;
        transition: transform 0.3s ease-in-out;
    }

    .btn-login:hover {
        background-color: #8B929C;
        transition: transform 0.3s ease-in-out;
        transform: scale(1.1);
    }

    .text-center {
        color: #F4A623;
        font-weight: bold;
    }

    .card {
        border-radius: 20px; /* Mengatur radius sudut */
        overflow: hidden; /* Memastikan konten di dalam card mengikuti tepi yang melengkung */
    }

    .small {
        color: #F4A623; 
    }

    .small:hover{
        color: #EEF0EF; 
    }
</style>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card rounded">
                    <div class="bg">
                        <form>
                            <div class="text-center mt-2">
                                <p style="font-weight: bold;">Login Disini!</p>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="Username" class="form-control" placeholder="Masukkan Username">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="Password" class="form-control" placeholder="Masukkan Password">
                            </div>

                            <button type="submit" class="btn btn-secondary btn-lg btn-login">Login</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= BASEURL?>/Home">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <br>
        <br>

        <p>&copy;<strong>Kantin JTI Polinema 2023</strong></p>
    </footer>

    <!-- Sertakan file Bootstrap JS dan Popper.js (diperlukan untuk beberapa fungsi Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
