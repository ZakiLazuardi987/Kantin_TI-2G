<?php

class Laporan_Admin extends Controller {
    public function index()
    {
        //$data['title'] = 'Home Stok';
        //$data['data'] = $this->model('Produk_Model')->getAllProducts();

        $this->view('admin/template/header');
        $this->view('admin/template/navbar');
        $this->view('admin/template/sidebar');
        $this->view('admin/laporanPenjualan/index');
        $this->view('admin/template/footer');
        
    }

    public function detail(){
        // $data['title'] = 'Tambah Produk';
    //$data['kategori'] = $this->model('Produk_Model')->getAllCategories();

    
    $this->view('admin/laporanPenjualan/detail_laporan');
    
    }
    
    
}