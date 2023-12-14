<?php

class Login extends Controller {
    public function index()
    {
        $data['title'] = 'Login';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $accountModel = $this->model('Akun_Model');
            $user = $accountModel->login($username, $password);

            if ($user) {
                if ($user['level'] == 'admin') {
                    header('Location: ' . BASEURL . '/Home_Admin');
                    exit;
                } elseif ($user['level'] == 'user') {
                    header('Location: ' . BASEURL . '/Home_User');
                    exit;
                }
            } else {
                Flasher::setFlash('username or password', 'invalid', 'danger');
                header('Location: ' . BASEURL . '/Login'); // Ganti dengan alamat tujuan setelah berhasil memperbarui data
                exit;
            }
        }

        // Load the login view
        $this->view('login/index', $data);
    }
}
