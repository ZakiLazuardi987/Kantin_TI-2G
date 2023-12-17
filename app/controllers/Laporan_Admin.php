<?php

class Laporan_Admin extends Controller {
    public function index()
    {
        $tanggalFilter = isset($_POST['tanggalFilter']) ? $_POST['tanggalFilter'] : null;
    $data['laporanPenjualan'] = $this->model('Transaksi_Model')->getDataByDate($tanggalFilter);

        //$data['title'] = 'Home Stok';
        // $data['data'] = $this->model('Transaksi_Model')->getAllTransaction();
        $data['nama_user'] = $_SESSION['username'] ?? '';

        $this->view('admin/template/header');
        $this->view('admin/template/navbar', $data);
        $this->view('admin/template/sidebar', $data);
        $this->view('admin/laporanPenjualan/index',$data);
        $this->view('admin/template/footer');
        
    }

    public function detail(){
        // $data['title'] = 'Tambah Produk';
    //$data['kategori'] = $this->model('Produk_Model')->getAllCategories();

    
    $this->view('admin/laporanPenjualan/detail_laporan');
    
    }
    
    
}