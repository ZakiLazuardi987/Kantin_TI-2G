<?php

class Stok_User extends Controller {
    public function index()
    {
        $data['title'] = 'Home Stok';
        $data['data'] = $this->model('Produk_Model')->getAllProducts();

        $this->view('user/template/header', $data);
        $this->view('user/template/navbar');
        $this->view('user/template/sidebar');
        $this->view('user/stok/index', $data);
        $this->view('admin/template/footer');
        
    }
    
    public function formStok(){
        // $data['title'] = 'Tambah Produk';
    //$data['kategori'] = $this->model('Produk_Model')->getAllCategories();

    
    $this->view('user/stok/form_stok');
    
    }
}