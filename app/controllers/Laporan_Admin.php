<?php

class Laporan_Admin extends Controller {
    public function index()
    {
        $data['nama_user'] = $_SESSION['username'] ?? '';

        $this->view('admin/template/header');
        $this->view('admin/template/navbar', $data);
        $this->view('admin/template/sidebar', $data);

        // Check if a date filter is provided
        if (isset($_POST['filter'])) {
            $tanggalFilter = $_POST['tanggal'];
            $data['data'] = $this->model('Transaksi_Model')->getLaporanByDate($tanggalFilter);
        } else {
            // If no filter, get all transactions
            $data['data'] = $this->model('Transaksi_Model')->getAllTransaction();
        }

        $this->view('admin/laporanPenjualan/index', $data);
        $this->view('admin/template/footer');
    }

    public function detail(){
        // $data['title'] = 'Tambah Produk';
        //$data['kategori'] = $this->model('Produk_Model')->getAllCategories();
        $this->view('admin/laporanPenjualan/detail_laporan');
    }
}
?>
