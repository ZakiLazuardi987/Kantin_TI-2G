<?php

class Login extends Controller {
    public function index()
    {
        $data['title'] = 'Login';
        //$data['data'] = $this->model('Produk_Model')->getAllProducts();

        
        $this->view('login/index', $data);
        
    }

}