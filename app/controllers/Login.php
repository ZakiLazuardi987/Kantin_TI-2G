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
                $data['error_message'] = 'Invalid username or password.';
            }
        }

        // Load the login view
        $this->view('login/index', $data);
    }
}
