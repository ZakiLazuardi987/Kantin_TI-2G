<?php

class Home_User extends Controller {
    public function index()
    {
        $data['title'] = 'Home User';
        $data['data'] = $this->model('Produk_Model')->getAllProducts();
        $data['kategori'] = $this->model('Produk_Model')->getAllCategories();
        $data['nama_produk'] = $this->model('Produk_Model')->getProductByName();


        $this->view('user/template/header', $data);
        $this->view('user/template/navbar');
        $this->view('user/template/sidebar');
        $this->view('user/home/index', $data);
        $this->view('admin/template/footer');
    }

    public function formBayar(){
        // $data['title'] = 'Tambah Produk';
    //$data['kategori'] = $this->model('Produk_Model')->getAllCategories();

    
    $this->view('user/home/form_bayar');
    
    }

    

}