<?php

class Home_Admin extends Controller {
    public function index()
    {
        $data['title'] = 'Home Admin';
        //$data['data'] = $this->model('Produk_Model')->getAllProducts();
        $data['nama_user'] = $_SESSION['username'] ?? '';

        $data['dataTop'] = $this->model('Produk_Model')->getBestSellingProducts();

        $this->view('admin/template/header', $data);
        $this->view('admin/template/navbar', $data);
        $this->view('admin/template/sidebar', $data);
        $this->view('admin/home/index', $data);
        $this->view('admin/template/footer');
    }

}