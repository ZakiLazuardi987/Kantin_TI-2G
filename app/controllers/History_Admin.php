<?php

class History_Admin extends Controller {
    public function index()
    {
        $data['nama_user'] = $_SESSION['username'] ?? '';

        // Check if a date filter is provided
        if (isset($_POST['filter'])) {
            $tanggalFilter = $_POST['tanggal'];
            $data['data'] = $this->model('Transaksi_Model')->getLaporanHistoryByDate($tanggalFilter);
        } else {
            // If no filter, get all transactions
            $data['data'] = $this->model('Transaksi_Model')->getAllTransaction();
        }

        $this->view('admin/template/header', $data);
        $this->view('admin/template/navbar', $data);
        $this->view('admin/template/sidebar', $data);
        $this->view('admin/historyPenjualan/index', $data);
        $this->view('admin/template/footer');

    }

    public function detail(){
        // $data['title'] = 'Tambah Produk';
    //$data['kategori'] = $this->model('Produk_Model')->getAllCategories();

    
    $this->view('user/historyPenjualan/detail_history');
    }
    
    
}