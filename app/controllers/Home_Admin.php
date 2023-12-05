<?php

class Home_Admin extends Controller {
    public function index()
    {
        $data['title'] = 'Home Admin';
        //$data['data'] = $this->model('Produk_Model')->getAllProducts();

        $this->view('admin/template/header', $data);
        $this->view('admin/template/navbar');
        $this->view('admin/template/sidebar');
        $this->view('admin/home/index', $data);
        $this->view('admin/template/footer');
    }

}