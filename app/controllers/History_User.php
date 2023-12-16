<?php

class History_User extends Controller {
    public function index()
    {
        //$data['title'] = 'Home Stok';
        //$data['data'] = $this->model('Produk_Model')->getAllProducts();
        $data['nama_user'] = $_SESSION['username'] ?? '';

        $this->view('user/template/header');
        $this->view('user/template/navbar', $data);
        $this->view('user/template/sidebar', $data);
        $this->view('user/historyPenjualan/index');
        $this->view('admin/template/footer');
        
    }

    public function detail(){
        // $data['title'] = 'Tambah Produk';
    //$data['kategori'] = $this->model('Produk_Model')->getAllCategories();

    
    $this->view('user/historyPenjualan/detail_history');
    
    }
    
    
}