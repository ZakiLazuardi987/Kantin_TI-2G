<?php

class History_User extends Controller {
    public function index()
    {
        $data['nama_user'] = $_SESSION['username'] ?? '';

        // Check if a date filter is provided
        if (isset($_POST['filter'])) {
            $tanggalFilter = $_POST['tanggal'];
            $data['data'] = $this->model('Transaksi_Model')->getHistoryByDate($tanggalFilter);
        } else {
            // If no filter, get all transactions
            $data['data'] = $this->model('Transaksi_Model')->getAllTransaction();
        }

        $this->view('user/template/header');
        $this->view('user/template/navbar', $data);
        $this->view('user/template/sidebar', $data);
        $this->view('user/historyPenjualan/index', $data);
        $this->view('admin/template/footer');
    }

    public function detail(){
        // $data['title'] = 'Tambah Produk';
    //$data['kategori'] = $this->model('Produk_Model')->getAllCategories();

    
    $this->view('user/historyPenjualan/detail_history');
    }
    
    
}